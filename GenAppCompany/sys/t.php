<?php
/**
 * This example shows making an SMTP connection with authentication.
 */

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Asia/Bangkok');

require_once('PHPMailer/class.phpmailer.php');
require_once('PHPMailer/class.smtp.php');

//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';
//Set the hostname of the mail server
$mail->Host = "smtp.gmail.com";
//Set the SMTP port number - likely to be 25, 465 or 587
$mail->Port = 465;
//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'ssl';
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication
$mail->Username = "inw.save008@gmail.com";
//Password to use for SMTP authentication
$mail->Password = "chelsea12345678";
//Set who the message is to be sent from
$mail->setFrom('inw.save008@gmail.com', 'Moss');
//Set who the message is to be sent to
$mail->addAddress('patipan12474@gmail.com', 'xxxxxxxxxxxxxxxxxxxxxxxx');
//Set the subject line
$mail->Subject = 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('content.html'), dirname(__FILE__));
$mail->msgHTML("เทสสสสสสสสสสสสสสสสสสสสสสสสสส test na <a href=\"http://google.com\">Link >>>></a><br><br>xxxxxxxx<br>xxxxx");

//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}
?>
