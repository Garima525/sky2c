<?php
//DESCARTES FTP SERVER
$ftp_server = "ftp.iesltd.com";

// set up a connection or die
$conn_id = ftp_connect($ftp_server) or die("Couldn't connect to $ftp_server"); 

//Display array function
function pr($input){
	echo "<pre>";print_r($input);echo "</pre>";die;
}

$check = getFtpConnection('ftp://sky2c-xml:AuU6QpMc@iesltd.com/out/');

function getFtpConnection($uri){ 
	
	$local_file = '20170921.22234004.XML';
	$server_file = '20171009.09535742.XML';
	
	// open some file to write to
	
	$handle = fopen("upload_xml_order_files/".$local_file, 'w');
	
    // Split FTP URI into: 
    // $match[0] = ftp://username:password@sld.domain.tld/path1/path2/ 
    // $match[1] = ftp:// 
    // $match[2] = username 
    // $match[3] = password 
    // $match[4] = sld.domain.tld 
    // $match[5] = /path1/path2/ 
    preg_match("/ftp:\/\/(.*?):(.*?)@(.*?)(\/.*)/i", $uri, $match); 

    // Set up a connection 
    $conn = ftp_connect('ftp.' . $match[3] ); 
	
    // Login 
    if (ftp_login($conn, $match[1], $match[2])){ 
		
		
        // Change the dir 
        ftp_chdir($conn, $match[4]); 
      
		//ftp_get_contents($conn,$server_file);
        if (ftp_fget($conn, $handle, $server_file, FTP_ASCII, 0)) {
			echo "successfully written to $local_file\n";
		}else{
			echo "Problem while downloading $server_file to $local_file\n";
		}
		die;
    } 
} 

?>


