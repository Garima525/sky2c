<?php $conn = mysqli_connect("localhost","sky2co_skynew","J*{r4~Y&{(5{","sky2co_new");               

/* Author : Rajveer.S
   Updated Date : June,20 - 2020
   Description : For update the sky2c Quote,Contacts Forms details to save CRM lead
*/
/* For call to crm webservice*/
function call($url, $params, $type = "GET"){
    $is_post = 0;
    if ($type == "POST"){
        $is_post = 1;
        $post_data = $params;
    } else {
        $url = $url . "?" . http_build_query($params);
    }

    $ch = curl_init($url);
    if (!$ch) {
        die("Cannot allocate a new PHP-CURL handle");
    }
    if ($is_post){
        curl_setopt($ch, CURLOPT_POST, $is_post);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
    }
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $data = curl_exec($ch);
    $return = null;
    if (curl_error($ch)){
        $return = false;
    }else{
        $return = json_decode($data, true);
    }
    curl_close($ch);
    return $return;
}

$avilable = "No";
$endpointUrl = 'https://www.sky2c.com/crm-pawan/webservice.php';
$userName = 'admin';
$userAccessKey = 'UXqiqTpAgPMvmO';

/* Step1: For get the CRM Session Id */
$sessionData = call($endpointUrl, array("operation" => "getchallenge", "username" => $userName));
$challengeToken = $sessionData['result']['token'];
$generatedKey = md5($challengeToken . $userAccessKey);
$dataDetails = call($endpointUrl, array("operation" => "login","username"=>$userName, "accessKey"=>$generatedKey), "POST");
$sessionid = $dataDetails['result']['sessionName'];

/***** LEADS TO ASSIGNED ORDER WISE CRM USERS *****/
/*Steve=>8,Jasmeet Singh=>14,Lisa=>13, Tandon=>17,admin=>1 */
/*CRM Administrator=>1*/
$arr = array(0=>8,1=>14,2=>13,3=>17,4=>1);

/*$arr = array(0=>8,1=>9,2=>13);*/

$tck = count($arr);
$sql_qry = mysqli_query($conn, "SELECT * FROM sy_vtiger_lead_last_assigned WHERE assignid=1");

$get_record = mysqli_fetch_array($sql_qry);

$last_assigned_user = $get_record['assigned_user'];
$current = $last_assigned_user;

$assigned_user_id = "19x".$current;
for($i=0;$i<$tck;$i++){
  if($arr[$i]==$current){
	  $next = $i+1;
	  if($next==4){ $next=0; }
	  $next = $arr[$next];
	  $update_qry = "UPDATE sy_vtiger_lead_last_assigned SET assigned_user='$next' WHERE assignid=1";
	  mysqli_query($conn,$update_qry);
	  //$conn->query($update_qry);
	  break;
  }
}
/****** LEADS TO ASSIGNED ORDER WISE CRM USERS - END *****/

