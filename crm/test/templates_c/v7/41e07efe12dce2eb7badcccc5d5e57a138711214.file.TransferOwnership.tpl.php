<?php /* Smarty version Smarty-3.1.7, created on 2017-09-16 06:39:27
         compiled from "/home/checkcrm/public_html/vtiger/includes/runtime/../../layouts/v7/modules/Users/TransferOwnership.tpl" */ ?>
<?php /*%%SmartyHeaderCode:134717851559bcc71f82c372-86020758%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '41e07efe12dce2eb7badcccc5d5e57a138711214' => 
    array (
      0 => '/home/checkcrm/public_html/vtiger/includes/runtime/../../layouts/v7/modules/Users/TransferOwnership.tpl',
      1 => 1496723290,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '134717851559bcc71f82c372-86020758',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE' => 0,
    'HEADER_TITLE' => 0,
    'USERS_MODEL' => 0,
    'USER_ID' => 0,
    'USER_MODEL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_59bcc71f8605e',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59bcc71f8605e')) {function content_59bcc71f8605e($_smarty_tpl) {?>



<div class="modal-dialog modelContainer"'><?php ob_start();?><?php echo vtranslate('LBL_TRANSFER_OWNERSHIP',$_smarty_tpl->tpl_vars['MODULE']->value);?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['HEADER_TITLE'] = new Smarty_variable($_tmp1, null, 0);?><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("ModalHeader.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('TITLE'=>$_smarty_tpl->tpl_vars['HEADER_TITLE']->value), 0);?>
<div class="modal-content"><form class="form-horizontal" id="transferOwner" method="post"><input type="hidden" name="module" value="<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
"><input type="hidden" name="action" value="SaveAjax"><input type="hidden" name="mode" value="transferOwner"><div name='massEditContent'><div class="modal-body"><div class="form-group"><label class="control-label fieldLabel col-sm-5"><?php echo vtranslate('LBL_TRANSFER_OWNERSHIP_TO_USER',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</label><div class="controls fieldValue col-xs-6"><select class="select2" name="record"><?php  $_smarty_tpl->tpl_vars['USER_MODEL'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['USER_MODEL']->_loop = false;
 $_smarty_tpl->tpl_vars['USER_ID'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['USERS_MODEL']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['USER_MODEL']->key => $_smarty_tpl->tpl_vars['USER_MODEL']->value){
$_smarty_tpl->tpl_vars['USER_MODEL']->_loop = true;
 $_smarty_tpl->tpl_vars['USER_ID']->value = $_smarty_tpl->tpl_vars['USER_MODEL']->key;
?><option value="<?php echo $_smarty_tpl->tpl_vars['USER_ID']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['USER_MODEL']->value->getDisplayName();?>
</option><?php } ?></select></div></div></div></div><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('ModalFooter.tpl',$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</form></div></div>

<?php }} ?>