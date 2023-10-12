<?php 
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
session_start();
// $conn = mysqli_connect("localhost","sky2co_skynew","J*{r4~Y&{(5{","sky2co_new");
$conn = mysqli_connect("localhost","sky2cdb","9i2p[qFwN-jcG.[R","sky2cdb");

// $conn = mysqli_connect("localhost","root","Welcome@123","sky2cdb");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php'; //echo "<pre>"; print_r($_REQUEST); echo "</pre>"; die("check this");

if(@$_REQUEST['qf']==1) {
	$ToZip = $_REQUEST["ToZip"];
	$FromZip = $_REQUEST["FromZip"];
	$Fromcountry = $_REQUEST["Fromcountry"];
	$Tocountry = $_REQUEST["Tocountry"];
	$EmailAddress = $_REQUEST["EmailAddress"];
	$CellPhone = $_REQUEST["CellPhone"];
	$Comments = $_REQUEST["Comments"];
	$fname = $_REQUEST["fname"];
	$lname = $_REQUEST["lname"];
	if(isset($_REQUEST["EmailAddress"])){
		$typeis = "quote";
		include_once("webservicetocrm.php");
		//Insert you code for processing the form here, e.g emailing the submission, entering it into a database.
		unset($_SESSION['security_code']);

		// $to = 'rajveer@birbals.com';
		$to = 'webb.expert1@gmail.com';
		//$to  = 'info@sky2c.com';

		$subject = 'Enquiry from Quick Quote Form';

		$message3 = "<html><body><table width='100%' border='0' cellspacing='0' cellpadding='10' style='background-color:#D6D6D6;'><tr style='background-color:#005E5E; color:#FFF;'><th scope='row' colspan='2' align='center'><h2>Quick Quotes Form Detail</h2></th></tr><tr><th scope='row' colspan='2'><p>Details filled by user are following :- </p></th></tr><tr><th scope='row' align='left'>From Zip:</th><td>".$FromZip."</td></tr><tr><th scope='row' align='left'>To Zip:</th><td>".$ToZip."</td></tr><tr><th scope='row' align='left'>From Country:</th><td>".$Fromcountry."</td></tr><tr><th scope='row' align='left'>To Country:</th><td>".$Tocountry."</td></tr> <tr><th scope='row' align='left'>First Name:</th><td>".$fname."</td></tr><tr><th scope='row' align='left'>Last Name:</th><td>".$lname."</td></tr><tr><th scope='row' align='left'>Email:</th><td>".$EmailAddress."</td></tr><tr><th scope='row' align='left'>Phone:</th><td>".$CellPhone."</td></tr><tr><th scope='row' align='left'>Comments:</th><td>".$Comments."</td></tr></table></body></html>";	
			
		$today = date("M d, Y h:m");
		$services_requied = "sky2c";
		#echo $message;
		$ip = $_SERVER['REMOTE_ADDR'];
		
		if($Tocountry=='India'){
			$url = 'https://unirelo.movegistics.com/unirelo_lead.php';
			$myvars = "first_name=".$fname."&second_name=".$lname."&email_addr=".$EmailAddress."&phone_num=".$CellPhone."&origin_zip=".$FromZip."&destination_city=".$Tocountry."&services_requied=".$services_requied."&additional_information=".$Comments."&r_mlead_source = 'sky2c'";
			$ch = curl_init($url);
			curl_setopt( $ch, CURLOPT_POST, 1);
			curl_setopt( $ch, CURLOPT_POSTFIELDS, $myvars);
			curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
			curl_setopt( $ch, CURLOPT_HEADER, 0);
			curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
			$response = curl_exec( $ch );
		}

		$q_name = ""; $q_company = ""; $q_subject = "";
		$insert = "Insert into `sy_formsdata` set `q_fromZip`='$FromZip', `q_toZip`='$ToZip', `q_fromCountry`='$Fromcountry', `q_toCountry`='$Tocountry', `q_email`='$EmailAddress', `q_phone`='$CellPhone', `q_message`='$Comments', `q_fromForm`='Quick Quotes', `q_date`='$today', `q_ip`='$ip', `q_firstName`='$fname', `q_lastName`='$lname', `q_name`='', `q_company`='', `q_subject`=''";
		mysqli_query($conn, $insert) or die("could not insert ".mysqli_error($conn));

		$myvars = "fromzip=".$FromZip."&toZip=".$ToZip."&fromCountry=".$Fromcountry."&toCountry=".$Tocountry."&email=".$EmailAddress."&phone=".$CellPhone."&message=".$Comments;

			// $adminEmail = "info@sky2c.com";
			$adminEmail = "webb.expert1@gmail.com";
			//$adminEmail = "rajveer@birbals.com";
			
			/*$mail = new PHPMailer(true);
			$mail->Mailer = "mail";
			$mail->Host = 'smtp.office365.com';
			$mail->Port       = 587;
			$mail->SMTPSecure = 'tls';
			$mail->SMTPAuth   = true;
			$mail->Username = 'sky2c@sky2c.com';
			$mail->Password = 'Gheeya@7';*/

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
			//$mail->AddAddress("rajveer@birbals.com", "Sky2c Freight Systems Inc");

			$mail->IsHTML(true);	
			$mail->Subject = "Enquiry from Quick Quote Form";;
			$mail->Body    = $message3;
			$mail->AltBody = $message3;

			if( $mail->Send()){ } else{  }

			$message2 = "<html><body><table><tr><td>Thank you for completing the inquiry form on our website. We have received your request and will reach out to you within 24 hours either by phone or email to discuss options.<br/><br/>For urgent or rush inquiries, please Contact us Toll Free at: 1.800.353.5128 <br/><br/><br/></td></tr>".$message3."	<br/><br/><br/>Thanks<br/>Sky2c Freight Systems, Inc.<br/>
				4221 Business Center Dr.<br/>Suite 5 & 6<br/>Fremont, CA 94538<br/>USA<br/>Tel: 1800.353.5128<br/>Fax: 1800.353.5132<br/>";

				/*$mail1 = new PHPMailer(true);
				$mail1->Mailer = "mail";
				$mail1->Host = 'smtp.office365.com';
				$mail1->Port       = 587;
				$mail1->SMTPSecure = 'tls';
				$mail1->SMTPAuth   = true;
				$mail1->Username = 'sky2c@sky2c.com';
				$mail1->Password = 'Gheeya@7';*/
				
				$mail1 = new PHPMailer(true);
			    $mail1->isSMTP();
			    $mail1->SMTPDebug = false;
			    $mail1->Host = 'smtp.gmail.com';
			    $mail1->Port       = 587;
			    $mail1->SMTPSecure = 'tls';
			    $mail1->SMTPAuth   = true;
			    $mail1->Username = 'birbalsdev@gmail.com';
			    $mail1->Password = 'mqahtlkpqzfvzrru';

				$mail1->SetFrom('sky2c@sky2c.com', 'Sky2c Freight Systems Inc');
			
				

				$mail1->AddAddress($EmailAddress, $fname);
				$mail1->IsHTML(true);
				$mail1->Subject = "Thanks for contacting us";
				$mail1->Body    = $message2;
				$mail1->AltBody = $message2;
				$mail1->addReplyTo('info@sky2c.com', 'Sky2c Freight Systems Inc');
				
				
				if(!$mail1->Send()) {  } else {  }
				
				echo "sucess";

		/*}else{
			echo "sucess";
		}*/

	}else{
		die("Invalid captcha");
	}
	
} //if ends here
?>