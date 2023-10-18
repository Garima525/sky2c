{*+**********************************************************************************
* The contents of this file are subject to the vtiger CRM Public License Version 1.1
* ("License"); You may not use this file except in compliance with the License
* The Original Code is: vtiger CRM Open Source
* The Initial Developer of the Original Code is vtiger.
* Portions created by vtiger are Copyright (C) vtiger.
* All Rights Reserved.
*************************************************************************************}

{strip}
	{if !empty($PICKIST_DEPENDENCY_DATASOURCE)}
		<input type="hidden" name="picklistDependency" value='{Vtiger_Util_Helper::toSafeHTML($PICKIST_DEPENDENCY_DATASOURCE)}' />
	{/if}

	{foreach key=BLOCK_LABEL_KEY item=FIELD_MODEL_LIST from=$RECORD_STRUCTURE}
		{assign var=BLOCK value=$BLOCK_LIST[$BLOCK_LABEL_KEY]}
		{if $BLOCK eq null or $FIELD_MODEL_LIST|@count lte 0}{continue}{/if}
		<div class="block block_{$BLOCK_LABEL_KEY}">
			{assign var=IS_HIDDEN value=$BLOCK->isHidden()}
			{assign var=WIDTHTYPE value=$USER_MODEL->get('rowheight')}
			<input type=hidden name="timeFormatOptions" data-value='{$DAY_STARTS}' />
			<div>
				<h4 class="textOverflowEllipsis maxWidth50">
					<img class="cursorPointer alignMiddle blockToggle {if !($IS_HIDDEN)} hide {/if}" src="{vimage_path('arrowRight.png')}" data-mode="hide" data-id={$BLOCK_LIST[$BLOCK_LABEL_KEY]->get('id')}>
					<img class="cursorPointer alignMiddle blockToggle {if ($IS_HIDDEN)} hide {/if}" src="{vimage_path('arrowdown.png')}" data-mode="show" data-id={$BLOCK_LIST[$BLOCK_LABEL_KEY]->get('id')}>&nbsp;
					{vtranslate({$BLOCK_LABEL_KEY},{$MODULE_NAME})}
				</h4>
			</div>
			<hr>
			<div class="blockData">
				<table class="table detailview-table no-border">
					<tbody {if $IS_HIDDEN} class="hide" {/if}>
						{assign var=COUNTER value=0}
						<tr>
							{foreach item=FIELD_MODEL key=FIELD_NAME from=$FIELD_MODEL_LIST}
								{assign var=fieldDataType value=$FIELD_MODEL->getFieldDataType()}
								{if !$FIELD_MODEL->isViewableInDetailView()}
									{continue}
								{/if}
								{if $FIELD_MODEL->get('uitype') eq "83"}
									{foreach item=tax key=count from=$TAXCLASS_DETAILS}
										{if $COUNTER eq 2}
											</tr><tr>
											{assign var="COUNTER" value=1}
										{else}
											{assign var="COUNTER" value=$COUNTER+1}
										{/if}
										<td class="fieldLabel {$WIDTHTYPE}">
											<span class='muted'>{vtranslate($tax.taxlabel, $MODULE)}(%)</span>
										</td>
										<td class="fieldValue {$WIDTHTYPE}">
											<span class="value textOverflowEllipsis" data-field-type="{$FIELD_MODEL->getFieldDataType()}" >
												{if $tax.check_value eq 1}
													{$tax.percentage}
												{else}
													0
												{/if} 
											</span>
										</td>
									{/foreach}
								{else if $FIELD_MODEL->get('uitype') eq "69" || $FIELD_MODEL->get('uitype') eq "105"}
									{if $COUNTER neq 0}
										{if $COUNTER eq 2}
											</tr><tr>
											{assign var=COUNTER value=0}
										{/if}
									{/if}
									<td class="fieldLabel {$WIDTHTYPE}"><span class="muted">{vtranslate({$FIELD_MODEL->get('label')},{$MODULE_NAME})}</span></td>
									<td class="fieldValue {$WIDTHTYPE}">
										<ul id="imageContainer">
											{foreach key=ITER item=IMAGE_INFO from=$IMAGE_DETAILS}
												{if !empty($IMAGE_INFO.path) && !empty({$IMAGE_INFO.orgname})}
													<li><img src="{$IMAGE_INFO.path}_{$IMAGE_INFO.orgname}" title="{$IMAGE_INFO.orgname}" width="400" height="300" /></li>
												{/if}
											{/foreach}
										</ul>
									</td>
									{assign var=COUNTER value=$COUNTER+1}
								{else}
									{if $FIELD_MODEL->get('uitype') eq "20" or $FIELD_MODEL->get('uitype') eq "19" or $fieldDataType eq 'reminder' or $fieldDataType eq 'recurrence'}
										{if $COUNTER eq '1'}
											<td class="fieldLabel {$WIDTHTYPE}"></td><td class="{$WIDTHTYPE}"></td></tr><tr>
											{assign var=COUNTER value=0}
										{/if}
									{/if}
									{if $COUNTER eq 2}
										</tr>
										
										
								
						<tr>
										{assign var=COUNTER value=1}
									{else}
										{assign var=COUNTER value=$COUNTER+1}
									{/if}
									<td class="fieldLabel textOverflowEllipsis {$WIDTHTYPE}" id="{$MODULE_NAME}_detailView_fieldLabel_{$FIELD_MODEL->getName()}" {if $FIELD_MODEL->getName() eq 'description' or $FIELD_MODEL->get('uitype') eq '69'} style='width:8%'{/if}>
										<span class="muted">
											{if $MODULE_NAME eq 'Documents' && $FIELD_MODEL->get('label') eq "File Name" && $RECORD->get('filelocationtype') eq 'E'}
												{vtranslate("LBL_FILE_URL",{$MODULE_NAME})}
											{else}
												{vtranslate({$FIELD_MODEL->get('label')},{$MODULE_NAME})}
												
												
												
											{/if}
											{if ($FIELD_MODEL->get('uitype') eq '72') && ($FIELD_MODEL->getName() eq 'unit_price')}
												({$BASE_CURRENCY_SYMBOL})
											{/if}
										</span>
									</td>
									<td class="fieldValue {$WIDTHTYPE}" id="{$MODULE_NAME}_detailView_fieldValue_{$FIELD_MODEL->getName()}" {if $FIELD_MODEL->get('uitype') eq '19' or $fieldDataType eq 'reminder' or $fieldDataType eq 'recurrence'} colspan="3" {assign var=COUNTER value=$COUNTER+1} {/if}>
									
										{assign var=FIELD_VALUE value=$FIELD_MODEL->get('fieldvalue')}
										{if $fieldDataType eq 'multipicklist'}
											{assign var=FIELD_DISPLAY_VALUE value=$FIELD_MODEL->getDisplayValue($FIELD_MODEL->get('fieldvalue'))}
										{else}
											{assign var=FIELD_DISPLAY_VALUE value=Vtiger_Util_Helper::toSafeHTML($FIELD_MODEL->getDisplayValue($FIELD_MODEL->get('fieldvalue')))}
										{/if}

										<span class="value" data-field-type="{$FIELD_MODEL->getFieldDataType()}" {if $FIELD_MODEL->get('uitype') eq '19' or $FIELD_MODEL->get('uitype') eq '21'} style="white-space:normal;" {/if}>
											{include file=vtemplate_path($FIELD_MODEL->getUITypeModel()->getDetailViewTemplateName(),$MODULE_NAME) FIELD_MODEL=$FIELD_MODEL USER_MODEL=$USER_MODEL MODULE=$MODULE_NAME RECORD=$RECORD}
										</span>
										{if $IS_AJAX_ENABLED && $FIELD_MODEL->isEditable() eq 'true' && $FIELD_MODEL->isAjaxEditable() eq 'true'}
											<span class="hide edit pull-left">
												{if $fieldDataType eq 'multipicklist'}
													<input type="hidden" class="fieldBasicData" data-name='{$FIELD_MODEL->get('name')}[]' data-type="{$fieldDataType}" data-displayvalue='{$FIELD_DISPLAY_VALUE}' data-value="{$FIELD_VALUE}" />
												{else}
													<input type="hidden" class="fieldBasicData" data-name='{$FIELD_MODEL->get('name')}' data-type="{$fieldDataType}" data-displayvalue='{$FIELD_DISPLAY_VALUE}' data-value="{$FIELD_VALUE}" />
												{/if}
											</span>
											<!--span class="action pull-right"><a href="#" onclick="return false;" class="editAction fa fa-pencil"></a></span-->
										{/if}
									</td>
								{/if}

								{if $FIELD_MODEL_LIST|@count eq 1 and $FIELD_MODEL->get('uitype') neq "19" and $FIELD_MODEL->get('uitype') neq "20" and $FIELD_MODEL->get('uitype') neq "30" and $FIELD_MODEL->get('name') neq "recurringtype" and $FIELD_MODEL->get('uitype') neq "69" and $FIELD_MODEL->get('uitype') neq "105"}
									<td class="fieldLabel {$WIDTHTYPE}"></td><td class="{$WIDTHTYPE}"></td>
								{/if}
							{/foreach}
							{* adding additional column for odd number of fields in a block *}
							{if $FIELD_MODEL_LIST|@end eq true and $FIELD_MODEL_LIST|@count neq 1 and $COUNTER eq 1}
								<td class="fieldLabel {$WIDTHTYPE}"></td><td class="{$WIDTHTYPE}"></td>
							{/if}
						</tr>
						
						
						
					</tbody>
				</table>
			</div>
		</div>
		<br>
	{/foreach}
{/strip}
<script>

