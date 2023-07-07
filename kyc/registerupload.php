<?php
session_start();
if (!isset($_SESSION['agencyname']) || !isset($_SESSION['userid'])){
header("location:index.php");
}
$userid = $_SESSION['userid'] ;
include("include/opendb.php");
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
    <!-- This Page CSS -->
    <link rel="stylesheet" type="text/css" href="assets/libs/dropzone/dist/min/dropzone.min.css">
   
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
        <h4 class="m-b-0 text-white"><center>DOCUMENTS UPLOAD SECTION</center></h4></div>
    <div class="card-body">
        
<div class='alert alert-success'><H3>Payment Successful!</H3> Now you can upload all required documents here.</div>

							  
								
								Upload Passport Photograph  <br>
								
                                 <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class="ti-upload"></i></span>
                                    </div>
                                    <input id="passportUpload" required  type="file" accept="image/png, image/gif, image/jpeg"  class="form-control form-control-lg" placeholder="Upload Image" aria-label="Password" aria-describedby="basic-addon1">
										
									</div>
									
									

									<div class="progress" id="progress_bar" style="display:none; ">
										<div class="progress-bar" id="progress_bar_process" role="progressbar" style="width: 100%;">0%</div>
										</div>
										
							   <div id="uploaded_image" class=""></div>
								
								Upload Scanned Signature  <br>
								<div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class="ti-upload"></i></span>
                                    </div>
                                    <input  id="signatureUpload" type="file" accept="image/png, image/gif, image/jpeg"  class="form-control form-control-lg" placeholder="Upload Image" aria-label="Password" aria-describedby="basic-addon1">
                               
                                </div>
								<div class="progress" id="progress_bar_sign" style="display:none; ">
										<div class="progress-bar" id="progress_bar_process_sign" role="progressbar" style="width: 100%;">0%</div>
										</div>
										
							   <div id="uploaded_image_sign" class=""></div>
								
								Upload  Company profile  <br>
								<div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class="ti-upload"></i></span>
                                    </div>
                                    <input  id="profileUpload" type="file" accept="application/msword, application/vnd.ms-powerpoint, application/pdf"  class="form-control form-control-lg" placeholder="Upload Image" aria-label="Password" aria-describedby="basic-addon1">
                               
                                </div>
									<div class="progress" id="progress_bar_profile" style="display:none; ">
										<div class="progress-bar" id="progress_bar_process_profile" role="progressbar" style="width: 100%;">0%</div>
										</div>
										
							   <div id="uploaded_image_profile" class=""></div>
								
								
								Copy of Certificate of Incorporation  <br>
								<div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class="ti-upload"></i></span>
                                    </div>
                                    <input  id="certUpload" type="file" accept="application/pdf, image/*"  class="form-control form-control-lg" placeholder="Upload Image" aria-label="Password" aria-describedby="basic-addon1">
                               
                                </div>
									<div class="progress" id="progress_bar_cert" style="display:none; ">
										<div class="progress-bar" id="progress_bar_process_cert" role="progressbar" style="width: 100%;">0%</div>
										</div>
										
							   <div id="uploaded_image_cert" class=""></div>
								
								
								
								
								CAC Form C07  <br>
								<div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class="ti-upload"></i></span>
                                    </div>
                                    <input  id="form07Upload" type="file" accept="application/pdf, image/*"  class="form-control form-control-lg" placeholder="Upload Image" aria-label="Password" aria-describedby="basic-addon1">
                               
                                </div>
									<div class="progress" id="progress_bar_form07" style="display:none; ">
										<div class="progress-bar" id="progress_bar_process_form07" role="progressbar" style="width: 100%;">0%</div>
										</div>
										
							   <div id="uploaded_image_form07" class=""></div>
								
								CAC Form C02  <br>
								<div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class="ti-upload"></i></span>
                                    </div>
                                    <input  id="form02Upload" type="file" accept="application/pdf, image/*"  class="form-control form-control-lg" placeholder="Upload Image" aria-label="Password" aria-describedby="basic-addon1">
                               
                                </div>
									<div class="progress" id="progress_bar_form02" style="display:none; ">
										<div class="progress-bar" id="progress_bar_process_form02" role="progressbar" style="width: 100%;">0%</div>
										</div>
										
							   <div id="uploaded_image_form02" class=""></div>
								Audited account for the last two (2) yeears  <br>
								<div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class="ti-upload"></i></span>
                                    </div>
                                    <input  id="auditedUpload" type="file" accept="application/pdf, application/msword, application/vnd.ms-excel"  class="form-control form-control-lg" placeholder="Upload Image" aria-label="Password" aria-describedby="basic-addon1">
                               
                                </div>
									<div class="progress" id="progress_bar_audited" style="display:none; ">
										<div class="progress-bar" id="progress_bar_process_audited" role="progressbar" style="width: 100%;">0%</div>
										</div>
										
							   <div id="uploaded_image_audited" class=""></div>
								
							
                              <div class="col-md-12">       
	  <br> 
	  <a href='sendwelcomeemail.php'><button type="button" class="btn btn-lg waves-effect waves-light btn-block btn-info"> SUBMIT AND FINISH APPLICATION </button></a>
		</div>
                          


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
	 <!-- This Page JS -->
    <script src="assets/libs/dropzone/dist/min/dropzone.min.js"></script>
	<script type="text/javascript">
    
     function _(element)
{
    return document.getElementById(element);
}
// passportUpload
_('passportUpload').onchange = function(event){

    var form_data = new FormData();

    var image_number = 1;

    var error = '';

    for(var count = 0; count < _('passportUpload').files.length; count++)  
    {
        
        
        
            form_data.append("images[]", _('passportUpload').files[count]);
        

        image_number++;
    }

    if(error != '')
    {
        _('uploaded_image').innerHTML = error;

        _('passportUpload').value = '';
    }
    else
    {
        _('progress_bar').style.display = 'block';

        var ajax_request = new XMLHttpRequest();

        ajax_request.open("POST", "uploadpassport.php");

        ajax_request.upload.addEventListener('progress', function(event){

            var percent_completed = Math.round((event.loaded / event.total) * 100);

            _('progress_bar_process').style.width = percent_completed + '%';

            _('progress_bar_process').innerHTML = percent_completed + '% completed';

        });

        ajax_request.addEventListener('load', function(event){

            _('uploaded_image').innerHTML = '<div class="alert alert-success">Files Uploaded Successfully</div>';

            _('passportUpload').value = '';

        });

        ajax_request.send(form_data);
    }

};
//end passportUpload	 
	 
	 
// signatureUpload
_('signatureUpload').onchange = function(event){

    var form_data = new FormData();

    var image_number = 1;

    var error = '';

    for(var count = 0; count < _('signatureUpload').files.length; count++)  
    {
        
        
        
            form_data.append("images[]", _('signatureUpload').files[count]);
        

        image_number++;
    }

    if(error != '')
    {
        _('uploaded_image_sign').innerHTML = error;

        _('signatureUpload').value = '';
    }
    else
    {
        _('progress_bar_sign').style.display = 'block';

        var ajax_request = new XMLHttpRequest();

        ajax_request.open("POST", "uploadsignature.php");

        ajax_request.upload.addEventListener('progress', function(event){

            var percent_completed = Math.round((event.loaded / event.total) * 100);

            _('progress_bar_sign_process_sign').style.width = percent_completed + '%';

            _('progress_bar_sign_process_sign').innerHTML = percent_completed + '% completed';

        });

        ajax_request.addEventListener('load', function(event){

            _('uploaded_image_sign').innerHTML = '<div class="alert alert-success">File Uploaded Successfully</div>';

            _('signatureUpload').value = '';

        });

        ajax_request.send(form_data);
    }

};
//end signatureUpload



	 
	 
