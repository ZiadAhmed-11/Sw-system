<?php



$title="Home";
include "layouts/header.php";
include "App/Http/middlewares/Auth.php";
include "layouts/navbar.php";

?>
<h1 class="text-center mb-3 text-info" style="font-size:85px; ">H O S P I T A L</h1>
    
  
<div>
    <form method="post" action="Result.php">    
      <?php

    
    $Qarray=["Are you satisfied with the level of cleanliness",
    "Are you satisfied with the service prices",
    "Are you satisfied with the nursing service",
    "Are you satisfied with the level of the doctor",
    "Are you satisfied with the calmness in the hospital"
  ];
 $message='
<div class="mt-5">
<table class="table container table-striped">
<thead>
    <tr>
      <th scope="col">Questions</th>
      <th scope="col">Result</th>
      
    </tr>
  </thead>
  <tbody>';
  
$total=0;
  for($i=0;$i<count($Qarray);$i++)
  {
    $total+=$_POST["q$i"];
    $message.="
    <tr >
      <th scope='row'>$Qarray[$i]?</th>
      <td><div>
      ";
      if($_POST["q$i"]==0)
      {
        $message.="<h6 class='text-danger'>bad";
      }
      elseif($_POST["q$i"]==3)
      {
        $message.="<h6 class='text-secondary'> good";
      }
      elseif($_POST["q$i"]==5)
      {
        $message.="<h6 class='text-info'> v.good";
      }
      else{
        $message.="<h6 class='text-success'> excellent";}
      $message.="</h6></label></div></td>
      
    </tr>";
  }
    $message.='
  </tbody>
</table>
</div>';
if($total>=25)
{
  $message.='<div class="alert container col-2 text-center alert-success" role="alert">
  Thanks
</div>';
}
else
{
  $message.="<div class='alert container col-5 text-center alert-danger' role='alert'>
  We will call you later on your phone: {$_SESSION['patient']->phone}</b>  
</div>";
}
echo $message;

?>

   <footer class="bg-light text-center mt-5 text-lg-start">
  <!-- Copyright -->
  <div class="text-center p-3 mb-0 bg-info " >
    © 2022 Copyright:
    <a class="text-dark" href="https://visitegypt.gov.eg/">visitegypt.gov.eg</a>
  </div>
  <!-- Copyright -->
</footer>
  
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

