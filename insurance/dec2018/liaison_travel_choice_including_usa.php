<?php
session_start();
class SevenCorners{
    const BASE_URL = "https://api.sevencorners.com/token";
    const CLIENT_ID = '1088EDF3-875A-4C32-BE3D-2F428E81DC43';
    
	/**
  	 * Function Name: GetToken();
	 * Description  : This function using for to call the seven corners Initially get the Token from Api.
	**/
    public static function GetToken(){
         $data = http_build_query(array(
            'client_id' => self::CLIENT_ID,
            'grant_type' => 'client_credentials'
        ));
        $context = stream_context_create(array(
            'http' => array(
                'method' => 'POST',
                'header' => 'Content-type: application/json;charset=UTF-8;',
				'Cache-Control' => 'no-cache',
				'Content-Length' => '34',
				'Server' => 'Microsoft-IIS/8.5',
				'X-Powered-By' => 'ASP.NET',
                'content' => $data
            )
        ));        
        $stream = fopen(self::BASE_URL, 'r', false, $context);
        $result = stream_get_contents($stream);
        fclose($stream);        
        return json_decode($result);
    }
	
	/**
  	 * Function Name: GetQuote();
	 * Description  : This function using for to call the seven corners Quote Api.
	**/
	public static function GetQuote($token, $poststring){
		$url = "https://api.sevencorners.com/api/v1/quote";		
		$postdata = http_build_query($poststring);
		$opts = array('http' =>
			array(
				'method'  => 'post',
				'header'  => 'Content-type: application/json',
				'content' => $postdata
			)
		);	
		$opts['http']['header'] = ("Authorization: Bearer " .$token);
		$context = stream_context_create($opts);
		return @file_get_contents($url, false, $context);
	}
	
