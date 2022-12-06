<!DOCTYPE>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <style>

        </style>
        <title>OHC Homepage</title>
    </head>
    <body>
        <?php
        if(!session_status() === PHP_SESSION_NONE)
            {
                session_destroy();
            }
        ?>
        <header class="navbar navbar-expand-md"style="background-color: #5acef2">
                <div class="text-light" style="font-family: Cambria;font-size: 38px"><strong>&nbsp&nbspOhioHealthCSE</strong></div>
        </header>
        <div>
            <div class="container">
                <div class="row justify-content-center" style="margin-top: 100px">
                        <div class="col text-center display-4" style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif"><strong>What is your occupation?</strong></div>
                </div>
                <div class="row justify-content-center" style="margin-top: 50px">
                    <div class="col d-flex justify-content-center">
                        <a class="button btn-outline-primary btn btn-lg mb-3" href=".administrators/administrator_login.php" role="button">Administrators</a>
                    </div>
                    <div class="col d-flex justify-content-center">
                        <a class="button btn-outline-primary btn btn-lg mb-3" href="./patients/patient.php" role="button">Patients</a>
                    </div>
                    <div class="col d-flex justify-content-center">
                        <a class="button btn-outline-primary btn btn-lg mb-3" href="./doctors/doctor_login.php" role="button">Doctors</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
