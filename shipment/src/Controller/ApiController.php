<?php
// src/Controller/UsersController.php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Network\Email\Email;
use Cake\Core\Configure;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

use Cake\Validation\Validation;

require_once(ROOT . DS  . 'vendor' . DS  . 'firebase' . DS . 'Firebase.php');
use Firebase;

class ApiController extends AppController
{

    public function beforeFilter(Event $event){
		
        parent::beforeFilter($event);
       
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
       
        $this->Auth->allow(['register' , 'login' , 'forgotPassword' , 'verifyForgotPassword' , 'resetPassword' , 'changePassword', 'getProfile', 'editProfile' ,'verifyOtp','acceptAgreement','getOrders','termsAndConditions' , 'resendOtp' , 'resendCodeForgotPassword' , 'getOrderDetail' , 'getProductDetail' , 'checkMessage' , 'getDrivers' , 'assignProduct' , 'getProviders' , 'assignProducts' , 'countryCodes' , 'addDriver' , 'changeDriverStatus' , 'changeProductsStatus' , 'scannedOrderInfo' , 'userNotifications' , 'testFirebase' , 'documentApproveStatus', 'addEditCertificates', 'getCertificates', 'deleteCertificates','trackOrder','checkOrderAssignmentStatus','getAddresByLatLong','markAsComplete']);
       
        /**
        **************
        * Check authetication using auth key
        **************
        */
        $this->loadModel('AuthKeys');
        $AuthKeyData = $this->AuthKeys->find('all')->first();

        $kayVal = $this->request->header('key');
        if($kayVal != $AuthKeyData->key){
           
             $resultJ = json_encode(array( 'status' => 301, 'message' => "Invalid API Key" ));
             echo $resultJ;die;
        }
        
    }

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');

