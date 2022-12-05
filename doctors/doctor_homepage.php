<!DOCTYPE html>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <style>

        </style>
        <title>Treatment Fee Selection</title>
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
                    <?php
                        $sql = $sql = 'select dName from doctor where doctor.dSSN = "'.$dSSN.'";';
                        $result = mysqli_query($conn, $sql);
                            while($row = mysqli_fetch_array($result)) {
                                echo "<div class=\"col text-center display-6\" style=\"font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; margin-top: 40px\"><strong>Welcome, &nbsp;".$row["dName"]."! </strong></div>";
                            }
                    ?>
                    </div>
                </div>
                  <ul class="nav nav-tabs nav-fill", style="margin-top:30px">
                    <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href=#>Hospital A</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="./doctor_homepageB.php">Hospital B</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="./doctor_homepageTreatment.php">Treatment Details</a>
                    </li>
                  </ul>
                <div class="container">
                     <div class="row justify-content-center">
                         <div class="col text display">
                            <div class="col text display" style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; margin-top: 20px"><strong>Schedule</strong></div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col text display">
                           <div class="col text display" style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; margin-top: 20px"><strong>Treatments</strong></div>
                       </div>
                   </div>
                </div>
            </div>
        </div>
    </body>
</html>
