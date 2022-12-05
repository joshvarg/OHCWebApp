<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>My first PHP</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<body>
<header class="navbar navbar-expand-md"style="background-color: #5acef2">
<div class="text-light" style="font-family: Cambria;font-size: 38px"><strong>&nbsp&nbspOhioHealthCSE</strong></div>
        </header>
<form name="form" action="" method="get">
    <div>
<table class="table table-bordered" border=1>
<tr>
    <th>Hospital</th>
    <th>Address</th>
    <th>HospitalID</th>
    </tr>
<?php 
$conn = new mysqli('localhost', 'phpuser', 'phpwd', 'OHC');
$sql = 'SELECT hName, hAddress, hospitalID FROM hospital';
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_array($result)) {
    echo "<tr><td>";    
    echo $row[0];
    echo '</td>';
    echo "<td>";
    echo $row[1];
    echo '</td>';
    echo "<td>";
    echo $row[2];
    echo '</td>';    
}
?>
</div>
<div>
<a class="button btn-primary btn mb-3" href="./administrator_choose.php" role="button">Back</a>
<a class="button btn-primary btn mb-3" href="./administrator_addHospital.php" role="button">Add a Hospital</a>
</div>
</form>



</body>
</html>