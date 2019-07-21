<?php

header("Content-Type:text/html; charset=UTF-8");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

function setFilter($val){
	$step1	=	trim($val);
	$step2	=	strip_tags($step1);
	$step3	=	htmlspecialchars($step2, ENT_QUOTES);
	$result		=	$step3;
		return $result;
}

$fullname		=	setFilter($_POST["fullname"]);
$email			=	setFilter($_POST["email"]);
$subject		=	setFilter($_POST["subject"]);
$message	  =	setFilter($_POST["message"]);


$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;
    // (0): Disable debugging (you can also leave this out completely, 0 is the default).
    // (1): Output messages sent by the client.
    // (2): as 1, plus responses received from the server (this is the most useful setting).
    // (3): as 2, plus more information about the initial connection - this level can help diagnose STARTTLS failures.
    // (4): as 3, plus even lower-level information, very verbose, don't use for debugging SMTP, only low-level problems.

    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->CharSet  ="utf-8";
    $mail->SMTPAuth   = true;
    $mail->Username   = '**************@gmail.com';
    $mail->Password   = '*********';
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;
    $mail->SMTPOptions		=	array(
      'ssl' => [
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
      ],
    );

    //Recipients
    $mail->setFrom('**************@gmail.com', 'PHP informative message');
    $mail->addAddress('**************@gmail.com', 'Answering section');
    $mail->addReplyTo('**************@gmail.com', 'Information');

    // Attachments
    $mail->addAttachment('resim.jpg');
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg'); v 

    // Content
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body    = "Hello.<br/> My name is $fullname. This is an informative message.";
    $mail->AltBody = 'This is an informative message.';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}





?>