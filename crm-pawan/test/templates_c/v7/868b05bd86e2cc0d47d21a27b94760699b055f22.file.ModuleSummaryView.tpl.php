<?php /* Smarty version Smarty-3.1.7, created on 2020-03-27 20:14:17
         compiled from "/home/sky2co/public_html/crm-pawan/includes/runtime/../../layouts/v7/modules/Quotes/ModuleSummaryView.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15618539495e7e5e993ec171-12661115%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '868b05bd86e2cc0d47d21a27b94760699b055f22' => 
    array (
      0 => '/home/sky2co/public_html/crm-pawan/includes/runtime/../../layouts/v7/modules/Quotes/ModuleSummaryView.tpl',
      1 => 1560286030,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15618539495e7e5e993ec171-12661115',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE_NAME' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5e7e5e993f3cd',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5e7e5e993f3cd')) {function content_5e7e5e993f3cd($_smarty_tpl) {?>
<div class="recordDetails"><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('SummaryViewContents.tpl',$_smarty_tpl->tpl_vars['MODULE_NAME']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</div><?php }} ?>