<?php /* Smarty version Smarty-3.1.7, created on 2017-09-16 12:16:50
         compiled from "/home/skytwocc/public_html/crm/includes/runtime/../../layouts/v7/modules/Portal/ModuleHeader.tpl" */ ?>
<?php /*%%SmartyHeaderCode:68962732959bd1632714b93-43552804%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3c964be40f2a96afbc4f4812581d5146fed58040' => 
    array (
      0 => '/home/skytwocc/public_html/crm/includes/runtime/../../layouts/v7/modules/Portal/ModuleHeader.tpl',
      1 => 1496723290,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '68962732959bd1632714b93-43552804',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE' => 0,
    'MODULE_MODEL' => 0,
    'DEFAULT_FILTER_ID' => 0,
    'CVURL' => 0,
    'DEFAULT_FILTER_URL' => 0,
    'VIEW' => 0,
    'VIEWID' => 0,
    'CUSTOM_VIEWS' => 0,
    'FILTER_TYPES' => 0,
    'FILTERS' => 0,
    'CVNAME' => 0,
    'MODULE_BASIC_ACTIONS' => 0,
    'FIELDS_INFO' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_59bd163276985',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59bd163276985')) {function content_59bd163276985($_smarty_tpl) {?>

<div class="col-sm-12 col-xs-12 module-action-bar clearfix coloredBorderTop"><div class="module-action-content clearfix"><div class="col-lg-7 col-md-7 module-breadcrumb"><span><?php $_smarty_tpl->tpl_vars['MODULE_MODEL'] = new Smarty_variable(Vtiger_Module_Model::getInstance($_smarty_tpl->tpl_vars['MODULE']->value), null, 0);?><?php $_smarty_tpl->tpl_vars['DEFAULT_FILTER_ID'] = new Smarty_variable($_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getDefaultCustomFilter(), null, 0);?><?php if ($_smarty_tpl->tpl_vars['DEFAULT_FILTER_ID']->value){?><?php $_smarty_tpl->tpl_vars['CVURL'] = new Smarty_variable(("&viewname=").($_smarty_tpl->tpl_vars['DEFAULT_FILTER_ID']->value), null, 0);?><?php $_smarty_tpl->tpl_vars['DEFAULT_FILTER_URL'] = new Smarty_variable(($_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getListViewUrl()).($_smarty_tpl->tpl_vars['CVURL']->value), null, 0);?><?php }else{ ?><?php $_smarty_tpl->tpl_vars['DEFAULT_FILTER_URL'] = new Smarty_variable($_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getListViewUrlWithAllFilter(), null, 0);?><?php }?><a title="<?php echo vtranslate($_smarty_tpl->tpl_vars['MODULE']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>
" href='<?php echo $_smarty_tpl->tpl_vars['DEFAULT_FILTER_URL']->value;?>
'><h4 class="module-title pull-left text-uppercase"> <?php echo vtranslate($_smarty_tpl->tpl_vars['MODULE']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>
 </h4></a></span><span><p class="current-filter-name pull-left">&nbsp;&nbsp;<span class="fa fa-angle-right" aria-hidden="true"></span> <?php echo $_smarty_tpl->tpl_vars['VIEW']->value;?>
 </p></span><?php if ($_smarty_tpl->tpl_vars['VIEWID']->value){?><?php  $_smarty_tpl->tpl_vars['FILTER_TYPES'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['FILTER_TYPES']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['CUSTOM_VIEWS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['FILTER_TYPES']->key => $_smarty_tpl->tpl_vars['FILTER_TYPES']->value){
$_smarty_tpl->tpl_vars['FILTER_TYPES']->_loop = true;
?><?php  $_smarty_tpl->tpl_vars['FILTERS'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['FILTERS']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['FILTER_TYPES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['FILTERS']->key => $_smarty_tpl->tpl_vars['FILTERS']->value){
$_smarty_tpl->tpl_vars['FILTERS']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['FILTERS']->value->get('cvid')==$_smarty_tpl->tpl_vars['VIEWID']->value){?><?php $_smarty_tpl->tpl_vars['CVNAME'] = new Smarty_variable($_smarty_tpl->tpl_vars['FILTERS']->value->get('viewname'), null, 0);?><?php break 1?><?php }?><?php } ?><?php } ?><span><p class="current-filter-name filter-name pull-left">&nbsp;&nbsp;<span class="fa fa-angle-right" aria-hidden="true"></span> <?php echo $_smarty_tpl->tpl_vars['CVNAME']->value;?>
 </p></span><?php }?></div><div class="col-lg-5 col-md-5 pull-right"><div id="appnav" class="navbar-right"><ul class="nav navbar-nav"><?php $_smarty_tpl->tpl_vars['BASIC_ACTION'] = new Smarty_variable($_smarty_tpl->tpl_vars['MODULE_BASIC_ACTIONS']->value, null, 0);?><li><button class="btn btn-default addBookmark addButton module-buttons" ><i class="fa fa-plus"></i>&nbsp;<?php echo vtranslate('LBL_ADD_BOOKMARK',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</i></button></li></ul></div></div></div><?php if ($_smarty_tpl->tpl_vars['FIELDS_INFO']->value!=null){?><script type="text/javascript">var uimeta = (function () {var fieldInfo = <?php echo $_smarty_tpl->tpl_vars['FIELDS_INFO']->value;?>
;return {field: {get: function (name, property) {if (name && property === undefined) {return fieldInfo[name];}if (name && property) {return fieldInfo[name][property]}},isMandatory: function (name) {if (fieldInfo[name]) {return fieldInfo[name].mandatory;}return false;},getType: function (name) {if (fieldInfo[name]) {return fieldInfo[name].type}return false;}}};})();</script><?php }?></div><?php }} ?>