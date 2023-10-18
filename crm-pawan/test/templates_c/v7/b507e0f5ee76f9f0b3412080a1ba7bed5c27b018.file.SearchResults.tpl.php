<?php /* Smarty version Smarty-3.1.7, created on 2018-01-09 07:20:35
         compiled from "/home/skytwocc/public_html/crm-pawan/includes/runtime/../../layouts/v7/modules/Vtiger/SearchResults.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10530670485a546d43a465e4-28746477%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b507e0f5ee76f9f0b3412080a1ba7bed5c27b018' => 
    array (
      0 => '/home/skytwocc/public_html/crm-pawan/includes/runtime/../../layouts/v7/modules/Vtiger/SearchResults.tpl',
      1 => 1496723290,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10530670485a546d43a465e4-28746477',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SEARCH_VALUE' => 0,
    'GROUP_START' => 0,
    'MATCHING_RECORDS' => 0,
    'LISTVIEW_MODEL' => 0,
    'MODULE_MODEL' => 0,
    'MODULE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5a546d43ae904',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a546d43ae904')) {function content_5a546d43ae904($_smarty_tpl) {?>

<script type="text/javascript" src="<?php echo vresource_url('layouts/v7/modules/Vtiger/resources/List.js');?>
"></script><script type="text/javascript" src="<?php echo vresource_url('layouts/v7/modules/Vtiger/resources/SearchList.js');?>
"></script><div id="searchResults-container" class="modal-body" style="padding:0!important"><div class="col-lg-12 clearfix"><div class="pull-right overlay-close"><button type="button" class="close" aria-label="Close" data-target="#overlayPage" data-dismiss="modal"><span aria-hidden="true" class="fa fa-close"></span></button></div></div><div class="searchResults"><input type="hidden" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['SEARCH_VALUE']->value, ENT_QUOTES, 'ISO-8859-1', true);?>
" id="searchValue"><div class="scrollableSearchContent"><div class="container-fluid moduleResults-container"><input type="hidden" name="groupStart" value="<?php echo $_smarty_tpl->tpl_vars['GROUP_START']->value;?>
" class="groupStart"/><?php $_smarty_tpl->tpl_vars['NORECORDS'] = new Smarty_variable(false, null, 0);?><?php  $_smarty_tpl->tpl_vars['LISTVIEW_MODEL'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['LISTVIEW_MODEL']->_loop = false;
 $_smarty_tpl->tpl_vars['MODULE'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['MATCHING_RECORDS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['LISTVIEW_MODEL']->key => $_smarty_tpl->tpl_vars['LISTVIEW_MODEL']->value){
$_smarty_tpl->tpl_vars['LISTVIEW_MODEL']->_loop = true;
 $_smarty_tpl->tpl_vars['MODULE']->value = $_smarty_tpl->tpl_vars['LISTVIEW_MODEL']->key;
?><?php $_smarty_tpl->tpl_vars['RECORDS_COUNT'] = new Smarty_variable($_smarty_tpl->tpl_vars['LISTVIEW_MODEL']->value->recordsCount, null, 0);?><?php $_smarty_tpl->tpl_vars['PAGING_MODEL'] = new Smarty_variable($_smarty_tpl->tpl_vars['LISTVIEW_MODEL']->value->pagingModel, null, 0);?><?php $_smarty_tpl->tpl_vars['LISTVIEW_HEADERS'] = new Smarty_variable($_smarty_tpl->tpl_vars['LISTVIEW_MODEL']->value->listViewHeaders, null, 0);?><?php $_smarty_tpl->tpl_vars['LISTVIEW_ENTRIES'] = new Smarty_variable($_smarty_tpl->tpl_vars['LISTVIEW_MODEL']->value->listViewEntries, null, 0);?><?php $_smarty_tpl->tpl_vars['MODULE_MODEL'] = new Smarty_variable($_smarty_tpl->tpl_vars['LISTVIEW_MODEL']->value->getModule(), null, 0);?><?php $_smarty_tpl->tpl_vars['QUICK_PREVIEW_ENABLED'] = new Smarty_variable($_smarty_tpl->tpl_vars['MODULE_MODEL']->value->isQuickPreviewEnabled(), null, 0);?><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("ModuleSearchResults.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('SEARCH_MODE_RESULTS'=>true), 0);?>
<br><?php } ?><?php if (!$_smarty_tpl->tpl_vars['MATCHING_RECORDS']->value){?><div class="emptyRecordsDiv"><div class="emptyRecordsContent"><?php echo vtranslate("LBL_NO_RECORDS_FOUND");?>
</div></div><?php }?></div></div></div></div><?php }} ?>