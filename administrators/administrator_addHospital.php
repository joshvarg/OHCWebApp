<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Add Hospital</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<body>
<header class="navbar navbar-expand-md"style="background-color: #5acef2">
<div class="text-light" style="font-family: Cambria;font-size: 38px"><strong>&nbsp&nbspOhioHealthCSE</strong></div>
        </header>
<form name="form2" action="./administrator_hospitalInfoUpdate.php" method="POST">
<div style="position:absolute; left:40px; top:90px;">
    <br><br>
<?php
session_start();
echo "Hospital Name:    <br><input type='text' name='hName' id='hName'><br><br>";
echo "Hospital ID:      <br><input type='text' name='hospitalID' id='hospitalID'/><br><br>";
echo "Hospital Address: <br><input type='text' name='hAddress' id='hAddress'/><br><br>";
?>
<br>
</div>
    <br>
        <div style="position:absolute; left:60px; top:98px;">
    <a href="administrator_hospitalInfoUpdate.php">
        <input type="submit" value="Add Hospital"/>
    </a>
</div>
</form>
</div>

</body>
</html>