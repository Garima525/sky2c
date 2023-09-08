<?php /* Smarty version Smarty-3.1.7, created on 2017-09-16 06:35:47
         compiled from "/home/checkcrm/public_html/vtiger/includes/runtime/../../layouts/v7/modules/Users/UserEditViewPreProcess.tpl" */ ?>
<?php /*%%SmartyHeaderCode:195911052259bcc643d32079-41336150%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f637984060745a8369327056ebe6592a09f0abca' => 
    array (
      0 => '/home/checkcrm/public_html/vtiger/includes/runtime/../../layouts/v7/modules/Users/UserEditViewPreProcess.tpl',
      1 => 1496723290,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '195911052259bcc643d32079-41336150',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'QUALIFIED_MODULE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_59bcc643d5dcb',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59bcc643d5dcb')) {function content_59bcc643d5dcb($_smarty_tpl) {?>

<?php $_smarty_tpl->tpl_vars['QUALIFIED_MODULE'] = new Smarty_variable('Settings:User', null, 0);?><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("SettingsMenuStart.tpl",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<div class="bodyContents"><div class="mainContainer row-fluid"><?php }} ?>