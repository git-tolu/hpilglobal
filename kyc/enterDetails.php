<?php
include("./include/opendb.php");

$datereg = date("d-m-y , g:i a");
$yearreg = date("Y");
$alert = '';
$msg = '';
if (isset($_SESSION['user_id'])) {

    $user_id = $_SESSION['user_id'];
    $sql = "SELECT * FROM `usertransactiondetails`  WHERE `user_id`='$user_id'";
    $result = mysqli_query($conn, $sql);
    $fetch = mysqli_fetch_assoc($result);

}

if (isset($_FILES["frontImage"]["name"]) && isset($_FILES["backImage"]["name"])) {


    $user_id = $_SESSION['user_id'];
    $country = mysqli_real_escape_string($conn, $_POST['country']);
    $docType = mysqli_real_escape_string($conn, $_POST['docType']);
    $frontImage = $_FILES["frontImage"]["name"];
    $backImage = $_FILES["backImage"]["name"];

    if (!empty($country && $frontImage && $backImage)) {

        $targetDirectory = "identifyDocument/";
        $targetFile = $targetDirectory . basename($_FILES["frontImage"]["name"]);
        if (move_uploaded_file($_FILES["frontImage"]["tmp_name"], $targetFile)) {
            // $display = '';

            // $errorMessage = "File uploaded successfully.";
        } else {
            // $display = '';

            // $errorMessage = "File upload failed.";
        }

        $targetFile = $targetDirectory . basename($_FILES["backImage"]["name"]);
        if (move_uploaded_file($_FILES["backImage"]["tmp_name"], $targetFile)) {
            // $display = '';

            // $errorMessage = "File uploaded successfully.";
        } else {
            // $display = '';

            // $errorMessage = "File upload failed.";
        }

        $sql = "UPDATE `kyc` SET `country`='$country',`docType`='$docType',`frontImage`=' $frontImage',`backImage`='$backImage' WHERE `user_id`='$user_id'";

        $result = mysqli_query($conn, $sql);
        if ($result) {
            $_SESSION['user_id'] = $user_id;
            header('location: finalProcess.php');
            $alert = 'success';
            $msg = 'Submited Successfully';
        }
    } else {
        $alert = 'danger';
        $msg = 'Field cannot be left empty';
    }



}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>HPILGLOBAl</title>
    <!-- Custom CSS -->
    <!-- This Page CSS -->
    <link rel="stylesheet" type="text/css" href="assets/libs/select2/dist/css/select2.min.css">

    <link href="dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center"
            style="background:url(assets/images/big/auth-bg.jpg) no-repeat center center;">
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="container-fluid">
                    <div class="col-lg-12 col-md-12">
                        <center>
                            <br><br><img src='assets/images/logo.png' width="20%" height="20%"><br><br>
                            <h3>HPILGLOBAL<br>


                    </div>

                    <div class="row show-grid">
                        <div class="col-xs-6 col-md-3"></div>
                        <div class="col-xs-6 col-md-6">


                            <div class="col-lg-12 col-md-12">
                                <div class="card border-info">
                                    <div class="card-header bg-info">
                                        <h4 class="m-b-0 text-white">
                                            <center>Identity Document </center>
                                        </h4>
                                    </div>
                                    <div class="card-body">

                                        <?php
                                        if (isset($databasemsg)) {
                                            echo $databasemsg;
                                        }
                                        ?>
      <div class="d-flex justify-content-center align-items-center text-center text-danger">
                                    <div class="alert alert-<?= $alert ?>">
                                        <?= $msg ?>
                                    </div>
                                </div>
                                        <form action="" method="post"  enctype="multipart/form-data">

                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon2"><i
                                                            class=" ti-angle-double-down"></i></span>
                                                </div>
                                                <select name="country" id="currency" class="form-control">
                                                    <option values="">Select issuing country</option>
                                                    <option value="Nigeria">Nigeria</option>