        $this->loadModel('Users');
    }

    /**
   *********************************************************************
   *  Function Name : check_empty() .
   *  Functionality : check data validation
   *********************************************************************
   **/
   private function check_empty( $data, $message = '', $numeric = false )
   {
        $message = ( !empty( $message ) ) ? $message : 'Invalid data';
        if( empty( $data ) )
          {

            $resultJ = json_encode(array( 'status' => 301, 'message' => $message ));
            $this->json_response($resultJ);
             
          }
          if( $numeric )
          {
            if( !numeric( $data ) )
            {
              $resultJ = json_encode(array( 'status' => 301, 'message' => $message ));
              $this->json_response($resultJ);

            }
          }
    }
	
	/*
	   private function is_number( $data, $message = '', $numeric = false )
	   {
			  // if( $numeric )
			  {
				if(  )
				{
				  $resultJ = json_encode(array( 'status' => 301, 'message' => $message ));
				  $this->json_response($resultJ);

				}
			  }
		}
	*/

    function dateNow($timeZone = "UTC"){
            //date_default_timezone_set("America/Los_Angeles");
            $dateNow = date("Y-m-d H:i:s");
            return $dateNow;
    } 
    function hasherGenerater($value = null){
             $hasher = new DefaultPasswordHasher();
             $value = $hasher->hash($value);
            return $value;
    }
  
    /**
    *********************************************************************
    *  Function Name : json_response() .
    *  Functionality : return json response
    *********************************************************************
    **/
    public function json_response($resultJ = null){
            
            $this->response->type('json');
            $this->response->body($resultJ);
            echo  $this->response;die;
           // return $this->response;
    }

    public function index()
    {
       $recipes = $this->Users->find('all')->toArray();
        return $this->set([
            'recipes' => $recipes,
            '_serialize' => ['recipes']
        ]);
    }

    public function view($id)
    {
        $recipe = $this->Recipes->get($id);
        $this->set([
            'recipe' => $recipe,
            '_serialize' => ['recipe']
        ]);
    }
    
    function checkMessage(){

       //Start Send message on mobile
		$to_mobile_number = "9888069373";//$userInfo->phone;
		$message_body = "Your OTP 123456 for login verification on sky2c";
		$country_code = "91";//$userInfo->country_code;
		$this->sendMessages($to_mobile_number , $message_body , $country_code);
		//End send message 
    }
    
    function testFirebase(){
          $data['agent_id'] = 43;
          //Notification data
          
          $params = [
              'type' => 'assinOrder', 
              'topic' => 'sky2c'.$data['agent_id'],
              //'walk_id' => $data['data']['id'],
              'notifyId' => $data['agent_id']
          ];
          $message = 'Order has been assign successfully.';

          $firebase = new Firebase();
          $firebase->firebaseCloudMessage($params,$message); 
          //End
    }
    
  /**
   *********************************************************************
   *  Function Name : login() .
   *  Functionality : login for agent and driver with email or login with phone for driver
   *********************************************************************
  **/
    public function login(){
		
        $this->autoRender = false; //avoid to render view

		if ($this->request->is('post')) {
			
			$loginUser = isset($this->request->data['loginUser']) ? $this->request->data['loginUser'] : "";
			$isLoginWith = isset($this->request->data['isLoginWith']) ? $this->request->data['isLoginWith'] : "";
			$userId = isset($this->request->data['email']) ? $this->request->data['email'] : "";
			$password = isset($this->request->data['password']) ? $this->request->data['password'] : "";
			
			//CHECK USER IS DRIVER OR STAFF
			if($loginUser == 4 || $loginUser == 2){
				//CHECK USER TRYING TO LOGIN WITH EMAIL-PASSWORD
				if($isLoginWith == 2){
					  $this->check_empty($password, 'Please add password');
					  $this->check_empty($userId, 'Please add email');
					  
					  //$userInfo = $this->Users->find('all',['conditions' => ['Users.email' => $userId,'Users.role IN' => [2,3,4]]])->first();

            $userInfo = $this->Users->find('all',array(
              'conditions' => array(
                'Users.role IN' => [2,3,4],
                'OR'=>array(
                  'Users.email' => $userId,
                  'Users.username' => $userId
                )
              )
            ))->first();
            $userId = $userInfo->email;
					
						if ((new DefaultPasswordHasher)->check($password, $userInfo->password)) {
						}else{		
							$resultJ = json_encode(array('status' => '301' , 'message' => 'Please enter valid credential.'));
							$this->json_response($resultJ);
						}
				//CHECK USER IS TRYING TO LOGIN WITH MOBILE NUMBER	  
				}else{
					
					  $this->check_empty($userId, 'Please add mobile number');
					  $userInfo = $this->Users->find('all',['conditions' => ['Users.phone' => $userId]])->first();
					  
				}
				$this->check_empty($isLoginWith, 'Please add isLoginWith');
			
			}else{
				
				$this->check_empty($password, 'Please add password');
				$this->check_empty($userId, 'Please add email');
				
        //$userInfo = $this->Users->find('all',['conditions' => ['Users.email' => $userId]])->first();
        $userInfo = $this->Users->find('all',array(
          'conditions' => array(
            'OR'=>array(
              'Users.email' => $userId,
              'Users.username' => $userId
            )
          )
        ))->first();
        $userId = $userInfo->email;

				if ((new DefaultPasswordHasher)->check($password, $userInfo->password)) {
				}else{		
					$resultJ = json_encode(array('status' => '301' , 'message' => 'Please enter valid credential.'));
					$this->json_response($resultJ);
				}
			}
			
			$this->check_empty($loginUser, 'Please add loginUser');
			
			
				if($userInfo->role==2){
					$loginUser = $userInfo->role;
				}
				 //1 for mobile login and 2 with email or username
				if($isLoginWith == 1){
					//$randomCode = $this->randomGenerater();
					//$randomCode = hasherGenerater($randomCode);
					
					$userInfo = $this->Users->find('all',['conditions' => ['Users.phone' => $userId,'Users.role IN' => [2,4]]])->first();
					if(count($userInfo)>0){
						
						//$randomCode = 123456;
						$randomCode = $this->randomGenerater();
						$dateNow = $this->dateNow("UTC");
						$this->Users->updateAll(['OTP' => $randomCode , 'otp_requested' => $dateNow , 'otp_limit_exceeded' => 0, 'forgot_password_limit_exceeded' => 0], ['phone' => $userId]);

						if(!empty($userInfo)){
							//Check user banned
							$this->checkUserSuspend($userInfo->id);

							//Start Send message on mobile
							
							//End send message 
							
							if($userInfo->phone  !="" && $userInfo->country_code !=""){
								//Start Send message on mobile
								$to_mobile_number = $userInfo->phone;
								$message_body =  "Use ".$randomCode." ".LOGIN_MESSAGE;
								$country_code = $userInfo->country_code;
								$this->sendMessages($to_mobile_number , $message_body , $country_code);
								//End send message 
							} 
							
							$data['user_id'] = $userInfo->id;
							$data['role'] = $userInfo->role;
							$resultJ = json_encode(array('status' => '200' , 'message' => 'OTP has been sent successfully','data' => $data));
						}else{
							 $resultJ = json_encode(array('status' => '301' , 'message' => 'Please enter valid mobile number.'));
						}
						
					}else{
						 $resultJ = json_encode(array('status' => '301' , 'message' => 'Please enter valid credential.'));
					}
					
				}else{
					$userInfo = $this->Users->find('all',['conditions' => ['Users.email' => $userId,'Users.role IN' => [2,3,4]]])->first();

					
					if(count($userInfo)>0){
            
            $user = $userInfo ;
						//Check user banned
						if(!empty($userInfo)){
							$this->checkUserSuspend($userInfo->id);
						}
						
						/*$this->Auth->config('authenticate', [
							'Form' => [
								'fields' => ['username' => 'email']
							]
						]);*/
						//$this->Auth->constructAuthenticate();
						//$user = $this->Auth->identify();
						

						if($user){
							if (($user['role'] == 2 || $user['role'] == 3 || $user['role'] == 4) && ($loginUser == $user['role'])){
								
								$data['user_id'] = $user['id'];
								$data['profile_image'] = !empty($user['profile_image']) ? HTTP_ROOT.'img/uploads/'.$user['profile_image']:"";
								$data['username'] = $user['username'];
								$data['name'] = $user['name'];
								$data['email'] = $user['email'];
								$data['phone'] = $user['phone'];
								$data['role'] = $user['role'];
								$data['agreement_accept'] = $user['agreement_accept'];
								$data['terms_and_conditions'] = HTTP_ROOT.'cmspages/terms-and-conditions';
								$data['terms_and_conditions_pdf'] = HTTP_ROOT.'terms.pdf';
								//end admin auth
								$this->Users->updateAll(['otp_limit_exceeded' => 0 , 'forgot_password_limit_exceeded' => 0], ['id' => $user['id']]);

								$resultJ = json_encode(array('status' => '200' , 'message' => 'Login successfully', 'data' => $data));
							}else{
								$resultJ = json_encode(array('status' => '301' , 'message' => 'Invalid user.'));
							}
						 }else{
								$resultJ = json_encode(array('status' => '301' , 'message' => 'Please enter valid credential.'));
						 }
					}else{
						$resultJ = json_encode(array('status' => '301' , 'message' => 'invalid role.'));
					}
					
				}
			
			$this->json_response($resultJ);
        }
    }
    /**
       *********************************************************************
       *  Function Name : acceptAgreement() .
       *  Functionality : Accept Sky2c terms and conditions
       *********************************************************************
    **/
    function acceptAgreement(){
       if ($this->request->is('post')) {
            $userId = isset($this->request->data['user_id']) ? $this->request->data['user_id'] : "";
			
            //Check user exist status
            $this->checkUserId($userId);

            $this->Users->updateAll(['agreement_accept' => "1"], ['id' => $userId]);
            $userInfo = $this->Users->find('all',['conditions' => ['Users.id' => $userId]])->first();
          
            if($userInfo->agreement_accept == 1){
                $resultJ = json_encode(array('status' => '200' , 'message' => 'Thanks for accepting Agent\'s Terms and Conditions.'));
            }else{
                $resultJ = json_encode(array('status' => '301' , 'message' => 'Something went wrong'));
            }   
           $this->json_response($resultJ);
        }
    }
     /**
       *********************************************************************
       *  Function Name : verifyOtp() .
       *  Functionality : Verify otp
       *********************************************************************
    **/
    function verifyOtp(){
       if ($this->request->is('post')) {
          $userId = isset($this->request->data['user_id']) ? $this->request->data['user_id'] : "";
          $OTP = isset($this->request->data['OTP']) ? $this->request->data['OTP'] : "";
			
		  $this->check_empty($userId, 'Please add user_id');
          $this->check_empty($OTP, 'Please add OTP');
          
            //Check user exist status
            $this->checkUserId($userId);
            
            $dateNow = $this->dateNow("UTC");
            
            $time = strtotime($dateNow);
            $time = $time - (15 * 60);
            $dateBefore = date("Y-m-d H:i:s", $time);

          /* $OTP = hasherGenerater($OTP);*/
          

          $user = $this->Users->find('all',['conditions' => ['Users.id' => $userId , 'Users.OTP' => $OTP]]);

          $getUserData =  $user->first();

            if(!empty($getUserData)){
                   
                  $checkExpire = $this->Users->find('all',['conditions' => ['Users.id' => $userId , 'Users.OTP' => $OTP , 'otp_requested > ' => $dateBefore]]);
                  $getData =  $checkExpire->first();
                  
                  if(empty($getData)){
                        $resultJ = json_encode(array('status' => '301' , 'message' => 'Your code has been expire, Please try another.'));
                        $this->json_response($resultJ);
                  }

                   $userData = $this->Users->newEntity();
                   $userData->id = $userId;
                   $userData->OTP = null;
                   $userData->otp_requested = null;
                  
                    $this->Users->save($userData);
                    
                    $data['profile_image'] = !empty($getUserData['profile_image']) ? HTTP_ROOT.'img/uploads/'.$getUserData['profile_image']:"";
                    $data['username'] = $getUserData['username'];
                    $data['name'] = $getUserData['name'];
                    $data['email'] = $getUserData['email'];
                    $data['phone'] = $getUserData['phone'];
                    $data['role'] = $getUserData['role'];
                    $data['agreement_accept'] = $getUserData['agreement_accept'];
                    $data['terms_and_conditions'] = HTTP_ROOT.'cmspages/terms-and-conditions';
                    $data['terms_and_conditions_pdf'] = HTTP_ROOT.'terms.pdf';

                    $resultJ = json_encode(array('status' => '200' , 'message' => 'OTP has been verified','data' => $data));
              
            }else{
                $resultJ = json_encode(array('status' => '301' , 'message' => 'Please enter valid OTP.'));
            }
            $this->json_response($resultJ);
        }
    }
    /**
       *********************************************************************
       *  Function Name : resendOtp() .
       *  Functionality : resendOtp
       *********************************************************************
    **/
    function resendOtp(){
		
       if ($this->request->is('post')) {
		   
            $userId = isset($this->request->data['user_id']) ? $this->request->data['user_id'] : "";
            $this->check_empty($userId, 'Please add user_id');
            
           
            //Check suspend status
            $this->checkUserSuspend($userId);
          
            $user = $this->Users->get($userId);
          
            if($user->otp_limit_exceeded >= 3){
                $resultJ = json_encode(array('status' => '302' , 'message' => 'Resend code attempts limit exceeds'));
            }else{  
                //$randomCode = $this->randomGenerater();
                //$randomCode = hasherGenerater($randomCode);
                $randomCode = $this->randomGenerater();
                $dateNow = $this->dateNow("UTC");

                $this->Users->updateAll(['new_pass_key' => $randomCode , 'new_password_requested' => $dateNow , 'OTP' => $randomCode , 'otp_requested' => $dateNow , 'otp_limit_exceeded' => (($user->otp_limit_exceeded) + 1)], ['id' => $userId]);
                
                /*SEND MOBILE MESSAGES START*/
               
					
                  //Email send 
                    $replace = array('{user}','{code}');
                    $with = array($user->username, $randomCode);
                    //Send email function
                    if($user->email !=""){
						$this->send_email('',$replace,$with,'resend_code_api',$user->email);
					}
                    

                    $resultJ = json_encode(array('status' => '200' , 'message' => 'OTP has been sent on mobile successfully.'));
                    /*SEND MOBILE MESSAGES START*/
					if($user->phone  !="" && $user->country_code !=""){
						//Start Send message on mobile
						$countryCode = $user->country_code;
						$phone = $user->phone;
						$msg = RESEND_OTP_MESSAGE.$randomCode;
						$this->sendMessages($phone,$msg,$countryCode);
						//End send message 
					}
            }
            $this->json_response($resultJ);
        }    
    }
    /**
       *********************************************************************
       *  Function Name : resendCodeForgotPassword() .
       *  Functionality : resendCodeForgotPassword
       *********************************************************************
    **/
    function resendCodeForgotPassword(){
       if ($this->request->is('post')) {
            $userId = isset($this->request->data['user_id']) ? $this->request->data['user_id'] : "";
            
            $this->check_empty($userId, 'Please add user_id');
            //Check suspend status
            $this->checkUserSuspend($userId);
          
            $user = $this->Users->get($userId);
             
            if($user->forgot_password_limit_exceeded >= 3){
                   $resultJ = json_encode(array('status' => '302' , 'message' => 'Resend code attempts limit exceeds'));
            }else{  
				
               // $randomCode = $this->randomGenerater();
                //$randomCode = hasherGenerater($randomCode);
                $randomCode = 123456;
                $dateNow = $this->dateNow("UTC");
                        
                    $this->Users->updateAll(['new_pass_key' => $randomCode , 'new_password_requested' => $dateNow , 'forgot_password_limit_exceeded' => (($user->forgot_password_limit_exceeded) + 1)], ['id' => $userId]);
					
					/*SEND MOBILE MESSAGES START*/
					if($user->phone  !="" && $user->country_code !=""){
						//Start Send message on mobile
						$countryCode = $user->country_code;
						$phone = $user->phone;
						$msg = OTP_MESSAGE.$randomCode;
						$this->sendMessages($phone,$msg,$countryCode);
						//End send message 
					}
					/*SEND MOBILE MESSAGES START*/
					
					//Email send 
                    $replace = array('{user}','{code}');
                    $with = array($user->username, $randomCode);
                    
                    //Send email function
                    $this->send_email('',$replace,$with,'resend_code_api',$user->email);

                    $resultJ = json_encode(array('status' => '200' , 'message' => 'Code has been sent on your email successfully.'));
                
            }
            $this->json_response($resultJ);
      }
    }
    /**
       *********************************************************************
       *  Function Name : forgotPassword() .
       *  Functionality : forgotPassword verification code send on email
       *********************************************************************
    **/
    function forgotPassword(){
        $this->autoRender = false; 
        
      if($this->request->is('post')==1){
        $email = isset($this->request->data['email']) ? $this->request->data['email'] : "";
        $this->check_empty($email, 'Please add email');

        $userData = $this->Users->newEntity();
        
            if(isset($this->request->data['email']) && $this->request->data['email']!=''){
                
                $user = $this->Users->find('all',['conditions' => ['Users.role IN' =>[2,3,4],'Users.email' => $this->request->data['email']]]);
                $getUserData =  $user->first();
                
                if(empty($getUserData)){
                   $resultJ = json_encode(array('status' => '301' , 'message' => 'Email id not register with us, try again'));
                }else{
					
                    //Check user banned
                    $this->checkUserSuspend($getUserData->id);

                    //date_default_timezone_set("America/Los_Angeles");
                    $dateNow = date('Y-m-d H:i:s');

                    //$verificationCode  = mt_rand(100000, 999999);
                    $verificationCode  = $this->randomGenerater();
                    $userData->id = $getUserData->id;
                    $userData->new_pass_key = $verificationCode;
                    $userData->new_password_requested = $dateNow;
                    $userData->otp_limit_exceeded = 0;
                    
                    //save adnin data       
                    $this->Users->save($userData);
                    $data['user_id'] = $userData->id;
                    
                    $replace = array('{user}','{verification_code}');
                    $with = array($getUserData->username, $verificationCode);
                    //Send email function
                    $this->send_email('',$replace,$with,'forgot_password_api',$getUserData->email);
                    /*
                    if($getUserData->phone  !="" && $getUserData->country_code !=""){
						//Start Send message on mobile
						$to_mobile_number = $getUserData->phone;
						$message_body =  "Your verification code is ".$verificationCode." for sky2c forgot password process";
						$country_code = $getUserData->country_code;
						$this->sendMessages($to_mobile_number , $message_body , $country_code);
						//End send message 
					} */
                   
                    $resultJ = json_encode(array('status' => '200' , 'message' => 'Verification code has been sent your email. Please follow the steps to reset your password','data' => $data));
                }
            }else{
                $resultJ = json_encode(array('status' => '200' , 'message' => 'Something went wrong'));
            }
            $this->json_response($resultJ);
        }
    }
    /**
       *********************************************************************
       *  Function Name : verifyForgotPassword() .
       *  Functionality : verification code
       *********************************************************************
    **/
    function verifyForgotPassword()
    {
       if ($this->request->is('post')) {
          $user_id = isset($this->request->data['user_id']) ? $this->request->data['user_id'] : "";
          $verification_code = isset($this->request->data['verification_code']) ? $this->request->data['verification_code'] : "";
        
          $this->check_empty($user_id, 'Please add user_id');
          $this->check_empty($verification_code, 'Please add verification_code');
          
            //date_default_timezone_set("America/Los_Angeles");
            $dateNow = date("Y-m-d H:i:s");
            
            $time = strtotime($dateNow);
            $time = $time - (15 * 60);
            $dateBefore = date("Y-m-d H:i:s", $time);
          
            $checkExpire = $this->Users->find('all',['conditions' => ['Users.id' => $user_id , 'Users.new_pass_key' => $verification_code , 'Users.new_password_requested  >' => $dateBefore]]);
            $checkExpireData =  $checkExpire->first();
            if(empty($checkExpireData)){
                $resultJ = json_encode(array('status' => '301' , 'message' => 'Your verification code have been expired,Please try another.'));
            }else{
                $user = $this->Users->find('all',['conditions' => ['Users.id' => $user_id , 'Users.new_pass_key' => $verification_code]]);
                $getUserData =  $user->first();
                
                if(!empty($getUserData)){
                    //Check user banned
                    $this->checkUserSuspend($getUserData->id);

                       $userData = $this->Users->newEntity();
                       $userData->id = $user_id;
                       $userData->new_pass_key = null;
                       $userData->new_password_requested = null;
                      
                       $this->Users->save($userData);

                      $resultJ = json_encode(array('status' => '200' , 'message' => 'Your code have been verified'));
                  
                }else{
                    $resultJ = json_encode(array('status' => '301' , 'message' => 'Please enter valid code.'));
                }
            }
            $this->json_response($resultJ);
      }
    }
    /**
       *********************************************************************
       *  Function Name : resetPassword() .
       *  Functionality : Set new password
       *********************************************************************
    **/
    public function resetPassword()
    {  
      if ($this->request->is(['post'])) {
        $user_id = isset($this->request->data['user_id']) ? $this->request->data['user_id'] : "";
        $password = isset($this->request->data['password']) ? $this->request->data['password'] : "";
        
        $this->check_empty($user_id, 'Please add user_id');
        $this->check_empty($password, 'Please add password');
        
        $this->checkUserId($user_id);

             $user = $this->Users->get($user_id, [
                'contain' => []
            ]);
            $user = $this->Users->patchEntity($user, $this->request->data);
            
            if ($this->Users->save($user)) {

                    $replace = array('{name}','{password}');
                    $with = array($user->name, $password);
                    //Send email function
                    $this->send_email('',$replace,$with,'change_password_api',$user->email);

                    $resultJ = json_encode(array('status' => '200' , 'message' => 'Password has been changed'));
            } else {
                    $resultJ = json_encode(array('status' => '301' , 'message' => 'Password could not be changed. Please, try again.'));
            }
            $this->json_response($resultJ);
        }
    }
    /**
       *********************************************************************
       *  Function Name : changePassword() .
       *  Functionality : Change password
       *********************************************************************
    **/
    public function changePassword()
    {  
      if ($this->request->is(['post'])) {
        $user_id = isset($this->request->data['user_id']) ? $this->request->data['user_id'] : "";
        $password = isset($this->request->data['password']) ? $this->request->data['password'] : "";
        $new_password = isset($this->request->data['new_password']) ? $this->request->data['new_password'] : "";
        
        $this->check_empty($user_id, 'Please add user_id');
        $this->check_empty($password, 'Please add password');
        $this->check_empty($new_password, 'Please add new_password');

		//Check user banned
		$this->checkUserSuspend($user_id);	

            $user = $this->Users->find('all',['conditions' => ['Users.id' => $user_id]]);
            $getUserData =  $user->first();
            
            if ((new DefaultPasswordHasher)->check($password, $getUserData->password)) {

                $userData = $this->Users->newEntity();
                $userData->id = $user_id;
                $userData->password = $new_password;

                if ($this->Users->save($userData)) {
                       
                    $replace = array('{name}','{password}');
                    $with = array($getUserData->name, $password);
                    //Send email function
                    $this->send_email('',$replace,$with,'change_password_api',$getUserData->email);

                    $resultJ = json_encode(array('status' => '200' , 'message' => 'Password has been changed'));
                } else {
                    $resultJ = json_encode(array('status' => '301' , 'message' => 'Password could not be changed. Please, try again.'));
                }
                 
            } else {
                $resultJ = json_encode(array('status' => '301' , 'message' => 'Old password not matched'));
            }
            $this->json_response($resultJ);
        }
    }
    /**
       *********************************************************************
       *  Function Name : getProfile() .
       *  Functionality : Get getProfile
       *********************************************************************
    **/
    public function getProfile()
    {  
        $this->loadModel('CountryCodes');

        if ($this->request->is(['post'])) {
              $user_id = isset($this->request->data['user_id']) ? $this->request->data['user_id'] : "";
              $this->check_empty($user_id, 'Please add user_id');
              $this->checkUserId($user_id);
				
			  //Check user banned
			  $this->checkUserSuspend($user_id);	
			
              $user = $this->Users->get($user_id);
              if(!empty($user)){
                
                //$countryData = $this->CountryCodes->find('all')
                //->where(['phonecode' => $user->country_code])->first();
               
                  $data['user_id'] = $user->id;
                  $data['name'] = $user->name;
                  $data['username'] = $user->username;
                  $data['email'] = $user->email;
                  $data['country_code'] = $user->country_code;
                  $data['iso'] = $user->iso;
                  /*if(!empty($countryData)){
                  $data['country_name'] = $countryData->iso;
                  }else{
                    $data['country_name'] = "";
                  }*/
                  $data['phone'] = $user->phone;
                  $data['profile_image']  = !empty($user['profile_image']) ? HTTP_ROOT.'img/uploads/'.$user['profile_image']:"";

                $resultJ = json_encode(array('status' => '200' , 'message' => 'Profile detail','data' => $data));
              }
        }else{
          $resultJ = json_encode(array('status' => '200' , 'message' => 'Record Not Found', 'data' => array()));
        }
        $this->json_response($resultJ);
    }
    /**
       *********************************************************************
       *  Function Name : editProfile() .
       *  Functionality : Get editProfile
       *********************************************************************
    **/
    public function editProfile()
    {  
		$data=array();
        if ($this->request->is('post')) {
        $user = $this->Users->newEntity();

            $user_id = isset($this->request->data['user_id']) ? $this->request->data['user_id'] : "";
            $name = isset($this->request->data['name']) ? $this->request->data['name'] : "";
            $username = isset($this->request->data['username']) ? $this->request->data['username'] : "";
            $phone = isset($this->request->data['phone']) ? $this->request->data['phone'] : "";
            $country_code = isset($this->request->data['country_code']) ? $this->request->data['country_code'] : "";
            $iso = isset($this->request->data['iso']) ? $this->request->data['iso'] : "";
            
            $image = isset($this->request->data['image']) ? $this->request->data['image'] : "";

            $this->check_empty($user_id, 'Please add user_id');
            $this->check_empty($name, 'Please add name');
            $this->check_empty($username, 'Please add username');
            $this->check_empty($country_code, 'Please add country_code');
            $this->check_empty($phone, 'Please add phone');
            
            //Check user banned
			$this->checkUserSuspend($user_id);	
            
            $user = $this->Users->get( $user_id, ['contain' => [] ] );
            $this->request->data['email'] = $user->email;
           
            $user = $this->Users->patchEntity($user, $this->request->data);
            
            //Upload profile image
            if(!empty($image)){
                if($image['name']!=''){
                    $profileImage = $this->upload_file('profilePic',$image);
                    $profileImage = explode(':',$profileImage);

                    if($profileImage[0]=='error'){
                            $resultJ = json_encode(array('status' => '200' , 'message' => $profileImage[1]));
                            $this->json_response($resultJ);
                    }else{
                        $user->profile_image =  $profileImage[1];
                    }               
                }
            }
           //End image upload
			 $user->parent_id = $user->parent_id;
            if ($this->Users->save($user)) {
				 $user = $this->Users->get( $user_id, ['contain' => [] ] );
				 $data['image_name'] = 	$user->profile_image;
				 $data['image_path'] = 	HTTP_ROOT.'img/uploads';
				 $data['username'] = 	$user->username;
				 $data['name'] = 	$user->name;
                 $resultJ = json_encode(array('status' => '200' , 'message' => 'Profile has been edit successfully.','data'=>$data));
            } else{
               if(!empty($user->errors())){
                  $errorMsgShow = "";
                  foreach($user->errors() as $error){
                       // pr($error);
                       foreach($error as $errorMsg){
                          $errorMsgShow = $errorMsg;
                          break;
                       }
                       if($errorMsgShow != ""){
                            break;
                       }
                  }
                  $message = $errorMsgShow;
                }else{
                  $message = "Unable to edit profile.";
                }
              $resultJ = json_encode(array('status' => '301' , 'message' => $message));
            }
          $this->json_response($resultJ);
        }
    }
    /**
       *********************************************************************
       *  Function Name : getOrders() .
       *  Functionality : Get orders
       *********************************************************************
    **/
    public function getOrders()
    {  
		
      if ($this->request->is(['post'])) {
        $this->loadModel('OrderAssignments');
        $this->loadModel('OrderAssignmentLogs');
        $this->loadModel('UserLogs');
        
        $user_id = isset($this->request->data['user_id']) ? $this->request->data['user_id'] : "";
        $role = isset($this->request->data['role']) ? $this->request->data['role'] : "";
        $order_status = isset($this->request->data['order_status']) ? $this->request->data['order_status'] : "";

        $this->check_empty($user_id, 'Please add user_id');
        $this->check_empty($role, 'Please add role');
        $this->check_empty($order_status, 'Please add order_status');
        
        //Check user banned
		$this->checkUserSuspend($user_id);	
        
        $this->checkUserId($user_id);
        $countUnread = $this->UserLogs->find('all')
                          ->where(['UserLogs.notification_to'=>$user_id, 'UserLogs.read_status'=> 0])->count();

         $data = []; 
         
        if($role == 3){

             if($order_status != 4){
             
                $coditions = ['OrderAssignments.assign_to' => $user_id, 'OrderAssignments.status_to' => $order_status];
             
             }else{
                $coditions = ['OrderAssignments.assign_to' => $user_id,'OrderAssignments.status_to IN' => [1,2,3],'OrderAssignments.modified BETWEEN NOW() - INTERVAL 30 DAY AND NOW()'];
              }

              $orderAssignData = $this->OrderAssignments->find('all')
                ->where($coditions)
                ->contain(['Orders' , 'OrderPackages'])
                ->group('OrderAssignments.order_id')
                ->toArray();
				
                if(!empty($orderAssignData)){
					
                  foreach($orderAssignData as $key=>$orderVal){

                        foreach($orderVal as $key => $value)
                        {
                            if (is_null($value))
                              {
                              $orderVal->$key = "";
                              }
                        }
                        $orderData['order_id'] = $orderVal['order_id'];
                        $orderData['order_number'] = (string)$orderVal['order']['descrates_app_id'];
                        $orderData['source'] = $orderVal['source'];
                        $orderData['destination'] = $orderVal['destination'];

                        $packagesArr = array();
                         $orderAssignStatusData = $this->OrderAssignments->find('all')
                              ->where(['OrderAssignments.order_id' => $orderVal['order_id'],'OrderAssignments.assign_to' => $user_id])->toArray();
						 //print_r($orderAssignStatusData); die;	
                          if(!empty($orderAssignStatusData)){
                            $orderStatus=array();
                            $productsIds=array();
                            foreach($orderAssignStatusData as $order_data){
                              $packagesArr[] = $order_data['package_id'];

								$orderStatus[]=$order_data['status_to'];
								if(in_array($order_data['id'],$productsIds)){
									continue;
								}else{
									$productsIds[]=$order_data['id'];
								}
                              

                            }

                            $packagesArr = array_filter(array_unique($packagesArr));
                            $orderData['order_products_ids'] = implode("," , $productsIds);
                            $orderData['no_of_products'] = count($packagesArr); //count($productsIds);
                            
                            if(in_array(1,$orderStatus)){
                              $orderData['status'] = 1;
                            }else if(in_array(2,$orderStatus)){
                              $orderData['status'] = 2;
                            }else if(in_array(3,$orderStatus)){
                              $orderData['status'] = 3;
                            }
                          }

						
                        if($order_status != 4){
                           if($orderData['status'] != $order_status){
                                continue;
                           }
                        }
                        
                     $data[] = $orderData;
                    }
                   
              }                
        }else{
          
			if($order_status != 4){
             
				$coditions = ['OrderAssignmentLogs.assign_to' => $user_id, 'OrderAssignmentLogs.status' => $order_status,'OrderAssignmentLogs.modified BETWEEN NOW() - INTERVAL 30 DAY AND NOW()'];
			 
			 }else{
				$coditions = ['OrderAssignmentLogs.assign_to' => $user_id, 'OrderAssignmentLogs.status IN' => [1,2,3],'OrderAssignmentLogs.modified BETWEEN NOW() - INTERVAL 30 DAY AND NOW()'];
			  }
                  
				
				$orderAssignDataLogs = $this->OrderAssignmentLogs->find('all')
                ->where($coditions)
                ->contain(['OrderAssignments'=>['Orders']])
                ->group('OrderAssignmentLogs.order_id')
                ->toArray();
			
            if(!empty($orderAssignDataLogs)){
               foreach($orderAssignDataLogs as $lgKey=>$OrderAssignments){
                  
                  $orderData['order_id'] = $OrderAssignments['order_id'];
                  $orderData['order_number'] = (string)$OrderAssignments['order_assignment']['order']['descrates_app_id'];
                  $orderData['source'] = $OrderAssignments['order_assignment']['order']['source'];
                  $orderData['destination'] = $OrderAssignments['order_assignment']['order']['destination'];
                  
                  $packagesArr = array();

                  $orderAssignStatusData = $this->OrderAssignmentLogs->find('all')
                              ->where(['OrderAssignmentLogs.order_id' => $OrderAssignments['order_id'],'OrderAssignmentLogs.assign_to' => $user_id, 'OrderAssignmentLogs.status NOT IN' => [4]])->toArray();
							
                          if(!empty($orderAssignStatusData)){
                            $orderStatus=array();
                            $productsIds=array();
                            foreach($orderAssignStatusData as $order_data){
                              $packagesArr[] = $order_data['package_id'];
                             

                              $orderStatus[]=$order_data['status'];
                             


                             /* comment by sonam mittal to resolve package issue */
                              if(in_array($order_data['order_assignment_id'],$productsIds)){
              									continue;
              								}else{
              									if(in_array($order_data['order_assignment_id'],$productsIds)){
              										continue;
              									}else{
              										 $productsIds[]=$order_data['order_assignment_id'];
              									}
              									
              								}

                            } 
                         
                            if(in_array(1,$orderStatus)){
                              $orderData['status'] = 1;
                            }else if(in_array(2,$orderStatus)){
                              $orderData['status'] = 2;
                            }else if(in_array(3,$orderStatus)){
                              $orderData['status'] = 3;
                            }
                          }
                          $packagesArr = array_filter(array_unique($packagesArr));
                          $orderData['order_products_ids'] = implode("," , $productsIds);
                          $orderData['no_of_products'] = count($packagesArr); //count($productsIds);

                          if($order_status != 4){
                             if($orderData['status'] != $order_status){
                                  continue;
                             }
                          }
                  $data[] = $orderData;
                }
            }
      }
      
       $resultJ = json_encode(array('status' => '200' , 'message' => 'Orders list', 'notification_count' => $countUnread ,'data' => $data));
       $this->json_response($resultJ);
    }
  }
  /**
       *********************************************************************
       *  Function Name : getOrderDetail() .
       *  Functionality : getOrderDetail
       *********************************************************************
    **/
    public function getOrderDetail()
    {  
      if ($this->request->is(['post'])) {
        $this->loadModel('OrderAssignments');
        $this->loadModel('OrderAssignmentLogs');

        $user_id = isset($this->request->data['user_id']) ? $this->request->data['user_id'] : "";
        $order_id = isset($this->request->data['order_id']) ? $this->request->data['order_id'] : "";
        $role = isset($this->request->data['role']) ? $this->request->data['role'] : "";
       
        $this->check_empty($role, 'Please add role');
        $this->check_empty($order_id, 'Please add order_id');
        $this->check_empty($user_id, 'Please add user_id');
		$this->readNotification($order_id,$user_id);
		//Check user banned
		$this->checkUserSuspend($user_id);	
		
              $data = [];
              $pkgArray=array(); $pkgArr = array();
              $orderStatus=[];
              if($role == 3){
                $orderData = $this->OrderAssignments->find('all')
                  ->where(['OrderAssignments.order_id' => $order_id , 'OrderAssignments.assign_to' => $user_id])
                  ->contain(['Orders'=>['OrderLocations','customer_detail'] , 'OrderPackages'])
                  ->toArray();
				
                
                if(!empty($orderData)){   
                 
                  foreach($orderData as $orKey=>$pkgVal){
                       
                        

                        $data['order_id'] = $pkgVal['order_id'];
                        $data['order_number'] = (string)$pkgVal['order']['descrates_app_id'];
                        //$data['order_status'] = $order_status;//$pkgVal['status_to'];
                        
                        //$data['no_of_products'] = $pkg++;
                        $data['customer_id'] = $pkgVal['order']['customer_detail']['id'];
                        $data['customer_name'] = $pkgVal['order']['customer_detail']['name'];
                        $data['customer_phone'] = $pkgVal['order']['customer_detail']['phone'];
                        $data['customer_email'] = $pkgVal['order']['customer_detail']['email'];
                        $data['source'] = $pkgVal['source'];
                        $data['destination'] = $pkgVal['destination'];
                        $orderDataDriver = $this->OrderAssignmentLogs->find('all')
								->where(['OrderAssignmentLogs.order_assignment_id' => $pkgVal['id']])->first();
						if(!empty($orderDataDriver)){
							$data['assign_to'] = @$orderDataDriver->assign_to;
						}
						

					
                      if(!in_array($pkgVal['order_package']['id'],$pkgArray)){
							
							$pacakge['product_id'] =      $pkgVal['id'];
							$pacakge['product_number'] =  $pkgVal['order_package']['package_number'];
							$pacakge['product_title'] =   $pkgVal['order_package']['package_title']." (".$pkgVal['order_package']['package_number'].")";
							$pacakge['product_status'] =  $pkgVal['status_to'];
							
							 $data['products'][] = $pacakge;
							 $pkgArray[] = $pkgVal['order_package']['id'];
						
						}
                        
                       //ORDER LOCATION
                       if(!empty($pkgVal['order']['order_locations'])){
							foreach($pkgVal['order']['order_locations'] as $k=>$location){
								
								  $locationAgent[$k]['location_type'] = isset($location['location_type'])?preg_replace('/(?!^)[A-Z]{2,}(?=[A-Z][a-z])|[A-Z][a-z]/', ' $0', $location['location_type']):'';
								  $locationAgent[$k]['location_id'] = $location['location_id'];
								  $locationAgent[$k]['location_name'] = $location['location_name'];
								  $locationAgent[$k]['state_or_province_code'] = $location['state_or_province_code'];
								  $locationAgent[$k]['country_code'] = $location['country_code'];
							}
					   }
                     

                       
                        $data['locations'] = $locationAgent;

                        $orderStatus[]= $pkgVal['status_to'];
					}  
                        
					if(in_array(1,$orderStatus)){
					   $order_status = 1;
					}else if(in_array(2,$orderStatus)){
					   $order_status = 2;
					}else if(in_array(3,$orderStatus)){
					   $order_status = 3;
					}
					$data['order_status'] = $order_status;
					$data['no_of_products'] = count($data['products']); 

                    $resultJ = json_encode(array('status' => '200' , 'message' => 'Order detail' , 'data' => $data));
                }else{
                    $resultJ = json_encode(array('status' => '200' , 'message' => 'Record not found', 'data' => array()));
                }





              }else{



                $orderData = $this->OrderAssignmentLogs->find('all')
                  ->where(['OrderAssignmentLogs.order_id' => $order_id , 'OrderAssignmentLogs.assign_to' => $user_id])
                  ->contain(['OrderAssignments' =>['Orders'=>['OrderLocations','customer_detail'] , 'OrderPackages']])->toArray();
				
                   if(!empty($orderData)){   
                     
                            foreach($orderData as $orKey=>$pkgVal){

                                 
                                  $data['order_id'] = $pkgVal['order_assignment']['order_id'];
                                  $data['order_number'] = (string)$pkgVal['order_assignment']['order']['descrates_app_id'];
                                  //$data['order_status'] = $pkgVal['order_assignment']['status_to'];
                                  
                                  //$data['no_of_products'] =  $pkg++;
                                  $data['customer_id'] = $pkgVal['order_assignment']['order']['customer_detail']['id'];
                                  $data['customer_name'] = $pkgVal['order_assignment']['order']['customer_detail']['name'];
                                  $data['customer_phone'] = $pkgVal['order_assignment']['order']['customer_detail']['phone'];
                                  $data['customer_email'] = $pkgVal['order_assignment']['order']['customer_detail']['email'];
                                  $data['source'] = $pkgVal['order_assignment']['source'];
                                  $data['destination'] = $pkgVal['order_assignment']['destination'];
								  $data['assign_to'] = $pkgVal['assign_to'];
								  	
                                 
								  if(!in_array($pkgVal['order_assignment']['order_package']['id'],$pkgArray)){
							
            							$pacakge['product_id'] = $pkgVal['order_assignment']['id'];
            							$pacakge['product_number'] = $pkgVal['order_assignment']['order_package']['package_number'];
                                        $pacakge['product_title'] = $pkgVal['order_assignment']['order_package']['package_title']." (".$pkgVal['order_assignment']['order_package']['package_number'].")";
                                        $pacakge['product_status'] = $pkgVal['status'];
                                        
										$pkgArray[] = $pkgVal['order_assignment']['order_package']['id'];
										$data['products'][] = $pacakge;
            						}
            						
            						
								   
								    //ORDER LOCATION
								    if(!empty($pkgVal['order_assignment']['order']['order_locations'])){
										foreach($pkgVal['order_assignment']['order']['order_locations'] as $k=>$location){
											
											  $locationDriver[$k]['location_type'] = isset($location['location_type'])?preg_replace('/(?!^)[A-Z]{2,}(?=[A-Z][a-z])|[A-Z][a-z]/', ' $0', $location['location_type']):'';
											  $locationDriver[$k]['location_id'] = $location['location_id'];
											  $locationDriver[$k]['location_name'] = $location['location_name'];
											  $locationDriver[$k]['state_or_province_code'] = $location['state_or_province_code'];
											  $locationDriver[$k]['country_code'] = $location['country_code'];
										}
								   }
								 

								
								  $data['locations'] = $locationDriver;

                                  $orderStatus[]= $pkgVal['status'];
                             }
                              //pr($orderStatus);die;
                              if(in_array(1,$orderStatus)){
                                 $order_status = 1;
                              }else if(in_array(2,$orderStatus)){
                                 $order_status = 2;
                              }else if(in_array(3,$orderStatus)){
                                 $order_status = 3;
                              }
                             
                            $data['order_status'] = $order_status;
                            $data['no_of_products'] = count($data['products']); 

                            $resultJ = json_encode(array('status' => '200' , 'message' => 'Order detail' , 'data' => $data));
                      }else{
                         $resultJ = json_encode(array('status' => '200' , 'message' => 'Record not found', 'data' => array()));
                      }
              }
              $this->json_response($resultJ);
            }
          
  }

  /**
       *********************************************************************
       *  Function Name : getProductDetail() .
       *  Functionality : getProductDetail
       *********************************************************************
    **/
  public function getProductDetail()
  {  
      if ($this->request->is(['post'])) {
        $this->loadModel('OrderAssignments');
        $this->loadModel('OrderAssignmentLogs');
        
        $product_id = isset($this->request->data['product_id']) ? $this->request->data['product_id'] : "";
        $user_id = isset($this->request->data['user_id']) ? $this->request->data['user_id'] : "";
        $role = isset($this->request->data['role']) ? $this->request->data['role'] : "";
        

        $this->check_empty($user_id, 'Please add user_id');
        $this->check_empty($product_id, 'Please add product_id');
        $this->check_empty($role, 'Please add role');
        
        //Check user banned
		$this->checkUserSuspend($user_id);	
        
                $packageData = $this->OrderAssignments->find('all')
                ->where(['OrderAssignments.id' => $product_id])
                ->contain(['OrderAssignmentLogs' , 'OrderPackages'])
                ->first();
			
              if(!empty($packageData)){
                  $data['product_id'] = $packageData['id'];
                  $data['product_number'] = $packageData['order_package']['package_number'];
                  $data['product_title'] = $packageData['order_package']['package_title'];
                  
                  $data['product_weight'] = (string) $packageData['order_package']['gross_weight']." ".$packageData['order_package']['weight_unit'];
                  
                  if($role == 4){
                     $data['product_status'] = $packageData['order_assignment_log']['status'];
                  }else{
                     $data['product_status'] = $packageData['status_to'];
                  }
					
                  $data['source'] = $packageData['source'];
                  $data['destination'] = $packageData['destination'];
                  $data['assign_to'] = $packageData['order_assignment_log']['assign_to'];

                  $resultJ = json_encode(array('status' => '200' , 'message' => 'Product detail','data' => $data));
                  
              }else{
                $resultJ = json_encode(array('status' => '200' , 'message' => 'Record not found', 'data' => array()));
              }
                 
            $this->json_response($resultJ);
        }
  }
	
	function countryCodes(){
		$countryCodesModel = TableRegistry::get('CountryCodes');
		$countrydata = $countryCodesModel->find('all')->order(['CountryCodes.phonecode'=>"ASC"])->toArray();
		 foreach($countrydata as $key=>$val){
					$country_info[$val['phonecode']] = $val['iso']; 
		 }
		  $resultJ = json_encode(array('status' => '200' , 'message' => 'Country codes','data' => $country_info));
		  $this->json_response($resultJ);
	} 
	
	public function addDriver(){   
      if ($this->request->is('post')) {
        $user = $this->Users->newEntity();

            $name = isset($this->request->data['name']) ? $this->request->data['name'] : "";
            $user_id = isset($this->request->data['user_id']) ? $this->request->data['user_id'] : "";
            $username = isset($this->request->data['username']) ? $this->request->data['username'] : "";
            $phone = isset($this->request->data['phone']) ? $this->request->data['phone'] : "";
            $country_code = isset($this->request->data['country_code']) ? $this->request->data['country_code'] : "";
            $iso = isset($this->request->data['iso']) ? $this->request->data['iso'] : "";
            $email = isset($this->request->data['email']) ? $this->request->data['email'] : "";
            $parent_id = isset($this->request->data['parent_id']) ? $this->request->data['parent_id'] : "";
            $image = isset($this->request->data['image']) ? $this->request->data['image'] : "";

            $this->check_empty($name, 'Please add name');
            $this->check_empty($user_id, 'Please add user_id');
            $this->check_empty($username, 'Please add username');
            $this->check_empty($country_code, 'Please add country_code');
            $this->check_empty($phone, 'Please add phone');
            $this->check_empty($email, 'Please add email');
            $this->check_empty($parent_id, 'Please add parent_id');

			 //Check user banned
			$this->checkUserSuspend($user_id);	
			if(empty($email)){
				$this->Users->validator()->remove('email');
			}
			//$this->request->data['password'] = $this->RandomStringGenerator();
			$this->request->data['password'] = $this->randomGenerater();
            $user = $this->Users->patchEntity($user, $this->request->data);
            $user->status = 1;
            $user->role = DRIVER_ROLE;
            
          if(!empty($image)){
           $imageData = $this->request->data['image'];
            if($imageData['name']!=''){
                $profileImage = $this->upload_file('profilePic',$imageData);
                $profileImage = explode(':',$profileImage);

                if($profileImage[0]=='error'){
                        $resultJ = json_encode(array('status' => '200' , 'message' => $profileImage[1]));
                        $this->json_response($resultJ);
                }else{
                    $user->profile_image =  $profileImage[1];
                }               
            }
            unset($this->request->data['image']);
            //End image upload
          }
     
            if ($this->Users->save($user)) {
				if($email !=''){
					 //Send registeration email to user
						$replace = array('{full_name}','{email}','{username}','{password}','{phone}');
						$with = array($user->name, $user->email , $user->username , $this->request->data['password'] , $user->phone);
						//Send email function
						$this->send_email('',$replace,$with,'registration',$user->email);
					//End send email
				}
				
				//Start Send message on mobile
			
				//End send message 
				
				 
				if($user->phone  !="" && $user->country_code !=""){
					//Start Send message on mobile
					$to_mobile_number = $user->phone;
					$message_body =  "You can login through ".$user->phone." and temporary password is ".$this->request->data['password'];
					$country_code = $user->country_code;
					$this->sendMessages($to_mobile_number , $message_body , $country_code);
					//End send message 
				} 
                
                $resultJ = json_encode(array('status' => '200' , 'message' => 'The driver has been added successfully.'));
            }else{
               if(!empty($user->errors())){
                  $errorMsgShow = "";
                  foreach($user->errors() as $error){
                       // pr($error);
                       foreach($error as $errorMsg){
                          $errorMsgShow = $errorMsg;
                          break;
                       }
                       if($errorMsgShow != ""){
                            break;
                       }
                  }
                  $message = $errorMsgShow;
                }else{
                  $message = "Unable to add the driver.";
                }
              $resultJ = json_encode(array('status' => '301' , 'message' => $message));
            }
          $this->json_response($resultJ);
        }
    }
    
    function changeDriverStatus(){
       if ($this->request->is('post')) {
		   
            $user_id = isset($this->request->data['user_id']) ? $this->request->data['user_id'] : "";
            $driver_id = isset($this->request->data['driver_id']) ? $this->request->data['driver_id'] : "";
            $status = isset($this->request->data['status']) ? $this->request->data['status'] : "";
           
            $this->check_empty($user_id, 'Please add user_id');
            $this->check_empty($status, 'Please add status');
			
			 //Check user banned
			$this->checkUserSuspend($user_id);
			
              $user = $this->Users->get($driver_id);
              $user->status = ( $status === 'on' ) ? 1: 0;

              if ($this->Users->save($user)){
                   $resultJ = json_encode(array('status' => '200' , 'message' => 'The driver status has been changed.'));
              }else{
                  $this->Flash->error(__('The driver status could not be changed. Please, try again.'));
              } 
              $this->json_response($resultJ);
        }
    }
    
    function documentApproveStatus(){
       if ($this->request->is('post')) {
            $user_id = isset($this->request->data['user_id']) ? $this->request->data['user_id'] : "";
            $driver_id = isset($this->request->data['driver_id']) ? $this->request->data['driver_id'] : "";
            $is_approved = isset($this->request->data['is_approved'])  ? $this->request->data['is_approved'] : "";
            
            $this->check_empty($user_id, 'Please add user_id');   
            $this->check_empty($driver_id, 'Please add driver_id');   
            
            //Check user banned
			$this->checkUserSuspend($user_id);
			       
            if($is_approved === ""){
                $this->check_empty($is_approved, 'Please add is_approved');
            }

              $user = $this->Users->get($driver_id);
              if($user->is_approved == 1)
              {
                $user->is_approved = 0;
                $message = 'Driver has been disapproved';
              }
              else
              {
                $user->is_approved = 1;
                $message = 'Driver has been approved';
              }
              if($this->Users->save($user)){
                  $resultJ = json_encode(array('status' => '200' , 'message' => $message));
              }else{
                  $resultJ = json_encode(array('status' => '301' , 'message' => 'Somrthing went wrong'));
              } 
              $this->json_response($resultJ);
        }
    }
  /**
       *********************************************************************
       *  Function Name : getDrivers() .
       *  Functionality : getDrivers
       *********************************************************************
    **/
    public function getDrivers()
    {  
			$this->loadModel('CountryCodes');
			
			if ($this->request->is('post')) {
				$user_id = isset($this->request->data['user_id']) ? $this->request->data['user_id'] : "";
				$is_approved = isset($this->request->data['is_approved']) ? $this->request->data['is_approved'] : ""; 
				$this->check_empty($user_id, 'Please add user_id');
				
				//Check user banned
				$this->checkUserSuspend($user_id);
				
				if($is_approved==1){
					$conditionArr=array('Users.parent_id' => $user_id,'Users.is_approved' => 1,'Users.status' => 1,'Users.role' => DRIVER_ROLE);
				}else{
					$conditionArr=array('Users.parent_id' => $user_id,'Users.role' => DRIVER_ROLE);
				}
					$this->checkUserSuspend($user_id);
					$usersData = $this->Users->find('all')->where([$conditionArr])
					->contain('UserDetails')->order(['created' => 'DESC'])
					->toarray();
			 
				if(!empty($usersData)){
						$data = [];
				  
						foreach($usersData as $ukey => $driver){
					  
							$driverDetail['user_id']        = $driver['id'];
							$driverDetail['name']           = $driver['name'];
							$driverDetail['phone']          = $driver['phone'];
							$driverDetail['email']          = $driver['email'];
							$driverDetail['status']         = $driver['status'];
							$driverDetail['is_approved']         = $driver['is_approved'];
							$driverDetail['username']         = $driver['username'];
							$driverDetail['profile_image']  = !empty($driver['profile_image']) ? HTTP_ROOT.'img/uploads/'.$driver['profile_image']:"";
							$driverDetail['country_code']         = $driver['country_code'];
              $driverDetail['iso']         = $driver['iso'];
							/*if(!empty($driver['country_code'])){
					
								$countryData = $this->CountryCodes->find('all')
																  ->where(['phonecode' => $driver['country_code']])
																  ->first();
							   
								  
								if(!empty($countryData)){
									$driverDetail['country_name'] = $countryData->iso;
								}else{
									$driverDetail['country_name'] = "";
								}
							}else{
								$driverDetail['country_name'] = "";
							}*/
							
							$allCertificatesDetail = [];

							if(!empty($driver['user_details'])){
								foreach($driver['user_details'] as $Dkey => $Dvalue)
								{
									 $driverCertificate['document_id']      = $Dvalue['id'];
									 $driverCertificate['document_title']   = $Dvalue['document_title'];
									 $driverCertificate['document_number']  = $Dvalue['document_number'];
									 $driverCertificate['issued_by']        = $Dvalue['issued_by'];
									 $driverCertificate['scanned_image']    = !empty($Dvalue['scanned_image']) ? HTTP_ROOT.'img/drivers_documents/'.$Dvalue['scanned_image']:"";
									 $driverCertificate['issued_date']      = !empty($Dvalue['issued_date']) ? (date('Y-m-d', strtotime( $Dvalue['issued_date'] ) )):"" ;
									 $driverCertificate['expiary_date']     = !empty($Dvalue['expiary_date']) ? (date('Y-m-d', strtotime( $Dvalue['expiary_date']) )):"";

									 $allCertificatesDetail[] = $driverCertificate;
								}

							}
							$driverDetail['driver_certificates'] = $allCertificatesDetail;

							$data['drivers'][] = $driverDetail;
						  
				  }
				  $resultJ = json_encode(array('status' => '200' , 'message' => 'Drivers list' , 'data' => $data));
			  }else{
				   $data['drivers'] = array();
				  $resultJ = json_encode(array('status' => '200' , 'message' => 'Record not found', 'data' => $data ));
			  }
			  $this->json_response($resultJ);
		  }
	  }
 
	function checkOrderAssignmentStatus(){
		
		$this->loadModel('OrderPackages');
		$this->loadModel('OrderTracking');
		$this->loadModel('OrderAssignments');
		$this->loadModel('OrderAssignmentLogs');
		
		$product_id = isset($this->request->data['product_id']) ? $this->request->data['product_id'] : ""; //order id
		$user_id = isset($this->request->data['user_id']) ? $this->request->data['user_id'] : ""; //Logged in user id
		$role = isset($this->request->data['role']) ? $this->request->data['role'] : ""; //Logged in user role
	
		$this->check_empty($product_id, 'Kindly provide product id');
		$this->check_empty($user_id, 'Kindly provide user id');
		$this->check_empty($role, 'Kindly provide user role');
						
		//Check user banned
		$this->checkUserSuspend($user_id);
		
		$package = $this->OrderPackages->find('all')->where(['OrderPackages.package_number' => $product_id]);
		
		if($package->count() <= 0){
			
			$data = array();
			$resultJ = json_encode(array('status' => '200' ,'is_assigned'=>2, 'message' => "Invalid package number, kindly provide valid data for proceed"));
		
		}else{
			$orderAssignData=array();
			$packageData = $package->first(); 
			$product_id = $packageData->id;
			$orderID = $packageData->order_id;
			$assignedPerson ='';

			if($role==3 || $role==2){
				
				$orderAssignQuery = $this->OrderAssignments->find('all')->where(['OrderAssignments.order_id' => $orderID,'OrderAssignments.package_id' => $product_id,'OrderAssignments.assign_to' => $user_id,'OrderAssignments.status_to IN' => [1,2]]);
				
				$orderAssignData = $orderAssignQuery->first();
				
				$Assigncount= $orderAssignQuery->count();
				
				if($Assigncount > 0){
					$orderAssignlogQuery = $this->OrderAssignmentLogs->find('all')->where(['OrderAssignmentLogs.order_assignment_id' => $orderAssignData->id,'OrderAssignmentLogs.assign_by' => $user_id,'OrderAssignmentLogs.assign_to' => $orderAssignData->assign_to,'OrderAssignmentLogs.status IN' => [1,2]]);
					
					$orderAssignlogData = $orderAssignlogQuery->first();
					$Assignlogcount= $orderAssignlogQuery->count();
					if($Assignlogcount > 0){
						$assignedPerson = $orderAssignlogData->assign_to;
					}else{
						$assignedPerson = $orderAssignData->assign_to;
					}
					
				}
				
			}else if($role==4){
			
				$orderAssignQuery = $this->OrderAssignmentLogs->find('all')->where(['OrderAssignmentLogs.order_id' => $orderID,'OrderAssignmentLogs.assign_to' => $user_id,'OrderAssignmentLogs.package_id' => $product_id,'OrderAssignmentLogs.status IN' => [1,2]]);
				
				$orderAssignData= $orderAssignQuery->first();
				$Assigncount= $orderAssignQuery->count();
				if($Assigncount > 0){
					$assignedPerson = $orderAssignData->assign_to;
				}
				
			}else{
				
				$data = array();
				$resultJ = json_encode(array('status' => '200' ,'is_assigned'=>2, 'message' => 'Invalid role, Only driver, agent and staff can access this page.'));
				
				$this->json_response($resultJ);
			} 
			
			$orderTrackingData = $this->OrderTracking->find('all')->select('status')->where(['OrderTracking.order_id' => $orderID,'OrderTracking.package_id' => $product_id])->hydrate(false)->toArray();
			
			$statusArray = array(
								array("id"=>"1","title"=>"Picked up"),
								array("id"=>"2","title"=>"Pick up from warehouse"),
								array("id"=>"6","title"=>"Pick up from Airport"),
								array("id"=>"5","title"=>"Drop-off at warehouse"),
								array("id"=>"7","title"=>"Drop-off​​ at Airport"),
								array("id"=>"3","title"=>"Delivery attempt"),
								array("id"=>"4","title"=>"Delivered"),
							);
							
						
			if($packageData->status==3){
				$resultJ = json_encode(array('status' => '200' ,'is_assigned'=>3,'scanned_status'=>@$statusArray, 'message' => "Product has been already delivered"));
			}else if($Assigncount <= 0){
				
        $data['order_id']= $orderID;


        $orderAssignQueryCount = $this->OrderAssignments->find('all')->where(['OrderAssignments.order_id' => $orderID,'OrderAssignments.package_id' => $product_id,'OrderAssignments.status_to IN' => [1,2,4],'OrderAssignments.status_by IN' => [1,2,4]])->count();
        
        $orderAssignlogQueryCount = $this->OrderAssignmentLogs->find('all')->where(['OrderAssignmentLogs.order_id' => $orderID,'OrderAssignmentLogs.package_id' => $product_id,'OrderAssignmentLogs.status IN' => [1,2]])->count();

        if($orderAssignQueryCount>0 || $orderAssignlogQueryCount>0){
          $resultJ = json_encode(array('status' => '200' ,'is_assigned'=>3,'scanned_status'=>$statusArray, 'message' => "Order has been already assigned to someone else.")); 
        }else{
          $resultJ = json_encode(array('status' => '200' ,'is_assigned'=>1,'scanned_status'=>$statusArray, 'message' => "Order is valid for assignment"));
        }
				
			}else{
				$data = array();
				if($user_id != $assignedPerson){
					$resultJ = json_encode(array('status' => '200' ,'is_assigned'=>2,'scanned_status'=>array(), 'message' => "Invalid user is trying to attempt for scanning process.")); 
				}else{
          $resultJ = json_encode(array('status' => '200' ,'is_assigned'=>0,'scanned_status'=>$statusArray, 'message' => "Order already assigned.")); 
        }
				
			}
		}
		
		$this->json_response($resultJ);
	}
	/*
	 * function checkOrderAssignmentStatus(){
		
		$this->loadModel('OrderPackages');
		$this->loadModel('OrderTracking');
		$this->loadModel('OrderAssignments');
		$this->loadModel('OrderAssignmentLogs');
		
		$product_id = isset($this->request->data['product_id']) ? $this->request->data['product_id'] : ""; //order id
		$user_id = isset($this->request->data['user_id']) ? $this->request->data['user_id'] : ""; //Logged in user id
		$role = isset($this->request->data['role']) ? $this->request->data['role'] : ""; //Logged in user role
	
		$this->check_empty($product_id, 'Kindly provide product id');
		$this->check_empty($user_id, 'Kindly provide user id');
		$this->check_empty($role, 'Kindly provide user role');
						
		//Check user banned
		$this->checkUserSuspend($user_id);
		
		$package = $this->OrderPackages->find('all')->where(['OrderPackages.package_number' => $product_id]);
		
		if($package->count() <= 0){
			
			$data = array();
			$resultJ = json_encode(array('status' => '200' ,'is_assigned'=>2, 'message' => "Invalid package number, kindly provide valid data for proceed"));
		
		}else{
			$orderAssignData=array();
			$packageData = $package->first(); 
			$product_id = $packageData->id;
			$orderID = $packageData->order_id;
			$assignedPerson ='';

			if($role==3 || $role==2){
				
				$validateOrder	= $this->OrderAssignments->find('all')->where(['OrderAssignments.order_id' => $orderID,'OrderAssignments.package_id' => $product_id,'OrderAssignments.status_to IN' => [2],'OrderAssignments.assign_to !=' => $user_id])->count();
				
				$ValidateAssignQuery = $this->OrderAssignmentLogs->find('all')->where(['OrderAssignmentLogs.order_id' => $orderID,'OrderAssignmentLogs.package_id' => $product_id,'OrderAssignmentLogs.assign_to !=' => $user_id, 'OrderAssignmentLogs.status IN' => [1,2]])->count();
				
				if($validateOrder > 0 || $ValidateAssignQuery > 0){
					
					$resultJ = json_encode(array('status' => '200', 'message' => 'This package is already assigned to someone else.'));
					$this->json_response($resultJ);
					
				}else{
					
					$orderAssignQuery = $this->OrderAssignments->find('all')->where(['OrderAssignments.order_id' => $orderID,'OrderAssignments.package_id' => $product_id,'OrderAssignments.assign_to' => $user_id,'OrderAssignments.status_to IN' => [2]]);
				
					$orderAssignData = $orderAssignQuery->first();
					
					$Assigncount= $orderAssignQuery->count();
					
					if($Assigncount > 0){
						$orderAssignlogQuery = $this->OrderAssignmentLogs->find('all')->where(['OrderAssignmentLogs.order_assignment_id' => $orderAssignData->id,'OrderAssignmentLogs.assign_by' => $user_id,'OrderAssignmentLogs.assign_to' => $orderAssignData->assign_to,'OrderAssignmentLogs.status IN' => [1,2]]);
						
						$orderAssignlogData = $orderAssignlogQuery->first();
						$Assignlogcount= $orderAssignlogQuery->count();
						if($Assignlogcount > 0){
							$assignedPerson = $orderAssignlogData->assign_to;
						}else{
							$assignedPerson = $orderAssignData->assign_to;
						}
						
					}
				}
				
				
			}else if($role==4){
				
				$validateOrder	= $this->OrderAssignments->find('all')->where(['OrderAssignments.order_id' => $orderID,'OrderAssignments.package_id' => $product_id,'OrderAssignments.status_to IN' => [2],'OrderAssignments.assign_to !=' => $user_id])->count();
				
				$ValidateAssignQuery = $this->OrderAssignmentLogs->find('all')->where(['OrderAssignmentLogs.order_id' => $orderID,'OrderAssignmentLogs.package_id' => $product_id,'OrderAssignmentLogs.status IN' => [1,2]])->count();
				
				if($ValidateAssignQuery > 0 || $validateOrder > 0){
					$resultJ = json_encode(array('status' => '200', 'message' => 'This package is already assigned to someone else.'));
					$this->json_response($resultJ);
				}else{
					$orderAssignQuery = $this->OrderAssignmentLogs->find('all')->where(['OrderAssignmentLogs.order_id' => $orderID,'OrderAssignmentLogs.assign_to' => $user_id,'OrderAssignmentLogs.package_id' => $product_id,'OrderAssignmentLogs.status IN' => [1,2]]);
				
					$orderAssignData= $orderAssignQuery->first();
					$Assigncount= $orderAssignQuery->count();
					if($Assigncount > 0){
						$assignedPerson = $orderAssignData->assign_to;
					}
				}
				
				
			}else{
				
				$data = array();
				$resultJ = json_encode(array('status' => '200' ,'is_assigned'=>2, 'message' => 'Invalid role, Only driver, agent and staff can access this page.'));
				
				$this->json_response($resultJ);
			} 
			
			$orderTrackingData = $this->OrderTracking->find('all')->select('status')->where(['OrderTracking.order_id' => $orderID,'OrderTracking.package_id' => $product_id])->hydrate(false)->toArray();
			
			$statusArray = array(
								array("id"=>"1","title"=>"Picked up"),
								array("id"=>"2","title"=>"Pick up from warehouse"),
								array("id"=>"6","title"=>"Pick up from Airport"),
								array("id"=>"5","title"=>"Drop-off at warehouse"),
								array("id"=>"7","title"=>"Drop-off​​ at Airport"),
								array("id"=>"3","title"=>"Delivery attempt"),
								array("id"=>"4","title"=>"Delivered"),
							);
							
			
			
			if($packageData->status==3){
				$resultJ = json_encode(array('status' => '200' ,'is_assigned'=>3,'scanned_status'=>@$statusArray, 'message' => "Product has been already delivered"));
			}else if($Assigncount <= 0){
				$data['order_id']= $orderID;
				$resultJ = json_encode(array('status' => '200' ,'is_assigned'=>1,'scanned_status'=>$statusArray, 'message' => "Order is valid for assignment"));
			}else{
				$data = array();
				
					//if(!empty($orderAssignData)){
						if($user_id != $assignedPerson){
							$resultJ = json_encode(array('status' => '200' ,'is_assigned'=>2,'scanned_status'=>array(), 'message' => "Invalid user is trying to attempt for scanning process.")); 
							$this->json_response($resultJ);
						}
					//}
				
				
				$resultJ = json_encode(array('status' => '200' ,'is_assigned'=>0,'scanned_status'=>$statusArray, 'message' => "Order already assigned.")); 
			}
		}
		
		$this->json_response($resultJ);
	}
	 * */
	public function assignProducts(){   
		
		$this->loadModel('Orders');
		$this->loadModel('OrderAssignments');
		$this->loadModel('OrderAssignmentLogs');
		$this->loadModel('OrderPackages');
		$this->loadModel('UserLogs');

		if ($this->request->is('post')) {

			$user_id = isset($this->request->data['user_id']) ? $this->request->data['user_id'] : "";
			$assign_by = isset($this->request->data['assign_by']) ? $this->request->data['assign_by'] : "";
			$assign_to = isset($this->request->data['assign_to']) ? $this->request->data['assign_to'] : "";
			
			$shipment_type = isset($this->request->data['shipment_type']) ? $this->request->data['shipment_type'] : "";
			$tracking_number = isset($this->request->data['tracking_number']) ? $this->request->data['tracking_number'] : "";
			
			$source = isset($this->request->data['source']) ? $this->request->data['source'] : "";
			$destination = isset($this->request->data['destination']) ? $this->request->data['destination'] : "";
			$products = isset($this->request->data['products']) ? $this->request->data['products'] : "";

			$order_info='';

			if($shipment_type == 3){
				$this->check_empty($tracking_number, 'Please add tracking_number');
			}

			$this->check_empty($user_id, 'Please add user_id');
			$this->check_empty($assign_by, 'Please add assign_by');
			$this->check_empty($assign_to, 'Please add assign_to');
			$this->check_empty($products, 'Please add products');
			
			//Check user banned
			$this->checkUserSuspend($user_id);
		
			$products_arr = explode( ",", $products);
			$products = array();
			
			$finalProducts = $this->OrderAssignments->find('list',[
				'keyField' => 'id',
				'valueField' => 'package_id'
			])->select('OrderAssignments.id,OrderAssignments.package_id')
			->where(['OrderAssignments.id IN' => $products_arr])
			->toArray(); 
			

			if(is_array($finalProducts) AND !empty($finalProducts)){
				   
			   foreach($finalProducts as $product_id){
						
					$pkgData='';				
						
					$orderPkgsData = $this->OrderPackages->find('all')->where(['OrderPackages.id' => $product_id])->first();
					$orderID = $orderPkgsData->order_id;
						
					$orderAssignResults= $this->OrderAssignments->find('all')->where(['OrderAssignments.package_id' => $product_id,'OrderAssignments.order_id' => $orderID,'OrderAssignments.assign_to' => $assign_by])->first();
											
					if(count($orderAssignResults) <=0){
								
						$assignData=0;
								
					}else{
							$assignData = $this->OrderAssignmentLogs->find('all')->where(['OrderAssignmentLogs.assign_to' => $assign_to,'OrderAssignmentLogs.order_assignment_id' => $orderAssignResults->id,'OrderAssignmentLogs.order_id' => $orderID,
							'OrderAssignmentLogs.status IN' => [1,2,3]])->count();
					}
						
					if($assignData <= 0){
						
						$OrderAssignmentLogs = $this->OrderAssignmentLogs->newEntity();
						$OrderAssignmentLogs->assign_by = $assign_by;
						
						if($shipment_type == 1 || $shipment_type == 3){
							$OrderAssignmentLogs->assign_to = $assign_by;
							$OrderAssignmentLogs->status = 2;
						
						}else if($shipment_type == 2){
							
							$OrderAssignmentLogs->assign_to = $assign_to;
							$OrderAssignmentLogs->status = 1;
						}
						
						if($shipment_type == 3){
							$OrderAssignmentLogs->tracking_number = $tracking_number;
						}
										
						$OrderAssignmentLogs->order_id = $orderID;
						$OrderAssignmentLogs->package_id = $product_id;
						$OrderAssignmentLogs->order_assignment_id = $orderAssignResults->id;
						
						$OrderAssignmentLogs->source = $source;
						$OrderAssignmentLogs->destination = $destination;
						$OrderAssignmentLogs->shipment_type = $shipment_type;
						
						if($this->OrderAssignmentLogs->save($OrderAssignmentLogs)){
							
							//Update the status into order pakage table as well
							$OrderAssignmentsData = $this->OrderAssignments->newEntity();
							$OrderAssignmentsData->status_to = 2;
							$OrderAssignmentsData->id = $orderAssignResults->id;
							$this->OrderAssignments->save($OrderAssignmentsData);
							//SET Email Content Of Pkg
							$pkgData = $this->OrderPackages->get($product_id);
							$order_info .= "<p>Package Number: ".$pkgData->package_number."</p>"; //Set email content;
							$order_info .= "<p>Package Title: ".$pkgData->package_title."</p>"; //Set email content;
						}
						
					}else{

						$assignLOGData = $this->OrderAssignmentLogs->find('all')->where(['OrderAssignmentLogs.order_assignment_id' => $orderAssignResults->id,'OrderAssignmentLogs.order_id' => $orderID,'OrderAssignmentLogs.assign_to' => $assign_to,
						'OrderAssignmentLogs.status IN' => [1,2,3]]);
						
						if(!empty($assignLOGData->count() > 0)){
							
							$aData = $assignLOGData->first();
							$OrderAssignmentLOGs = $this->OrderAssignmentLogs->newEntity();
              				$OrderAssignmentLOGs->id = $aData->id;
							$OrderAssignmentLOGs->assign_by = $assign_by;
              
							if($shipment_type == 1 || $shipment_type == 3){
								$OrderAssignmentLOGs->assign_to = $assign_by;
								$OrderAssignmentLOGs->status = 2;
							}else if($shipment_type == 2){
								$OrderAssignmentLOGs->assign_to = $assign_to;
								$OrderAssignmentLOGs->status = 1;
							}
                  
							if($shipment_type == 3){
								$OrderAssignmentLOGs->tracking_number = $tracking_number;
							}
										   
							$OrderAssignmentLOGs->order_id = $orderID;
							$OrderAssignmentLOGs->package_id = $product_id;
							$OrderAssignmentLOGs->source = $source;
							$OrderAssignmentLOGs->destination = $destination;
                  
						  if($this->OrderAssignmentLogs->save($OrderAssignmentLOGs)){
							  //Update the status into order pakage table as well
							$OrderAssignmentsData = $this->OrderAssignments->newEntity();
							$OrderAssignmentsData->status_to = 2;
							$OrderAssignmentsData->id = $orderAssignResults->id;
							$this->OrderAssignments->save($OrderAssignmentsData);
						  }
						}
					}
						
					$agentDetail = $this->Users->get( $assign_by , ['contain' => [] ] );
					/*Update Data into log table Start*/
					$UserLogs = $this->UserLogs->newEntity();
					$UserLogs->notification_from = $assign_by;
					$UserLogs->notification_to = $assign_to;
					$UserLogs->package_id = $product_id;
					$UserLogs->order_id = $orderID;
					$UserLogs->notification_type = 'order';
					$UserLogs->description = "New order has been assigned by ".ucwords($agentDetail->name);
					$this->UserLogs->save($UserLogs);
					/*Update Data into log table End*/
					
				}
					
				$agentDetail = $this->Users->get( $assign_by , ['contain' => [] ] );
				$driverDetail = $this->Users->get( $assign_to , ['contain' => [] ] );
												
							
				$order_info .= "<p>Order Id : $orderID</p>"; //Set email content;
				$order_info .= "<p>Source : ".$source."</p>"; //Set email content;
				$order_info .= "<p>Destination : ".$destination."</p>"; //Set email content;
				
				$replace = array('{agent_name}','{assign_by_email}','{assigned_by_name}','{order_info}');
				$with = array($driverDetail->name, $agentDetail->email, $agentDetail->name, $order_info);
				
				//Send email function
				$this->send_email('',$replace,$with,'order_assign_to_agent',$driverDetail->email);
									
				//Start send notification 
					$badgeCount = $this->getNotificationBadgesCount($assign_to);
					$orderDet = $this->Orders->get( $orderID , ['contain' => [] ] );
					$params = [
						'type' => 'assinOrder', 
						'badgeCount' => $badgeCount, 
						'package_id' => $product_id,
						'order_id' => $orderID,
						'order_number' => $orderDet->descrates_app_id,
						'notification_type' => 'order',
						'topic' => 'sky2c'.$assign_to,
						'notifyId' => $assign_to
					];
					$message = 'Order has been assign you by '.$agentDetail->name;

					$firebase = new Firebase();
					$firebase->firebaseCloudMessage($params,$message); 
					//End notification
					
					$resultJ = json_encode(array('status' => '200' , 'message' => 'Order has been assign successfully.'));
				}else{
				   $resultJ = json_encode(array('status' => '301' , 'message' => 'Unable to assign order.'));
				}
			$this->json_response($resultJ);
		  }
		}
		
		function changeProductsStatus(){
			
			$this->loadModel('OrderAssignments');
			$this->loadModel('OrderAssignmentLogs');
			$this->loadModel('UserLogs');
			$this->loadModel('Orders');
      $this->loadModel('OrderPackages');
      $this->loadModel('Users');
			$order_info = "";
			
			if ($this->request->is('post')) {
					$resultJ = "";
					$products = isset($this->request->data['products']) ? $this->request->data['products'] : "";
					$status = isset($this->request->data['status']) ? $this->request->data['status'] : "";
					$user_id = isset($this->request->data['user_id']) ? $this->request->data['user_id'] : "";
					
					$this->check_empty($products, 'Please add products');
					$this->check_empty($status, 'Please add status');
					$this->check_empty($user_id, 'Please user_id status');
					
					//Check user banned
					$this->checkUserSuspend($user_id);

					$products_arr = explode( ",", $products);
					$products = array();
					foreach ($products_arr as $p) {
					  $products[] = trim($p);
					}

					if($status === "accept"){
						
							$action_for_email = "accepted";
						   if(is_array($products) AND !empty($products)){
							
							  foreach($products as $product_id){
								
								  $assignData = $this->OrderAssignmentLogs->find('all')
									  ->where(['OrderAssignmentLogs.order_assignment_id' => $product_id, 'OrderAssignmentLogs.assign_to' => $user_id, 'OrderAssignmentLogs.status' => 1])
									  ->contain(['driver_detail','agent_detail','OrderAssignments'=>['Orders','OrderPackages']])->first();
								//print_r($assignData) ; die;
								 
								  $this->OrderAssignmentLogs->updateAll(['status' => 2], [
											'order_assignment_id' => $product_id,
											'assign_to' => $user_id,
											'status' => 1
										]);   
						
									$orderID = $assignData->order_id;
									$packageID = $assignData->package_id;
									$agent_id = $assignData->agent_detail->id;
									$driver_name = $assignData->driver_detail->name;
									$source = $assignData->order_assignment->order->source;
									$destination = $assignData->order_assignment->order->destination;
									
								 //SET Email Content Of Pkg
									$order_info .= "<p>Package Number: ".$assignData->order_assignment->order_package->package_number."</p>"; //Set email content;
									$order_info .= "<p>Package Title: ".$assignData->order_assignment->order_package->package_title."</p>"; //Set email content;
									
										/*Update Data into log table Start*/
										$UserLogs = $this->UserLogs->newEntity();
										$UserLogs->notification_from = isset($user_id)?$user_id:1;
										$UserLogs->notification_to = isset($agent_id)?$agent_id:1;
										$UserLogs->order_id = isset($orderID)?$orderID:0;
										$UserLogs->package_id = isset($packageID)?$packageID:0;
										$UserLogs->notification_type = 'order';
										$UserLogs->description = "Order has been $action_for_email by ".ucwords($driver_name);
										$this->UserLogs->save($UserLogs);
										/*Update Data into log table End*/
							  }

							  $resultJ = json_encode(array('status' => '200' , 'message' => 'Product has been accepted.'));
							}
					}else if($status === "reject"){
						
					  $action_for_email = "rejected";
						   if(is_array($products) AND !empty($products)){ 
								

							foreach($products as $product_id){
								
									$assignData = $this->OrderAssignmentLogs->find('all')
											  ->where(['OrderAssignmentLogs.order_assignment_id' => $product_id])
											  ->contain(['driver_detail','agent_detail','OrderAssignments'=>['Orders','OrderPackages']])
											  ->first();	
											 
											$this->OrderAssignments->updateAll([
													  'status_to' => 1 
												  ], [
													  'id' => $product_id
												  ]);  
											$update = $this->OrderAssignmentLogs->updateAll([
													  'status' => 4 
												  ], [
													  'order_assignment_id' => $product_id,
													  'status' => 1
												  ]);   

                  /***************** change package and order status in case of driver is of admin start here *********/
                  
                  $userData = $this->Users->find('all')->where([
                        'Users.id' => $user_id])
                      ->first();
                  $adminID = $userData->parent_id;
                  if($adminID==1){
                      $this->OrderPackages->updateAll([
                        'status' => 1 
                      ], [
                        'id' => $assignData->order_assignment->package_id,
                        'order_id' => $assignData->order_assignment->order_package->order_id
                      ]);  

                    $orderCount = $this->OrderPackages->find('all')
                              ->where(['OrderPackages.order_id' => $assignData->order_assignment->order_package->order_id,'OrderPackages.status !='=>1 ])->hydrate(false)->toArray();

                    if(empty($orderCount)){
                      $this->Orders->updateAll([
                          'status' => 1 
                        ], [
                          'id' => $assignData->order_assignment->order_package->order_id
                        ]);
                    }
                  }

                  /***************** change package and order status in case of driver is of admin end here *********/

											
									$orderID = $assignData->order_assignment->order_package->order_id;
									$packageID = $assignData->order_assignment->package_id;
									$agent_id = $assignData->agent_detail->id;
									$driver_name = $assignData->driver_detail->name;
									$source = $assignData->order_assignment->order->source;
									$destination = $assignData->order_assignment->order->destination;

									$order_info .= "<p>Package Number: ".$assignData->order_assignment->order_package->package_number."</p>"; //Set email content;
									$order_info .= "<p>Package Title: ".$assignData->order_assignment->order_package->package_title."</p>"; //Set email content;
									
									/*Update Data into log table Start*/
									$UserLogs = $this->UserLogs->newEntity();
									$UserLogs->notification_from = isset($user_id)?$user_id:1;
									$UserLogs->notification_to = isset($agent_id)?$agent_id:1;
									$UserLogs->order_id = $orderID;
									$UserLogs->package_id = $packageID;
									$UserLogs->notification_type = 'order';
									$UserLogs->description = "Order has been $action_for_email by ".ucwords($driver_name);
									$this->UserLogs->save($UserLogs);
									/*Update Data into log table End*/
							}

							$resultJ = json_encode(array('status' => '200' , 'message' => 'Product has been rejected.'));
						  }

					}
					
						$agent_id = $assignData->agent_detail->id;
						$agent_email = $assignData->agent_detail->email;
						$agent_name = $assignData->agent_detail->name;
						$driver_id = $assignData->driver_detail->id;
						$driver_email = $assignData->driver_detail->email;
						$driver_name = $assignData->driver_detail->name;
												
						$order_info .= "<p>Order Id : $orderID</p>"; //Set email content;
						$order_info .= "<p>Source : ".$source."</p>"; //Set email content;
						$order_info .= "<p>Destination : ".$destination."</p>"; //Set email content;
					  
						$replace = array('{agent_name}','{driver_name}','{action}','{order_id}','{pkg_number}','{pkg_title}');
						$with = array($agent_name, $driver_name, $action_for_email, $orderID, $order_info , "");
						//Send email function
						$this->send_email('',$replace,$with,'order_response_to_agent',$agent_email);
						$this->send_email('',$replace,$with,'order_response_to_driver',$driver_email);
						//SET Email Content Of Pkg

						//Start send notification 
							$badgeCount = $this->getNotificationBadgesCount($agent_id);
							
							$orderDet = $this->Orders->get($orderID, ['contain' => []]);
							$params = [
								'type' => 'assinOrder', 
								'topic' => 'sky2c'.$agent_id,
								'badgeCount' => $badgeCount,
								'package_id' => $packageID,
								'order_id' => $orderID,
								'order_number' => $orderDet->descrates_app_id,
								'notification_type' => 'order',
								'notifyId' => $agent_id
							];
							$message = 'Order has been '.$action_for_email.' by '.$driver_name;

							$firebase = new Firebase();
							$firebase->firebaseCloudMessage($params,$message); 
						//End notification

				  $this->json_response($resultJ);
			  }
		}
		
		
		function scannedOrderInfo(){     
      //Configure::write("debug",true);
		  $this->loadModel('Orders');
		  $this->loadModel('OrderDetails');
		  $this->loadModel('OrderPackages');
		  $this->loadModel('OrderTracking');
		  $this->loadModel('OrderAssignments');
		  $this->loadModel('OrderAssignmentLogs');
		  $this->loadModel('UserLogs');
      $this->loadModel('Users');
			
		  if ($this->request->is('post')){
			  
				$single_or_multiple_product_id = isset($this->request->data['product_id']) ? $this->request->data['product_id'] : "";
				
				$user_id = isset($this->request->data['user_id']) ? $this->request->data['user_id'] : "";
				$role = isset($this->request->data['role']) ? $this->request->data['role'] : "";
			   
				$latitude = isset($this->request->data['latitude']) ? $this->request->data['latitude'] : "";
				$longitude = isset($this->request->data['longitude']) ? $this->request->data['longitude'] : "";
				$status = isset($this->request->data['status']) ? $this->request->data['status'] : "";
				$image = isset($this->request->data['image']) ? $this->request->data['image'] : "";
				
				$this->check_empty($role, 'Please add role');
				$this->check_empty($single_or_multiple_product_id, 'Please add product_id');
				$this->check_empty($user_id, 'Please add user_id');

				$this->check_empty($latitude, 'Please add latitude');
				$this->check_empty($longitude, 'Please add longitude');
				$this->check_empty($status, 'Please add status');
				
				if($status == 4){
					$this->check_empty($image, 'Please provide customer signature');
				}
				//Check user banned
				$this->checkUserSuspend($user_id);
				
				$productIdArray = explode(",",$single_or_multiple_product_id);  
				
				if(!empty($productIdArray)){
					
					/*SCANNING ADDRESS RECORDS*/
					$curl = curl_init();
					curl_setopt_array($curl, array(
						CURLOPT_URL => "https://maps.googleapis.com/maps/api/geocode/json?key=AIzaSyBocYrNOAgaLXzR7039EQn_LEpY6weMX-Y&latlng=".$latitude."%2C".$longitude."&sensor=true",
						CURLOPT_RETURNTRANSFER => true,
						CURLOPT_ENCODING => "",
						CURLOPT_MAXREDIRS => 10,
						CURLOPT_TIMEOUT => 30,
						CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
						CURLOPT_CUSTOMREQUEST => "GET",
					));

					$response = curl_exec($curl);
					$err = curl_error($curl);

					curl_close($curl);

					$response_arr = json_decode($response);
				
					if($response_arr->status == "OK"){
						$address = $response_arr->results[0]->formatted_address;
							
						if(isset($response_arr->results[0])) {
							//print_r($response_arr->results[0]->address_components); die;
							for($j=0; $j < count($response_arr->results[0]->address_components); $j++){

								$cn=array($response_arr->results[0]->address_components[$j]->types[0]);

								if(in_array("postal_code", $cn)){
									$postal_code= $response_arr->results[0]->address_components[$j]->long_name;
								}
								
								if(in_array("locality", $cn)){
									$city = isset($response_arr->results[0]->address_components[$j]->short_name)?$response_arr->results[0]->address_components[$j]->short_name:$response_arr->results[0]->address_components[$j]->long_name;
								}
								
								if(in_array("administrative_area_level_1", $cn)){
									$state = $response_arr->results[0]->address_components[$j]->long_name;
								}
								
								if(in_array("country", $cn)){
									$country= $response_arr->results[0]->address_components[$j]->long_name;
								}
							}
						}
					}else{
						$address = "";
					}
					
					
					/*SCANNING ADDRESS RECORDS*/
										
					foreach($productIdArray as $product_id){
						
						$package = $this->OrderPackages->find('all')->where(['OrderPackages.package_number' => $product_id])->first();
						
						$orderPartyDet = $this->OrderDetails->find("all")->where(['OrderDetails.party_type'=>'Consignee','OrderDetails.order_id'=>$package->order_id])->first();		

						if(!empty($orderPartyDet)){
							$ConsigneeCountry = $orderPartyDet->country_code;
							$ConsigneeState = $orderPartyDet->state_or_province_code;
							$ConsigneeCity = $orderPartyDet->city_name;
							$ConsigneePostalCode = $orderPartyDet->postal_code;
						}
												
						if($package->status==3){
							
							$resultJ = json_encode(array('status' => '200' , 'message' => 'This order already completed, Kindly scan different order\'s label.'));
							$this->json_response($resultJ);
						
						}else{
							
							if(empty($package)){
						
								$resultJ = json_encode(array('status' => '200' , 'message' => 'Product not found'));
								$this->json_response($resultJ);

							}else{

								$orderRec = $this->Orders->get( $package->order_id, ['contain' => []]);
                
								//if($status == 1 || $status == 2 || $status == 6){							      
						        //Check role is agent or staff
						        if($role == 2 || $role == 3){
  										$checkOrderIsAlreadyAssigned= $this->OrderAssignmentLogs->find('all')->where(['OrderAssignmentLogs.package_id' => $package->id,'OrderAssignmentLogs.order_id' => $package->order_id,'OrderAssignmentLogs.status IN' => [1,2],'OrderAssignmentLogs.assign_to' =>$user_id])->count();
  									}    
									
									//echo $checkOrderIsAlreadyAssigned; die;
									//Check role is driver
									if($role == 4){
										
										$checkOrderIsAlreadyAssigned = $this->OrderAssignmentLogs->find('all')->where(['OrderAssignmentLogs.package_id' => $package->id,'OrderAssignmentLogs.order_id' => $package->order_id,'OrderAssignmentLogs.status IN' => [1,2],'OrderAssignmentLogs.assign_to' =>$user_id])->count();
										
									}          
									
									if($checkOrderIsAlreadyAssigned<=0){                    
										$this->assignAutoOrder($role, $user_id,$package,$orderRec);
									}						
								
								//}
								
								if($status == 4){
									
									$OrderAssignmentLogsQuery =  $this->OrderAssignmentLogs->query();
									
									if($role == 4){
										
										//UPDATE ORDER ASSIGNMENT LOG TABLE STATUS
										if($OrderAssignmentLogsQuery->update()
														->set(['status'=>3])
														->where(['order_id' => $package->order_id,'package_id' => $package->id,'assign_to' => $user_id])->execute()){
															
											//GET ORDER ASSIGNMENT ID			
											$OrderAssignmentLogsData = $this->OrderAssignmentLogs->find('all')->where(['OrderAssignmentLogs.order_id' => $package->order_id,'OrderAssignmentLogs.package_id' =>  $package->id,'OrderAssignmentLogs.assign_to' => $user_id])->hydrate(false)->first();	
											
											$order_assignment_id = $OrderAssignmentLogsData['order_assignment_id'];
											
																						
											//UPDATE ORDER ASSIGNMENT TABLE 
											$OrderAssignmentsQuery =  $this->OrderAssignments->query();
											if($OrderAssignmentsQuery->update()
														->set(['status_to'=>1,'status_by'=>2])
														->where(['id' => $order_assignment_id])
														->execute()){
										
												if(strtolower($ConsigneePostalCode)==strtolower($postal_code)){
													
													if($OrderAssignmentsQuery->update()
													->set(['status_to'=>3,'status_by'=>3])
													->where(['id' => $order_assignment_id])
													->execute()){
											
														$OrderPackagesQuery =  $this->OrderPackages->query();
														if($OrderPackagesQuery->update()
																->set(['status'=>3])
																->where(['id' =>  $package->id])
																->execute()){
																	
															//GET All Packages Status of orders		
															$OrderPackagesCount = $this->OrderPackages->find('all')->where(['OrderPackages.order_id' => $package->order_id,'OrderPackages.status IN' => ['1','2']])->count();	
															if($OrderPackagesCount<=0){
																$OrdersQuery =  $this->Orders->query();
																$OrdersQuery->update()
																					->set(['status'=>3])
																					->where(['id' =>  $package->order_id])
																					->execute();
															}
														}//End Update  package status
													
													}//End Update Order assignment status
												}
											}//End Update Order assignment status
															
										}//End Update Order assignment log status
									
									}else{
										
										//UPDATE ORDER ASSIGNMENT LOG TABLE STATUS
										if($OrderAssignmentLogsQuery->update()
														->set(['status'=>3])
														->where(['order_id' => $package->order_id,'package_id' => $package->id,'assign_to' => $user_id])->execute()){
															
											//GET ORDER ASSIGNMENT ID			
											$OrderAssignmentLogsData = $this->OrderAssignmentLogs->find('all')->where(['OrderAssignmentLogs.order_id' => $package->order_id,'OrderAssignmentLogs.package_id' =>  $package->id,'OrderAssignmentLogs.assign_to' => $user_id])->hydrate(false)->first();	
											
											$order_assignment_id = $OrderAssignmentLogsData['order_assignment_id'];
											
											//UPDATE ORDER ASSIGNMENT TABLE 
											$OrderAssignmentsQuery =  $this->OrderAssignments->query();
											if($OrderAssignmentsQuery->update()
														->set(['status_to'=>3,'status_by'=>3])
														->where(['id' => $order_assignment_id])
														->execute()){
												/*echo strtolower($ConsigneePostalCode).'=='.strtolower($postal_code); die;*/
												if(strtolower($ConsigneePostalCode)==strtolower($postal_code)){
													$OrderPackagesQuery =  $this->OrderPackages->query();
													if($OrderPackagesQuery->update()
															->set(['status'=>3])
															->where(['id' =>  $package->id])
															->execute()){
																
														//GET All Packages Status of orders		
														$OrderPackagesCount = $this->OrderPackages->find('all')->where(['OrderPackages.order_id' => $package->order_id,'OrderPackages.status IN' => ['1','2']])->count();	
														if($OrderPackagesCount<=0){
															$OrdersQuery =  $this->Orders->query();
															$OrdersQuery->update()
																				->set(['status'=>3])
																				->where(['id' =>  $package->order_id])
																				->execute();
														}
													}//End Update  package status
												
												}
											
											}//End Update Order assignment status
															
										}//End Update Order assignment log status
									}
									
									
								}//End Deliver status braces


                /*************************** In case of pickup if driver do not accept order then it will automatically accept that order start here *******************************/
                if(in_array($status,array("1","2","3","6"))){
                  if($role==4){
                    $OrderAssignmentLogsQuery1 =  $this->OrderAssignmentLogs->query();
                    $OrderAssignmentLogsQuery1->update()
                            ->set(['status'=>2])
                            ->where(['order_id' => $package->order_id,'package_id' => $package->id,'assign_to' => $user_id])->execute();
                  }
                }
                /*************************** In case of pickup if driver do not accept order then it will automatically accept that order end here *******************************/

								
								if(in_array($status,array("5","7"))){
																
									$OrderAssignmentLogsQuery =  $this->OrderAssignmentLogs->query();
									
									if($role==4){
										
										//UPDATE ORDER ASSIGNMENT LOG TABLE STATUS reopen order state
										if($OrderAssignmentLogsQuery->update()
														->set(['status'=>3])
														->where(['order_id' => $package->order_id,'package_id' => $package->id,'assign_to' => $user_id])->execute()){
															
											//GET ORDER ASSIGNMENT ID			
											$OrderAssignmentLogsData = $this->OrderAssignmentLogs->find('all')->where(['OrderAssignmentLogs.order_id' => $package->order_id,'OrderAssignmentLogs.package_id' =>  $package->id,'OrderAssignmentLogs.assign_to' => $user_id])->hydrate(false)->first();	
											
											$order_assignment_id = $OrderAssignmentLogsData['order_assignment_id'];
											
											//UPDATE ORDER ASSIGNMENT TABLE 
											$OrderAssignmentsQuery =  $this->OrderAssignments->query();
											if($OrderAssignmentsQuery->update()
														->set(['status_to'=>1,'status_by'=>2])
														->where(['id' => $order_assignment_id])
														->execute()){


                          /******************** in case of admin driver it will send order in enroute start here  **********************/
                              $userData = $this->Users->find('all')->where([
                                'Users.id' => $user_id])
                              ->first();
                              $adminID = $userData->parent_id;

                              if($adminID==1){
                                $OrderPackagesQuery =  $this->OrderPackages->query();
                                if($OrderPackagesQuery->update()
                                    ->set(['status'=>4])
                                    ->where(['id' =>  $package->id])
                                    ->execute()){
                                      
                                  //GET All Packages Status of orders   
                                  $OrderPackagesCount = $this->OrderPackages->find('all')->where(['OrderPackages.order_id' => $package->order_id,'OrderPackages.status IN' => ['1','2']])->count(); 
                                  if($OrderPackagesCount<=0){
                                    $OrdersQuery =  $this->Orders->query();
                                    $OrdersQuery->update()
                                              ->set(['status'=>4])
                                              ->where(['id' =>  $package->order_id])
                                              ->execute();
                                  }
                                }//End Update  package status
                              }

                              /******************** in case of admin driver it will send order in enroute end here  **********************/
                          
												
											}//End Update Order assignment status
															
										}//End Update Order assignment log status
									
									}else{
										
										//GET ORDER ASSIGNMENT ID			
										$OrderAssignmentLogsData = $this->OrderAssignmentLogs->find('all')->where(['OrderAssignmentLogs.order_id' => $package->order_id,'OrderAssignmentLogs.package_id' =>  $package->id,
										'OrderAssignmentLogs.assign_to' => $user_id,
										'OrderAssignmentLogs.status IN' => [1,2]])->hydrate(false)->first();	
										//echo "<pre>"; print_r($OrderAssignmentLogsData); die;
										if(!empty($OrderAssignmentLogsData)){
											
											$order_assignment_id = $OrderAssignmentLogsData['order_assignment_id'];
											
											//UPDATE ORDER ASSIGNMENT LOG TABLE STATUS reopen order state
											if($OrderAssignmentLogsQuery->update()
															->set(['status'=>3])
															->where([
																'order_id' => $package->order_id,
																'package_id' => $package->id,
																'assign_to' => $user_id,
																'order_assignment_id' => $order_assignment_id
															])->execute()){
																
													
												
												//UPDATE ORDER ASSIGNMENT TABLE 
												$OrderAssignmentsQuery =  $this->OrderAssignments->query();
												if($OrderAssignmentsQuery->update()
															->set(['status_to'=>3,'status_by'=>3])
															->where(['id' => $order_assignment_id])
															->execute()){
													
													$OrderPackagesQuery =  $this->OrderPackages->query();
													if($OrderPackagesQuery->update()
															->set(['status'=>4])
															->where(['id' =>  $package->id])
															->execute()){
																
														//GET All Packages Status of orders		
														$OrderPackagesCount = $this->OrderPackages->find('all')->where(['OrderPackages.order_id' => $package->order_id,'OrderPackages.status IN' => ['1','2']])->count();	
														if($OrderPackagesCount<=0){
															$OrdersQuery =  $this->Orders->query();
															$OrdersQuery->update()
																				->set(['status'=>4])
																				->where(['id' =>  $package->order_id])
																				->execute();
														}
													}//End Update  package status
												
												}//End Update Order assignment status
																
											}//End Update Order assignment log status
										}
									}
									
								}//End Deliver status braces
							
							}
							
							switch ($status){
								case 1:
									$description =  "Picked up from $city, $postal_code";
									break;
								case 2:
									$description = "Picked up from warehouse";
									break;
								case 3:
									$description =  "Attempt of delivery but not delivered";
									break;
								case 4:
									$description =  "Order has been delivered";
									break;
								case 5:
									$description =  "Drop off at warehouse";
									break;
								case 6:
									$description =  "Pickup from Airport";
									break;			
								case 7:
									$description =  "Drop-off​​ to​​ Airport";
									break;			
								default:	
									$description =  "Tendered to authorized agent for final delivery";
									break;			
								} 
							
							$orderScannedData = $this->OrderTracking->newEntity();
							$orderScannedData = $this->OrderTracking->patchEntity($orderScannedData, $this->request->data);
							$orderScannedData->package_id = $package->id;
							$orderScannedData->tracking_description = $description;
							$orderScannedData->location = $address;
							$orderScannedData->zip = isset($postal_code)?$postal_code:'';
							$orderScannedData->city = isset($city)?$city:'';
							$orderScannedData->state = isset($state)?$state:'';
							$orderScannedData->country = isset($country)?$country:'';
							$orderScannedData->order_id = $package->order_id;
                            date_default_timezone_set('UTC');
                            $orderScannedData->third_party_status_date = date('Y-m-d H:i:s');
							
							if($status == 4){
								$this->check_empty($image, 'Please provide customer signature');
								//ADD SIGNATURE IMAGE WITH TRACKING DETAILS IF ORDER STATUS DELIVERED
								if(!empty($image)){
								
									$imageData = @$this->request->data['image'];
									if($imageData['name']!=''){
										$userDocument = $this->upload_file('customerSignature',$imageData);
										$userDocument = explode(':',$userDocument);

										if($userDocument[0]=='error'){
											$resultJ = json_encode(array('status' => '200' , 'message' => $profileImage[1]));
											$this->json_response($resultJ);
										}else{
											$orderScannedData->customer_signature =  $userDocument[1];
										}               
									}
									unset($this->request->data['image']);
								
								}//End Document upload Code
							}
							unset($orderScannedData->image);
							
						
							if($this->OrderTracking->save($orderScannedData))
							{	
								//Start send notification 
								$not_data= $this->OrderAssignmentLogs->find('all')->where([
												'OrderAssignmentLogs.order_id' => $package->order_id,
												'OrderAssignmentLogs.package_id' => $package->id,
												'OrderAssignmentLogs.assign_to' => $user_id,
												'OrderAssignmentLogs.status IN' => [2,3,5]])
											->first();
									
								if(!empty($not_data)){
									
									$badgeCount = $this->getNotificationBadgesCount($not_data->assign_by);
									
									$orderDet = $this->Orders->get($package->order_id, ['contain' => []]);
									
                  if($role == 4){ // notification will be send by driver only
  									$params = [
  										'type' => 'assinOrder', 
  										'topic' => 'sky2c'.$not_data->assign_by,
  										'badgeCount' => $badgeCount,
  										'package_id' =>$package->id,
  										'order_id' => $package->order_id,
  										'order_number' => $orderDet->descrates_app_id,
  										'notification_type' => 'track',
  										'notifyId' => $not_data->assign_by
  									];
  									$message = $description;
  									//pr($params); die;
  									$firebase = new Firebase();
  									
  									$firebase->firebaseCloudMessage($params,$message); 

                    /*Update Data into log table Start*/
                    $UserLogs = $this->UserLogs->newEntity();
                    
                    $UserLogs->notification_from = isset($not_data->assign_to)?$not_data->assign_to:1;
                    $UserLogs->notification_to = isset($not_data->assign_by)?$not_data->assign_by:1;
                    $UserLogs->order_id = $package->order_id;
                    $UserLogs->package_id = $package->id;
                    $UserLogs->notification_type = 'track';
                    $UserLogs->description = $description;
                    
                    $this->UserLogs->save($UserLogs);
                    /*Update Data into log table End*/

                  }else{
                      /* sending notification admin in case of admin or staff scaaning package */
                      $userData = $this->Users->find('all')->where([
                        'Users.id' => $user_id])
                      ->first();
                      $adminID = $userData->parent_id;

                      /*Update Data into log table Start*/
                      $UserLogs = $this->UserLogs->newEntity();
                      
                      $UserLogs->notification_from = isset($not_data->assign_to) ? $not_data->assign_to : 1;
                      $UserLogs->notification_to = isset($adminID) ? $adminID : 1;
                      $UserLogs->order_id = $package->order_id;
                      $UserLogs->package_id = $package->id;
                      $UserLogs->notification_type = 'track';
                      $UserLogs->description = $description;
                      
                      $this->UserLogs->save($UserLogs);
                    /*Update Data into log table End*/
                      /* sending notification admin in case of admin or staff scaaning package */
                  }
									
								}			
								//End notification
								
								

							
								$resultJ = json_encode(array('status' => '200' , 'message' => 'Package scanned successfully.'));
							}else{
								$resultJ = json_encode(array('status' => '301' , 'message' => 'Unable to scanned the package.'));
							}
							
						}
			
					}
					
					$this->json_response($resultJ);
				}
				
			}
		}
		
		/*Function for used order assignment auto when driver/agent scan the label very first time when we get the email from staff*/
    function assignAutoOrder($role,$user_id,$pkgData,$orderRec){
      
      $this->loadModel('Users');
      $this->loadModel('UserLogs');
      $this->loadModel('OrderPackages');
      $this->loadModel('OrderAssignments');
      $this->loadModel('OrderAssignmentLogs');
      
      $userRec = $this->Users->get( $user_id, ['contain' => []]);
      
      if(!empty($userRec)){
        $parentRec = $this->Users->get($userRec->parent_id, ['contain' => []]);
      }
      
      $package_id = $pkgData->id;
      $order_id = $pkgData->order_id;
      $order_info='';
              
      if($role==3 || $role==2){
      
        $Assigncount = $this->OrderAssignments->find('all')->where(['OrderAssignments.order_id' => $order_id,'OrderAssignments.package_id' => $package_id,'OrderAssignments.assign_to' => $user_id,'OrderAssignments.status_to IN' => [1,2]]);
        
        if($Assigncount->count() <= 0){
          
          $OrderAssignments = $this->OrderAssignments->newEntity();
            
          $OrderAssignments->assign_by = $userRec->parent_id;
          $OrderAssignments->assign_to = $user_id;          
          $OrderAssignments->order_id = $order_id;
          $OrderAssignments->package_id = $package_id;
          $OrderAssignments->source = $orderRec->source;
          $OrderAssignments->destination = $orderRec->destination;
          $OrderAssignments->status_by = 2;
          $OrderAssignments->status_to = 1;
          if($this->OrderAssignments->save($OrderAssignments)){
                          
            //Update the status into order pakage table as well
            $OrderPackagesData = $this->OrderPackages->newEntity();
            $OrderPackagesData->status = 2;
            $OrderPackagesData->id = $package_id;
            $this->OrderPackages->save($OrderPackagesData);
            //SET Email Content Of Pkg
            
            $order_info .= "<p>Package Number: ".$pkgData->package_number."</p>"; //Set email content;
            $order_info .= "<p>Package Title: ".$pkgData->package_title."</p>"; //Set email content;
            
            $Assigncount = $this->OrderAssignments->find('all')->where(['OrderAssignments.order_id' => $order_id,'OrderAssignments.package_id' => $package_id,'OrderAssignments.assign_to' => $user_id,'OrderAssignments.status_to IN' => [1,2]]);
            $assignment_data = $Assigncount->first();
            $OrderAssignmentLogs = $this->OrderAssignmentLogs->newEntity();
            
            $OrderAssignmentLogsDataChk = $this->OrderAssignmentLogs->find('all')->where(['OrderAssignmentLogs.order_id' => $order_id,'OrderAssignmentLogs.package_id'=>$package_id,'OrderAssignmentLogs.order_assignment_id' => $assignment_data->id,'OrderAssignmentLogs.status IN' => [1,2]])->hydrate(false)->first();  
            
            if(!empty($OrderAssignmentLogsDataChk)){
              $OrderAssignmentLogs->id = $OrderAssignmentLogsDataChk->id;
            }   
            $OrderAssignmentLogs->assign_by = $user_id;
            $OrderAssignmentLogs->assign_to = $user_id; 
            $OrderAssignmentLogs->status = 2;
                            
            $OrderAssignmentLogs->order_id = $order_id;
            $OrderAssignmentLogs->package_id = $package_id;
            $OrderAssignmentLogs->order_assignment_id = $assignment_data->id;
            
            $OrderAssignmentLogs->source = $orderRec->source;
            $OrderAssignmentLogs->destination = $orderRec->destination;
            $OrderAssignmentLogs->shipping_carrier_id = 0;
            $OrderAssignmentLogs->shipment_type = 'self';
            
            if($this->OrderAssignmentLogs->save($OrderAssignmentLogs)){
              //Update the status into order pakage table as well
              $OrderAssignmentsData = $this->OrderAssignments->newEntity();
              $OrderAssignmentsData->status_to = 2;
              $OrderAssignmentsData->id = $assignment_data->id;
              $this->OrderAssignments->save($OrderAssignmentsData);
              //SET Email Content Of Pkg
            
              $pkgData = $this->OrderPackages->get($package_id);
              $order_info .= "<p>Package Number: ".$pkgData->package_number."</p>"; //Set email content;
              $order_info .= "<p>Package Title: ".$pkgData->package_title."</p>"; //Set email content;
            }
            
          }
        }else{
          $assignment_data = $Assigncount->first();
          
          $OrderAssignmentLogs = $this->OrderAssignmentLogs->newEntity();
              
          $OrderAssignmentLogs->assign_by = $user_id;
          $OrderAssignmentLogs->assign_to = $user_id; 
          $OrderAssignmentLogs->status = 2;
                          
          $OrderAssignmentLogs->order_id = $order_id;
          $OrderAssignmentLogs->package_id = $package_id;
          $OrderAssignmentLogs->order_assignment_id = $assignment_data->id;
          
          $OrderAssignmentLogs->source = $orderRec->source;
          $OrderAssignmentLogs->destination = $orderRec->destination;
          $OrderAssignmentLogs->shipping_carrier_id = 0;
          $OrderAssignmentLogs->shipment_type = 'self';
          
          if($this->OrderAssignmentLogs->save($OrderAssignmentLogs)){
            //Update the status into order pakage table as well
            $OrderAssignmentsData = $this->OrderAssignments->newEntity();
            $OrderAssignmentsData->status_to = 2;
            $OrderAssignmentsData->id = $assignment_data->id;
            $this->OrderAssignments->save($OrderAssignmentsData);
            //SET Email Content Of Pkg
          
            $pkgData = $this->OrderPackages->get($package_id);
            $order_info .= "<p>Package Number: ".$pkgData->package_number."</p>"; //Set email content;
            $order_info .= "<p>Package Title: ".$pkgData->package_title."</p>"; //Set email content;
          }
        }
      
      }else if($role==4){
      
        $Assigncount= $this->OrderAssignmentLogs->find('all')->where(['OrderAssignmentLogs.order_id' => $order_id,'OrderAssignmentLogs.package_id' => $package_id,'OrderAssignmentLogs.assign_to' => $userRec->id,'OrderAssignmentLogs.status IN' => [1,2]])->count();

        if($parentRec->parent_id==0){
          $staff_admin_id = 1;
        }else{
          $staff_admin_id = $parentRec->parent_id;
        }
        
        if($Assigncount <= 0){
          
          $OrderAssignments = $this->OrderAssignments->newEntity();
          $OrderAssignments->assign_by = $staff_admin_id;
          $OrderAssignments->assign_to = $parentRec->id;  
          $OrderAssignments->order_id  = $order_id;
          $OrderAssignments->package_id = $package_id;
          $OrderAssignments->source = '';
          $OrderAssignments->destination = '';
          $OrderAssignments->status_by = 2;
          $OrderAssignments->status_to = 2;
          if($this->OrderAssignments->save($OrderAssignments)){
                          
            //Update the status into order pakage table as well
            $OrderPackagesData = $this->OrderPackages->newEntity();
            $OrderPackagesData->status = 2;
            $OrderPackagesData->id = $package_id;
            $this->OrderPackages->save($OrderPackagesData);
            //SET Email Content Of Pkg
            
            $orderAssignResults= $this->OrderAssignments->find('all')->where(['OrderAssignments.package_id' => $package_id,'OrderAssignments.order_id' => $order_id,'OrderAssignments.assign_by' => $staff_admin_id,'OrderAssignments.id'=>$OrderAssignments->id])->first();
            
            $assignData = $this->OrderAssignmentLogs->find('all')->where(['OrderAssignmentLogs.order_assignment_id' => $orderAssignResults->id,'OrderAssignmentLogs.order_id' => $order_id,'OrderAssignmentLogs.status IN' => [1,2]])->count();
      
            if($assignData <= 0){
              
              $OrderAssignmentLogs = $this->OrderAssignmentLogs->newEntity();
              
              $OrderAssignmentLogs->assign_by = $userRec->parent_id;
              $OrderAssignmentLogs->assign_to = $userRec->id; 
              $OrderAssignmentLogs->status = 2;
                              
              $OrderAssignmentLogs->order_id = $order_id;
              $OrderAssignmentLogs->package_id = $package_id;
              $OrderAssignmentLogs->order_assignment_id = $orderAssignResults->id;
              
              $OrderAssignmentLogs->source = '';
              $OrderAssignmentLogs->destination = '';
              $OrderAssignmentLogs->shipping_carrier_id = 0;
              $OrderAssignmentLogs->shipment_type = 'driver';
              
              if($this->OrderAssignmentLogs->save($OrderAssignmentLogs)){
              
                //SET Email Content Of Pkg
                $pkgData = $this->OrderPackages->get($package_id);
                $order_info .= "<p>Package Number: ".$pkgData->package_number."</p>"; //Set email content;
                $order_info .= "<p>Package Title: ".$pkgData->package_title."</p>"; //Set email content;
              }
                        
            }
          }
                    
        }else{
          /*
          $AssignR= $this->OrderAssignmentLogs->find('all')->where(['OrderAssignmentLogs.order_id' => $order_id,'OrderAssignmentLogs.package_id' => $package_id,'OrderAssignmentLogs.assign_to' => $userRec->id,'OrderAssignmentLogs.status IN' => [1,2]])->first();
          */
          $Assigncount= $this->OrderAssignmentLogs->find('all')->where(['OrderAssignmentLogs.order_id' => $order_id,'OrderAssignmentLogs.package_id' => $package_id,'OrderAssignmentLogs.assign_to' => $userRec->id,'OrderAssignmentLogs.status IN' => [1,2]])->count();
          
          if($Assigncount <= 0){
            
            $OrderAssignmentLogs = $this->OrderAssignmentLogs->newEntity();
            
            $OrderAssignmentLogs->id = $AssignR->id;
            $OrderAssignmentLogs->assign_by = $userRec->parent_id;
            $OrderAssignmentLogs->assign_to = $userRec->id; 
            $OrderAssignmentLogs->status = 2;
                            
            $OrderAssignmentLogs->order_id = $order_id;
            $OrderAssignmentLogs->package_id = $package_id;
            
            $OrderAssignmentLogs->source = '';
            $OrderAssignmentLogs->destination = '';
            $OrderAssignmentLogs->shipping_carrier_id = 0;
            $OrderAssignmentLogs->shipment_type = 'driver';
            
            if($this->OrderAssignmentLogs->save($OrderAssignmentLogs)){
            
              //SET Email Content Of Pkg
              $pkgData = $this->OrderPackages->get($package_id);
              $order_info .= "<p>Package Number: ".$pkgData->package_number."</p>"; //Set email content;
              $order_info .= "<p>Package Title: ".$pkgData->package_title."</p>"; //Set email content;
            }
                      
          }
        }
      }
       
      /*Update Data into log table Start*/
      $UserLogs = $this->UserLogs->newEntity();
      $UserLogs->notification_from = $userRec->parent_id;
      $UserLogs->notification_to = $userRec->id;
      $UserLogs->order_id = $order_id;
      $UserLogs->notification_type = 'order';
      $UserLogs->description = "New order has been assigned by ".$parentRec->name;
      $this->UserLogs->save($UserLogs);
      /*Update Data into log table End*/
            
      //Update the status into order table when all packages are assigned
      $allOrderPkgStatus = $this->OrderPackages->find('all')->where(['OrderPackages.status'=>1,'OrderPackages.order_id'=>$order_id])->count();
      if($allOrderPkgStatus <= 0){
        $OrdersData = $this->Orders->newEntity();
        $OrdersData->status = 2;
        $OrdersData->id = $order_id;
        $this->Orders->save($OrdersData);
      }
      
      $order_info .= "<p>Order Id : $order_id</p>"; //Set email content;
      $order_info .= "<p>Source : </p>"; //Set email content;
      $order_info .= "<p>Destination : </p>"; //Set email content;
            
      $replace = array('{agent_name}','{assign_by_email}','{assigned_by_name}','{order_info}');
      $with = array($userRec->name, $parentRec->email, $parentRec->email, $order_info);
      
      //Send email function
      $this->send_email('',$replace,$with,'order_assign_to_agent',$userRec->email);
      //End send email
      return true;
    }

		
		function userNotifications(){
			
		  $user_id = isset($this->request->data['user_id']) ? $this->request->data['user_id'] : "";
		  $role = isset($this->request->data['role']) ? $this->request->data['role'] : "";

		  $this->check_empty($user_id, 'Please add user_id');
		  $this->check_empty($role, 'Please add role');
		  
		  //Check user banned
		  $this->checkUserSuspend($user_id);
		  	
		  $userRole = $role;
		  $loggedInUserId = $user_id;

		  $this->loadModel('UserLogs');

		  $newNotifications='';
		  $OldNotifications='';
		  $newNotificationsCount=0;
		  $data = []; 
		  $newNotifications = $this->UserLogs->find('all')
							  ->where(['UserLogs.notification_to'=>$loggedInUserId])
							  ->order(['UserLogs.created_date' => 'DESC'])
							  ->contain(['Orders'=> function($q) {
															return $q->autoFields(false)
																->select([ 'id','status','descrates_app_id']);
														},
										 'sent_from'=> function($q) {
															return $q->autoFields(false)
																->select([ 'id','role','name','email']);
														},
										  'sent_to'=> function($q) {
															return $q->autoFields(false)
																->select([ 'id','role','name','email']);
										  }])
								 ->hydrate(false)
								// ->group(['UserLogs.order_id','UserLogs.notification_from','UserLogs.notification_type'])
							   ->toArray();
          /*
		  $query = $this->UserLogs->query();
		  $query->update()
				->set(['read_status' => 1])
				->where(['notification_to' => $loggedInUserId])
				->execute(); 

	     */
		  $notification = '';
		  
		  if(!empty($newNotifications) || !empty($OldNotifications)){
				$notificationData = [];
				if(!empty($newNotifications)){
				  foreach($newNotifications as $new_notification){
					  
						if( strpos(strtolower($new_notification['description']), "rejected") !== false ) {
							$clrCode = 'red';
						}else if( strpos(strtolower($new_notification['description']), "accepted") !== false ) {
							$clrCode = 'green';
						}else {
							$clrCode = 'grey';
						}
						
					  $notificationData['created_date'] = $this->humanTiming(strtotime($new_notification['created_date']));
					  $notificationData['description'] = $new_notification['description'];
					  $notificationData['read_status'] = $new_notification['read_status'];
					  $notificationData['package_id'] = $new_notification['package_id'];
					  $notificationData['order_id'] = $new_notification['order']['id'];
					  $notificationData['status'] = $new_notification['order']['status'];
					  $notificationData['order_number'] = $new_notification['order']['descrates_app_id'];
					  $notificationData['notification_type'] = $new_notification['notification_type'];
					  $notificationData['colour_code'] = $clrCode;
					  
					  $data[] = $notificationData;
				  }
				}
		  }       
		   /* NOTIFICATION CODE END*/
			$resultJ = json_encode(array('status' => '200' , 'message' => 'Notifications' , 'data' => $data));
			$this->json_response($resultJ);
		}
		
		function getProviders(){
			
			
			
			$this->loadModel('ShippingCarriers');
			$providers = $this->ShippingCarriers->find('all')->toArray();
			$data = [];
		   if(!empty($providers)){
				  foreach($providers as $provider){
					  $providerData['id']             = $provider['id'];
					  $providerData['provider_name']  = $provider['carrier_name']; 

					  $data[] = $providerData;
				  }

		   }
			$resultJ = json_encode(array('status' => '200' , 'message' => 'Providers list' , 'data' => $data));
			$this->json_response($resultJ);
	   }
	   
	  
    /**
       *********************************************************************
       *  Function Name : checkUserSuspend() .
       *  Functionality : Check user suspended or not
       *********************************************************************
    **/
    
		private function checkUserSuspend($userId = null){
				$this->checkUserId($userId);
				$user = $this->Users->find('all',['conditions' => ['Users.id' => $userId]]);
				$userData = $user->first();
				if($userData->status == 0){
					 $resultJ = json_encode(array('status' => '303' , 'message' => "Your account has been de-activated by admin/agent."));
					 $this->json_response($resultJ);  
				}
		}
		
		
		/**
		   *********************************************************************
		   *  Function Name : checkUserId() .
		   *  Functionality : Check user existence
		   *********************************************************************
		**/
		private function checkUserId($userId = null){
				$user = $this->Users->find('all',['conditions' => ['Users.id' => $userId]]);
				$userData = $user->first();
				if(empty($userData)){
					 $resultJ = json_encode(array('status' => '302' , 'message' => "User id not exists."));
					 $this->json_response($resultJ);  
				}
		}
		    
		public function addEditCertificates(){   
		  if ($this->request->is('post')) {
				
				$this->loadModel('UserDetails');
				$userDetails = $this->UserDetails->newEntity();
				
				$id = isset($this->request->data['id']) ? $this->request->data['id'] : ""; //Logged in user id
				$user_id = isset($this->request->data['user_id']) ? $this->request->data['user_id'] : ""; //Logged in user id
				$document_title = isset($this->request->data['document_title']) ? $this->request->data['document_title'] : "";
				$document_number = isset($this->request->data['document_number']) ? $this->request->data['document_number'] : "";
				$issued_by = isset($this->request->data['issued_by']) ? $this->request->data['issued_by'] : "";
				$issued_date = isset($this->request->data['issued_date']) ? $this->request->data['issued_date'] : "";
				$expiary_date = isset($this->request->data['expiary_date']) ? $this->request->data['expiary_date'] : "";
				$image = isset($this->request->data['image']) ? $this->request->data['image'] : "";
				$imagename = isset($this->request->data['imagename']) ? $this->request->data['imagename'] : "";

				//$this->check_empty($id, 'Kindly provide Cerificate id');
				$this->check_empty($user_id, 'Kindly provide Driver id');
				$this->check_empty($document_title, 'Kindly provide document title');
				$this->check_empty($document_number, 'Kindly provide document number');
				$this->check_empty($issued_by, 'Kindly provide issued by authority');
				$this->check_empty($issued_date, 'Kindly provide issue date');
				$this->check_empty($expiary_date, 'Kindly provide expiry date');
				
				//Check user banned
				$this->checkUserSuspend($user_id);
					
				if($id !=''){
					$UserDetails = $this->UserDetails->get( $id, ['contain' => [] ] );
					$this->UserDetails->validator()->remove('document_number', 'unique');
					$UserDetails = $this->UserDetails->patchEntity($UserDetails, $this->request->data);
				}
					 
				$UserDetails = $this->UserDetails->patchEntity($userDetails, $this->request->data);
				
				 if(!empty($image)){
					
					$imageData = $this->request->data['image'];
					if($imageData['name']!=''){
						$userDocument = $this->upload_file('documentImg',$imageData);
					
						$userDocument = explode(':',$userDocument);

						if($userDocument[0]=='error'){
							$resultJ = json_encode(array('status' => '200' , 'message' => $profileImage[1]));
							$this->json_response($resultJ);
						}else{
							$userDetails->scanned_image =  $userDocument[1];
						}               
					}
					unset($this->request->data['image']);
					
				 }else{
					$userDetails->scanned_image =  $imagename;
				 }//End Document upload Code
		  
				if ($this->UserDetails->save($UserDetails)) {
					
						if($id !=''){
							$resultJ = json_encode(array('status' => '200' , 'message' => 'Certificate has been updated successfully.'));
						}else{
							$resultJ = json_encode(array('status' => '200' , 'message' => 'Certificate has been added successfully.'));
						}	
				
				}else{
				   if(!empty($userDetails->errors())){
					  $errorMsgShow = "";
					  foreach($userDetails->errors() as $error){
						   // pr($error);
						   foreach($error as $errorMsg){
							  $errorMsgShow = $errorMsg;
							  break;
						   }
						   if($errorMsgShow != ""){
								break;
						   }
					  }
					  $message = $errorMsgShow;
					}else{
						if($id !=''){
							$message = "Unable to edit the certificate.";
						}else{
							$message = "Unable to add the certificate.";
						}	
					  
					}
				  $resultJ = json_encode(array('status' => '301' , 'message' => $message));
				}
			  $this->json_response($resultJ);
			}
		}
		
		public function getCertificates(){  
			$this->loadModel('UserDetails');

			if ($this->request->is(['post'])) {
				 $user_id = isset($this->request->data['user_id']) ? $this->request->data['user_id'] : "";
				 $driver_id = isset($this->request->data['driver_id']) ? $this->request->data['driver_id'] : "";
				 $this->check_empty($driver_id, 'Please provide driver_id');
				 $this->check_empty($user_id, 'Please provide user_id');
				  
				  
				//Check user banned
				$this->checkUserSuspend($user_id);
		   
				$userDetail	 = $this->UserDetails->find('all')->where(['UserDetails.user_id' => $driver_id])->hydrate(false)->toArray();
				  
				if(!empty($userDetail)){
					$certificateDetails = array();			
					foreach($userDetail as $key=>$userDetailVal){
						$certificateDetails[$key] = $userDetailVal;	
						$certificateDetails[$key]['issued_date'] = date("Y-m-d",strtotime($userDetailVal['issued_date']));
						$certificateDetails[$key]['expiary_date'] = date("Y-m-d",strtotime($userDetailVal['expiary_date']));
						$certificateDetails[$key]['scanned_image_path'] = HTTP_ROOT.'img/drivers_documents/';
						$certificateDetails[$key]['scanned_image'] = !empty($userDetailVal['scanned_image']) ? $userDetailVal['scanned_image']:"";
					}				
						/*
					  $data['user_id'] = $userDetail->user_id;
					  $data['document_title'] = $userDetail->document_title;
					  $data['document_number'] = $userDetail->document_number;
					  $data['issued_by'] = $userDetail->issued_by;
					  $data['issued_date'] = $userDetail->issued_date;
					  $data['expiary_date'] = $userDetail->expiary_date;
					  $data['scanned_image']  = !empty($userDetail->scanned_image) ? HTTP_ROOT.'img/drivers_documents/'.$userDetail->scanned_image:"";*/
					
					$resultJ = json_encode(array('status' => '200' , 'message' => 'Certificate detail','data' => $certificateDetails));
				  }else{
					  $resultJ = json_encode(array('status' => '200' , 'message' => 'Record not found', 'data' => array()));
				  }
			}
			$this->json_response($resultJ);
		}
		
		public function deleteCertificates(){  
			$this->loadModel('UserDetails');
			
			if ($this->request->is(['post'])) {
				
				$certificate_id = isset($this->request->data['certificate_id'])?$this->request->data['certificate_id']:"";
				$user_id = isset($this->request->data['user_id'])?$this->request->data['user_id']:"";
				
				$this->check_empty($certificate_id, 'Please provide certificate_id');
				$this->check_empty($user_id, 'Please provide user_id');
				
				//Check user banned
				$this->checkUserSuspend($user_id);
							  
				$certificates = $this->UserDetails->get($certificate_id);
				if (!$this->UserDetails->delete($certificates)) {
					
					$resultJ = json_encode(array('status' => '301' , 'message' => 'Unable to delete certificate'));
				
				}else{
				
					$resultJ = json_encode(array('status' => '200' , 'message' => 'Selected certificate delete successfully'));
				
				}
			}
			$this->json_response($resultJ);
		}
		
		function trackOrder(){
		
			$this->loadModel('OrderAssignmentLogs');
			$this->loadModel('OrderTracking');
			$this->loadModel('Orders');
			
			$pkg_id = isset($this->request->data['package_id']) ? $this->request->data['package_id'] : ""; //Logged in user id
			//$orderID = isset($this->request->data['order_id']) ? $this->request->data['order_id'] : ""; //Logged in user id
			$user_id = isset($this->request->data['user_id']) ? $this->request->data['user_id'] : ""; //Logged in user id
		
			$this->check_empty($pkg_id, 'Kindly provide package id');
			$this->check_empty($user_id, 'Kindly provide user id');
							
			//Check user banned
			$this->checkUserSuspend($user_id);
				
			//CHECK ORDER IS ASSIGNED OR NOT
			$orderAssignmentData = $this->OrderAssignmentLogs->find('all')->where(['order_assignment_id'=>$pkg_id])->first();
			
			$pkg_id = $orderAssignmentData->package_id;
			$orderID = $orderAssignmentData->order_id;
			
			if(count($orderAssignmentData) <=0){
				
				$msg = 'Order not assigned yet. you can view the tacking once order get assigned to agent/driver';
			
			}else{
				
				
				if(strtolower($orderAssignmentData->shipment_type)=='driver' || strtolower($orderAssignmentData->shipment_type)=='self'){
					
					//GET DIRECT TRACKING WHICH IS DONE BY SCANNING THE LABELS
					$trackingRecords = $this->Orders->find('all')
									   //->where(['Orders.id' => $orderID,'Orders.status IN' => [2,3,4]])
                      ->where(['Orders.id' => $orderID])
									    ->contain(['OrderTracking'=> function($q) use($pkg_id) {
																return $q->where(['package_id'=>$pkg_id,'type'=>'tracking_log'])->order(['OrderTracking.third_party_status_date' =>'DESC']);
															},'OrderPackages'=> function($q) use($pkg_id) {
																return $q->where(['id'=>$pkg_id]);
															}])
									   ->hydrate(false)
									   ->toArray();
				}else{
					$msg = 'Order is assigned to third party, so you can not track this order';
					$resultJ = json_encode(array('status' => '200' , 'message' => $msg, 'data' => array()));
					$this->json_response($resultJ);
				}
				
			}
			
			if (empty($trackingRecords)){
				
				$resultJ = json_encode(array('status' => '200' , 'message' => $msg, 'data' => array()));
				
			}else{
				
				foreach($trackingRecords[0]['order_tracking'] as $K=>$v){
          unset($trackingRecords[0]['order_tracking'][$K]['status']);
					$trackingRecords[0]['order_tracking'][$K]['created']=$this->convert_date_time_into_utc($v['third_party_status_date']);
					$trackingRecords[0]['order_tracking'][$K]['modified']=$this->convert_date_time_into_utc($v['third_party_status_date']);
				}
				$resultJ = json_encode(array('status' => '200' , 'data' => $trackingRecords));
			}
			
			$this->json_response($resultJ);
		}
		
		function convert_date_time_into_utc($input=null){
			if($input !=null){
				$the_date = strtotime($input);
				date_default_timezone_set("UTC");
				return date("Y-m-d H:i:s", $the_date);
			}else{
				return $input;
			}
		
		}
		
		function markAsComplete(){
			
			$this->loadModel('Orders');
			$this->loadModel('OrderPackages');
			$this->loadModel('OrderTracking');
			$this->loadModel('OrderAssignments');
			$this->loadModel('OrderAssignmentLogs');
			$this->loadModel('UserLogs');
			
			if ($this->request->is('post')){
			  
				$order_id = isset($this->request->data['order_id']) ? $this->request->data['order_id'] : "";
				$user_id = isset($this->request->data['user_id']) ? $this->request->data['user_id'] : "";
				$role = isset($this->request->data['role']) ? $this->request->data['role'] : "";
				
				$this->check_empty($order_id, 'Kindly provide order id');
				$this->check_empty($role, 'Kindly provide role');
				$this->check_empty($user_id, 'Kindly provide user id');
								
				//Check user banned
				$this->checkUserSuspend($user_id);
				
				if($role != 3){
					$resultJ = json_encode(array('status' => '301' , 'message' => "Only agent can perform this action", 'data' => array()));
					$this->json_response($resultJ);
				
				}else{
					
			
					$OrderAssignmentsData = $this->OrderAssignments->find('all')->where(['OrderAssignments.order_id' => $order_id,'OrderAssignments.assign_to' => $user_id,'OrderAssignments.status_to IN'=>[1,2]])->hydrate(false)->toArray();	


					
					if(!empty($OrderAssignmentsData)){
						
						foreach($OrderAssignmentsData as $OrderAssignments){
							
							//Update the status into order pakage table as well
							$OrderAssignmentsEntity = $this->OrderAssignments->newEntity();
							
							$OrderAssignmentsEntity->status_by = 3;
							$OrderAssignmentsEntity->status_to = 3;
							$OrderAssignmentsEntity->id = $OrderAssignments['id'];
							
							if($this->OrderAssignments->save($OrderAssignmentsEntity)){
								
								$orderAssignmentLogD = $this->OrderAssignmentLogs->find('all')->where(['OrderAssignmentLogs.order_assignment_id'=>$OrderAssignments['id']]);	
								if(!empty($orderAssignmentLogD)){
									foreach($orderAssignmentLogD as $oal){
										$AssignmentsLogEntity = $this->OrderAssignmentLogs->newEntity();
										$AssignmentsLogEntity->id = $oal->id;	
										$AssignmentsLogEntity->status = 3;
										
										$this->OrderAssignmentLogs->save($AssignmentsLogEntity);
									}
								}
								//echo "<pre>"; print_r($orderAssignmentLogD); die;
								
								$OrderPackagesQuery =  $this->OrderPackages->query();
								if($OrderPackagesQuery->update()
										->set(['status'=>4])
										->where(['order_id' =>  $order_id])
										->execute()){
											
									//GET All Packages Status of orders		
									$OrderPackagesCount = $this->OrderPackages->find('all')->where(['OrderPackages.order_id' => $order_id,'OrderPackages.status IN' => ['1','2']])->count();	
									if($OrderPackagesCount<=0){
										$OrdersQuery =  $this->Orders->query();
										$OrdersQuery->update()
															->set(['status'=>4])
															->where(['id' =>  $order_id])
															->execute();
									}
								}//End Update  package status
							}		
						}
						$resultJ = json_encode(array('status' => '200' , 'message' => "Order has been completed", 'data' => array()));
						$this->json_response($resultJ);
					}
				
				}	
			}
		}
				
		function getAddresByLatLong($latitude,$longitude){
			
			$latitude = isset($this->request->data['latitude']) ? $this->request->data['latitude'] : ""; //Logged in user id
			$longitude = isset($this->request->data['longitude']) ? $this->request->data['longitude'] : ""; //Logged in user id
			
			/*SCANNING ADDRESS RECORDS*/
			$curl = curl_init();
			curl_setopt_array($curl, array(
				CURLOPT_URL => "https://maps.googleapis.com/maps/api/geocode/json?key=AIzaSyBocYrNOAgaLXzR7039EQn_LEpY6weMX-Y&latlng=".$latitude."%2C".$longitude."&sensor=true",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 30,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "GET",
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			$response_arr = json_decode($response);
			
			if($response_arr->status == "OK"){
				$address = $response_arr->results[0]->formatted_address;
				if(isset($response_arr->results[0])) {
					for($j=0; $j < count($response_arr->results[0]->address_components); $j++){

						$cn=array($response_arr->results[0]->address_components[$j]->types[0]);

						if(in_array("postal_code", $cn)){
							$postal_code= $response_arr->results[0]->address_components[$j]->long_name;
						}
						
						if(in_array("locality", $cn)){
							$city = isset($response_arr->results[0]->address_components[$j]->short_name)?$response_arr->results[0]->address_components[$j]->short_name:$response_arr->results[0]->address_components[$j]->long_name;
						}
						
						if(in_array("administrative_area_level_1", $cn)){
							$state = $response_arr->results[0]->address_components[$j]->long_name;
						}
						
						if(in_array("country", $cn)){
							$country= $response_arr->results[0]->address_components[$j]->long_name;
						}
					}
				}
			}else{
				$address = "";
			}
			
			echo $postal_code."<br>";
			echo $city."<br>";
			echo $state."<br>";
			echo $country."<br>";
			die;
			/*SCANNING ADDRESS RECORDS*/ 
				
		}	
		
}
?>
