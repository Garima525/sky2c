<?php

	//Display array function
	function pr($input){
		echo "<pre>";print_r($input);echo "</pre>";die;
	} 

	$ftp_server = "ftp.iesltd.com"; //host name
	$uname = "sky2c-xml"; //Enter your ftp username here.
	$pwd = "AuU6QpMc"; //Enter your ftp password here.
	$directory = "save"; //Enter the dir of the files on the server here.

	$connection = ftp_connect($ftp_server) or die("Error connecting to $ftp_server");
	$login = ftp_login($connection, $uname, $pwd);

	if (ftp_chdir($connection, $directory)) {
		echo "Changed directory to: " . ftp_pwd($connection) . "\n";
	} else { 
		echo "Error while changing directory!\n";
	}

	ftp_pasv($connection,TRUE);

	$files = ftp_nlist($connection, ".");
	pr($files); die; 
	if (is_array($files)) {
		
		foreach($files as $file) {
					
			if(preg_match('/.*\/\.\.$/', $file) || preg_match('/.*\/\.$/', $file)){
				continue;
			}	
				
			$size = number_format(ftp_size($connection, $file)/1024); //get file size
			$date = $month_date_year = strtotime(date('m/d/Y', ftp_mdtm($connection, $file))); // get file date
			
			$my_month_date_year = strtotime(date('m/d/Y'));
			
			if($month_date_year < $my_month_date_year){
				continue;
			}else{
				
				if($size > 0){
					
					
					$newFile = time()."_".$file;
					$handle = fopen("upload_xml_order_files/".$newFile, 'w');
					
					//$res = ftp_fget($connection, $handle, $file, FTP_ASCII, 0);
					//$res = ftp_nb_fget($connection, "upload_xml_order_files/".$newFile, $file, FTP_ASCII);
						
					$res = ftp_nb_fget($connection, $handle, $file, FTP_ASCII);
					//	var_dump($res);
					
					echo "<br/>".$file."==".$size."==".$date."===MYDATE: ".date("m/d/Y h:i:s A")."<br/>";
					
				}
			
			}
			
		}
	}
?>
