{*<!--
/*********************************************************************************
** The contents of this file are subject to the vtiger CRM Public License Version 1.0
* ("License"); You may not use this file except in compliance with the License
* The Original Code is: vtiger CRM Open Source
* The Initial Developer of the Original Code is vtiger.
* Portions created by vtiger are Copyright (C) vtiger.
* All Rights Reserved.
********************************************************************************/
-->*}
{strip}
	{if !empty($PICKIST_DEPENDENCY_DATASOURCE)}
		<input type="hidden" name="picklistDependency" value='{Vtiger_Util_Helper::toSafeHTML($PICKIST_DEPENDENCY_DATASOURCE)}' />
	{/if}

	<div name='editContent'>
		{foreach key=BLOCK_LABEL item=BLOCK_FIELDS from=$RECORD_STRUCTURE name=blockIterator}
			{if $BLOCK_FIELDS|@count gt 0}
				<div class='fieldBlockContainer block_{$BLOCK_LABEL}'>
					<h4 class='fieldBlockHeader'>{vtranslate($BLOCK_LABEL, $MODULE)}</h4>
					<hr>
					<table class="table table-borderless">
						<tr>
							{assign var=COUNTER value=0}
							{foreach key=FIELD_NAME item=FIELD_MODEL from=$BLOCK_FIELDS name=blockfields}
								{assign var="isReferenceField" value=$FIELD_MODEL->getFieldDataType()}
								{assign var="refrenceList" value=$FIELD_MODEL->getReferenceList()}
								{assign var="refrenceListCount" value=count($refrenceList)}
								{if $FIELD_MODEL->isEditable() eq true}
									{if $FIELD_MODEL->get('uitype') eq "19"}
										{if $COUNTER eq '1'}
											<td></td><td></td></tr><tr>
											{assign var=COUNTER value=0}
										{/if}
									{/if}
									{if $COUNTER eq 2}
									</tr><tr>
										{assign var=COUNTER value=1}
									{else}
										{assign var=COUNTER value=$COUNTER+1}
									{/if}
									<td class="fieldLabel alignMiddle" id="{$MODULE_NAME}_detailView_fieldLabel_{$FIELD_MODEL->getName()}" {if $FIELD_MODEL->getName() eq 'description' or $FIELD_MODEL->get('uitype') eq '69'} style='width:8%'{/if}>
										{if $isReferenceField eq "reference"}
											{if $refrenceListCount > 1}
												{assign var="DISPLAYID" value=$FIELD_MODEL->get('fieldvalue')}
												{assign var="REFERENCED_MODULE_STRUCTURE" value=$FIELD_MODEL->getUITypeModel()->getReferenceModule($DISPLAYID)}
												{if !empty($REFERENCED_MODULE_STRUCTURE)}
													{assign var="REFERENCED_MODULE_NAME" value=$REFERENCED_MODULE_STRUCTURE->get('name')}
												{/if}
												<select style="width: 140px;" class="select2 referenceModulesList">
													{foreach key=index item=value from=$refrenceList}
														<option value="{$value}" {if $value eq $REFERENCED_MODULE_NAME} selected {/if}>{vtranslate($value, $value)}</option>
													{/foreach}
												</select>
											{else}
												{vtranslate($FIELD_MODEL->get('label'), $MODULE)}
											{/if}
										{else if $FIELD_MODEL->get('uitype') eq "83"}
											{include file=vtemplate_path($FIELD_MODEL->getUITypeModel()->getTemplateName(),$MODULE) COUNTER=$COUNTER MODULE=$MODULE}
											{if $TAXCLASS_DETAILS}
												{assign 'taxCount' count($TAXCLASS_DETAILS)%2}
												{if $taxCount eq 0}
													{if $COUNTER eq 2}
														{assign var=COUNTER value=1}
													{else}
														{assign var=COUNTER value=2}
													{/if}
												{/if}
											{/if}
										{else}
											{if $MODULE eq 'Documents' && $FIELD_MODEL->get('label') eq 'File Name'}
												{assign var=FILE_LOCATION_TYPE_FIELD value=$RECORD_STRUCTURE['LBL_FILE_INFORMATION']['filelocationtype']}
												{if $FILE_LOCATION_TYPE_FIELD}
													{if $FILE_LOCATION_TYPE_FIELD->get('fieldvalue') eq 'E'}
														{vtranslate("LBL_FILE_URL", $MODULE)}&nbsp;<span class="redColor">*</span>
													{else}
														{vtranslate($FIELD_MODEL->get('label'), $MODULE)}
													{/if}
												{else}
													{vtranslate($FIELD_MODEL->get('label'), $MODULE)}
												{/if}
											{else}
												{vtranslate($FIELD_MODEL->get('label'), $MODULE)}
											{/if}
										{/if}
										&nbsp;{if $FIELD_MODEL->isMandatory() eq true} <span class="redColor">*</span> {/if}
									</td>
									{if $FIELD_MODEL->get('uitype') neq '83'}
										<td class="fieldValue" {if $FIELD_MODEL->getFieldDataType() eq 'boolean'} style="width:25%" {/if} {if $FIELD_MODEL->get('uitype') eq '19'} colspan="3" {assign var=COUNTER value=$COUNTER+1} {/if} id="{$MODULE_NAME}_detailView_fieldValue_{$FIELD_MODEL->getName()}" {if $FIELD_MODEL->get('uitype') eq '19' or $fieldDataType eq 'reminder' or $fieldDataType eq 'recurrence'} colspan="3" {assign var=COUNTER value=$COUNTER+1} {/if}>
											{include file=vtemplate_path($FIELD_MODEL->getUITypeModel()->getTemplateName(),$MODULE)}
										</td>
									{/if}
								{/if}
							{/foreach}
							{*If their are odd number of fields in edit then border top is missing so adding the check*}
							{if $COUNTER is odd}
								<td></td>
								<td></td>
							{/if}
						</tr>
					</table>
				</div>
			{/if}
		{/foreach}
	</div>
{/strip}
<script>
	$("select[name$='cf_1250']").change(function(){
		var leadType = $(this).val();
		if(leadType=="Order Online"){					
			$(".block_Commercial").show();
			$(".block_Order").show();
			$(".block_Package").show();
			$(".block_Provide").show();			
			$(".Payable").show();
			$(".block_Other").show();
			$(".block_Billing").show();
			$(".block_LBL_CUSTOM_INFORMATION").show();
			$(".Quote").hide();
			$(".Quotes").hide();			
			
			$("#Leads_detailView_fieldLabel_cf_864").hide();
			$("#Leads_detailView_fieldValue_cf_864").hide();
			
			$("#Leads_detailView_fieldLabel_cf_866").hide();
			$("#Leads_detailView_fieldValue_cf_866").hide();
			
			$("#Leads_detailView_fieldLabel_cf_854").hide();
			$("#Leads_detailView_fieldValue_cf_854").hide();
			
			$("#Leads_detailView_fieldLabel_cf_858").hide();
			$("#Leads_detailView_fieldValue_cf_858").hide();
			
			$("#Leads_detailView_fieldLabel_cf_862").hide();
			$("#Leads_detailView_fieldValue_cf_862").hide();
			
			$("#Leads_detailView_fieldLabel_cf_856").hide();
			$("#Leads_detailView_fieldValue_cf_856").hide();
			
			$("#Leads_detailView_fieldLabel_cf_860").hide();
			$("#Leads_detailView_fieldValue_cf_860").hide();
			
		}else if(leadType=="Commercial Cargo"){
			$(".block_Commercial").hide();
			$(".block_Order").hide();
			$(".block_Package").hide();
			$(".block_Provide").hide();			
			$(".Payable").hide();
			$(".block_Other").hide();
			$(".block_Billing").hide();
			$(".block_LBL_CUSTOM_INFORMATION").hide();
			$(".Quote").show();
			$(".Quotes").hide();
			
			$("#Leads_detailView_fieldLabel_cf_864").hide();
			$("#Leads_detailView_fieldValue_cf_864").hide();
			
			$("#Leads_detailView_fieldLabel_cf_866").hide();
			$("#Leads_detailView_fieldValue_cf_866").hide();
			
			$("#Leads_detailView_fieldLabel_cf_854").hide();
			$("#Leads_detailView_fieldValue_cf_854").hide();
			
			$("#Leads_detailView_fieldLabel_cf_858").hide();
			$("#Leads_detailView_fieldValue_cf_858").hide();
			
			$("#Leads_detailView_fieldLabel_cf_862").hide();
			$("#Leads_detailView_fieldValue_cf_862").hide();
			
			$("#Leads_detailView_fieldLabel_cf_856").hide();
			$("#Leads_detailView_fieldValue_cf_856").hide();
			
			$("#Leads_detailView_fieldLabel_cf_860").hide();
			$("#Leads_detailView_fieldValue_cf_860").hide();
			
		}else if(leadType=="Household Quote"){
			$(".block_Commercial").hide();
			$(".block_Order").hide();
			$(".block_Package").hide();
			$(".block_Provide").hide();			
			$(".Payable").hide();
			$(".block_Other").hide();
			$(".block_Billing").hide();
			$(".block_LBL_CUSTOM_INFORMATION").hide();
			$(".Quote").hide();
			$(".Quotes").show();
			
			$("#Leads_detailView_fieldLabel_cf_864").hide();
			$("#Leads_detailView_fieldValue_cf_864").hide();
			
			$("#Leads_detailView_fieldLabel_cf_866").hide();
			$("#Leads_detailView_fieldValue_cf_866").hide();
			
			$("#Leads_detailView_fieldLabel_cf_854").hide();
			$("#Leads_detailView_fieldValue_cf_854").hide();
			
			$("#Leads_detailView_fieldLabel_cf_858").hide();
			$("#Leads_detailView_fieldValue_cf_858").hide();
			
			$("#Leads_detailView_fieldLabel_cf_862").hide();
			$("#Leads_detailView_fieldValue_cf_862").hide();
			
			$("#Leads_detailView_fieldLabel_cf_856").hide();
			$("#Leads_detailView_fieldValue_cf_856").hide();
			
			$("#Leads_detailView_fieldLabel_cf_860").hide();
			$("#Leads_detailView_fieldValue_cf_860").hide();
						
			
		}else if(leadType=="Contact"){
			$(".block_Commercial").hide();
			$(".block_Order").hide();
			$(".block_Package").hide();
			$(".block_Provide").hide();			
			$(".Payable").hide();
			$(".block_Other").hide();
			$(".block_Billing").hide();
			$(".block_LBL_CUSTOM_INFORMATION").hide();
			$(".Quote").hide();
			$(".Quotes").hide();
			
			$("#Leads_detailView_fieldLabel_cf_864").show();
			$("#Leads_detailView_fieldValue_cf_864").show();
			
			$("#Leads_detailView_fieldLabel_cf_866").show();
			$("#Leads_detailView_fieldValue_cf_866").show();
			
			$("#Leads_detailView_fieldLabel_cf_854").hide();
			$("#Leads_detailView_fieldValue_cf_854").hide();
			
			$("#Leads_detailView_fieldLabel_cf_858").hide();
			$("#Leads_detailView_fieldValue_cf_858").hide();
			
			$("#Leads_detailView_fieldLabel_cf_862").hide();
			$("#Leads_detailView_fieldValue_cf_862").hide();
			
			$("#Leads_detailView_fieldLabel_cf_856").hide();
			$("#Leads_detailView_fieldValue_cf_856").hide();
			
			$("#Leads_detailView_fieldLabel_cf_860").hide();
			$("#Leads_detailView_fieldValue_cf_860").hide();
			
			
		}else if(leadType=="Quote"){
			$(".block_Commercial").hide();
			$(".block_Order").hide();
			$(".block_Package").hide();
			$(".block_Provide").hide();			
			$(".Payable").hide();
			$(".block_Other").hide();
			$(".block_Billing").hide();
			$(".block_LBL_CUSTOM_INFORMATION").hide();
			$(".Quote").hide();
			$(".Quotes").hide();
			
			$("#Leads_detailView_fieldLabel_cf_854").show();
			$("#Leads_detailView_fieldValue_cf_854").show();
			
			$("#Leads_detailView_fieldLabel_cf_858").show();
			$("#Leads_detailView_fieldValue_cf_858").show();
			
			$("#Leads_detailView_fieldLabel_cf_862").show();
			$("#Leads_detailView_fieldValue_cf_862").show();
			
			$("#Leads_detailView_fieldLabel_cf_856").show();
			$("#Leads_detailView_fieldValue_cf_856").show();
			
			$("#Leads_detailView_fieldLabel_cf_860").show();
			$("#Leads_detailView_fieldValue_cf_860").show();
			
			
			$("#Leads_detailView_fieldLabel_cf_864").hide();
			$("#Leads_detailView_fieldValue_cf_864").hide();
			
			$("#Leads_detailView_fieldLabel_cf_866").hide();
			$("#Leads_detailView_fieldValue_cf_866").hide();
			
			
		}else{
			$(".block_Commercial").show();
			$(".block_Order").show();
			$(".block_Package").show();
			$(".block_Provide").show();			
			$(".Payable").show();
			$(".block_Other").show();
			$(".block_Billing").show();
			$(".block_LBL_CUSTOM_INFORMATION").show();
			$(".Quote").show();	
			$(".Quotes").show();
			
			$("#Leads_detailView_fieldLabel_cf_864").show();
			$("#Leads_detailView_fieldValue_cf_864").show();
			
			$("#Leads_detailView_fieldLabel_cf_866").show();
			$("#Leads_detailView_fieldValue_cf_866").show();
			
			$("#Leads_detailView_fieldLabel_cf_854").show();
			$("#Leads_detailView_fieldValue_cf_854").show();
			
			$("#Leads_detailView_fieldLabel_cf_858").show();
			$("#Leads_detailView_fieldValue_cf_858").show();
			
			$("#Leads_detailView_fieldLabel_cf_862").show();
			$("#Leads_detailView_fieldValue_cf_862").show();
			
			$("#Leads_detailView_fieldLabel_cf_856").show();
			$("#Leads_detailView_fieldValue_cf_856").show();
			
			$("#Leads_detailView_fieldLabel_cf_860").show();
			$("#Leads_detailView_fieldValue_cf_860").show();
		}
	});

