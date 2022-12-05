<!DOCTYPE html>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <style>

        </style>
        <title>Duty Selection</title>
    </head>
    <body>
        <header class="navbar navbar-expand-md"style="background-color: #5acef2">
            <div class="text-light" style="font-family: Cambria;font-size: 38px"><strong>&nbsp&nbspOhioHealthCSE</strong></div>
        </header>
        <div>
            <div class="container">
                <div class="row justify-content-center" style="margin-top: 100px">
                    <div class="col text-center display h5" style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif"><strong>Please select from below.</strong></div>
                </div>
                <div class="row" style="margin-top: 30px">
                    <div class="col">
                    </div>
                    <div class="col text-center display">
                        <div class="row" style="margin-top: 10px">
                            <div class="btn-group-vertical btn-group-lg" role="group" aria-label="Administrative Duties">
                                <input type="radio" class="btn-check" name="adminChoice" value="hospitalinfo" id="hospitalinfo_ck" autocomplete="off">
                                <label class="btn btn-outline-primary" for="hospitalinfo_ck">Enter Hospital Information</label>
                              
                                <input type="radio" class="btn-check" name="adminChoice" value="servicefee" id="servicefee_ck" autocomplete="off">
                                <label class="btn btn-outline-primary" for="servicefee_ck">Edit Service Code Fees</label>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                    </div>
                </div>
                <div class="row justify-content-end">
                    <div class="col-1">
                        <script type="text/javascript">
                        window.addEventListener('DOMContentLoaded', function(event){
                            document.getElementById('hospitalinfo_ck').addEventListener('click', function(e){
                                e.preventDefault();
                                if (document.getElementById('hospitalinfo_ck').checked) {
                                    window.location.href = 'administrator_hospitalInfo.php';
                                }
                            });
                        });


                            window.addEventListener('DOMContentLoaded', function(event){
                                document.getElementById('servicefee_ck').addEventListener('click', function(e){
                                    e.preventDefault();
                                    if (document.getElementById('servicefee_ck').checked) {
                                        window.location.href = 'administrator_serviceCode.php';
                                    }
                                });
                            });
                        
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>