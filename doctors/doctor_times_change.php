<!DOCTYPE html>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <style>

        </style>
        <title></title>
    </head>
    <body>
        <header class="navbar navbar-expand-md" style="background-color: #5acef2">
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
            $sql = "delete from schedule where dSSN = ".$dSSN;
            $result = mysqli_query($conn, $sql);
        ?>
        <div>
            <div class="container">
                <form action="./doctor_times_change_submit.php" method="post">
                    <?php
                        $dSSN = $_SESSION["dSSN"];
                        $conn = new mysqli($localhost, $user, $phpwd, $db);

                        $sql = 'select hospitalID from practices_at where practices_at.dSSN = "'.$dSSN.'"';
                        $result1 = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_array($result1)) {
                            $HID = $row[0];
                            echo '<div style="margin-top: 75px;">';
                            $sql = 'select Day, hName from doctor_days, hospital where hospital.HospitalID = "'.$row[0].'" and doctor_days.HospitalID = "'.$row[0].'" and doctor_days.dSSN = "'.$dSSN.'" order by field(Day, "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday")';
                            $result2 = mysqli_query($conn, $sql);
                            while($row = mysqli_fetch_array($result2)) {
                                echo '<div class="row justify-content-center"">
                                    <div class="col text-center display">
                                        <div class="col text-center display" style="font-family:\'Gill Sans\', \'Gill Sans MT\', Calibri, \'Trebuchet MS\', sans-serif; margin-top: 20px"><strong>Please select the time(s) you can be scheduled on '.$row["Day"].' for '.$row["hName"].'</strong></div>
                                        <div class="btn-group" role="group" aria-label="Hospital Time Selection">
                                            <input type="checkbox" class="btn-check" id="8'.$row["Day"].''.$HID.'" name="time'.$row["Day"].''.$HID.'[]" value="08:00:00" autocomplete="off">
                                            <label class="btn btn-outline-primary" for="8'.$row["Day"].''.$HID.'">8:00 AM-9:00 AM</label>

                                            <input type="checkbox" class="btn-check" id="9'.$row["Day"].''.$HID.'" name="time'.$row["Day"].''.$HID.'[]" value="09:00:00" autocomplete="off">
                                            <label class="btn btn-outline-primary" for="9'.$row["Day"].''.$HID.'">9:00 AM-10:00 AM</label>

                                            <input type="checkbox" class="btn-check" id="10'.$row["Day"].''.$HID.'" name="time'.$row["Day"].''.$HID.'[]" value="10:00:00" autocomplete="off">
                                            <label class="btn btn-outline-primary" for="10'.$row["Day"].''.$HID.'">10:00 AM-11:00 AM</label>

                                            <input type="checkbox" class="btn-check" id="11'.$row["Day"].''.$HID.'" name="time'.$row["Day"].''.$HID.'[]" value="11:00:00" autocomplete="off">
                                            <label class="btn btn-outline-primary" for="11'.$row["Day"].''.$HID.'">11:00 AM-12:00 PM</label>

                                            <input type="checkbox" class="btn-check" id="12'.$row["Day"].''.$HID.'" name="time'.$row["Day"].''.$HID.'[]" value="12:00:00" autocomplete="off">
                                            <label class="btn btn-outline-primary" for="12'.$row["Day"].''.$HID.'">12:00 PM-1:00 PM</label>

                                            <input type="checkbox" class="btn-check" id="13'.$row["Day"].''.$HID.'" name="time'.$row["Day"].''.$HID.'[]" value="13:00:00" autocomplete="off">
                                            <label class="btn btn-outline-primary" for="13'.$row["Day"].''.$HID.'">1:00 PM-2:00 PM</label>

                                            <input type="checkbox" class="btn-check" id="14'.$row["Day"].''.$HID.'" name="time'.$row["Day"].''.$HID.'[]" value="14:00:00" autocomplete="off">
                                            <label class="btn btn-outline-primary" for="14'.$row["Day"].''.$HID.'">2:00 PM-3:00 PM</label>

                                            <input type="checkbox" class="btn-check" id="15'.$row["Day"].''.$HID.'" name="time'.$row["Day"].''.$HID.'[]" value="15:00:00" autocomplete="off">
                                            <label class="btn btn-outline-primary" for="15'.$row["Day"].''.$HID.'">3:00 PM-4:00 PM</label>

                                            <input type="checkbox" class="btn-check" id="16'.$row["Day"].''.$HID.'" name="time'.$row["Day"].''.$HID.'[]" value="16:00:00" autocomplete="off">
                                            <label class="btn btn-outline-primary" for="16'.$row["Day"].''.$HID.'">4:00 PM-5:00 PM</label>
                                        </div>
                                    </div>
                                </div>';
                            }
                            echo '</div>';
                        }
                    ?>
                    <div class="row justify-content-end" style="margin-y: 50px">
                        <div class="col-1">
                            <input type="submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>