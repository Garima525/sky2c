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
$rq = @$_REQUEST['dof'];
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
	$shipper_sign = $_REQUEST['shipper_sign'];
	
	$main_tr = '<tr><th>Sr. No.</th><th>Pallet/Boxes Qty</th><th>Dimensions</th><th>Weight LBS/KG</th></tr>';
	$check_size = sizeof(unserialize($pickup_request_srno));
	$first_arr = unserialize($pickup_request_srno);
	$second_arr = unserialize($pickup_request_boxes_quantity);
	$third_arr = unserialize($pickup_request_dimension);
	$fourth_arr = unserialize($pickup_request_weight);

	for($i=0;$i<$check_size;$i++) {
		$main_tr .= '<tr><th>'.$first_arr[$i].'</th><th>'.$second_arr[$i].'</th><th>'.$third_arr[$i].'</th><th>'.$fourth_arr[$i].'</th></tr>';
	}
	$subject = "Thanks for contacting Sky2c";

	$admin_html_body = '<html><body><table width="100%" border="0" cellspacing="0" cellpadding="10" style="background-color:#D6D6D6;">
  <tr style="background-color:#005E5E; color:#FFF;"><th scope="row" colspan="4" align="center"><h2>Domestic Movements - Order Form Detail</h2></th></tr>
  <tr><th scope="row" colspan="4"><p>Details filled by user are following :- </p></th></tr>
  <tr><th scope="row" colspan="4" align="left"><p>Shipper/Exporter Information:</p></th></tr>
  <tr><th scope="row" align="left">Shipper Name: </th><td>'. $shipper_name.'</td><th scope="row" align="left">Spouse Name: </th><td>'. $spouse_name.'</td></tr>  
  <tr><th scope="row" colspan="4" align="left"><p>Shipper Address (USA):</p></th></tr>
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
  <tr><th scope="row" align="left">Shipper Signature: </th><td>'. $shipper_sign.'</td><th scope="row" align="left"></th><td></td></tr>
</table></body></html>';
	
	$subject = "Sky2C Air Order Form Detail";
	
	// $mail = new PHPMailer(true);
	// $mail->Mailer = "mail";
	// 	$mail->Host = 'smtp.office365.com';
	// 	$mail->Port       = 587;
	// 	$mail->SMTPSecure = 'tls';
	// 	$mail->SMTPAuth   = true;
	// 	$mail->Username = 'sky2c@sky2c.com';
	// 	$mail->Password = 'Gheeya@7';

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
	$mail->IsHTML(true);
	$mail->Subject = $subject;
	$mail->Body    = $admin_html_body;
	$mail->AltBody = $admin_html_body;
	if(!$mail->Send()) {  } else {  }

//echo $message;
$today = date("Y-m-d h:i:s");
$ip = $_SERVER['REMOTE_ADDR'];
$sql = "Insert into `domesticorder_form_details` set `d_shipper_name`='$shipper_name', `d_spouse_name`='$spouse_name', `d_shipper_usa_address`='$shipper_usa_address', `d_shipper_usa_city`='$shipper_usa_city', `d_shipper_usa_state`='$shipper_usa_state', `d_shipper_usa_zip`='$shipper_usa_zip', `d_contact_home_no`='$contact_home_no', `d_contact_cell`='$contact_cell', `d_contact_work_no`='$contact_work_no', `d_contact_email`='$contact_email', `d_pickup_address`='$pickup_address', `d_pickup_city`='$pickup_city', `d_pickup_state`='$pickup_state', `d_pickup_zip`='$pickup_zip', `d_pickup_request_srno`='$pickup_request_srno', `d_pickup_request_boxes_quantity`='$pickup_request_boxes_quantity', `d_pickup_request_dimension`='$pickup_request_dimension', `d_pickup_request_weight`='$pickup_request_weight', `d_consignee_name`='$consignee_name', `d_consignee_address`='$consignee_address', `d_consignee_city`='$consignee_city', `d_consignee_country`='$consignee_country', `d_consignee_tel_no`='$consignee_tel_no', `d_consignee_email`='$consignee_email', `d_shipper_sign`='$shipper_sign', `d_regDate`='$today', `d_userIP`='$ip', `d_checkSameAddr`='' ";
$insert = mysqli_query($conn, $sql) or die("could not insert data".mysqli_error($conn));		

		$autoresponder = '<html><body><table cellspacing=5 cellpadding=5>
	<tr>
    	<td><strong>Hi '.$shipper_name.',</strong></td>
	</tr>
    <tr>
        <td>Thank you for completing the Domestic Movements - Order Request Form on our website. We have received your inquiry and will reach out to you within 24 hours either by phone or email.<br/><br/>For urgent or rush inquiries, please Contact us Toll Free at: 1800.353.5128.<br/><br/><br/><br/></td>
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
		
		$subject = "Thanks for contacting Sky2c";
		$admin_email = "rajveer@birbals.com";
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
		// echo "<script>alert('Your order received successfully')</script>";
		echo "<script>window.location='https://www.sky2c.com/thanks.htm'</script>";

} else {
	echo "Couldn't complete your request....";
	echo "<script>window.location='https://www.sky2c.com/air-order-form.htm'</script>";
}
?>