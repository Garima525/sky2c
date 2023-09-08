<?php /* Smarty version Smarty-3.1.7, created on 2017-09-16 12:19:57
         compiled from "/home/skytwocc/public_html/crm/includes/runtime/../../layouts/v7/modules/Settings/SMSNotifier/ProviderEditFields.tpl" */ ?>
<?php /*%%SmartyHeaderCode:38589427859bd16ed5f7002-21639958%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1cbcc038d2deb502c70f099db2a7ad64c509117c' => 
    array (
      0 => '/home/skytwocc/public_html/crm/includes/runtime/../../layouts/v7/modules/Settings/SMSNotifier/ProviderEditFields.tpl',
      1 => 1505540580,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '38589427859bd16ed5f7002-21639958',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'QUALIFIED_MODULE_NAME' => 0,
    'RECORD_MODEL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_59bd16ed62f00',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59bd16ed62f00')) {function content_59bd16ed62f00($_smarty_tpl) {?>

<div class="col-lg-12"><div class="form-group"><div class = "col-lg-4"><label for="username"><?php echo vtranslate('username',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE_NAME']->value);?>
</label></div><div class = "col-lg-6"><input type="text" class="form-control" name="username" data-rule-required="true" id="username" value="<?php echo $_smarty_tpl->tpl_vars['RECORD_MODEL']->value->get('username');?>
" /></div></div></div><div class="col-lg-12"><div class="form-group"><div class = "col-lg-4"><label for="password"><?php echo vtranslate('password',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE_NAME']->value);?>
</label></div><div class = "col-lg-6"><input type="password" class = "form-control" data-rule-required="true" name="password" id ="password" value="<?php echo $_smarty_tpl->tpl_vars['RECORD_MODEL']->value->get('password');?>
" /></div></div></div><br><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path('BaseProviderEditFields.tpl',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE_NAME']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('RECORD_MODEL'=>$_smarty_tpl->tpl_vars['RECORD_MODEL']->value), 0);?>
<?php }} ?>