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

include("../adminmanager/emailtemplates/adminemail.php");


?>