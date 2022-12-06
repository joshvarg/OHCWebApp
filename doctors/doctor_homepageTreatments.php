<!DOCTYPE html>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <style>

        </style>
        <title>Doctor Homepage Treatments</title>
    </head>
    <body>
        <header class="navbar navbar-expand-md"style="background-color: #5acef2">
            <div class="text-light" style="font-family: Cambria;font-size: 38px"><strong>&nbsp&nbspOhioHealthCSE</strong></div>
        </header>
        <?php
            session_start();
            $dSSN = $_SESSION["dSSN"];
            $localhost = 'localhost';
            $user = 'david';
            $phpwd = 'phpwd';
            $db = 'OHCTEST';

            $conn = new mysqli($localhost, $user, $phpwd, $db);
        ?>
        <div>
            <div class="container">
                <div class="row justify-content-center" style="margin-top: 10px">
                    <div class="col text-center display">
                        <div class="col text-center display-6" style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; margin-top: 40px"><strong>Welcome, ______! </strong></div>
                    </div>
                </div>
                  <ul class="nav nav-tabs nav-fill", style="margin-top:30px">
                    <li class="nav-item">
                      <a class="nav-link" aria-current="page" href="./doctor_homepage.php">Hospital Details</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href=#>Treatment Details</a>
                    </li>
                  </ul>
                <div class="container">
                     <div class="row justify-content-center">
                     <?php
                     $sql = 'select tName, inFee, outFee from doctor_treatment_fee where doctor_treatment_fee.dssn = \''.$dSSN.'\'';
                     $result = mysqli_query($conn, $sql);

                    while($row = mysqli_fetch_array($result)) {
                        //in the treatments tab, print out all the treatment names and associated in/out fees.

                        echo '<div class="col text-center display">';
                        echo '<div class="col text-center display" style="font-family:\'Gill Sans\', \'Gill Sans MT\', Calibri, \'Trebuchet MS\', sans-serif; margin-top: 10px">', $row["tName"],'</div>';
                        echo '<div class="col text-center display" style="font-family:\'Gill Sans\', \'Gill Sans MT\', Calibri, \'Trebuchet MS\', sans-serif">In fee: ', $row["inFee"],'</div>';
                        echo '<div class="col text-center display" style="font-family:\'Gill Sans\', \'Gill Sans MT\', Calibri, \'Trebuchet MS\', sans-serif">Out fee: ', $row["outFee"],'</div>';
                        echo '</div>';
                     }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>