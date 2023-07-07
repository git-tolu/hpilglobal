<?php
session_start();
include("include/opendb.php");
$datereg=date("d-m-y , g:i a");
$yearreg=date("Y");
$agencyname = $_SESSION['agencyname'] ;
$emailaddress = $_SESSION['emailaddress'] ;
$contactperson = $_SESSION['contactperson'] ;
$designation = $_SESSION['designation'];
$phone = $_SESSION['phone'] ;
$userid = $_SESSION['userid'] ;
$paystatus = $_GET['status'];
$paytx_ref = $_GET['tx_ref'];

if ($paystatus=="completed" || $paystatus=="successful"){
$transaction_id = $_GET['transaction_id'];
//search for password
$sql8 = "SELECT *FROM membership WHERE username='$userid'";		   
$result8 = mysqli_query($conn, $sql8);
if (mysqli_num_rows($result8) > 0) {
while($info8 = mysqli_fetch_array($result8)) {	
$pincode = $info8['pincode'];
}
}
//
$sql = "INSERT INTO paymenthistory VALUES ('$id', '$userid', '$agencyname', '$emailaddress', '400000', 'Balance Payment On Application', '$datereg', '$paytx_ref', '$transaction_id')";
if (mysqli_query($conn, $sql)) {
//update reg table
$nextdue="31-01-".($yearreg+1);
$sqlpay = "UPDATE membership set balancepayment ='paid', status='active', completeregpay='paid', nextannualdue='$nextdue' WHERE username = '$userid'";
if (mysqli_query($conn, $sqlpay)) {
include("../adminmanager/emailtemplates/activationemail.php");

}
//

}
	
}else{
header("location: failedpage.php");	
}



?>
