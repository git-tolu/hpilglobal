<?php
session_start();
if (!isset($_SESSION['agencyname']) || !isset($_SESSION['emailaddress'])){
header("location:index.php");
}
$datereg=date("d-m-y , g:i a");
	
if (isset($_POST['submitform'])){
include("include/opendb.php");
$emailcode = mysqli_real_escape_string($conn,$_POST['emailcode']);

$sql = "SELECT *FROM confirmemail WHERE confirmcode ='$emailcode' AND status='active'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
//update email code
$emailaddress = $_SESSION['emailaddress'] ;
$sqlemail = "UPDATE confirmemail set status ='expired' WHERE confirmcode = '$emailcode'";
if (mysqli_query($conn, $sqlemail)) {	
header("location:register.php");	
}
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
    <title>Experiential Marketer Association Of Nigeria : New Registration</title>
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
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url(assets/images/big/auth-bg.jpg) no-repeat center center;">
           	  <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="container-fluid">
				<div class="col-lg-12 col-md-12">
				<center>
				<br><br><img src='assets/images/logo.png'><br><br>
				<h3>EXPERIENTIAL MARKETERS ASSOCIATION OF NIGERIA<br>


</div>

<div class="row show-grid">
    <div class="col-xs-6 col-md-3"></div>
    <div class="col-xs-6 col-md-6">
	
	
	<div class="col-lg-12 col-md-12">
<div class="card border-info">
    <div class="card-header bg-info">
        <h4 class="m-b-0 text-white"><center>EMAIL CONFIRMATION </center></h4></div>
    <div class="card-body">
        
<?php 
if (isset($databasemsg)){
	echo $databasemsg;
	
}
?>

							<form  action="" method="post">
                               <center> <b>Enter Code Received</b><br><br>
								<div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class=" ti-angle-double-down"></i></span>
                                    </div>
                                    <input required name="emailcode" type="text" class="form-control form-control-lg text-center" placeholder="" aria-label="Password" aria-describedby="basic-addon1">
                                </div>
								
								
							
								
							
								
                                  <div class="form-group text-center">
                                    <div class="col-xs-12 p-b-20">
                                        <button  class="btn btn-block btn-lg btn-info" type="submit" name="submitform">CONFIRM CODE </button>
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
       All Rights Reserved by EXMAN . Designed and Developed by <a href="https://uptechng.com" target='blank'>UPTECH</a>.
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
    $('[data-toggle="tooltip "]').tooltip();
    $(".preloader ").fadeOut();
    </script>
</body>

</html>