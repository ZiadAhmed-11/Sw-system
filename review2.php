<?php
session_start();

?>

<!doctype html>
<html lang="en">

<head>
  <title>Title</title>

  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <style>
    body {
      background-image: url('hospital.jpg');
      background-position: center;
      background-repeat: no-repeat;
      background-size: 100em;
      background-attachment: fixed;
    }
  </style>

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
  <div>
    <form method="post" action="Review.php">
      <br>
      <h1 class="text-center mb-3 text-secondary" style="font-size:85px; ">H O S P I T A L</h1>

      <?php

    if($_POST){
        session_start();
        //echo "<h1>". $_POST["phone"][0]."</h1>";
        
    }
    $Qarray=["Are you satisfied with the level of cleanliness?",
    "Are you satisfied with the service prices?",
    "Are you satisfied with the nursing service?",
    "Are you satisfied with the level of the doctor?",
    "Are you satisfied with the calmness in the hospital?"
  ];
 $message='
<div class="mt-5">
<table class="table table-striped">
<thead>
    <tr>
      <th scope="col">Questions</th>
      <th scope="col">bad</th>
      <th scope="col">good</th>
      <th scope="col">v.good</th>
      <th scope="col">excellent</th>
    </tr>
  </thead>
  <tbody>';

  for($i=0;$i<count($Qarray);$i++)
  {
    $message.="
    <tr >
      <th scope='row'>$Qarray[$i]?</th>
      <td><div class='form-check'><input name='q[$i]'; class='form-check-input' type='radio' id='flexRadioDefault1' value=0>
  <label class='form-check-label' for='flexRadioDefault1'></label></div></td>
      <td><div class='form-check'><input name='q[$i]' class='form-check-input' type='radio' id='flexRadioDefault1' value='3'>
  <label class='form-check-label' for='flexRadioDefault1'></label></div></td>
      <td><div class='form-check'><input name='q[$i]' class='form-check-input' type='radio' id='flexRadioDefault1' value='5'>
  <label class='form-check-label' for='flexRadioDefault1'></label></div></td>
      <td><div class='form-check'><input name='q[$i]' class='form-check-input' type='radio' id='flexRadioDefault1' value='10'>
  <label class='form-check-label' for='flexRadioDefault1'></label></div></td>
    </tr>";
  }
    $message.='
  </tbody>
</table>
<div class="container  d-flex justify-content-center  mt-4 ml-5">
<input class="btn btn-primary" type="submit" name="submit" value="Submit" class="btn btn-light  mt-5" >
</div></div>';
echo $message;
if(isset($_POST['submit'])){
$sum=0;
foreach($_POST['q1'[0]] as $key=>$value)
{
   $sum+= $value;
   
}
$_SESSION['sum']=$sum;

header('location:Result.php');
}



?>
    </form>
  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>
</body>

</html>