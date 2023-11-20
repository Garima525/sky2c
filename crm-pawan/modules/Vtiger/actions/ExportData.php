<?php
/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is:  vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/

class Vtiger_ExportData_Action extends Vtiger_Mass_Action {

	function checkPermission(Vtiger_Request $request) {
		$moduleName = $request->getModule();
		$moduleModel = Vtiger_Module_Model::getInstance($moduleName);

		$currentUserPriviligesModel = Users_Privileges_Model::getCurrentUserPrivilegesModel();
		if(!$currentUserPriviligesModel->hasModuleActionPermission($moduleModel->getId(), 'Export')) {
			throw new AppException(vtranslate('LBL_PERMISSION_DENIED'));
		}
	}

	/**
	 * Function is called by the controller
	 * @param Vtiger_Request $request
	 */
	function process(Vtiger_Request $request) {
		$this->ExportData($request);
	}

	private $moduleInstance;
	private $focus;

	/**
	 * Function exports the data based on the mode
	 * @param Vtiger_Request $request
	 */
	function ExportData(Vtiger_Request $request){		
				
		$db = PearDatabase::getInstance();
		$moduleName = $request->get('source_module');
		$this->moduleInstance = Vtiger_Module_Model::getInstance($moduleName);
		$this->moduleFieldInstances = $this->moduleFieldInstances($moduleName);
		$this->focus = CRMEntity::getInstance($moduleName);
		// if($moduleName=="Leads"){
		// if(isset($_REQUEST['selected_ids']) && $_REQUEST['selected_ids']!=""){
		// 	$get = json_decode($_REQUEST['selected_ids']);			
		// 	$fetch = implode(",",$get);
		// 	$qury = " AND vtiger_leaddetails.leadid IN ($fetch)";
		// }else{
		// 	$qury = " ";
		// }	
		// $query = "SELECT 
		// vtiger_leaddetails.lead_no,vtiger_crmentity.source, vtiger_leadscf.cf_1250, vtiger_leaddetails.salutation, vtiger_leaddetails.firstname,vtiger_leaddetails.lastname,vtiger_leadaddress.phone, vtiger_leadaddress.mobile, vtiger_leaddetails.leadstatus, vtiger_leaddetails.secondaryemail, vtiger_leaddetails.email, vtiger_crmentity.modifiedtime, vtiger_crmentity.smownerid, vtiger_leaddetails.emailoptout, vtiger_crmentity.createdtime, vtiger_leadscf.cf_854, vtiger_leadscf.cf_856,vtiger_leadscf.cf_858,vtiger_leadscf.cf_860,vtiger_leadscf.cf_862,vtiger_leadscf.cf_864,vtiger_leadscf.cf_866,vtiger_leadscf.cf_1188, vtiger_leadscf.cf_1190, vtiger_leadscf.cf_1192, vtiger_leadscf.cf_1194, vtiger_leadscf.cf_1196,
		// vtiger_leadscf.cf_1198,vtiger_leadscf.cf_1200,vtiger_leadscf.cf_1202,vtiger_leadscf.cf_1204,vtiger_leadscf.cf_1206,vtiger_leadscf.cf_1208,vtiger_leadscf.cf_1214,vtiger_leadscf.cf_1210,vtiger_leadscf.cf_1212,vtiger_leadscf.cf_1216,vtiger_leadscf.cf_1218,vtiger_leadscf.cf_1220,vtiger_leadscf.cf_1222,vtiger_leadscf.cf_1224,vtiger_leadscf.cf_1226,vtiger_leadscf.cf_1228,vtiger_leadscf.cf_1228,vtiger_leadscf.cf_1228,vtiger_leadscf.cf_1228,vtiger_leadscf.cf_1228,vtiger_leadscf.cf_1228,vtiger_leadscf.cf_1228,vtiger_leadscf.cf_1228,vtiger_leadscf.cf_1228,vtiger_leadscf.cf_1228,vtiger_leadscf.cf_1228,vtiger_leadscf.cf_1230,vtiger_leadscf.cf_1246,vtiger_leadscf.cf_1232,vtiger_leadscf.cf_1234,vtiger_leadscf.cf_1236,vtiger_leadscf.cf_1238,vtiger_leadscf.cf_1240,vtiger_leadscf.cf_1242,vtiger_leadscf.cf_1248,
		// vtiger_leadscf.cf_868, vtiger_leadscf.cf_870, vtiger_leadscf.cf_872, vtiger_leadscf.cf_876, vtiger_leadscf.cf_878, vtiger_leadscf.cf_880, vtiger_leadscf.cf_882, vtiger_leadscf.cf_884, vtiger_leadscf.cf_886, vtiger_leadscf.cf_888, vtiger_leadscf.cf_890, vtiger_leadscf.cf_892, vtiger_leadscf.cf_894, vtiger_leadscf.cf_896, vtiger_leadscf.cf_898, vtiger_leadscf.cf_900, vtiger_leadscf.cf_902, vtiger_leadscf.cf_904, vtiger_leadscf.cf_906, vtiger_leadscf.cf_908, vtiger_leadscf.cf_910, vtiger_leadscf.cf_912, vtiger_leadscf.cf_914, vtiger_leadscf.cf_916, vtiger_leadscf.cf_918, vtiger_leadscf.cf_920, vtiger_leadscf.cf_922, vtiger_leadscf.cf_924, vtiger_leadscf.cf_942, vtiger_leadscf.cf_930, vtiger_leadscf.cf_1022, vtiger_leadscf.cf_934, vtiger_leadscf.cf_938, vtiger_leadscf.cf_936,
		// vtiger_leadscf.cf_944, vtiger_leadscf.cf_946, vtiger_leadscf.cf_948, vtiger_leadscf.cf_950, vtiger_leadscf.cf_952, vtiger_leadscf.cf_974, vtiger_leadscf.cf_1024, vtiger_leadscf.cf_1026, vtiger_leadscf.cf_1028, vtiger_leadscf.cf_1030, vtiger_leadscf.cf_1032, vtiger_leadscf.cf_1034, vtiger_leadscf.cf_1036, vtiger_leadscf.cf_1038, vtiger_leadscf.cf_1040, vtiger_leadscf.cf_1042, vtiger_leadscf.cf_1044, vtiger_leadscf.cf_1046, vtiger_leadscf.cf_1048, vtiger_leadscf.cf_1050, vtiger_leadscf.cf_1052, vtiger_leadscf.cf_1054, vtiger_leadscf.cf_1056, vtiger_leadscf.cf_1058, vtiger_leadscf.cf_1060, vtiger_leadscf.cf_1062, vtiger_leadscf.cf_1064, vtiger_leadscf.cf_1066, vtiger_leadscf.cf_1068, vtiger_leadscf.cf_1070, vtiger_leadscf.cf_1074, vtiger_leadscf.cf_1076, vtiger_leadscf.cf_1078, vtiger_leadscf.cf_1080, vtiger_leadscf.cf_1082, vtiger_leadscf.cf_1084, vtiger_leadscf.cf_1086, vtiger_leadscf.cf_1088, vtiger_leadscf.cf_1090, vtiger_leadscf.cf_1092, vtiger_leadscf.cf_1094, vtiger_leadscf.cf_1096, vtiger_leadscf.cf_1098, vtiger_leadscf.cf_1100, vtiger_leadscf.cf_1102, vtiger_leadscf.cf_1104, vtiger_leadscf.cf_1106, vtiger_leadscf.cf_1108, vtiger_leadscf.cf_1110, vtiger_leadscf.cf_1112, vtiger_leadscf.cf_1114, vtiger_leadscf.cf_1136, vtiger_leadscf.cf_1116, vtiger_leadscf.cf_1118, vtiger_leadscf.cf_1120, vtiger_leadscf.cf_1122, vtiger_leadscf.cf_1126, vtiger_leadscf.cf_1124, vtiger_leadscf.cf_1130, vtiger_leadscf.cf_1128, vtiger_leadscf.cf_1134, vtiger_leadscf.cf_1132, vtiger_leadscf.cf_1138, vtiger_leadscf.cf_1154, vtiger_leadscf.cf_1142, vtiger_leadscf.cf_1140, vtiger_leadscf.cf_1146, vtiger_leadscf.cf_1144, vtiger_leadscf.cf_1150, vtiger_leadscf.cf_1148, vtiger_leadscf.cf_1152, vtiger_leadscf.cf_1156, vtiger_leadscf.cf_1158, vtiger_leadscf.cf_1160, vtiger_leadscf.cf_1162, vtiger_leadscf.cf_1164, vtiger_leadscf.cf_1166, vtiger_leadscf.cf_1168, vtiger_leadscf.cf_1170, vtiger_leadscf.cf_1172, vtiger_leadscf.cf_1174, vtiger_leadscf.cf_1176, vtiger_leadscf.cf_1178, vtiger_leadscf.cf_1180, vtiger_leadscf.cf_1182, vtiger_leadscf.cf_1184, vtiger_leadscf.cf_1014, vtiger_leadscf.cf_1016, vtiger_leadscf.cf_1018, vtiger_leadscf.cf_1020,
		//      vtiger_leadscf.cf_976, vtiger_leadscf.cf_972, vtiger_leadscf.cf_978, vtiger_leadscf.cf_980, vtiger_leadscf.cf_982, vtiger_leadscf.cf_984, vtiger_leadscf.cf_986, vtiger_leadscf.cf_988, vtiger_leadscf.cf_990, vtiger_leadscf.cf_992, vtiger_leadscf.cf_994, vtiger_leadscf.cf_996, vtiger_leadscf.cf_998, vtiger_leadscf.cf_1000, vtiger_leadscf.cf_1002, vtiger_leadscf.cf_1004, vtiger_leadscf.cf_1006, vtiger_leadscf.cf_1008, vtiger_leadscf.cf_1010, vtiger_leadscf.cf_1012, vtiger_crmentity.modifiedby FROM vtiger_leaddetails  INNER JOIN vtiger_crmentity ON vtiger_leaddetails.leadid = vtiger_crmentity.crmid INNER JOIN vtiger_leadscf ON vtiger_leaddetails.leadid = vtiger_leadscf.leadid INNER JOIN vtiger_leadaddress ON vtiger_leaddetails.leadid = vtiger_leadaddress.leadaddressid LEFT JOIN vtiger_users ON vtiger_crmentity.smownerid = vtiger_users.id LEFT JOIN vtiger_groups ON vtiger_crmentity.smownerid = vtiger_groups.groupid  WHERE vtiger_crmentity.deleted=0 and vtiger_leaddetails.converted=0 AND vtiger_leaddetails.leadid > 0 ".$qury;
		// }
		// else{
			// $query = $this->getExportQuery($request);
		// }		
		$query = $this->getExportQuery($request);
		$result = $db->pquery($query, array());
		if($moduleName=="Leads"){
			$translatedHeaders = array("Lead Number","Source","Lead Type","Salutation","First Name","Last Name", "Primary Phone","Mobile Phone", "Lead Status","Secondary Email","Primary Email","Modified Time","Assigned To","Email Opt Out","Created Time","From Zip","To Zip","From Country","To Country","Describe your shipment","Contact Subject","Contact Message","Name","Company Name","Customer Email","Cutomer Phone no","Details","Name - Householder","Telephone - Householder","Email - Householder","Company Name - Householder","Fax - Householder","Best Time to Call","City - FROM ORIGIN","Quote For","By - Household","State - FROM ORIGIN","Country - FROM ORIGIN","Zip - FROM ORIGIN","City - TO DESTINATION","State - TO DESTINATION","Country - TO DESTINATION","Zip - TO DESTINATION","Type of Shipment - Household","Estimated Weight","Do You Want Us to Pack Your Goods","List Items to be Packed - Household","Do you need Free Survey","Survey Date","Planning to ship on - Household","Must Arrive Destination on or Before - Household","Additional Information - Household",		
			"Order Online - Shipping","Order Online - By","Ship From","Ship To","Shipper","Consignee","Contact","Contact ship to","Tel. No","Tel. No Ship To","Fax - Ship From","Fax - Ship To","Email - Ship From","Email - Ship To","Your Ref.- Ship From","Your Ref.- Ship To","Address - Ship From","Address - Ship To","City - Ship From","City - Ship To","State - Ship From","State - Ship To","Zip - Ship From","Zip - Ship To","Country - Ship From","Country - Ship To","Nearest Port - Ship From","Pickup Address","Pickup Date and Time","Package Types","container size","Full Truck","Description of Goods","Others","Non- Hazardous Cargo - Specify Commodity","Hazardous Cargo - Specify HAZMAT Info","Perishable Cargo - Specify Info","Yes","List Items to be Packed","Yes","Package Type 1","Nos 1","Length - Inch - 1","Width - Inch - 1","Height - Inch - 1","Gross Wt - lbs - 1","Cubic Ft - 1","Cubic Wt - lbs - 1","Package Type 2","Nos 2","Length - Inch - 2","Width - Inch - 2","Height - Inch - 2","Gross Wt - lbs - 2","Cubic Ft - 2","Cubic Wt - lbs - 2","Package Type 3","Nos 3","Length - Inch - 3","Width - Inch - 3","Height - Inch - 3","Gross Wt - lbs - 3","Cubic Ft - 3","Cubic Wt - lbs - 3","Package Type 4","Nos 4","Length - Inch - 4","Width - Inch - 4","Height - Inch - 4","Gross Wt - lbs - 4","Cubic Ft - 4","Cubic Wt - lbs - 4", "Package Type 5","Nos 5","Length - Inch - 5","Width - Inch - 5","Height - Inch - 5","Gross Wt - lbs - 5","Cubic Ft - 5","Cubic Wt - lbs - 5", "Package Type 6","Nos 6","Length - Inch - 6","Width - Inch - 6","Height - Inch - 6","Gross Wt - lbs - 6","Cubic Ft - 6","Cubic Wt - lbs - 6", "Package Type 7","Nos 7","Length - Inch - 7","Width - Inch - 7","Height - Inch - 7","Gross Wt - lbs - 7","Cubic Ft - 7","Cubic Wt - lbs - 7", "Package Type 8","Nos 8","Length - Inch - 8","Width - Inch - 8","Height - Inch - 8","Gross Wt - lbs - 8","Cubic Ft - 8","Cubic Wt - lbs - 8", "Package Type 9","Nos 9","Length - Inch - 9","Width - Inch - 9","Height - Inch - 9","Gross Wt - lbs - 9","Cubic Ft - 9","Cubic Wt - lbs - 9", "Package Type 10","Nos 10","Length - Inch - 10","Width - Inch - 10","Height - Inch - 10","Gross Wt - lbs - 10","Cubic Ft - 10","Cubic Wt - lbs - 10","Total No","Total Gross Weight","Total Cubic Feet","Total Cubic Weight","If Yes - Advise Value to be insured - US$","Declared Value for U.S Customs -International Only","Would you like to Insure","If Payable by Third party Please provide details","Freight Payable By", "Company Contact Tel Fax Email PO - If any","Company - billing","Street Address - billing","Name - billing","Apt Suite - billing","City - billing","State - billing","Zip - billing","Telephone - billing","Fax - billing","Email - billing","Signed by - billing","Place - billing","Date and Time - biling","Additional Info - billing","modifiedby");
		}else{
			$translatedHeaders = $this->getHeaders();		
		}	
		
				
		$entries = array();
		for($j = 0; $j < $db->num_rows($result); $j++){			
			
			$entries[] = $this->sanitizeValues($db->fetchByAssoc($result, $j));
		}
			
		$this->output($request, $translatedHeaders, $entries);
	}