// profileUpload
_('profileUpload').onchange = function(event){

    var form_data = new FormData();

    var image_number = 1;

    var error = '';

    for(var count = 0; count < _('profileUpload').files.length; count++)  
    {
        
        
        
            form_data.append("images[]", _('profileUpload').files[count]);
        

        image_number++;
    }

    if(error != '')
    {
        _('uploaded_image_profile').innerHTML = error;

        _('profileUpload').value = '';
    }
    else
    {
        _('progress_bar_profile').style.display = 'block';

        var ajax_request = new XMLHttpRequest();

        ajax_request.open("POST", "uploadprofile.php");

        ajax_request.upload.addEventListener('progress', function(event){

            var percent_completed = Math.round((event.loaded / event.total) * 100);

            _('progress_bar_process_profile').style.width = percent_completed + '%';

            _('progress_bar_process_profile').innerHTML = percent_completed + '% completed';

        });

        ajax_request.addEventListener('load', function(event){

            _('uploaded_image_profile').innerHTML = '<div class="alert alert-success">File Uploaded Successfully</div>';

            _('profileUpload').value = '';

        });

        ajax_request.send(form_data);
    }

};
//end profileUpload
	 
	 
// certUpload
_('certUpload').onchange = function(event){

    var form_data = new FormData();

    var image_number = 1;

    var error = '';

    for(var count = 0; count < _('certUpload').files.length; count++)  
    {
        
        
        
            form_data.append("images[]", _('certUpload').files[count]);
        

        image_number++;
    }

    if(error != '')
    {
        _('uploaded_image_cert').innerHTML = error;

        _('certUpload').value = '';
    }
    else
    {
        _('progress_bar_cert').style.display = 'block';

        var ajax_request = new XMLHttpRequest();

        ajax_request.open("POST", "uploadcert.php");

        ajax_request.upload.addEventListener('progress', function(event){

            var percent_completed = Math.round((event.loaded / event.total) * 100);

            _('progress_bar_cert_process_cert').style.width = percent_completed + '%';

            _('progress_bar_cert_process_cert').innerHTML = percent_completed + '% completed';

        });

        ajax_request.addEventListener('load', function(event){

            _('uploaded_image_cert').innerHTML = '<div class="alert alert-success">File Uploaded Successfully</div>';

            _('certUpload').value = '';

        });

        ajax_request.send(form_data);
    }

};
//end certUpload

	 
	 
	 
// form07Upload
_('form07Upload').onchange = function(event){

    var form_data = new FormData();

    var image_number = 1;

    var error = '';

    for(var count = 0; count < _('form07Upload').files.length; count++)  
    {
        
        
        
            form_data.append("images[]", _('form07Upload').files[count]);
        

        image_number++;
    }

    if(error != '')
    {
        _('uploaded_image_form07').innerHTML = error;

        _('form07Upload').value = '';
    }
    else
    {
        _('progress_bar_form07').style.display = 'block';

        var ajax_request = new XMLHttpRequest();

        ajax_request.open("POST", "uploadform07.php");

        ajax_request.upload.addEventListener('progress', function(event){

            var percent_completed = Math.round((event.loaded / event.total) * 100);

            _('progress_bar_process_form07').style.width = percent_completed + '%';

            _('progress_bar_process_form07').innerHTML = percent_completed + '% completed';

        });

        ajax_request.addEventListener('load', function(event){

            _('uploaded_image_form07').innerHTML = '<div class="alert alert-success">File Uploaded Successfully</div>';

            _('form07Upload').value = '';

        });

        ajax_request.send(form_data);
    }

};
//end form07Upload 


