<?php /* Smarty version Smarty-3.1.7, created on 2018-01-10 04:30:11
         compiled from "/home/skytwocc/public_html/crm-pawan/includes/runtime/../../layouts/v7/modules/Calendar/EditActivityType.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2993884215a5596d3207048-26504711%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0e0a6b2937980c7ad5d5e02eb7233388b84c5d4b' => 
    array (
      0 => '/home/skytwocc/public_html/crm-pawan/includes/runtime/../../layouts/v7/modules/Calendar/EditActivityType.tpl',
      1 => 1496723290,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2993884215a5596d3207048-26504711',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE' => 0,
    'HEADER_TITLE' => 0,
    'EDITVIEWS' => 0,
    'MODULE_NAME' => 0,
    'VIEWCONDITIONS' => 0,
    'CONDITION' => 0,
    'CONDITION_NAME' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5a5596d32e7f8',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a5596d32e7f8')) {function content_5a5596d32e7f8($_smarty_tpl) {?>

<div class="modal-dialog modelContainer"><?php ob_start();?><?php echo vtranslate('LBL_EDITING_CALENDAR_VIEW',$_smarty_tpl->tpl_vars['MODULE']->value);?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['HEADER_TITLE'] = new Smarty_variable($_tmp1, null, 0);?><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("ModalHeader.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('TITLE'=>$_smarty_tpl->tpl_vars['HEADER_TITLE']->value), 0);?>
<div class="modal-body"><form class="form-horizontal"><input type="hidden" class="selectedType" value="" /><input type="hidden" class="selectedColor" value="" /><input type="hidden" class="editorMode" value="edit" /><input type=hidden name="moduleDateFields" data-value='<?php echo json_encode($_smarty_tpl->tpl_vars['EDITVIEWS']->value,@JSON_HEX_APOS);?>
' /><div class="form-group"><label class="control-label fieldLabel col-sm-4"><?php echo vtranslate('LBL_SELECT_MODULE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label><div class="controls fieldValue col-sm-6"><select id="editModulesList" class="select2" name="modulesList" style="min-width: 250px;"><?php  $_smarty_tpl->tpl_vars['DATE_FIELDS_LIST'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['DATE_FIELDS_LIST']->_loop = false;
 $_smarty_tpl->tpl_vars['MODULE_NAME'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['EDITVIEWS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['DATE_FIELDS_LIST']->key => $_smarty_tpl->tpl_vars['DATE_FIELDS_LIST']->value){
$_smarty_tpl->tpl_vars['DATE_FIELDS_LIST']->_loop = true;
 $_smarty_tpl->tpl_vars['MODULE_NAME']->value = $_smarty_tpl->tpl_vars['DATE_FIELDS_LIST']->key;
?><option value="<?php echo $_smarty_tpl->tpl_vars['MODULE_NAME']->value;?>
" data-viewmodule="<?php echo $_smarty_tpl->tpl_vars['MODULE_NAME']->value;?>
"><?php echo vtranslate($_smarty_tpl->tpl_vars['MODULE_NAME']->value,$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</option><?php } ?></select></div></div><div class="form-group"><label class="control-label fieldLabel col-sm-4"><?php echo vtranslate('LBL_SELECT_FIELD',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label><div class="controls fieldValue col-sm-6"><select id="editFieldsList" class="select2" name="fieldsList" style="min-width: 250px;"><option value=" "><?php echo vtranslate('LBL_NONE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option></select></div></div><div id="js-eventtype-condition" class="form-group hide"><label class="control-label fieldLabel col-sm-4"><?php echo vtranslate('LBL_SELECT_EVENT_TYPE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label><div class="controls fieldValue col-sm-6"><select id="calendarviewconditions" class="select2" name="conditions" style="min-width: 250px;"><option value=""><?php echo vtranslate('LBL_ALL',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</option><?php  $_smarty_tpl->tpl_vars['CONDITION'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['CONDITION']->_loop = false;
 $_smarty_tpl->tpl_vars['CONDITION_NAME'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['VIEWCONDITIONS']->value['Events']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['CONDITION']->key => $_smarty_tpl->tpl_vars['CONDITION']->value){
$_smarty_tpl->tpl_vars['CONDITION']->_loop = true;
 $_smarty_tpl->tpl_vars['CONDITION_NAME']->value = $_smarty_tpl->tpl_vars['CONDITION']->key;
?><option value='<?php if ($_smarty_tpl->tpl_vars['CONDITION']->value!=''){?><?php echo Zend_Json::encode($_smarty_tpl->tpl_vars['CONDITION']->value);?>
<?php }?>'><?php echo $_smarty_tpl->tpl_vars['CONDITION_NAME']->value;?>
</option><?php } ?></select></div></div><div class="form-group"><label class="control-label fieldLabel col-sm-4"><?php echo vtranslate('LBL_SELECT_CALENDAR_COLOR',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label><div class="controls fieldValue col-sm-8"><p class="calendarColorPicker"></p></div></div></form></div><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("ModalFooter.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</div><?php }} ?>