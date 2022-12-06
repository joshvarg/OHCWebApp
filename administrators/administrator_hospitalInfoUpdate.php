<!DOCTYPE html>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <style>

        </style>
        <title></title>
    </head>
    <body>
        <header class="navbar navbar-expand-md"style="background-color: #5acef2">
            <div class="text-light" style="font-family: Cambria;font-size: 38px"><strong>&nbsp&nbspOhioHealthCSE</strong></div>
        </header>
        <?php
        session_start();
        $conn = new mysqli('localhost', 'phpuser', 'phpwd', 'OHC');
        
        $_SESSION["hName"] = $_POST["hName"];
        $_SESSION["hospitalID"] = $_POST["hospitalID"];
        $_SESSION["hAddress"] = $_POST["hAddress"];
        $hospName = $_SESSION["hName"];
        $hospID = $_SESSION["hospitalID"];
        $hospAddress = $_SESSION["hAddress"];

        $sql = "insert into HOSPITAL(hName, hospitalID, hAddress) value ('".$hospName."', '".$hospID."', '".$hospAddress."')";       
        mysqli_query($conn, $sql);        
    ?>  
    <meta http-equiv="refresh" content="2;URL=./administrator_hospitalInfo.php"/>
    </body>

</html>