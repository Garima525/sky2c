<?php /* Smarty version Smarty-3.1.7, created on 2022-01-10 15:28:42
         compiled from "/home/sky2co/public_html/crm-pawan/includes/runtime/../../layouts/v7/modules/Products/DetailViewHeaderTitle.tpl" */ ?>
<?php /*%%SmartyHeaderCode:73602894261dc50aae21652-36772578%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c02c8a4cb1d4243a0dd7f00f6214936c196e015d' => 
    array (
      0 => '/home/sky2co/public_html/crm-pawan/includes/runtime/../../layouts/v7/modules/Products/DetailViewHeaderTitle.tpl',
      1 => 1560286021,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '73602894261dc50aae21652-36772578',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'RECORD' => 0,
    'SELECTED_MENU_CATEGORY' => 0,
    'IMAGE_DETAILS' => 0,
    'IMAGE_INFO' => 0,
    'ITER' => 0,
    'MODULE_MODEL' => 0,
    'NAME_FIELD' => 0,
    'FIELD_MODEL' => 0,
    'MODULE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_61dc50ab31f13',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_61dc50ab31f13')) {function content_61dc50ab31f13($_smarty_tpl) {?>
<div class="col-sm-6 col-lg-6 col-md-6"><div class="record-header clearfix"><?php $_smarty_tpl->tpl_vars['IMAGE_DETAILS'] = new Smarty_variable($_smarty_tpl->tpl_vars['RECORD']->value->getImageDetails(), null, 0);?><div class="hidden-sm hidden-xs recordImage bgproducts app-<?php echo $_smarty_tpl->tpl_vars['SELECTED_MENU_CATEGORY']->value;?>
" <?php if (count($_smarty_tpl->tpl_vars['IMAGE_DETAILS']->value)>1){?>style = "display:block"<?php }?>><?php  $_smarty_tpl->tpl_vars['IMAGE_INFO'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['IMAGE_INFO']->_loop = false;
 $_smarty_tpl->tpl_vars['ITER'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['IMAGE_DETAILS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['IMAGE_INFO']->key => $_smarty_tpl->tpl_vars['IMAGE_INFO']->value){
$_smarty_tpl->tpl_vars['IMAGE_INFO']->_loop = true;
 $_smarty_tpl->tpl_vars['ITER']->value = $_smarty_tpl->tpl_vars['IMAGE_INFO']->key;
?><?php if (!empty($_smarty_tpl->tpl_vars['IMAGE_INFO']->value['path'])){?><?php if (count($_smarty_tpl->tpl_vars['IMAGE_DETAILS']->value)==1){?><img src="<?php echo $_smarty_tpl->tpl_vars['IMAGE_INFO']->value['path'];?>
_<?php echo $_smarty_tpl->tpl_vars['IMAGE_INFO']->value['orgname'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['IMAGE_INFO']->value['orgname'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['IMAGE_INFO']->value['orgname'];?>
" width="100%" height="100%" align="left"><br><?php }elseif(count($_smarty_tpl->tpl_vars['IMAGE_DETAILS']->value)==2){?><span><img src="<?php echo $_smarty_tpl->tpl_vars['IMAGE_INFO']->value['path'];?>
_<?php echo $_smarty_tpl->tpl_vars['IMAGE_INFO']->value['orgname'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['IMAGE_INFO']->value['orgname'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['IMAGE_INFO']->value['orgname'];?>
" width="50%" height="100%" align="left"></span><?php }elseif(count($_smarty_tpl->tpl_vars['IMAGE_DETAILS']->value)==3){?><span><img src="<?php echo $_smarty_tpl->tpl_vars['IMAGE_INFO']->value['path'];?>
_<?php echo $_smarty_tpl->tpl_vars['IMAGE_INFO']->value['orgname'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['IMAGE_INFO']->value['orgname'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['IMAGE_INFO']->value['orgname'];?>
" <?php if ($_smarty_tpl->tpl_vars['ITER']->value==0||$_smarty_tpl->tpl_vars['ITER']->value==1){?>width="50%" height = "50%"<?php }?><?php if ($_smarty_tpl->tpl_vars['ITER']->value==2){?>width="100%" height="50%"<?php }?> align="left"></span><?php }elseif(count($_smarty_tpl->tpl_vars['IMAGE_DETAILS']->value)==4||count($_smarty_tpl->tpl_vars['IMAGE_DETAILS']->value)>4){?><?php if ($_smarty_tpl->tpl_vars['ITER']->value>3){?><?php break 1?><?php }?><span><img src="<?php echo $_smarty_tpl->tpl_vars['IMAGE_INFO']->value['path'];?>
_<?php echo $_smarty_tpl->tpl_vars['IMAGE_INFO']->value['orgname'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['IMAGE_INFO']->value['orgname'];?>
" title="<?php echo $_smarty_tpl->tpl_vars['IMAGE_INFO']->value['orgname'];?>
"width="50%" height="50%" align="left"></span><?php }?><?php }else{ ?><img src="<?php echo vimage_path('summary_Products.png');?>
" class="summaryImg"/><?php }?><?php } ?><?php if (empty($_smarty_tpl->tpl_vars['IMAGE_DETAILS']->value)){?><div class="name"><span><strong> <i class="vicon-products"></i> </strong></span></div><?php }?></div><div class="recordBasicInfo"><div class="info-row"><h4><span class="recordLabel pushDown" title="<?php echo $_smarty_tpl->tpl_vars['RECORD']->value->getName();?>
"><?php  $_smarty_tpl->tpl_vars['NAME_FIELD'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['NAME_FIELD']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getNameFields(); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['NAME_FIELD']->key => $_smarty_tpl->tpl_vars['NAME_FIELD']->value){
$_smarty_tpl->tpl_vars['NAME_FIELD']->_loop = true;
?><?php $_smarty_tpl->tpl_vars['FIELD_MODEL'] = new Smarty_variable($_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getField($_smarty_tpl->tpl_vars['NAME_FIELD']->value), null, 0);?><?php if ($_smarty_tpl->tpl_vars['FIELD_MODEL']->value->getPermissions()){?><span class="<?php echo $_smarty_tpl->tpl_vars['NAME_FIELD']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['RECORD']->value->get($_smarty_tpl->tpl_vars['NAME_FIELD']->value);?>
</span>&nbsp;<?php }?><?php } ?></span></h4></div><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("DetailViewHeaderFieldsView.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</div></div></div><?php }} ?>