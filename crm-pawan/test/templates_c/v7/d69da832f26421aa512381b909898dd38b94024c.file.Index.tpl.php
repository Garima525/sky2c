<?php /* Smarty version Smarty-3.1.7, created on 2019-07-10 22:44:52
         compiled from "/home/sky2co/public_html/crm-pawan/includes/runtime/../../layouts/v7/modules/Settings/LayoutEditor/Index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11782899255d266a642bfae7-17419867%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd69da832f26421aa512381b909898dd38b94024c' => 
    array (
      0 => '/home/sky2co/public_html/crm-pawan/includes/runtime/../../layouts/v7/modules/Settings/LayoutEditor/Index.tpl',
      1 => 1560287220,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11782899255d266a642bfae7-17419867',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SELECTED_MODULE_NAME' => 0,
    'QUALIFIED_MODULE' => 0,
    'SUPPORTED_MODULES' => 0,
    'MODULE_NAME' => 0,
    'FIELDS_INFO' => 0,
    'NEW_FIELDS_INFO' => 0,
    'REQUEST_INSTANCE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5d266a646a9d6',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d266a646a9d6')) {function content_5d266a646a9d6($_smarty_tpl) {?>


<div class="container-fluid" id="layoutEditorContainer"><input id="selectedModuleName" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['SELECTED_MODULE_NAME']->value;?>
" /><input type="hidden" id="selectedModuleLabel" value="<?php echo vtranslate($_smarty_tpl->tpl_vars['SELECTED_MODULE_NAME']->value,$_smarty_tpl->tpl_vars['SELECTED_MODULE_NAME']->value);?>
" /><div class="widget_header row"><label class="col-sm-2 textAlignCenter" style="padding-top: 8px;"><?php echo vtranslate('SELECT_MODULE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</label><div class="col-sm-6"><select class="select2 col-sm-6" name="layoutEditorModules"><option value=''><?php echo vtranslate('LBL_SELECT_OPTION',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</option><?php  $_smarty_tpl->tpl_vars['MODULE_NAME'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['MODULE_NAME']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['SUPPORTED_MODULES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['MODULE_NAME']->key => $_smarty_tpl->tpl_vars['MODULE_NAME']->value){
$_smarty_tpl->tpl_vars['MODULE_NAME']->_loop = true;
?><option value="<?php echo $_smarty_tpl->tpl_vars['MODULE_NAME']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['MODULE_NAME']->value==$_smarty_tpl->tpl_vars['SELECTED_MODULE_NAME']->value){?> selected <?php }?>><?php if ($_smarty_tpl->tpl_vars['MODULE_NAME']->value=='Calendar'){?><?php echo vtranslate($_smarty_tpl->tpl_vars['MODULE_NAME']->value,$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
<?php }else{ ?><?php echo vtranslate($_smarty_tpl->tpl_vars['MODULE_NAME']->value,$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
<?php }?></option><?php } ?></select></div></div><br><br><?php if ($_smarty_tpl->tpl_vars['SELECTED_MODULE_NAME']->value){?><div class="contents tabbable"><ul class="nav nav-tabs layoutTabs massEditTabs"><li class="active detailviewTab"><a data-toggle="tab" href="#detailViewLayout"><strong><?php echo vtranslate('LBL_DETAILVIEW_LAYOUT',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></a></li><li class="relatedListTab"><a data-toggle="tab" href="#relatedTabOrder"><strong><?php echo vtranslate('LBL_RELATION_SHIPS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></a></li></ul><div class="tab-content layoutContent themeTableColor overflowVisible"><div class="tab-pane active" id="detailViewLayout"><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('FieldsList.tpl',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</div><div class="tab-pane" id="relatedTabOrder"></div></div></div><?php }?></div><?php if ($_smarty_tpl->tpl_vars['FIELDS_INFO']->value!='[]'){?><script type="text/javascript">var uimeta = (function () {var fieldInfo = <?php echo $_smarty_tpl->tpl_vars['FIELDS_INFO']->value;?>
;var newFieldInfo = <?php echo $_smarty_tpl->tpl_vars['NEW_FIELDS_INFO']->value;?>
;return {field: {get: function (name, property) {if (name && property === undefined) {return fieldInfo[name];}if (name && property) {return fieldInfo[name][property]}},isMandatory: function (name) {if (fieldInfo[name]) {return fieldInfo[name].mandatory;}return false;},getType: function (name) {if (fieldInfo[name]) {return fieldInfo[name].type}return false;},getNewFieldInfo: function () {if (newFieldInfo['newfieldinfo']) {return newFieldInfo['newfieldinfo']}return false;}}};})();</script><?php }?><?php if (!$_smarty_tpl->tpl_vars['REQUEST_INSTANCE']->value->isAjax()){?><script type="text/javascript">
				jQuery(document).ready(function () {
					var instance = new Settings_LayoutEditor_Js();
					instance.registerEvents();
				});
			</script><?php }?><?php }} ?>