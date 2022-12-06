<!DOCTYPE html>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <style>

        </style>
        <title>Schedule Day Selection</title>
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

            if(isset($_POST['hosp'])){
                if (is_array($_POST['hosp'])) {
                        foreach($_POST['hosp'] as $hospital){
                        $sql = "insert into practices_at(dSSN, hospitalID, fee) value ('".$dSSN."','".$hospital."', 50)";
                        $result = mysqli_query($conn, $sql);
                    }
                } else {
                    $sql = "insert into practices_at(dSSN, hospitalID, fee) value ('".$dSSN."','".$hospital."', 50)";
                    $result = mysqli_query($conn, $sql);
                }
            }
        ?>
        <div>
            <div class="container">
                <form action="./doctor_day_times.php" method="post">
                    <?php
                        $dSSN = $_SESSION["dSSN"];
                        $conn = new mysqli($localhost, $user, $phpwd, $db);
                        $sql = 'select hospital.hName, hospital.HospitalID FROM hospital, practices_at where practices_at.dSSN = "'.$dSSN.'" and hospital.HospitalID = practices_at.hospitalID';
                        $result = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_array($result)) {
                            echo '<div class="row text_center justify-content-center" style="margin-top: 30px';
                            echo '<div class="text-center">
                                <div class="text-center" style="font-family:\'Gill Sans\', \'Gill Sans MT\', Calibri, \'Trebuchet MS\', sans-serif; margin-top: 100px"><strong>Please select the day(s) you can be scheduled in ', $row['hName'],'</strong></div>
                                    <div class="d-flex justify-content-center" style="margin-top: 10px">
                                        <div class="btn-group" role="group" aria-label="', $row['hName'],' Day Selection">
                                            <input type="checkbox" class="btn-check" id="Monday', $row['HospitalID'],'" name="hosp', $row['HospitalID'],'[]" value="Monday" autocomplete="off">
                                            <label class="btn btn-outline-primary" for="Monday', $row['HospitalID'],'">Monday</label>
                              
                                            <input type="checkbox" class="btn-check" id="Tuesday', $row['HospitalID'],'" name="hosp', $row['HospitalID'],'[]" value="Tuesday" autocomplete="off">
                                            <label class="btn btn-outline-primary" for="Tuesday', $row['HospitalID'],'">Tuesday</label>
                              
                                            <input type="checkbox" class="btn-check" id="Wednesday', $row['HospitalID'],'" name="hosp', $row['HospitalID'],'[]" value="Wednesday" autocomplete="off">
                                            <label class="btn btn-outline-primary" for="Wednesday', $row['HospitalID'],'">Wednesday</label>

                                            <input type="checkbox" class="btn-check" id="Thursday', $row['HospitalID'],'" name="hosp', $row['HospitalID'],'[]" value="Thursday" autocomplete="off">
                                            <label class="btn btn-outline-primary" for="Thursday', $row['HospitalID'],'">Thursday</label>
                              
                                            <input type="checkbox" class="btn-check" id="Friday', $row['HospitalID'],'" name="hosp', $row['HospitalID'],'[]" value="Friday" autocomplete="off">
                                            <label class="btn btn-outline-primary" for="Friday', $row['HospitalID'],'">Friday</label>
                              
                                            <input type="checkbox" class="btn-check" id="Saturday', $row['HospitalID'],'" name="hosp', $row['HospitalID'],'[]" value="Saturday" autocomplete="off">
                                            <label class="btn btn-outline-primary" for="Saturday', $row['HospitalID'],'">Saturday</label>

                                            <input type="checkbox" class="btn-check" id="Sunday', $row['HospitalID'],'" name="hosp', $row['HospitalID'],'[]" value="Sunday" autocomplete="off">
                                            <label class="btn btn-outline-primary" for="Sunday', $row['HospitalID'],'">Sunday</label>
                                        </div>
                                    </div>
                                </div>';
                            echo '</div>';
                            echo '</div>';
                        }
                    ?>
                    <div class="row justify-content-end style="margin-top: 50px"">
                        <div class="col-1">
                            <input type="submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>