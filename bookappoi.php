<?php

use App\Database\Models\Appoint;

$title="Book An Appointment";
include "layouts/header.php";
include "App/Http/middlewares/Auth.php";
include "layouts/navbar.php";
include "App/Database/Models/Appoint.php";

if($_SERVER['REQUEST_METHOD']=='POST'&&!empty($_POST))
{
  if(!$_POST['options'])
  {
    echo '      <div class="row d-flex mt-5 justify-content-center align-items-center h-100">
    <div class="col-12 col-md-9 col-lg-7 col-xl-6"><div class="alert  text-center alert-danger" role="alert">
Please choose a doctor</div></div></div>';
  }
else{
  $appoint = new Appoint;
    $appoint->setPatient_id($_SESSION['patient']->id)->setDoctor_id($_POST['options'])->setTime_choosen($_POST['time'])->setComment($_POST['comment']);

    if($appoint->create())
    {
     
    echo " <div class=' d-flex align-items-center h-100 mt-5 mb-5 gradient-custom-3'>
    <div class='container h-100'>
      <div class='row d-flex justify-content-center align-items-center h-100'>
        <div class='col-12 col-md-9 col-lg-7 col-xl-6'>
          <div class=' bg-transparent' style= 'border-radius: 15px;'>
          
          <div class='alert alert-success mt-5 mb-5 text-center' role='alert'>
  The appointment booked successfully.
</div>
          </div>
        </div>
      </div>
    </div>
  </div>";
die;
        // header("location:home_patient.php");die;
    }
    else
    {
        $error="<div class='alert alert-danger text-center>Somting went wrong</div>'";
    }


}}


?>
<div class=" d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class=" bg-transparent" style= 'border-radius: 15px;'>
            <div class="card-body p-5">
  
      <h4 class="text-center display-3 mb-5 mt-2 ">Book An Appointment </h4>

      <form method="post">

<div class="form-outline mt-4">
<div class="form-group">
    <select class="form-control" name="options" id="exampleFormControlSelect1">
    <option value="0">Choose a doctor</option>
      <?php
      $conn=mysqli_connect("localhost","root","","hospital_fci");

      $req="SELECT first_name,last_name FROM doctors";
      $query1=mysqli_query($conn,$req);
      $s=1;
      while($fetch=mysqli_fetch_object($query1))
      {
        
      ?>
      <option  value="<?= $s ?>"><?= "Dr. ". $fetch->first_name ." ". $fetch->last_name; ?></option>
      
<?php
    $s++;
      }
      ?>
    </select>
  </div>
</div>

<div id="date-picker-example" class="md-form md-outline input-with-post-icon datepicker" inline="true">
<label for="meeting-time">Choose a time:</label>

<input name="time" type="datetime-local" id="meeting-time"
       name="meeting-time" value="2022-12-12T19:30"
       min="2022-012-07T00:00" max="2023-02-14T00:00">
</div>

<div class="form-group mt-4">
    <label for="exampleFormControlTextarea1">Your Comment: </label>
    <input class="form-control" name="comment" id="exampleFormControlTextarea1" value="no comment..." rows="3"></input>
  </div>

<div class="button-box mt-4 d-flex justify-content-center">
                  <button class="btn btn-primary  btn-lg gradient-custom-4 "
                    type="submit"><span>Book</span></button>
                </div>
      </form>
            </div></div></div></div>
   

  </div>
  </div>
</div>


      <div
      class="d-flex flex-column flex-md-row text-center text-md-start mt-4 justify-content-between py-4 px-4 px-xl-5 bg-primary">
      <!-- footer Copyright -->
      <div class="text-white  ">
        Copyright © 2020. All rights reserved.
      </div>
      <!-- Copyright -->
  
      <!-- Right -->
      <div>
        <a href="#!" class="text-white me-4">
          <i class="fab fa-facebook-f"></i>
        </a>
        <a href="#!" class="text-white me-4">
          <i class="fab fa-twitter"></i>
        </a>
        <a href="#!" class="text-white me-4">
          <i class="fab fa-google"></i>
        </a>
        <a href="#!" class="text-white">
          <i class="fab fa-linkedin-in"></i>
        </a>
      </div>
      <!-- Right -->
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>