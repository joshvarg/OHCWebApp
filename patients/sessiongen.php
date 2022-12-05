<?php
session_start();
  $_SESSION['pSSN'] = $_POST['pSSN'];
  $_SESSION['user'] = $_POST['user'];
  header('location: patientlanding.php');
  exit;
?>
