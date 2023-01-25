<?php

use App\Database\Models\Doctor;
use App\Database\Models\Patient;
use App\Http\Requests\Validation;

$title="Login";
include "layouts/header.php";
include "app/Http/middlewares/Guest.php";

include "layouts/navbar.php";

include "App/Http/Requests/Validation.php";
//include "vendor/autoload.php";
include "App/Database/Models/Patient.php";
include "App/Database/Models/Doctor.php";

//submit
//$_POST

$validation=new Validation;
if($_SERVER['REQUEST_METHOD']=='POST'&&!empty($_POST))
 {
  if($_POST['radio']=='pat'){

//validation

    $validation->setValueName('email')->setValue($_POST['email'])->
    required()->regex("/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/")->exists('patients','email');
    $validation->setValueName('password')->setValue($_POST['password'])->required();
if(empty($validation->getErrors()))
    {

        //check if data is correct
        $patient=new Patient;
        $patient->setEmail($_POST['email']);
        $result=$patient->getPatientByEmail();
        if($result->num_rows==1)
        {
            //correct email
            $patientData=$result->fetch_object();
            if(password_verify($_POST['password'],$patientData->password))
            {
              
                
                $_SESSION['patient']=$patientData;
                
                header('location:home_patient.php');die;
            }
            else{
                $error="<p class='text-danger font-weight-bold'>Wronge Email or Password</p>";
            }
        }
        else
        {
            $error="<p class='text-danger font-weight-bold'>Wronge Email or Password</p>";
        }

    }
  }
  else
  
{
  
  $validation->setValueName('email')->setValue($_POST['email'])->
  required()->regex("/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/")->exists('doctors','email');
  $validation->setValueName('password')->setValue($_POST['password'])->required();
if(empty($validation->getErrors()))
  {
  $doctor=new Doctor;
  $doctor->setEmail($_POST['email']);
  $result=$doctor->getDoctorByEmail();
  if($result->num_rows==1)
  {
      //correct email
      $doctorData=$result->fetch_object();
      {
        
          
          $_SESSION['doctor']=$doctorData;
          header('location:home_doctor.php');die;

  

      }
     
    }
  else
  {
      $error="<p class='text-danger font-weight-bold'>Wronge Email or Password</p>";
  }
}

}
 
}

?>

<div>
  <section class="vh-100">
    <div class="container-fluid h-custom">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-9 col-lg-6 col-xl-5">
          <img src="draw2.webp" class="img-fluid" alt="Sample image">
        </div>
        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
          <form method="post">
           

            <div class="divider d-flex align-items-center my-4">
              <h6 class="text-center text-primary mx-3 display-4 mb-0">Login</h6>
            </div>

            <!-- Email input -->
            <div class="form-outline mt-5 mb-4">
              <input type="email" name="email" id="form3Example3" value="<?= $_POST['email'] ?? '' ?>"
                class="form-control  form-control-lg" placeholder="Enter a valid email address" />
              <label class="form-label" for="form3Example3">Email address</label>
              <?= $validation->getMessage('email') ?>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-3">
              <input type="password" name="password" id="form3Example4" class="form-control  form-control-lg"
                placeholder="Enter password" />
              <label class="form-label" for="form3Example4">Password</label>
              <?= $validation->getMessage('password') ?>
              <?= $error ?? "" ?>
            </div>

            <div class="mb-5 mt-2 d-flex justify-content-center d-inline-flex ">
              <div class="mr-5">
            <input type="radio" name="radio" value="pat" class="radio " checked> Patient</div>
            
            <div class="mr-5"><input type="radio" name="radio" value="doc" class="radio" > Doctor</div>
            </div>



            <div class="text-center text-lg-start mt-4 pt-2">
              <button type="submit" class="btn btn-primary btn-lg"
                style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
              <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="register.php"
                  class="link-danger">Register</a></p>
            </div>

          </form>
        </div>
      </div>
    </div>

  </section>
</div>
<div class="bg-transparent   d-inline-flex p-2 ml-5 mb-3">

  <div class="ml-5 pt-3 pb-3 mb-3 pl-5 mr-5">

    <h1 class="display-4 text-secondary">About us</h1>
    <p class=" text-secondary"><em>
        <pre>        The hospital provides the finest and most modern specialized medical care, taking
into account the psychological comfort of the patients. It is characterized by a complete medical
and 5 stars hotel like service with the same efficiency. The operating rooms are equipped with 
the latest and most accurate global standards.The hospital is one of the best in obstetrics and
gynecology, IVF and neonatal(pre-mature infants).
And has recently opened outpatient clinics including more specialties attended by the most reliable
professors and consultants.
              </pre> </em></p>
    <div id="carouselExampleIndicators" class="carousel mb-5 w-75  slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block " src="99.jpg" alt="First slide">
        </div>
        <div class="carousel-item">
          <img class="d-block " src="10.jpg" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block " src="20.jpg" alt="Third slide">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    <!-- <img src="99.jpg" alt="Hospital" width="500" height="290">  -->
  </div>
