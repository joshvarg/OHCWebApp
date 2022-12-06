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
$conn = new mysqli('localhost', 'phpuser', 'phpwd', 'OHC');
$_SESSION['hID'] = $_POST['hospital'];
$hid = $_SESSION['hID'];
$sql = "select hName from hospital where hospitalID='$hid'";
$result = mysqli_query($conn, $sql);
$_SESSION['hospname']=mysqli_fetch_array($result)[0];
echo "<div class='vstack'>";
echo "<h3>Available appointments for ".$_SESSION['docname']." at ".$_SESSION['hospname'].": </h3>";
$sql = "select time, day, dSSN, hospitalID from schedule where dSSN=".$_SESSION['dSSN']." and hospitalID=$hid";
$result = mysqli_query($conn, $sql);
echo "<div class='container'>";
echo "<form method='post' action='insertappt.php'>";
echo "<select class='form-select' name='appointment'>";
echo "<option selected>Choose Time</option>";
while ($row=mysqli_fetch_array($result)) {
  $x = serialize($row);
  echo "<option value='$x'>$row[1] @ $row[0]</option>";
}
echo "</select><br>";
echo "<input type='submit' value='Schedule appointment'/>";
echo "</form>";
echo "</div>";
echo "</div>";
?>

    </div>
  </body>
</html>
