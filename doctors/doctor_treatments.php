<!DOCTYPE html>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <style>

        </style>
        <title>Treatment Selection</title>
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
            $sql = 'select pHID from practices_at where practices_at.dSSN = "'.$dSSN.'"';
            $result1 = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_array($result1)) {
                $HID = $row['pHID'];
                $sql = 'select Day from doctor_days where doctor_days.HospitalID = "'.$row['pHID'].'" and doctor_days.dSSN = "'.$dSSN.'" order by field(Day, "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday")';
                $result2 = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_array($result2)) {
                    if (is_array($_POST["time".$row["Day"].$HID])) {
                            foreach($_POST["time".$row["Day"].$HID] as $Time){
                            $sql = 'insert into schedule(Time, Day, dSSN, HospitalID) value ("'.$Time.'", "'.$row["Day"].'", "'.$dSSN.'", "'.$HID.'")';
                            $result3 = mysqli_query($conn, $sql);
                        }
                    } else {
                        $sql = 'insert into schedule(Time, Day, dSSN, HospitalID) value ("'.$Time.'", "'.$row["Day"].'", "'.$dSSN.'", "'.$HID.'")';
                        $result3 = mysqli_query($conn, $sql);
                    }
                }
            }
        ?>
        <div>
            <div class="container">
                <form method="post" action="./doctor_treatmentfees.php">
                    <div class="row justify-content-center" style="margin-top: 30px">
                        <?php
                            $dSSN = $_SESSION["dSSN"];
                            $conn = new mysqli($localhost, $user, $phpwd, $db);
                            $sql1 = 'select hName, HospitalID from hospital, practices_at where practices_at.dSSN = \''.$dSSN.'\' and practices_at.pHID = hospital.HospitalID';
                            $result1 = mysqli_query($conn, $sql1);
                            $sql2 = 'select tName, TreatmentCode from treatment';
                            while($row = mysqli_fetch_array($result1)) {
                                $HID = $row['HospitalID'];
                                echo "<div class=\"col text-center display\">";
                                echo "<div class=\"col text-center display\" style=\"font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; margin-top: 100px\"><strong>Please select the treatment(s) you would like to perform at ", $row['hName']," Hospital. </strong></div>";
                                echo "<div class=\"row\" style=\"margin-top: 30px\">";
                                echo "<div class=\"btn-group-vertical\" role=\"group\" aria-label=\"Treatment Selection\">";
                                $result2 = mysqli_query($conn, $sql2);
                                while($row = mysqli_fetch_array($result2)) {
                                    echo "<input type=\"checkbox\" class = \"btn-check\" autocomplete=\"off\" id=\"", $row['tName'].''.$HID, "\" autocomplete=\"off\" name=\"treatment".$HID."[]\" value=\"", $row['TreatmentCode'], "\">
                                    <label class=\"btn btn-outline-primary\" for=\"", $row['tName'].''.$HID, "\">", $row['tName'], "</label>";
                                }
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                            }
                        ?>
                    </div>
                    <div class="row justify-content-end" style="margin-top: 30px">
                        <div class="col-1">
                            <input type="submit">
                        </div>
                    </div>
                </form>    
            </div>
        </div>
    </body>
</html>