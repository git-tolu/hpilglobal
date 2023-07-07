<?php
session_start();
$dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '';
   $dbname = 'transaction';
   $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
?>