<option value="Afghanistan">Afghanistan</option>
<option value="Aland Islands">Aland Islands</option>
<option value="Albania">Albania</option>
<option value="Algeria">Algeria</option>
<option value="American Samoa">American Samoa</option>
<option value="Andorra">Andorra</option>
<option value="Angola">Angola</option>
<option value="Anguilla">Anguilla</option>
<option value="Antarctica">Antarctica</option>
<option value="Antigua and Barbuda">Antigua and Barbuda
</option>
<option value="Argentina">Argentina</option>
<option value="Armenia">Armenia</option>
<option value="Aruba">Aruba</option>
<option value="Australia">Australia</option>
<option value="Austria">Austria</option>
<option value="Azerbaijan">Azerbaijan</option>
<option value="Bahamas">Bahamas</option>
<option value="Bahrain">Bahrain</option>
<option value="Bangladesh">Bangladesh</option>
<option value="Barbados">Barbados</option>
<option value="Belarus">Belarus</option>
<option value="Belgium">Belgium</option>
<option value="Belize">Belize</option>
<option value="Benin">Benin</option>
<option value="Bermuda">Bermuda</option>
<option value="Bhutan">Bhutan</option>
<option value="Bolivia">Bolivia</option>
<option value="Bonaire, Sint Eustatius and Saba">Bonaire,
    Sint Eustatius and Saba</option>
<option value="Bosnia and Herzegovina">Bosnia and
    Herzegovina</option>
<option value="Botswana">Botswana</option>
<option value="Bouvet Island">Bouvet Island</option>
<option value="Brazil">Brazil</option>
<option value="British Indian Ocean Territory">British
    Indian Ocean Territory</option>
<option value="Brunei Darussalam">Brunei Darussalam</option>
<option value="Bulgaria">Bulgaria</option>
<option value="Burkina Faso">Burkina Faso</option>
<option value="Burundi">Burundi</option>
<option value="Cambodia">Cambodia</option>
<option value="Cameroon">Cameroon</option>
<option value="Canada">Canada</option>
<option value="Cape Verde">Cape Verde</option>
<option value="Cayman Islands">Cayman Islands</option>
<option value="Central African Republic">Central African
    Republic</option>
<option value="Chad">Chad</option>
<option value="Chile">Chile</option>
<option value="China">China</option>
<option value="Christmas Island">Christmas Island</option>
<option value="Cocos (Keeling) Islands">Cocos (Keeling)
    Islands</option>
<option value="Colombia">Colombia</option>
<option value="Comoros">Comoros</option>
<option value="Congo">Congo</option>
<option value="Congo, Democratic Republic of the Congo">
    Congo, Democratic Republic of the Congo</option>
<option value="Cook Islands">Cook Islands</option>
<option value="Costa Rica">Costa Rica</option>
<option value="Cote D'Ivoire">Cote D'Ivoire</option>
<option value="Croatia">Croatia</option>
<option value="Cuba">Cuba</option>
<option value="Curacao">Curacao</option>
<option value="Cyprus">Cyprus</option>
<option value="Czech Republic">Czech Republic</option>
<option value="Denmark">Denmark</option>
<option value="Djibouti">Djibouti</option>
<option value="Dominica">Dominica</option>
<option value="Dominican Republic">Dominican Republic
</option>
<option value="Ecuador">Ecuador</option>
<option value="Egypt">Egypt</option>
<option value="El Salvador">El Salvador</option>
<option value="Equatorial Guinea">Equatorial Guinea</option>
<option value="Eritrea">Eritrea</option>
<option value="Estonia">Estonia</option>
<option value="Ethiopia">Ethiopia</option>
<option value="Falkland Islands (Malvinas)">Falkland Islands
    (Malvinas)</option>
<option value="Faroe Islands">Faroe Islands</option>
<option value="Fiji">Fiji</option>
<option value="Finland">Finland</option>
<option value="France">France</option>
<option value="French Guiana">French Guiana</option>
<option value="French Polynesia">French Polynesia</option>
<option value="French Southern Territories">French Southern
    Territories</option>
<option value="Gabon">Gabon</option>
<option value="Gambia">Gambia</option>
<option value="Georgia">Georgia</option>
<option value="Germany">Germany</option>
<option value="Ghana">Ghana</option>
<option value="Gibraltar">Gibraltar</option>
<option value="Greece">Greece</option>
<option value="Greenland">Greenland</option>
<option value="Grenada">Grenada</option>
<option value="Guadeloupe">Guadeloupe</option>
<option value="Guam">Guam</option>
<option value="Guatemala">Guatemala</option>
<option value="Guernsey">Guernsey</option>
<option value="Guinea">Guinea</option>
<option value="Guinea-Bissau">Guinea-Bissau</option>
<option value="Guyana">Guyana</option>
<option value="Haiti">Haiti</option>
<option value="Heard Island and Mcdonald Islands">Heard
    Island and Mcdonald Islands</option>
