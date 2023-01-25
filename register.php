<?php
use App\Database\Models\Patient;
use App\Http\Requests\Validation;

$title="Register";
include "layouts/header.php";
include "APP/Http/middlewares/Guest.php";
include "layouts/navbar.php";
include "App/Http/Requests/Validation.php";
//include "vendor/autoload.php";
include "App/Database/Models/Patient.php";

$validation=new Validation;

if($_SERVER['REQUEST_METHOD']=='POST'&&!empty($_POST))
{
  $validation->setValueName("First Name")->setValue($_POST['first_name'])->required()->String()->max(32);
  $validation->setValueName("Last Name")->setValue($_POST['last_name'])->required()->String()->max(32);
  $validation->setValueName("phone")->setValue($_POST['phone'])->required()->unique('patients','phone')->regex("/^01[0125][0-9]{8}$/");
  $validation->setValueName("Email")->setValue($_POST['email'])->required()->unique('patients','email')->String()->regex("/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/");
  $validation->setValueName("Password")->setValue($_POST['password'])->required()->confirmed($_POST["password_confirmation"]);
  $validation->setValueName("Password confirmation")->setValue($_POST['password_confirmation'])->required();
  $validation->setValueName("Gender")->setValue($_POST['gender'])->required()->in(['m','f']);
  
if(empty($validation->getErrors()))
{
    $verification_code= rand(100000,999999);


    $patient = new Patient;
    $patient->setFirst_name($_POST['first_name'])->setLast_name($_POST['last_name'])->setEmail($_POST['email'])->setPassword($_POST['password'])->setPhone($_POST['phone'])
    ->setGender($_POST['gender'])->setSocial_status($_POST['socialstatus'])
    ->setVerification_code($verification_code);

    if($patient->create())
    {
     
      $_SESSION['verification_email']=$_POST['email'];
      
echo '<div class="alert text-center pb-5 pt-5 ml-5 mr-5 alert-success" role="alert">
  <h4 class="alert-heading">Well done!</h4>
  <p>Your Account created <big>successfully</big></p>
  <hr>
  <p class="mb-0">Now go to the home page and  </p>
  <a href="home.php">Sign in</a>
</div>';
die;
      
        // header("location:home.php?email=".$_POST['email']);
    }
    else
    {
        $error="<div class='alert alert-danger text-center>Somting went wrong</div>'";
    }
}

}





?>
  <div class=" d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class=" bg-transparent" style= 'border-radius: 15px;'>
            <div class="card-body p-5">
              <h2 class="text-uppercase text-secondary text-center display-4 mb-5">Create an account</h2>

              <form method="post">

                <div class="form-outline mt-4">
                  <input type="text" id="form3Example1cg" placeholder="First Name" value="<?=$_POST['first_name']??''?>"
                    name="first_name" class="form-control form-control-lg" />
                </div>
                <?=$validation->getmessage('First Name')  ?>

                <div class="form-outline mt-4">
                  <input type="text" id="form3Example1cg" placeholder="Last Name" value="<?=$_POST['last_name']??''?>"
                    name="last_name" class="form-control form-control-lg" />
                </div>
                <?=$validation->getmessage('Last Name')  ?>

                <div class="form-outline mt-4">
                  <input type="email" id="form3Example3cg" value="<?=$_POST['email']??''?>" name="email"
                    class="form-control form-control-lg" placeholder="Email" />
                </div>
                <?=$validation->getmessage('Email')  ?>

                <div class="form-outline mt-4">
                  <input type="password" id="form3Example4cg" placeholder="Password" name="password"
                    class="form-control form-control-lg" />
                </div>
                <?=$validation->getmessage('Password')  ?>

                <div class="form-outline mt-4">
                  <input type="password" id="form3Example4cdg" placeholder="Repeat your password"
                    name="password_confirmation" class="form-control form-control-lg" />
                </div>
                <?=$validation->getmessage('Password confirmation')  ?>

                <select name="gender" class="form-control mt-4">
                  <option <?= isset($_POST['gender'])&& $_POST['gender']=='m' ?'selected' : "" ?> value="m">Male
                  </option>
                  <option <?= isset($_POST['gender'])&& $_POST['gender']=='f' ?'selected' : "" ?> value="f">Female
                  </option>

                </select>
                <select name="socialstatus" class="form-control mt-4">
                  <option <?= isset($_POST['gender'])&& $_POST['gender']=='m' ?'selected' : "" ?> value="1">Single
                  </option>
                  <option <?= isset($_POST['gender'])&& $_POST['gender']=='f' ?'selected' : "" ?> value="0">Married
                  </option>

                </select>

                <div class="form-outline mt-4">
                  <input type="number" id="form3Example3cg" value="<?=$_POST['phone'] ?? ''?>" placeholder="Phone" name="phone"
                    class="form-control form-control-lg" />
                </div>
                <?=$validation->getmessage('phone')  ?>

                

                


                <div class="button-box mt-3 d-flex justify-content-center">
                  <button class="btn btn-primary  btn-lg gradient-custom-4 "
                    type="submit"><span>Register</span></button>
                </div>


              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php
include "layouts/script.php";