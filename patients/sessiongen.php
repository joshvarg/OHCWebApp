<?php
session_start();
$_SESSION['pSSN'] = $_POST['pSSN'];
  $conn = new mysqli('localhost', 'root', 'mysql', 'OHC');
  $sql = "select pName FROM PATIENT where pSSN='".$_SESSION['pSSN']."'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);
  $_SESSION['user'] = $row[0];
  header('location: patientlanding.php');
  exit;
?>
