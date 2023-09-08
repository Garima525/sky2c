<?php include("db_connect.php");
$state = @$_REQUEST['fromstate'];

if($state!="") {
	$sql = mysqli_query($conn, "SELECT * FROM `states` WHERE `name`='".$state."'") or die("could not fetch state list");
	$state_row = mysqli_fetch_assoc($sql);
	$country_id = $state_row['country_id'];
	
	$sql1 = mysqli_query($conn, "SELECT * FROM `countries` WHERE `id`= $country_id") or die("could not fetch countries list"); 
	$users_arr = array();
	
	while( $row = mysqli_fetch_array($sql1) ){
		$userid = $row['id'];
		$name = $row['name'];
	
		$users_arr[] = array("id" => $userid, "name" => $name);
	}
	
	// encoding array to json format
	echo json_encode($users_arr);
}


/*$row = mysqli_fetch_all($sql);
echo json_encode($row);*/
//print_r($row);
?>