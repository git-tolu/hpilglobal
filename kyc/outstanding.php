<?php
session_start();
$datereg=date("d-m-y , g:i a");
include("include/opendb.php");
$phone = $_SESSION['phone'];
$emailaddress = $_SESSION['emailaddress'];;
$agencyname = $_SESSION['agencyname'];
$userid = $_SESSION['userid'];
	
if (isset($_POST['submitform'])){
$amount = mysqli_real_escape_string($conn,$_POST['amount']);
$remarks = mysqli_real_escape_string($conn,$_POST['remarks']);
$id=0;
$sqlm = "SELECT *FROM outstandings WHERE agencyemail ='$emailaddress' AND amountdue='$amount'";
$resultm = mysqli_query($conn, $sqlm);
if (mysqli_num_rows($resultm) > 0) {
	$databasemsg="<div class='alert alert-warning'><b>Sorry!</b> This outstanding already saved. </div>";
$agencyname = "";
}else{
	
$sqlinsert = "INSERT INTO outstandings VALUES ('$id', '$userid','$amount','unpaid',' $agencyname','$emailaddress','$phone','$remarks')";
if (mysqli_query($conn, $sqlinsert)) {
$databasemsg="<div class='alert alert-success'><b>Successful!</b> $agencyname outstanding was saved.</div>";
$agencyname = "";
}else{
	$databasemsg="<div class='alert alert-warning'><b>Sorry!</b> The process was terminated! Try again later.</div>";
$agencyname = "";
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
        <h4 class="m-b-0 text-white"><center>MEMBERS' OUTSTANDING </center></h4></div>
    <div class="card-body">
        
<?php 
if (isset($databasemsg)){
	echo $databasemsg;
	
}
?>

							<form  action="" method="post" enctype="multipart/form-data">
                               <b> Name of Agency<br>
								<div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class=" ti-angle-double-down"></i></span>
                                    </div>
                                    <input value="<?php echo $agencyname; ?>" required name="agencyname" type="text" class="form-control form-control-lg" placeholder="" aria-label="Password" aria-describedby="basic-addon1">
                                </div>
								
								<b> Total Amount Owing<br>
								<div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class=" ti-angle-double-down"></i></span>
                                    </div>
                                    <input value="" required name="amount" type="text" class="form-control form-control-lg" placeholder="" aria-label="Password" aria-describedby="basic-addon1">
                                </div>
								
								<b> Remarks<br>
								<div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class=" ti-angle-double-down"></i></span>
                                    </div>
                                    <input value="" required name="remarks" type="text" class="form-control form-control-lg" placeholder="" aria-label="Password" aria-describedby="basic-addon1">
                                </div>
								
													
								
                                  <div class="form-group text-center">
                                    <div class="col-xs-12 p-b-20">
                                        <button  class="btn btn-block btn-lg btn-info" type="submit" name="submitform">SUBMIT OUTSTANDING</button>
                                       <hr> <a href="registerexisting.php"><button  class="btn btn-block btn-lg btn-secondary" type="button">REGISTER ANOTHER</button>
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