if($.trim($("#Leads_detailView_fieldValue_cf_1250 span >span").text())=="Order Online"){
	$(".block_Commercial").hide();
	$(".Quotes").hide();
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
	
	/* For order online conditions */
	if($.trim($("#Leads_detailView_fieldValue_cf_1024 span").text())==""){
	$("#Leads_detailView_fieldLabel_cf_1024").closest("tr").hide();
	$("#Leads_detailView_fieldLabel_cf_1028").closest("tr").hide();
	$("#Leads_detailView_fieldLabel_cf_1032").closest("tr").hide();
	$("#Leads_detailView_fieldLabel_cf_1036").closest("tr").hide();	
	}

	if($.trim($("#Leads_detailView_fieldValue_cf_1040 span").text())==""){
		$("#Leads_detailView_fieldLabel_cf_1040").closest("tr").hide();
		$("#Leads_detailView_fieldLabel_cf_1044").closest("tr").hide();
		$("#Leads_detailView_fieldLabel_cf_1048").closest("tr").hide();
		$("#Leads_detailView_fieldLabel_cf_1052").closest("tr").hide();	
	}


	if($.trim($("#Leads_detailView_fieldValue_cf_1056 span").text())==""){ 
		$("#Leads_detailView_fieldLabel_cf_1056").closest("tr").hide();
		$("#Leads_detailView_fieldLabel_cf_1060").closest("tr").hide();
		$("#Leads_detailView_fieldLabel_cf_1064").closest("tr").hide();
		$("#Leads_detailView_fieldLabel_cf_1068").closest("tr").hide();	
	}

	if($.trim($("#Leads_detailView_fieldValue_cf_1074 span").text())==""){
		$("#Leads_detailView_fieldLabel_cf_1074").closest("tr").hide();
		$("#Leads_detailView_fieldLabel_cf_1078").closest("tr").hide();
		$("#Leads_detailView_fieldLabel_cf_1082").closest("tr").hide();
		$("#Leads_detailView_fieldLabel_cf_1086").closest("tr").hide();	
	}

	if($.trim($("#Leads_detailView_fieldValue_cf_1090 span").text())==""){
		$("#Leads_detailView_fieldLabel_cf_1090").closest("tr").hide();
		$("#Leads_detailView_fieldLabel_cf_1094").closest("tr").hide();
		$("#Leads_detailView_fieldLabel_cf_1098").closest("tr").hide();
		$("#Leads_detailView_fieldLabel_cf_1102").closest("tr").hide();	
	}

	if($.trim($("#Leads_detailView_fieldValue_cf_1106 span").text())==""){
		$("#Leads_detailView_fieldLabel_cf_1106").closest("tr").hide();
		$("#Leads_detailView_fieldLabel_cf_1110").closest("tr").hide();
		$("#Leads_detailView_fieldLabel_cf_1114").closest("tr").hide();
		$("#Leads_detailView_fieldLabel_cf_1116").closest("tr").hide();	
	}

	if($.trim($("#Leads_detailView_fieldValue_cf_1120 span").text())==""){
		$("#Leads_detailView_fieldLabel_cf_1120").closest("tr").hide();
		$("#Leads_detailView_fieldLabel_cf_1126").closest("tr").hide();
		$("#Leads_detailView_fieldLabel_cf_1130").closest("tr").hide();
		$("#Leads_detailView_fieldLabel_cf_1134").closest("tr").hide();	
	}

	if($.trim($("#Leads_detailView_fieldValue_cf_1138 span").text())==""){
		$("#Leads_detailView_fieldLabel_cf_1138").closest("tr").hide();
		$("#Leads_detailView_fieldLabel_cf_1142").closest("tr").hide();
		$("#Leads_detailView_fieldLabel_cf_1146").closest("tr").hide();
		$("#Leads_detailView_fieldLabel_cf_1150").closest("tr").hide();	
	}

	if($.trim($("#Leads_detailView_fieldValue_cf_1152 span").text())==""){
		$("#Leads_detailView_fieldLabel_cf_1152").closest("tr").hide();
		$("#Leads_detailView_fieldLabel_cf_1158").closest("tr").hide();
		$("#Leads_detailView_fieldLabel_cf_1162").closest("tr").hide();
		$("#Leads_detailView_fieldLabel_cf_1166").closest("tr").hide();	
	}

	if($.trim($("#Leads_detailView_fieldValue_cf_1170 span").text())==""){
		$("#Leads_detailView_fieldLabel_cf_1170").closest("tr").hide();
		$("#Leads_detailView_fieldLabel_cf_1174").closest("tr").hide();
		$("#Leads_detailView_fieldLabel_cf_1178").closest("tr").hide();
		$("#Leads_detailView_fieldLabel_cf_1182").closest("tr").hide();	
	}
	/* For order online conditions */	
}