var leadType = $("select[name$='cf_1250']").val();	
if($.trim(leadType)=="Order Online"){
	$(".block_Commercial").hide();
	$("#Leads_detailView_fieldLabel_cf_856").hide();
	$("#Leads_detailView_fieldValue_cf_856").hide();
	
	$("#Leads_detailView_fieldLabel_cf_860").hide();
	$("#Leads_detailView_fieldValue_cf_860").hide();
	
	$("#Leads_detailView_fieldLabel_cf_864").hide();
	$("#Leads_detailView_fieldValue_cf_864").hide();
	
	$("#Leads_detailView_fieldLabel_cf_866").hide();
	$("#Leads_detailView_fieldValue_cf_866").hide();
	
	$("#Leads_detailView_fieldLabel_cf_854").hide();
	$("#Leads_detailView_fieldValue_cf_854").hide();
	
	$("#Leads_detailView_fieldLabel_cf_858").hide();
	$("#Leads_detailView_fieldValue_cf_858").hide();
	
	$("#Leads_detailView_fieldLabel_cf_862").hide();
	$("#Leads_detailView_fieldValue_cf_862").hide();
	
	$(".block_Household").hide();
	
	/* For order online conditions */
	if($.trim(leadType)==""){
	$("#Leads_detailView_fieldLabel_cf_1024").closest("tr").hide();
	$("#Leads_detailView_fieldLabel_cf_1028").closest("tr").hide();
	$("#Leads_detailView_fieldLabel_cf_1032").closest("tr").hide();
	$("#Leads_detailView_fieldLabel_cf_1036").closest("tr").hide();	
	}

	if($.trim(leadType)==""){
		$("#Leads_detailView_fieldLabel_cf_1040").closest("tr").hide();
		$("#Leads_detailView_fieldLabel_cf_1044").closest("tr").hide();
		$("#Leads_detailView_fieldLabel_cf_1048").closest("tr").hide();
		$("#Leads_detailView_fieldLabel_cf_1052").closest("tr").hide();	
	}


	if($.trim(leadType)==""){ 
		$("#Leads_detailView_fieldLabel_cf_1056").closest("tr").hide();
		$("#Leads_detailView_fieldLabel_cf_1060").closest("tr").hide();
		$("#Leads_detailView_fieldLabel_cf_1064").closest("tr").hide();
		$("#Leads_detailView_fieldLabel_cf_1068").closest("tr").hide();	
	}

	if($.trim(leadType)==""){
		$("#Leads_detailView_fieldLabel_cf_1074").closest("tr").hide();
		$("#Leads_detailView_fieldLabel_cf_1078").closest("tr").hide();
		$("#Leads_detailView_fieldLabel_cf_1082").closest("tr").hide();
		$("#Leads_detailView_fieldLabel_cf_1086").closest("tr").hide();	
	}

	if($.trim(leadType)==""){
		$("#Leads_detailView_fieldLabel_cf_1090").closest("tr").hide();
		$("#Leads_detailView_fieldLabel_cf_1094").closest("tr").hide();
		$("#Leads_detailView_fieldLabel_cf_1098").closest("tr").hide();
		$("#Leads_detailView_fieldLabel_cf_1102").closest("tr").hide();	
	}

	if($.trim(leadType)==""){
		$("#Leads_detailView_fieldLabel_cf_1106").closest("tr").hide();
		$("#Leads_detailView_fieldLabel_cf_1110").closest("tr").hide();
		$("#Leads_detailView_fieldLabel_cf_1114").closest("tr").hide();
		$("#Leads_detailView_fieldLabel_cf_1116").closest("tr").hide();	
	}

	if($.trim(leadType)==""){
		$("#Leads_detailView_fieldLabel_cf_1120").closest("tr").hide();
		$("#Leads_detailView_fieldLabel_cf_1126").closest("tr").hide();
		$("#Leads_detailView_fieldLabel_cf_1130").closest("tr").hide();
		$("#Leads_detailView_fieldLabel_cf_1134").closest("tr").hide();	
	}

	if($.trim(leadType)==""){
		$("#Leads_detailView_fieldLabel_cf_1138").closest("tr").hide();
		$("#Leads_detailView_fieldLabel_cf_1142").closest("tr").hide();
		$("#Leads_detailView_fieldLabel_cf_1146").closest("tr").hide();
		$("#Leads_detailView_fieldLabel_cf_1150").closest("tr").hide();	
	}

	if($.trim(leadType)==""){
		$("#Leads_detailView_fieldLabel_cf_1152").closest("tr").hide();
		$("#Leads_detailView_fieldLabel_cf_1158").closest("tr").hide();
		$("#Leads_detailView_fieldLabel_cf_1162").closest("tr").hide();
		$("#Leads_detailView_fieldLabel_cf_1166").closest("tr").hide();	
	}

	if($.trim(leadType)==""){
		$("#Leads_detailView_fieldLabel_cf_1170").closest("tr").hide();
		$("#Leads_detailView_fieldLabel_cf_1174").closest("tr").hide();
		$("#Leads_detailView_fieldLabel_cf_1178").closest("tr").hide();
		$("#Leads_detailView_fieldLabel_cf_1182").closest("tr").hide();	
	}
	/* For order online conditions */	
}

