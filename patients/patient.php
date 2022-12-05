<!DOCTYPE html>
<html>
  <head>
    <title>Patient Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>div{text-align: center;height: 100%;}
           html, body{min-height: 100%;max-height: unset;height: 100%;} 
    </style>
  </head>
  <body>
    <header class="navbar navbar-expand-md"style="background-color: #5acef2">
      <div class="text-light" style="font-family: Cambria;font-size: 38px"><strong>&nbsp&nbspOhioHealthCSE</strong></div>
    </header>
    <div class="d-flex align-items-center justify-content-center">
      <form method="post" action="sessiongen.php">
        <label>SSN:</label><br>
        <input name="pSSN" type="text"><br><br>
        <!--<label>Username:</label><br>
        <input name="user" type="text"><br><br>-->
        <input type="submit" value="Login"/>
      </form>
    </div>
  </body>
</html>

