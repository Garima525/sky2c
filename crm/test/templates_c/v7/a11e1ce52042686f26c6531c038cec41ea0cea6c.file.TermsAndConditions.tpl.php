<?php /* Smarty version Smarty-3.1.7, created on 2017-09-16 12:01:51
         compiled from "/home/skytwocc/public_html/crm/includes/runtime/../../layouts/v7/modules/Settings/Vtiger/TermsAndConditions.tpl" */ ?>
<?php /*%%SmartyHeaderCode:28907741359bd12af993c08-22770035%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a11e1ce52042686f26c6531c038cec41ea0cea6c' => 
    array (
      0 => '/home/skytwocc/public_html/crm/includes/runtime/../../layouts/v7/modules/Settings/Vtiger/TermsAndConditions.tpl',
      1 => 1496723290,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28907741359bd12af993c08-22770035',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'QUALIFIED_MODULE' => 0,
    'INVENTORY_MODULES' => 0,
    'MODULE_NAME' => 0,
    'CONDITION_TEXT' => 0,
    'MODULE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_59bd12af9dfcd',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59bd12af9dfcd')) {function content_59bd12af9dfcd($_smarty_tpl) {?>
<div class="editViewContainer" id="TermsAndConditionsContainer"><div class="col-sm-12 col-lg-12 col-md-12 form-horizontal"><div class="block"><div><h4><?php echo vtranslate('LBL_TERMS_AND_CONDITIONS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</h4></div><hr><div class="contents row form-group"><div class="col-lg-offset-1 col-lg-2 col-md-2 col-sm-2 control-label fieldLabel"><label><?php echo vtranslate('LBL_SELECT_MODULE','Vtiger');?>
</label></div><div class="fieldValue col-lg-4 col-md-4 col-sm-4 "><select class="select2-container select2 inputElement col-sm-6 selectModule"><?php  $_smarty_tpl->tpl_vars['MODULE_NAME'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['MODULE_NAME']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['INVENTORY_MODULES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['MODULE_NAME']->key => $_smarty_tpl->tpl_vars['MODULE_NAME']->value){
$_smarty_tpl->tpl_vars['MODULE_NAME']->_loop = true;
?><option value=<?php echo $_smarty_tpl->tpl_vars['MODULE_NAME']->value;?>
><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['MODULE_NAME']->value;?>
<?php $_tmp1=ob_get_clean();?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['MODULE_NAME']->value;?>
<?php $_tmp2=ob_get_clean();?><?php echo vtranslate($_tmp1,$_tmp2);?>
</option><?php } ?></select></div></div><br><div class="col-lg-offset-1 col-lg-11 col-md-11 col-sm-11"><textarea class=" TCContent form-control" rows="10" placeholder="<?php echo vtranslate('LBL_SPECIFY_TERMS_AND_CONDITIONS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
" style="width:100%;" ><?php echo $_smarty_tpl->tpl_vars['CONDITION_TEXT']->value;?>
</textarea></div><div class='clearfix'></div><br></div></div><br><div class='modal-overlay-footer clearfix '><div class="row clearfix"><div class='textAlignCenter col-lg-12 col-md-12 col-sm-12 '><button type='submit' class='btn btn-success saveButton saveTC hide' type="submit" ><?php echo vtranslate('LBL_SAVE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</button>&nbsp;&nbsp;</div></div></div></div>

<?php }} ?>