<!DOCTYPE html>
<html>
  <head>
    <title>Patient Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>div{text-align: center;}
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
  $conn = new mysqli('localhost', 'root', 'mysql', 'OHC');
  $sql = "select pName, in_network FROM PATIENT where pName='".$_SESSION["user"]."'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);
  if ($row == null) {
    echo "<div class='vstack'><p>Error, no patient found!</p><br><p><a href='patient.php'>Go Back</a> OR <a href='register.php'>Register Patient</a></p></div>";
  } else {
    echo "<div class='vstack gap-3'>";
    echo "<h1 class='patient-name'>Welcome, ".$_SESSION['user']."</h1>";
    echo "<p>OHC Network Status: <br>";
    if ($row[1]) {
      echo "In OHC Network</p>";
    } else {
      echo "Not in OHC Network</p>";
    }
    echo "<br>";
    echo "<div class='container' id='bill-container'>";
    $bills = "select day, bTime, dName, hName, facility_fee, balance from bill where pSSN=".$_SESSION['pSSN'];
    $bresult = mysqli_query($conn, $bills);
    echo "<h3>Bills</h3>";
    while ($row = mysqli_fetch_array($bresult)) {
      echo "<div class='row'>";
      echo "<div class='col'>$row[0]</div>";
      echo "<div class='col'>$row[1]</div>";
      echo "<div class='col'>$row[2]</div>";
      echo "<div class='col'>$row[3]</div>";
      echo "<div class='col'>$row[4]</div>";
      echo "<div class='col'>$row[5]</div>";
      echo "</div>";
    }
    echo "</div>";
    echo "<div class='container' id='appt-container'>";
    $appts = "select time, day from appointment where pSSN=".$_SESSION['pSSN'];
    $aresult = mysqli_query($conn, $appts);
    echo "<h3>Appointments</h3>";
    while ($row = mysqli_fetch_array($aresult)) {
      echo "<div class='row'>";
      echo "<div class='col'>$row[0]</div>";
      echo "<div class='col'>$row[1]</div>";
      echo "</div>";
    }
    echo "</div>";
    echo "<div id='treatment-container'>";
    echo "<h3 class='container'>Schedule Treatment</h3>";
    echo "<form method='post' action='filterquery.php'>";
    echo "<select class='form-select' name='treatment'>";
    $treatments = "select TreatmentID, tName from treatment";
    $tresult = mysqli_query($conn, $treatments);
    while ($row = mysqli_fetch_array($tresult)) {
      echo "<option value='$row[0]'>$row[1]</option>";
    }
    echo "</select><br>";
    echo "<input type='submit' value='Filter'/>";
    echo "</form>";
    echo "</div>";
    echo "</div>";
  }
?>
    </div>
  </body>
</html>
