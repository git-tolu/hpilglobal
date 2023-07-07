<?php
include('../includes/opendb.php');
global $anextannualdue, $ty, $today, $subject, $sid, $emailmessage, $subjectcap, $agencyname, $contactperson, $emailaddress, $designation, $message;


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

$mail = new PHPMailer(true);

$subjectcap =strtoupper($subject);



$sql8 = "SELECT *FROM membership WHERE status='active'";			   
$result8 = mysqli_query($conn, $sql8);
if (mysqli_num_rows($result8) > 0) {
while($info8 = mysqli_fetch_array($result8)) {	
$agencyname = $info8['agencyname'];
$contactperson = $info8['contactperson'];
$emailaddress = $info8['emailaddress'];
$designation = $info8['designation'];
$nextannualdue = $info8['nextannualdue'];

$today=date("d-m-Y");
$date1 = new DateTime($today);
$date2 = new DateTime($nextannualdue);
$interval = $date1->diff($date2);

$nextannualdue1 =strtotime($nextannualdue);
$today1 =strtotime($today);
//echo "difference " . $interval->y . " years, " . $interval->m." months, ".$interval->d." days "; 

// shows the total amount of days (not divided into years, months and days like above)
if ($today1<=$nextannualdue1){
$difference = $interval->days;
}


if ($difference=="30" ||$difference=="15" || $difference=="7" || $difference=="0" ){
$message = "
<style>
  body {
    background-color: black !important;
    color: white !important;
  }
  *{
    color: white !important;
  }
</style>
<center>
  <div style='width: 500px !important; border: 3px solid #F17821; padding: 30px; background-color:#000000 !important;'>
    <table style='background-color:#000000 !important;' align='center' role='presentation' cellspacing='0'
      cellpadding='0' border='0' width='100%'>
      <tr>
        <td colspan='3'>
          <div style='text-align: center;'>
            <img src='https://exman.com.ng/uptech-storage/2021/11/logo.png' width='50%' alt='>
                      </div>
                  </tr>
                  <tr>
                      <div style='text-align: center; color:#F17821'>
            <hr style='color:#F17821 !important;'>
            <h2 style='color:#F17821 !important;'>ANNUAL DUE PAYMENT REMINDER</h2>
            <hr style='color:#F17821 !important;'>
          </div>
        </td>
      </tr>
      <tr>
        <td colspan='3'>
          <div style='text-align: justify;'>
            <p style='color: white;'>Dear $contactperson [$designation] of $agencyname,</p>
			<p style='color: white;'>
			This is to remind you of your annual due payment. Please kindly login to your account
			to make payment.</p> 
			<p style='color: white;'>
			Thanks for your usual cooperation.
			</p> 
		<h2 style='color:#FFF !important;'><center><a href='https://membership.exman.com.ng/myaccount/'>CLICK HERE TO LOGIN</a></center></h2>
   <p style='color: white;'> Warm regards<br>
              EXMAN TEAM.<br></p>
          </div>
        </td>
      </tr>
     
    </table>
    <table align='center' role='presentation' cellspacing='0' cellpadding='0' border='0' width='100%'>
      <tr align='center'>
        <td style='text-align: left;'>
          <div>
		  <br>
		  <hr>
            <p style='color:#F17821;'>&copy; $ty EXMAN. All Rights Reserved | support@exman.com.ng</p>
          </div>
        </td>
        
      </tr>
    </table>
  </div>
</center>";
echo $message;


try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
  $mail->isSMTP();                                            //Send using SMTP
    $mail->Host = 'mail.exman.com.ng';                     //Set the SMTP server to send through
    $mail->SMTPAuth = true;                                   //Enable SMTP authentication
     $mail->Username = 'support@exman.com.ng';                     //SMTP username
    $mail->Password = 'Mypass@2023&^';                                //SMTP password
    $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
    $mail->Port = 465;    
                                  //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`


    //Recipients
    $mail->setFrom('support@exman.com.ng', 'Experiential Marketing Association of Nigeria');
    $mail->addAddress($emailaddress, $agencyname); //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addCC('cc@example.com');
    $mail->addBCC('admintechnical@exman.com.ng');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true); //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body = $message;
    $mail->AltBody = 'General Notification';

    $mail->send();
}
 catch (Exception $e) {
   // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}




    // echo 'Message has been sent';
	//header("location:../apply/successbalpay.php");
}
}
$sqlpay = "UPDATE notifications set emailstatus ='sent' WHERE id='$sid'";
if (mysqli_query($conn, $sqlpay)) {
}
}

?>