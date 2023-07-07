<?php
session_start();
include("includes/opendb.php");
$datereg=date("d-m-y , g:i a");
$agencyname = $_SESSION['agencyname'] ;
$emailaddress = $_SESSION['emailaddress'] ;
$contactperson = $_SESSION['contactperson'] ;
$designation = $_SESSION['designation'];
$phone = $_SESSION['phone'] ;
$userid = $_SESSION['username'] ;
$paystatus = $_GET['status'];
$paytx_ref = $_GET['tx_ref'];
$amounttopay = $_SESSION['totalamount'];
$totalremarks=$_SESSION['totalremarks'];
$outid=$_SESSION['outid'];
if ($paystatus=="completed" || $paystatus=="successful"){
$transaction_id = $_GET['transaction_id'];
$sql = "INSERT INTO paymenthistory VALUES ('$id', '$userid', '$agencyname', '$emailaddress', '$amounttopay', '$totalremarks', '$datereg', '$paytx_ref', '$transaction_id')";
if (mysqli_query($conn, $sql)) {
//update reg table
$sqlpay = "UPDATE membership set owing ='' WHERE username = '$userid'";
if (mysqli_query($conn, $sqlpay)) {
	$_SESSION['owing'] = "" ;
}
$sqlout = "UPDATE outstandings set status ='paid' WHERE id = '$outid'";
if (mysqli_query($conn, $sqlout)) {
}
//
header("location:paymentowedsuccess.php");
}
	
}else{
header("location: failedpage.php");	
}



?>
