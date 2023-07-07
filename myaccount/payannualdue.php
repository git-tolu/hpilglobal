<?php
include('includes/aunthenticate.php'); 
$page=$cname;
$home="EXMAN";
$apptitle="$diffe [$nextannualdue]";
$todaydate=date("jS F, Y");

$futureNextDue=date('d-m-Y', strtotime('+1 year', strtotime($nextannualdue)) );
// get user details
$period = "$nextannualdue TO $futureNextDue";
$sql8 = "SELECT *FROM membership WHERE username='$user'";			   
$result8 = mysqli_query($conn, $sql8);
if (mysqli_num_rows($result8) > 0) {
	$column_num = 1;
while($info8 = mysqli_fetch_array($result8)) {	
$mid = $info8['id'];
$agencyname = strtoupper($info8['agencyname']);
$contactperson = strtoupper($info8['contactperson']);
$datereg = $info8['datereg'];
$initialpayment = $info8['initialpayment'];
$userid = $info8['username'];
$emailaddress = $info8['emailaddress'];
$phone = $info8['phone'];
$rcno = $info8['rcno'];
$orgfunctions = $info8['orgfunctions'];
$memberstatus = $info8['status'];
$approvaladmin = $info8['approvaladmin'];
$agreeterm = $info8['agreeterm'];
$yearreg = $info8['yearreg'];
$emailstatus = $info8['emailstatus'];
$nextannualdue = $info8['nextannualdue'];
$completeregpay = $info8['completeregpay'];
$biznature = $info8['biznature'];
$apconcert = strtoupper($info8['apconcert']);
$seniorstaff = strtoupper($info8['seniorstaff']);
$peraddress = $info8['peraddress'];
$percity = $info8['percity'];
$perstate = $info8['perstate'];
$percountry = $info8['percountry'];
$postaladdress = $info8['postaladdress'];
$designation = strtoupper($info8['designation']);
$mpassport = $info8['passport'];

$signature = $info8['signature'];
$compprofile = $info8['compprofile'];

$_SESSION['agencyname'] = $agencyname ;
$_SESSION['emailaddress']=$emailaddress ;
$_SESSION['contactperson']=$contactperson ;
$_SESSION['designation']= $designation ;
$_SESSION['phone']=$phone ;
$_SESSION['userid'] = $userid;
$_SESSION['futureNextDue'] = $futureNextDue;
$_SESSION['period'] = $period;
}
}
// end
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<?php 
include("includes/pagehead.php");
?>
<style>
 .responsive {
  width: 100%;
  max-width: 350px;
  height: auto;
}  
</style>
<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <?php
	include("includes/preloader.php");
	?>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
      <?php
	  include("includes/topheader.php");
	  ?>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
       <?php
	   include("includes/leftsidebar.php");
	   ?>
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
           <?php
		   include("includes/breadcrumb.php");
		   ?>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Sales Summery -->
                <!-- ============================================================== -->
                  <div class="row">
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-3 col-md-5">
                        <div class="card">
						 <div class="card-header bg-info">
        <h4 class="m-b-0 text-white"><center>PAY ANNUAL DUE </center></h4></div>
    
                            <div class="card-body">
                                
							<div class="col-md-12 col-sm-12 ">
                                        
                                      <H6><center>Payment of  ANNUAL FEE OF N150, 000 (One Hundred and Fifty Thousand Naira Only)</center></H6>
