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
    // echo $user_id;
    // unset($_SESSION['user_id']);

}

if (isset($_POST['EmailValidationBTN']) && $_SESSION['user_id']) {

    $user_id = $fetch['user_id'];
    $firstName = $fetch['firstname'];
    $lastName = $fetch['lastname'];
    $email = $fetch['email'];
    $address = $fetch['address'];
    $zipcode = $fetch['zipcode'];
    $currency = mysqli_real_escape_string($conn, $_POST['currency']);
    $amount = mysqli_real_escape_string($conn, $_POST['amount']);
    $reason = mysqli_real_escape_string($conn, $_POST['reason']);
    $recipients = mysqli_real_escape_string($conn, $_POST['recipients']);
    $hpiinterac = mysqli_real_escape_string($conn, $_POST['hpiinterac']);
    $agreedrate = mysqli_real_escape_string($conn, $_POST['agreedrate']);
    $vat = '';
    $profit = '';

    if (!empty($currency)  && !empty($amount) && !empty($reason) && !empty($recipients)  && !empty($agreedrate)) {


        $sql = "INSERT INTO `usertransactiondetails` (`user_id`, `firstname`, `lastname`, `email`, `address`, `zipcode`, `currency`, `amount`, `reason`, `recipients`, `hpiinterac`, `agreedrate`, `vat`, `profit`) VALUES ('$user_id', '$firstName','$lastName','$email','$address','$zipcode','$currency','$amount','$reason','$recipients','$hpiinterac','$agreedrate','$vat','$profit')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $_SESSION['user_id'] = $user_id;

            header('location: showdetails.php');
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
                            <!-- <h3>HPILGLOBAL<br> -->


                    </div>

                    <div class="row show-grid">
                        <div class="col-xs-6 col-md-3"></div>
                        <div class="col-xs-6 col-md-6">


                            <div class="col-lg-12 col-md-12">
                                <div class="card border-info">
                                    <div class="card-header bg-info">
                                        <h4 class="m-b-0 text-white">
                                            <center>ENTER DETAILS </center>
                                        </h4>
                                    </div>
                                    <div class="card-body">

                                        <?php
                                        if (isset($databasemsg)) {
                                            echo $databasemsg;
                                        }
                                        ?>

                                        <form action="" method="post">
                                        <div class="d-flex justify-content-center align-items-center text-center text-danger">
                                    <div class="alert alert-<?= $alert ?>">
                                        <?= $msg ?>
                                    </div>
                                </div>
                                        <label for="" class=" text-capitalize">Firstname</label>

                                            <div class="input-group mb-1">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon2"><i
                                                            class=" ti-angle-double-down"></i></span>
                                                </div>
                                                <p class="form-control">
                                                    <?= $fetch['firstname'] ?>
                                                </p>
                                            </div>
                                            
                                            <label for="" class=" text-capitalize">Lastname</label>

                                            <div class="input-group mb-1">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon2"><i
                                                            class=" ti-angle-double-down"></i></span>
                                                </div>
                                                <p class="form-control">
                                                    <?= $fetch['lastname'] ?>
                                                </p>
                                            </div>
                                            <label for="" class=" text-capitalize">Email</label>

                                            <div class="input-group mb-1">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon2"><i
                                                            class=" ti-angle-double-down"></i></span>
                                                </div>
                                                <p class="form-control">
                                                    <?= $fetch['email'] ?>
                                                </p>
                                            </div>
                                            <label for="" class=" text-capitalize">Address</label>

                                            <div class="input-group mb-1">
                                              
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon2"><i
                                                            class=" ti-angle-double-down"></i></span>
                                                </div>
                                                <p class="form-control">
                                                    <?= $fetch['address'] ?>
                                                </p>
                                            </div>
                                            <label for="" class=" text-capitalize">Zipcode</label>

                                            <div class="input-group mb-1">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon2"><i
                                                            class=" ti-angle-double-down"></i></span>
                                                </div>
                                                <p class="form-control">
                                                    <?= $fetch['zipcode'] ?>
                                                </p>
                                            </div>
                                            <label for="" class=" text-capitalize">Currency Needed</label>

                                            <div class="input-group mb-1">
                                               
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon2"><i
                                                            class=" ti-angle-double-down"></i></span>
                                                </div>
                                                <select name="currency" id="currency" class="form-control">
                                                    <option values="">Select Currency needed</option>
                                                    <?php
                                                    $sql8 = "SELECT * FROM exchangerate ";
                                                    $result8 = mysqli_query($conn, $sql8);
                                                    $info8 = mysqli_fetch_array($result8);
                                                    // while ($info8 = mysqli_fetch_array($result8)) {
                                                    echo ' <option value="' . $info8['nairatocad'] . '" >Naira</option>';
                                                    echo '  <option value="' . $info8['cadtonaira'] . '">CAD{Canadian Dollar}</option>';
                                                    // }
                                                    ?>
                                                </select>
                                            </div>
                                            <label for="" class=" text-capitalize">Amount Needed</label>

                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon2"><i
                                                            class=" ti-angle-double-down"></i></span>
                                                </div>
                                                <input type="text" class="form-control" id="amount" name="amount"
                                                    placeholder="Amount" required>
                                            </div>
                                            <label for="" class=" text-capitalize">Reason</label>

                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon2"><i
                                                            class=" ti-angle-double-down"></i></span>
                                                </div>
                                                <input type="text" class="form-control" id="reason" name="reason"
                                                    placeholder="Enter your reason for money order" required>
                                            </div>
                                            <label for="" class=" text-capitalize">Recipients Acct</label>

                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon2"><i
                                                            class=" ti-angle-double-down"></i></span>
                                                </div>
                                                <input type="text" class="form-control" id="recipients"
                                                    name="recipients"
                                                    placeholder="Enter your recipients Account text or interac"
                                                    required>
                                            </div>
                                            <!-- <label for="" class=" text-capitalize">Hpiinterac</label> -->

                                            <div class="input-group ">
                                                <input type="hidden" class="form-control" id="hpiinterac"
                                                    name="hpiinterac" placeholder="Enter your hpiinterac" required>
                                            </div>
                                            <label for="" class=" text-capitalize">Agreed Rate</label>

                                            <div class="input-group mb-3">
                                               
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon2"><i
                                                            class=" ti-angle-double-down"></i></span>
                                                </div>
                                                <input type="agreedrate2" class="form-control" id="agreedrate"
                                                    placeholder="Enter your agreedrate" readonly required>
                                                <input type="hidden" class="form-control" id="agreedrate2"
                                                    name="agreedrate" placeholder="Enter your agreedrate" readonly
                                                    required>
                                            </div>

                                            <div class="form-group text-center">
                                                <div class="col-xs-12 p-b-20">
                                                    <button class="btn btn-block btn-lg "
                                                        style="background: black; color: white;" type="submit"
                                                        name="EmailValidationBTN">Submit >></button>
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
        $('#currency').change(function (e) {
            e.preventDefault();
            val = $(this).val()
            $('#amount').keyup(function (e) {

                if ($('#amount').val() !== '') {

                    valAmnt = $('#amount').val()
                    Amount = valAmnt / val
                    console.log(valAmnt)
                    console.log(val)
                    console.log(Amount)
                } else {
                    valAmnt = ''
                    Amount = ''

                }

                valText = $('#currency option:selected').text()
                if (valText == 'Naira') {

                    $("#agreedrate").val(val + ' = ' + valText + ' to Canadian Dollar Amount to recieve ' + Amount)
                } else {
                    $("#agreedrate").val(val + ' = ' + valText + ' to Naira Amount to recieve ' + Amount)

                }
                $("#agreedrate2").val(val)
            });

            // val = $(this).val()

            if ($('#amount').val() !== '') {

                valAmnt = $('#amount').val()
                Amount = valAmnt / val
                console.log(valAmnt)
                console.log(val)
                console.log(Amount)
            } else {
                valAmnt = ''
                Amount = ''

            }
            valText = $('#currency option:selected').text()
            if (valText == 'Naira') {

                $("#agreedrate").val(val + ' = ' + valText + ' to Canadian Dollar Amount to recieve ' + Amount)
            } else {
                $("#agreedrate").val(val + ' = ' + valText + ' to Naira Amount to recieve ' + Amount)

            }
            $("#agreedrate2").val(val)
        });
        $('[data-toggle="tooltip "]').tooltip();
        $(".preloader ").fadeOut();
    </script>
</body>

</html>