<?php
  $registerpname = $_POST["fname"]." ".$_POST["lname"];
  $registerpssn = $_POST["pSSN"];
  $registerinnet = $_POST["in_network"];
  $conn = new mysqli('localhost', 'root', 'mysql', 'OHC');
  $sql = "insert into patient(pSSN, pName, in_network)
  values('$registerpssn','$registerpname','$registerinnet')";
  $result = mysqli_query($conn, $sql);
  if ($result) {
    header('Location: home.php');
    exit;
  } else {
    echo "<p>ERROR: Patient not inserted!</p>";
  }
?>
