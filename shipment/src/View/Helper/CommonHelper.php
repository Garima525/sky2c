<?php
namespace App\View\Helper;
use Cake\ORM\TableRegistry;
use Cake\View\Helper;
use Cake\I18n\Time;

class CommonHelper extends Helper {

	/* get username */
	public function getUserName($userId){
		$name = "";
		if($userId!=""){
			$usersModel = TableRegistry::get('Users');
			$user = $usersModel->find('all',['conditions' => ['Users.id' => $userId]])->hydrate(false)->toArray();
			if(!empty($user)){
				$name = $user[0]['name'];
			}
		}
		return $name;
	}

    public function convertPhoneFormat($phone){
		$phoneNumber = array();
		if($phone!=""){
			$phone = str_split($phone);
			for($i=0; $i<count($phone); $i++){

				$phoneNumber[] = $phone[$i];
				if($i==2){
					$phoneNumber[] = "-";
				}
				if($i==5){
					$phoneNumber[] = "-";
				}
			}
			$phone = implode('',$phoneNumber);
		}
		return $phone;
	}
	// change time zone of dates
	public function dateConvert($dt, $tz1, $df1, $tz2, $df2) {

		//$tz2 = '-08:00';
		//echo $dt.'--'.$tz1.'--'.$df1.'--'.$tz2.'--'.$df2;die;
		$dates = date('Y-m-d H:i:s',strtotime($dt));
	  	// create DateTime object
	  	$d = (new Time($dates, 'UTC'))->setTimezone($tz2);

		return $d->format($df2);
	   
	}
}
?>