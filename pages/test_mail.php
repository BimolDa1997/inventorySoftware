<?php 

$page_name="Bulk Mail Send";  

include ('../common/library.php');  

include ('../common/helper.php');  

include ('../template/header.php'); 

include ('../template/sidebar.php');


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../pages/vendor/autoload.php';
$mail = new PHPMailer(true);

     $mail->SMTPDebug = 2;                                       // Enable verbose debug output

    $mail->isSMTP();                                            // Set mailer to use SMTP

    $mail->Host       = 'premium273.web-hosting.com';  // Specify main and backup SMTP servers

    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication

    $mail->Username   = 'info@rbdreliance.com';                     // SMTP username

    $mail->Password   = 'JWPXoEAUavUt';                               // SMTP password

    $mail->SMTPSecure = 'ssl';                                  // Enable TLS encryption, `ssl` also accepted

    $mail->Port       = 465;  

    $mail->SMTPOptions = array(
        'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
        )
    );
    
	$from_email= "info@rbdreliance.com";
	$from_name = "RBDreliance";
    $to_email = "rbd@rbdreliance.com";
	//$to_email = $to;
	$to_name = "Bimol";//$toName;
	$subject = "Hello";//$subject;
	$body = "Hi there";//$msg;
    //Recipients
    $mail->setFrom($from_email,$from_name);
    $mail->addAddress($to_email,$to_name);     // Add a recipient


    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = $subject;

    $mail->Body    = $msg;

    $mail->AltBody = '';

    $mail->send();
echo 'bimol';


    echo 'Message has been sent';




include('../template/footer.php');?>