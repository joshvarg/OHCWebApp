<!DOCTYPE html>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <style>

        </style>
        <title>Doctor Homepage</title>
    </head>
    <body>
        <header class="navbar navbar-expand-md"style="background-color: #5acef2">
            <div class="text-light" style="font-family: Cambria;font-size: 38px"><strong>&nbsp&nbspOhioHealthCSE</strong></div>
        </header>
        <?php
            session_start();
            $dSSN = $_SESSION["dSSN"];

            $localhost = 'localhost';
            $user = 'phpuser';
            $phpwd = 'phpwd';
            $db = 'OHC';

            $conn = new mysqli($localhost, $user, $phpwd, $db);
        ?>
        <div>
            <div class="container">
                <div class="row justify-content-center" style="margin-top: 10px">
                    <a href="../index.php">Home</a>
                    <div class="col text-center display">
                        <?php
                            $conn = new mysqli($localhost, $user, $phpwd, $db);
                            $sql = 'select dName FROM doctor where doctor.dSSN = '.$dSSN;
                            $result1 = mysqli_query($conn, $sql);
                            while($row = mysqli_fetch_array($result1)) {
                                echo "<div class=\"col text-center display-6\" style=\"font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; margin-top: 40px\"><strong>Welcome, &nbsp;".$row["dName"]." </strong></div>";
                            }
                        ?>
                    </div>
                </div>
                  <ul class="nav nav-tabs nav-fill", style="margin-top:30px">
                    <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href=#>Hospital Details</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="./doctor_homepageTreatments.php">Treatment Details</a>
                    </li>
                  </ul>
                <div class="container">
                     <div class="row justify-content-center">
                     <?php
                     $sql1 = 'select hospital.hName, hospital.hospitalID from hospital, practices_at where practices_at.dssn = \''.$dSSN.'\' and practices_at.hospitalID = hospital.HospitalID';
                     $result1 = mysqli_query($conn, $sql1);

                    while($row1 = mysqli_fetch_array($result1)) {
                        //there should be two tabs, one for hospital and one for treatments.

                        //for the hospital tab, we print out the hospital name, treatments offered, and schedule.
                        //for the treatments tab, we print out all the treatments and associated in/out fees.

                        //print out the hospital name
                        echo '<div class="col text-center display">';
                        echo '<div class="col text-center display" style="font-family:\'Gill Sans\', \'Gill Sans MT\', Calibri, \'Trebuchet MS\', sans-serif; margin-top: 20px"><strong>', $row1["hName"], '</strong></div>';
                        echo '</div>';

                        //print out the treatments offered at the hospital
                        echo '<div class="container">';
                        echo '<div class="col text display">';
                        echo '<div class="col text display" style="font-family:\'Gill Sans\', \'Gill Sans MT\', Calibri, \'Trebuchet MS\', sans-serif; margin-top: 20px"><strong>Treatments</strong></div>';
                        echo '</div>';
                        echo '<div class="container" style="border:1px solid #cecece;">';

                        $sql2 = 'select distinct tName from doctor_treatment, practices_at, treatment where doctor_treatment.dssn = \''.$dSSN.'\' and doctor_treatment.tHID=\''.$row1["hospitalID"].'\' and doctor_treatment.dtCode = treatment.treatmentCode';
                        $result2 = mysqli_query($conn, $sql2);
                        while($row2 = mysqli_fetch_array($result2)) {
                            echo '<div class="col text display style=margin-top: 10px">';
                            echo '<div class="col text display" style="font-family:\'Gill Sans\', \'Gill Sans MT\', Calibri, \'Trebuchet MS\', sans-serif">', $row2["tName"],'</div>';
                            echo '</div>';
                        }
                        echo '</div>';
                        echo '</div>';

                        // print out schedule info
                        echo '<div class="col text display" style="margin-top: 40px">';
                        echo '<div class="col text display" style="font-family:\'Gill Sans\', \'Gill Sans MT\', Calibri, \'Trebuchet MS\', sans-serif; margin-top: 20px"><strong>Available Times</strong></div>';
                        echo '</div>';
                        echo '<div class="container" style="border:1px solid #cecece;">';
                        $sql3 = 'select sTime, day from schedule where schedule.dssn = \''.$dSSN.'\' and schedule.HospitalID=\''.$row1["hospitalID"].'\'';
                        $result3 = mysqli_query($conn, $sql3);
                        while($row3 = mysqli_fetch_array($result3)) {
                            echo '<div class="col text display style=margin-top: 10px">';
                            echo '<div class="col text display" style="font-family:\'Gill Sans\', \'Gill Sans MT\', Calibri, \'Trebuchet MS\', sans-serif"><strong>', $row3["day"],' at", ', $row3["time"], '</strong></div>';
                            echo '</div>';
                        }
                        echo '</div>';
                    }
                     ?>
                    </div>
                </div>
            </div>
            <div class="container" style="margin-top: 30px">
                <a href="./doctor_day_change.php">Change Schedule</a>
            </div>
        </div>
    </body>
</html>
