<html>
<head>
<title>My first PHP</title>
<body>
<form name="form" action="" method="get">
<table border=1>
<tr>
    <th>Hospital</th>
    <th>Service Code</th>
    <th>In Network Fee</th>
    <th>Out of Network Fee</th>
    </tr>
<?php 
$conn = new mysqli('localhost', 'phpuser', 'phpwd', 'OHC');
$sql = 'select hName, code, in_fee, out_fee from service_fees, hospital;';
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_array($result)) {
    echo "<tr><td><input type='text' name='hName' id='hName' value=";    
    echo $row[0];
    echo '></td>';
    echo "<td><input type='text' name='code' id='code' value=";
    echo $row[1];
    echo '></td>';
    echo "<td><input type='text' name='in_fee' id='in_fee' value=";
    echo $row[2];
    echo '></td>';
    echo "<td><input type='text' name='out_fee' id='out_fee' value=";
    echo $row[3];
    echo '></td></tr>';
    $in_fee = $_POST['in_fee'];
    $out_fee = $_POST['out_fee'];
    $code = $_POST['code'];
    $queryInFee = "update hospital, service_fees
                  set in_fee=$in_fee where code='$code'";
    $queryOutFee = "update hospital, service_fees
                  set out_fee=$out_fee where code='$code'";
    $result1 = mysql_query($queryInFee);
    $result2 = mysql_query($queryOutFee);
    
}
?>
<div>
<input type="submit" value="Update Changes" />
</div>
</form>

<script>
var x = document.getElementById("hName").name;
<?php
$conn = new mysqli('localhost', 'phpuser', 'phpwd', 'OHC');
$sql = 'select hName, code, in_fee, out_fee from service_fees, hospital;';
?>
</script>



</body>
</html>