<?php
session_start();
include("includes/opendb.php");
$datereg=date("d-m-y , g:i a");
$agencyname = $_SESSION['agencyname'] ;
$emailaddress = $_SESSION['emailaddress'] ;
$contactperson = $_SESSION['contactperson'] ;
$designation = $_SESSION['designation'];
$futureNextDue = $_SESSION['futureNextDue'] ;
$period = $_SESSION['period'] ;
$phone = $_SESSION['phone'] ;
$userid = $_SESSION['userid'] ;
$paystatus = $_GET['status'];
$paytx_ref = $_GET['tx_ref'];

if ($paystatus=="completed" || $paystatus=="successful"){
$transaction_id = $_GET['transaction_id'];
$sql = "INSERT INTO paymenthistory VALUES ('$id', '$userid', '$agencyname', '$emailaddress', '150000', 'Annual Due For $period', '$datereg', '$paytx_ref', '$transaction_id')";
if (mysqli_query($conn, $sql)) {
//update reg table
$sqlpay = "UPDATE membership set nextannualdue ='$futureNextDue', owing='no' WHERE username = '$userid'";
if (mysqli_query($conn, $sqlpay)) {
//include("../adminmanager/emailtemplates/welcomeemail.php");

$_SESSION['nextannualdue'] = $futureNextDue;
$today=date("d-m-Y");
$date1 = new DateTime($today);
$date2 = new DateTime($futureNextDue);
$interval = $date1->diff($date2);
$diffe =  "in ".$interval->days ;
$_SESSION['$diffe'] = $diffe;
}
//
header("location:paymentsuccess.php");
}
	
}else{
header("location: failedpage.php");	
}



?>
