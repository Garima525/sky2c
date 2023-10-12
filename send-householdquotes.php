<?php session_start(); error_reporting(1); ?><script>
function gtag_report_conversion(url) {
 var callback = function () {
   if (typeof(url) != 'undefined') {
     window.location = url;
   }
 };
 gtag('event', 'conversion', {
     'send_to': 'AW-1014275909/StS_CK7i3akBEMW-0uMD',
     'event_callback': callback
 });
 return false;
}
</script>
<?php  
session_start();
// ini_set("display_errors", 1);
// ini_set("display_startup_errors", 1);
// error_reporting(E_ALL);
$conn = mysqli_connect("localhost","sky2cdb","9i2p[qFwN-jcG.[R","sky2cdb") or die("could not connect to db");

// $conn = mysqli_connect("localhost","sky2co_skynew","J*{r4~Y&{(5{","sky2co_new") or die("could not connect to db");
// $conn = mysqli_connect("localhost", "root", "Welcome@123", "sky2cdb");

// require("phpmailer/class.phpmailer.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require "PHPMailer/src/Exception.php";
require "PHPMailer/src/PHPMailer.php";
require "PHPMailer/src/SMTP.php";

$rof = @$_REQUEST['hhf'];
$email = html_entity_decode(@$_REQUEST['email']);

$token = isset($_SESSION['token']) ? $_SESSION['token'] : null;
// echo '<pre>'; print_r($token); die('token ');