</div>
<div class="mt-3 pl-5 pr-5 mb-5 pb-5 pt-5 bg-light">
  <h3 class="text-center display-5">THE FOUR COMMON DISEASES IN EGYPT<br>YOU NEED TO KNOW</h3>
  <div class="row d-flex  justify-content-center align-items-center ">
    <img src="p.jpg" alt="Egypt" height="350">

    <p class="pl-5 mt-3 ml-5 pr-5 text-secondary mr-5"> <span class="display-4 text-dark"> According to the CIA
        World,</span> the four most common diseases in Egypt are bacterial diarrhea, typhoid fever, hepatitis A and
      schistosomiasis. People in the country are at intermediate risk for contracting these illnesses.

      Bacterial diarrhea, also referred to as bacterial gastroenteritis, is a stomach and intestine infection. It is
      spread through eating or drinking contaminated food and water. Depending on which bacteria are ingested, different
      symptoms may surface. The symptoms most associated with bacterial diarrhea are abdominal pain/cramps, loss of
      appetite, bloody stool, nausea and vomiting.

      Fortunately, it only takes a couple of days for someone to recover from this infection fully. In the meantime,
      they should ward off dehydration by drinking enough fluids and getting enough rest, especially young children.
      <br><br> If nausea and vomiting are preventing someone from getting their fluids, getting fluids via IV is also an
      option.

      Enteric fever, more commonly known as typhoid fever, is a life-threatening bacterial disease. People carry the
      Salmonella Typhi in their bloodstream and intestinal tract. When carriers or infected individuals shed the
      bacteria in their stool, they can infect others by handling food or drinks. People can also be infected if they
      wash food with or drink contaminated water.

      Symptoms of typhoid fever include feelings of weakness, headaches, stomach pains, loss of appetite and, in some
      cases, rashes. Because these symptoms are not unique to typhoid fever, getting stool or blood samples tested is
      the best way to know if someone is infected.

      There are vaccines and antibiotics available to prevent and treat typhoid fever.<br><br>

      Another one of the most common diseases in Egypt is hepatitis A. The hepatitis A virus causes viral liver disease.
      It is transmitted by ingesting contaminated food and water or direct contact with an infected individual.

      While hepatitis A by itself is rarely fatal and does not cause chronic liver disease, it can cause incapacitating
      symptoms and fatal acute liver failure if left untreated. Symptoms of hepatitis A include jaundice, malaise,
      fever, loss of appetite, nausea, abdominal discomfort and dark-colored urine. These symptoms can manifest anywhere
      from mild to severe.

      At the time of writing, there is no cure for hepatitis A, only preventative methods. These include drinking clean
      water, proper disposal of sewage materials and practicing good hygiene with clean water.

      Schistosomiasis, also referred to as bilharzia, is a chronic and acute disease brought on by parasitic worms.
      <br><br>Anyone who comes into contact with infected water is at risk of contracting it.

      In reaction to the invading worms’ eggs, an infected person can experience diarrhea, abdominal pain and bloody
      stool. In extreme cases, there may also be liver and/or spleen enlargement. Children are at risk of having their
      growth stunted, developing learning complications and anemia. Fortunately, treatment can typically undo these
      effects.

      As of now, ingesting clean water, avoiding exposure to contaminated water, similar preventative measures and
      taking the prescribed medications are the ways to deal with schistosomiasis.

      While the most common diseases in Egypt may not all have cures, they are certainly not a death sentence. With
      proper preventative care and medication, people can wrest control of their bodies from these illnesses.
    </p>
  </div>
</div>

<div class="mt-5 mb-5">
  <p class="text-center text-muted mb-0 ">Testimonials</p>
  <h3 class="text-center mb-4 display-4">What Our Clients Say</h3>
  <div class=" p-4">
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col"><img class="mr-5 border" src="ao.jpg" alt="Ahmed Osama" width="50" height="50"> Ahmed Osama
          </th>
          <th scope="col"><img class="mr-5" src="ft.jpg" alt="Ahmed Osama" width="50" height="50">Fathy Talat</th>
          <th scope="col"><img class="mr-5" src="yy.jpg" alt="Ahmed Osama" width="50" height="50">Youssif Yassen</th>
        </tr>
      </thead>
      <tbody>
        <tr>
        <tr>
          <td> <b> <big>"</big></b> Anyone who comes into contact with infected water is at risk of contracting it. In
            reaction to the invading worms’ eggs, an infected person can experience diarrhea, abdominal pain and bloody
            stool. <b> <big>"</big></b></td>
          <td><b> <big>"</big></b> Another one of the most common diseases in Egypt is hepatitis A. The hepatitis A
            virus causes viral liver disease. It is transmitted by ingesting contaminated food and water or direct
            contact with an infected individual. <b> <big>"</big></b></td>
          <td><b> <big>"</big></b> Anyone who comes into contact with infected water is at risk of contracting it. In
            reaction to the invading worms’ eggs, an infected person can experience diarrhea, abdominal pain and bloody
            stool. <b> <big>"</big></b></td>
        </tr>

        </tr>
      </tbody>
    </table>
  </div>
</div>
<?php
include "layouts/footer.php";
include "layouts/script.php";