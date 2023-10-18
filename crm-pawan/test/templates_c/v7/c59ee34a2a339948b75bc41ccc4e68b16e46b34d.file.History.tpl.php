<?php /* Smarty version Smarty-3.1.7, created on 2018-01-11 01:17:58
         compiled from "/home/skytwocc/public_html/crm-pawan/includes/runtime/../../layouts/v7/modules/Vtiger/History.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19413352745a56bb46cee9a0-33727412%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c59ee34a2a339948b75bc41ccc4e68b16e46b34d' => 
    array (
      0 => '/home/skytwocc/public_html/crm-pawan/includes/runtime/../../layouts/v7/modules/Vtiger/History.tpl',
      1 => 1496723290,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19413352745a56bb46cee9a0-33727412',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE_NAME' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5a56bb46d93bf',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a56bb46d93bf')) {function content_5a56bb46d93bf($_smarty_tpl) {?>
<div class="HistoryContainer"><div class="historyButtons btn-group" role="group" aria-label="..."><button type="button" class="btn btn-default" onclick='Vtiger_Detail_Js.showUpdates(this);'><?php echo vtranslate("LBL_UPDATES",$_smarty_tpl->tpl_vars['MODULE_NAME']->value);?>
</button></div><div class='data-body'></div></div><?php }} ?>