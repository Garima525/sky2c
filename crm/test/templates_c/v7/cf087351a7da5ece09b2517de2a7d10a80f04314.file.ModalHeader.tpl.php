<?php /* Smarty version Smarty-3.1.7, created on 2017-09-16 05:52:45
         compiled from "/home/checkcrm/public_html/vtiger/includes/runtime/../../layouts/v7/modules/Vtiger/ModalHeader.tpl" */ ?>
<?php /*%%SmartyHeaderCode:54713089459bcbc2dba38a9-50244217%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cf087351a7da5ece09b2517de2a7d10a80f04314' => 
    array (
      0 => '/home/checkcrm/public_html/vtiger/includes/runtime/../../layouts/v7/modules/Vtiger/ModalHeader.tpl',
      1 => 1496723290,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '54713089459bcbc2dba38a9-50244217',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'TITLE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_59bcbc2dba651',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59bcbc2dba651')) {function content_59bcbc2dba651($_smarty_tpl) {?>
<div class="modal-header"><div class="clearfix"><div class="pull-right " ><button type="button" class="close" aria-label="Close" data-dismiss="modal"><span aria-hidden="true" class='fa fa-close'></span></button></div><h4 class="pull-left"><?php echo $_smarty_tpl->tpl_vars['TITLE']->value;?>
</h4></div></div>    <?php }} ?>