	/**
  	 * Function Name: processRequestVisitors();
	 * Description  : This function for to get the Visitors Insurance seven corners  Plans 
	**/
	public static function processRequestVisitors($company_id,$maximum_sevencorner,$deductible_sevencorner,$fdate_dd,$fdate_rd,$seven_living_country_conty_code,$seven_destination_country_conty_code,$seven_applicant_age,$seven_spouse_age,$seven_dependent_childern_0_9,$seven_dependent_childern_10_17,$seven_stataus_spouse,$seven_stataus_child09,$seven_stataus_child1017,$applicant_age_integer){		
	
		$policy_maximum = "";
		$policy_deductible = "";		
		$policyId = "";
		$productGroupId = "";		
		$policy_maximumsss = "";
		
		if($company_id==136){
			/*$policyId = 27558;$productGroupId = 29;*/
			$policyId = 31511;$productGroupId = 1155;
			
			/*To Set Policy Maximum - As per seven corners values*/
			if($maximum_sevencorner==50000){ $policy_maximum = "$50,000"; }else if($maximum_sevencorner==100000){ $policy_maximum = "$100,000"; }else if($maximum_sevencorner==500000){ $policy_maximum = "$500,000"; }else if($maximum_sevencorner==1000000){ $policy_maximum = "$1,000,000"; }else if($maximum_sevencorner==15000){ $policy_maximum = "$15,000"; }else if($maximum_sevencorner==2000000){ $policy_maximum = "$2,000,000"; }else if($maximum_sevencorner==5000000){ $policy_maximum = "$5,000,000"; }
			if($deductible_sevencorner==0){ $policy_deductible = "$0"; }else if($deductible_sevencorner==100){ $policy_deductible = "$100"; }else if($deductible_sevencorner==250){ $policy_deductible = "$250"; }else if($deductible_sevencorner==500){ $policy_deductible = "$500"; }else if($deductible_sevencorner==1000){ $policy_deductible = "$1,000"; }else if($deductible_sevencorner==2500){ $policy_deductible = "$2,500";}else if($deductible_sevencorner==5000){ $policy_deductible = "$5,000";}
			$policy_max_keyword = "MMPgm_BND"; $policy_deduct_keyword = "DedPgm_BND"; $InOut_BND = "Yes"; $HSC_BND = "Declined";
		}
		
		$applicant = "";
		$spouse = "";
		$child09_1 = "";$child09_2 = "";$child09_3 = "";$child09_4 = "";$child09_5 = "";$child09_6 = "";$child09_7 = "";
		
		$child1017_1 = "";$child1017_2 = "";$child1017_3 = "";$child1017_4 = "";$child1017_5 = "";$child1017_6 = "";$child1017_7 = "";
		
		$personIdentifier1 ="";$personIdentifier2=array();$personIdentifier3=array();$personIdentifier4=array();$personIdentifier5=array();
		$personIdentifier6=array();$personIdentifier7=array();$personIdentifier8=array();$personIdentifier9=array();$personIdentifier10=array();
		$personIdentifier11=array();$personIdentifier12=array();$personIdentifier13=array();$personIdentifier14=array();$personIdentifier15=array();
		$personIdentifier16=array();
		
		
		$personIdentifierData1=array();$personIdentifierData2=array();$personIdentifierData3=array();$personIdentifierData4=array();$personIdentifierData5=array();$personIdentifierData6=array();$personIdentifierData7=array();$personIdentifierData8=array();$personIdentifierData9=array();$personIdentifierData10=array();$personIdentifierData11=array();$personIdentifierData12=array();$personIdentifierData13=array();$personIdentifierData14=array();$personIdentifierData15=array();$personIdentifierData16=array();
						
		
		if($seven_applicant_age!=""){
			$personIdentifier1 = array("personIdentifier" => "1");
			$personIdentifierData1 = array("clientPersonIdentifier"=>"1","prefix" => "","suffix" => "","gender" => "","socialSecurityNumber" => "","height" => "","heightUnitOfMeasure" => "","weight" => "","weightUnitOfMeasure" => "","relationship"=>"Primary","alternateId"=>"","familyUnitId"=>"","phones"=>array(array("phoneNumber"=> "9894174502","phoneType"=>"Work")),"emails"=>array(array("emailAddress" => "jram1@birbals.com","isWorkEmail" => true,"isDefault" => true)),"firstName" => "Mcis","middleName" => "","lastName" => "Primary","dateOfBirth"=>$seven_applicant_age);
		}
					
		if($seven_stataus_spouse=='yes'){
			if($seven_spouse_age!=""){				
				$personIdentifier2 = array("personIdentifier" => "2");
				$personIdentifierData2 = array("clientPersonIdentifier"=>"2","prefix" => "","suffix" => "","gender" => "","socialSecurityNumber" => "","height" => "","heightUnitOfMeasure" => "","weight" => "","weightUnitOfMeasure" => "","relationship"=>"Spouse","alternateId"=>"","familyUnitId"=>"","phones"=>array(array("phoneNumber"=> "9894174502","phoneType"=>"Work")),"emails"=>array(array("emailAddress" => "jram1@birbals.com","isWorkEmail" => true,"isDefault" => true)),"firstName" => "Mcis","middleName" => "","lastName" => "Spouse","dateOfBirth"=> $seven_spouse_age);
			}
		}
				
		if($seven_stataus_child09=='yes'){
			if($seven_dependent_childern_0_9 >0){
				$personIdentifier = array();
				for ($dp1=1; $dp1<=$seven_dependent_childern_0_9;$dp1++){
					$personIdentifier[] = $dp1;
				}
				$date = date("Y");			
				$nineyears = $date-9;
				$child09_age = $nineyears."-01-01";				
				
				if(isset($personIdentifier[0]) && $personIdentifier[0]!=""){
					$personIdentifier3 = array("personIdentifier" => "3");
					$personIdentifierData3 = array("clientPersonIdentifier"=>"3","prefix" => "","suffix" => "","gender" => "","socialSecurityNumber" => "","height" => "","heightUnitOfMeasure" => "","weight" => "","weightUnitOfMeasure" => "","relationship"=>"Child","alternateId"=>"","familyUnitId"=>"","phones"=>array(array("phoneNumber"=> "9894174502","phoneType"=>"Work")),"emails"=>array(array("emailAddress" => "jram1@birbals.com","isWorkEmail" => true,"isDefault" => true)),"firstName" => "Mcis","middleName" => "","lastName" => "Child3","dateOfBirth"=>$child09_age);
					
				}
				if(isset($personIdentifier[1]) && $personIdentifier[1]!=""){
					$personIdentifier4 = array("personIdentifier" => "4");
					$personIdentifierData4 = array("clientPersonIdentifier"=>"4","prefix" => "","suffix" => "","gender" => "","socialSecurityNumber" => "","height" => "","heightUnitOfMeasure" => "","weight" => "","weightUnitOfMeasure" => "","relationship"=>"Child","alternateId"=>"","familyUnitId"=>"","phones"=>array(array("phoneNumber"=> "9894174502","phoneType"=>"Work")),"emails"=>array(array("emailAddress" => "jram1@birbals.com","isWorkEmail" => true,"isDefault" => true)),"firstName" => "Mcis","middleName" => "","lastName" => "Child4","dateOfBirth"=>$child09_age);
					
				}
				if(isset($personIdentifier[2]) && $personIdentifier[2]!=""){
					$personIdentifier5 = array("personIdentifier" => "5");
					$personIdentifierData5 = array("clientPersonIdentifier"=>"5","prefix" => "","suffix" => "","gender" => "","socialSecurityNumber" => "","height" => "","heightUnitOfMeasure" => "","weight" => "","weightUnitOfMeasure" => "","relationship"=>"Child","alternateId"=>"","familyUnitId"=>"","phones"=>array(array("phoneNumber"=> "9894174502","phoneType"=>"Work")),"emails"=>array(array("emailAddress" => "jram1@birbals.com","isWorkEmail" => true,"isDefault" => true)),"firstName" => "Mcis","middleName" => "","lastName" => "Child5","dateOfBirth"=>$child09_age);
				}
				if(isset($personIdentifier[3]) && $personIdentifier[3]!=""){
					$personIdentifier6 = array("personIdentifier" => "6");
					$personIdentifierData6 = array("clientPersonIdentifier"=>"6","prefix" => "","suffix" => "","gender" => "","socialSecurityNumber" => "","height" => "","heightUnitOfMeasure" => "","weight" => "","weightUnitOfMeasure" => "","relationship"=>"Child","alternateId"=>"","familyUnitId"=>"","phones"=>array(array("phoneNumber"=> "9894174502","phoneType"=>"Work")),"emails"=>array(array("emailAddress" => "jram1@birbals.com","isWorkEmail" => true,"isDefault" => true)),"firstName" => "Mcis","middleName" => "","lastName" => "Child6","dateOfBirth"=> $child09_age);
				}
				if(isset($personIdentifier[4]) && $personIdentifier[4]!=""){
					$personIdentifier7 = array("personIdentifier" => "7");
					$personIdentifierData7 = array("clientPersonIdentifier"=>"7","prefix" => "","suffix" => "","gender" => "","socialSecurityNumber" => "","height" => "","heightUnitOfMeasure" => "","weight" => "","weightUnitOfMeasure" => "","relationship"=>"Child","alternateId"=>"","familyUnitId"=>"","phones"=>array(array("phoneNumber"=> "9894174502","phoneType"=>"Work")),"emails"=>array(array("emailAddress" => "jram1@birbals.com","isWorkEmail" => true,"isDefault" => true)),"firstName" => "Mcis","middleName" => "","lastName" => "Child7","dateOfBirth"=>$child09_age);	
				}
				if(isset($personIdentifier[5]) && $personIdentifier[5]!=""){
					$personIdentifier8 = array("personIdentifier" => "8");
					$personIdentifierData8 = array("clientPersonIdentifier"=>"8","prefix" => "","suffix" => "","gender" => "","socialSecurityNumber" => "","height" => "","heightUnitOfMeasure" => "","weight" => "","weightUnitOfMeasure" => "","relationship"=>"Child","alternateId"=>"","familyUnitId"=>"","phones"=>array(array("phoneNumber"=> "9894174502","phoneType"=>"Work")),"emails"=>array(array("emailAddress" => "jram1@birbals.com","isWorkEmail" => true,"isDefault" => true)),"firstName" => "Mcis","middleName" => "","lastName" => "Child8","dateOfBirth"=>$child09_age);
				}
				if(isset($personIdentifier[6]) && $personIdentifier[6]!=""){
					$personIdentifier9 = array("personIdentifier" => "9");
					$personIdentifierData9 = array("clientPersonIdentifier"=>"9","prefix" => "","suffix" => "","gender" => "","socialSecurityNumber" => "","height" => "","heightUnitOfMeasure" => "","weight" => "","weightUnitOfMeasure" => "","relationship"=>"Child","alternateId"=>"","familyUnitId"=>"","phones"=>array(array("phoneNumber"=> "9894174502","phoneType"=>"Work")),"emails"=>array(array("emailAddress" => "jram1@birbals.com","isWorkEmail" => true,"isDefault" => true)),"firstName" => "Mcis","middleName" => "","lastName" => "Child9","dateOfBirth"=>$child09_age);				
				}
				
			}
		}
		
		if($seven_stataus_child1017=='yes'){
			if($seven_dependent_childern_10_17 >0){
				$person2 = array();
				for ($dp2=1; $dp2<=$seven_dependent_childern_10_17;$dp2++){
					$person2[] = $dp2;
				}
				
				$date = date("Y");			
				$seventeennyears = $date-17;
				$child1017_age = $seventeennyears."-01-01";
				
				
				if(isset($person2[0]) && $person2[0]!=""){
					$personIdentifier10 = array("personIdentifier" => "10");
					$personIdentifierData10 = array("clientPersonIdentifier"=>"10","prefix" => "","suffix" => "","gender" => "","socialSecurityNumber" => "","height" => "","heightUnitOfMeasure" => "","weight" => "","weightUnitOfMeasure" => "","relationship"=>"Child","alternateId"=>"","familyUnitId"=>"","phones"=>array(array("phoneNumber"=> "9894174502","phoneType"=>"Work")),"emails"=>array(array("emailAddress" => "jram1@birbals.com","isWorkEmail" => true,"isDefault" => true)),"firstName" => "Mcis","middleName" => "","lastName" => "Child10","dateOfBirth"=>$child1017_age);	
				}
				if(isset($person2[1]) && $person2[1]!=""){
					$personIdentifier11 = array("personIdentifier" => "11");
					$personIdentifierData11 = array("clientPersonIdentifier"=>"11","prefix" => "","suffix" => "","gender" => "","socialSecurityNumber" => "","height" => "","heightUnitOfMeasure" => "","weight" => "","weightUnitOfMeasure" => "","relationship"=>"Child","alternateId"=>"","familyUnitId"=>"","phones"=>array(array("phoneNumber"=> "9894174502","phoneType"=>"Work")),"emails"=>array(array("emailAddress" => "jram1@birbals.com","isWorkEmail" => true,"isDefault" => true)),"firstName" => "Mcis","middleName" => "","lastName" => "Child11","dateOfBirth"=>$child1017_age);
				}
				if(isset($person2[2]) && $person2[2]!=""){
					$personIdentifier12 = array("personIdentifier" => "12");
					$personIdentifierData12 = array("clientPersonIdentifier"=>"12","prefix" => "","suffix" => "","gender" => "","socialSecurityNumber" => "","height" => "","heightUnitOfMeasure" => "","weight" => "","weightUnitOfMeasure" => "","relationship"=>"Child","alternateId"=>"","familyUnitId"=>"","phones"=>array(array("phoneNumber"=> "9894174502","phoneType"=>"Work")),"emails"=>array(array("emailAddress" => "jram1@birbals.com","isWorkEmail" => true,"isDefault" => true)),"firstName" => "Mcis","middleName" => "","lastName" => "Child12","dateOfBirth"=>$child1017_age);
				}
				if(isset($person2[3]) && $person2[3]!=""){
					$personIdentifier13 = array("personIdentifier" => "13");
					$personIdentifierData13 = array("clientPersonIdentifier"=>"13","prefix" => "","suffix" => "","gender" => "","socialSecurityNumber" => "","height" => "","heightUnitOfMeasure" => "","weight" => "","weightUnitOfMeasure" => "","relationship"=>"Child","alternateId"=>"","familyUnitId"=>"","phones"=>array(array("phoneNumber"=> "9894174502","phoneType"=>"Work")),"emails"=>array(array("emailAddress" => "jram1@birbals.com","isWorkEmail" => true,"isDefault" => true)),"firstName" => "Mcis","middleName" => "","lastName" => "Child13","dateOfBirth"=>$child1017_age);
				}
				if(isset($person2[4]) && $person2[4]!=""){
					$personIdentifier14 = array("personIdentifier" => "14");
					$personIdentifierData14 = array("clientPersonIdentifier"=>"14","prefix" => "","suffix" => "","gender" => "","socialSecurityNumber" => "","height" => "","heightUnitOfMeasure" => "","weight" => "","weightUnitOfMeasure" => "","relationship"=>"Child","alternateId"=>"","familyUnitId"=>"","phones"=>array(array("phoneNumber"=> "9894174502","phoneType"=>"Work")),"emails"=>array(array("emailAddress" => "jram1@birbals.com","isWorkEmail" => true,"isDefault" => true)),"firstName" => "Mcis","middleName" => "","lastName" => "Child14","dateOfBirth"=>$child1017_age);	
				}
				if(isset($person2[5]) && $person2[5]!=""){
					$personIdentifier15 = array("personIdentifier" => "15");
					$personIdentifierData15 = array("clientPersonIdentifier"=>"15","prefix" => "","suffix" => "","gender" => "","socialSecurityNumber" => "","height" => "","heightUnitOfMeasure" => "","weight" => "","weightUnitOfMeasure" => "","relationship"=>"Child","alternateId"=>"","familyUnitId"=>"","phones"=>array(array("phoneNumber"=> "9894174502","phoneType"=>"Work")),"emails"=>array(array("emailAddress" => "jram1@birbals.com","isWorkEmail" => true,"isDefault" => true)),"firstName" => "Mcis","middleName" => "","lastName" => "Child15","dateOfBirth"=>$child1017_age);	
				}
				if(isset($person2[6]) && $person2[6]!=""){
					$personIdentifier16 = array("personIdentifier" => "16");
					$personIdentifierData16 = array("clientPersonIdentifier"=>"16","prefix" => "","suffix" => "","gender" => "","socialSecurityNumber" => "","height" => "","heightUnitOfMeasure" => "","weight" => "","weightUnitOfMeasure" => "","relationship"=>"Child","alternateId"=>"","familyUnitId"=>"","phones"=>array(array("phoneNumber"=> "9894174502","phoneType"=>"Work")),"emails"=>array(array("emailAddress" => "jram1@birbals.com","isWorkEmail" => true,"isDefault" => true)),"firstName" => "Mcis","middleName" => "","lastName" => "Child16","dateOfBirth"=>$child1017_age);
				}				
			}
		}	
		
		
		/* Merge Here PersonIdentifiers */
		$personIdentifiers = array($personIdentifier1,$personIdentifier2,$personIdentifier3,$personIdentifier4,$personIdentifier5,$personIdentifier6,$personIdentifier7,$personIdentifier8,$personIdentifier9,$personIdentifier10,$personIdentifier11,$personIdentifier12,$personIdentifier13,$personIdentifier14,$personIdentifier15,$personIdentifier16);		
		/* Remove Empty Array here in personIdentifiers */
		$rm_empty_personIdentifiers = array_values(array_filter($personIdentifiers));
		$rm_empty_personIdentifiers_final_set = $rm_empty_personIdentifiers[0]; 
		
		/* Merge Here PersonIdentifiers Data */
		$personIdentifierData = array($personIdentifierData1,$personIdentifierData2,$personIdentifierData3,$personIdentifierData4,$personIdentifierData5,$personIdentifierData6,$personIdentifierData7,$personIdentifierData8,$personIdentifierData9,$personIdentifierData10,$personIdentifierData11,$personIdentifierData12,$personIdentifierData13,$personIdentifierData14,$personIdentifierData15,$personIdentifierData16);		
		/* Remove Empty Array here in personIdentifiers data*/
		$rm_empty_personIdentifiers_data = array_values(array_filter($personIdentifierData));
		$rm_empty_personIdentifiers_data_final_set = $rm_empty_personIdentifiers_data[0];


			$poststring = array("saveQuote"=>'',"quoteIdentifier"=>"1088EDF4-875A-4C32-BE3D-2F428E81DC49","quoteRequestCount"=>1,"policyQuoteRequests"=>array(array("policyId"=>$policyId,"productGroupId"=>$productGroupId,"effectiveDate"=>$fdate_dd,"expirationDate"=>$fdate_rd,"fields" =>array(array("code" =>"USArrivalDate_FLD","value"=>$fdate_dd),array("code"=>"PassportIssuerCountry_FLD","value"=>$seven_living_country_conty_code),array("code"=>"DestinationCountry_FLD","value"=>$seven_destination_country_conty_code),array("code"=>$policy_max_keyword,"value"=>$policy_maximum),array("code"=>$policy_deduct_keyword,"value"=>$policy_deductible),array("code"=>"170_DYN","value"=>"True"),array("code"=>"HSC_BND","value"=>$HSC_BND),array("code"=>"InOut_BND","value"=>$InOut_BND)),"personFields" => $rm_empty_personIdentifiers)),"persons" => $rm_empty_personIdentifiers_data,"primaryMemberAddresses" => array(array("type" => "Billing","addressLine1" => "","city" => "","countryCode" => $seven_living_country_conty_code,"state" => "","postalCode" => "")));
		
		if($_SESSION['Seven_Token_String']==""){
			$token = self::GetToken();
			$bearer = $token->access_token;
			$_SESSION['Seven_Token_String'] = $bearer;
		}else{
			$bearer = $_SESSION['Seven_Token_String'];
		}
		$newresponse = self::GetQuote($bearer,$poststring);
		
		if($newresponse!=""){
			$getresponse = json_decode($newresponse);			
		}
		
		$postdata = json_encode($poststring);
		
		echo "<pre> Quote Post Strings : ";echo $postdata; echo "</pre>";
		echo "<pre> Quote Response Strings : ";echo $newresponse; echo "</pre>";
		echo "<br><br><br>";
		
		
		//print_r($getresponse);		
		if(count($getresponse)>0){
			$total = $getresponse->total;
			$applicant = 0;
			$spouse = 0;
			$child09amt = 0;
			$child10179amt = 0;
			if(isset($getresponse->policyQuoteResponses[0]->personResponses)){
				$persons = $getresponse->policyQuoteResponses[0]->personResponses;
				foreach($persons as $perrow){
					$personid=$perrow->personIdentifier;
					$quoteamt = $perrow->quote->total;					
										
					if($personid=="1"){						
						 $applicant = $quoteamt;
					}
										
					if($personid=="2"){
						 $spouse = $quoteamt;
					}
					
					if($personid=="3" || $personid=="4" || $personid=="5" || $personid=="6" || $personid=="7" || $personid=="8" || $personid=="9"){
						 $child09amt += $quoteamt;
					}
										
					if($personid=="10" || $personid=="11" || $personid=="12" || $personid=="13" || $personid=="14" || $personid=="15" || $personid=="16"){
						 $child10179amt += $quoteamt;
					}
				}
			}
			$total = number_format($total,2);
			$child09amt = number_format($child09amt,2);
			$child10179amt = number_format($child10179amt,2);	
			$spouse = number_format($spouse,2);	
			$applicant = number_format($applicant,2);
			return $total."|".$applicant."|".$spouse."|".$child09amt."|".$child10179amt;
		}
	}
		
}