	public function getHeaders(){
		$headers = array();
		//Query generator set this when generating the query
		if(!empty($this->accessibleFields)) {
			$accessiblePresenceValue = array(0,2);
			foreach($this->accessibleFields as $fieldName) {
				$fieldModel = $this->moduleFieldInstances[$fieldName];
				// Check added as querygenerator is not checking this for admin users
				$presence = $fieldModel->get('presence');
				if(in_array($presence, $accessiblePresenceValue) && $fieldModel->get('displaytype') != '6') {
					$headers[] = $fieldModel->get('label');
				}
			}
		} else {			
			foreach($this->moduleFieldInstances as $field) {
				$headers[] = $field->get('label');
			}
		}

		$translatedHeaders = array();
		foreach($headers as $header) {
			$translatedHeaders[] = vtranslate(html_entity_decode($header, ENT_QUOTES), $this->moduleInstance->getName());
		}

		$translatedHeaders = array_map('decode_html', $translatedHeaders);
		return $translatedHeaders;
	}

	function getAdditionalQueryModules(){
		return array_merge(getInventoryModules(), array('Products', 'Services', 'PriceBooks'));
	}

	/**
	 * Function that generates Export Query based on the mode
	 * @param Vtiger_Request $request
	 * @return <String> export query
	 */
	function getExportQuery(Vtiger_Request $request){
		
		$currentUser = Users_Record_Model::getCurrentUserModel();
		$mode = $request->getMode();
		$cvId = $request->get('viewname');
		$moduleName = $request->get('source_module');

		$queryGenerator = new EnhancedQueryGenerator($moduleName, $currentUser);
		$queryGenerator->initForCustomViewById($cvId);
		$fieldInstances = $this->moduleFieldInstances;

		$orderBy = $request->get('orderby');
		$orderByFieldModel = $fieldInstances[$orderBy];
		$sortOrder = $request->get('sortorder');

		if ($mode !== 'ExportAllData') {
			$operator = $request->get('operator');
			$searchKey = $request->get('search_key');
			$searchValue = $request->get('search_value');

			$tagParams = $request->get('tag_params');
			if (!$tagParams) {
				$tagParams = array();
			}

			$searchParams = $request->get('search_params');
			if (!$searchParams) {
				$searchParams = array();
			}

			$glue = '';
			if($searchParams && count($queryGenerator->getWhereFields())) {
				$glue = QueryGenerator::$AND;
			}
			$searchParams = array_merge($searchParams, $tagParams);
			$searchParams = Vtiger_Util_Helper::transferListSearchParamsToFilterCondition($searchParams, $this->moduleInstance);
			$queryGenerator->parseAdvFilterList($searchParams, $glue);

			if($searchKey) {
				$queryGenerator->addUserSearchConditions(array('search_field' => $searchKey, 'search_text' => $searchValue, 'operator' => $operator));
			}

			if ($orderBy && $orderByFieldModel) {
				if ($orderByFieldModel->getFieldDataType() == Vtiger_Field_Model::REFERENCE_TYPE || $orderByFieldModel->getFieldDataType() == Vtiger_Field_Model::OWNER_TYPE) {
					$queryGenerator->addWhereField($orderBy);
				}
			}
		}

		/**
		 *  For Documents if we select any document folder and mass deleted it should delete documents related to that 
		 *  particular folder only
		 */
		if($moduleName == 'Documents'){
			$folderValue = $request->get('folder_value');
			if(!empty($folderValue)){
				 $queryGenerator->addCondition($request->get('folder_id'),$folderValue,'e');
			}
		}

		$accessiblePresenceValue = array(0,2);
		foreach($fieldInstances as $field) {
			// Check added as querygenerator is not checking this for admin users
			$presence = $field->get('presence');
			if(in_array($presence, $accessiblePresenceValue) && $field->get('displaytype') != '6') {
				$fields[] = $field->getName();
			}
		}
		$queryGenerator->setFields($fields);
		$query = $queryGenerator->getQuery();		
		$additionalModules = $this->getAdditionalQueryModules();
		if(in_array($moduleName, $additionalModules)) {
			$query = $this->moduleInstance->getExportQuery($this->focus, $query);
		}
		
		$this->accessibleFields = $queryGenerator->getFields();
		
		switch($mode) {
			case 'ExportAllData'	:	if ($orderBy && $orderByFieldModel) {
											$query .= ' ORDER BY '.$queryGenerator->getOrderByColumn($orderBy).' '.$sortOrder;
										}
										break;

			case 'ExportCurrentPage' :	$pagingModel = new Vtiger_Paging_Model();
										$limit = $pagingModel->getPageLimit();

										$currentPage = $request->get('page');
										if(empty($currentPage)) $currentPage = 1;

										$currentPageStart = ($currentPage - 1) * $limit;
										if ($currentPageStart < 0) $currentPageStart = 0;

										if ($orderBy && $orderByFieldModel) {
											$query .= ' ORDER BY '.$queryGenerator->getOrderByColumn($orderBy).' '.$sortOrder;
										}
										$query .= ' LIMIT '.$currentPageStart.','.$limit;
										break;

			case 'ExportSelectedRecords' :	$idList = $this->getRecordsListFromRequest($request);
											$baseTable = $this->moduleInstance->get('basetable');
											$baseTableColumnId = $this->moduleInstance->get('basetableid');
											if(!empty($idList)) {
												if(!empty($baseTable) && !empty($baseTableColumnId)) {
													$idList = implode(',' , $idList);
													$query .= ' AND '.$baseTable.'.'.$baseTableColumnId.' IN ('.$idList.')';
												}
											} else {
												$query .= ' AND '.$baseTable.'.'.$baseTableColumnId.' NOT IN ('.implode(',',$request->get('excluded_ids')).')';
											}

											if ($orderBy && $orderByFieldModel) {
												$query .= ' ORDER BY '.$queryGenerator->getOrderByColumn($orderBy).' '.$sortOrder;
											}
											break;


			default :	break;
		}
		return $query;
	}

