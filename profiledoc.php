<?php



$title="Home";
include "layouts/header.php";
include "App/Http/middlewares/Auth.php";
include "layouts/navbardoc.php";
?>
<body >

  <div class="container" style="margin-top: 80px; padding:20px; 
  background-color: rgba(255,255,255,0.79); border-radius:10px; box-shadow:0 2px 5px rgba(0,0,0,0.5)">
    <div class="row">
      <div class="col-md-4">
        <img src="images/<?= $_SESSION['doctor']->image ?>" alt="User Picture" class="img-fluid rounded-circle ">
      </div>
      <div class="col-md-8">
        <h1 class="display-3">Dr. <?= ucfirst($_SESSION['doctor']->first_name) . " ". ucfirst($_SESSION['doctor']->last_name) ?> </h1>
        <p>Email: <?= $_SESSION['doctor']->email ?></p>
        <p>Phone: <?= $_SESSION['doctor']->phone ?></p>
      </div>
    </div>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
    crossorigin="anonymous"></script>
</body>

</html>