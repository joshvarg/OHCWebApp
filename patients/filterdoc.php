<?php
session_start();
$conn = new mysqli('localhost', 'root', 'mysql', 'OHC');
$_SESSION['dSSN'] = $_POST['doctor'];
$dssn=$_SESSION['dSSN'];
$sql = "select dName from doctor where dSSN='$dssn'";
$result = mysqli_query($conn, $sql);
$_SESSION['docname']=mysqli_fetch_array($result)[0];
echo "<p>Available hospitals: </p>";
$sql = "select hName, hospital.hospitalID, hAddr from practices_at, hospital where hospital.hospitalID=practices_at.hospitalID and dSSN='$dssn'";
$result = mysqli_query($conn, $sql);
echo "<form method='post' action='filterhosp.php'>";
echo "<select name='hospital'>";
while ($row=mysqli_fetch_array($result)) {
  echo "<option value='$row[1]'>$row[0]</option>";
}
echo "</select>";
echo "<input type='submit' />";
echo "</form>";
?>
