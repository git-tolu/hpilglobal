<?php
use PHPMailer\PHPMailer\SMTP;
$ty = date('Y');
$messageemail = "
<style>
  body {
    background-color: white !important;
    
  }
  *{
    
  }
</style>
<center>
  <div style='width: 500px !important; border: 3px solid ##ffbc34; padding: 30px; background-color:#fff !important;'>
    <table style='background-color:#fff !important;' align='center' role='presentation' cellspacing='0'
      cellpadding='0' border='0' width='100%'>
      <tr>
        <td colspan='3'>
          <div style='text-align: center;'>
            <img src='https://hpiglobal.ca/assets/images/logo.png' width='50%' alt=''>
                      </div>
                  </tr>
                  <tr>
                      <div style='text-align: center; color:##ffbc34'>
            <hr style='color:##ffbc34;'>
            <h2 style='color:##ffbc34; text-align: center;'>WELCOME TO HPILGLOBAL </h2>
            <hr style='color:##ffbc34;'>
          </div>
        </td>
      </tr>
      <tr>
        <td colspan='3'>
          <div style='text-align: justify;'>
            
			<p style='color: black; text-align: center;'> $emailmessage <br><br>
		 </p> 
		

	
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
            <p style='color:##ffbc34;'>&copy; $ty HPILGLOBAL. All Rights Reserved | support@hostelafrica360.com</p>
          </div>
        </td>
        
      </tr>
    </table>
  </div>
</center>";
//echo $messageemail;
$_SESSION['messageemail'] = $messageemail;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();                                            //Send using SMTP
    $mail->SMTPAuth = TRUE;
    $mail->SMTPSecure = "ssl";
    $mail->Port = 465;
    
    
    $mail->Host = "mail.uptechng.com";
    $mail->Username = "distressproperties@uptechng.com";
    $mail->Password = "Mypass@@.com@@";
                                  //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('distressproperties@uptechng.com', 'HPILGLOBAL');
    $mail->addAddress($email, $fullname); //Add a recipient
    // $mail->addAddress('ellen@example.com');               //Name is optional
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('admintechnical@hostelafrica360.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true); //Set email format to HTML
    $mail->Subject = 'HPILGLOBAL: kyc email confirmation';
    $mail->Body = $messageemail;
    $mail->AltBody = $messageemail;

    header("location: confirmemail.php");
    if ($mail->send()) {
      # code...
    }
    // echo 'Message has been sent';
} catch (Exception $e) {
   // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>