<?php /* Smarty version Smarty-3.1.7, created on 2018-01-09 17:45:49
         compiled from "/home/skytwocc/public_html/crm-pawan/includes/runtime/../../layouts/v7/modules/Settings/Roles/Index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1582683375a54ffcd89b318-02630943%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b2c71170e0fe2f76a78d03252d2b01bb7b5246d5' => 
    array (
      0 => '/home/skytwocc/public_html/crm-pawan/includes/runtime/../../layouts/v7/modules/Settings/Roles/Index.tpl',
      1 => 1496723290,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1582683375a54ffcd89b318-02630943',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ROOT_ROLE' => 0,
    'QUALIFIED_MODULE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5a54ffcd9202f',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a54ffcd9202f')) {function content_5a54ffcd9202f($_smarty_tpl) {?>


<div class="listViewPageDiv " id="listViewContent"><div class="col-sm-12 col-xs-12 "><br><div class="clearfix treeView"><ul><li data-role="<?php echo $_smarty_tpl->tpl_vars['ROOT_ROLE']->value->getParentRoleString();?>
" data-roleid="<?php echo $_smarty_tpl->tpl_vars['ROOT_ROLE']->value->getId();?>
"><div class="toolbar-handle"><a href="javascript:;" class="btn app-MARKETING droppable"><?php echo $_smarty_tpl->tpl_vars['ROOT_ROLE']->value->getName();?>
</a><div class="toolbar" title="<?php echo vtranslate('LBL_ADD_RECORD',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
">&nbsp;<a href="<?php echo $_smarty_tpl->tpl_vars['ROOT_ROLE']->value->getCreateChildUrl();?>
" data-url="<?php echo $_smarty_tpl->tpl_vars['ROOT_ROLE']->value->getCreateChildUrl();?>
" data-action="modal"><span class="icon-plus-sign"></span></a></div></div><?php $_smarty_tpl->tpl_vars["ROLE"] = new Smarty_variable($_smarty_tpl->tpl_vars['ROOT_ROLE']->value, null, 0);?><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("RoleTree.tpl","Settings:Roles"), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</li></ul></div></div></div><?php }} ?>