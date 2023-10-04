<?php 

// ini_set("display_errors", 1);
// ini_set("display_startup_errors", 1);
// error_reporting(E_ALL);
$conn = mysqli_connect("localhost","sky2co_skynew","J*{r4~Y&{(5{","sky2co_new") or die("could not connect to db");
// $conn = mysqli_connect("localhost", "root", "Welcome@123", "sky2cdb");

// require("phpmailer/class.phpmailer.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require "PHPMailer/src/Exception.php";
require "PHPMailer/src/PHPMailer.php";
require "PHPMailer/src/SMTP.php";

if(@$_REQUEST['cmf']==1) {
	$uname = $_REQUEST["uname"];
	$ucompany = $_REQUEST["ucompany"];
	$uemail = $_REQUEST["uemail"];
	$uphone = $_REQUEST["uphone"];
	$message = $_REQUEST["message"];

	if(isset($_REQUEST["uemail"])){

	//	$typeis = "quote";
	//	include_once("webservicetocrm.php");
	    

		//Insert you code for processing the form here, e.g emailing the submission, entering it into a database.
		//unset($_SESSION['security_code']);

		//$to = 'qa@birbals.com';
	// $to  = 'info@sky2c.com';
	$to  = 'webb.expert1@gmail.com';

		$subject = 'Commercial Cargo Quote Form';
    	$message3 = "<html><body><table width='100%' border='0' cellspacing='0' cellpadding='10' style='background-color:#D6D6D6;'><tr style='background-color:#005E5E; color:#FFF;'><th scope='row' colspan='2' align='center'><h2>Commercial Cargo Quote Form Detail</h2></th></tr><tr><th scope='row' colspan='2'><p>Details filled by user are following :- </p></th></tr><tr><th scope='row' align='left'>Name:</th><td>".$uname."</td></tr><tr><th scope='row' align='left'>Company:</th><td>".$ucompany."</td></tr><tr><th scope='row' align='left'>Email:</th><td>".$uemail."</td></tr><tr><th scope='row' align='left'>Phone:</th><td>".$uphone."</td></tr> <tr><th scope='row' align='left'>Message:</th><td>".$message."</td></tr></table></body></html>";
		$today = date("M d, Y h:m");
		$services_requied = "sky2c";
		#echo $message;
		$ip = $_SERVER['REMOTE_ADDR'];
		
	
		

	//	$insert = "Insert into `sy_formsdata` set `q_fromZip`='$FromZip', `q_toZip`='$ToZip', `q_fromCountry`='$Fromcountry', `q_toCountry`='$Tocountry', `q_email`='$EmailAddress', `q_phone`='$CellPhone', `q_message`='$Comments', `q_fromForm`='Quick Quotes', `q_date`='$today', `q_ip`='$ip', `q_firstName`='$fname', `q_lastName`='$lname'";
	//	mysqli_query($conn, $insert) or die("could not insert");

	//	$myvars = "fromzip=".$FromZip."&toZip=".$ToZip."&fromCountry=".$Fromcountry."&toCountry=".$Tocountry."&email=".$EmailAddress."&phone=".$CellPhone."&message=".$Comments;

			// $adminEmail = "info@sky2c.com";
			$adminEmail = "webb.expert1@gmail.com";
			//$adminEmail = "anita@birbals.com";
			
			// $mail = new PHPMailer(true);
			// $mail->Mailer = "mail";
			// $mail->Host = 'smtp.office365.com';
			// $mail->Port       = 587;
			// $mail->SMTPSecure = 'tls';
			// $mail->SMTPAuth   = true;
			// $mail->Username = 'sky2c@sky2c.com';
			// $mail->Password = 'Gheeya@7';

			$mail = new PHPMailer(true);
			$mail->isSMTP();
			$mail->SMTPDebug = false;
			$mail->Host = 'smtp.gmail.com';
			$mail->Port       = 587;
			$mail->SMTPSecure = 'tls';
			$mail->SMTPAuth   = true;
			$mail->Username = 'birbalsdev@gmail.com';
			$mail->Password = 'mqahtlkpqzfvzrru';
			
			$mail->SetFrom('sky2c@sky2c.com', 'Sky2c Freight Systems Inc');
			$mail->AddAddress($adminEmail, "Sky2c Freight Systems Inc");
			$mail->AddAddress("pawan@birbals.com", "Sky2c Freight Systems Inc");
			$mail->AddAddress("tarun@sky2c.com", "Sky2c Freight Systems Inc");

			$mail->IsHTML(true);	
			$mail->Subject = "Commercial Cargo Quote Form";;
			$mail->Body    = $message3;
			$mail->AltBody = $message3;

		if( $mail->Send()){ } else{  }



			$message2 = "<html><body><table><tr><td>Thank you for completing the inquiry form on our website. We have received your request and will reach out to you within 24 hours either by phone or email to discuss options.<br/><br/>For urgent or rush inquiries, please Contact us Toll Free at: 1.800.353.5128 <br/><br/><br/></td></tr>".$message3."	<br/><br/><br/>Thanks<br/>Sky2c Freight Systems, Inc.<br/>
		4221 Business Center Dr.<br/>Suite 5 & 6<br/>Fremont, CA 94538<br/>USA<br/>Tel: 1800.353.5128<br/>Fax: 1800.353.5132<br/>";

				// $mail = new PHPMailer(true);
				// $mail->Mailer = "mail";
				// $mail->Host = 'smtp.office365.com';
				// $mail->Port       = 587;
				// $mail->SMTPSecure = 'tls';
				// $mail->SMTPAuth   = true;
				// $mail->Username = 'sky2c@sky2c.com';
				// $mail->Password = 'Gheeya@7';

				$mail = new PHPMailer(true);
			    $mail->isSMTP();
			    $mail->SMTPDebug = false;
			    $mail->Host = 'smtp.gmail.com';
			    $mail->Port       = 587;
			    $mail->SMTPSecure = 'tls';
			    $mail->SMTPAuth   = true;
			    $mail->Username = 'birbalsdev@gmail.com';
			    $mail->Password = 'mqahtlkpqzfvzrru';
			
				$mail->SetFrom('sky2c@sky2c.com', 'Sky2c Freight Systems Inc');

				$mail->AddAddress($uemail, $uname);
				$mail->IsHTML(true);
				$mail->Subject = "Thanks for contacting us";
				$mail->Body    = $message2;
				$mail->AltBody = $message2;
				$mail->addReplyTo('info@sky2c.com', 'Sky2c Freight Systems Inc');
				
				
				if(!$mail->Send()) {  } else {  }
				
				echo "sucess";


		/*}else{
			echo "sucess";
		}*/

	}else{
		die("Invalid captcha");
	}
} //if ends here
?>