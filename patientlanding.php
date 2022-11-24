<body>
<?php
  $conn = new mysqli('localhost', 'phpuser', 'phpwd', 'OHC');
  $sql = "select in_network FROM PATIENT";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);
  session_start();
  echo "<h1 class='patient-name'>".$_SESSION['user']."</h1>";
  echo "<div id="main-container">";
  echo "<p>OHC Network Status:".$row[0]."</p>";
?>
    <button type="button">Register</button>
    <br>
    <h3>Schedule Treatment</h3>
    <div id="treatment-container">
      <select>
        <option value="Treatment1">Treatment1</option>
        <option value="Treatment2">Treatment2</option>
        <option value="Treatment3">Treatment3</option>
        <option value="Treatment4">Treatment4</option>
        <option value="Treatment5">Treatment5</option>
        <option value="Treatment6">Treatment6</option>
        <option value="Treatment7">Treatment7</option>
        <option value="Treatment8">Treatment8</option>
      </select>
      <input type="submit" name="Submit" value="Select" />
    </div>
  </div>
</body>
