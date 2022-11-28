<html>
<body>
<?php $conn = new mysqli('localhost', 'root', 'mysql', 'OHC');
	$sql = "select pName FROM PATIENT where pName='".$_POST["user"]."'";
	$result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);
  if ($row == null) {
    echo "<p>Error, no patient found!</p><br><a href='register.php'>Register Patient</a>";
  } else {
    echo "User: ".$row[0];
  }
?>
</body>
</html>