if($.trim(leadType)=="Contact"){
	$(".block_Commercial").hide();
	$(".block_Order").hide();
	$(".block_Package").hide();	
	$(".block_Commercial").hide();
	$(".block_Provide").hide();
			
	$(".Payable").hide();
	$(".block_Other").hide();
	$(".block_Billing").hide();
	$(".block_LBL_CUSTOM_INFORMATION").hide();
	$(".block_Household").hide();
	
	
	$("#Leads_detailView_fieldLabel_cf_854").hide();
	$("#Leads_detailView_fieldValue_cf_854").hide();
	
	$("#Leads_detailView_fieldLabel_cf_858").hide();
	$("#Leads_detailView_fieldValue_cf_858").hide();
	
	$("#Leads_detailView_fieldLabel_cf_862").hide();
	$("#Leads_detailView_fieldValue_cf_862").hide();
	
	$("#Leads_detailView_fieldLabel_cf_856").hide();
	$("#Leads_detailView_fieldValue_cf_856").hide();
	
	$("#Leads_detailView_fieldLabel_cf_860").hide();
	$("#Leads_detailView_fieldValue_cf_860").hide();
}


if($.trim(leadType)=="Quote"){
	$(".block_Commercial").hide();
	$(".block_Order").hide();
	$(".block_Package").hide();	
	$(".block_Commercial").hide();
	$(".block_Provide").hide();
	
	$(".block_Household").hide();
			
	$(".Payable").hide();
	$(".block_Other").hide();
	$(".block_Billing").hide();
	$(".block_LBL_CUSTOM_INFORMATION").hide();
	
	$("#Leads_detailView_fieldLabel_cf_864").hide();
	$("#Leads_detailView_fieldValue_cf_864").hide();
	
	$("#Leads_detailView_fieldLabel_cf_866").hide();
	$("#Leads_detailView_fieldValue_cf_866").hide();
}