if (@$_SESSION['token']==@$_REQUEST['csrtoken']) {
// die('here');  
if( $rof !="" && $email!="") {
	$name = html_entity_decode($_REQUEST['name']);
	$phone = html_entity_decode($_REQUEST['phone']);
	$companyname = html_entity_decode($_REQUEST['companyname']);
	$fax = html_entity_decode($_REQUEST['fax']);
	$BestTimetoCall = html_entity_decode($_REQUEST['BestTimetoCall']);
	$QuoteFor = html_entity_decode($_REQUEST['QuoteFor']);	
	$By = html_entity_decode($_REQUEST['By']);
	$FromCity = html_entity_decode($_REQUEST['FromCity']);
	$FromState = html_entity_decode($_REQUEST['FromState']);
	$FromCountry = html_entity_decode($_REQUEST['FromCountry']);
	$FromZip = html_entity_decode($_REQUEST['FromZip']);
	$ToCity = html_entity_decode($_REQUEST['ToCity']);
	$ToState = html_entity_decode($_REQUEST['ToState']);
	$ToCountry = html_entity_decode($_REQUEST['ToCountry']);
	$ToZip = html_entity_decode($_REQUEST['ToZip']);	
	$typeofshipment1 = html_entity_decode($_REQUEST['roro']);
	$typeofshipment2 = html_entity_decode($_REQUEST['fulltruck']);
	$EstimatedWeight = html_entity_decode($_REQUEST['EstimatedWeight']);
	$DoYouWantUstoPackYourGoods = html_entity_decode($_REQUEST['DoYouWantUstoPackYourGoods']);
	$ListItemstobePacked = html_entity_decode($_REQUEST['ListItemstobePacked']);
	$DoyouneedFreeSurvey = html_entity_decode($_REQUEST['DoyouneedFreeSurvey']);
	$SurveyDate = html_entity_decode($_REQUEST['SurveyDate']);
	$Planningtoshipon = html_entity_decode($_REQUEST['Planningtoshipon']);
	$MustArriveDestinationonorBefore = html_entity_decode($_REQUEST['MustArriveDestinationonorBefore']);
	$AdditionalInformation = html_entity_decode($_REQUEST['AdditionalInformation']);	
	
	//echo "<pre>"; print_r($_REQUEST); echo "</pre>"; die("check data");

	$typeis = "household_form";
	include_once("webservicetocrm.php");
	
	/*if($avilable == "No"){*/

	$html_body = '<html><body><table cellspacing=5 cellpadding=5>
	<tr>
    	<td><strong>Household Items Quote Request Form Detail</strong></td>
		<td>&nbsp;</td>
	</tr>
    <tr>
        <td><strong>Name</strong></td>
        <td>'. $name.'</td>
    </tr>
    <tr>
        <td><strong>Telephone</strong></td>
        <td>'. $phone.'</td>
    </tr>
    <tr>
        <td><strong>Email</strong></td>
        <td>'. $email.'</td>
    </tr>
    <tr>
        <td><strong>Company Name</strong> </td>
        <td>'. $companyname.'</td>
    </tr>
    <tr>
        <td><strong>Fax</strong> </td>
        <td>'. $fax.'</td>
    </tr>
    <tr>
        <td><strong>Best Time to Call</strong> </td>
        <td>'. $BestTimetoCall.'</td>
    </tr>
    <tr>
        <td><strong>Quote For</strong> </td>
        <td>'. $QuoteFor.'</td>
    </tr>
    <tr>
        <td><strong>By</strong> </td>
        <td>'. $By.'</td>
    </tr>
    <tr>
        <td colspan=2><strong>FROM/ORIGIN: NOTE: <span style="color:#FF0000">ZIPCODE is mandatory for all US Origins</span></strong></td>
    </tr>
    <tr>
        <td><strong>City</strong>  </td>
        <td>'. $FromCity.'</td>
    </tr>
	<tr>
        <td><strong>State</strong> </td>
        <td>'. $FromState.'</td>
    </tr>
    <tr>
        <td><strong>Country</strong> </td>
        <td>'. $FromCountry.'</td>
    </tr>
	<tr>
        <td><strong>Zip</strong> </td>
        <td>'. $FromZip.'</td>
    </tr>
	<tr>
        <td colspan=2><strong>TO/DESTINATION: NOTE: <span style="color:#FF0000">ZIPCODE is mandatory for all US Destinations</span></strong></td>
    </tr>
	<tr>
        <td><strong>City</strong></td>
        <td>'. $ToCity.'</td>
    </tr>
	<tr>
        <td><strong>State</strong></td>
        <td>'. $ToState.'</td>
    </tr>
	<tr>
        <td><strong>Country</strong></td>
        <td>'. $ToCountry.'</td>
    </tr>
	<tr>
        <td><strong>Zip</strong></td>
        <td>'. $ToZip.'</td>
    </tr>
	<tr>
        <td><strong>Type of Shipment</strong></td>
        <td>'. $typeofshipment.'</td>
    </tr>
	<tr>
        <td><strong>Estimated Weight</strong></td>
        <td>'. $EstimatedWeight.'</td>
    </tr>
	<tr>
        <td><strong>Do You Want Us to Pack Your Goods</strong></td>
        <td>'. $DoYouWantUstoPackYourGoods.'</td>
    </tr>
	<tr>
        <td><strong>List Items to be Packed</strong></td>
        <td>'. $ListItemstobePacked.'</td>
    </tr>
	<tr>
        <td><strong>Do you need Free Survey</strong></td>
        <td>'. $DoyouneedFreeSurvey.'</td>
    </tr>
	<tr>
        <td><strong>Survey Date</strong></td>
        <td>'. $SurveyDate.'</td>
    </tr>
	<tr>
        <td><strong>Planning to ship on</strong></td>
        <td>'. $Planningtoshipon.'</td>
    </tr>
	<tr>
        <td><strong>Must Arrive Destination on or Before</strong></td>
        <td>'. $MustArriveDestinationonorBefore.'</td>
    </tr>
	<tr>
        <td><strong>Additional Information</strong></td>
        <td>'. $AdditionalInformation.'</td>
    </tr></table></body></html>';		

$today = date("Y-m-d h:i:j");
$ip = $_SERVER['REMOTE_ADDR'];
$insert = mysqli_query($conn, "Insert into `sy_formsdata` set `q_fromZip`='$FromZip', `q_toZip`='$ToZip', `q_fromCountry`='$FromCountry', `q_toCountry`='$ToCountry', `q_email`='$email', `q_phone`='$phone', `q_message`='$html_body', `q_fromForm`='Household Items Quote Request Form', `q_date`='$today', `q_ip`='$ip', `q_name`='', `q_firstName`='', `q_lastName`='', `q_subject`='', `q_company`='' ") or die("could not insert data".mysqli_query());

$insert_query = "INSERT INTO `household_form_details` set `h_name` =  '".$name."', `h_email` =  '".$email."', `h_phone` =  '".$phone."', `h_companyname` =  '".$companyname."', `h_fax` =  '".$fax."', `h_BestTimetoCall` =  '".$BestTimetoCall."', `h_QuoteFor` =  '".$QuoteFor."', `h_By` =  '".$By."', `h_FromCity` =  '".$FromCity."', `h_FromState` =  '".$FromState."', `h_FromCountry` =  '".$FromCountry."', `h_FromZip` =  '".$FromZip."', `h_ToCity` =  '".$ToCity."', `h_ToState` =  '".$ToState."', `h_ToCountry` =  '".$ToCountry."', `h_ToZip` =  '".$ToZip."', `h_typeofshipment1` =  '".$typeofshipment1."', `h_typeofshipment2` =  '".$typeofshipment2."', `h_EstimatedWeight` =  '".$EstimatedWeight."', `h_DoYouWantUstoPackYourGoods` =  '".$DoYouWantUstoPackYourGoods."', `h_ListItemstobePacked` =  '".$ListItemstobePacked."', `h_DoyouneedFreeSurvey` =  '".$DoyouneedFreeSurvey."', `h_SurveyDate` =  '".$SurveyDate."', `h_Planningtoshipon` =  '".$Planningtoshipon."', `h_MustArriveDestinationonorBefore` =  '".$MustArriveDestinationonorBefore."', `h_AdditionalInformation` =  '".$AdditionalInformation."', `h_ip`='".$ip."', `h_dateTime`='".$today."'";
$insert_full = mysqli_query($conn, $insert_query) or die("could not insert data".mysqli_error());
				
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
		$mail->AddAddress("pawan@birbals.com", "Sky2c Freight Systems Inc");
		$mail->AddAddress("tarun@sky2c.com", "Sky2c Freight Systems Inc");
		//$mail->AddAddress("rajveer@birbals.com", "Sky2c Freight Systems Inc");
		$mail->IsHTML(true);
		$mail->Subject = "Household Items Quote Request Form";
		$mail->Body    = $html_body;
		$mail->AltBody = $html_body;
		if(!$mail->Send()) {  } else {  }		
		$html_body1 = '<html><body><table cellspacing=5 cellpadding=5>
	<tr>
    	<td><strong>Hi '.$name.', </strong></td>
	</tr>
    <tr>
        <td>Thank you for completing the Quote Request Form on our website. We have received your inquiry and will reach out to you within 24 hours either by phone or email.<br/><br/>For urgent or rush inquiries, please Contact us Toll Free at: 1800.353.5128.<br/><br/><br/><br/></td>
    </tr>
	<tr>
    	<td><strong>'.$html_body.'</strong></td>
	</tr>
    <tr>
        <td><strong>Thanks<br/>
		Sky2c Freight Systems, Inc.<br/>
		4221 Business Center Dr.<br/>
		Suite 5<br/>
		Fremont, CA 94538<br/>
		USA<br/>
		Tel: 1800.353.5128<br/>
		Fax: 1800.353.5132</strong></td>
	</tr></table></body></html>';	

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
		$mail->AddAddress($email, $name);
		$mail->IsHTML(true);
		$mail->Subject = "Thanks for contacting Sky2c";
		$mail->Body    = $html_body1;
		$mail->AltBody = $html_body1;
		$mail->addReplyTo('info@sky2c.com', 'Sky2c Freight Systems Inc');
		
		if(!$mail->Send()) {  } 
	
		//mail($emailto,$email_subject1,$message1,$header, "-fwebmaster@".$_SERVER["SERVER_NAME"]);
		echo "<script>window.location='https://www.sky2c.com/thanks.htm'</script>";
		
	/*}else{
		echo "<script>window.location='http://www.sky2c.com/thanks.htm'</script>";
	}*/
}else{
	echo "Couldn't complete your request....";
	echo "<script>window.location='https://www.sky2c.com/household-items-quote-request-form.htm'</script>";
}
} else {
	echo "<script>window.location='https://www.sky2c.com/thanks.htm'</script>";
}
?>