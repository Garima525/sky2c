<?php 
	//set_time_limit(9000);//4minutes
	ob_start(); 
	
	require 'PHPMailer-master/PHPMailerAutoload.php';

	//ini_set('max_execution_time', 3000); //300 seconds = 5 minutes

	//DESCARTES FTP SERVER
	$ftp_server = "ftp.iesltd.com";

	// set up a connection or die
	$conn_id = ftp_connect($ftp_server) or die("Couldn't connect to $ftp_server"); 

	//Display array function
	function pr($input){
		echo "<pre>";print_r($input);echo "</pre>"; //die;
	}

	$uname = "sky2c-xml"; //Enter your ftp username here.
	$pwd = "AuU6QpMc"; //Enter your ftp password here.
	$directory = "out"; //Enter the dir of the files on the server here.

	$login = ftp_login($conn_id, $uname, $pwd);

	if (ftp_chdir($conn_id, $directory)) {
		echo "Changed directory to: " . ftp_pwd($conn_id) . "\n";
	} else { 
		echo "Error while changing directory!\n";
	}

	ftp_pasv($conn_id,TRUE);
	
	$files = ftp_nlist($conn_id, ".");
	//$files = array_reverse($files);
	
	//echo "<pre>"; print_r($files); echo "</pre>"; 

	/*$file = "20180329.19014801.XML";

	if (ftp_delete($conn_id, $file)){
  		echo "$file deleted";
  	}else{
  		echo "Could not delete $file";
  	}*/


	if(!empty($files)){
		foreach($files as $myfile){

			if(preg_match('/.*\/\.\.$/', $myfile) || preg_match('/.*\/\.$/', $myfile)){
				continue;
			}	
				
		    if (strpos($myfile, '.') !== false) {
			    $fileNameArr = explode('.',$myfile);
			    
	            $fileTime = $fileNameArr[0];
	            $tillDate = strtotime(date('Y-m-d',(strtotime ( '-6 day' , strtotime (date('d-m-Y')) ) ))); 
	            $fileDate = strtotime(date("d-m-Y",strtotime($fileTime)));
	            
	            if($fileDate>=$tillDate){	            	
	                echo "Do not Delete this file---".$myfile;
	            }else{
	            	echo "Delete this---".$myfile;
	            	if (ftp_delete($conn_id, $myfile)){ 
					  	echo "$file deleted";
					}else{
					  	echo "Could not delete $myfile";
					}
	            }
	            echo "</br>";
	        }
            
		}
		//sendCustomMail($files);
		$websiteURL = 'https://www.shipment.sky2c.com';
		$todayDate = date("F j, Y");
		echo '<!DOCTYPE html><html lang="en"><head> <title>Auto Import Order</title> <meta charset="utf-8"> <meta name="viewport" content="width=device-width, initial-scale=1"> <link rel="stylesheet" href="'.$websiteURL.'assets/global/plugins/bootstrap/css/bootstrap.min.css"> <script src="'.$websiteURL.'assets/global/plugins/jquery.min.js"></script> <script src="'.$websiteURL.'assets/global/plugins/bootstrap/js/bootstrap.min.js"></script></head><body> <div class="container"><div class="row text-center"> <div class="col-sm-6 col-sm-offset-3"> <br><br><h2 style="color:#0fad00">Success</h2> <img src="'.$websiteURL.'img/check-true.jpg"> <h3>File Deleted Successfully</h3> <p style="font-size:20px;color:#5C5C5C;">File Deleted Successfully</p></div></div></div></body></html>';
		die();

	}else{
		//mail('sonam.mittal@mobilyte.com', 'Cron Job', "No file found", 'From: checksonam@gmail.com');
		die("NOTHING TO DOWNLOAD");

	}
	
?>


