<!DOCTYPE html>
<html>
    <head>
        <title>Doctors Login Page</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <style>

        </style>
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
                    <div class="col text-center display-3" style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif"><strong>Register</strong></div>
                </div>
                <div class="row" style="margin-top: 50px">
                    <div class="col">
                    </div>
                    <div class="col-6">
                        <form method="post" action="./doctor_hospitals.php">
                            <label>Name</label><br>
                            <input class="form-control mb-3" name="dName" placeholder="Username">
                            <label for="dssn" class="form-label">SSN</label><br>
                            <input class="form-control mb-1" name="dSSN" placeholder="123456789" pattern="[0-9]{3}[0-9]{2}[0-9]{4}" maxlength="9"><br>

                            <div class="row justify-content-end">
                                <div class="col-1">
                                    <input type="submit">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col">
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>