//echo "check current ".$current." - ".$assigned_user_id; die("chk");
if($typeis=="quote"){
	/* Step2 : For save the quote details to CRM Lead */
	$avilable = "No";
	$contactData  = array('firstname'=>$fname,'lastname'=>$lname,'phone'=>$CellPhone,'company'=>'birbals', 'assigned_user_id'=>$assigned_user_id, 'account_id'=>'3x12','cf_1250'=>'Quote','email'=>$EmailAddress,'cf_854'=>$FromZip,'cf_856'=>$ToZip,'cf_858'=>$Fromcountry,'cf_860'=>$Tocountry,'cf_862'=>$Comments,'cf_1254'=>'1');
//print_r($contactData); die("chk con");
	$objectJson = json_encode($contactData);
	$getUserDetail = call($endpointUrl, array("operation" => "create", "sessionName" => $sessionid, "elementType" =>'Leads', "element"=>$objectJson), "POST");

    /*echo "<pre>";
	print_r($objectJson);
	print_r($getUserDetail);
	echo "</pre>";
	die;*/

}else if($typeis=="contact"){	
	/* Step2 : For save the contact details to CRM Lead */
	$avilable = "No";
	$contactData  = array('firstname'=>$cname,'lastname'=>$cname,'assigned_user_id'=>$assigned_user_id, 'account_id'=>'3x12','cf_1250'=>'Contact','email'=>$cemail,'cf_864'=>$csubject,'cf_866'=>$cmessage,'cf_1254'=>'1');
	$objectJson = json_encode($contactData);
	$getUserDetail = call($endpointUrl, array("operation" => "create", "sessionName" => $sessionid, "elementType" =>'Leads', "element"=>$objectJson), "POST");
}else if($typeis=="commercial_from"){

/* Step3 : For save the commercial cargo quote details to CRM Lead */
$contactData  = array('firstname'=>$uname,'lastname'=>$uname,'assigned_user_id'=>$assigned_user_id, 'account_id'=>'3x12','cf_1250'=>'Commercial Cargo','cf_1188'=>$uname,'cf_1190'=>$ucompany,'cf_1192'=>$uemail,'cf_1194'=>$uphone,'cf_1196'=>$message,'cf_1254'=>'1');
$objectJson = json_encode($contactData);
$getUserDetail = call($endpointUrl, array("operation" => "create", "sessionName" => $sessionid, "elementType" =>'Leads', "element"=>$objectJson), "POST");
}else if($typeis=="household_form"){
	/* Step4 : For save the Household quote details to CRM Lead */
	$roro = $_REQUEST['roro'];
	$fulltruck = $_REQUEST['fulltruck'];
	if($_REQUEST['roro']!="" && $_REQUEST['fulltruck']!=""){
		$typeofshipments = array($roro,$fulltruck);
	}else if($_REQUEST['roro']!="" && $_REQUEST['fulltruck']==""){
		$typeofshipments = array($roro);	
	}else if($_REQUEST['roro']=="" && $_REQUEST['fulltruck']!=""){
		$typeofshipments = array($fulltruck);
	}
	
	$contactData  = array('firstname'=>$name,'lastname'=>$name,'assigned_user_id'=>$assigned_user_id, 'account_id'=>'3x12','cf_1250'=>'Household Quote','cf_1198'=>$name,'cf_1200'=>$phone,'cf_1202'=>$email,'cf_1204'=>$companyname,'cf_1206'=>$fax,'cf_1208'=>$BestTimetoCall,'cf_1214'=>$FromCity,'cf_1210'=>$QuoteFor,'cf_1212'=>$By,'cf_1216'=>$FromState,'cf_1218'=>$FromCountry,'cf_1220'=>$FromZip,'cf_1222'=>$ToCity,'cf_1224'=>$ToState,'cf_1226'=>$ToCountry,'cf_1228'=>$ToZip,'cf_1230'=>$typeofshipments,'cf_1246'=>$EstimatedWeight,'cf_1232'=>$DoYouWantUstoPackYourGoods,'cf_1234'=>$ListItemstobePacked,'cf_1236'=>$DoyouneedFreeSurvey,'cf_1238'=>$SurveyDate,'cf_1240'=>$Planningtoshipon,'cf_1242'=>$MustArriveDestinationonorBefore,'cf_1248'=>$AdditionalInformation,'cf_1254'=>'1');
	$objectJson = json_encode($contactData);
	$getUserDetail = call($endpointUrl, array("operation" => "create", "sessionName" => $sessionid, "elementType" =>'Leads', "element"=>$objectJson), "POST");

}else{

/* Step5 : For save the Order Online quote details to CRM Lead */
	if($Shipping=="AlaskaHawaii"){ $Shipping="Alaska or Hawaii"; }
	if($By=="OvertheRoad"){ $By= "Over the Road (Ground)";  }
	if($containersize=="20′ Standard"){
		$trucksizes="20 Standard";
	}else if($containersize=="40′ Standard"){
		$trucksizes=="40 Standard"; 
	}else{ 
		$trucksizes = "40 High Cube"; 
	}
	if($Loose_Furniture!=""){ $Loose_Furniture = "Loose Furniture";	}
	if($Containers!=""){ $Containers = "Full Containers"; }	

	if($Boxes!="" && $Pallets!="" && $Crates!="" && $Loose_Furniture!="" && $Containers!=""){
		$pkg_type = array($Boxes,$Pallets,$Crates,$Loose_Furniture,$Containers);
	}else if($Boxes!="" && $Pallets!="" && $Crates!="" && $Loose_Furniture!=""){
		$pkg_type = array($Boxes,$Pallets,$Crates,$Loose_Furniture);
	}else if($Boxes!="" && $Pallets!="" && $Crates!=""){
		$pkg_type = array($Boxes,$Pallets,$Crates);
	}else if($Boxes!="" && $Pallets!=""){
		$pkg_type = array($Boxes,$Pallets);

	}else if($Boxes!=""){

		$pkg_type = array($Boxes);

	}else{

		$pkg_type = array();

	}
	
	if($Numbers1==0){ $Numbers1="";} if($Length1==0){ $Length1="";} if($Width1==0){ $Width1="";} if($Height1==0){ $Height1="";} if($GrossWeight1==0){ $GrossWeight1="";} if($CubicFeet1==0){ $CubicFeet1="";} if($CubicWeight1==0){ $CubicWeight1=""; }
	if($Numbers1==0){ $PackageType1=""; }
	if($Numbers2==0){ $Numbers2="";} if($Length2==0){ $Length2="";} if($Width2==0){ $Width2="";} if($Height2==0){ $Height2="";} if($GrossWeight2==0){ $GrossWeight2="";} if($CubicFeet2==0){ $CubicFeet2="";} if($CubicWeight2==0){ $CubicWeight2=""; }
	if($Numbers2==0){ $PackageType2=""; }
	if($Numbers3==0){ $Numbers3="";} if($Length3==0){ $Length3="";} if($Width3==0){ $Width3="";} if($Height3==0){ $Height3="";} if($GrossWeight3==0){ $GrossWeight3="";} if($CubicFeet3==0){ $CubicFeet3="";} if($CubicWeight3==0){ $CubicWeight3=""; }
	if($Numbers3==0){ $PackageType3="";}
	if($Numbers4==0){ $Numbers4="";} if($Length4==0){ $Length4="";} if($Width4==0){ $Width4="";} if($Height4==0){ $Height4="";} if($GrossWeight4==0){ $GrossWeight4="";} if($CubicFeet4==0){ $CubicFeet4="";} if($CubicWeight4==0){ $CubicWeight4=""; }
	if($Numbers4==0){ $PackageType4=""; }
	if($Numbers5==0){ $Numbers5="";} if($Length5==0){ $Length5="";} if($Width5==0){ $Width5="";} if($Height5==0){ $Height5="";} if($GrossWeight5==0){ $GrossWeight5="";} if($CubicFeet5==0){ $CubicFeet5="";} if($CubicWeight5==0){ $CubicWeight5=""; }
	if($Numbers5==0){ $PackageType5=""; }
	if($Numbers6==0){ $Numbers6="";} if($Length6==0){ $Length6="";} if($Width6==0){ $Width6="";} if($Height6==0){ $Height6="";} if($GrossWeight6==0){ $GrossWeight6="";} if($CubicFeet6==0){ $CubicFeet6="";} if($CubicWeight6==0){ $CubicWeight6=""; }
	if($Numbers6==0){ $PackageType6="";	}
	if($Numbers7==0){ $Numbers7="";} if($Length7==0){ $Length7="";} if($Width7==0){ $Width7="";} if($Height7==0){ $Height7="";} if($GrossWeight7==0){ $GrossWeight7="";} if($CubicFeet7==0){ $CubicFeet7="";} if($CubicWeight7==0){ $CubicWeight7=""; }
	if($Numbers7==0){ $PackageType7="";	}
	if($Numbers8==0){ $Numbers8="";} if($Length8==0){ $Length8="";} if($Width8==0){ $Width8="";} if($Height8==0){ $Height8="";} if($GrossWeight8==0){ $GrossWeight8="";} if($CubicFeet8==0){ $CubicFeet8="";} if($CubicWeight8==0){ $CubicWeight8=""; }
	if($Numbers8==0){ $PackageType8="";	}
	if($Numbers9==0){ $Numbers9="";} if($Length9==0){ $Length9="";} if($Width9==0){ $Width9="";} if($Height9==0){ $Height9="";} if($GrossWeight9==0){ $GrossWeight9="";} if($CubicFeet9==0){ $CubicFeet9="";} if($CubicWeight9==0){ $CubicWeight9=""; }
	if($Numbers9==0){ $PackageType9=""; }
	if($Numbers10==0){ $Numbers10="";} if($Length10==0){ $Length10="";} if($Width10==0){ $Width10="";} if($Height10==0){ $Height10="";} if($GrossWeight10==0){ $GrossWeight10="";} if($CubicFeet10==0){ $CubicFeet10="";} if($CubicWeight10==0){ $CubicWeight10=""; }

	if($Numbers10==0){
		$PackageType10="";
	}
		
	$orderOnlineData  = array('firstname'=>$Name,'lastname'=>$Name,'assigned_user_id'=>$assigned_user_id, 'account_id'=>'3x12','cf_1250'=>'Order Online','cf_868'=>$Shipping,'cf_870'=>$By,'cf_872'=>$ShipFrom,'cf_876'=>$ShipTo,'cf_878'=>$Shipper,'cf_880'=>$Consignee,'cf_882'=>$FromContact,'cf_884'=>$ToContact,'cf_886'=>$FromNos,'cf_888'=>$ToNos,'cf_890'=>$FromFax,'cf_892'=>$ToFax,'cf_894'=>$FromEmail,'cf_896'=>$ToEmail,'cf_898'=>$FromRef,'cf_900'=>$ToRef,'cf_902'=>$FromAddress,'cf_904'=>$ToAddress,'cf_906'=>$FromCity,'cf_908'=>$ToCity,'cf_910'=>$FromState,'cf_912'=>$ToState,'cf_914'=>$FromZip,'cf_916'=>$ToZip,'cf_918'=>$FromCountry,'cf_920'=>$ToCountry,'cf_922'=>$FromNearestPort,'cf_924'=>$PickupAddress,'cf_942'=>$pickupdatetime,'cf_930'=>$pkg_type,'cf_932'=>$tboxsmall,'cf_934'=>$trucksize,'cf_1022'=>$trucksizes,'cf_936'=>$Other_Package,'cf_938'=>$DescriptionofGoods,'cf_944'=>$NONHazardousSpec,'cf_946'=>$HAZMATInfo,'cf_948'=>$PerishableCargoSpec,'cf_950'=>$NeedtopackGoods,'cf_952'=>$ListItem,'cf_1014'=>$TotalNumbers,'cf_1016'=>$TotalGrossWeight,'cf_1018'=>$TotalCubicFeet,'cf_1020'=>$TotalCubicWeight,'cf_972'=>$Declared_Value_for_Customs,'cf_974'=>$Need_Insurance,'cf_976'=>$Advise_Value_for_Insurance,'cf_978'=>$FreightPayable,'cf_980'=>$ThirdPartyDetails,'cf_982'=>$AddCharge,'cf_984'=>$OtherInfo,'cf_986'=>$Company,'cf_990'=>$Name,'cf_988'=>$Street_Address,'cf_992'=>$AptSuite,'cf_994'=>$City,'cf_996'=>$State,'cf_998'=>$Zip,'cf_1000'=>$TelDay,'cf_1002'=>$Fax,'cf_1004'=>$Email,'cf_1006'=>$SignedBy,'cf_1008'=>$Place,'cf_1010'=>$dateandtime,'cf_1012'=>$AdditionalInfo,'cf_1024'=>$PackageType1,'cf_1026'=>$Numbers1,'cf_1028'=>$Length1,'cf_1030'=>$Width1,'cf_1032'=>$Height1,'cf_1034'=>$GrossWeight1,'cf_1036'=>$CubicFeet1,'cf_1038'=>$CubicWeight1,'cf_1040'=>$PackageType2,'cf_1042'=>$Numbers2,'cf_1044'=>$Length2,'cf_1046'=>$Width2,'cf_1048'=>$Height2,'cf_1050'=>$GrossWeight2,'cf_1052'=>$CubicFeet2,'cf_1054'=>$CubicWeight2,'cf_1056'=>$PackageType3,'cf_1058'=>$Numbers3,'cf_1060'=>$Length3,'cf_1062'=>$Width3,'cf_1064'=>$Height3,'cf_1066'=>$GrossWeight3,'cf_1068'=>$CubicFeet3,'cf_1070'=>$CubicWeight3,'cf_1074'=>$PackageType4,'cf_1076'=>$Numbers4,'cf_1078'=>$Length4,'cf_1080'=>$Width4,'cf_1082'=>$Height4,'cf_1084'=>$GrossWeight4,'cf_1086'=>$CubicFeet4,'cf_1088'=>$CubicWeight4,'cf_1090'=>$PackageType5,'cf_1092'=>$Numbers5,'cf_1094'=>$Length5,'cf_1096'=>$Width5,'cf_1098'=>$Height5,'cf_1100'=>$GrossWeight5,'cf_1102'=>$CubicFeet5,'cf_1104'=>$CubicWeight5,'cf_1106'=>$PackageType6,'cf_1108'=>$Numbers6,'cf_1110'=>$Length6,'cf_1112'=>$Width6,'cf_1114'=>$Height6,'cf_1116'=>$GrossWeight6,'cf_1118'=>$CubicFeet6,'cf_1136'=>$CubicWeight6,'cf_1120'=>$PackageType7,'cf_1122'=>$Numbers7,'cf_1124'=>$Length7,'cf_1126'=>$Width7,'cf_1128'=>$Height7,'cf_1130'=>$GrossWeight7,'cf_1132'=>$CubicFeet7,'cf_1134'=>$CubicWeight7,'cf_1138'=>$PackageType8,'cf_1154'=>$Numbers8,'cf_1140'=>$Length8,'cf_1142'=>$Width8,'cf_1144'=>$Height8,'cf_1146'=>$GrossWeight8,'cf_1148'=>$CubicFeet8,'cf_1150'=>$CubicWeight8,'cf_1152'=>$PackageType9,'cf_1156'=>$Numbers9,'cf_1158'=>$Length9,'cf_1160'=>$Width9,'cf_1162'=>$Height9,'cf_1164'=>$GrossWeight9,'cf_1166'=>$CubicFeet9,'cf_1168'=>$CubicWeight9,'cf_1170'=>$PackageType10,'cf_1172'=>$Numbers10,'cf_1174'=>$Length10,'cf_1176'=>$Width10,'cf_1178'=>$Height10,'cf_1180'=>$GrossWeight10,'cf_1182'=>$CubicFeet10,'cf_1184'=>$CubicWeight10,'cf_1254'=>'1');
	
	/*echo "<pre>";
	print_r($orderOnlineData);
	echo "</pre>";
	die;*/

	$objectJson = json_encode($orderOnlineData);

	$getUserDetail = call($endpointUrl, array("operation" => "create", "sessionName" => $sessionid, "elementType" =>'Leads', "element"=>$objectJson), "POST");

}
?>
