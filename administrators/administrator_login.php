<!DOCTYPE html>
<html>
    <head>
        <title>Administrator Login Page</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <style>

        </style>
    </head>
    <body>
        <header class="navbar navbar-expand-md"style="background-color: #5acef2">
            <div class="text-light" style="font-family: Cambria;font-size: 38px"><strong>&nbsp&nbspOhioHealthCSE</strong></div>
        </header>
        <div>
            <div class="container">
                <div class="row justify-content-center" style="margin-top: 100px">
                    <div class="col text-center display-3" style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif"><strong>Administrator Login</strong></div>
                </div>
                <div class="row" style="margin-top: 50px">
                    <div class="col">
                    </div>
                    <div class="col-6">
                        <label for="uname" class="form-label mt-3">Username</label><br>
                        <input class="form-control mb-3" type="text" id="uname" placeholder="Username">
                        <label for="apass" class="form-label">Password</label><br>
                        <input class="form-control mb-1" id="apass" type="password" placeholder="Password" pattern="[0-9]{3}-[0-9]{2}-[0-9]{4}" maxlength="12"><br>
                        <a class="button btn-primary btn mb-3" href="./administrator_choose.php" role="button">Submit</a>
                    </div>
                    <div class="col-md">
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>