<?php



$title="Home";
include "layouts/header.php";
include "App/Http/middlewares/Auth.php";
include "layouts/navbardoc.php";

?>


      <h4 class="text-center display-3 mb-5 mt-5 ">Hello, Doctor</h4>
<!-- *////////////////////////////////////////// -->
<!-- Banner -->


<div class="p-10 bg-transparent mt-5 mb-5 pt-5">
  <div class="container">
    <div class="card">
      <div class="card-header">
        <h6 >Your Appointments</h6>

      </div>
      <div class="table-responsive">
        <table class="table  table-hover table-nowrap">
          <thead class="table-light">
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Time</th>
              <th scope="col">Email</th>
              <th scope="col">Phone</th>
              <th scope="col">Gender</th>
              <th scope="col">Comment</th>
              <!-- <th scope="col">Delete</th> -->
              <th></th>
            </tr>
          </thead>
          <tbody>
<?php 
$conn=mysqli_connect("localhost","root","","hospital_fci");

$req="SELECT patient_id,time_choosen,comment  FROM appoints where doctor_id= ". $_SESSION['doctor']->id ;
$query1=mysqli_query($conn,$req);
while($fetch=mysqli_fetch_object($query1))
{
?>
              <?php   
$req2="SELECT first_name, last_name, phone, email, gender  FROM patients where id= ". $fetch->patient_id ;
$query2=mysqli_query($conn,$req2);
$fetch2=mysqli_fetch_object($query2);
$req3="DELETE FROM customers WHERE patient_id = ". $fetch->patient_id;
              ?>
            <tr>
              <td data-label="name">
                <img alt="..." src="image.jpg" width="50px" class="avatar avatar-sm rounded-circle me-2 mr-2">
                <a class="text-heading font-semibold mt-5" href="#"><?= $fetch2->first_name . " ".$fetch2->last_name?></a>
              </td>
              <td data-label="time">
                <span><?php   echo $fetch->time_choosen; ?></span>
              </td>

              <td data-label="email">
                <a class="text-current" href="mailto:robert.fox@example.com"><?= $fetch2->email?></a>
              </td>
              <td data-label="phone">
                <a class="text-current" href="tel:202-555-0152"><?= $fetch2->phone?></a>
              </td>
              <td data-label="gender">
                <span class="badge bg-soft-success text-success"><?php if($fetch2->gender=='m') echo "MALE";else echo "FEMALE" ?></span>
              </td>
              <td data-label="">
                <p class="text-current"><?=$fetch->comment  ?></p>
              </td>
              <td data-label="" class="text-end">
                <div class="dropdown">
                  <a class="text-muted" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="bi bi-three-dots-vertical"></i>
                  </a>
                </div>
              </td>
              <td data-label="">
<!-- <form method="post">
  <input type="hidden" name="patient_id" value="<?= $fetch->patient_id ?>">
<input type="submit" name="delete">
</form>  -->
</td>
            </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- ///////////////////////////////////////////////////////////// -->


      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>