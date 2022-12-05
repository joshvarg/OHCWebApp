<?php
session_start();
$conn = new mysqli('localhost', 'root', 'mysql', 'OHC');
$_SESSION['hID'] = $_POST['hospital'];
$hid = $_SESSION['hID'];
$sql = "select hName from hospital where hospitalID='$hid'";
$result = mysqli_query($conn, $sql);
$_SESSION['hospname']=mysqli_fetch_array($result)[0];
echo "<p>Available appointments for ".$_SESSION['docname']." at ".$_SESSION['hospname'].": </p>";
$sql = "select time, day, dSSN, hospitalID from schedule where dSSN=".$_SESSION['dSSN']." and hospitalID=$hid";
$result = mysqli_query($conn, $sql);
echo "<form method='post' action='insertappt.php'>";
echo "<select name='appointment'>";
while ($row=mysqli_fetch_array($result)) {
  $x = serialize($row);
  echo "<option value='$x'>$row[1] @ $row[0]</option>";
}
echo "</select>";
echo "<input type='submit'/>";
echo "</form>";
?>