$array_companies = array(136);
foreach($array_companies as $row){
	$time_start = microtime(true);
	$company_id = $row;	
	
	if($company_id=="136"){
		$maximum_sevencorner = 50000; $deductible_sevencorner = 5000; 
	}
	
	if($company_id==136){
		$company_name = "Liaison Travel Choice - Including USA";
	}
	
	
	$fdate_dd = "2018-12-20";
	$fdate_rd = "2019-05-27";
	$seven_living_country_conty_code = "IND";
	$seven_destination_country_conty_code = "USA"; 
	$seven_applicant_age = "1984-01-01";                                                                     
	$seven_spouse_age = "1984-01-01";                                                                     
	$seven_dependent_childern_0_9 = "1";                                                                     $seven_dependent_childern_10_17 = "1";                                                                     $seven_stataus_spouse = "yes";                                                                     
	$seven_stataus_child09 = "yes";                                                                     
	$seven_stataus_child1017 = "yes";                                                                     
	$applicant_age_integer = "33";
	
	echo "*************************************************<br>";
	echo "Quote Details:<br>";
	echo "*************************************************<br>";
	echo "From Date: 2018-12-20 <br>";
	echo "To Date: 2019-05-27 <br>";
	echo "From Country: India <br>";
	echo "To Country : United States <br>";
	echo "Applicant Age: 33 <br>";
	echo "Spouse Age: 33 <br>";
	echo "Childs: 2 <br>";
	
	echo "Policy Maximum: $50,000<br>";
	echo "Deductible:  $5000<br>";
	echo "*************************************************<br><br>";
	

	$response_from_api = SevenCorners::processRequestVisitors($company_id,$maximum_sevencorner,$deductible_sevencorner,$fdate_dd,$fdate_rd,$seven_living_country_conty_code,$seven_destination_country_conty_code,$seven_applicant_age,$seven_spouse_age,$seven_dependent_childern_0_9,$seven_dependent_childern_10_17,$seven_stataus_spouse,$seven_stataus_child09,$seven_stataus_child1017,$applicant_age_integer);

	if($response_from_api!=""){
		echo "Plan Name : ".$company_name."<br>";
		$get_rates = explode("|",$response_from_api);
		echo "Total_Amount=>".$seven_plan_total_amt = $get_rates[0];
	}
	
	$time_end = microtime(true);
	//dividing with 60 will give the execution time in minutes other wise seconds
	$execution_time = ($time_end - $time_start)/60;
	$execution_time = $execution_time*60;
	//execution time of the script
	echo '<br><b>Total Execution Time:</b> '.number_format((float)$execution_time, 2, '.', '').' Seconds';
	echo "<br><br><br><br><br><br>";
}

?>