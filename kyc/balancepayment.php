<?php 
session_start();
$datereg=date("d-m-y , g:i a");
include("include/opendb.php");
if (!isset($_GET['agencyname']) || !isset($_GET['regid'])){
header("location:index.php");
}else{
$agencyname = $_GET['agencyname'] ;
$contactperson = $_GET['contact'] ;
$designation = $_GET['designation'] ;
$emailaddress = $_GET['agencyemail'] ;
$phone = $_GET['agencyphone'] ;
$userid = $_GET['regid'] ;
$pinpay = rand(100000, 999999);
$tx_ref = $userid. $pinpay;
$amounttopay = number_format("400000",2);

$_SESSION['agencyname'] = $agencyname;
$_SESSION['emailaddress'] = $emailaddress;
$_SESSION['contactperson'] = $contactperson;
$_SESSION['designation'] = $designation;
$_SESSION['phone']=$phone;
$_SESSION['userid']= $userid;

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
        <h4 class="m-b-0 text-white"><center>PAYMENT GATEWAY </center></h4></div>
    <div class="card-body">
        
<?php 
if (isset($databasemsg)){
	echo $databasemsg;
	
}
?>
<H6><center>Payment of N400,000.00 (Four Hundred Thousand Naira Only) as balance for EXMAN membership application </center></H6>

							<form method="POST" action="https://checkout.flutterwave.com/v3/hosted/pay">
 <input type="hidden" name="public_key" value="FLWPUBK-ffc22359cb9fcb86c9432adbca55949b-X" />
  
  <div class="form-group">
  <label for="com1" class="control-label col-form-label">Your Email Address </label>
  <input readonly value ="<?php echo $emailaddress; ?>" type="email" class="form-control"   required />
  <input value ="<?php echo $emailaddress; ?>" type="hidden" class="form-control"  name="customer[email]"  required />
  </div>
  
  <div class="form-group">
  <label for="com1" class="control-label col-form-label">Your Phone Number </label>
  <input readonly value ="<?php echo $phone; ?>" type="text" class="form-control"   required />
  <input value ="<?php echo $phone; ?>" type="hidden" class="form-control" name="customer[phone_number]"  required />
  </div>
  
  <div class="form-group">
  <label for="com1" class="control-label col-form-label">Your Agency Name </label>
  <input readonly value ="<?php echo $agencyname; ?>" type="text" class="form-control" required />
  <input value ="<?php echo $agencyname; ?>" type="hidden" class="form-control" name="customer[name]" required />
  </div>
  
  <div class="form-group">
  <label for="com1" class="control-label col-form-label">Amout to Pay </label>
  <input readonly value ="<?php echo $amounttopay; ?>" type="text" class="form-control"  required />
  </div>
  
  
  
  <?php // echo $numbervotes; ?>
  
  <input type="hidden" name="tx_ref" value="<?php echo $tx_ref; ?>" />
  <input type="hidden" name="amount" value="400000" />
  <input type="hidden" name="currency" value="NGN" />
  <input type="hidden" name="meta[token]" value="54" />
 <input type="hidden" name="redirect_url" value="https://membership.exman.com.ng/apply/savebalancepayment.php" />
 
 <?php //$totalamountf = number_format($totalamount,2); echo "<h3><center>Total Amount: $totalamountf</center></h3>"; ?>
  
 <button type="submit" class="btn btn-lg waves-effect waves-light btn-block btn-info">PAY NOW WITH FLUTTERWAVE </button>
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