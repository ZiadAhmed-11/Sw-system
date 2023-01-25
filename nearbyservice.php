
<?php

use App\Database\Models\Appoint;

$title="Nearby Services";
include "layouts/header.php";
include "App/Http/middlewares/Auth.php";
include "layouts/navbar.php";

if($_SERVER['REQUEST_METHOD']=='POST'&&!empty($_POST))
{ 
  ?>    
  
  <div class="alert text-center pb-5 pt-5 ml-5 mr-5 alert-success" role="alert">
  <h4 class="alert-heading">Well done!</h4>
  <p>We will reach you within half an hour.</p>
  <hr>
  <p class="mb-0">Please keep your phone nearby so that we can call you upon arrival.</p>
</div>
<?php
die;
}


?>
<div class=" d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class=" bg-transparent" style= 'border-radius: 15px;'>
            <div class="card-body p-5">
  
      <h4 class="text-center display-4 mb-5 mt-5 ">Nearby Services </h4>

      <form method="post">


      <div class="form-outline mt-4">
      <label for="inputState">Service</label>
      <select id="inputState" class="form-control">
        <option selected>Choose...</option>
        <option>Insulin measurement</option>
        <option>Blood pressure measurement</option>
        <option>Band aid</option>
        <option>Giving injections</option>
        <option>Intravenous solution suspention</option>
      </select>
      
</div>
              <div class="form-outline mt-4">
      <label for="inputState" class="display-4 ">Location</label>
      <select id="inputState" class="form-control">
        <option selected>Your city</option>
        <option>Fayoum</option>
        <option>Giza</option>
        <option>Cairo</option>

      </select>
      
</div>

              <div class="form-outline mt-4">
                <input type="text" id="form3Example1cg" placeholder="region" 
                  name="last_name" class="form-control form-control-lg" />
              </div>

              <div class="form-outline mt-4">
                <input type="text" id="form3Example3cg" 
                  class="form-control form-control-lg" placeholder="Street" />
              </div>

              <div class="form-outline mt-4">
                <input type="text" id="form3Example4cg" placeholder="floor" 
                  class="form-control form-control-lg" />
              </div>

              <div class="form-outline mt-4 mb-5">
                <input type="number" id="form3Example4cdg" placeholder="Apartment number"
                  name="flat" class="form-control form-control-lg" />
              </div>
              <div class="button-box mt-4 d-flex justify-content-center">
                  <button class="btn btn-primary  btn-lg gradient-custom-4 "
                    type="submit"><span>submit</span></button>
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