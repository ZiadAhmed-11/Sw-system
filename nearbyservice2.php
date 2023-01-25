<?php

$title="Register";
include "layouts/header.php";
include "APP/Http/middlewares/Auth.php";
include "layouts/navbar.php";
include "App/Http/Requests/Validation.php";
//include "vendor/autoload.php";


    





?>
  <div class=" d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class=" bg-transparent" style= 'border-radius: 15px;'>
            <div class="card-body p-5">
            <div class="alert alert-light" role="alert">
  This is a light alert—check it out!
</div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php

include "layouts/footer.php";
include "layouts/script.php";