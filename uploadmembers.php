<?php 
include('aunthenticate.php'); 
$page ="Upload Customers";


if (isset($_POST['uploadcustomers'])){

//profile pix upload
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["uploadfile"]["name"]);
$file_name = $_FILES['uploadfile']['name'];

$uploadOk = 1;
$FileType = pathinfo($target_file,PATHINFO_EXTENSION);

// Allow certain file formats
if($FileType != "php") {
     $passportmsg="Sorry, only PHP file is allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error

	
// Upload Files

	
if (move_uploaded_file($_FILES["uploadfile"]["tmp_name"], $target_file)) {
		
header("location:customerupload2.php");		
	
} else {
    $databasemsg="<br><blockquote>Uploading was not successful </blockquote>";

}


}

	
?>
<!DOCTYPE html>
<!--
   This is a starter template page. Use this page to start your new project from
   scratch. This page gets rid of all links and provides the needed markup only.
   -->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="FLOWERGATE PROPERTIES & HOME LTD">
<meta name="author" content="FLOWERGATE PROPERTIES & HOME LTD">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/favicon.png">
    <title><?php echo "$page | $cname" ; ?></title>
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- This is Sidebar menu CSS -->
    <link href="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- This is a Animation CSS -->
    <link href="css/animate.css" rel="stylesheet">
    <!-- This is a Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- color CSS you can use different color css from css/colors folder -->
    <!-- We have chosen the skin-blue (default.css) for this starter
         page. However, you can choose any other skin from folder css / colors .
         -->
    <link href="css/colors/megna.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
</head>

<body class="fix-sidebar">
    <!-- Preloader -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
        </svg>
    </div>
    <div id="wrapper">
       
	   <?php include("navheader.php");?>
	   
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <?php include('topcommonadmin.php'); ?>
                <!-- .row body-->
                <div class="row">
                    <div class="col-md-12">
					<!-- dashboard line 1-->
                        <div class="panel panel-themecolor">
                                    <div class="panel-heading">
                                        UPLOAD CUSTOMERS FROM FILE <span class="circle circle-md bg-info">  </span>
                                    </div>
                                    <div class="panel-body">
                            <div class="row row-in">
							
							<form role="form" action="" method="post" enctype="multipart/form-data">
		<div class="col-md-2">	
</div>  		
<div class="col-md-8">
<?php if (isset($databasemsg)) { echo $databasemsg; } ?>

								<div class="form-group">
                                    <label class="col-sm-12">File upload</label>
                                    <div class="col-sm-12">
                                           <input type="file" name="uploadfile">
										   <small> <font color="red"><strong>Note: Credit Alert will automatically be sent to uploaded customers</strong></font> </small>
                                    </div>
                                </div>
								
										<div class="text-right">
                                            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10" name="uploadcustomers">Upload Now . . .</button>
                                        </div>
							 
                                </div>  
								
							</div>  

<div class="col-md-2">	
</div> 							
							</form>
							</div>
							
							<br>
							 
			
                </div>
                <!-- .row -->
               
            </div>
            <!-- /.container-fluid -->
           <?php include("footer.php"); ?>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Sidebar menu plugin JavaScript -->
    <script src="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--Slimscroll JavaScript For custom scroll-->
    <script src="js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="js/custom.js"></script>
	<script src="js/jasny-bootstrap.js"></script>
</body>

</html>
<?php 
//include('aunthenticateclose.php;'); 
?>