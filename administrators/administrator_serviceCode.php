<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Service Code Edit</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<body>
<header class="navbar navbar-expand-md"style="background-color: #5acef2">
<div class="text-light" style="font-family: Cambria;font-size: 38px"><strong>&nbsp&nbspOhioHealthCSE</strong></div>
        </header>
<form name="form" action="./administrator_serviceCodeUpdate.php" method="POST">
    <div>
<table class="table table-bordered" border=1>
<tr>
    <th>Hospital</th>
    <th>Service Code</th>
    <th>In Network Fee</th>
    <th>Out of Network Fee</th>
    </tr>
<?php 
session_start();
$conn = new mysqli('localhost', 'phpuser', 'phpwd', 'OHC');
$sql = 'SELECT hName, code, in_fee, out_fee FROM service_fees, hospital WHERE service_fees.hospitalid = hospital.hospitalid;';
$result = mysqli_query($conn, $sql);
$in_fee_array = array();
$out_fee_array = array();

while($row = mysqli_fetch_array($result)) {
    echo "<tr><td>";    
    echo $row[0];
    echo '</td>';
    echo "<td>";
    echo $row[1];
    echo '</td>';
    echo "<td><input type='text' name='in_fee[]' id='in_fee' value=";
    echo $row[2];
    echo '></td>';
    echo "<td><input type='text' name='out_fee[]' id='out_fee' value=";
    echo $row[3];
    echo '></td></tr>';  
}
?>
</div>
<div>
    <a href="administrator_serviceCodeUpdate.php">
        <input type="submit" value="Update Changes"/>
    </a>
</div>
</form>
</body>
</html>