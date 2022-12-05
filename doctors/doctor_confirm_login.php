<?php
    session_start();

    $localhost = 'localhost';
    $user = 'david';
    $phpwd = 'phpwd';
    $db = 'OHCTEST';

    $conn = new mysqli($localhost, $user, $phpwd, $db);
    $sql = 'select dSSN from doctor where doctor.dSSN = "'.$_POST["dSSN"].'";';
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result)) {
        $_SESSION["dSSN"] = $row["dSSN"];
    }

    if (!empty($_SESSION["dSSN"])) {
        header('Location:.\doctor_homepage.php');
        exit;
    } else {
        header('Location:.\doctor_login.php');
        echo '<p>Incorrect credentials</p>';
        exit;
    }
?>