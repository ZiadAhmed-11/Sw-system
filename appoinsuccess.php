<?php
use App\Database\Models\Patient;
use App\Http\Requests\Validation;

$title="Register";
include "layouts/header.php";
include "APP/Http/middlewares/auth.php";
include "layouts/navbar.php";
include "App/Http/Requests/Validation.php";
//include "vendor/autoload.php";
include "App/Database/Models/Patient.php";

?>
  <div class=" d-flex align-items-center h-100 mt-5 mb-5 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class=" bg-transparent" style= 'border-radius: 15px;'>
          
          <div class="alert alert-success mt-5 mb-5 text-center" role="alert">
  The appointment booked successfully.
</div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php
include "layouts/footer.php";
include "layouts/script.php";
