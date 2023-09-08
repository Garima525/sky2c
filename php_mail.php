<?php require("phpmailer/class.phpmailer.php"); echo "Check email";
$mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->SMTPDebug = false;
    $mail->Host = 'smtp.gmail.com';
    $mail->Port       = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth   = true;
    $mail->Username = 'birbalsdev@gmail.com';
    $mail->Password = 'mqahtlkpqzfvzrru';

   // $mail = new PHPMailer(true);
    //$mail->Mailer = "mail";
   /* $mail->isSMTP();
     $mail->SMTPDebug = false;
    $mail->Host = 'smtp.office365.com';
    $mail->Port       = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth   = true;
    $mail->Username = 'sky2c@sky2c.com';
    $mail->Password = 'Gheeya@7';*/

    $subject = "Testing purposes";
    $admin_html_body = "<h2>Testing purposes</h2><p>Hello world</p>";

    $mail->SetFrom('info@sky2c.com', 'Sky2c Freight Systems Inc');
    $mail->AddAddress("rajveer@birbals.com", "Sky2c Freight Systems Inc");
    $mail->IsHTML(true);
    $mail->Subject = $subject;
    $mail->Body    = $admin_html_body;
    $mail->AltBody = $admin_html_body;
    if(!$mail->Send()) { echo "mail not send"; } else { echo "success"; }
?>