<?php /* Smarty version Smarty-3.1.7, created on 2017-09-16 12:08:50
         compiled from "/home/skytwocc/public_html/crm/includes/runtime/../../layouts/v7/modules/Documents/partials/Menubar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:34627697259bd1452b416c2-87127918%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '918ee9fa37ab9183eff41d0a8eb7e9e687761857' => 
    array (
      0 => '/home/skytwocc/public_html/crm/includes/runtime/../../layouts/v7/modules/Documents/partials/Menubar.tpl',
      1 => 1496723290,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '34627697259bd1452b416c2-87127918',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE_MODEL' => 0,
    'MODULE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_59bd1452b4c49',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59bd1452b4c49')) {function content_59bd1452b4c49($_smarty_tpl) {?><?php if ($_REQUEST['view']=='Detail'){?>
<div id="modules-menu" class="modules-menu">    
    <ul>
        <li class="active">
            <a href="<?php echo $_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getListViewUrl();?>
">
                <i class="vicon-documents"></i>
                <span><?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
</span>
            </a>
        </li>
    </ul>
</div>
<?php }?><?php }} ?>