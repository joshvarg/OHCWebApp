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
            $user = 'phpuser';
            $phpwd = 'phpwd';
            $db = 'OHC';

            $conn = new mysqli($localhost, $user, $phpwd, $db);

            $sql1 = 'select hospital.hName, hospital.HospitalID from hospital, practices_at where practices_at.dSSN = \''.$dSSN.'\' and practices_at.hospitalID = hospital.HospitalID';
            $result1 = mysqli_query($conn, $sql1);
            while($row = mysqli_fetch_array($result1)) {
                $HID = $row['HospitalID'];
                if (is_array($_POST["treatment".$HID])) {
                    foreach($_POST["treatment".$HID] as $treat){
                        $sql2 = 'insert into doctor_treatment(dTCode, dSSN, tHID) values ("'.$treat.'", "'.$dSSN.'", "'.$row["HospitalID"].'")';
                        $result2 = mysqli_query($conn, $sql2);
                    }
                } else {
                    $sql2 = 'insert into doctor_treatment(dTCode, dSSN, tHID) values ("'.$treat.'", "'.$dSSN.'", "'.$row["HospitalID"].'")';
                    $result3 = mysqli_query($conn, $sql2);
                }
            }
        ?>  
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
                              <div class="col text" style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif"><strong>In network($)</strong></div>
                         </div>
                        <div class="col-sm-2" style="margin-left: 12px">
                              <div class="col text" style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif"><strong>Out of network($)</strong></div>
                      </div>
                   </div>
                </div>
                <div class="container" style="margin-left: 300px">
                    <div class="col">
                    <form method="post" style ="margin-top: 15px" action="./doctor_treatment_submit.php">
                        <?php
                            
                            $conn = new mysqli($localhost, $user, $phpwd, $db);

                            $sql = 'select distinct treatment.tName, TreatmentCode from treatment, doctor_treatment where doctor_treatment.dSSN = '.$dSSN.' and doctor_treatment.dTCode = treatment.TreatmentCode order by field(tName, "Immunization", "Chest X-ray", "Physical Exam", "Diagnostic")';
                            $result = mysqli_query($conn, $sql);
                            while($row = mysqli_fetch_array($result)) {
                                echo "<div class=\"form-group row\" style=\"margin-top: 10px\">";
                                echo "<label class=\"col-sm-2 col-form-label\">", $row['tName'], ": </label>";
                                echo "<div class=\"col-sm-2\">";
                                echo "<input type=\"number\" id=\"TreatmentFeeIn".$row["TreatmentCode"]."\" name=\"TreatmentFeeIn".$row["TreatmentCode"]."\" class=\"form-control\"/>";
                                echo "</div>";
                                echo "<div class=\"col-sm-2\" style=\"margin-left: 20px\">";
                                echo "<input type=\"number\" id=\"TreatmentFeeIn".$row["TreatmentCode"]."\" name=\"TreatmentFeeOut".$row["TreatmentCode"]."\" class=\"form-control\"/>";
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