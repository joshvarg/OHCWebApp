<?php
  session_start();
  $_SESSION['treatment']  = $_POST['treatment'];
  $tid = $_POST['treatment'];
  $conn = new mysqli('localhost', 'root', 'mysql', 'OHC');
  $sql = "select dName, doctor.dSSN from doctor, doctor_treatment_fee where doctor.dSSN=doctor_treatment_fee.dSSN and doctor_treatment_fee.TreatmentID='$tid'";
  $result = mysqli_query($conn, $sql);
  echo "<form method='post' action='filterdoc.php'>";
  echo "<select name='doctor'>";
  while ($row = mysqli_fetch_array($result)) {
    echo "<option value='$row[1]'>$row[0]</option>";
  }  
  echo "</select>";
  echo "<input type='submit'/>";
  echo "</form>";
?>
