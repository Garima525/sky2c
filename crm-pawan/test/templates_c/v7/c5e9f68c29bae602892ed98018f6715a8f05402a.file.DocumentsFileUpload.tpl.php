<?php /* Smarty version Smarty-3.1.7, created on 2018-01-18 19:56:21
         compiled from "/home/skytwocc/public_html/crm-pawan/includes/runtime/../../layouts/v7/modules/Vtiger/uitypes/DocumentsFileUpload.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21376680245a60fbe5883657-70892100%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c5e9f68c29bae602892ed98018f6715a8f05402a' => 
    array (
      0 => '/home/skytwocc/public_html/crm-pawan/includes/runtime/../../layouts/v7/modules/Vtiger/uitypes/DocumentsFileUpload.tpl',
      1 => 1496723290,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21376680245a60fbe5883657-70892100',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'FIELD_MODEL' => 0,
    'RECORD_STRUCTURE' => 0,
    'FILE_LOCATION_TYPE_FIELD' => 0,
    'DOCUMENTS_MODULE_MODEL' => 0,
    'IS_EXTERNAL_LOCATION_TYPE' => 0,
    'FIELD_VALUE' => 0,
    'SPECIAL_VALIDATOR' => 0,
    'FIELD_INFO' => 0,
    'MODULE' => 0,
    'IS_INTERNAL_LOCATION_TYPE' => 0,
    'MAX_UPLOAD_LIMIT_BYTES' => 0,
    'MAX_UPLOAD_LIMIT_MB' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5a60fbe593ed6',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a60fbe593ed6')) {function content_5a60fbe593ed6($_smarty_tpl) {?>
<?php $_smarty_tpl->tpl_vars["FIELD_INFO"] = new Smarty_variable($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getFieldInfo(), null, 0);?><?php $_smarty_tpl->tpl_vars['FILE_LOCATION_TYPE_FIELD'] = new Smarty_variable($_smarty_tpl->tpl_vars['RECORD_STRUCTURE']->value['LBL_FILE_INFORMATION']['filelocationtype'], null, 0);?><?php if ($_smarty_tpl->tpl_vars['FILE_LOCATION_TYPE_FIELD']->value==null){?><?php $_smarty_tpl->tpl_vars['DOCUMENTS_MODULE_MODEL'] = new Smarty_variable(Vtiger_Module_Model::getInstance('Documents'), null, 0);?><?php $_smarty_tpl->tpl_vars['FILE_LOCATION_TYPE_FIELD'] = new Smarty_variable($_smarty_tpl->tpl_vars['DOCUMENTS_MODULE_MODEL']->value->getField('filelocationtype'), null, 0);?><?php }?><?php $_smarty_tpl->tpl_vars['IS_INTERNAL_LOCATION_TYPE'] = new Smarty_variable($_smarty_tpl->tpl_vars['FILE_LOCATION_TYPE_FIELD']->value->get('fieldvalue')!='E', null, 0);?><?php $_smarty_tpl->tpl_vars['IS_EXTERNAL_LOCATION_TYPE'] = new Smarty_variable($_smarty_tpl->tpl_vars['FILE_LOCATION_TYPE_FIELD']->value->get('fieldvalue')=='E', null, 0);?><?php $_smarty_tpl->tpl_vars['FIELD_VALUE'] = new Smarty_variable($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('fieldvalue'), null, 0);?><?php $_smarty_tpl->tpl_vars["SPECIAL_VALIDATOR"] = new Smarty_variable($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getValidator(), null, 0);?><div class="fileUploadContainer"><?php if ($_smarty_tpl->tpl_vars['IS_EXTERNAL_LOCATION_TYPE']->value){?><input type="text" class="inputElement <?php if ($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->isNameField()){?>nameField<?php }?>" name="<?php echo $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getFieldName();?>
"value="<?php if ($_smarty_tpl->tpl_vars['IS_EXTERNAL_LOCATION_TYPE']->value){?><?php echo $_smarty_tpl->tpl_vars['FIELD_VALUE']->value;?>
<?php }?>" <?php if (!empty($_smarty_tpl->tpl_vars['SPECIAL_VALIDATOR']->value)){?> data-validator='<?php echo Zend_Json::encode($_smarty_tpl->tpl_vars['SPECIAL_VALIDATOR']->value);?>
' <?php }?><?php if ($_smarty_tpl->tpl_vars['FIELD_INFO']->value["mandatory"]==true){?> data-rule-required="true" <?php }?><?php if (count($_smarty_tpl->tpl_vars['FIELD_INFO']->value['validator'])){?>data-specific-rules='<?php echo ZEND_JSON::encode($_smarty_tpl->tpl_vars['FIELD_INFO']->value["validator"]);?>
'<?php }?>/><?php }else{ ?><div class="fileUploadBtn btn btn-primary"><span><i class="fa fa-laptop"></i> <?php echo vtranslate('LBL_UPLOAD',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</span><input type="file" class="inputElement <?php if ($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->isNameField()){?>nameField<?php }?>" name="<?php echo $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getFieldName();?>
"value="<?php if ($_smarty_tpl->tpl_vars['IS_INTERNAL_LOCATION_TYPE']->value){?> <?php echo $_smarty_tpl->tpl_vars['FIELD_VALUE']->value;?>
 <?php }?>" <?php if (!empty($_smarty_tpl->tpl_vars['SPECIAL_VALIDATOR']->value)){?>data-validator='<?php echo Zend_Json::encode($_smarty_tpl->tpl_vars['SPECIAL_VALIDATOR']->value);?>
'<?php }?> <?php if ($_smarty_tpl->tpl_vars['IS_INTERNAL_LOCATION_TYPE']->value&&!empty($_smarty_tpl->tpl_vars['FIELD_VALUE']->value)){?> style="width:86px;" <?php }?><?php if ($_smarty_tpl->tpl_vars['FIELD_INFO']->value["mandatory"]==true){?> data-rule-required="true" <?php }?><?php if (count($_smarty_tpl->tpl_vars['FIELD_INFO']->value['validator'])){?>data-specific-rules='<?php echo ZEND_JSON::encode($_smarty_tpl->tpl_vars['FIELD_INFO']->value["validator"]);?>
'<?php }?>/></div><?php }?><div class="uploadedFileDetails <?php if ($_smarty_tpl->tpl_vars['IS_EXTERNAL_LOCATION_TYPE']->value){?>hide<?php }?>"><div class="uploadedFileSize"></div><div class="uploadedFileName"><?php if ($_smarty_tpl->tpl_vars['IS_INTERNAL_LOCATION_TYPE']->value&&!empty($_smarty_tpl->tpl_vars['FIELD_VALUE']->value)){?>[<?php echo $_smarty_tpl->tpl_vars['FIELD_VALUE']->value;?>
]<?php }?></div><div class="uploadFileSizeLimit redColor"><?php echo vtranslate('LBL_MAX_UPLOAD_SIZE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
&nbsp;<span class="maxUploadSize" data-value="<?php echo $_smarty_tpl->tpl_vars['MAX_UPLOAD_LIMIT_BYTES']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['MAX_UPLOAD_LIMIT_MB']->value;?>
<?php echo vtranslate('MB',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</span></div></div></div><?php }} ?>