<?php 
if (isset($_GET['mid'])){
include("include/opendb.php");
$regid = $_GET['mid'];		  
$sql8 = "SELECT *FROM  digitalidcard  WHERE regid ='$regid'";
			   
$result8 = mysqli_query($conn, $sql8);
if (mysqli_num_rows($result8) > 0) {
$column_num = 1;
while($info8 = mysqli_fetch_array($result8)) {	
$mid = $info8['id'];
$surname = strtoupper($info8['surname']) ;
$firstname = strtoupper($info8['firstname']) ;
$dob = $info8['dob'] ;
$middlename = strtoupper($info8['middlename']) ;
$cadre = $info8['cadre'] ;
$affiliation = $info8['affiliation'] ;
$homeaddress = $info8['homeaddress'] ;
$emailadd = $info8['emailaddress'] ;
$phone = $info8['phone'] ;
$gender = $info8['gender'] ;
$passp = $info8['passport'] ;
$signature = $info8['signature'] ;
$regid = $info8['regid'] ;
$affirm = $info8['affirm'] ;
$datereg = $info8['datereg'] ;
$finalprint = $info8['finalprint'] ;
$datefinalprint = $info8['datefinalprint'] ;
$proofresidence = $info8['proofresidence'] ;
$previousteam = $info8['previousteam'] ;
$presentteam = $info8['presentteam'] ;
$clubname = $info8['clubname'] ;
}
}
}else{
header("location:notfound.php");
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
    <title>EKITI STATE FOOTBALL ASSOCIATION </title>
    <!-- This Page CSS -->
    <link href="assets/libs/magnific-popup/dist/magnific-popup.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<script>
function goBack() {
  window.history.back();
}
</script>
</head>

<body>
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
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
      
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
    
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->

            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="container-fluid">
				<div class="col-lg-12 col-md-12">
				<center>
				<img src='assets/images/logo.png'><br><br>
				<h3>EKITI STATE FOOTBALL ASSOCIATION DIGITAL ID CARD<br>


</div>

<div class="row show-grid">
    <div class="col-xs-6 col-md-3"></div>
    <div class="col-xs-6 col-md-6">
	
	
	<div class="col-lg-12 col-md-12">
<div class="card border-info">
    <div class="card-header bg-info">
        <h4 class="m-b-0 text-white"><center> CONFIRMATION PLATFORM </center> </h4></div>
    <div class="card-body">
	  <div class="row el-element-overlay">
	 <div class="el-card-item">
		<div class="el-card-avatar el-overlay-1"> <img src="passports/<?php echo "$regid.jpg";?>" alt="<?php echo "$surname $firstname $middlename";?>" />
			<div class="el-overlay">
				<ul class="list-style-none el-info">
					<li class="el-item"><a class="btn default btn-outline image-popup-vertical-fit el-link" href="passports/<?php echo "$regid.jpg";?>"><i class="icon-magnifier"></i></a></li>
					
				</ul>
			</div>
		</div>
		
	</div>
 </div>

  <ul class="list-group">
    <li class="list-group-item list-group-item-success"><b>ID NO:</b> <?PHP ECHO $regid; ?></li>
    <li class="list-group-item list-group-item-success"><b>SURNAME:</b> <?PHP ECHO $surname; ?></li>
    <li class="list-group-item list-group-item-info"><b>FIRST NAME:</b> <?PHP ECHO $firstname; ?></li>
    <li class="list-group-item list-group-item-warning"><b>MIDDLE NAME:</b> <?PHP ECHO $middlename; ?></li>
    <li class="list-group-item list-group-item-danger"><b>GENDER:</b> <?PHP ECHO $gender; ?></li>
	
	<li class="list-group-item list-group-item-success"><b>DATE OF BIRTH:</b> <?PHP ECHO $dob; ?></li>
    <li class="list-group-item list-group-item-info"><b>HOME ADDRESS:</b> <?PHP ECHO $homeaddress; ?></li>
    <li class="list-group-item list-group-item-warning"><b>EMAIL ADDRESS:</b> <?PHP ECHO $emailadd; ?></li>
    <li class="list-group-item list-group-item-danger"><b>PHONE NUMBER:</b> <?PHP ECHO $phone; ?></li>
	
	<li class="list-group-item list-group-item-success"><b>AFFILIATED ORGANISATION:</b> <?PHP ECHO $affiliation; ?></li>
	
    <li class="list-group-item list-group-item-info"><b>CADRE:</b> <?PHP ECHO $cadre; ?></li>
    <li class="list-group-item list-group-item-info"><b>PREVIOUS TEAM:</b> <?PHP ECHO $previousteam; ?></li>
    <li class="list-group-item list-group-item-info"><b>PRESENT TEAM:</b> <?PHP ECHO $presentteam; ?></li>
    <li class="list-group-item list-group-item-info"><b>CLUB NAME:</b> <?PHP ECHO $clubname; ?></li>
    
  
  </ul>
 <br>


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
       All Rights Reserved by Ekiti State Football Association . Designed and Developed by <a href="https://uptechng.com" target='blank'>UPTECH</a>.
</footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- customizer Panel -->
    <!-- ============================================================== -->

    <div class="chat-windows"></div>
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <script src="dist/js/app.min.js"></script>
    <script src="dist/js/app.init.horizontal-fullwidth.js"></script>
    <script src="dist/js/app-style-switcher.horizontal.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    <!-- This Page JS -->
    <script src="assets/libs/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
    <script src="assets/libs/magnific-popup/meg.init.js"></script>
</body>

</html>