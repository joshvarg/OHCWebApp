<!DOCTYPE html>
<html>
  <head>
    <title>Patient Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>div{text-align: center;height: 100%;}
           html, body{min-height: 100%;max-height: unset;height: 100%;} 
    </style>
  </head>
  <body>
    <header class="navbar navbar-expand-md"style="background-color: #5acef2">
      <div class="text-light" style="font-family: Cambria;font-size: 38px">
        <strong>&nbsp&nbspOhioHealthCSE</strong>
      </div>
    </header>
    <div class="d-flex align-items-center justify-content-center">
<?php
  session_start();
  $_SESSION['treatment']  = $_POST['treatment'];
  $tid = $_POST['treatment'];
  $conn = new mysqli('localhost', 'root', 'mysql', 'OHC');
  $sql = "select dName, doctor.dSSN, tName from treatment, doctor, doctor_treatment_fee where doctor.dSSN=doctor_treatment_fee.dSSN and treatment.TreatmentID='$tid' and doctor_treatment_fee.TreatmentID='$tid'";
  $result = mysqli_query($conn, $sql);
  echo "<div class='vstack gap-3'>";
  echo "<h3>Doctors available</h3>";
  echo "<form method='post' action='filterdoc.php'>";
  echo "<select name='doctor'>";
  while ($row = mysqli_fetch_array($result)) {
    echo "<option value='$row[1]'>$row[0]</option>";
  }  
  echo "</select>";
  echo "<input type='submit' value='Choose Hospital'/>";
  echo "</form>";
  echo "</div>";
?>
    </div>
  </body>
  </html>
