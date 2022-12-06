<?php
    session_start();
    $dSSN = $_SESSION["dSSN"];
    
    $localhost = 'localhost';
    $user = 'phpuser';
    $phpwd = 'phpwd';
    $db = 'OHC';
    
    $conn = new mysqli($localhost, $user, $phpwd, $db);
    $sql = 'select hospital.HospitalID FROM hospital, practices_at where practices_at.dSSN = "'.$dSSN.'" and hospital.HospitalID = practices_at.hospitalID';
    $result1 = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result1)) {
        if(isset($_POST["hosp".$row['HospitalID']])){
            if (is_array($_POST["hosp".$row['HospitalID']])) {
                foreach($_POST["hosp".$row['HospitalID']] as $hospitalday){
                    $sql = "insert into doctor_days(Day, dSSN, HospitalID) value ('".$hospitalday."','".$dSSN."','".$row['HospitalID']."')";
                    $result2 = mysqli_query($conn, $sql);
                }
            } else {
                $sql = "insert into doctor_days(Day, dSSN, HospitalID) value ('".$hospitalday."','".$dSSN."','".$row['HospitalID']."')";
                $result2 = mysqli_query($conn, $sql);
            }
        }
    }

    header('Location:.\doctor_times_change.php');
?>