<option value="Holy See (Vatican City State)">Holy See
    (Vatican City State)</option>
<option value="Honduras">Honduras</option>
<option value="Hong Kong">Hong Kong</option>
<option value="Hungary">Hungary</option>
<option value="Iceland">Iceland</option>
<option value="India">India</option>
<option value="Indonesia">Indonesia</option>
<option value="Iran, Islamic Republic of">Iran, Islamic
    Republic of</option>
<option value="Iraq">Iraq</option>
<option value="Ireland">Ireland</option>
<option value="Isle of Man">Isle of Man</option>
<option value="Israel">Israel</option>
<option value="Italy">Italy</option>
<option value="Jamaica">Jamaica</option>
<option value="Japan">Japan</option>
<option value="Jersey">Jersey</option>
<option value="Jordan">Jordan</option>
<option value="Kazakhstan">Kazakhstan</option>
<option value="Kenya">Kenya</option>
<option value="Kiribati">Kiribati</option>
<option value="Korea, Democratic People's Republic of">
    Korea, Democratic People's Republic of</option>
<option value="Korea, Republic of">Korea, Republic of
</option>
<option value="Kosovo">Kosovo</option>
<option value="Kuwait">Kuwait</option>
<option value="Kyrgyzstan">Kyrgyzstan</option>
<option value="Lao People's Democratic Republic">Lao
    People's Democratic Republic</option>
<option value="Latvia">Latvia</option>
<option value="Lebanon">Lebanon</option>
<option value="Lesotho">Lesotho</option>
<option value="Liberia">Liberia</option>
<option value="Libyan Arab Jamahiriya">Libyan Arab
    Jamahiriya</option>
<option value="Liechtenstein">Liechtenstein</option>
<option value="Lithuania">Lithuania</option>
<option value="Luxembourg">Luxembourg</option>
<option value="Macao">Macao</option>
<option value="Macedonia, the Former Yugoslav Republic of">
    Macedonia, the Former Yugoslav Republic of</option>
<option value="Madagascar">Madagascar</option>
<option value="Malawi">Malawi</option>
<option value="Malaysia">Malaysia</option>
<option value="Maldives">Maldives</option>
<option value="Mali">Mali</option>
<option value="Malta">Malta</option>
<option value="Marshall Islands">Marshall Islands</option>
<option value="Martinique">Martinique</option>
<option value="Mauritania">Mauritania</option>
<option value="Mauritius">Mauritius</option>
<option value="Mayotte">Mayotte</option>
<option value="Mexico">Mexico</option>
<option value="Micronesia, Federated States of">Micronesia,
    Federated States of</option>
<option value="Moldova, Republic of">Moldova, Republic of
</option>
<option value="Monaco">Monaco</option>
<option value="Mongolia">Mongolia</option>
<option value="Montenegro">Montenegro</option>
<option value="Montserrat">Montserrat</option>
<option value="Morocco">Morocco</option>
<option value="Mozambique">Mozambique</option>
<option value="Myanmar">Myanmar</option>
<option value="Namibia">Namibia</option>
<option value="Nauru">Nauru</option>
<option value="Nepal">Nepal</option>
<option value="Netherlands">Netherlands</option>
<option value="Netherlands Antilles">Netherlands Antilles
</option>
<option value="New Caledonia">New Caledonia</option>
<option value="New Zealand">New Zealand</option>
<option value="Nicaragua">Nicaragua</option>
<option value="Niger">Niger</option>
<option value="Nigeria">Nigeria</option>
<option value="Niue">Niue</option>
<option value="Norfolk Island">Norfolk Island</option>
<option value="Northern Mariana Islands">Northern Mariana
    Islands</option>
<option value="Norway">Norway</option>
<option value="Oman">Oman</option>
<option value="Pakistan">Pakistan</option>
<option value="Palau">Palau</option>
<option value="Palestinian Territory, Occupied">Palestinian
    Territory, Occupied</option>
