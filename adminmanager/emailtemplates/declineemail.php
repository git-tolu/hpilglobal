<?php
$ty = date('Y');
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
            <hr style='color:#F17821'>
            <h2 style='color:#F17821'>MEMBERSHIP APPLICATION DECLINE</h2>
            <hr style='color:#F17821'>
          </div>
        </td>
      </tr>
      <tr>
        <td colspan='3'>
          <div style='text-align: justify;'>
            <p style='color: white;'>Dear $agencycontact [$contactdesignation] of $agencyname,<br>
			<br> We are sorry to inform you that your application to become a member of EXMAN has been declined. <br><br>
			  
		Please feel free to contact the management for further information<br><br>
<br> 
Thanks for your interest. <br> </p>
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
//echo $message;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

$mail = new PHPMailer(true);

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
    $mail->addAddress($agencyemail, $agencyname); //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addCC('cc@example.com');
    $mail->addBCC('admintechnical@exman.com.ng');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true); //Set email format to HTML
    $mail->Subject = 'EXMAN:Your Membership Application Decline';
    $mail->Body = $message;
    $mail->AltBody = 'Sorry! Your application has been declined';

    $mail->send();
    // echo 'Message has been sent';
	//header("location:./confirmmemail.php");
} catch (Exception $e) {
   // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>