// form02Upload
_('form02Upload').onchange = function(event){

    var form_data = new FormData();

    var image_number = 1;

    var error = '';

    for(var count = 0; count < _('form02Upload').files.length; count++)  
    {
        
        
        
            form_data.append("images[]", _('form02Upload').files[count]);
        

        image_number++;
    }

    if(error != '')
    {
        _('uploaded_image_form02').innerHTML = error;

        _('form02Upload').value = '';
    }
    else
    {
        _('progress_bar_form02').style.display = 'block';

        var ajax_request = new XMLHttpRequest();

        ajax_request.open("POST", "uploadform02.php");

        ajax_request.upload.addEventListener('progress', function(event){

            var percent_completed = Math.round((event.loaded / event.total) * 100);

            _('progress_bar_process_form02').style.width = percent_completed + '%';

            _('progress_bar_process_form02').innerHTML = percent_completed + '% completed';

        });

        ajax_request.addEventListener('load', function(event){

            _('uploaded_image_form02').innerHTML = '<div class="alert alert-success">File Uploaded Successfully</div>';

            _('form02Upload').value = '';

        });

        ajax_request.send(form_data);
    }

};
//end form02Upload  

// auditedUpload
_('auditedUpload').onchange = function(event){

    var form_data = new FormData();

    var image_number = 1;

    var error = '';

    for(var count = 0; count < _('auditedUpload').files.length; count++)  
    {
        
        
        
            form_data.append("images[]", _('auditedUpload').files[count]);
        

        image_number++;
    }

    if(error != '')
    {
        _('uploaded_image_audited').innerHTML = error;

        _('auditedUpload').value = '';
    }
    else
    {
        _('progress_bar_audited').style.display = 'block';

        var ajax_request = new XMLHttpRequest();

        ajax_request.open("POST", "uploadaudited.php");

        ajax_request.upload.addEventListener('progress', function(event){

            var percent_completed = Math.round((event.loaded / event.total) * 100);

            _('progress_bar_process_audited').style.width = percent_completed + '%';

            _('progress_bar_process_audited').innerHTML = percent_completed + '% completed';

        });

        ajax_request.addEventListener('load', function(event){

            _('uploaded_image_audited').innerHTML = '<div class="alert alert-success">File Uploaded Successfully</div>';

            _('auditedUpload').value = '';

        });

        ajax_request.send(form_data);
    }

};
//end auditedUpload 
	 
    $('[data-toggle="tooltip "]').tooltip();
    $(".preloader ").fadeOut();
    </script>
</body>

</html>