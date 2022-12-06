<!DOCTYPE html>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <style>

        </style>
        <title>Hospital Selection</title>
    </head>
    <body>
        <?php
            session_start();
            $_SESSION["dSSN"] = $_POST["dSSN"];

            $dName = $_POST["dName"];
            $dSSN = $_POST["dSSN"];

            $localhost = 'localhost';
            $user = 'phpuser';
            $phpwd = 'phpwd';
            $db = 'OHC';

            $conn = new mysqli($localhost, $user, $phpwd, $db);
            $sql = "insert into doctor(dSSN, dName) value ('".$dSSN."','".$dName."')";
            $result = mysqli_query($conn, $sql);
        ?>
        <header class="navbar navbar-expand-md"style="background-color: #5acef2">
            <div class="text-light" style="font-family: Cambria;font-size: 38px"><strong>&nbsp&nbspOhioHealthCSE</strong></div>
        </header>
        <div>
            <div class="container">
                <div class="row justify-content-center" style="margin-top: 100px">
                    <div class="col text-center display h5" style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif">
                        <strong>
                            Please select the hospital(s) you are associated with:</br>
                        </strong>
                    </div>
                </div>
                <div class="row" style="margin-top: 30px">
                    <div class="col text-center display">
                        <div class="btn-group-vertical btn-group-lg" role="group" aria-label="Hospital Selection">
                            <form action="./doctor_hospital_days.php" method="post">
                                <?php
                                    $conn = new mysqli($localhost, $user, $phpwd, $db);
                                    $sql = "select hName, HospitalID FROM HOSPITAL";
                                    $result = mysqli_query($conn, $sql);
                                        while($row = mysqli_fetch_array($result)) {
                                            echo '<input type="checkbox" class="btn-check" id="', $row['hName'], '" name="hosp[]" value="', $row['HospitalID'] ,'" autocomplete="off">
                                                  <label class="btn btn-outline-primary" for="', $row['hName'], '">', $row['hName'], '</label>';
                                        }
                                ?><br>
                                <div class="row justify-content-end" style="margin-top: 30px">
                                    <div class="col-1">
                                        <input type="submit">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>