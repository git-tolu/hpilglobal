<?php
session_start();
$userid = $_SESSION['userid'] ;
include("includes/opendb.php");

if(isset($_FILES['images']))
{
	for($count = 0; $count < count($_FILES['images']['name']); $count++)
	{
		$extension = pathinfo($_FILES['images']['name'][$count], PATHINFO_EXTENSION);

		$new_name = uniqid() . '.' . $extension;

		move_uploaded_file($_FILES['images']['tmp_name'][$count], '../adminmanager/uploads/audited/' . $new_name);

	}

	echo 'success';
		$sqlupload = "UPDATE membership set auditedacct ='uploads/audited/$new_name' WHERE username = '$userid'";
if (mysqli_query($conn, $sqlupload)) {
}
}


?>