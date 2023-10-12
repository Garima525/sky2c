<?php session_start(); error_reporting(1); 
// include("wp-config.php");

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

//die('here');
if(@$_REQUEST['oform']!="")  {
// die('here');
	$email = html_entity_decode($_REQUEST['email']);
	$subject = html_entity_decode($_REQUEST['subject']);
	
	$Shipping = html_entity_decode($_REQUEST['QuoteFor']);
	$By = html_entity_decode($_REQUEST['By']);
	$Ship_From = html_entity_decode($_REQUEST['Ship_From']);
	$ShipTo = html_entity_decode($_REQUEST['ShipTo']);
	$Shipper = html_entity_decode($_REQUEST['Shipper']);
	$Consignee = html_entity_decode($_REQUEST['Consignee']);
	$FromContact = html_entity_decode($_REQUEST['FromContact']);
	$ToContact = html_entity_decode($_REQUEST['ToContact']);
	$FromNos = html_entity_decode($_REQUEST['FromNos']);
	$ToNos = html_entity_decode($_REQUEST['ToNos']);
	$FromFax = html_entity_decode($_REQUEST['FromFax']);
	$ToFax = html_entity_decode($_REQUEST['ToFax']);
	$FromEmail = html_entity_decode($_REQUEST['FromEmail']);
	$ToEmail = html_entity_decode($_REQUEST['ToEmail']);
	$FromRef = html_entity_decode($_REQUEST['FromRef']);
	$ToRef = html_entity_decode($_REQUEST['ToRef']);
	$FromAddress = html_entity_decode($_REQUEST['FromAddress']);
	$ToAddress = html_entity_decode($_REQUEST['ToAddress']);
	$FromCity = html_entity_decode($_REQUEST['FromCity']);
	$ToCity = html_entity_decode($_REQUEST['ToCity']);
	$FromState = html_entity_decode($_REQUEST['FromState']);
	$ToState = html_entity_decode($_REQUEST['ToState']);
	$FromZip = html_entity_decode($_REQUEST['FromZip']);
	$ToZip = html_entity_decode($_REQUEST['ToZip']);
	$FromCountry = html_entity_decode($_REQUEST['FromCountry']);
	$ToCountry = html_entity_decode($_REQUEST['ToCountry']);
	$FromNearestPort = html_entity_decode($_REQUEST['FromNearestPort']);
	$ToNearestPort = html_entity_decode($_REQUEST['ToNearestPort']);
	
	$Pickup_date1 = html_entity_decode($_REQUEST['Pickup_date1']);
	$Pickup_date2 = html_entity_decode($_REQUEST['Pickup_date2']);
	$Pickup_date3 = html_entity_decode($_REQUEST['Pickup_date3']);
	$Pickup_Time = html_entity_decode($_REQUEST['Pickup_Time']);
	
	$pickupdatetime = html_entity_decode($_REQUEST['pickupdatetime']);
	
	$Pickup_Address = html_entity_decode($_REQUEST['Pickup_Address']);
	
	
	$containersize = html_entity_decode($_REQUEST['containersize']);
	$trucksize = html_entity_decode($_REQUEST['trucksize']);
	$Other_Package = html_entity_decode($_REQUEST['Other_Package']);
	
	
	$Description_of_Goods = html_entity_decode($_REQUEST['Description_of_Goods']);
	$NONHazardousSpec = html_entity_decode($_REQUEST['NONHazardousSpec']);
	$HAZMAT_Info = html_entity_decode($_REQUEST['HAZMAT_Info']);
	
	
	$PerishableCargoSpec = html_entity_decode($_REQUEST['PerishableCargoSpec']);
	$Need_to_pack_Goods = html_entity_decode($_REQUEST['Need_to_pack_Goods']);
	$ListItem = html_entity_decode($_REQUEST['ListItem']);
	
	$PackageType1 = html_entity_decode($_REQUEST['PackageType1']);
	$Numbers1 = html_entity_decode($_REQUEST['Numbers1']);
	$Length1 = html_entity_decode($_REQUEST['Length1']);
	$Width1 = html_entity_decode($_REQUEST['Width1']);
	$Height1 = html_entity_decode($_REQUEST['Height1']);
	$GrossWeight1 = html_entity_decode($_REQUEST['GrossWeight1']);
	$CubicFeet1 = html_entity_decode($_REQUEST['CubicFeet1']);
	$CubicWeight1 = html_entity_decode($_REQUEST['CubicWeight1']);
	
	$PackageType2 = html_entity_decode($_REQUEST['PackageType2']);
	$Numbers2 = html_entity_decode($_REQUEST['Numbers2']);
	$Length2 = html_entity_decode($_REQUEST['Length2']);
	$Width2 = html_entity_decode($_REQUEST['Width2']);
	$Height2 = html_entity_decode($_REQUEST['Height2']);
	$GrossWeight2 = html_entity_decode($_REQUEST['GrossWeight2']);
	$CubicFeet2 = html_entity_decode($_REQUEST['CubicFeet2']);
	$CubicWeight2 = html_entity_decode($_REQUEST['CubicWeight2']);
	
	$PackageType3 = html_entity_decode($_REQUEST['PackageType3']);
	$Numbers3 = html_entity_decode($_REQUEST['Numbers3']);
	$Length3 = html_entity_decode($_REQUEST['Length3']);
	$Width3 = html_entity_decode($_REQUEST['Width3']);
	$Height3 = html_entity_decode($_REQUEST['Height3']);
	$GrossWeight3 = html_entity_decode($_REQUEST['GrossWeight3']);
	$CubicFeet3 = html_entity_decode($_REQUEST['CubicFeet3']);
	$CubicWeight3 = html_entity_decode($_REQUEST['CubicWeight3']);
	
	$PackageType4 = html_entity_decode($_REQUEST['PackageType4']);
	$Numbers4 = html_entity_decode($_REQUEST['Numbers4']);
	$Length4 = html_entity_decode($_REQUEST['Length4']);
	$Width4 = html_entity_decode($_REQUEST['Width4']);
	$Height4 = html_entity_decode($_REQUEST['Height4']);
	$GrossWeight4 = html_entity_decode($_REQUEST['GrossWeight4']);
	$CubicFeet4 = html_entity_decode($_REQUEST['CubicFeet4']);
	$CubicWeight4 = html_entity_decode($_REQUEST['CubicWeight4']);
	
	$PackageType5 = html_entity_decode($_REQUEST['PackageType5']);
	$Numbers5 = html_entity_decode($_REQUEST['Numbers5']);
	$Length5 = html_entity_decode($_REQUEST['Length5']);
	$Width5 = html_entity_decode($_REQUEST['Width5']);
	$Height5 = html_entity_decode($_REQUEST['Height5']);
	$GrossWeight5 = html_entity_decode($_REQUEST['GrossWeight5']);
	$CubicFeet5 = html_entity_decode($_REQUEST['CubicFeet5']);
	$CubicWeight5 = html_entity_decode($_REQUEST['CubicWeight5']);
	
	$PackageType6 = html_entity_decode($_REQUEST['PackageType6']);
	$Numbers6 = html_entity_decode($_REQUEST['Numbers6']);
	$Length6 = html_entity_decode($_REQUEST['Length6']);
	$Width6 = html_entity_decode($_REQUEST['Width6']);
	$Height6 = html_entity_decode($_REQUEST['Height6']);
	$GrossWeight6 = html_entity_decode($_REQUEST['GrossWeight6']);
	$CubicFeet6 = html_entity_decode($_REQUEST['CubicFeet6']);
	$CubicWeight6 = html_entity_decode($_REQUEST['CubicWeight6']);
	
	$PackageType7 = html_entity_decode($_REQUEST['PackageType7']);
	$Numbers7 = html_entity_decode($_REQUEST['Numbers7']);
	$Length7 = html_entity_decode($_REQUEST['Length7']);
	$Width7 = html_entity_decode($_REQUEST['Width7']);
	$Height7 = html_entity_decode($_REQUEST['Height7']);
	$GrossWeight7 = html_entity_decode($_REQUEST['GrossWeight7']);
	$CubicFeet7 = html_entity_decode($_REQUEST['CubicFeet7']);
	$CubicWeight7 = html_entity_decode($_REQUEST['CubicWeight7']);
	
	$PackageType8 = html_entity_decode($_REQUEST['PackageType8']);
	$Numbers8 = html_entity_decode($_REQUEST['Numbers8']);
	$Length8 = html_entity_decode($_REQUEST['Length8']);
	$Width8 = html_entity_decode($_REQUEST['Width8']);
	$Height8 = html_entity_decode($_REQUEST['Height8']);
	$GrossWeight8 = html_entity_decode($_REQUEST['GrossWeight8']);
	$CubicFeet8 = html_entity_decode($_REQUEST['CubicFeet8']);
	$CubicWeight8 = html_entity_decode($_REQUEST['CubicWeight8']);
	
	$PackageType9 = html_entity_decode($_REQUEST['PackageType9']);
	$Numbers9 = html_entity_decode($_REQUEST['Numbers9']);
	$Length9 = html_entity_decode($_REQUEST['Length9']);
	$Width9 = html_entity_decode($_REQUEST['Width9']);
	$Height9 = html_entity_decode($_REQUEST['Height9']);
	$GrossWeight9 = html_entity_decode($_REQUEST['GrossWeight9']);
	$CubicFeet9 = html_entity_decode($_REQUEST['CubicFeet9']);
	$CubicWeight9 = html_entity_decode($_REQUEST['CubicWeight9']);
	
	$PackageType10 = html_entity_decode($_REQUEST['PackageType10']);
	$Numbers10 = html_entity_decode($_REQUEST['Numbers10']);
	$Length10 = html_entity_decode($_REQUEST['Length10']);
	$Width10 = html_entity_decode($_REQUEST['Width10']);
	$Height10 = html_entity_decode($_REQUEST['Height10']);
	$GrossWeight10 = html_entity_decode($_REQUEST['GrossWeight10']);
	$CubicFeet10 = html_entity_decode($_REQUEST['CubicFeet10']);
	$CubicWeight10 = html_entity_decode($_REQUEST['CubicWeight10']);
	
	$TotalNumbers = html_entity_decode($_REQUEST['TotalNumbers']);
	$TotalGrossWeight = html_entity_decode($_REQUEST['TotalGrossWeight']);
	$TotalCubicFeet = html_entity_decode($_REQUEST['TotalCubicFeet']);
	$TotalCubicWeight = html_entity_decode($_REQUEST['TotalCubicWeight']);
	
	$Declared_Value_for_Customs = html_entity_decode($_REQUEST['Declared_Value_for_Customs']);
	$Need_Insurance = html_entity_decode($_REQUEST['Need_Insurance']);
	$Advise_Value_for_Insurance = html_entity_decode($_REQUEST['Advise_Value_for_Insurance']);
	
	$FreightPayable = html_entity_decode($_REQUEST['FreightPayable']);
	$ThirdPartyDetails = html_entity_decode($_REQUEST['ThirdPartyDetails']);
	$AddCharge = html_entity_decode($_REQUEST['AddCharge']);
	$OtherInfo = html_entity_decode($_REQUEST['OtherInfo']);
	
	
	$Company = html_entity_decode($_REQUEST['Company']);
	$Name = html_entity_decode($_REQUEST['Name']);
	$Street_Address = html_entity_decode($_REQUEST['Street_Address']);
	$AptSuite = html_entity_decode($_REQUEST['AptSuite']);
	$City = html_entity_decode($_REQUEST['City']);
	$State = html_entity_decode($_REQUEST['State']);
	$Zip = html_entity_decode($_REQUEST['Zip']);
	$TelDay = html_entity_decode($_REQUEST['TelDay']);
	$Fax = html_entity_decode($_REQUEST['Fax']);
	$Email = html_entity_decode($_REQUEST['Email']);
	$SignedBy = html_entity_decode($_REQUEST['SignedBy']);
	$Place = html_entity_decode($_REQUEST['Place']);
	
	$select2 = html_entity_decode($_REQUEST['select2']);
	$select3 = html_entity_decode($_REQUEST['select3']);
	$select4 = html_entity_decode($_REQUEST['select4']);
	$Time = html_entity_decode($_REQUEST['Time']);
	
	$dateandtime = html_entity_decode($_REQUEST['dateandtime']);
	
	$AdditionalInfo = html_entity_decode($_REQUEST['AdditionalInfo']);	

	$fname = $Shipper;
	$lname = '';
	$CellPhone = $ToContact;
	$EmailAddress = $FromEmail;
	$Fromcountry = $FromCountry;
	$Tocountry = $ToCountry;
	
	$typeis="order_online";
	include_once("webservicetocrm.php");


	$html_body = '<html><body><table cellspacing=5 cellpadding=5>
	<tr>
    	<td><strong>Website order form detail</strong></td>
		<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
	</tr>
    <tr>
        <td><strong>Shipping</strong></td>
        <td>'. $Shipping.'</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td><strong>By</strong></td>
        <td>'. $By.'</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td><strong>Ship From</strong></td>
        <td>'. $Ship_From.'</td>
        <td><strong>Ship To</strong></td>
        <td>'. $ShipTo.'</td>
    </tr>
    <tr>
        <td><strong>Shipper</strong> </td>
        <td>'. $Shipper.'</td>
        <td><strong>Consignee</strong> </td>
        <td>'. $Consignee.'</td>
    </tr>
    <tr>
        <td><strong>Contact</strong> </td>
        <td>'. $FromContact.'</td>
        <td><strong>Contact</strong> </td>
        <td>'. $ToContact.'</td>
    </tr>
    <tr>
        <td><strong>Tel. No</strong> </td>
        <td>'. $FromNos.'</td>
        <td><strong>Tel. No</strong> </td>
        <td>'. $ToNos.'</td>
    </tr>
    <tr>
        <td><strong>Fax</strong> </td>
        <td>'. $FromFax.'</td>
        <td><strong>Fax</strong> </td>
        <td>'. $ToFax.'</td>
    </tr>
    <tr>
        <td><strong>Email</strong> </td>
        <td>'. $FromEmail.'</td>
        <td><strong>Email</strong> </td>
        <td>'. $ToEmail.'</td>
    </tr>
    <tr>
        <td><strong>Your Ref.#</strong> </td>
        <td>'. $FromRef.'</td>
        <td><strong>Your Ref.#</strong> </td>
        <td>'. $ToRef.'</td>
    </tr>
    <tr>
        <td><strong>Address</strong>  </td>
        <td>'. $FromAddress.'</td>
        <td><strong>Address</strong>  </td>
        <td>'. $ToAddress.'</td>
    </tr>
	<tr>
        <td><strong>City</strong> </td>
        <td>'. $FromCity.'</td>
        <td><strong>City</strong>  </td>
        <td>'. $ToCity.'</td>
    </tr>
    <tr>
        <td><strong>State</strong> </td>
        <td>'. $FromState.'</td>
        <td><strong>State</strong> </td>
        <td>'. $ToState.'</td>
    </tr>
	<tr>
        <td><strong>Zip</strong> </td>
        <td>'. $FromZip.'</td>
        <td><strong>Zip</strong> </td>
        <td>'. $ToZip.'</td>
    </tr>
	<tr>
        <td><strong>Country</strong> </td>
        <td>'. $FromCountry.'</td>
        <td><strong>Country</strong> </td>
        <td>'. $ToCountry.'</td>
    </tr>
	<tr>
        <td><strong>Nearest Port</strong> </td>
        <td>'. $FromNearestPort.'</td>
        <td><strong>Nearest Port</strong> </td>
        <td>'. $ToNearestPort.'</td>
    </tr>
	<tr>
        <td><strong>Pickup Date & Time </strong></td>
        <td>'. $pickupdatetime.'</td>
        <td><strong>Pickup Address</strong> </td>
        <td>'. $Pickup_Address.'</td>
    </tr>
	<tr>
        <td><strong>Description of Goods:</strong></td>
        <td>'. $Description_of_Goods.'</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
	<tr>
        <td><strong>Non- Hazardous Cargo (Specify Commodity):</strong></td>
        <td>'. $NONHazardousSpec.'</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
	<tr>
        <td><strong>Hazardous Cargo (Specify HAZMAT Info) :</strong></td>
        <td>'. $HAZMAT_Info.'</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
	<tr>
        <td><strong>Do You Want Us to Pack your Goods</strong></td>
        <td>'. $Need_to_pack_Goods.'</td>
        <td><strong>List Items to be Packed</strong> </td>
        <td>'. $ListItem.'</td>
    </tr>
	<tr>
		<td colspan=4 align=center><strong>Provide Packing/Package Description</strong></td>
	</tr>
	<tr>
        <td><strong>Total No</strong></td>
        <td>'. $TotalNumbers.'</td>
        <td><strong>Total Gross Weight</strong></td>
        <td>'. $TotalGrossWeight.'</td>
    </tr>
	<tr>
        <td><strong>Total Cubic Feet</strong></td>
        <td>'. $TotalCubicFeet.'</td>
        <td><strong>Total Cubic Weight</strong></td>
        <td>'. $TotalCubicWeight.'</td>
    </tr>
	<tr>
        <td><strong>Declared Value for U.S Customs (International Only) *</strong></td>
        <td>'. $Declared_Value_for_Customs.'</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
	<tr>
        <td><strong>Would you like to Insure</strong></td>
        <td>'. $Need_Insurance.'</td>
        <td><strong>If Yes, Advise Value to be insured(US$)</strong></td>
        <td>'. $Advise_Value_for_Insurance.'</td>
    </tr>
	<tr>
        <td><strong>Freight Payable By</strong></td>
        <td>'. $FreightPayable.'</td>
        <td><strong>If Payable by Third party Please provide details:-</strong></td>
        <td>'. $ThirdPartyDetails.'</td>
    </tr>
	<tr>
        <td><strong>Other Additional Charges( If Incurred) Payable by</strong></td>
        <td>'. $AddCharge.'</td>
        <td><strong>Company detail(if any)</strong></td>
        <td>'. $OtherInfo.'</td>
    </tr>
	<tr>
		<td colspan=4><strong>Billing Information</strong></td>
	</tr>
	<tr>
        <td><strong>Company</strong></td>
        <td>'. $Company.'</td>
        <td><strong>Name</strong></td>
        <td>'. $Name.'</td>
    </tr>
	<tr>
        <td><strong>Street Address</strong></td>
        <td>'. $Street_Address.'</td>
        <td><strong>Apt/Suite</strong></td>
        <td>'. $AptSuite.'</td>
    </tr>
	<tr>
        <td><strong>City</strong> </td>
        <td>'. $City.'</td>
        <td><strong>State</strong></td>
        <td>'. $State.'</td>
    </tr>
	<tr>
        <td><strong>Zip</strong>  </td>
        <td>'. $Zip.'</td>
        <td><strong>Telephone</strong></td>
        <td>'. $TelDay.'</td>
    </tr>
	<tr>
        <td><strong>Fax</strong>  </td>
        <td>'. $Fax.'</td>
        <td><strong>Email</strong></td>
        <td>'. $Email.'</td>
    </tr>
	<tr>
        <td><strong>Signed by</strong> </td>
        <td>'. $SignedBy.'</td>
        <td><strong>Place</strong></td>
        <td>'. $Place.'</td>
    </tr>
	<tr>
        <td><strong>Date & Time</strong></td>
        <td>'. $dateandtime.'</td>
        <td><strong></strong></td>
        <td></td>
    </tr>
	<tr>
		<td><strong>Additional Information :</strong> </td>
        <td>'. $AdditionalInfo.'</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
	</tr>	
</table></body></html>';

//echo $message;
$today = date("M d, Y h:m");
$ip = $_SERVER['REMOTE_ADDR'];
$insert = mysqli_query($conn,"Insert into `sy_formsdata` set `q_fromZip`='$FromZip', `q_toZip`='$ToZip', `q_fromCountry`='$FromCountry', `q_toCountry`='$ToCountry', `q_email`='$FromEmail', `q_phone`='$FromNos', `q_message`='$html_body', `q_fromForm`='Order Online Form', `q_date`='$today', `q_ip`='$ip', `q_name`='', `q_firstName`='', `q_lastName`='', `q_subject`='', `q_company`='' ") or die("could not insert data");		

		$email_subject = $subject;
		//$email_from =  $e_email;
		
		$admin_email = $email;
		
		// $sendto = "tarun@sky2c.com";	
		$sendto = "webb.expert1@gmail.com";		

		//$sendto = "rajveer@birbals.com";		
		
		$subject = $email_subject;
		$message = $html_body;		

		// $adminEmail = "info@sky2c.com";
		$adminEmail = "webb.expert1@gmail.com";

		//$adminEmail = "rajveer@birbals.com";
			
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
			$mail->Subject = "Enquiry from Order Online Form";;
			$mail->Body    = $html_body;
			$mail->AltBody = $html_body;

		if( $mail->Send()){  } else{   }
	
		echo "<script>alert('Your order received successfully')</script>";
		echo "<script>window.location='http://www.sky2c.com/thanks.htm'</script>";		
		/*$headers  = 'MIME-Version: 1.0'."\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";		
		$headers .= 'From: Sky2c <info@sky2c.com>' . "\r\n";   
		$headers .= 'Bcc: pawan@birbals.com';
		$message = html_entity_decode($html_body);
	echo "reached here";
		if (mail($sendto,$subject,$message,$headers)){	
			echo "<script>alert('Your order received successfully')</script>";
			echo "<script>window.location='http://www.sky2c.com/thanks.htm'</script>";
		}*/

} else {
	echo "Couldn't complete your request....";
	echo "<script>window.location='http://www.sky2c.com/order-online.htm'</script>";
}
?>