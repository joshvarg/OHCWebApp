<form method="post" action="sessiongen.php">
  <label>SSN:</label><br>
  <input name="pSSN" type="text"><br>
  <label>Username:</label><br>
  <input name="user" type="text"><br>
  <label for="view">Occupation:</label><br>
  <input type="radio" id="admin" value="Administrator" name="Occupation">
  <label for="admin">Administrator</label><br>
  <input type="radio" id="patient" value="Patient" name="Occupation">
  <label for="patient">Patient</label><br>
  <input type="radio" id="doctor" value="Doctor" name="Occupation">
  <label for="doctor">Doctor</label>
  <input type="submit"/>
</form>

