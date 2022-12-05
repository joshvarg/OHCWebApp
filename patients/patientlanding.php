<body>
<?php
  session_start();
  $conn = new mysqli('localhost', 'root', 'mysql', 'OHC');
  $sql = "select pName, in_network FROM PATIENT where pName='".$_SESSION["user"]."'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);
  if ($row == null) {
    echo "<p>Error, no patient found!</p><p><a href='home.php'>Go Back</a> OR <a href='register.php'>Register Patient</a></p>";
  } else {
    echo "<h1 class='patient-name'>".$_SESSION['user']."</h1>";
    echo "<div id='main-container'>";
    echo "<p>OHC Network Status: ";
    if ($row[1]) {
      echo "In OHC Network</p>";
    } else {
      echo "Not in OHC Network</p>";
    }
    echo "<br>";
    echo "<h3>Schedule Treatment</h3>";
    echo "<div id='treatment-container'>";
    echo "<form method='post' action='filterquery.php'>";
    echo "<select name='treatment'>";
    $treatments = "select TreatmentID, tName from treatment";
    $tresult = mysqli_query($conn, $treatments);
    while ($row = mysqli_fetch_array($tresult)) {
      echo "<option value='$row[0]'>$row[1]</option>";
    }
    echo "</select>";
    echo "<input type='submit'/>";
    echo "</form>";
    echo "</div>";
    echo "</div>";
    echo "</body>";
  }
?>
