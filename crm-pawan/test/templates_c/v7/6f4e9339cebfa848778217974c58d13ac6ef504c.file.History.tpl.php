<?php /* Smarty version Smarty-3.1.7, created on 2019-06-21 16:24:52
         compiled from "/home/sky2co/public_html/crm-pawan/includes/runtime/../../layouts/v7/modules/Vtiger/History.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3773868095d0d04d40d4216-65882771%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6f4e9339cebfa848778217974c58d13ac6ef504c' => 
    array (
      0 => '/home/sky2co/public_html/crm-pawan/includes/runtime/../../layouts/v7/modules/Vtiger/History.tpl',
      1 => 1560286053,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3773868095d0d04d40d4216-65882771',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE_NAME' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5d0d04d4443ac',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d0d04d4443ac')) {function content_5d0d04d4443ac($_smarty_tpl) {?>
<div class="HistoryContainer"><div class="historyButtons btn-group" role="group" aria-label="..."><button type="button" class="btn btn-default" onclick='Vtiger_Detail_Js.showUpdates(this);'><?php echo vtranslate("LBL_UPDATES",$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</button></div><div class='data-body'></div></div><?php }} ?>