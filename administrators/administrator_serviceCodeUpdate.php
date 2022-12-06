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
        $sql = 'SELECT code, hospitalID FROM service_fees';
        $result = mysqli_query($conn, $sql);

        $_SESSION["in_fee"] = $_POST["in_fee"];
        $_SESSION["out_fee"] = $_POST["out_fee"];
        $in_fee = $_SESSION["in_fee"];
        $out_fee = $_SESSION["out_fee"];

        $code = array();
        $hospId = array();
        $count = 0;
        while($row = mysqli_fetch_array($result)) {
            $count++;
        }
        $sql = 'SELECT code, hospitalID FROM service_fees';
        $result = mysqli_query($conn, $sql);
        $i = 0;
        while($row = mysqli_fetch_array($result)) { // Each row is one individual code            
            $code = $row[0];
            $hospID = $row[1];
            $sql = "update SERVICE_FEES set in_fee='".$in_fee[$i]."' where code='".$code."' and hospitalID='".$hospID."'";
            mysqli_query($conn, $sql);  
            $sql = "update SERVICE_FEES set out_fee='".$out_fee[$i]."' where code='".$code."' and hospitalID='".$hospID."'";
            mysqli_query($conn, $sql);
            $i++;
        }
    ?>  
    <meta http-equiv="refresh" content="2;URL=./administrator_serviceCode.php"/>
    </body>

</html>