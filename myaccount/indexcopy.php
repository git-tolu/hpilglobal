<?php 
date_default_timezone_set('Africa/Lagos'); session_start();
include("includes/opendb.php");
	
if (isset($_POST['Submit'])){
	
//$user = addslashes($_REQUEST['userid']);
//$pass = addslashes($_REQUEST['password']);

$user = mysqli_real_escape_string($conn,$_POST['username']);
      $pass = mysqli_real_escape_string($conn,$_POST['password']); 
	//$today ="08-01-2024";
	$today=date("d-m-Y");
//Display the data
//$password == password_hash($pass, PASSWORD_BCRYPT);
$sql = "SELECT *FROM membership WHERE username ='$user' AND status='active'";
$result = mysqli_query($conn, $sql);
$passw = "";
if (mysqli_num_rows($result) > 0) {
		
	// output data of each row
    while($info = mysqli_fetch_array($result)) {
$fullname = $info['contactperson'];
$emailadd = $info['emailaddress'];
$passport = $info['passport'];
$passw = $info['password'];
$role = "Member";
$nextannualdue = $info['nextannualdue'];
$cname = strtoupper($info['agencyname']);
$status = $info['status'];


$rcno = $info['rcno'];
$mphone = $info['phone'];
$orgfunctions = $info['orgfunctions'];

$biznature = $info['biznature'];
$apconcert = strtoupper($info['apconcert']);
$seniorstaff = strtoupper($info['seniorstaff']);
$peraddress = $info['peraddress'];
$percity = $info['percity'];
$perstate = $info['perstate'];
$percountry = $info['percountry'];
$postaladdress = $info['postaladdress'];
$mpassport = $info['passport'];

$signature = $info['signature'];
$owing = $info['owing'];
$compprofile = $info['compprofile'];
$certincorp = $info['certincorp'];
$formc07 = $info['formc07'];
$formc02 = $info['formc02'];
$auditedacct = $info['auditedacct'];


	}
}


$date1 = new DateTime($today);
$date2 = new DateTime($nextannualdue);
$interval = $date1->diff($date2);

$nextannualdue1 =strtotime($nextannualdue);
$today1 =strtotime($today);

if ($today1> $nextannualdue1){
$diffe ="Grace Period";
}else{
$diffe =  "in ".$interval->days ;	
}



	
if (password_verify($pass, $passw)) {
$iduser=0;
$logindate = date("d/m/Y");
$dt = new DateTime();
$logintime =  $dt->format('H:i:s'); 


$_SESSION['cname'] = $cname ;
$_SESSION['userrole'] = $role ;
$_SESSION['userfullname'] = $fullname ;
$_SESSION['email'] = $emailadd ;
$_SESSION['username'] = $user ;
$_SESSION['passport'] = $passport ;
$_SESSION['$diffe'] = $diffe ;
$_SESSION['nextannualdue'] = $nextannualdue ;
$_SESSION['adminstatus'] = $status ;
$_SESSION['owing'] = $owing ;
$_SESSION['mphone'] = $mphone ;

if ($rcno=='' || $biznature=='' || $orgfunctions=='' || $apconcert=='' || $seniorstaff=='' || $peraddress==''){
header("Location: updatereg.php");
}

elseif ($signature=='' || $passport=='' || $compprofile=='' || $auditedacct=='' || $formc02=='' || $formc07==''){
header("Location: updateupload.php");
}elseif ($owing=='yes'){
header("Location: checkowinglogin.php");
}else{

header("Location: dashboard.php?id=welcome");	
}	
}else{
	$display ="<font color ='red'><b>* Invalid Login</font></b>";
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
    <title>Experiential Marketer Association Of Nigeria </title>
    <!-- Custom CSS -->
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
            <div style="border-style:solid !important; border-radius:20px !important" class="auth-box">
                <div id="loginform">
                    <div class="logo">
                        <span class="db"><center><img src="assets/images/logo.png" alt="logo" /></center></span>
                     <h3> MEMBERS' LOGIN</h3>
                    </div>
                    <!-- Form -->
                    <div class="row">
                        <div class="col-12">
						 <?php if (isset($display)) { echo "<blockquote>$display</blockquote>"; } ?>
                            <form class="form-horizontal m-t-20" id="loginform" action="" method="post">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="ti-user"></i></span>
                                    </div>
                                    <input type="text" name="username" class="form-control form-control-lg" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class="ti-lock"></i></span>
                                    </div>
                                    <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
                                </div>
                               
								
                             
								

											
                                <div class="form-group text-center">
                                    <div class="col-xs-12 p-b-20">
                                        <button name="Submit" class="btn btn-block btn-lg btn-warning" type="submit">Log In</button>
                                    </div>
                                </div>
                               
                                
                            </form>
                        </div>
                    </div>
                </div>
             
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
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
    $('[data-toggle="tooltip"]').tooltip();
    $(".preloader").fadeOut();
    // ============================================================== 
    // Login and Recover Password 
    // ============================================================== 
    $('#to-recover').on("click", function() {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
    });
    </script>
</body>

</html>