<h3 class="text-primary text-center"> [<?php echo $nextannualdue; ?>] TO [ <?php echo $futureNextDue; ?>]</h3>
							<hr>
							<form method="POST" action="https://checkout.flutterwave.com/v3/hosted/pay">
 <input type="hidden" name="public_key" value="FLWPUBK-ffc22359cb9fcb86c9432adbca55949b-X" />
  
  <div class="form-group">
  <label for="com1" class="control-label col-form-label">Your Email Address </label>
  <input readonly value ="<?php echo $useremailadd; ?>" type="email" class="form-control"    required />
  <input value ="<?php echo $useremailadd; ?>" type="hidden" class="form-control"  name="customer[email]"  required />
  </div>
  
  <div class="form-group">
  <label for="com1" class="control-label col-form-label">Your Phone Number </label>
  <input readonly value ="<?php echo $phone; ?>" type="text" class="form-control"   required />
  <input value ="<?php echo $phone; ?>" type="hidden" class="form-control" name="customer[phone_number]"  required />
  </div>
  
  <div class="form-group">
  <label for="com1" class="control-label col-form-label">Your Agency Name </label>
  <input readonly value ="<?php echo $cname; ?>" type="text" class="form-control"  required />
  <input value ="<?php echo $cname; ?>" type="hidden" class="form-control" name="customer[name]" required />
  </div>
  
  <div class="form-group">
  <label for="com1" class="control-label col-form-label">Amout to Pay </label>
  <input readonly value ="150, 000.00" type="text" class="form-control"  required />
  </div>
  
  
  
  <?php // echo $numbervotes; ?>
  
  <input type="hidden" name="tx_ref" value="<?php echo $userid; ?>" />
  <input type="hidden" name="amount" value="150000" />
  <input type="hidden" name="currency" value="NGN" />
  <input type="hidden" name="meta[token]" value="54" />
 <input type="hidden" name="redirect_url" value="https://membership.exman.com.ng/myaccount/savepayment.php" />
 
 <?php //$totalamountf = number_format($totalamount,2); echo "<h3><center>Total Amount: $totalamountf</center></h3>"; ?>
  
 <button type="submit" class="btn btn-lg waves-effect waves-light btn-block btn-info">PAY NOW WITH FLUTTERWAVE </button>
</form>

                                    </div>
							
                            </div>
                            </div>
                            <div>
                                <hr> </div>
                            <div class="card-body"> 
							
                        </div>
                    </div>
                    <!-- Column -->
					
					    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
						
						 <div class="card-header bg-warning">
        <h4 class="m-b-0 text-white"><center>CORPORATE DETAILS </center></h4></div>
    
                            <div class="card-body">
                                
							<div class="col-md-12 col-sm-12 ">
                                        
                                        <ul class="list-group">
										   <li class="list-group-item list-group-item-danger"><h4><?php echo $agencyname; ?><br><small>[name of agency]</small></h4></li>
                                            <li class="list-group-item list-group-item-default"><h4><?php echo $rcno; ?><br><small>[RC Number]</small></h4></li>
                                            <li class="list-group-item list-group-item-danger"><h4><h4><?php echo $biznature; ?><br><small>[business nature]</small></h4></li>
                                            <li class="list-group-item list-group-item-default"><h4><h4><?php echo $orgfunctions; ?><br><small>[organization functions]</small></h4> </li>
											
											<li class="list-group-item list-group-item-danger"><h4><?php echo $apconcert; ?><br><small>[APCON or NIMN certified?]</small></h4></li>
                                            <li class="list-group-item list-group-item-default"><h4><?php echo $seniorstaff; ?><br><small>[have senior staff?]</small></h4></li>
                                            <li class="list-group-item list-group-item-danger"><h4><h4><?php echo $peraddress; ?><br><small>[permanent address]</small></h4></li>
                                            <li class="list-group-item list-group-item-default"><h4><h4><?php echo $percity; ?><br><small>[city]</small></h4> </li>
											
											<li class="list-group-item list-group-item-danger"><h4><?php echo $perstate; ?><br><small>[state]</small></h4></li>
                                            <li class="list-group-item list-group-item-default"><h4><?php echo $percountry; ?><br><small>[country]</small></h4></li>
                                            <li class="list-group-item list-group-item-danger"><h4><h4><?php echo $postaladdress; ?><br><small>[postal address]</small></h4></li>
                                        </ul>
                                    </div>
							
                            </div>
                            </div>
                            <div>
                                <hr> </div>
                            <div class="card-body"> 
							
                        </div>
                    </div>
                   
                    <!-- Column -->
                   
            
			
			
			
			
			
			
			
                    <!-- Column -->
                </div>
                <!-- ============================================================== -->
                <!-- Recent comment and chats -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
        <?php 
		include("includes/footer.php");
		?> <!-- ============================================================== -->
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
   
   
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <?php
	include("includes/pagescript.php");
	?>
	
	

</body>

</html>