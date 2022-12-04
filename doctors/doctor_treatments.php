<!DOCTYPE html>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <style>

        </style>
        <title>Treatment Selection</title>
    </head>
    <body>
        <header class="navbar navbar-expand-md"style="background-color: #5acef2">
            <div class="text-light" style="font-family: Cambria;font-size: 38px"><strong>&nbsp&nbspOhioHealthCSE</strong></div>
        </header>
        <div>
            <div class="container">
                <div class="row justify-content-center" style="margin-top: 30px">
                        <?php
                        session_start();
                        /*$dSSN = $_SESSION["dSSN"];*/
                        $dSSN = '123456789';
                        $conn = new mysqli('localhost', 'phpuser', 'phpwd', 'OHCtest2');
                        $sql1 = 'select hName from hospital, practices_at where practices_at.dSSN = \''.$dSSN.'\' and practices_at.hospitalID = hospital.hospitalID';
                        $result1 = mysqli_query($conn, $sql1);
                        $sql2 = 'select tName from treatment';
                        while($row = mysqli_fetch_array($result1)) {
                              echo "<div class=\"col text-center display\">";
                              echo "<div class=\"col text-center display\" style=\"font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; margin-top: 100px\"><strong>Please select the treatment(s) you would like to perform at ", $row['hName']," Hospital. </strong></div>";
                              echo "<div class=\"row\" style=\"margin-top: 30px\">";
                              echo "<div class=\"btn-group-vertical\" role=\"group\" aria-label=\"Treatment Selection\">";
                              $result2 = mysqli_query($conn, $sql2);
                              while($row = mysqli_fetch_array($result2)) {
                                    echo "<input type=\"checkbox\" class = \"btn-check\" autocomplete=\"off\" id=\"", $row['tName'], "\" autocomplete=\"off\">
                                          <label class=\"btn btn-outline-primary\" for=\"", $row['tName'], "\">", $row['tName'], "</label>";
                              }
                              echo "</div>";
                              echo "</div>";
                              echo "</div>";
                        }
                        ?>
                </div>
                <div class="row justify-content-end">
                    <div class="col-1">
                        <a class="button btn-primary btn mb-3" style="margin-top: 50px" href="./doctor_treatmentfees.php" role="button">
                            Next
                           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                               <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                           </svg>
                       </a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>