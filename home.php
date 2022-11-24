<form method="post">
<?php
  session_start();
  $_SESSION['user'] = $_POST['user'];
?>
  <label for="user">Username:</label><br>
  <input type="text"><br>
  <label for="view">Occupation:</label><br>
  <input type="radio" id="admin" value="Administrator" name="Occupation">
  <label for="admin">Administrator</label><br>
  <input type="radio" id="patient" value="Patient" name="Occupation">
  <label for="patient">Patient</label><br>
  <input type="radio" id="doctor" value="Doctor" name="Occupation">
  <label for="doctor">Doctor</label>
</form>
