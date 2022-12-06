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

    header('Location:.\doctor_homepage.php');
?>