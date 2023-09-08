<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Network\Email\Email;
use Cake\Core\Configure;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

use Cake\Validation\Validation;

require_once(ROOT . DS  . 'vendor' . DS  . 'FedEx' . DS . 'TrackService'. DS . 'Track.php');
use Track;

require_once(ROOT . DS  . 'vendor' . DS  . 'firebase' . DS . 'Firebase.php');
use Firebase;
 
class CronsController extends AppController
{
 
    public function beforeFilter(Event $event){
        parent::beforeFilter($event);
        // Allow users to register and logout.
        // You should not add the "login" action to allow list. Doing so would
        // cause problems with normal functioning of AuthComponent.
        
        $this->Auth->allow(['processFileOneToAnother']);
        $this->viewBuilder()->layout('admin_inner');
        $this->loadModel('OrderTracking');
    }
    
    	
	function processFileOneToAnother(){		
		$path = realpath('../webroot/upload_xml_order_files_today/'); //Scan files from upload xml folder
		$order_files = scandir($path); 
		$totalFile = count($order_files); //Total count of files from upload xml folder
		
		if(!empty($order_files) && count($order_files) > 0){ 
			
			ob_start();
			
			$index=1;
			
			$this->loadModel('Users');
			$this->loadModel('Orders');
			$this->loadModel('OrderDetails');
			$this->loadModel('OrderPackages');
			$this->loadModel('OrderLocations');		
			$this->loadModel('OrderTracking');		
			$source_folder = realpath('../webroot/upload_xml_order_files_today');
			$destination_folder = realpath('../webroot/processed_descartes_file_today');
			
			foreach($order_files as $order_file){
				
				$file_destination = realpath('../webroot/upload_xml_order_files_today').'/'.$order_file; //File destination with name
				
				/*AUTO IMPORT ORDER INTO DATABASE START*/
				
				if(file_exists($file_destination)){
					
					if(!empty($order_file) && !in_array($order_file,array(".",".."))){
				
						//Get xml file data
						$xml = simplexml_load_file(HTTP_ROOT."upload_xml_order_files_today/".$order_file);
						$xml_array = unserialize(serialize(json_decode(json_encode((array) $xml), 1)));
						
						$file_number = isset($xml_array['FileNumber'])?$xml_array['FileNumber']:'';
						
						$XML_FILE_STATUS = isset($xml_array['ShipmentStatus'])?$xml_array['ShipmentStatus']:'';
						
						//CHECK THAT FILE IS VALID OR NOT 
						if(empty($file_number)){
							
							$file_destination = realpath('../webroot/upload_xml_order_files_today').'/'.$order_file;
							unlink($file_destination);
														
							continue;
						
						}else{	
							//echo "<pre>"; print_r($xml_array); echo "</pre>";
							// for tracking coming from airbase 
							if(isset($xml_array['EventCodeSet'])){



								if( strpos( $file_number, "-" ) !== false ) {
									$explodedFileNumber = explode("-",$file_number);
								}else if( strpos( $file_number, ":" ) !== false ) {
									$explodedFileNumber = explode(":",$file_number);
								}else{
									$explodedFileNumber = explode("-",$file_number);
								}

								$descartesOrderId = $explodedFileNumber[0];

								if( strpos( $file_number, "-" ) !== false ) {
									$packageNumber =  $file_number;
								}else if( strpos( $file_number, ":" ) !== false ) {
									$packageNumber =  $file_number;
								}else{
									$packageNumber = $file_number."-01";
								}

								$orderDetID = $packageDetID = "";

								$orderDet = $this->Orders->find('all')->where(['Orders.descrates_app_id' => $descartesOrderId])->first();
								if(!empty($orderDet) && isset($orderDet['id'])){
									$orderDetID = $orderDet['id'];
								}

								$packageDet = $this->OrderPackages->find('all')->where(['OrderPackages.package_number' => $packageNumber])->first();

								if(!empty($packageDet) && isset($packageDet['id'])){
									$packageDetID = $packageDet['id'];
								}
								if(!empty($orderDetID) && !empty($packageDetID)){

									$eventCodeSet = @$xml_array['EventCodeSet'];
									$eventCode = @$xml_array['EventCode'];
									$eventDescription = @$xml_array['EventDescription'];
									$eventDateTime = @$xml_array['EventDateTime'];
									$locationQualifier = @$xml_array['LocationQualifier'];
									$locationCode = @$xml_array['LocationCode'];
									$locationName = @$xml_array['LocationName'];
									$comment = @$xml_array['Comment'];
									$containerNumber = @$xml_array['ContainerNumber'];

									if(empty($eventDescription)){
										$eventDescription = "Started";
									}

									if($locationCode!=""){
										$locationEvent = $locationName.'-'.$locationCode;
									}else{
										$locationEvent = $locationName;
									} 

									if($eventCode!=""){
										$CodeEventSave = $eventCodeSet.'-'.$eventCode;
									}else{
										$CodeEventSave = $eventCodeSet;
									}
									$transactionId = @$xml_array['TransactionId'];
									$trackingEventCount = $this->OrderTracking->find('all')->where([
										'OrderTracking.sequence'             => $transactionId,
										'OrderTracking.type'                 => "tracking_log"
									])->count();

									
									//CHECK THAT tracking not update with same data
									if($trackingEventCount <= 0){	
										
										$orderEventData                           = $this->OrderTracking->newEntity();
										$orderEventData->order_id                 = $orderDetID;
										$orderEventData->user_id                  = 0;
										$orderEventData->package_id               = $packageDetID;						
										
										$orderEventData->third_party_status       = $eventDescription;
										$orderEventData->status                   = $eventDescription;
										$orderEventData->third_party_status_date  = (isset($xml_array['EventDateTime']) && $xml_array['EventDateTime'] !='') ? date("Y-m-d H:i:s", strtotime($xml_array['EventDateTime'])):'';
										$orderEventData->carrier                  = $CodeEventSave; 
										$orderEventData->country                  = $locationQualifier;
										$orderEventData->location                 = $locationEvent;
										$orderEventData->sequence                 = $transactionId;		
										$orderEventData->tracking_description     = $comment;
										$orderEventData->type                     = "tracking_log";
										$orderEventData->container_number         = $containerNumber;

										$this->OrderTracking->save($orderEventData);
									}
								}
							}else{
									//Check xml file data
									if(!empty($xml_array)){										
									
										//ACCESS PRTIES ARRAY
										if(!empty($xml_array['Parties']['Party'])){	
											
											foreach($xml_array['Parties']['Party'] as $partyKey=>$partyVal){
												if(count($partyVal)>1){
													//Check Customer Array AND CREATE NEW CUSTOMER
													if(strtolower($partyVal['PartyType'])=='account'){
														
														$descartes_customer_id = $partyVal['PartyCode'];
														$userCount = $this->Users->find('all')->where(['Users.descartes_customer_id' => $descartes_customer_id])->count();
														
														//CHECK THAT CUSTOMER IS ALREADY CREATED OR NOT
														if($userCount <= 0){
															$user = $this->Users->newEntity();
															$userdata['password'] = $this->RandomStringGenerator();
															$userdata['descartes_customer_id'] = $descartes_customer_id;
															$userdata['username'] = $descartes_customer_id;
															$userdata['role'] = 5;
															$userdata['status'] = 1;
															
															$user = $this->Users->patchEntity($user, $userdata);
																								
															$this->Users->validator()->remove('name');
															$this->Users->validator()->remove('email');
															$this->Users->validator()->remove('phone');
														
															
															if ($this->Users->save($user)) {
																	
																	//Send registeration email to sky2c pre-defined email id
																	$replace = array('{full_name}','{username}','{password}','{link}');
																	$with = array('Sky2C',$descartes_customer_id , $userdata['password'], HTTP_ROOT);
																	
																	//Send email function
																	//$this->send_email('',$replace,$with,'registration_invitation',NEW_USER_SKY2C);
															}else{
																//pr($user->errors()); die;
															}
														}//END BRACES OF CHECK THAT CUSTOMER IS ALREADY CREATED OR NOT
														$customerData = $this->Users->find('all')->where(['Users.descartes_customer_id' => $descartes_customer_id])->first();
														$customer_id = $customerData->id;
													}
												}else{
													$partyType      = @$xml_array['Parties']['Party']['PartyType']; 
													$partyCode      = @$xml_array['Parties']['Party']['PartyCode'];
													$Name           = @$xml_array['Parties']['Party']['Name'];
													$address1       = @$xml_array['Parties']['Party']['Address1'];
													$cityName       = @$xml_array['Parties']['Party']['CityName'];
													$stateOrProvinceCode = @$xml_array['Parties']['Party']['StateOrProvinceCode'];
													$postalCode     = @$xml_array['Parties']['Party']['PostalCode'];
													$countryCode    = @$xml_array['Parties']['Party']['CountryCode'];
											
													//Check Customer Array AND CREATE NEW CUSTOMER
													if(strtolower($partyType)=='account'){
														$descartes_customer_id = $partyVal['PartyCode'];
														$userCount = $this->Users->find('all')->where(['Users.descartes_customer_id' => $descartes_customer_id])->count();
														
														//CHECK THAT CUSTOMER IS ALREADY CREATED OR NOT
														if($userCount <= 0){
															$user = $this->Users->newEntity();
															$userdata['password'] = $this->RandomStringGenerator();
															$userdata['descartes_customer_id'] = $descartes_customer_id;
															$userdata['username'] = $descartes_customer_id;
															$userdata['role'] = 5;
															$userdata['status'] = 1;
															
															$user = $this->Users->patchEntity($user, $userdata);
																								
															$this->Users->validator()->remove('name');
															$this->Users->validator()->remove('email');
															$this->Users->validator()->remove('phone');
														
															
															if ($this->Users->save($user)) {
																	
																	//Send registeration email to sky2c pre-defined email id
																	$replace = array('{full_name}','{username}','{password}','{link}');
																	$with = array('Sky2C',$descartes_customer_id , $userdata['password'], HTTP_ROOT);
																	
																	//Send email function
																	//$this->send_email('',$replace,$with,'registration_invitation',NEW_USER_SKY2C);
															}else{
																//pr($user->errors()); die;
															}
														}//END BRACES OF CHECK THAT CUSTOMER IS ALREADY CREATED OR NOT
														$customerData = $this->Users->find('all')->where(['Users.descartes_customer_id' => $descartes_customer_id])->first();
														$customer_id = $customerData->id;
													}
												}
											}
										}
										
										//IMPORT ORDER INTO DATABASE TABLE
										if(!empty($xml_array)){

											if( strpos( $file_number, "-" ) !== false ) {
												$exploded_file_number = explode("-",$file_number);
											}else if( strpos( $file_number, ":" ) !== false ) {
												$exploded_file_number = explode(":",$file_number);
											}else{
												$exploded_file_number = explode("-",$file_number);
											}
											
											//$exploded_file_number = explode("-",$file_number);
											$descartes_order_id = $exploded_file_number[0];
											
											$orderQuery = $this->Orders->find('all')->where(['Orders.descrates_app_id' => $descartes_order_id]);
											
											$orderTableData['descrates_app_id'] = $descartes_order_id;
											$orderTableData['customer_id'] = $customer_id;
											
											$orderTableData['transaction_id'] = isset($xml_array['TransactionId'])?$xml_array['TransactionId']:'';
											
											$TransactionDateTime = isset($xml_array['TransactionDateTime'])?$xml_array['TransactionDateTime']:'';
											$transaction_date_time = explode("T",$TransactionDateTime);
											
											$orderTableData['transaction_date_time'] =$transaction_date_time[0].' '.$transaction_date_time[1];
											$orderTableData['shipment_type'] =  isset($xml_array['ShipmentType'])?$xml_array['ShipmentType']:'';
											$orderTableData['house_bill_number'] = isset($xml_array['HouseBillNumber'])?$xml_array['HouseBillNumber']:'';
											$orderTableData['booking_number'] = isset($xml_array['BookingNumber'])?$xml_array['BookingNumber']:'';
											$orderTableData['customer_reference'] = isset($xml_array['CustomerReference'])?$xml_array['CustomerReference']:'';
											$orderTableData['payment_method'] = isset($xml_array['PaymentMethod'])?$xml_array['PaymentMethod']:'';
											$orderTableData['transportation_method'] = isset($xml_array['TransportationMethod'])?$xml_array['TransportationMethod']:'';
											$orderTableData['type_of_move'] =  isset($xml_array['TypeOfMove'])?$xml_array['TypeOfMove']:'';
											$orderTableData['type_of_service'] = isset($xml_array['TypeOfService'])?$xml_array['TypeOfService']:'';
											$orderTableData['vessel_name'] = isset($xml_array['VesselName'])?$xml_array['VesselName']:'';
											$orderTableData['voyage_flight_number'] =  isset($xml_array['VoyageFlightNumber'])?$xml_array['VoyageFlightNumber']:'';
											$departureDate =  isset($xml_array['DepartureDateTime'])?$xml_array['DepartureDateTime']:'';
											$arrivalDate =  isset($xml_array['ArrivalDateTime'])?$xml_array['ArrivalDateTime']:'';
											
											$pickup_date =   explode("T",$departureDate);
											$drop_off_date = explode("T",$arrivalDate);
											
											$orderTableData['pickup_date'] = $pickup_date[0].' '.$pickup_date[1];
											$orderTableData['drop_off_date'] = $drop_off_date[0].' '.$drop_off_date[1];
											$orders = $this->Orders->newEntity();
											$orders = $this->Orders->patchEntity($orders, $orderTableData, ['validate' => false]);
											
											//CHECK THAT ORDER IS EXISTS OR NOT WITH PROVIDED FILE NUMBER
											if($orderQuery->count() > 0){
												$orderQuery = $this->Orders->find('all')->where(['Orders.descrates_app_id' => $descartes_order_id]);
												$orderRecords = $orderQuery->first();
												$orders->id =$orderRecords->id;
												//$orderTableData['status']=$orderRecords->status;
											}else{
													$orders['status'] = 1;
											}
											$this->Orders->save($orders);
											$orderQuery = $this->Orders->find('all')->where(['Orders.descrates_app_id' => $descartes_order_id]);
											$orderRecords = $orderQuery->first();
											$new_order_id = $orderRecords->id;
											
																						
											foreach($xml_array['Parties']['Party'] as $partyKey=>$partyVal){
												if(count($partyVal)>1){
													$OrderDetailsCount = $this->OrderDetails->find('all')->where(['OrderDetails.order_id' => $new_order_id, 'OrderDetails.party_type' => $partyVal['PartyType']]);
													
													//CHECK THAT ORDER DETAILS WITH ORDER ID AND PARTY TYPE EXISTS OR NOT
													
													$OrderDetailsRec = $OrderDetailsCount->first();	
													//ADD DATA INTO ORDER DETAILS TABLE
													
													$orderDetailsData['order_id'] =   $new_order_id;
													$orderDetailsData['party_type'] = isset($partyVal['PartyType'])?$partyVal['PartyType']:'';
													$orderDetailsData['party_code'] = isset($partyVal['PartyCode'])?$partyVal['PartyCode']:'';
													$orderDetailsData['party_name'] = isset($partyVal['Name'])?$partyVal['Name']:'';
													$orderDetailsData['address_1'] =  isset($partyVal['Address1'])?$partyVal['Address1']:'';
													$orderDetailsData['city_name'] =  isset($partyVal['CityName'])?$partyVal['CityName']:'';
													$orderDetailsData['state_or_province_code'] = isset($partyVal['StateOrProvinceCode'])?$partyVal['StateOrProvinceCode']:'';
													$orderDetailsData['postal_code'] =            isset($partyVal['PostalCode'])?$partyVal['PostalCode']:'';
													$orderDetailsData['country_code'] =           isset($partyVal['CountryCode'])?$partyVal['CountryCode']:'';
													$OrderDetails = $this->OrderDetails->newEntity();
													$OrderDetails = $this->OrderDetails->patchEntity($OrderDetails, $orderDetailsData, ['validate' => false]);
											
													$OrderDetails->id = isset($OrderDetailsRec->id)?$OrderDetailsRec->id:'';
													$this->OrderDetails->save($OrderDetails);
													
													
													if(strtolower($orderDetailsData['party_type'])=='shipper'){
														$source = $orderDetailsData['party_name'].', '.$orderDetailsData['address_1'].', '.$orderDetailsData['city_name'].', '.substr($orderDetailsData['postal_code'], 0, -4).', '.$orderDetailsData['country_code'];
														
														$this->Orders->updateAll(['source' => $source], ['id' => $new_order_id]);
													}
													if(strtolower($orderDetailsData['party_type'])=='consignee'){
														$destination = $orderDetailsData['party_name'].', '.$orderDetailsData['address_1'].', '.$orderDetailsData['city_name'].', '.substr($orderDetailsData['postal_code'], 0, -4).', '.$orderDetailsData['country_code'];
														$this->Orders->updateAll(['destination' => $destination], ['id' => $new_order_id]);
													}
												}else{
													$partyType      = @$xml_array['Parties']['Party']['PartyType']; 
													$partyCode      = @$xml_array['Parties']['Party']['PartyCode'];
													$Name           = @$xml_array['Parties']['Party']['Name'];
													$address1       = @$xml_array['Parties']['Party']['Address1'];
													$cityName       = @$xml_array['Parties']['Party']['CityName'];
													$stateOrProvinceCode = @$xml_array['Parties']['Party']['StateOrProvinceCode'];
													$postalCode     = @$xml_array['Parties']['Party']['PostalCode'];
													$countryCode    = @$xml_array['Parties']['Party']['CountryCode'];

													$OrderDetailsCount = $this->OrderDetails->find('all')->where(['OrderDetails.order_id' => $new_order_id, 'OrderDetails.party_type' => $partyType])->count();
													
													//CHECK THAT ORDER DETAILS WITH ORDER ID AND PARTY TYPE EXISTS OR NOT
													if($OrderDetailsCount <= 0){

														//ADD DATA INTO ORDER DETAILS TABLE
														$OrderDetails = $this->OrderDetails->newEntity();
														$orderDetailsData['order_id'] =   $new_order_id;
														$orderDetailsData['party_type'] = $partyType;
														$orderDetailsData['party_code'] = $partyCode;
														$orderDetailsData['party_name'] = $Name;
														$orderDetailsData['address_1'] =  $address1;
														$orderDetailsData['city_name'] =  $cityName;
														$orderDetailsData['state_or_province_code'] = $stateOrProvinceCode;
														$orderDetailsData['postal_code'] =            $postalCode;
														$orderDetailsData['country_code'] =           $countryCode;
														
														$OrderDetails = $this->OrderDetails->patchEntity($OrderDetails, $orderDetailsData, ['validate' => false]);
														
														$this->OrderDetails->save($OrderDetails);
														
														
														if(strtolower($orderDetailsData['party_type'])=='shipper'){
															$source = $orderDetailsData['party_name'].', '.$orderDetailsData['address_1'].', '.$orderDetailsData['city_name'].', '.$orderDetailsData['postal_code'].', '.$orderDetailsData['country_code'];
															
															$this->Orders->updateAll(['source' => $source], ['id' => $new_order_id]);
														}
														if(strtolower($orderDetailsData['party_type'])=='consignee'){
															$destination = $orderDetailsData['party_name'].', '.$orderDetailsData['address_1'].', '.$orderDetailsData['city_name'].', '.$orderDetailsData['postal_code'].', '.$orderDetailsData['country_code'];
															$this->Orders->updateAll(['destination' => $destination], ['id' => $new_order_id]);
														}
													}
												} // end else
													
											}	
										}
										
										//ACCESS LOCATION ARRAY
										if(!empty($xml_array['Locations']['Location'])){
											
											foreach($xml_array['Locations']['Location'] as $locationKey=>$locationVal){

												if(count($locationVal)>1){
													$OrderLocationsCount = $this->OrderLocations->find('all')->where(['OrderLocations.order_id' => $new_order_id, 'OrderLocations.location_type' => $locationVal['LocationType']])->count();
													
													//CHECK THAT ORDER DETAILS WITH ORDER ID AND PARTY TYPE EXISTS OR NOT
													if($OrderLocationsCount <= 0){
														
														//ADD DATA INTO ORDER LOCATION TABLE
														$OrderLocations = $this->OrderLocations->newEntity();
														
														$orderLocationData['order_id'] =               $new_order_id;
														$orderLocationData['location_type'] =          isset($locationVal['LocationType'])?$locationVal['LocationType']:'';
														$orderLocationData['location_id_qualifier'] =  isset($locationVal['LocationIdQualifier'])?$locationVal['LocationIdQualifier']:'';
														$orderLocationData['location_id'] =            isset($locationVal['LocationId'])?$locationVal['LocationId']:'';
														$orderLocationData['location_name'] =          isset($locationVal['LocationName'])?$locationVal['LocationName']:'';
														$orderLocationData['state_or_province_code'] = isset($locationVal['StateOrProvinceCode'])?$locationVal['StateOrProvinceCode']:'';
														$orderLocationData['country_code'] = isset($locationVal['CountryCode'])?$locationVal['CountryCode']:'';
																	
														$OrderLocations = $this->OrderLocations->patchEntity($OrderLocations, $orderLocationData, ['validate' => false]);
														
														$this->OrderLocations->save($OrderLocations);
													}
												}else{
													$LocationType            = @$xml_array['Locations']['Location']['LocationType']; 
													$location_id_qualifier   = @$xml_array['Locations']['Location']['location_id_qualifier'];
													$LocationId              = @$xml_array['Locations']['Location']['LocationId'];
													$LocationName            = @$xml_array['Locations']['Location']['LocationName'];
													$StateOrProvinceCode     = @$xml_array['Locations']['Location']['StateOrProvinceCode'];
													$CountryCode             = @$xml_array['Locations']['Location']['CountryCode'];

													$OrderLocationsCount = $this->OrderLocations->find('all')->where(['OrderLocations.order_id' => $new_order_id, 'OrderLocations.location_type' => $LocationType])->count();
													
													//CHECK THAT ORDER DETAILS WITH ORDER ID AND PARTY TYPE EXISTS OR NOT
													if($OrderLocationsCount <= 0){
														
														//ADD DATA INTO ORDER LOCATION TABLE
														$OrderLocations = $this->OrderLocations->newEntity();
														
														$orderLocationData['order_id']               = $new_order_id;
														$orderLocationData['location_type']          = $LocationType;
														$orderLocationData['location_id_qualifier']  = $location_id_qualifier;
														$orderLocationData['location_id']            = $LocationId;
														$orderLocationData['location_name']          = $LocationName;
														$orderLocationData['state_or_province_code'] = $StateOrProvinceCode;
														$orderLocationData['country_code']           = $CountryCode;
																	
														$OrderLocations = $this->OrderLocations->patchEntity($OrderLocations, $orderLocationData, ['validate' => false]);
														
														$this->OrderLocations->save($OrderLocations);
													}
												}	

											}
										} // location end
										
											if( strpos( $file_number, "-" ) !== false ) {
												$package_number =  $file_number;
											}else if( strpos( $file_number, ":" ) !== false ) {
												$package_number =  $file_number;
											}else{
												$package_number = $file_number."-01";
											}
												
											$pkgCount = $this->OrderPackages->find('all')->where(['OrderPackages.package_number' => $package_number,'OrderPackages.order_id' => $new_order_id]);
											
											if($pkgCount->count() == 0 ){
												
												$packageVal = $xml_array['Containers']['Container'];
													
												//ADD DATA INTO ORDER LOCATION TABLE
												
												$OrderPackagesRec = $pkgCount->first();

												$OrderPackagesData['order_id'] = $new_order_id;		
										
												
												$OrderPackagesData['equipment_initial'] =  isset($packageVal['EquipmentInitial'])?$packageVal['EquipmentInitial']:'';
												$OrderPackagesData['equipment_number'] =   isset($packageVal['EquipmentNumber'])?$packageVal['EquipmentNumber']:'';
												//$OrderPackagesData['package_number'] =     isset($packageVal['SealNumber1'])?$packageVal['SealNumber1']:'';
												$OrderPackagesData['package_number'] =     isset($package_number)?$package_number:'';
												$OrderPackagesData['package_title'] =      isset($packageVal['EquipmentTypeCode'])?$packageVal['EquipmentTypeCode']:$package_number;
												
												$containerVal = $packageVal['Contents']['Content'];
												
												$OrderPackagesData['quantity_shipped'] =   isset($containerVal['QuantityShipped'])?$containerVal['QuantityShipped']:'';
												$OrderPackagesData['unit_of_measure'] =    isset($containerVal['UnitOfMeasure'])?$containerVal['UnitOfMeasure']:'';
												$OrderPackagesData['description'] =        isset($containerVal['Description'])?$containerVal['Description']:'';
												$OrderPackagesData['gross_weight'] =       isset($containerVal['GrossWeight'])?$containerVal['GrossWeight']:'';
												$OrderPackagesData['weight_unit'] =        isset($containerVal['WeightUnit'])?$containerVal['WeightUnit']:'';
												$OrderPackagesData['quantity_packaging_units'] = isset($containerVal['QuantityPackagingUnits'])?$containerVal['QuantityPackagingUnits']:'';
												$OrderPackages = $this->OrderPackages->newEntity();
												$OrderPackages = $this->OrderPackages->patchEntity($OrderPackages, $OrderPackagesData, ['validate' => false]);
											
												$OrderPackages->id= isset($OrderPackagesRec->id)?$OrderPackagesRec->id:'';
												$this->OrderPackages->save($OrderPackages); 
											}
											
												
										//} //PACKAGES IMPORT END							
										
									}//XML ARRAY BRACES END
									
								
								

							} // end content braces 
							
						}//ELSE PART END FOR FILE NUMBER CHECK
						
					}//END CHECK ORDER FILE IS EXIST OR NOT
					
				}//END OF FILE DESTINATION
			
				/*AUTO IMPORT ORDER INTO DATABASE END*/
				
				
				if(file_exists($file_destination) && $order_file !="" && !in_array($order_file,array(".",".."))){
					
					$newfilename = date("m-d-y")."-".$order_file;
					
					$this->loadModel("DescartesLogs");
					$DescartesLogsData = $this->DescartesLogs->newEntity();
					$DescartesLogsData->file_name = $order_file;
					if($this->DescartesLogs->save($DescartesLogsData)){
						//if(copy($source_folder."/".$order_file, $destination_folder."/".$newfilename)){
						unlink($file_destination);							
						//}
					}else{
						unlink($file_destination);
					}
				}else{
				    unlink($file_destination);
				}
				
				if($index == $totalFile){
			
					$response = '<!DOCTYPE html><html lang="en"><head> <title>Auto Import Order</title> <meta charset="utf-8"> <meta name="viewport" content="width=device-width, initial-scale=1"> <link rel="stylesheet" href="'.HTTP_ROOT.'assets/global/plugins/bootstrap/css/bootstrap.min.css"> <script src="'.HTTP_ROOT.'assets/global/plugins/jquery.min.js"></script> <script src="'.HTTP_ROOT.'assets/global/plugins/bootstrap/js/bootstrap.min.js"></script></head><body> <div class="container"><div class="row text-center"> <div class="col-sm-6 col-sm-offset-3"> <br><br><h2 style="color:#0fad00">Success</h2> <img src="'.HTTP_ROOT.'img/check-true.jpg"> <h3>Sky2c Order Import</h3> <p style="font-size:20px;color:#5C5C5C;">Thank you for import data from descartes file, Orders has been updated as per descartes inputes.</p></div></div></div></body></html>';
					
					echo $response;die;
				
				}
				
				$index++;
			}
		}else{
			
			$response = '<!DOCTYPE html><html lang="en"><head> <title>Auto Import Order</title> <meta charset="utf-8"> <meta name="viewport" content="width=device-width, initial-scale=1"> <link rel="stylesheet" href="'.HTTP_ROOT.'assets/global/plugins/bootstrap/css/bootstrap.min.css"> <script src="'.HTTP_ROOT.'assets/global/plugins/jquery.min.js"></script> <script src="'.HTTP_ROOT.'assets/global/plugins/bootstrap/js/bootstrap.min.js"></script></head><body> <div class="container"><div class="row text-center"> <div class="col-sm-6 col-sm-offset-3"> <br><br><h2 style="color:#0fad00">Success</h2> <img src="'.HTTP_ROOT.'img/check-true.jpg"> <h3>No Descartes XLS found in  upload_xml_order_files folder </h3> <p style="font-size:20px;color:#5C5C5C;">Might be XML file not downloaded from Descartes server.</p></div></div></div></body></html>';
					
			echo $response;die;
		}
		die;
	}
	
	
}
?>

