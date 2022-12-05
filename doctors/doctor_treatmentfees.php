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
        <div>
            <div class="container">
                <div class="row justify-content-center" style="margin-top: 20px">
                    <div class="col text-center display">
                        <div class="col text-center display" style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; margin-top: 100px"><strong>Please input the fee you would like to assign to each treatment:</strong></div>
                    </div>
                </div>
                <div class="container px-4" style="margin-left: 555px">
                   <div class="row gx-1" style="margin-top: 30px">
                         <div class="col-sm-2">
                              <div class="col text" style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif"><strong>In network</strong></div>
                         </div>
                        <div class="col-sm-2" style="margin-left: 12px">
                              <div class="col text" style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif"><strong>Out of network</strong></div>
                      </div>
                   </div>
                </div>
                <div class="container" style="margin-left: 300px">
                    <div class="col">
                    <form method="post" style ="margin-top: 15px" action="./doctor_homepage.php">
                        <?php
                        session_start();
                        // $dSSN = $_SESSION["dSSN"]; We will put this in once we can carry over from the last page with the dSSN inputted at the beginning of the session
                        $conn = new mysqli('localhost', 'phpuser', 'phpwd', 'OHCTEST2');
                        $dSSN = '123456789';
                        $_SESSION["treatment"] = $_POST["treatment"];
                        if (isset($_POST['treatment'])){
                            if (is_array($_POST['treatment'])) {
                                    foreach($_POST['treatment'] as $treat){
                                    $sql = "insert into doctor_treatment_fee(TreatmentCode, inFee, outFee, dSSN) value ('".$treat."', 0, 0, '".$dSSN."')";
                                    $result = mysqli_query($conn, $sql);
                                }
                            } else {
                                $sql = "insert into practices_at(TreatmentCode, inFee, outFee, dSSN) value ('".$_POST['treatment']."', 0, 0, '".$dSSN."')";
                                $result = mysqli_query($conn, $sql);
                            }
                        }

                        $sql = 'select tName from doctor_treatment_fee, treatment where doctor_treatment_fee.dSSN = \''.$dSSN.'\' and treatment.TreatmentCode = doctor_treatment_fee.TreatmentCode';
                        $result = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_array($result)) {
                            echo "<div class=\"form-group row\" style=\"margin-top: 10px\">";
                            echo "<label class=\"col-sm-2 col-form-label\">", $row['tName'], ": </label>";
                            echo "<div class=\"col-sm-2\">";
                            echo "<input type=\"number\" name=\"TreatmentFeeIn[]\" class=\"form-control\"/>";
                            echo "</div>";
                            echo "<div class=\"col-sm-2\" style=\"margin-left: 20px\">";
                            echo "<input type=\"number\" name=\"TreatmentFeeOut[]\" class=\"form-control\"/>";
                            echo "</div>";
                            echo "</div>";
                        }
                        ?>     
                    <div class="row justify-content-end" style="margin-top: 30px">
                        <div class="col">
                        <input type="submit">
                        </div>
                  </div>
                  </form>    
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>