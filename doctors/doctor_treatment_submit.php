<?php
    session_start();
    $dSSN = $_SESSION["dSSN"];

    $localhost = 'localhost';
    $user = 'phpuser';
    $phpwd = 'phpwd';
    $db = 'OHC';

    $conn = new mysqli($localhost, $user, $phpwd, $db);
    $sql = 'select distinct tName, TreatmentCode from treatment, doctor_treatment where doctor_treatment.dTCode = treatment.TreatmentCode order by field(tName, "Immunization", "Chest X-ray", "Physical Exam", "Diagnostic")';
    $result1 = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result1)) {
        $sql2 = 'insert into doctor_treatment_fee(treatmentCode, InFee, OutFee, dSSN) values ("'.$row["TreatmentCode"].'", "'.$_POST["TreatmentFeeIn".$row["TreatmentCode"]].'", "'.$_POST["TreatmentFeeOut".$row["TreatmentCode"]].'", "'.$dSSN.'")';
        $result2 = mysqli_query($conn, $sql2);
    }
    if ($result1) {
        header('Location:.\doctor_homepage.php');
        exit;
    } else {
        echo "<p> ERROR <p>";
    }
?>