<?php
session_start();
include("include/opendb.php");
$datereg=date("d-m-y , g:i a");
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
$sql = "INSERT INTO paymenthistory VALUES ('$id', '$userid', '$agencyname', '$emailaddress', '250000', 'Initial Payment', '$datereg', '$paytx_ref', '$transaction_id')";
if (mysqli_query($conn, $sql)) {
//update reg table
$sqlpay = "UPDATE membership set initialpayment ='paid' WHERE username = '$userid'";
if (mysqli_query($conn, $sqlpay)) {
//include("../adminmanager/emailtemplates/welcomeemail.php");
}
//
header("location:registerupload.php");
}
	
}else{
header("location: failedpage.php");	
}



?>