	/**
	 * Function returns the export type - This can be extended to support different file exports
	 * @param Vtiger_Request $request
	 * @return <String>
	 */
	function getExportContentType(Vtiger_Request $request) {
		$type = $request->get('export_type');
		if(empty($type)) {
			return 'text/csv';
		}
	}

	/**
	 * Function that create the exported file
	 * @param Vtiger_Request $request
	 * @param <Array> $headers - output file header
	 * @param <Array> $entries - outfput file data
	 */
	function output($request, $headers, $entries) {
		$moduleName = $request->get('source_module');
		$fileName = str_replace(' ','_',decode_html(vtranslate($moduleName, $moduleName)));
		// for content disposition header comma should not be there in filename 
		$fileName = str_replace(',', '_', $fileName);
		$exportType = $this->getExportContentType($request);

		header("Content-Disposition:attachment;filename=$fileName.csv");
		header("Content-Type:$exportType;charset=UTF-8");
		header("Expires: Mon, 31 Dec 2000 00:00:00 GMT" );
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT" );
		header("Cache-Control: post-check=0, pre-check=0", false );

		$header = implode("\", \"", $headers);
		$header = "\"" .$header;
		$header .= "\"\r\n";
		echo $header;

		foreach($entries as $row) {
			foreach ($row as $key => $value) {
				/* To support double quotations in CSV format
				 * To review: http://creativyst.com/Doc/Articles/CSV/CSV01.htm#EmbedBRs
				 */
				$row[$key] = str_replace('"', '""', $value);
			}
			$line = implode("\",\"",$row);
			$line = "\"" .$line;
			$line .= "\"\r\n";
			echo $line;
		}
	}