if($.trim(leadType)=="Commercial Cargo"){
	$(".block_Order").hide();
	$(".block_Package").hide();	
	$(".block_Commercial").hide();
	$(".block_Provide").hide();
	$(".Quote").show();
	$(".Quotes").hide();
			
	$(".Payable").hide();
	$(".block_Other").hide();
	$(".block_Billing").hide();
	$(".block_LBL_CUSTOM_INFORMATION").hide();
	
	$("#Leads_detailView_fieldLabel_cf_854").hide();
	$("#Leads_detailView_fieldValue_cf_854").hide();
	
	$("#Leads_detailView_fieldLabel_cf_858").hide();
	$("#Leads_detailView_fieldValue_cf_858").hide();
	
	$("#Leads_detailView_fieldLabel_cf_862").hide();
	$("#Leads_detailView_fieldValue_cf_862").hide();
	
	$("#Leads_detailView_fieldLabel_cf_856").hide();
	$("#Leads_detailView_fieldValue_cf_856").hide();
	
	$("#Leads_detailView_fieldLabel_cf_860").hide();
	$("#Leads_detailView_fieldValue_cf_860").hide();
	
	$("#Leads_detailView_fieldLabel_cf_864").hide();
	$("#Leads_detailView_fieldValue_cf_864").hide();
	
	$("#Leads_detailView_fieldLabel_cf_866").hide();
	$("#Leads_detailView_fieldValue_cf_866").hide();
}

