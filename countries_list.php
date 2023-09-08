<?php include("db_connect.php");
$sql = mysqli_query($conn, "SELECT * FROM `countries`") or die("could not fetch countries list"); 
$users_arr = array();

while( $row = mysqli_fetch_array($sql) ){
    $userid = $row['id'];
    $name = $row['name'];

    $users_arr[] = array("id" => $userid, "name" => $name);
}

// encoding array to json format
echo json_encode($users_arr);
/*$row = mysqli_fetch_all($sql);
echo json_encode($row);*/
//print_r($row);
?>