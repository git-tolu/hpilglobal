<?php
session_start();
if (!isset($_SESSION['cname']) || !isset($_SESSION['email'])){
header("location:index.php");
}
include("includes/opendb.php");
$userid = $_SESSION['username'];
$sqlm = "SELECT *FROM outstandings WHERE userid ='$userid' and status='unpaid' ";
$resultm = mysqli_query($conn, $sqlm);
if (mysqli_num_rows($resultm) > 0) {
$cname=$_SESSION['cname']  ;
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
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url(../apply/assets/images/big/auth-bg.jpg) no-repeat center center;">
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
        <h4 class="m-b-0 text-white"><center>OUTSTANDING MEMBERSHIP DUES</center></h4></div>
    <div class="card-body">
        
<?php 
if (isset($databasemsg)){
	echo $databasemsg;
	
}
echo"<h3><center>Hello $cname!<br>
You have outstanding(s) dues to settle.</center></h3>";
?>

							            <div class="table-responsive">
                                    <table id="file_export" class="table table-striped table-bordered display">
                                        <thead>
                                            <tr>
                                                <th>Amout Owed</th>
												<th>Remarks</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
										
										<?php 
$sql8 = "SELECT *FROM outstandings WHERE userid ='$userid' and status='unpaid'";		   
$result8 = mysqli_query($conn, $sql8);
if (mysqli_num_rows($result8) > 0) {
	$totalamount=0;
	$totalremarks="";
while($info8 = mysqli_fetch_array($result8)) {	
$outid = $info8['id'];
$amountdue = $info8['amountdue'];
$amountduef = number_format($info8['amountdue'],2);
$totalamount=$totalamount+$amountdue;
$remarks = $info8['remarks'];
$totalremarks = $totalremarks."<br>".$info8['remarks'];


                                           echo" <tr>
                                                 <td>$amountduef</td>
												<td>$remarks</td>
                                               
                                            </tr>";

}
$totalamountf=number_format($totalamount,2);
$_SESSION['totalamount']=$totalamount;
$_SESSION['totalremarks']=$totalremarks;
$_SESSION['outid']=$outid;
}
											?>
											
                                           
                                        </tbody>
                                       
                                    </table>
                                </div> 
								<?php echo "<h3><center>TOTAL OWING: $totalamountf</center></h3>"; ?>

 <br> 
	  <a href='payoutstanding.php'><button type="button" class="btn btn-lg waves-effect waves-light btn-block btn-info"> I WILL PAY NOW </button></a>
	  <hr><a href='index.php'><button type="button" class="btn btn-lg waves-effect waves-light btn-block btn-secondary"> EXIT TO LOGIN </button></a>
		
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
<?php
}else{
	header("location:dashboard.php?id=welcome");
}?>