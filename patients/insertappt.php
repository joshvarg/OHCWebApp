<?php
session_start();
$appt = unserialize($_POST['appointment']);
$conn = new mysqli('localhost', 'phpuser', 'phpwd', 'OHC');
$sql = "insert into appointment(pSSN, time, day, dSSN, hospitalID)
values
('".$_SESSION['pSSN']."','".$appt[0]."','".$appt[1]."','".$appt[2]."','".$appt[3]."')";
$result = mysqli_query($conn, $sql);
if ($result) {
  header('location: patientlanding.php');
  exit;
}
?>
