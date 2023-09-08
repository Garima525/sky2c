<?php /* Smarty version Smarty-3.1.7, created on 2017-09-16 12:16:50
         compiled from "/home/skytwocc/public_html/crm/includes/runtime/../../layouts/v7/modules/Portal/IndexViewPreProcess.tpl" */ ?>
<?php /*%%SmartyHeaderCode:30243482559bd1632631324-19495875%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8c165f4f558fd31ba823ad3b6701a5dfd4f165c3' => 
    array (
      0 => '/home/skytwocc/public_html/crm/includes/runtime/../../layouts/v7/modules/Portal/IndexViewPreProcess.tpl',
      1 => 1496723290,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '30243482559bd1632631324-19495875',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_59bd163266d54',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59bd163266d54')) {function content_59bd163266d54($_smarty_tpl) {?>



<?php echo $_smarty_tpl->getSubTemplate ("modules/Vtiger/partials/Topbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="container-fluid app-nav">
    <div class="row">
        <?php echo $_smarty_tpl->getSubTemplate ("modules/Portal/SidebarHeader.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("ModuleHeader.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    </div>
</div>
</nav>
<div id='overlayPageContent' class='fade modal overlayPageContent content-area overlay-container-60' tabindex='-1' role='dialog' aria-hidden='true'>
    <div class="data">
    </div>
    <div class="modal-dialog">
    </div>
</div>
<div class="main-container main-container-<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
">

    <div class="listViewPageDiv content-area full-width" id="listViewContent">
<?php }} ?>