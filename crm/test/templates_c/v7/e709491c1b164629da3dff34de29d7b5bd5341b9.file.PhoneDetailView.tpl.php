<?php /* Smarty version Smarty-3.1.7, created on 2017-09-16 11:56:54
         compiled from "/home/skytwocc/public_html/crm/includes/runtime/../../layouts/v7/modules/Vtiger/uitypes/PhoneDetailView.tpl" */ ?>
<?php /*%%SmartyHeaderCode:26415117659bd11861abfa6-31973421%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e709491c1b164629da3dff34de29d7b5bd5341b9' => 
    array (
      0 => '/home/skytwocc/public_html/crm/includes/runtime/../../layouts/v7/modules/Vtiger/uitypes/PhoneDetailView.tpl',
      1 => 1496723290,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26415117659bd11861abfa6-31973421',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'FIELD_MODEL' => 0,
    'RECORD' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_59bd11861b9ee',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59bd11861b9ee')) {function content_59bd11861b9ee($_smarty_tpl) {?>

<?php $_smarty_tpl->tpl_vars['FIELD_VALUE'] = new Smarty_variable($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('fieldvalue'), null, 0);?>
<?php echo $_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getDisplayValue($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->get('fieldvalue'),$_smarty_tpl->tpl_vars['RECORD']->value->getId(),$_smarty_tpl->tpl_vars['RECORD']->value);?>

<?php }} ?>