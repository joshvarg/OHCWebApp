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
$conn = new mysqli('localhost', 'root', 'mysql', 'OHC');
$_SESSION['dSSN'] = $_POST['doctor'];
$dssn=$_SESSION['dSSN'];
$sql = "select dName from doctor where dSSN='$dssn'";
$result = mysqli_query($conn, $sql);
$_SESSION['docname']=mysqli_fetch_array($result)[0];
echo "<div class='vstack'>";
echo "<h3>Available hospitals: </h3>";
$sql = "select hName, hospital.hospitalID, hAddr from practices_at, hospital where hospital.hospitalID=practices_at.hospitalID and dSSN='$dssn'";
$result = mysqli_query($conn, $sql);
echo "<form method='post' action='filterhosp.php'>";
echo "<select class='form-select' name='hospital'>";
echo "<option selected>Choose Hospital</option>";
while ($row=mysqli_fetch_array($result)) {
  echo "<option value='$row[1]'>$row[0]</option>";
}
echo "</select><br>";
echo "<input type='submit' value='Find Times'/>";
echo "</form>";
echo "</div>";
?>
    </div>
  </body>
</html>
