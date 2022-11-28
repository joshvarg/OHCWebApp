<html>
<body>
<?php $conn = new mysqli('localhost', 'root', 'mysql', 'OHC');
	$sql = "select pName FROM PATIENT where pName='".$_POST["user"]."'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);
?>
User: <?php echo $row[0]; ?>
</body>
</html>