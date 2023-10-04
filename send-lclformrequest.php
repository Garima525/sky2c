<script>
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

$shipper_name = @$_REQUEST['shipper_name'];
$rq = @$_REQUEST['lf'];
if($rq != "" && $shipper_name != "" ) {

	$spouse_name = $_REQUEST['spouse_name'];
	$shipper_usa_address = $_REQUEST['shipper_usa_address'];
	$shipper_usa_city = $_REQUEST['shipper_usa_city'];
	$shipper_usa_state = $_REQUEST['shipper_usa_state'];
	$shipper_usa_zip = $_REQUEST['shipper_usa_zip'];
	$contact_home_no = $_REQUEST['contact_home_no'];
	$contact_cell = $_REQUEST['contact_cell'];	
	$contact_work_no = $_REQUEST['contact_work_no'];
	$contact_email = $_REQUEST['contact_email'];
	$pickup_address = $_REQUEST['pickup_address'];
	$pickup_city = $_REQUEST['pickup_city'];
	$pickup_state = $_REQUEST['pickup_state'];
	$pickup_zip = $_REQUEST['pickup_zip'];
	$pickup_request_srno = serialize($_REQUEST['pickup_request_srno']);
	$pickup_request_boxes_quantity = serialize($_REQUEST['pickup_request_boxes_quantity']);	
	$pickup_request_dimension = serialize($_REQUEST['pickup_request_dimension']);
	$pickup_request_weight = serialize($_REQUEST['pickup_request_weight']);
	$consignee_name = $_REQUEST['consignee_name'];
	$consignee_address = $_REQUEST['consignee_address'];
	$consignee_city = $_REQUEST['consignee_city'];
	$consignee_country = $_REQUEST['consignee_country'];
	$consignee_tel_no = $_REQUEST['consignee_tel_no'];
	$consignee_email = $_REQUEST['consignee_email'];	
	$receiver_name = $_REQUEST['receiver_name'];
	$receiver_address = $_REQUEST['receiver_address'];
	$receiver_city = $_REQUEST['receiver_city'];
	$receiver_country = $_REQUEST['receiver_country'];
	$receiver_tel_no = $_REQUEST['receiver_tel_no'];
	$receiver_email = $_REQUEST['receiver_email'];
	$shipper_sign = $_REQUEST['shipper_sign'];
	/*By Ad*/
	$insurance_option = $_REQUEST['insurance_option'];
	$insurance_option_yes = $_REQUEST['insurance_option_yes'];
	$total_shipment_val = $_REQUEST['total_shipment_val'];
	$emp_ein_no = $_REQUEST['emp_ein_no'];
	
	
	$main_tr = '<tr><th>Sr. No.</th><th>Pallet/Boxes Qty</th><th>Dimensions</th><th>Weight LBS/KG</th></tr>';
	$check_size = sizeof(unserialize($pickup_request_srno));
	$first_arr = unserialize($pickup_request_srno);
	$second_arr = unserialize($pickup_request_boxes_quantity);
	$third_arr = unserialize($pickup_request_dimension);
	$fourth_arr = unserialize($pickup_request_weight);

	for($i=0;$i<$check_size;$i++) {
		$main_tr .= '<tr><th>'.$first_arr[$i].'</th><th>'.$second_arr[$i].'</th><th>'.$third_arr[$i].'</th><th>'.$fourth_arr[$i].'</th></tr>';
	}
	
	$admin_html_body = '<html><body><table width="100%" border="0" cellspacing="0" cellpadding="10" style="background-color:#D6D6D6;">
	  <tr style="background-color:#005E5E; color:#FFF;"><th scope="row" colspan="4" align="center"><h2>LCL Order Form Detail</h2></th></tr>
	  <tr><th scope="row" colspan="4"><p>Details filled by user are following :- </p></th></tr>
	  <tr><th scope="row" colspan="4"><p>Shipper Information</p></th></tr>
	  <tr><th scope="row" align="left">Shipper Name: </th><td>'. $shipper_name.'</td><th scope="row" align="left">Spouse Name: </th><td>'. $spouse_name.'</td></tr>
	  <tr><th scope="row" colspan="4"><p>Shipper USA Address</p></th></tr>
	  <tr><th scope="row" align="left">Address: </th><td>'. $shipper_usa_address.'</td><th scope="row" align="left">City: </th><td>'. $shipper_usa_city.'</td></tr>
	  <tr><th scope="row" align="left">State: </th><td>'. $shipper_usa_state.'</td><th scope="row" align="left">Zip: </th><td>'. $shipper_usa_zip.'</td></tr>  
      <tr><th scope="row" colspan="4" align="left"><p>Contact Detail:</p></th></tr>
  <tr><th scope="row" align="left">Home No: </th><td>'. $contact_home_no.'</td><th scope="row" align="left">Cell#: </th><td>'. $contact_cell.'</td></tr>
  <tr><th scope="row" align="left">Work (Optional): </th><td>'. $contact_work_no.'</td><th scope="row" align="left">Email: </th><td>'. $contact_email.'</td></tr>  
  <tr><th scope="row" colspan="4" align="left"><p>Pick-Up Address:</p></th></tr>
  <tr><th scope="row" align="left">Address: </th><td>'. $pickup_address.'</td><th scope="row" align="left">City: </th><td>'. $pickup_city.'</td></tr>
  <tr><th scope="row" align="left">State: </th><td>'. $pickup_state.'</td><th scope="row" align="left">Zip: </th><td>'. $pickup_zip.'</td></tr>
  <tr><th scope="row" colspan="4" align="left"><p>Pick-Up Request Date:</p></th></tr>  
  '.$main_tr.'
  <tr><th scope="row" colspan="4" align="left"><p>Consignee/Receiver Information:</p></th></tr>
  <tr><th scope="row" align="left">Consignee Name: </th><td>'. $consignee_name.'</td><th scope="row" align="left">Address: </th><td>'. $consignee_address.'</td></tr>
  <tr><th scope="row" align="left">City: </th><td>'. $consignee_city.'</td><th scope="row" align="left">Country: </th><td>'. $consignee_country.'</td></tr>
  <tr><th scope="row" align="left">Tel No: </th><td>'. $consignee_tel_no.'</td><th scope="row" align="left">Email: </th><td>'. $consignee_email.'</td></tr>  
  <tr><th scope="row" colspan="4" align="left"><p>Person to receive goods at Destination or Consignee (If different from above):</p></th></tr>
  <tr><th scope="row" align="left">Receiver Name: </th><td>'. $receiver_name.'</td><th scope="row" align="left">Address: </th><td>'. $receiver_address.'</td></tr>
  <tr><th scope="row" align="left">City: </th><td>'. $receiver_city.'</td><th scope="row" align="left">Country: </th><td>'. $receiver_country.'</td></tr>
  <tr><th scope="row" align="left">Tel No: </th><td>'. $receiver_tel_no.'</td><th scope="row" align="left">Email: </th><td>'. $receiver_email.'</td></tr>
  <tr><th scope="row" align="left" col=="3">INSURANCE – YES or NO (If yes, then give us list of contents with valuation within 7 days from the date of pickup): </th><td>'. $insurance_option.'</td></tr>
  <tr><th scope="row" align="left" col=="3">If yes, then: </th><td>'. $insurance_option_yes.'</td></tr>
  <tr><th scope="row" align="left">Total Value of Shipment: </th><td>'. $total_shipment_val.'</td><th scope="row" align="left">EIN (Employee Identification Number): </th><td>'. $emp_ein_no.'</td></tr>
  <tr><th scope="row" align="left">Shipper Signature: </th><td>'. $shipper_sign.'</td><th scope="row" align="left"></th><td></td></tr>
	</table></body></html>';

	$subject = "Sky2C LCL Order Form Detail";
	
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
	$mail->AddAddress("rohit@sky2c.com", "Sky2c Freight Systems Inc");
	$mail->AddAddress("sales2@sky2c.com", "Sky2c Freight Systems Inc");
	//$mail->AddAddress("ad@birbals.com", "Sky2c Freight Systems Inc");

	//$mail->AddAddress("rajveer@birbals.com", "Sky2c Freight Systems Inc");
	$mail->IsHTML(true);
	$mail->Subject = $subject;
	$mail->Body    = $admin_html_body; 
	$mail->AltBody = $admin_html_body;
	if(!$mail->Send()) {  } else { }

//echo $message;
$today = date("Y-m-d h:i:s");
$ip = $_SERVER['REMOTE_ADDR'];
$sql = "Insert into `lcl_form_details` set `lc_shipper_name`='$shipper_name', `lc_spouse_name`='$spouse_name', `lc_shipper_usa_address`='$shipper_usa_address', `lc_shipper_usa_city`='$shipper_usa_city', `lc_shipper_usa_state`='$shipper_usa_state', `lc_shipper_usa_zip`='$shipper_usa_zip', `lc_contact_home_no`='$contact_home_no', `lc_contact_cell`='$contact_cell', `lc_contact_work_no`='$contact_work_no', `lc_contact_email`='$contact_email', `lc_pickup_address`='$pickup_address', `lc_pickup_city`='$pickup_city', `lc_pickup_state`='$pickup_state', `lc_pickup_zip`='$pickup_zip', `lc_pickup_request_srno`='$pickup_request_srno', `lc_pickup_request_boxes_quantity`='$pickup_request_boxes_quantity', `lc_pickup_request_dimension`='$pickup_request_dimension', `lc_pickup_request_weight`='$pickup_request_weight', `lc_consignee_name`='$consignee_name', `lc_consignee_address`='$consignee_address', `lc_consignee_city`='$consignee_city', `lc_consignee_country`='$consignee_country', `lc_consignee_tel_no`='$consignee_tel_no', `lc_consignee_email`='$consignee_email', `lc_receiver_name`='$receiver_name',`lc_receiver_address`='$receiver_address', `lc_receiver_city`='$receiver_city',`lc_receiver_country`='$receiver_country', `lc_receiver_tel_no`='$receiver_tel_no', `lc_receiver_email`='$receiver_email', `lc_insurance_option`='$insurance_option', `lc_insurance_option_yes`='$insurance_option_yes', `lc_total_shipment_val`='$total_shipment_val', `lc_emp_ein_no`='$emp_ein_no',`lc_shipper_sign`='$shipper_sign', `lc_regDate`='$today', `lc_userIP`='$ip', `lc_checkSameAddr` = '' ";
$insert = mysqli_query($conn, $sql) or die("could not insert data".mysqli_error($conn));		

		$autoresponder = '<html><body><table cellspacing=5 cellpadding=5>
	<tr>
    	<td><strong>Hi '.$shipper_name.',</strong></td>
	</tr>
    <tr>
        <td>Thank you for completing the LCL Order Request Form on our website. We have received your inquiry and will reach out to you within 24 hours either by phone or email.<br/><br/>For urgent or rush inquiries, please Contact us Toll Free at: 1800.353.5128.<br/><br/><br/><br/></td>
    </tr>
    <tr>
        <td><strong>Thanks<br/>
		Sky2c Freight Systems, Inc.<br/>
		4221 Business Center Dr.<br/>
		Suite 5 & 6<br/>
		Fremont, CA 94538<br/>
		USA<br/>
		Tel: 1800.353.5128<br/>
		Fax: 1800.353.5132</strong></td>
		    </tr></table></body></html>';	
		
		$subject = "Thanks for contacting Sky2c";
		// $admin_email = "rajveer@birbals.com";
		$admin_email = "webb.expert1@gmail.com";
		$sendto = $contact_email;		
		
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
		$mail->AddAddress($sendto, $shipper_name);
		$mail->IsHTML(true);
		$mail->Subject = $subject;
		$mail->Body    = $autoresponder;
		$mail->AltBody = $autoresponder;
		$mail->addReplyTo('info@sky2c.com', 'Sky2c Freight Systems Inc');
		if(!$mail->Send()) {  } else {  }
					
		/*echo "<script>window.location="."'".$success."'"."</script>";*/
		/*echo "<script>alert('Your order received successfully')</script>";*/
		echo "<script>window.location='https://www.sky2c.com/thanks.htm'</script>";

} else {
	echo "Couldn't complete your request....";
	echo "<script>window.location='https://www.sky2c.com/lcl-order-form.htm'</script>";
}
?>