	private $picklistValues;
	private $fieldArray;
	private $fieldDataTypeCache = array();
	/**
	 * this function takes in an array of values for an user and sanitizes it for export
	 * @param array $arr - the array of values
	 */
	function sanitizeValues($arr){
		$db = PearDatabase::getInstance();
		$currentUser = Users_Record_Model::getCurrentUserModel();
		$roleid = $currentUser->get('roleid');
		if(empty ($this->fieldArray)){
			$this->fieldArray = $this->moduleFieldInstances;
			foreach($this->fieldArray as $fieldName => $fieldObj){
				//In database we have same column name in two tables. - inventory modules only
				if($fieldObj->get('table') == 'vtiger_inventoryproductrel' && ($fieldName == 'discount_amount' || $fieldName == 'discount_percent')){
					$fieldName = 'item_'.$fieldName;
					$this->fieldArray[$fieldName] = $fieldObj;
				} else {
					$columnName = $fieldObj->get('column');
					$this->fieldArray[$columnName] = $fieldObj;
				}
			}
		}
		$moduleName = $this->moduleInstance->getName();
		foreach($arr as $fieldName=>&$value){
			if(isset($this->fieldArray[$fieldName])){
				$fieldInfo = $this->fieldArray[$fieldName];
			}else {
				unset($arr[$fieldName]);
				continue;
			}
			//Track if the value had quotes at beginning
			$beginsWithDoubleQuote = strpos($value, '"') === 0;
			$endsWithDoubleQuote = substr($value,-1) === '"'?1:0;

			$value = trim($value,"\"");
			$uitype = $fieldInfo->get('uitype');
			$fieldname = $fieldInfo->get('name');

			if(!$this->fieldDataTypeCache[$fieldName]) {
				$this->fieldDataTypeCache[$fieldName] = $fieldInfo->getFieldDataType();
			}
			$type = $this->fieldDataTypeCache[$fieldName];

			//Restore double quote now.
			if ($beginsWithDoubleQuote) $value = "\"{$value}";
			if($endsWithDoubleQuote) $value = "{$value}\"";
			if($fieldname != 'hdnTaxType' && ($uitype == 15 || $uitype == 16 || $uitype == 33)){
				if(empty($this->picklistValues[$fieldname])){
					$this->picklistValues[$fieldname] = $this->fieldArray[$fieldname]->getPicklistValues();
				}
				// If the value being exported is accessible to current user
				// or the picklist is multiselect type.
				if($uitype == 33 || $uitype == 16 || array_key_exists($value,$this->picklistValues[$fieldname])){
					// NOTE: multipicklist (uitype=33) values will be concatenated with |# delim
					$value = trim($value);
				} else {
					$value = '';
				}
			} elseif($uitype == 52 || $type == 'owner') {
				$value = Vtiger_Util_Helper::getOwnerName($value);
			}elseif($type == 'reference'){
				$value = trim($value);
				if(!empty($value)) {
					$parent_module = getSalesEntityType($value);
					$displayValueArray = getEntityName($parent_module, $value);
					if(!empty($displayValueArray)){
						foreach($displayValueArray as $k=>$v){
							$displayValue = $v;
						}
					}
					if(!empty($parent_module) && !empty($displayValue)){
						$value = $parent_module."::::".$displayValue;
					}else{
						$value = "";
					}
				} else {
					$value = '';
				}
			} elseif($uitype == 72 || $uitype == 71) {
                $value = CurrencyField::convertToUserFormat($value, null, true, true);
			} elseif($uitype == 7 && $fieldInfo->get('typeofdata') == 'N~O' || $uitype == 9){
				$value = decimalFormat($value);
			} elseif($type == 'date') {
				if ($value && $value != '0000-00-00') {
					$value = DateTimeField::convertToUserFormat($value);
				}
			} elseif($type == 'datetime') {
				if ($moduleName == 'Calendar' && in_array($fieldName, array('date_start', 'due_date'))) {
					$timeField = 'time_start';
					if ($fieldName === 'due_date') {
						$timeField = 'time_end';
					}
					$value = $value.' '.$arr[$timeField];
				}
				if (trim($value) && $value != '0000-00-00 00:00:00') {
					$value = Vtiger_Datetime_UIType::getDisplayDateTimeValue($value);
				}
			}
			if($moduleName == 'Documents' && $fieldname == 'description'){
				$value = strip_tags($value);
				$value = str_replace('&nbsp;','',$value);
				array_push($new_arr,$value);
			}
		}
		return $arr;
	}

	public function moduleFieldInstances($moduleName){		
		return $this->moduleInstance->getFields();
	}
}