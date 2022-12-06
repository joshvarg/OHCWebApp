<?php
    session_start();

    $localhost = 'localhost';
    $user = 'david';
    $phpwd = 'phpwd';
    $db = 'OHCTEST';

    $conn = new mysqli($localhost, $user, $phpwd, $db);
    $sql = 'select dSSN from doctor where doctor.dSSN = '.$_POST["dSSN"];
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result)) {
        if (!(empty($row["dSSN"]) && isset($row["dSSN"]))) {
            $_SESSION["dSSN"] = $row["dSSN"];
            header('Location:.\doctor_homepage.php');
            exit;
        }
    }

    header('Location:.\doctor_login.php');
?>