if($.trim(leadType)=="Household Quote"){
	$(".block_Order").hide();
	$(".block_Package").hide();
	$(".block_Commercial").hide();
	$(".block_Provide").hide();
	$(".Quote").hide();
	$(".Quotes").show();
			
	$(".Payable").hide();
	$(".block_Other").hide();
	$(".block_Billing").hide();
	$(".block_LBL_CUSTOM_INFORMATION").hide();
	
	$("#Leads_detailView_fieldLabel_cf_854").hide();
	$("#Leads_detailView_fieldValue_cf_854").hide();
	
	$("#Leads_detailView_fieldLabel_cf_858").hide();
	$("#Leads_detailView_fieldValue_cf_858").hide();
	
	$("#Leads_detailView_fieldLabel_cf_862").hide();
	$("#Leads_detailView_fieldValue_cf_862").hide();
	
	$("#Leads_detailView_fieldLabel_cf_856").hide();
	$("#Leads_detailView_fieldValue_cf_856").hide();
	
	$("#Leads_detailView_fieldLabel_cf_860").hide();
	$("#Leads_detailView_fieldValue_cf_860").hide();
	
	$("#Leads_detailView_fieldLabel_cf_864").hide();
	$("#Leads_detailView_fieldValue_cf_864").hide();
	
	$("#Leads_detailView_fieldLabel_cf_866").hide();
	$("#Leads_detailView_fieldValue_cf_866").hide();
}

$("#Leads_detailView_fieldLabel_cf_1254").hide();
$("#Leads_detailView_fieldValue_cf_1254").hide();

$("select[name='assigned_user_id'] option[value='10']").each(function(){
    $(this).remove();
});
</script>

{if $CURRENT_USER_MODEL->get('id') neq '10'}
<script>
var assigned_user_id = $('select[name="assigned_user_id"] option:selected').val();
if(assigned_user_id!=1){
	$("#s2id_autogen7").hide();
	var assigns = $('select[name="assigned_user_id"] option:selected').text();	
	$("#Leads_detailView_fieldValue_assigned_user_id").html(assigns);	
}
</script>
{/if}