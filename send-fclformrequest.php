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
$conn = mysqli_connect("localhost","sky2cdb","9i2p[qFwN-jcG.[R","sky2cdb") or die("could not connect to db");

// $conn = mysqli_connect("localhost","sky2co_skynew","J*{r4~Y&{(5{","sky2co_new") or die("could not connect to db");


// require("phpmailer/class.phpmailer.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require "PHPMailer/src/Exception.php";
require "PHPMailer/src/PHPMailer.php";
require "PHPMailer/src/SMTP.php";

$shipper_name = @$_REQUEST['shipper_name'];
$rq = @$_REQUEST['fl'];
if($rq != "" && $shipper_name != "" ) {

	$spouse_name = @$_REQUEST['spouse_name'];
	$shipper_usa_address = @$_REQUEST['shipper_usa_address'];
	$shipper_usa_city = @$_REQUEST['shipper_usa_city'];
	$shipper_usa_state = @$_REQUEST['shipper_usa_state'];
	$shipper_usa_zip = @$_REQUEST['shipper_usa_zip'];
	$shipper_home_phone = @$_REQUEST['shipper_home_phone'];
	$shipper_cell_phone = @$_REQUEST['shipper_cell_phone'];	
	$shipper_work_phone = @$_REQUEST['shipper_work_phone'];
	$shipper_email = @$_REQUEST['shipper_email'];
	$container_size = @$_REQUEST['container_size'];
	$loading_date = @$_REQUEST['loading_date'];
	$service_req_pickdrop = @$_REQUEST['service_req_pickdrop'];
	$container_loading_address = @$_REQUEST['container_loading_address'];
	$container_loading_city = @$_REQUEST['container_loading_city'];
	$container_loading_state = @$_REQUEST['container_loading_state'];	
	$container_loading_zip = @$_REQUEST['container_loading_zip'];
	$veh_shipping = @$_REQUEST['veh_shipping'];
	$veh_model = serialize(@$_REQUEST['veh_model']);
	$veh_year = serialize(@$_REQUEST['veh_year']);
	$original_title = @$_REQUEST['original_title'];
	$load_assist = @$_REQUEST['load_assist'];
	$packing_assist = @$_REQUEST['packing_assist'];	
	$consignee_name = @$_REQUEST['consignee_name'];
	$consignee_address = @$_REQUEST['consignee_address'];
	$consignee_city = @$_REQUEST['consignee_city'];
	$consignee_country = @$_REQUEST['consignee_country'];
	$consignee_tel_no = @$_REQUEST['consignee_tel_no'];
	$consignee_email = @$_REQUEST['consignee_email'];
	$fcl_shipper_sign = @$_REQUEST['fcl_shipper_sign'];
	
	$fcl_insurance_option = @$_REQUEST['insurance_option'];
	$fcl_insurance_option_yes = @$_REQUEST['insurance_option_yes'];
	$fcl_total_shipment_val = @$_REQUEST['total_shipment_val'];
	$fcl_emp_ein_no = @$_REQUEST['emp_ein_no'];
	$fcl_packlist_estval = @$_REQUEST['packlist_estval'];
	
	$main_tr = '<tr><th colspan=2>Model of Vehicle</th><th colspan=2>Year of Vehicle</th></tr>';
	$check_size = $veh_shipping;
	$first_arr = unserialize($veh_model);
	$second_arr = unserialize($veh_year);

	for($i=0;$i<$check_size;$i++) {
		$main_tr .= '<tr><th colspan=2>'.$first_arr[$i].'</th><th colspan=2>'.$second_arr[$i].'</th></tr>';
	}
	
	$admin_html_body = '<html><body><table width="100%" border="0" cellspacing="0" cellpadding="10" style="background-color:#D6D6D6;">
  <tr style="background-color:#005E5E; color:#FFF;"><th scope="row" colspan="4" align="center"><h2>FCL Form Detail</h2></th></tr>
  <tr><th scope="row" colspan="4"><p>Details filled by user are following :- </p></th></tr>
  <tr><th scope="row" colspan="4" align="left"><p>Shipper/Exporter Information:</p></th></tr>
  <tr><th scope="row" align="left">Shipper Name: </th><td>'. $shipper_name.'</td><th scope="row" align="left">Spouse Name: </th><td>'. $spouse_name.'</td></tr>
  <tr><th scope="row" colspan="4" align="left"><p>Shipper Address (USA):</p></th></tr>
  <tr><th scope="row" align="left">Address: </th><td>'. $shipper_usa_address.'</td><th scope="row" align="left">City: </th><td>'. $shipper_usa_city.'</td></tr>
  <tr><th scope="row" align="left">State: </th><td>'. $shipper_usa_state.'</td><th scope="row" align="left">Zip: </th><td>'. $shipper_usa_zip.'</td></tr>
  <tr><th scope="row" colspan="4" align="left"><p>Contact Detail:</p></th></tr>
  <tr><th scope="row" align="left">Home No: </th><td>'. $shipper_home_phone.'</td><th scope="row" align="left">Cell#: </th><td>'. $shipper_cell_phone.'</td></tr>
  <tr><th scope="row" align="left">Work (Optional): </th><td>'. $shipper_work_phone.'</td><th scope="row" align="left">Email: </th><td>'. $shipper_email.'</td></tr>
  <tr><th scope="row" colspan="4" align="left"><p>FCL Information:</p></th></tr>
  <tr><th scope="row" align="left">Container Size 20 or 40: </th><td>'. $container_size.'</td><th scope="row" align="left">Loading Date: </th><td>'. $loading_date.'</td></tr>
  <tr><th scope="row" colspan="4" align="left"><p>Service Required:</p></th></tr>
  <tr><th scope="row" align="left" colspan=2>Do you need Live Load or Drop & pick (Additional charge): </th><td colspan=2>'. $service_req_pickdrop.'</td></tr>
  <tr><th scope="row" colspan="4" align="left"><p>Container Loading Address:</p></th></tr>  
  <tr><th scope="row" align="left">Address: </th><td>'. $container_loading_address.'</td><th scope="row" align="left">City: </th><td>'. $container_loading_city.'</td></tr>
  <tr><th scope="row" align="left">State: </th><td>'. $container_loading_state.'</td><th scope="row" align="left">Zip: </th><td>'. $container_loading_zip.'</td></tr>
  <tr><th scope="row" colspan="4" align="left"><p>Are you shipping vehicles? Please provide the following:</p></th></tr>  
  <tr><th scope="row" align="left">Quantity: </th><td>'. $$veh_shipping.'</td><th scope="row" align="left"></th><td></td></tr>
  '.$main_tr.'
  <tr><th scope="row" align="left">Do you have the original Title?: </th><td>'. $original_title.'</td><th scope="row" align="left">Do you need assistance in Load goods in container?: </th><td>'. $load_assist.'</td></tr>
  <tr><th scope="row" colspan=2 align="left">Do you need assistance in packing your goods?: </th><td colspan=2>'. $packing_assist.'</td></tr>
  <tr><th scope="row" colspan="4" align="left"><p>Consignee/Receiver Information:</p></th></tr>
  <tr><th scope="row" align="left">Consignee Name: </th><td>'. $consignee_name.'</td><th scope="row" align="left">Address: </th><td>'. $consignee_address.'</td></tr>
  <tr><th scope="row" align="left">City: </th><td>'. $consignee_city.'</td><th scope="row" align="left">Country: </th><td>'. $consignee_country.'</td></tr>
  <tr><th scope="row" align="left">Tel No: </th><td>'. $consignee_tel_no.'</td><th scope="row" align="left">Email: </th><td>'. $consignee_email.'</td></tr>
  <tr><th scope="row" align="left" col=="3">INSURANCE � YES or NO (If yes, then give us list of contents with valuation within 7 days from the date of pickup): </th><td>'. $fcl_insurance_option.'</td></tr>
  <tr><th scope="row" align="left" col=="3">If yes, then: </th><td>'. $fcl_insurance_option_yes.'</td></tr>
  <tr><th scope="row" align="left">Total Value of Shipment: </th><td>'. $fcl_total_shipment_val.'</td><th scope="row" align="left">EIN (Employee Identification Number): </th><td>'. $fcl_emp_ein_no.'</td></tr>
  <tr><th scope="row" align="left" col=="3">Please share the packing list of all the goods with estimated value.: </th><td>'. $fcl_packlist_estval.'</td></tr>
  <tr><th scope="row" align="left">Shipper Signature: </th><td>'. $fcl_shipper_sign.'</td><th scope="row" align="left"></th><td></td></tr>
</table></body></html>';
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
	// $mail->Mailer = "mail";
	// $mail->Host = 'smtp.office365.com';
	// $mail->Port       = 587;
	// $mail->SMTPSecure = 'tls';
	// $mail->SMTPAuth   = true;
	// $mail->Username = 'sky2c@sky2c.com';
	// $mail->Password = 'Gheeya@7';

	$mail->SetFrom('sky2c@sky2c.com', 'Sky2c Freight Systems Inc');
	$mail->AddAddress("rohit@sky2c.com", "Sky2c Freight Systems Inc");
	$mail->AddAddress("sales2@sky2c.com", "Sky2c Freight Systems Inc");
	$mail->IsHTML(true);
	$mail->Subject = $subject;
	$mail->Body    = $admin_html_body;
	$mail->AltBody = $admin_html_body;
	if(!$mail->Send()) {  } else {  }
	
	$today = date("Y-m-d h:i:s");
	$ip = $_SERVER['REMOTE_ADDR'];
	$sql = "INSERT INTO `fcl_form_details` set `fcl_shipper_name`='$shipper_name', `fcl_spouse_name`='$spouse_name', `fcl_shipper_usa_address`='$shipper_usa_address', 	`fcl_shipper_usa_city`='$shipper_usa_city', `fcl_shipper_usa_state`='$shipper_usa_state', `fcl_shipper_usa_zip`='$shipper_usa_zip', `fcl_shipper_home_phone`='$shipper_home_phone', 	`fcl_shipper_cell_phone`='$shipper_cell_phone', `fcl_shipper_work_phone`='$shipper_work_phone', `fcl_shipper_email`='$shipper_email', `fcl_container_size`='$container_size', 	`fcl_loading_date`='$loading_date', `fcl_service_req_pickdrop`='$service_req_pickdrop', `fcl_container_loading_address`='$container_loading_address', 	`fcl_container_loading_city`='$container_loading_city', `fcl_container_loading_state`='$container_loading_state', `fcl_container_loading_zip`='$container_loading_zip', 	`fcl_veh_shipping`='$veh_shipping', `fcl_veh_model`='$veh_model', `fcl_veh_year`='$veh_year', `fcl_original_title`='$original_title', `fcl_load_assist`='$load_assist', 	`fcl_packing_assist`='$packing_assist', `fcl_consignee_name`='$consignee_name', `fcl_consignee_address`='$consignee_address', `fcl_consignee_city`='$consignee_city', 	`fcl_consignee_country`='$consignee_country', `fcl_consignee_tel_no`='$consignee_tel_no', `fcl_consignee_email`='$consignee_email', `fcl_shipper_sign`='$fcl_shipper_sign', 	 `fcl_insurance_option`='$fcl_insurance_option', `fcl_insurance_option_yes`='$fcl_insurance_option_yes', `fcl_total_shipment_val`='$fcl_total_shipment_val', `fcl_emp_ein_no`='$fcl_emp_ein_no', `fcl_packlist_estval`='$fcl_packlist_estval', `fcl_ip`='$ip', `fcl_date`='$today'";
	$insert = mysqli_query($conn, $sql) or die("could not insert data".mysqli_error($conn));		

	$autoresponder = '<html><body><table cellspacing=5 cellpadding=5>
	<tr>
    	<td><strong>Hi '.$shipper_name.',</strong></td>
	</tr>
    <tr>
        <td>Thank you for completing the FCL Request Form on our website. We have received your inquiry and will reach out to you within 24 hours either by phone or email.<br/><br/>For urgent or rush inquiries, please Contact us Toll Free at: 1800.353.5128.<br/><br/><br/><br/></td>
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
		$admin_email  = 'info@sky2c.com';
		// $admin_email = "webb.expert1@gmail.com";
		$sendto = $shipper_email;		

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
		// $mail->Mailer = "mail";
		// $mail->Host = 'smtp.office365.com';
		// $mail->Port       = 587;
		// $mail->SMTPSecure = 'tls';
		// $mail->SMTPAuth   = true;
		// $mail->Username = 'sky2c@sky2c.com';
		// $mail->Password = 'Gheeya@7';
	
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
	echo "<script>window.location='https://www.sky2c.com/fcl-order-form.htm'</script>";
}
?>