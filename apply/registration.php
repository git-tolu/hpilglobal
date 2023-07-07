<?php
session_start();
$datereg=date("d-m-y , g:i a");
include("include/opendb.php");
$sqlcodecount = "SELECT * FROM qrcodecountstotal";
$resultcodecount = mysqli_query($conn, $sqlcodecount);
if (mysqli_num_rows($resultcodecount) > 0) {
while($info = mysqli_fetch_array($resultcodecount)) {	
$balancecode =$info['totalbalance'];
}
}
		
if ($balancecode > 0){		
if (isset($_POST['submitform'])){
	$yearreg=date('Y');
$surname = mysqli_real_escape_string($conn,$_POST['surname']);
$firstname = mysqli_real_escape_string($conn,$_POST['firstname']);
$dob = mysqli_real_escape_string($conn,$_POST['dob']);
$middlename = mysqli_real_escape_string($conn,$_POST['middlename']);
$cadre = mysqli_real_escape_string($conn,$_POST['cadre']);
$affiliation = mysqli_real_escape_string($conn,$_POST['affiliation']);
$homeaddress = mysqli_real_escape_string($conn,$_POST['homeaddress']);
$emailadd = mysqli_real_escape_string($conn,$_POST['emailadd']);
$phone = mysqli_real_escape_string($conn,$_POST['phone']);
$gender = mysqli_real_escape_string($conn,$_POST['gender']);

$previousteam = mysqli_real_escape_string($conn,$_POST['previousteam']);
$presentteam = mysqli_real_escape_string($conn,$_POST['presentteam']);

if (isset($_POST['clubname'])){
$clubname = mysqli_real_escape_string($conn,$_POST['clubname']);
}else{
	$clubname ="not applicable";
}
if (isset($_POST['accountnumber'])){
$accountnumber = mysqli_real_escape_string($conn,$_POST['accountnumber']);
}else{
	$accountnumber ="not applicable";
}


$affirm = "I $surname $firstname $middlename of $homeaddress hereby affirm that all information I enetered above are all correct and can be used to process my digital ID. I will be responsible for any error related to my input.";
$id = 0;

$target_dir1 = "adminmanager/uploads/passports/";
$target_file1 = $target_dir1 . basename($_FILES["passport"]["name"]);
$rootpassport = $_FILES["passport"]["tmp_name"];
$passportdir = dirname($_FILES["passport"]["tmp_name"]);


$target_dir2 = "adminmanager/uploads/signatures/";
$target_file2 = $target_dir2 . basename($_FILES["signature"]["name"]);
$rootsignature =$_FILES["signature"]["tmp_name"];
$signaturedir = dirname($_FILES["signature"]["tmp_name"]);

$target_dir3 = "adminmanager/uploads/proofresidence/";
$target_file3 = $target_dir3 . basename($_FILES["proofresidence"]["name"]);
$rootproofresidence =$_FILES["proofresidence"]["tmp_name"];
$proofresidencedir = dirname($_FILES["proofresidence"]["tmp_name"]);


$file_name1 = $_FILES['passport']['name'];
$file_name2 = $_FILES['signature']['name'];	
$file_name3 = $_FILES['proofresidence']['name'];	 


$uploadOk = 1;
$imageFileType1 = pathinfo($target_file1,PATHINFO_EXTENSION);
$imageFileType2 = pathinfo($target_file2,PATHINFO_EXTENSION);
$imageFileType3 = pathinfo($target_file3,PATHINFO_EXTENSION);
$pinn1 = rand(100000, 999990);
$pinn2 = rand(100000, 999990);


$pinn = $pinn2+$pinn1;


$regno1 = "passport$surname$firstname$middlename".$pinn;
$regno2 = "signature$surname$firstname$middlename".$pinn;
$regno3 = "proofresidence$surname$firstname$middlename".$pinn;

$newfilename1="$regno1.$imageFileType1";
$target_file1 = $target_dir1 .$newfilename1;

$newfilename2="$regno2.$imageFileType2";
$target_file2 = $target_dir2 .$newfilename2;

$newfilename3="$regno3.$imageFileType3";
$target_file3 = $target_dir3 .$newfilename3;

$sql = "SELECT *FROM digitalidcard WHERE emailaddress ='$emailadd' AND yearreg='$yearreg' AND status='paid'";
$result = mysqli_query($conn, $sql);
$id=0;
$pinno = rand(100000, 999999);
$regno = "EKSFA$pinno";

if (mysqli_num_rows($result) > 0) {	
$databasemsg="<div class='alert alert-warning'><b>Sorry!</b> This email address is already registered on this platform. Try another.</div>";
}else{ 
$_SESSION['surname']=$surname;
$_SESSION['firstname']=$firstname;
$_SESSION['dob']=$dob;
$_SESSION['middlename']=$middlename;
$_SESSION['cadre']=$cadre;


$_SESSION['affiliation']=$affiliation;
$_SESSION['homeaddress']=$homeaddress;
$_SESSION['emailadd']=$emailadd;

$_SESSION['phone']=$phone;
$_SESSION['gender']=$gender;
$_SESSION['affirm']=$affirm;
$_SESSION['regno']=$regno;

$_SESSION['previousteam']=$previousteam;
$_SESSION['presentteam']=$presentteam;

$_SESSION['accountnumber']=$accountnumber;
$_SESSION['clubname']=$clubname;


if (move_uploaded_file($_FILES["passport"]["tmp_name"], $target_file1)) {
if (move_uploaded_file($_FILES["signature"]["tmp_name"], $target_file2)) {
if (move_uploaded_file($_FILES["proofresidence"]["tmp_name"], $target_file3)) {
include("include/opendb.php");	

$sql = "INSERT INTO digitalidcard VALUES ('$id', '$surname', '$firstname', '$middlename', '$gender', '$dob', '$homeaddress', '$emailadd', '$phone', '$affiliation', '$cadre', '$datereg', '$regno', '$target_file1', '$target_file2', '$target_file3', '$affirm', 'notpaid', '', '', '$previousteam','$presentteam', '$accountnumber', '$clubname', '$yearreg')";
if (mysqli_query($conn, $sql)) {
	header("location:preview.php");
}else{
	$databasemsg="<div class='alert alert-warning'><b>Sorry!</b> The process was terminated! Try again later.</div>".mysqli_error($conn);

}
}
}
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
    <title>Ekiti State FA Digital ID Platform | Registration </title>
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
        <h4 class="m-b-0 text-white"><center>REGISTRATION INSTRUCTIONS</center></h4></div>
    <div class="card-body">
        
<?php 
if (isset($databasemsg)){
	echo $databasemsg;
	
}
?>

							<form onSubmit="if(!confirm('Is the form filled out correctly?')){return false;} action="" method="post" enctype="multipart/form-data">
                                Surname<br>
								<div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class="ti-user"></i></span>
                                    </div>
                                    <input required name="surname" type="text" class="form-control form-control-lg" placeholder="" aria-label="Password" aria-describedby="basic-addon1">
                                </div>
								First Name<br>
								<div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class="ti-user"></i></span>
                                    </div>
                                    <input required name="firstname" type="text" class="form-control form-control-lg" placeholder="" aria-label="Password" aria-describedby="basic-addon1">
                                </div>
								Middle Name<br>
								<div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class="ti-user"></i></span>
                                    </div>
                                    <input name="middlename" type="text" class="form-control form-control-lg" placeholder="" aria-label="Password" aria-describedby="basic-addon1">
                                </div>
								Gender<br>
								<div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class="ti-user"></i></span>
                                    </div>
								    <select required name="gender" class="form-control custom-select">
									 <option value="">Select</option>
										<option value="Male">Male</option>
										<option value="Female">Female</option>
									</select>
                                </div>
								Date Of Birth<br>
								<div class="input-group mb-3">
								
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class="ti-calendar"></i></span>
                                    </div>
									
                                    <input required name="dob" type="date" class="form-control form-control-lg" placeholder="Date of birth" aria-label="Date of birth" aria-describedby="Date of birth">
                                </div>
								Home Address<br>
								<div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class="ti-location-pin"></i></span>
                                    </div>
                                    <input required name="homeaddress" type="text" class="form-control form-control-lg" placeholder="" aria-label="Password" aria-describedby="basic-addon1">
                                </div>
								Email Address<br>
								<div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class="ti-email"></i></span>
                                    </div>
                                    <input required name="emailadd" type="email" class="form-control form-control-lg" placeholder="" aria-label="Password" aria-describedby="basic-addon1">
                                </div>
								Phone Number<br>
								<div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class="ti-mobile"></i></span>
                                    </div>
                                    <input required name="phone" type="text" class="form-control form-control-lg" placeholder="" aria-label="Password" aria-describedby="basic-addon1">
                                </div>
								
								Previous Team<br>
								<div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class="ti-user"></i></span>
                                    </div>
                                    <input name="previousteam" type="text" class="form-control form-control-lg" placeholder="" aria-label="Password" aria-describedby="basic-addon1">
                                </div>
								Present Team<br>
								<div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class="ti-user"></i></span>
                                    </div>
                                    <input name="presentteam" type="text" class="form-control form-control-lg" placeholder="" aria-label="Password" aria-describedby="basic-addon1">
                                </div>
								
								Affiliated Organisation<br>
								<div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class="ti-layers"></i></span>
                                    </div>
                                    <select required name="affiliation" class="form-control custom-select" onchange="document.getElementById('interlink_addition').style.display = (this.value=='The Ekiti State League teams' ? 'block' : 'none')">
									 <option value="">Select</option>
										<option value="Local Football Councils">Local Football Councils</option>
										<option value="Ekiti State Referees Council">Ekiti State Referees Council</option>
										<option value="Nigeria Football Coaches Association, Ekiti State chapter">Nigeria Football Coaches Association, Ekiti State chapter</option>
										<option value="Nigeria Professional Footballers Association, Ekiti State Chapter">Nigeria Professional Footballers Association, Ekiti State Chapter</option>
										<option value="Nigeria Football Supporter Club, Ekiti State chapter">Nigeria Football Supporter Club, Ekiti State chapter</option>
										<option value="The Nigeria National League teams">The Nigeria National League teams</option>
										<option value="The Nationwide League One teams">The Nationwide League One teams</option>
										
										<option value="The Nigeria Female Football League teams">The Nigeria Female Football League teams</option>
										<option value="The Ekiti State League teams">The Ekiti State League teams </option>
										<option value="Patrons and Advisers of Ekiti State Football Association">Patrons and Advisers of Ekiti State Football Association</option>
										<option value="Ekiti State Football Association Executive Committee">Ekiti State Football Association Executive Committee</option>
									</select>
                                </div>
								
							
								<div id="interlink_addition" style="display:none">
								Select Club <br>
								<div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class="ti-layers"></i></span>
                                    </div>
                                    <select  name="clubname" class="form-control custom-select">
									 <option value="">Select</option>
										<option value="Rajjy FC, Ikere Ekiti">Rajjy FC, Ikere Ekiti</option>
										<option value="Football Connect FC, Iworoko Ekiti">Football Connect FC, Iworoko Ekiti</option>
										<option value="EKSU Galacticos FC, Iworoko Ekiti">EKSU Galacticos FC, Iworoko Ekiti</option>
										<option value="Immigration FC - Ado Ekiti">Immigration FC - Ado Ekiti</option>
										<option value="Ipoti comets FC, Ipoti Ekiti">Ipoti comets FC, Ipoti Ekiti</option>
										<option value="White Horse FC, Ado Ekiti ">White Horse FC, Ado Ekiti </option> 
										<option value="Otunba Kolawole FC, Ijan Ekiti">Otunba Kolawole FC, Ijan Ekiti</option>
										<option value="Are FC, Ijero Ekiti">Are FC, Ijero Ekiti</option>
										
										<option value="Lord's Will FC, Ado Ekiti">Lord's Will FC, Ado Ekiti</option>
										<option value="Champions FC, Ado Ekiti">Champions FC, Ado Ekiti</option>
										<option value="Adeyeye Adebowale FC, Ado Ekiti">Adeyeye Adebowale FC, Ado Ekiti</option>
										<option value="FUOYE Dazzlers FC, Oye Ekiti">FUOYE Dazzlers FC, Oye Ekiti</option>
										<option value="Shalom FC, Ado Ekiti">Shalom FC, Ado Ekiti</option>
										<option value="Omisanjana FC, Ado Ekiti">Omisanjana FC, Ado Ekiti</option>
										<option value="Vicolas FC, Iworoko Ekiti">Vicolas FC, Iworoko Ekiti</option>
										<option value="Ajaye FC, Ado Ekiti">Ajaye FC, Ado Ekiti</option>
										<option value="Crankshaft FC, Ado Ekiti">Crankshaft FC, Ado Ekiti</option>
										<option value="Harmony FC, Ado Ekiti">Harmony FC, Ado Ekiti</option>
										<option value="Phoenix ASC Kiddies, Ado Ekiti">Phoenix ASC Kiddies, Ado Ekiti</option>
										<option value="Leo FC, Ado Ekiti">Leo FC, Ado Ekiti</option>
									</select>
                                </div>
								
								
								Account Number <br>
								<div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class="ti-user"></i></span>
                                    </div>
                                    <input name="accountnumber" type="text" class="form-control form-control-lg" placeholder="" aria-label="Password" aria-describedby="basic-addon1">
                                </div>
								
								
								
								</div>
								
									Cadre<br>
								<div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class="ti-server"></i></span>
                                    </div>
                                    <select required name="cadre" class="form-control custom-select">
									 <option value="">Select</option>
										<option value="Chairman">Chairman</option>
										<option value="Vice Chairman">Vice Chairman</option>
										<option value="Member">Member</option>
										<option value="General Manager">General Manager</option>
										<option value="Club Owner">Club Owner</option>
										<option value="Secretary">Secretary</option>
										<option value="Player">Player</option>
										<option value="Others">Others</option>
									</select>
                                </div>
								
								
								Upload Passport Photograph (Maximum 100kb) <br>
								<div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class="ti-upload"></i></span>
                                    </div>
                                    <input  required name="passport" type="file" accept="image/png, image/gif, image/jpeg"  class="form-control form-control-lg" placeholder="Upload Image" aria-label="Password" aria-describedby="basic-addon1">
                           

							   </div>
								
								Upload Scanned Signature (Maximum 100kb) <br>
								<div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class="ti-upload"></i></span>
                                    </div>
                                    <input  required name="signature" type="file" accept="image/png, image/gif, image/jpeg"  class="form-control form-control-lg" placeholder="Upload Image" aria-label="Password" aria-describedby="basic-addon1">
                               
                                </div>
								
								Upload Proof Of Residence (Maximum 100kb) <br>
								<div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class="ti-upload"></i></span>
                                    </div>
                                    <input  required name="proofresidence" type="file" accept="image/png, image/gif, image/jpeg"  class="form-control form-control-lg" placeholder="Upload Image" aria-label="Password" aria-describedby="basic-addon1">
                               
                                </div>
								
								<div class="form-check form-check-inline">
                                    <div class="custom-control custom-checkbox">
                                        <input required name="affirm" type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">I hereby affirm that all information I enetered above are all correct and can be used to process my digital ID. I will be responsible for any error related to my input.</label>
                                    </div>
                                </div>
								
                                <div class="form-group text-center">
                                    <div class="col-xs-12 p-b-20">
                                        <button onClick='return confirmSubmit()' class="btn btn-block btn-lg btn-info" type="submit" name="submitform">CONTINUE REGISTRATION </button>
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
	

<script>
    function previewFile(input){
        var file = $("input[type=file]").get(0).files[0];
 
        if(file){
            var reader = new FileReader();
 
            reader.onload = function(){
                $("#previewImg").attr("src", reader.result);
            }
 
            reader.readAsDataURL(file);
        }
    }
	
	 function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
		
		
</script>
<script LANGUAGE="JavaScript">
<!--
function confirmSubmit()
{
	
var agree=confirm("Are you sure you have checked that all your information is correct? Please note that you will be responsible for any error on your digital card caused by your entry");
if (agree)
 return true ;
else
 return false ;

}
// -->
</script>
</body>

</html>
<?php
}else{
header("location:suspended.php");
}
?>