<option value="Panama">Panama</option>
<option value="Papua New Guinea">Papua New Guinea</option>
<option value="Paraguay">Paraguay</option>
<option value="Peru">Peru</option>
<option value="Philippines">Philippines</option>
<option value="Pitcairn">Pitcairn</option>
<option value="Poland">Poland</option>
<option value="Portugal">Portugal</option>
<option value="Puerto Rico">Puerto Rico</option>
<option value="Qatar">Qatar</option>
<option value="Reunion">Reunion</option>
<option value="Romania">Romania</option>
<option value="Russian Federation">Russian Federation
</option>
<option value="Rwanda">Rwanda</option>
<option value="Saint Barthelemy">Saint Barthelemy</option>
<option value="Saint Helena">Saint Helena</option>
<option value="Saint Kitts and Nevis">Saint Kitts and Nevis
</option>
<option value="Saint Lucia">Saint Lucia</option>
<option value="Saint Martin">Saint Martin</option>
<option value="Saint Pierre and Miquelon">Saint Pierre and
    Miquelon</option>
<option value="Saint Vincent and the Grenadines">Saint
    Vincent and the Grenadines</option>
<option value="Samoa">Samoa</option>
<option value="San Marino">San Marino</option>
<option value="Sao Tome and Principe">Sao Tome and Principe
</option>
<option value="Saudi Arabia">Saudi Arabia</option>
<option value="Senegal">Senegal</option>
<option value="Serbia">Serbia</option>
<option value="Serbia and Montenegro">Serbia and Montenegro
</option>
<option value="Seychelles">Seychelles</option>
<option value="Sierra Leone">Sierra Leone</option>
<option value="Singapore">Singapore</option>
<option value="Sint Maarten">Sint Maarten</option>
<option value="Slovakia">Slovakia</option>
<option value="Slovenia">Slovenia</option>
<option value="Solomon Islands">Solomon Islands</option>
<option value="Somalia">Somalia</option>
<option value="South Africa">South Africa</option>
<option
    value="South Georgia and the South Sandwich Islands">
    South Georgia and the South Sandwich Islands</option>
<option value="South Sudan">South Sudan</option>
<option value="Spain">Spain</option>
<option value="Sri Lanka">Sri Lanka</option>
<option value="Sudan">Sudan</option>
<option value="Suriname">Suriname</option>
<option value="Svalbard and Jan Mayen">Svalbard and Jan
    Mayen</option>
<option value="Swaziland">Swaziland</option>
<option value="Sweden">Sweden</option>
<option value="Switzerland">Switzerland</option>
<option value="Syrian Arab Republic">Syrian Arab Republic
</option>
<option value="Taiwan, Province of China">Taiwan, Province
    of China</option>
<option value="Tajikistan">Tajikistan</option>
<option value="Tanzania, United Republic of">Tanzania,
    United Republic of</option>
<option value="Thailand">Thailand</option>
<option value="Timor-Leste">Timor-Leste</option>
<option value="Togo">Togo</option>
<option value="Tokelau">Tokelau</option>
<option value="Tonga">Tonga</option>
<option value="Trinidad and Tobago">Trinidad and Tobago
</option>
<option value="Tunisia">Tunisia</option>
<option value="Turkey">Turkey</option>
<option value="Turkmenistan">Turkmenistan</option>
<option value="Turks and Caicos Islands">Turks and Caicos
    Islands</option>
<option value="Tuvalu">Tuvalu</option>
<option value="Uganda">Uganda</option>
<option value="Ukraine">Ukraine</option>
<option value="United Arab Emirates">United Arab Emirates
</option>
<option value="United Kingdom">United Kingdom</option>
<option value="United States">United States</option>
<option value="United States Minor Outlying Islands">United
    States Minor Outlying Islands</option>
<option value="Uruguay">Uruguay</option>
<option value="Uzbekistan">Uzbekistan</option>
<option value="Vanuatu">Vanuatu</option>
<option value="Venezuela">Venezuela</option>
<option value="Viet Nam">Viet Nam</option>
<option value="Virgin Islands, British">Virgin Islands,
    British</option>
