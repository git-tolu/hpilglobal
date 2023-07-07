<?php
date_default_timezone_set('Africa/Lagos'); session_start();
error_reporting(E_ALL & ~E_NOTICE);
/* server timezone */
define('CONST_SERVER_TIMEZONE', 'UTC');	

if (!isset($_SESSION['username']) && !isset($_SESSION['email'])){
header("Location: index.php");
}else{
$cname = $_SESSION['cname'] ;
$role = $_SESSION['userrole'] ;
$fullname = $_SESSION['userfullname'] ;
$useremailadd = $_SESSION['email'] ;
$user = $_SESSION['username'] ;
$passport = $_SESSION['passport']  ;
$adminstatus = $_SESSION['adminstatus'] ;
$diffe = $_SESSION['$diffe']  ;
$owing = $_SESSION['owing']  ;
$nextannualdue = $_SESSION['nextannualdue']  ;
$activelogins = $_SESSION['activelogins']  ;
include('opendb.php');
}
if (($owing=='yes') && ($activelogins>1)){
header("Location: checkowinglogin.php");
}
?>