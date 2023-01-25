<?php



$title="Home";
include "layouts/header.php";
include "App/Http/middlewares/Auth.php";
include "layouts/navbar.php";
?>
<div class="p-10 bg-transparent mt-5 mb-5 pt-5">
  <div class="container">
    <div class="card">
      <div class="card-header">
        <h6>Appointments</h6>

      </div>
      <div class="table-responsive">
        <table class="table table-hover table-nowrap">
          <thead class="table-light">
            <tr>
              <th scope="col">Doctor Name</th>
              <th scope="col">Time</th>
              <th scope="col">Email</th>
              <th scope="col">Phone</th>
              
              <th></th>
            </tr>
          </thead>
          <tbody>
<?php 
$conn=mysqli_connect("localhost","root","","hospital_fci");

$req="SELECT doctor_id,time_choosen  FROM appoints where patient_id= ". $_SESSION['patient']->id ;
$query1=mysqli_query($conn,$req);
while($fetch=mysqli_fetch_object($query1))
{
?>
              <?php   
$req2="SELECT first_name, last_name, phone, email FROM doctors where id= ". $fetch->doctor_id ;
$query2=mysqli_query($conn,$req2);
$fetch2=mysqli_fetch_object($query2);
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
             
              
              <td data-label="" class="text-end">
                <div class="dropdown">
                  <a class="text-muted" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="bi bi-three-dots-vertical"></i>
                  </a>
                  <div class="dropdown-menu dropdown-menu-end">
                    <a href="#!" class="dropdown-item">
                      Action
                    </a>
                    <a href="#!" class="dropdown-item">
                      Another action
                    </a>
                    <a href="#!" class="dropdown-item">
                      Something else here
                    </a>
                  </div>
                </div>
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
