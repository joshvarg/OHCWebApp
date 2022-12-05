<form method="post" action="insertpatient.php">
  <label>First Name: 
    <input type="text" name="fname" />
  </label><br>
  <label>Last Name: 
    <input type="text" name="lname" />
  </label><br>
  <label>SSN: 
    <input type="text" name="pSSN" />
  </label><br>
  <label>Are you in the OHC network?<br>
    <input type="radio" id="yes" value="1" name="in_network" />
    <label for="yes">Yes</label><br>
    <input type="radio" id="no" value="0" name="in_network" />
    <label for="no">No</label><br>
  </label>
  <button type="submit">Submit</button>
</form>
