<?php
require 'PHPMailer-master/PHPMailerAutoload.php';
/*SEN AN EMAIL TO CLIENT WHEN HIS REPORT REACH OUT GREATER THAN 90 % START */
$to_email       = 'rahul.jain@mobilyte.com';
$from_email     = 'info@sky2c.com'; //from mail, it is mandatory with some hosts and without it mail might endup in spam.

//email body
$message_body = '<p><span style="font-family: verdana;">&nbsp;</span></p><table style="border-collapse: collapse; border-spacing: 0; background-color: #fff; padding: 0;" border="0" cellspacing="0" cellpadding="0" align="center"><tbody><tr><td style="width: 600px; padding: 10px 10px; border: 1px solid #c0c0c0;" width="600" valign="top"><table style="font-family: verdana; border-collapse: collapse; border-spacing: 0; width: 100%;" border="0" cellspacing="0" cellpadding="0" align="left"><tbody><tr><td style="border-bottom: 6px solid #003D78;padding:10px" align="center"><span style="font-size: small;"><img src="http://sky2cv2.mobilytedev.com/css/images/logo.png" alt="" width="183" height="45"/></span></td></tr><tr><td style="padding-top: 10px;" valign="top"><span style="font-family: arial, helvetica, sans-serif; font-size: small;">Hi Admin, </span></td></tr><tr><td valign="top"><p><br/><span style="font-family: arial, helvetica, sans-serif; font-size: small;">Thank you signing up for myAVM. Currently you have used 90% of your reports. When all of your reports are used your account will automatically renew for the same amount and number of reports as your last order.</span></p><p><span style="font-family: arial, helvetica, sans-serif; font-size: small;">. </span></p><p><span style="font-family: arial, helvetica, sans-serif; font-size: small;">If you wish to make any changes to your account, please reach out to your sales person or email <a href "mailto:sales@sky2c.com">sales@sky2c.com</a></span></p><p><span style="font-family: arial, helvetica, sans-serif; font-size: small;"></span></p>';
	
$message_body .='<p><span style="font-family: arial, helvetica, sans-serif; font-size: small;"><br/> </span><br/><span style="font-family: arial, helvetica, sans-serif; font-size: small;"> Best regards,</span></p></td></tr><tr><td><span style="font-family: arial, helvetica, sans-serif; font-size: small;"><em>Client Support<br/>sky2c</em></span></td></tr></tbody></table></td></tr><tr><td style="background-color: #fff; padding: 15px 0;" valign="top"><table style="font-family: verdana; border-collapse: collapse; border-spacing: 0; text-align: justify; padding: 0;" border="0" cellspacing="0" cellpadding="0" align="left"><tbody><tr><td style="width: 620px; height: 20px;" width="620" valign="top"><p><span style="font-size: x-small;">Please add <span style="text-decoration: underline;">support@sky2c.com</span> to your address book to make sure our emails are delivered to your inbox.</span></p><p><span style="font-size: x-small;">Notice: This email and any files transmitted with it are confidential and intended solely for the use of the individual or entity to whom they are addressed. If you have received this email in error, please notify support@sky2c.com. This message contains confidential information and is intended only for the individual named. If you are not the named addressee you should not disseminate, distribute or copy this e-mail. Please notify support@sky2c.com immediately by e-mail if you have received this e-mail by mistake and delete this e-mail from your system. If you are not the intended recipient you are notified that disclosing, copying, distributing or taking any action in reliance on the contents of this information is strictly prohibited.</span></p></td></tr></tbody></table></td></tr></tbody></table>';

//proceed with PHP email.
$headers = 'From: '. $from_email .'' . "\r\n" .
'Reply-To: '.'rahul.jain@mobilyte.com'.'' . "\r\n" .
'X-Mailer: PHP/' . phpversion();


////////////////

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
$mail->Port = 587;
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication
$mail->Username = "betasoftsystems.dummy@gmail.com";
//Password to use for SMTP authentication
$mail->Password = "@Password12";
//Set who the message is to be sent from
$mail->setFrom($from_email, 'sky2c');
//Set an alternative reply-to address
//$mail->addReplyTo($user_email, $user_name);
//Set who the message is to be sent to
$mail->addAddress($to_email, 'sky2c');

$mail->AddCC("sales@sky2c.com");
//$mail->AddCC("jchen@sky2c.com");
//$mail->AddCC("rahuljain1701@gmail.com");
//$mail->AddCC("er.neha2987@gmail.com");


//Set the subject line
$mail->Subject = 'Sky2c Inc - test email';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML($message_body, dirname(__FILE__));
//Replace the plain text body with one created manually
//$mail->AltBody = $message_body;


//send the message, check for errors
if (!$mail->send()) {
	//If mail couldn't be sent output error. Check your PHP email configuration (if it ever happens)
	$output = json_encode(array('type'=>'error', 'text' => 'Could not send mail! Please check your PHP mail configuration.'));
	
	die($output);
}
/*SEND AN EMAIL TO CLIENT WHEN HIS REPORT REACH OUT GREATER THAN 90 % END */
