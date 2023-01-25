<?php

session_start();

unset($_SESSION['patient']);
unset($_SESSION['doctor']);

header('location:home.php');
?>