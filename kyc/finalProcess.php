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

// if (isset($_FILES["frontImage"]["name"]) && isset($_FILES["backImage"]["name"])) {


//     $user_id = $_SESSION['user_id'];
//     $country = mysqli_real_escape_string($conn, $_POST['country']);
//     $docType = mysqli_real_escape_string($conn, $_POST['docType']);
//     $frontImage = $_FILES["frontImage"]["name"];
//     $backImage = $_FILES["backImage"]["name"];

//     if (!empty($country && $frontImage && $backImage)) {

//         $targetDirectory = "identifyDocument/";
//         $targetFile = $targetDirectory . basename($_FILES["frontImage"]["name"]);
//         if (move_uploaded_file($_FILES["frontImage"]["tmp_name"], $targetFile)) {
//             // $display = '';

//             // $errorMessage = "File uploaded successfully.";
//         } else {
//             // $display = '';

//             // $errorMessage = "File upload failed.";
//         }

//         $targetFile = $targetDirectory . basename($_FILES["backImage"]["name"]);
//         if (move_uploaded_file($_FILES["backImage"]["tmp_name"], $targetFile)) {
//             // $display = '';

//             // $errorMessage = "File uploaded successfully.";
//         } else {
//             // $display = '';

//             // $errorMessage = "File upload failed.";
//         }

//         $sql = "UPDATE `kyc` SET `country`='$country',`docType`='$docType',`frontImage`=' $frontImage',`backImage`='$backImage' WHERE `user_id`='$user_id'";

//         $result = mysqli_query($conn, $sql);
//         if ($result) {
//             $_SESSION['user_id'] = $user_id;
//             // header('location: showdetails.php');
//             $alert = 'success';
//             $msg = 'Submited Successfully';
//         }
//     } else {
//         $alert = 'danger';
//         $msg = 'Field cannot be left empty';
//     }



// }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $targetDir = 'userPhoto/'; // Directory to store photos
    $targetFile = $_FILES['photoInput']['name'];
    $targetFile = $targetDir . basename($_FILES['photoInput']['name']);

    // Check if the file is a valid image
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    if (getimagesize($_FILES['photoInput']['tmp_name']) === false) {
        $alert = 'danger';
        $msg = 'Invalid image file.';
    }

    // Move the uploaded photo to the target directory
    if (move_uploaded_file($_FILES['photoInput']['tmp_name'], $targetFile)) {
        $sql = "UPDATE `kyc` SET `userPhoto`='$targetFile' WHERE `user_id`='$user_id'";

        $result = mysqli_query($conn, $sql);
        if ($result) {
            $_SESSION['user_id'] = $user_id;
            // header('location: showdetails.php');
            $alert = 'success';
            $msg = 'Photo uploaded successfully.';
        }
    } else {
        $alert = 'danger';
        $msg = 'Failed to upload photo.';
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
                                        <div
                                            class="d-flex justify-content-center align-items-center text-center text-danger">
                                            <div class="alert alert-<?= $alert ?>">
                                                <?= $msg ?>
                                            </div>
                                        </div>
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon2"><i
                                                            class=" ti-angle-double-down"></i></span>
                                                </div>
                                                <input type="email" class="form-control" id="email" name="email"
                                                    placeholder="Enter email address to recieve verification code"
                                                    required>
                                            </div>
                                            <div class="mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon2"><i
                                                            class=" ti-angle-double-down"></i></span>
                                                </div>
                                                <input class="form-control" type="file" accept="image/*"
                                                    capture="camera" id="photoInput" name="photoInput"
                                                    style="display: none;">
                                            </div>

                                            <div class="form-group text-center">
                                                <div class="col-xs-12 p-b-20">
                                                    <button class="btn btn-block btn-lg "
                                                        style="background: black; color: white;" type="button"
                                                        id="captureButton">Capture Photo</button>
                                                </div>
                                            </div>
                                            <div class="form-group text-center">
                                                <div class="col-xs-12 p-b-20">
                                                    <button class="btn btn-block btn-lg "
                                                        style="background: black; color: white;" type="submit"
                                                        name="EmailValidationBTN">Submit >></button>
                                                </div>
                                            </div>
                                            <!-- <form action="upload.php" method="post" enctype="multipart/form-data">
                                                <input type="file" accept="image/*" capture="camera" id="photoInput"
                                                    name="photoInput" style="display: none;">
                                                <button type="button" id="captureButton">Capture Photo</button>
                                                <input type="submit" value="Upload Photo">
                                            </form> -->
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
        document.getElementById('captureButton').addEventListener('click', function () {
            var photoInput = document.getElementById('photoInput');
            photoInput.click();
        });

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