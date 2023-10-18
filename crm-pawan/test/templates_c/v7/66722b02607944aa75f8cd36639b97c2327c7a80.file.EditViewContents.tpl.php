<?php /* Smarty version Smarty-3.1.7, created on 2023-03-28 04:32:02
         compiled from "/home/sky2co/public_html/crm-pawan/includes/runtime/../../layouts/v7/modules/Vtiger/partials/EditViewContents.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7979543035d00a1b79fd037-98126257%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '66722b02607944aa75f8cd36639b97c2327c7a80' => 
    array (
      0 => '/home/sky2co/public_html/crm-pawan/includes/runtime/../../layouts/v7/modules/Vtiger/partials/EditViewContents.tpl',
      1 => 1560332256,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7979543035d00a1b79fd037-98126257',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5d00a1b7b383c',
  'variables' => 
  array (
    'PICKIST_DEPENDENCY_DATASOURCE' => 0,
    'RECORD_STRUCTURE' => 0,
    'BLOCK_FIELDS' => 0,
    'BLOCK_LABEL' => 0,
    'MODULE' => 0,
    'FIELD_MODEL' => 0,
    'refrenceList' => 0,
    'COUNTER' => 0,
    'MODULE_NAME' => 0,
    'isReferenceField' => 0,
    'refrenceListCount' => 0,
    'DISPLAYID' => 0,
    'REFERENCED_MODULE_STRUCTURE' => 0,
    'value' => 0,
    'REFERENCED_MODULE_NAME' => 0,
    'TAXCLASS_DETAILS' => 0,
    'taxCount' => 0,
    'FILE_LOCATION_TYPE_FIELD' => 0,
    'fieldDataType' => 0,
    'CURRENT_USER_MODEL' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d00a1b7b383c')) {function content_5d00a1b7b383c($_smarty_tpl) {?>
<?php if (!empty($_smarty_tpl->tpl_vars['PICKIST_DEPENDENCY_DATASOURCE']->value)){?><input type="hidden" name="picklistDependency" value='<?php echo Vtiger_Util_Helper::toSafeHTML($_smarty_tpl->tpl_vars['PICKIST_DEPENDENCY_DATASOURCE']->value);?>
' /><?php }?><div name='editContent'><?php  $_smarty_tpl->tpl_vars['BLOCK_FIELDS'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['BLOCK_FIELDS']->_loop = false;
 $_smarty_tpl->tpl_vars['BLOCK_LABEL'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['RECORD_STRUCTURE']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['BLOCK_FIELDS']->key => $_smarty_tpl->tpl_vars['BLOCK_FIELDS']->value){
$_smarty_tpl->tpl_vars['BLOCK_FIELDS']->_loop = true;
 $_smarty_tpl->tpl_vars['BLOCK_LABEL']->value = $_smarty_tpl->tpl_vars['BLOCK_FIELDS']->key;
?><?php if (count($_smarty_tpl->tpl_vars['BLOCK_FIELDS']->value)>0){?><div class='fieldBlockContainer block_<?php echo $_smarty_tpl->tpl_vars['BLOCK_LABEL']->value;?>
'><h4 class='fieldBlockHeader'><?php echo vtranslate($_smarty_tpl->tpl_vars['BLOCK_LABEL']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>
</h4><hr><table class="table table-borderless"><tr><?php $_smarty_tpl->tpl_vars['COUNTER'] = new Smarty_variable(0, null, 0);?><?php  $_smarty_tpl->tpl_vars['FIELD_MODEL'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['FIELD_MODEL']->_loop = false;
 $_smarty_tpl->tpl_vars['FIELD_NAME'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['BLOCK_FIELDS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['FIELD_MODEL']->key => $_smarty_tpl->tpl_vars['FIELD_MODEL']->value){
$_smarty_tpl->tpl_vars['FIELD_MODEL']->_loop = true;
 $_smarty_tpl->tpl_vars['FIELD_NAME']->value = $_smarty_tpl->tpl_vars['FIELD_MODEL']->key;
?><?php $_smarty_tpl->tpl_vars["isReferenceField"] = new Smarty_variable($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getFieldDataType(), null, 0);?><?php $_smarty_tpl->tpl_vars["refrenceList"] = new Smarty_variable($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getReferenceList(), null, 0);?><?php $_smarty_tpl->tpl_vars["refrenceListCount"] = new Smarty_variable(count($_smarty_tpl->tpl_vars['refrenceList']->value), null, 0);?><?php if ($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->isEditable()==true){?><?php if ($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('uitype')=="19"){?><?php if ($_smarty_tpl->tpl_vars['COUNTER']->value=='1'){?><td></td><td></td></tr><tr><?php $_smarty_tpl->tpl_vars['COUNTER'] = new Smarty_variable(0, null, 0);?><?php }?><?php }?><?php if ($_smarty_tpl->tpl_vars['COUNTER']->value==2){?></tr><tr><?php $_smarty_tpl->tpl_vars['COUNTER'] = new Smarty_variable(1, null, 0);?><?php }else{ ?><?php $_smarty_tpl->tpl_vars['COUNTER'] = new Smarty_variable($_smarty_tpl->tpl_vars['COUNTER']->value+1, null, 0);?><?php }?><td class="fieldLabel alignMiddle" id="<?php echo $_smarty_tpl->tpl_vars['MODULE_NAME']->value;?>
_detailView_fieldLabel_<?php echo $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getName();?>
" <?php if ($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getName()=='description'||$_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('uitype')=='69'){?> style='width:8%'<?php }?>><?php if ($_smarty_tpl->tpl_vars['isReferenceField']->value=="reference"){?><?php if ($_smarty_tpl->tpl_vars['refrenceListCount']->value>1){?><?php $_smarty_tpl->tpl_vars["DISPLAYID"] = new Smarty_variable($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('fieldvalue'), null, 0);?><?php $_smarty_tpl->tpl_vars["REFERENCED_MODULE_STRUCTURE"] = new Smarty_variable($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getUITypeModel()->getReferenceModule($_smarty_tpl->tpl_vars['DISPLAYID']->value), null, 0);?><?php if (!empty($_smarty_tpl->tpl_vars['REFERENCED_MODULE_STRUCTURE']->value)){?><?php $_smarty_tpl->tpl_vars["REFERENCED_MODULE_NAME"] = new Smarty_variable($_smarty_tpl->tpl_vars['REFERENCED_MODULE_STRUCTURE']->value->get('name'), null, 0);?><?php }?><select style="width: 140px;" class="select2 referenceModulesList"><?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['index'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['refrenceList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['index']->value = $_smarty_tpl->tpl_vars['value']->key;
?><option value="<?php echo $_smarty_tpl->tpl_vars['value']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['value']->value==$_smarty_tpl->tpl_vars['REFERENCED_MODULE_NAME']->value){?> selected <?php }?>><?php echo vtranslate($_smarty_tpl->tpl_vars['value']->value,$_smarty_tpl->tpl_vars['value']->value);?>
</option><?php } ?></select><?php }else{ ?><?php echo vtranslate($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('label'),$_smarty_tpl->tpl_vars['MODULE']->value);?>
<?php }?><?php }elseif($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('uitype')=="83"){?><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getUITypeModel()->getTemplateName(),$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('COUNTER'=>$_smarty_tpl->tpl_vars['COUNTER']->value,'MODULE'=>$_smarty_tpl->tpl_vars['MODULE']->value), 0);?>
<?php if ($_smarty_tpl->tpl_vars['TAXCLASS_DETAILS']->value){?><?php $_smarty_tpl->tpl_vars['taxCount'] = new Smarty_variable(count($_smarty_tpl->tpl_vars['TAXCLASS_DETAILS']->value)%2, null, 0);?><?php if ($_smarty_tpl->tpl_vars['taxCount']->value==0){?><?php if ($_smarty_tpl->tpl_vars['COUNTER']->value==2){?><?php $_smarty_tpl->tpl_vars['COUNTER'] = new Smarty_variable(1, null, 0);?><?php }else{ ?><?php $_smarty_tpl->tpl_vars['COUNTER'] = new Smarty_variable(2, null, 0);?><?php }?><?php }?><?php }?><?php }else{ ?><?php if ($_smarty_tpl->tpl_vars['MODULE']->value=='Documents'&&$_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('label')=='File Name'){?><?php $_smarty_tpl->tpl_vars['FILE_LOCATION_TYPE_FIELD'] = new Smarty_variable($_smarty_tpl->tpl_vars['RECORD_STRUCTURE']->value['LBL_FILE_INFORMATION']['filelocationtype'], null, 0);?><?php if ($_smarty_tpl->tpl_vars['FILE_LOCATION_TYPE_FIELD']->value){?><?php if ($_smarty_tpl->tpl_vars['FILE_LOCATION_TYPE_FIELD']->value->get('fieldvalue')=='E'){?><?php echo vtranslate("LBL_FILE_URL",$_smarty_tpl->tpl_vars['MODULE']->value);?>
&nbsp;<span class="redColor">*</span><?php }else{ ?><?php echo vtranslate($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('label'),$_smarty_tpl->tpl_vars['MODULE']->value);?>
<?php }?><?php }else{ ?><?php echo vtranslate($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('label'),$_smarty_tpl->tpl_vars['MODULE']->value);?>
<?php }?><?php }else{ ?><?php echo vtranslate($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('label'),$_smarty_tpl->tpl_vars['MODULE']->value);?>
<?php }?><?php }?>&nbsp;<?php if ($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->isMandatory()==true){?> <span class="redColor">*</span> <?php }?></td><?php if ($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('uitype')!='83'){?><td class="fieldValue" <?php if ($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getFieldDataType()=='boolean'){?> style="width:25%" <?php }?> <?php if ($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('uitype')=='19'){?> colspan="3" <?php $_smarty_tpl->tpl_vars['COUNTER'] = new Smarty_variable($_smarty_tpl->tpl_vars['COUNTER']->value+1, null, 0);?> <?php }?> id="<?php echo $_smarty_tpl->tpl_vars['MODULE_NAME']->value;?>
_detailView_fieldValue_<?php echo $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getName();?>
" <?php if ($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('uitype')=='19'||$_smarty_tpl->tpl_vars['fieldDataType']->value=='reminder'||$_smarty_tpl->tpl_vars['fieldDataType']->value=='recurrence'){?> colspan="3" <?php $_smarty_tpl->tpl_vars['COUNTER'] = new Smarty_variable($_smarty_tpl->tpl_vars['COUNTER']->value+1, null, 0);?> <?php }?>><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getUITypeModel()->getTemplateName(),$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</td><?php }?><?php }?><?php } ?><?php if ((1 & $_smarty_tpl->tpl_vars['COUNTER']->value)){?><td></td><td></td><?php }?></tr></table></div><?php }?><?php } ?></div>
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

<?php if ($_smarty_tpl->tpl_vars['CURRENT_USER_MODEL']->value->get('id')!='10'){?>
<script>
var assigned_user_id = $('select[name="assigned_user_id"] option:selected').val();
if(assigned_user_id!=1){
	$("#s2id_autogen7").hide();
	var assigns = $('select[name="assigned_user_id"] option:selected').text();	
	$("#Leads_detailView_fieldValue_assigned_user_id").html(assigns);	
}
</script>
<?php }?><?php }} ?>