<option value="Virgin Islands, U.s.">Virgin Islands, U.s.
</option>
<option value="Wallis and Futuna">Wallis and Futuna</option>
<option value="Western Sahara">Western Sahara</option>
<option value="Yemen">Yemen</option>
<option value="Zambia">Zambia</option>
<option value="Zimbabwe">Zimbabwe</option>
                                                </select>
                                            </div>
                                            <div class="input-group mb-3">
                                                <label for="">Choose your document type</label>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="docType"
                                                        id="Idcard" value="Id card">
                                                    <label class="form-check-label" for="">Id card</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="docType"
                                                        id="Passports" value="Passports">
                                                    <label class="form-check-label" for="">Passports</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="docType"
                                                        id="ResidencePermit" value="Residence Permit">
                                                    <label class="form-check-label" for="">Residence Permit</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="docType"
                                                        id="DriversPermit" value="Drivers Permit">
                                                    <label class="form-check-label" for="">Drivers Permit</label>
                                                </div>

                                            </div>
                                            <div id="showfile">
                                                <div class="mb-3">
                                                    <p>Take a photo of your <span id="textshow">ID card</span> . The
                                                        photo should be: </p>
                                                    <ul>
                                                        <li><strong>bright and clear</strong>, </li>
                                                        <li><strong>all corners of the document should be
                                                                visible</strong>.
                                                        </li>
                                                    </ul>
                                                    <div class="row ">
                                                        <div class="col-md-4"> <img data-v-6de3b170=""
                                                                src="https://static.sumsub.com/idensic/img/i_idcard_correct.e6412a46.png"
                                                                class="img-fluid">
                                                        </div>
                                                        <div class="col-md-4"> <img data-v-6de3b170=""
                                                                src="https://static.sumsub.com/idensic/img/i_idcard_incorrect_1.42c3b612.png"
                                                                class="img-fluid">
                                                        </div>
                                                        <div class="col-md-4"> <img data-v-6de3b170=""
                                                                src="https://static.sumsub.com/idensic/img/i_idcard_incorrect_2.c13c1bd7.png"
                                                                class="img-fluid">
                                                        </div>
                                                    </div>
                                                    <div class="row mt-3">
                                                        <div class="col-md-6">
                                                            <label for="" class="form-label">Upload the front of your
                                                                document</label>
                                                            <input type="file" class="form-control" name="frontImage"
                                                                id="" placeholder="Upload the front of your document">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="" class="form-label">Upload the back of your
                                                                document</label>
                                                            <input type="file" class="form-control" name="backImage"
                                                                id="" placeholder="Upload the back of your document">
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>


                                            <div class="form-group text-center">
                                                <div class="col-xs-12 p-b-20">
                                                    <button class="btn btn-block btn-lg "
                                                        style="background: black; color: white;" type="submit"
                                                        name="EmailValidationBTN">Proceed >></button>
                                                </div>
                                            </div>
                                        </form>


                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-xs-6 col-md-3"></div>
                    </div>








                    <!-- ============================================================== -->
                    <!-- End PAge Content -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Right sidebar -->
                    <!-- ============================================================== -->
                    <!-- .right-sidebar -->
                    <!-- ============================================================== -->
                    <!-- End Right sidebar -->
                    <!-- ============================================================== -->
                </div>
                <!-- ============================================================== -->
                <!-- End Container fluid  -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- footer -->
                <!-- ============================================================== -->
                <footer class="footer text-center">
                    All Rights Reserved by HPILGLOBAl . Designed and Developed by <a href="https://uptechng.com"
                        target='blank'>UPTECH</a>.
                </footer>
                <!-- ============================================================== -->
                <!-- End footer -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Page wrapper  -->
            <!-- ============================================================== -->
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Login box.scss -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper scss in scafholding.scss -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper scss in scafholding.scss -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Right Sidebar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Right Sidebar -->
    <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="assets/libs/jquery/dist/jquery.min.js "></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js "></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js "></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->

    <!-- This Page JS -->
    <script src="assets/libs/select2/dist/js/select2.full.min.js"></script>
    <script src="assets/libs/select2/dist/js/select2.min.js"></script>
    <script src="dist/js/pages/forms/select2/select2.init.js"></script>

    <script>
        $("#showfile").hide();
        $('#currency').change(function (e) {
            e.preventDefault();
            val = $(this).val()
            $("#agreedrate").val(val)
        });
        $('#Idcard').change(function (e) {
            e.preventDefault();
            $("#textshow").html("Id Card");
        $("#showfile").show();


        });
        $('#Passports').change(function (e) {
            e.preventDefault();
            $("#textshow").html("Passports");
            $("#showfile").show();

        });
        $('#ResidencePermit').change(function (e) {
            e.preventDefault();
            $("#textshow").html("Residence Permit");
            $("#showfile").show();

        });
        $('#DriversPermit').change(function (e) {
            e.preventDefault();
            $("#textshow").html("Drivers Permit");
            $("#showfile").show();

        });
        $('[data-toggle="tooltip "]').tooltip();
        $(".preloader ").fadeOut();
    </script>
</body>

</html>