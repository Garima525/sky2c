<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
// use Cake\Network\Email\Email;
use Cake\Mailer\Email;
use Cake\Core\Configure;
ob_start();
/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
 
	public function beforeFilter(Event $event)
    {
    	date_default_timezone_set("UTC");		
        ini_set('memory_limit', '-1');
        parent::beforeFilter($event); 
        $this->set('authUser', $this->Auth->user());
        /*Check Timezone session*/

        $sessions = $this->request->session();
        
        $SetTimeZone = @$sessions->read('SetTimeZone');
        //echo $SetTimeZone;die;

        if(empty($SetTimeZone)){
        	$IPaddress  =  $_SERVER["REMOTE_ADDR"];
			if(!empty($IPaddress)){ 
			 
				$json  =  @file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $IPaddress); 
			 	//echo $json;die;
				if(!empty(@$json)){
					$fullInfoArr = json_decode($json);
					$timezone = $fullInfoArr->geoplugin_timezone;
					if(!empty($timezone)){
						//date_default_timezone_set($timezone);
						//echo $checkTimeZone = date_default_timezone_get();
						$sessions->write('SetTimeZone',$timezone);
						  
					}
					 
					
				}
						 
			}
        } 
        //echo "<pre>"; print_r($_SESSION);die;
        /************************ user redirect check as per user logged in start here ******************************/
        $action     = $this->request->params['action'];
        $controller = $this->request->params['controller'];
        if(($this->request->controller!="api") || ($action=="forgotPassword" && $controller=="Users") || ($action=="resetPassword" && $controller=="Users") || ($action=="processFileOneToAnother" && $controller=="Orders")){
        	
	        $getUserDetail = $this->Auth->user();
	        if(!empty($getUserDetail)){

	        	if($getUserDetail['role']==4){ // driver access rights
	        		if(
	        				($action=="agentsListing" && $controller=="Users") || 
	        				($action=="editAgent" && $controller=="Users") || 
	        				($action=="addAgent" && $controller=="Users") ||
	        				($action=="importOrders" && $controller=="Orders") || 
	        				($action=="emailTemplates" && $controller=="Cmspages") || 
	        				($action=="emailTemplateEdit" && $controller=="Cmspages") || 
	        				($action=="customersListing" && $controller=="Users") || 
	        				($action=="editCustomer" && $controller=="Users") || 
	        				($action=="cmsPages" && $controller=="Cmspages") ||
	        				($action=="cmsPagesEdit" && $controller=="Cmspages") || 
	        				($action=="driversListing" && $controller=="Users") || 
	        				($action=="editDriver" && $controller=="Users") || 
	        				($action=="addDriver" && $controller=="Users") || 
	        				($action=="staffListing" && $controller=="Users") || 
	        				($action=="addStaff" && $controller=="Users") ||
	        				($action=="editStaff" && $controller=="Users") ||
	        				($action=="ordersHistory" && $controller=="Orders") ||
	        				($action=="agentDetail" && $controller=="Users") || 
	        				($action=="enroutedOrders" && $controller=="Orders") || 
	        				($action=="enroutedOrderDetail" && $controller=="Orders")

	        		){
	        			return $this->redirect($this->Auth->redirectUrl());
	        		}

				}
				if($getUserDetail['role']==2){ // staff access rights
	        		if(
	        				($action=="importOrders" && $controller=="Orders") || 
	        				($action=="emailTemplates" && $controller=="Cmspages") || 
	        				($action=="emailTemplateEdit" && $controller=="Cmspages") || 	        				
	        				($action=="cmsPages" && $controller=="Cmspages") ||
	        				($action=="cmsPagesEdit" && $controller=="Cmspages") || 	        				 
	        				($action=="staffListing" && $controller=="Users") || 
	        				($action=="addStaff" && $controller=="Users") ||
	        				($action=="editStaff" && $controller=="Users") || 
	        				($action=="driverCertificates" && $controller=="Users") ||
	        				($action=="addDriverCertificate" && $controller=="Users") ||
	        				($action=="ordersHistory" && $controller=="Orders") ||
	        				($action=="rejectedOrders" && $controller=="Orders") ||
	        				($action=="editDriverCertificate" && $controller=="Users")
	        		){
	        			return $this->redirect($this->Auth->redirectUrl());
	        		}

				}
				if($getUserDetail['role']==3){ // agent access rights
	        		if(
	        				($action=="agentsListing" && $controller=="Users") || 
	        				($action=="editAgent" && $controller=="Users") || 
	        				($action=="addAgent" && $controller=="Users") ||
	        				($action=="importOrders" && $controller=="Orders") || 
	        				($action=="emailTemplates" && $controller=="Cmspages") || 
	        				($action=="emailTemplateEdit" && $controller=="Cmspages") || 
	        				($action=="customersListing" && $controller=="Users") || 
	        				($action=="editCustomer" && $controller=="Users") || 
	        				($action=="cmsPages" && $controller=="Cmspages") ||
	        				($action=="cmsPagesEdit" && $controller=="Cmspages") || 
	        				($action=="staffListing" && $controller=="Users") || 
	        				($action=="addStaff" && $controller=="Users") ||
	        				($action=="editStaff" && $controller=="Users") || 
	        				($action=="driverCertificates" && $controller=="Users") ||
	        				($action=="addDriverCertificate" && $controller=="Users") ||
	        				($action=="ordersHistory" && $controller=="Orders") ||
	        				($action=="rejectedOrders" && $controller=="Orders") ||
	        				($action=="agentDetail" && $controller=="Users") || 
	        				($action=="enroutedOrders" && $controller=="Orders") || 
	        				($action=="enroutedOrderDetail" && $controller=="Orders") || 
	        				($action=="editDriverCertificate" && $controller=="Users")
	        		){
	        			return $this->redirect($this->Auth->redirectUrl());
	        		}

				}

				if($getUserDetail['role']==5){ // customer access rights
	        		if(
	        				($action=="agentsListing" && $controller=="Users") || 
	        				($action=="editAgent" && $controller=="Users") || 
	        				($action=="addAgent" && $controller=="Users") ||
	        				($action=="importOrders" && $controller=="Orders") || 
	        				($action=="emailTemplates" && $controller=="Cmspages") || 
	        				($action=="emailTemplateEdit" && $controller=="Cmspages") || 
	        				($action=="customersListing" && $controller=="Users") || 
	        				($action=="editCustomer" && $controller=="Users") || 
	        				($action=="cmsPages" && $controller=="Cmspages") ||
	        				($action=="cmsPagesEdit" && $controller=="Cmspages") || 
	        				($action=="driversListing" && $controller=="Users") || 
	        				($action=="editDriver" && $controller=="Users") || 
	        				($action=="addDriver" && $controller=="Users") || 
	        				($action=="staffListing" && $controller=="Users") || 
	        				($action=="addStaff" && $controller=="Users") ||
	        				($action=="editStaff" && $controller=="Users") ||
	        				($action=="generateQrCode" && $controller=="Orders") ||
	        				($action=="driverCertificates" && $controller=="Users") ||
	        				($action=="addDriverCertificate" && $controller=="Users") ||
	        				($action=="rejectedOrders" && $controller=="Orders") ||
	        				($action=="agentDetail" && $controller=="Users") ||
	        				($action=="driverDetail" && $controller=="Users") || 
	        				($action=="enroutedOrders" && $controller=="Orders") || 
	        				($action=="enroutedOrderDetail" && $controller=="Orders") || 
	        				($action=="packageDetail" && $controller=="Orders") || 
	        				($action=="editDriverCertificate" && $controller=="Users")
	        		){
	        			return $this->redirect($this->Auth->redirectUrl());
	        		}

				}

				if($getUserDetail['role']==1){ // admin access rights
	        		if(
	        				($action=="driverCertificates" && $controller=="Users") ||
	        				($action=="addDriverCertificate" && $controller=="Users") ||
	        				($action=="ordersHistory" && $controller=="Orders") ||
	        				($action=="rejectedOrders" && $controller=="Orders") ||
	        				($action=="editDriverCertificate" && $controller=="Users") 
	        		){
	        			return $this->redirect($this->Auth->redirectUrl());
	        		}

				}

	        }
	   	}
	   	/************************ user redirect check as per user logged in end here *******************************/
         
    }

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
	public function initialize()
	{
		$this->loadComponent('Flash');
		$this->loadComponent('Auth', [
			'authorize' => ['Controller'], // Added this line
			'loginRedirect' => [
				'controller' => 'users',
				'action' => 'dashboard'
			],
			'logoutRedirect' => [
				'controller' => 'users',
				'action' => 'login',
				'home'
			],
			'Form' => [
			 'scope' => ['Users.status' => 0]
		   ]
		]);
		
		//GET Website Settings
		$this->loadModel('Settings');
		$settingsDetails = $this->Settings->get(1, ['contain' => [] ] );
		if(!empty($settingsDetails)){
			//General Settings
			define("SITE_TITLE",isset($settingsDetails->site_title)?$settingsDetails->site_title:"Sky2c");
			define("TEXT_LIMIT",isset($settingsDetails->input_text_limit)?$settingsDetails->input_text_limit:"60");
			define("SITE_OWNER_EMAIL",isset($settingsDetails->site_owner_email)?$settingsDetails->site_owner_email:"info@sky2c.com");
			define("NEW_USER_SKY2C",isset($settingsDetails->new_user_notification_email)?$settingsDetails->new_user_notification_email:"rahul.jain@mobilyte.com");
			
			//Msg Settings
			define("OTP_MESSAGE",isset($settingsDetails->otp_message)?$settingsDetails->otp_message:"You have initiated for reset password on sky2c that needs an OTP. Never share it with anyone.The OTP is ");
			define("LOGIN_MESSAGE",isset($settingsDetails->login_message)?$settingsDetails->login_message:"as login OTP. OTP is confidential. Sky2c never calls you asking for OTP. Never share it with anyone.");
			
			//FedEx Settings
			define("FEDEX_ACCESS_KEY",isset($settingsDetails->fedex_access_key)?$settingsDetails->fedex_access_key:"ZB8OKnGiWQyu8EYX");
			define("FEDEX_PASSWORD",isset($settingsDetails->fedex_password)?$settingsDetails->fedex_password:"e9iM0wntdwpSbNdNhUBEfQSz6");
			define("FEDEX_ACCOUNT_NUMBER",isset($settingsDetails->fedex_account_number)?$settingsDetails->fedex_account_number:"510087720");
			define("FEDEX_METER_NUMBER",isset($settingsDetails->fedex_meter_number)?$settingsDetails->fedex_meter_number:"118778822");
			
			//UPS Settings
			define("UPS_ACCESS_CODE",isset($settingsDetails->ups_access_code)?$settingsDetails->ups_access_code:"2D21A7373710C2C8");
			define("UPS_USER_ID",isset($settingsDetails->ups_user_id)?$settingsDetails->ups_user_id:"Sky2C38503");
			define("UPS_PWD",isset($settingsDetails->ups_password)?$settingsDetails->ups_password:"Newark@325");
			
			//Twilio Settings
			define("TWILIO_SID",isset($settingsDetails->twilio_sid)?$settingsDetails->twilio_sid:"ACd0c204ac545cca1d7efc1eff31853ff0");
			define("TWILIO_AUTHTOKEN",isset($settingsDetails->twilio_auth_token)?$settingsDetails->twilio_auth_token:"3c9521eafac2b68a697a67ee484a0298");
		}
		
		$AdminsModel = TableRegistry::get('Users');
		
		$admindata = $AdminsModel->find('all');
		$AllAdmins = $admindata->all()->first(); 
		$this->set('admins_info',$AllAdmins);

		$RolesModel = TableRegistry::get('Roles');
		$rolesdata = $RolesModel->find('all')->toArray();
		$rolesArr= array();
		
		foreach($rolesdata as $roledata){
			 $rolesArr[$roledata->id] = $roledata->role;
		}
		
		Configure::write('users.roles',$rolesArr);
		
		
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
	
	public function isAuthorized($user)
	{
		// Admin can access every action
		if ((isset($user['role']) && in_array( $user['role'], ['1', '2', '3','4','5']) ) && (isset($user['status']) && $user['status'] == "1")) {
			 return true;
		}
		//$this->Flash->error(__('Your account has been de-activated by admin.'));
		// Default deny
		return false;
	}

   
    public function beforeRender(Event $event)
    {
		
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
		 /* NOTIFICATION CODE START*/
		 
			$userRole = $this->Auth->user('role');
			$loggedInUserId = $this->Auth->user('id');
			$this->loadModel('UserLogs');
			$this->loadModel('Orders');
			$newNotifications='';
			$OldNotifications='';
			$newNotificationsCount=0;
							   
			$newNotifications = $this->UserLogs->find('all')
												  ->where(['UserLogs.notification_to'=>$loggedInUserId,'UserLogs.read_status'=>0])
												  ->order(['UserLogs.created_date' => 'DESC'])
												  ->contain(['sent_from'=> function($q) {
																return $q->autoFields(false)
																		->select([ 'id','role','name','email']);
															},
															'sent_to'=> function($q) {
																return $q->autoFields(false)
																		->select([ 'id','role','name','email']);
															}])
   											     ->hydrate(false)
   											     ->group(['UserLogs.order_id','UserLogs.notification_from'])
											     ->toArray();	
											     
			$OldNotifications = $this->UserLogs->find('all')
												  ->where(['UserLogs.notification_to'=>$loggedInUserId,'UserLogs.read_status'=>1])
												  ->order(['UserLogs.created_date' => 'DESC'])
												  ->contain(['sent_from'=> function($q) {
																return $q->autoFields(false)
																		->select([ 'id','role','name','email']);
															},
															'sent_to'=> function($q) {
																return $q->autoFields(false)
																		->select([ 'id','role','name','email']);
															}])
   											     ->hydrate(false)
   											     ->group(['UserLogs.order_id','UserLogs.notification_from'])
											     ->toArray();									     			   
			
			$newNotificationsCount = count($newNotifications);
			
			if($userRole != 4){
				$orderAction = base64_encode(convert_uuencode('open-orders'));
			}else{
				$orderAction = base64_encode(convert_uuencode('new-orders'));
			}
			
			$notification = '';
			$customNotification='';
			$old_not_red_url='javascript:void(0)';
			$red_url='javascript:void(0)';
			
			if(!empty($newNotifications) || !empty($OldNotifications)){
				$customNotification = '<ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">';
				if(!empty($newNotifications)){
					foreach($newNotifications as $new_notification){
						/*NOTIFICATION FOR Staff and Admin*/
						if(($userRole==1 || $userRole==3) && ($new_notification['notification_type']=='order')){
							$red_url = HTTP_ROOT.'orders/open-order-detail/'.base64_encode(convert_uuencode($new_notification['order_id']));
						}else if(($userRole==1 || $userRole==3)  && ($new_notification['notification_type']=='track')){
							$orders = $this->Orders->find('all')->select(['Orders.descrates_app_id'])->where(['Orders.id' => $new_notification['order_id']])->first();
							$red_url = HTTP_ROOT.'orders/track-order/'.$orders->descrates_app_id;
						}
						/*NOTIFICATION FOR Agent*/
						if($userRole==3 && ($new_notification['notification_type']=='order')){
							$orders = $this->Orders->find('all')->Where(['Orders.id' => $new_notification['order_id']])->contain(['OrderAssignments'])->select(['Orders.descrates_app_id','OrderAssignments.status_to'])->first();
							if(isset($orders->order_assignment->status_to) && $orders->order_assignment->status_to==1){
								$red_url = HTTP_ROOT.'orders/open-order-detail/'.base64_encode(convert_uuencode($new_notification['order_id']));
							}else if(isset($orders->order_assignment->status_to) && $orders->order_assignment->status_to==2){
								$red_url = HTTP_ROOT.'orders/assigned-order-detail/'.base64_encode(convert_uuencode($new_notification['order_id']));
							}else if(isset($orders->order_assignment->status_to) && $orders->order_assignment->status_to==3){
								$red_url = HTTP_ROOT.'orders/completed-order-detail/'.base64_encode(convert_uuencode($new_notification['order_id']));
							}	
							
						}else if($userRole==3 && ($new_notification['notification_type']=='track')){
							$orders = $this->Orders->find('all')->Where(['Orders.id' => $new_notification['order_id']])->contain(['OrderAssignments'])->select(['Orders.descrates_app_id','OrderAssignments.status_to'])->first();
							$red_url = HTTP_ROOT.'orders/track-order/'.$orders->descrates_app_id;
						}
						
						/*NOTIFICATION FOR Driver*/
						if($userRole==4 && ($new_notification['notification_type']=='order')){
							$orders = $this->Orders->find('all')->Where(['Orders.id' => $new_notification['order_id']])->contain(['OrderAssignmentLogs'])->select(['Orders.descrates_app_id','OrderAssignmentLogs.status'])->first();
							
							if(isset($orders->order_assignment_log->status) && $orders->order_assignment_log->status==1){
								$red_url = HTTP_ROOT.'orders/new-order-detail-driver/'.base64_encode(convert_uuencode($new_notification['order_id']));
							}else if(isset($orders->order_assignment_log->status) && $orders->order_assignment_log->status==2){
								$red_url = HTTP_ROOT.'orders/open-order-detail/'.base64_encode(convert_uuencode($new_notification['order_id']));
							}else if(isset($orders->order_assignment_log->status) && $orders->order_assignment_log->status==3){
								$red_url = HTTP_ROOT.'orders/completed-order-detail-driver/'.base64_encode(convert_uuencode($new_notification['order_id']));
							}else if(isset($orders->order_assignment_log->status) && $orders->order_assignment_log->status==4){
								$red_url = HTTP_ROOT.'orders/rejected-order-detail-driver/'.base64_encode(convert_uuencode($new_notification['order_id']));
							}	
							
						}else if($userRole==4 && ($new_notification['notification_type']=='track')){
							$orders = $this->Orders->find('all')->Where(['Orders.id' => $new_notification['order_id']])->contain(['OrderAssignmentLogs'])->select(['Orders.descrates_app_id','OrderAssignmentLogs.status'])->first();
							$red_url = HTTP_ROOT.'orders/track-order/'.$orders->descrates_app_id;
						}
						
						if( strpos(strtolower($new_notification['description']), "rejected") !== false ) {
							$clrCode = 'red_not';
						}else if( strpos(strtolower($new_notification['description']), "accepted") !== false ) {
							$clrCode = 'green_not';
						}else {
							$clrCode = 'grey_not';
						}
						$customNotification .='<li  class="'.$clrCode.' new_notification">
													<a href="'.$red_url.'">
														<span class="time">'.$this->humanTiming(strtotime($new_notification['created_date'])).'</span>
														<span class="details">
															<span class="label label-sm label-icon label-success">
																<i class="fa fa-bell-o"></i>
															</span> '.$new_notification['description'].'. </span>
													</a>
												</li>';
					}
				}
				
				if(!empty($OldNotifications)){
					foreach($OldNotifications as $old_notification){
						/*NOTIFICATION FOR Staff and Admin*/
						if(($userRole==1 || $userRole==3) && ($old_notification['notification_type']=='order')){
							$red_url = HTTP_ROOT.'orders/open-order-detail/'.base64_encode(convert_uuencode($old_notification['order_id']));
						}else if(($userRole==1 || $userRole==3)  && ($old_notification['notification_type']=='track')){
							$orders = $this->Orders->find('all')->select(['Orders.descrates_app_id'])->where(['Orders.id' => $old_notification['order_id']])->first();
							$red_url = HTTP_ROOT.'orders/track-order/'.$orders->descrates_app_id;
						}
						/*NOTIFICATION FOR Agent*/
						if($userRole==3 && ($old_notification['notification_type']=='order')){
							$orders = $this->Orders->find('all')->Where(['Orders.id' => $old_notification['order_id']])->contain(['OrderAssignments'])->select(['Orders.descrates_app_id','OrderAssignments.status_to'])->first();
							if(isset($orders->order_assignment->status_to) && $orders->order_assignment->status_to==1){
								$red_url = HTTP_ROOT.'orders/open-order-detail/'.base64_encode(convert_uuencode($old_notification['order_id']));
							}else if(isset($orders->order_assignment->status_to) && $orders->order_assignment->status_to==2){
								$red_url = HTTP_ROOT.'orders/assigned-order-detail/'.base64_encode(convert_uuencode($old_notification['order_id']));
							}else if(isset($orders->order_assignment->status_to) && $orders->order_assignment->status_to==3){
								$red_url = HTTP_ROOT.'orders/completed-order-detail/'.base64_encode(convert_uuencode($old_notification['order_id']));
							}	
							
						}else if($userRole==3 && ($old_notification['notification_type']=='track')){
							$orders = $this->Orders->find('all')->Where(['Orders.id' => $old_notification['order_id']])->contain(['OrderAssignments'])->select(['Orders.descrates_app_id','OrderAssignments.status_to'])->first();
							$red_url = HTTP_ROOT.'orders/track-order/'.$orders->descrates_app_id;
						}
						
						/*NOTIFICATION FOR Driver*/
						if($userRole==4 && ($old_notification['notification_type']=='order')){
							$orders = $this->Orders->find('all')->Where(['Orders.id' => $old_notification['order_id']])->contain(['OrderAssignmentLogs'])->select(['Orders.descrates_app_id','OrderAssignmentLogs.status'])->first();
							
							if(isset($orders->order_assignment_log->status) && $orders->order_assignment_log->status==1){
								$red_url = HTTP_ROOT.'orders/new-order-detail-driver/'.base64_encode(convert_uuencode($old_notification['order_id']));
							}else if(isset($orders->order_assignment_log->status) && $orders->order_assignment_log->status==2){
								$red_url = HTTP_ROOT.'orders/open-order-detail/'.base64_encode(convert_uuencode($old_notification['order_id']));
							}else if(isset($orders->order_assignment_log->status) && $orders->order_assignment_log->status==3){
								$red_url = HTTP_ROOT.'orders/completed-order-detail-driver/'.base64_encode(convert_uuencode($old_notification['order_id']));
							}else if(isset($orders->order_assignment_log->status) && $orders->order_assignment_log->status==4){
								$red_url = HTTP_ROOT.'orders/rejected-order-detail-driver/'.base64_encode(convert_uuencode($old_notification['order_id']));
							}	
							
						}else if($userRole==4 && ($old_notification['notification_type']=='track')){
							$orders = $this->Orders->find('all')->Where(['Orders.id' => $old_notification['order_id']])->contain(['OrderAssignmentLogs'])->select(['Orders.descrates_app_id','OrderAssignmentLogs.status'])->first();
							$red_url = HTTP_ROOT.'orders/track-order/'.$orders->descrates_app_id;
						}
						if( strpos(strtolower($old_notification['description']), "rejected") !== false ) {
							$clrCode = 'red_not';
						}else if( strpos(strtolower($old_notification['description']), "accepted") !== false ) {
							$clrCode = 'green_not';
						}else {
							$clrCode = 'grey_not';
						}
						$customNotification .='<li class="'.$clrCode.'">
													<a href="'.$old_not_red_url.'">
														<span class="time">'.$this->humanTiming(strtotime($old_notification['created_date'])).'</span>
														<span class="details">
															<span class="label label-sm label-icon label-success">
																<i class="fa fa-bell-o"></i>
															</span> '.$old_notification['description'].'. </span>
													</a>
												</li>';
					}
				}
				
				$customNotification .= '</ul>';
				
			}				
			
			$notification = '<li class="autoRefresh dropdown dropdown-extended dropdown-notification" id="header_notification_bar" >
								<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
									<i class="icon-bell"></i>
									<span class="badge badge-default">'.$newNotificationsCount.'</span>
								</a>
								<ul class="dropdown-menu">
									<li class="external">
										<h3>
											<span class="bold">'.$newNotificationsCount.' pending</span> notifications</h3>
										<a href="'.HTTP_ROOT.'users/auto-notification/">view all</a>
									</li>
									<li>
										'.$customNotification.'
									</li>
								</ul>
							</li>';
			
			
        /* NOTIFICATION CODE END*/
        $this->set('notification', $notification); 
    }

	
	
	/**
		* Function for Upload Image
	*/
	function upload_file($type = NULL, $FileArr = array()){
				
		$this->loadComponent('Resize');
		$this->viewBuilder()->layout('');
		$this->autoRender=false;
    
		if($FileArr['name']!="")
		{

			if($type == 'logo'){
					
				$uploadFolder="uploads";  
				$logoWidth = "183";
				$logoHeight = "42";
				$logoSize="2097152";
				$logoKb = '2 MB';
				
			}else if($type == 'favicon'){
				
				$uploadFolder="uploads";  
				$logoWidth = "24";
				$logoHeight = "25";
				$logoSize="2097152";
				$logoKb = '2 MB';
				
			}else if($type == 'profilePic'){
				
				$uploadFolder="uploads";  
				$logoWidth = "400";
				$logoHeight = "400";
				$logoSize="4194304";
				$logoKb = '4 MB';
			
			}else if($type == 'customerSignature'){
				
				$uploadFolder="uploads";  
				$logoWidth = "600";
				$logoHeight = "600";
				$logoSize="4194304";
				$logoKb = '4 MB';
			}else if($type == 'documentImg'){
				
				$uploadFolder="drivers_documents";  
				$logoWidth = "400";
				$logoHeight = "400";
				$fileSize="10000000";
				$logoKb = '10 MB';
				$extenstionArr = array('jpg','jpeg','png','gif','bmp','docx','doc','pdf');
        
				$imgName = pathinfo($FileArr['name']);
				$file = $FileArr;
				$fileName = $FileArr['name'];
				$ext = strtolower(trim(substr($fileName, strrpos($fileName,'.')))); 
				$explodeExt = explode('.',$fileName);
				$explodeExt =  end($explodeExt); 
        
				if(in_array($explodeExt,$extenstionArr)){
					
					if($FileArr['size'] <= $fileSize)
					{
						$fileName = $this->RandomStringGenerator(15);
						$destination = realpath('../webroot/img/'.$uploadFolder).'/'.$fileName.$ext;
						$src = $FileArr['tmp_name'];
									
						if(move_uploaded_file($FileArr['tmp_name'],$destination))
						{
						  $return = "success:".$fileName.$ext.":uploaded";
						  return $return;
						}
					}else{
						$return = "error:File size should be less than $fileKb";
						return $return;
					}
				}else{
					
					$extenstionArr = implode(',',$extenstionArr);
					$return = "error:Only ".strtoupper($extenstionArr)." files are allowed!";
					return $return;exit();
				}
        
			}else if($type == 'orderFile'){
				
				$uploadFolder="upload_xml_order_files_new";  
				$fileSize="10000000";
				$logoKb = '10 MB';
				$extenstionArr = array('xml');
        
				$imgName = pathinfo($FileArr['name']);
				$file = $FileArr;
				$fileName = $FileArr['name'];
				$ext = strtolower(trim(substr($fileName, strrpos($fileName,'.')))); 
				$explodeExt = explode('.',$fileName);
				$explodeExt =  end($explodeExt); 

        
				if(in_array(strtolower($explodeExt),$extenstionArr)){					
					
					if($FileArr['size'] <= $fileSize)
					{
						$destination = realpath('../webroot/'.$uploadFolder).'/'.$fileName;
						$src = $FileArr['tmp_name'];
									
						if(move_uploaded_file($FileArr['tmp_name'],$destination))
						{
						  $return = "success:".$fileName.":uploaded";
						  return $return;
						}
					}else{
						
						$return = "error:File size should be less than $fileKb";
						return $return;
					}
				
				}else{				
					$extenstionArr = implode(',',$extenstionArr);
					$return = "error:Only ".strtoupper($extenstionArr)." files are allowed!";
					return $return;exit();
				}
				
			}else if($type == 'audio' || $type == 'video'){
        
				$imgName = pathinfo($FileArr['name']);
				$file = $FileArr;
				$fileName = $FileArr['name'];
				$ext = trim(substr($fileName, strrpos($fileName,'.')));
				
				$explodeExt = explode('.',$fileName);
				$explodeExt =  end($explodeExt);
				
				if($type == 'audio')
				{
				  $uploadFolder= "files/audio"; 
				  $fileSize= "5242880";
				  $fileKb = "5 MB";
				  $extCheckArr = array('mp3','ogg','wma');  

				}else{

				  $uploadFolder="files/video";  
				  $fileSize= "10485760";//"52428800"; 
				  $fileKb = '10 MB'; //"50 MB"; 
				  $extCheckArr = array('mp4','ogg','wmv');  
				}
        
				if(in_array($explodeExt,$extCheckArr)){
				  
					if($FileArr['size'] <= $fileSize){
					  
						$fileName = $this->RandomStringGenerator(15);
						$destination = realpath('../webroot/'.$uploadFolder).'/'.$fileName.$ext;
						$src = $FileArr['tmp_name'];
								
						//echo "path".$destination;die;
						if(move_uploaded_file($FileArr['tmp_name'],$destination)){
						
						  $return = "success:".$fileName.$ext.":uploaded";
						  return $return;
					  
						}
				  
					}else{
						$return = "error:File size should be less than $fileKb";
						return $return;
					}
				}else{
				  
				  $extCheckStr = implode(',',$extCheckArr);
				  $return = "error:Only ".strtoupper($extCheckStr)." files are allowed!";
				  return $return;exit();
				}
			}else{
				
				$uploadFolder="uploads";  
				$logoWidth = "400";
				$logoHeight = "400";
				$logoSize="2097152";
				$logoKb = "2 MB";
			  }
      
      
      
		  $imgName = pathinfo($FileArr['name']);
		  $file = $FileArr;
		  $image = $FileArr['name'];
		  $ext = trim(substr($image, strrpos($image,'.')));
		  
		  $explodeExt = explode('.',$image);
		  $explodeExt =  end($explodeExt);
		  
		  $explodeExt = strtolower($explodeExt);
		  if($explodeExt=='jpg' || $explodeExt=='jpeg' || $explodeExt=='png' || $explodeExt=='gif' || $explodeExt=='bmp')
		  {
			
			if($FileArr['size'] <= $logoSize)
			{
			  $image = $this->RandomStringGenerator(15);
			  $destination = realpath('../webroot/img/'.$uploadFolder).'/'.$image.$ext;
			  $src = $FileArr['tmp_name'];
			  list( $width, $height, $source_type ) = getimagesize($src); 
			  
			  if($width == $logoWidth && $height == $logoHeight)
			  {
				
				move_uploaded_file($FileArr['tmp_name'],$destination);
				$imgStatus = 1;
				
			  }else{
				
				$this->Resize->resize($FileArr['tmp_name'],$destination,'as_define',$logoWidth,$logoHeight,0,0,0,0);
				$imgStatus = 2;
			  }
			  
			  if($imgStatus == 1)
			  {
				$return = "success:".$image.$ext.":uploaded";
				return $return;
			  }else{
				$return = "success:".$image.$ext.":resize";
				return $return;
			  }
			}else
			{
			  $return = "error:File size should be less than $logoKb";
			  return $return;
			}
		  }else{
			$return = "error:Only JPG, PNG, BMP or GIF files are allowed!";
			return $return;
		  }
    
		}else{
		  $return = "error:Some error occured while saving to the database!";
		  return $return;
		}
	  }

   

  /**
  * Common mail function
  */  

  function send_email($process = "", $replace_fields = array(), $replace_with = array(), $email_template = null, $to = null, $extraTemplate = null )
  {

   $EmailsModel = TableRegistry::get('EmailTemplates');  
   $getTemplateData = $EmailsModel->find('all',['conditions' => ['EmailTemplates.alias' => trim($email_template) ] ] );


   $template =  $getTemplateData->first();
    
    if ($extraTemplate != '')
    {
      $template_data = $extraTemplate;
    }
    else
    {
      $template_data = $template->description;    
    }
    
    $replace_fields = array_merge($replace_fields, array('/img/logo.png','/img/front/mobile_nav_logo.png'));
    $logoSrc = HTTP_ROOT.'img/logo.jpg';
    
    $replace_with = array_merge($replace_with, array($logoSrc,$logoSrc));
    $template_info = str_replace($replace_fields,$replace_with,$template_data);
    
    if($_SERVER['HTTP_HOST']=='localhost')
    { 
      //echo $template_info; die;
    }
      $SmtpSettingsModel = TableRegistry::get('SmtpSettings');
      $smtpData = $SmtpSettingsModel->find('all')->first();
    /*
      $from_email    =  $smtpData->from_email;
      $from_name      = $smtpData->from_name;
      $smtp_port      = $smtpData->smtp_port;
      $smtp_secure    = $smtpData->smtp_secure;
      $smtp_auth      = $smtpData->smtp_auth;
      $smtp_host      = $smtpData->smtp_host;
      $username       = $smtpData->username;
      $password       = $smtpData->password;
       
         // Sample smtp configuration.
        Email::configTransport('gmailSMTP', [
            'className' => 'SMTP',
            //The following keys are used in SMTP transports
            'host' => $smtp_host,
            'port' => $smtp_port,
            'username' => $username,
            'password' => $password,
            'timeout' => 30,
            'client' => null,
            'tls' => true,
            'url' => env('EMAIL_TRANSPORT_DEFAULT_URL', null),
        ]);
    $this->Email = new Email();
*/
    
   
    $customSubject = ($template->subject !='')?$template->subject:"Sky2c Frieght Systems Inc.";
    if($to !=""){
		
		$this->loadModel('EmailCrons');
		$userDetail = $this->EmailCrons->newEntity();
		$userDetail->to_email = $to;
		$userDetail->email_subject = $customSubject;
		$userDetail->email_content = $template_info;
		$userDetail->status = 'pending';
		if($this->EmailCrons->save($userDetail)){
			return true;
		}
		/*
		try { 
        
				$res = $this->Email->from(['rahul.jain@mobilyte.com' => "Sky2c Frieght"])
			  ->emailFormat('both') 
					  ->to($to)
					  ->subject($customSubject)                   
					  ->send($template_info);
		} 
		catch (Exception $e) 
		{
		  echo 'Exception : ',  $e->getMessage(), "\n";
		}*/
	}else{
		return true;
	} 
    
  }
  
	
  function randomGenerater($flag = null){
       $randomCode  = mt_rand(100000, 999999);
       return $randomCode;
        
  } 
  function countryCodes(){
 	$this->loadModel("CountryCodes");
  	$countries = $this->CountryCodes->find('all', array(
	    'fields' => array('CountryCodes.iso', 'CountryCodes.phonecode','CountryCodes.id'),  
	    'order' => array('CountryCodes.iso' => 'ASC')
	))->toArray();
	
    foreach($countries as $key=>$val){
        $country_info[$i]['id']        = $val['id'];
        $country_info[$i]['phonecode'] = $val['phonecode']; 
        $country_info[$i]['iso']       = $val['iso']; 
        $i++;
    }
    return $country_info; 
  }

  // get country code by country ID 
  function countryPhoneCode($iso){
  	$countryPhoneCode = "";
  	if($iso!=""){
 		$this->loadModel("CountryCodes");
	  	$countries = $this->CountryCodes->find('all', array(
		    'fields' => array('CountryCodes.iso', 'CountryCodes.phonecode','CountryCodes.id'),  
		    'conditions' => array('CountryCodes.iso'=>$iso)
		))->toArray();
		
	    foreach($countries as $key=>$val){
	        $countryPhoneCode        = $val['phonecode'];
	    }
	}
    return $countryPhoneCode; 
  }
  //For send message
  function sendMessages($to_mobile_number=null, $message_body=null , $country_code=null){
	  
    /*CHECK THAT PHONE NUMBER IS USA OR NOT, IF USA PHONE NUMBER EXISTS INTO REQUEST THEN WE HAVE TO USE BANDWIDTH API OTHERWISE USE TWILIO*/
     
        //INCLUDE TWILIO LIABRARY
        require_once(ROOT . DS  . 'vendor' . DS  . 'twilio-php-master' . DS . 'Services' . DS . 'Twilio.php');
        //CREATE STRIPE OBJECT
        $client = new \Services_Twilio('AC9e715cb1dc8c61fb60db34df298cca5d', '2832aea30f0558592c9d1e7a05907d6e'); 
                
        //SEND MESSAGE VIA TWILIO API CALL
        //echo "to mobile number".$to_mobile_number."message body".$message_body."Country code".$country_code;die;
		if($country_code !=""){
			$country_code = str_replace("+","",$country_code);
		}
		
		if($country_code !="" && $to_mobile_number !=""){
			try {
			  $output = $client->account->messages->create(array( 
				'From' => '+15107571256', 
				'To' => '+'.$country_code.$to_mobile_number,
				'Body' => $message_body
			  ));
		   
			}
			catch (\Exception $e) { 
				// echo "<pre>"; print_r($e); die;  
				 //echo "Twilio on trial mode, So message will not be send on registered mobile number";die;
			}
		}else{
			return true;
		}
        
		return $to_mobile_number;
		
		
  }
  
	function RandomStringGenerator($length = 10)
	{              
	  $string = "";
	  $pattern = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890";
		for($i=0; $i<$length; $i++)
		{
			$string .= $pattern{rand(0,61)};
		}
		return $string;
	}
	
	function humanTiming ($time)
	{

		$time = time() - $time; // to get the time since that moment
		$time = ($time<1)? 1 : $time;
		$tokens = array (
			31536000 => 'year',
			2592000 => 'month',
			604800 => 'week',
			86400 => 'day',
			3600 => 'hour',
			60 => 'minute',
			1 => 'second'
		);

		foreach ($tokens as $unit => $text) {
			if ($time < $unit) continue;
			$numberOfUnits = floor($time / $unit);
			return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
		}

	}
	
	function isUniqueEmailAjax($email=null){ 
		
		// Loaded EmailTemplate Model
		$UsersModel = TableRegistry::get('Users');
		if(@$_GET['email']!='')
		{
			$email = $_GET['email'];
		}
		$getTemplateData = $UsersModel->find('all',['conditions' => ['Users.email' => $email]])->count();
		
		if ($getTemplateData > 0) {
			 $ret = 'false';
		} else { 
			 $ret = 'true';
		}
		
		if($this->request->is('ajax')){
			echo $ret;die;
		
		}else{
			return $ret;
		
		}
	}
	
	function isOrderExists($email=null){ 
		
		// Loaded EmailTemplate Model
		$OrdersModel = TableRegistry::get('Orders');
		if(@$_GET['order_id']!=''){
			
			$order_id = $_GET['order_id'];
		}
		
		$getOrderData = $OrdersModel->find('all',['conditions' => ['Orders.descrates_app_id' => $order_id]])->count();
		
		if($getOrderData <= 0){
			 $ret = 'false';
		}else{ 
			 $ret = 'true';
		}
		
		if($this->request->is('ajax')){
			echo $ret;die;
		
		}else{
			return $ret;
		
		}
	}
	
	function isUniqueUsernameAjax($username=null){ 
		
		// Loaded EmailTemplate Model
		$UsersModel = TableRegistry::get('Users');
		if(@$_GET['username']!='')
		{
			$username = $_GET['username'];
		}
		$getTemplateData = $UsersModel->find('all',['conditions' => ['Users.username' => $username]])->count();
		
		if ($getTemplateData > 0) {
			 $ret = 'false';
		} else { 
			 $ret = 'true';
		}
		
		if($this->request->is('ajax')){
			echo $ret;die;
		
		}else{
			return $ret;
		
		}
	}

	function parse_xml_into_array($xml)
	{
		$obj = SimpleXML_Load_String($xml);
		if ($obj === FALSE) return $xml;

		// GET NAMESPACES, IF ANY
		$nss = $obj->getNamespaces(TRUE);
		if (empty($nss)) return $xml;

		// CHANGE ns: INTO ns_
		$nsm = array_keys($nss);
		foreach ($nsm as $key)
		{
			// A REGULAR EXPRESSION TO MUNG THE XML
			$rgx
			= '#'               // REGEX DELIMITER
			. '('               // GROUP PATTERN 1
			. '\<'              // LOCATE A LEFT WICKET
			. '/?'              // MAYBE FOLLOWED BY A SLASH
			. preg_quote($key)  // THE NAMESPACE
			. ')'               // END GROUP PATTERN
			. '('               // GROUP PATTERN 2
			. ':{1}'            // A COLON (EXACTLY ONE)
			. ')'               // END GROUP PATTERN
			. '#'               // REGEX DELIMITER
			;
			// INSERT THE UNDERSCORE INTO THE TAG NAME
			$rep
			= '$1'          // BACKREFERENCE TO GROUP 1
			. '_'           // LITERAL UNDERSCORE IN PLACE OF GROUP 2
			;
			// PERFORM THE REPLACEMENT
			$xml =  preg_replace($rgx, $rep, $xml);
		}
		return $xml;
	}
	
	function getNotificationBadgesCount($loggedInUserId){
			
		  	
		  $this->loadModel('UserLogs');
		  $newNotificationsCount=0;
		  $data = []; 
		  $newNotifications = $this->UserLogs->find('all')
							  ->where(['UserLogs.notification_to'=>$loggedInUserId,'UserLogs.read_status'=>0])
							  ->count();
		
		return $newNotifications;	
	}	
	
	function readNotification($orderID,$userID=null){
		/*Update Data into log table Start*/
		$userLogs = TableRegistry::get('userLogs');
		if($userID !=null){
			$loggedInUserId = $userID;
		}else{
			$loggedInUserId = $this->Auth->user('id');
		}
		
		$query = $userLogs->query();
		$query->update()
			->set(['read_status' => 1])
			->where(['notification_to' => $loggedInUserId,'order_id' => $orderID])
			->execute();
		return true;	
	}
	
	function getUserById($userId){
		$user = $this->Users->find('all',['conditions' => ['Users.id' => $userId]]);
		$userData = $user->first();
		if(!empty($userData)){
			return $userData;
		}
		
	}
	
	
}