if($.trim($("#Leads_detailView_fieldValue_cf_1250 span >span").text())=="Contact"){	
	$(".block_Commercial").hide();
	$(".block_Order").hide();
	$(".block_Package").hide();	
	$(".block_Commercial").hide();
	$(".block_Provide").hide();
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
}


if($.trim($("#Leads_detailView_fieldValue_cf_1250 span >span").text())=="Quote"){
	$(".block_Commercial").hide();
	$(".block_Order").hide();
	$(".block_Package").hide();	
	$(".block_Commercial").hide();
	$(".block_Provide").hide();
	$(".Quotes").hide();
			
	$(".Payable").hide();
	$(".block_Other").hide();
	$(".block_Billing").hide();
	$(".block_LBL_CUSTOM_INFORMATION").hide();
	
	$("#Leads_detailView_fieldLabel_cf_864").hide();
	$("#Leads_detailView_fieldValue_cf_864").hide();
	
	$("#Leads_detailView_fieldLabel_cf_866").hide();
	$("#Leads_detailView_fieldValue_cf_866").hide();
}

if($.trim($("#Leads_detailView_fieldValue_cf_1250 span >span").text())=="Commercial Cargo"){	
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

if($.trim($("#Leads_detailView_fieldValue_cf_1250 span >span").text())=="Household Quote"){
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

//$(".editAction ").hide();
</script>

<script>
$('.editAction').attr('style','display:none !important');
</script>