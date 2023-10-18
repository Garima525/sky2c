<?php /* Smarty version Smarty-3.1.7, created on 2023-03-10 23:42:26
         compiled from "/home/sky2co/public_html/crm-pawan/includes/runtime/../../layouts/v7/modules/Vtiger/ListViewActions.tpl" */ ?>
<?php /*%%SmartyHeaderCode:559608885d00a16beb6618-12274373%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c05f26c7751625a6b7fc155897fb91a2e350fb92' => 
    array (
      0 => '/home/sky2co/public_html/crm-pawan/includes/runtime/../../layouts/v7/modules/Vtiger/ListViewActions.tpl',
      1 => 1560331054,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '559608885d00a16beb6618-12274373',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5d00a16c13858',
  'variables' => 
  array (
    'LISTVIEW_MASSACTIONS' => 0,
    'LIST_MASSACTION' => 0,
    'LISTVIEW_MASSACTIONS_1' => 0,
    'editAction' => 0,
    'MODULE' => 0,
    'deleteAction' => 0,
    'commentAction' => 0,
    'LISTVIEW_LINKS' => 0,
    'LISTVIEW_MASSACTION' => 0,
    'MODULE_MODEL' => 0,
    'CURRENT_TAG' => 0,
    'LISTVIEW_ADVANCEDACTIONS' => 0,
    'PRINT_TEMPLATE' => 0,
    'FIND_DUPLICATES_EXISTS' => 0,
    'LISTVIEW_ENTRIES_COUNT' => 0,
    'REQUEST_INSTANCE' => 0,
    'VIEWID' => 0,
    'CUSTOM_VIEWS' => 0,
    'FILTER_TYPES' => 0,
    'FILTERS' => 0,
    'DEFAULT_FILTER_ID' => 0,
    'CVNAME' => 0,
    'DEFAULT_FILTER_URL' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d00a16c13858')) {function content_5d00a16c13858($_smarty_tpl) {?>

<?php $_smarty_tpl->tpl_vars['LISTVIEW_MASSACTIONS_1'] = new Smarty_variable(array(), null, 0);?><div id="listview-actions" class="listview-actions-container"><?php  $_smarty_tpl->tpl_vars['LIST_MASSACTION'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['LIST_MASSACTION']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['LISTVIEW_MASSACTIONS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['LIST_MASSACTION']->key => $_smarty_tpl->tpl_vars['LIST_MASSACTION']->value){
$_smarty_tpl->tpl_vars['LIST_MASSACTION']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['LIST_MASSACTION']->value->getLabel()=='LBL_EDIT'){?><?php $_smarty_tpl->tpl_vars['editAction'] = new Smarty_variable($_smarty_tpl->tpl_vars['LIST_MASSACTION']->value, null, 0);?><?php }elseif($_smarty_tpl->tpl_vars['LIST_MASSACTION']->value->getLabel()=='LBL_DELETE'){?><?php $_smarty_tpl->tpl_vars['deleteAction'] = new Smarty_variable($_smarty_tpl->tpl_vars['LIST_MASSACTION']->value, null, 0);?><?php }elseif($_smarty_tpl->tpl_vars['LIST_MASSACTION']->value->getLabel()=='LBL_ADD_COMMENT'){?><?php $_smarty_tpl->tpl_vars['commentAction'] = new Smarty_variable($_smarty_tpl->tpl_vars['LIST_MASSACTION']->value, null, 0);?><?php }else{ ?><?php $_smarty_tpl->tpl_vars['a'] = new Smarty_variable(array_push($_smarty_tpl->tpl_vars['LISTVIEW_MASSACTIONS_1']->value,$_smarty_tpl->tpl_vars['LIST_MASSACTION']->value), null, 0);?><?php }?><?php } ?><div class = "row"><div class=" col-md-5 col-sm-4 "><div class="btn-group listViewActionsContainer" role="group" aria-label="..."><?php if ($_smarty_tpl->tpl_vars['editAction']->value){?><button type="button" class="btn btn-default" id=<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
_listView_massAction_<?php echo $_smarty_tpl->tpl_vars['editAction']->value->getLabel();?>
<?php if (stripos($_smarty_tpl->tpl_vars['editAction']->value->getUrl(),'javascript:')===0){?> href="javascript:void(0);" onclick='<?php echo substr($_smarty_tpl->tpl_vars['editAction']->value->getUrl(),strlen("javascript:"));?>
'<?php }else{ ?> href='<?php echo $_smarty_tpl->tpl_vars['editAction']->value->getUrl();?>
' <?php }?> title="<?php echo vtranslate('LBL_EDIT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
" disabled="disabled"><i class="fa fa-pencil"></i></button><?php }?><?php if ($_smarty_tpl->tpl_vars['deleteAction']->value){?><button type="button" class="btn btn-default" id=<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
_listView_massAction_<?php echo $_smarty_tpl->tpl_vars['deleteAction']->value->getLabel();?>
<?php if (stripos($_smarty_tpl->tpl_vars['deleteAction']->value->getUrl(),'javascript:')===0){?> href="javascript:void(0);" onclick='<?php echo substr($_smarty_tpl->tpl_vars['deleteAction']->value->getUrl(),strlen("javascript:"));?>
'<?php }else{ ?> href='<?php echo $_smarty_tpl->tpl_vars['deleteAction']->value->getUrl();?>
' <?php }?> title="<?php echo vtranslate('LBL_DELETE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
" disabled="disabled"><i class="fa fa-trash"></i></button><?php }?><?php if ($_smarty_tpl->tpl_vars['commentAction']->value){?><button type="button" class="btn btn-default" id="<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
_listView_massAction_<?php echo $_smarty_tpl->tpl_vars['commentAction']->value->getLabel();?>
"onclick="Vtiger_List_Js.triggerMassAction('<?php echo $_smarty_tpl->tpl_vars['commentAction']->value->getUrl();?>
')" title="<?php echo vtranslate('LBL_COMMENT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
" disabled="disabled"><i class="fa fa-comment"></i></button><?php }?><?php if (count($_smarty_tpl->tpl_vars['LISTVIEW_MASSACTIONS_1']->value)>0||count($_smarty_tpl->tpl_vars['LISTVIEW_LINKS']->value['LISTVIEW'])>0){?><div class="btn-group listViewMassActions" role="group"><button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown"><?php echo vtranslate('LBL_MORE','Vtiger');?>
&nbsp;<span class="caret"></span></button><ul class="dropdown-menu" role="menu"><li><a id="mark_as_unread" href="javascript:void(0);">Mark as Unread</a></li><?php  $_smarty_tpl->tpl_vars['LISTVIEW_MASSACTION'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['LISTVIEW_MASSACTION']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['LISTVIEW_MASSACTIONS_1']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['LISTVIEW_MASSACTION']->key => $_smarty_tpl->tpl_vars['LISTVIEW_MASSACTION']->value){
$_smarty_tpl->tpl_vars['LISTVIEW_MASSACTION']->_loop = true;
?><li class="hide"><a id="<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
_listView_massAction_<?php echo Vtiger_Util_Helper::replaceSpaceWithUnderScores($_smarty_tpl->tpl_vars['LISTVIEW_MASSACTION']->value->getLabel());?>
" <?php if (stripos($_smarty_tpl->tpl_vars['LISTVIEW_MASSACTION']->value->getUrl(),'javascript:')===0){?> href="javascript:void(0);" onclick='<?php echo substr($_smarty_tpl->tpl_vars['LISTVIEW_MASSACTION']->value->getUrl(),strlen("javascript:"));?>
;'<?php }else{ ?> href='<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_MASSACTION']->value->getUrl();?>
' <?php }?>><?php echo vtranslate($_smarty_tpl->tpl_vars['LISTVIEW_MASSACTION']->value->getLabel(),$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a></li><?php } ?><?php if (count($_smarty_tpl->tpl_vars['LISTVIEW_MASSACTIONS_1']->value)>0&&count($_smarty_tpl->tpl_vars['LISTVIEW_LINKS']->value['LISTVIEW'])>0){?><li class="divider hide"></li><?php }?><?php if ($_smarty_tpl->tpl_vars['MODULE_MODEL']->value->isStarredEnabled()){?><li class="hide"><a id="<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
_listView_massAction_LBL_ADD_STAR" onclick="Vtiger_List_Js.triggerAddStar()"><?php echo vtranslate('LBL_FOLLOW',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a></li><li class="hide"><a id="<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
_listView_massAction_LBL_REMOVE_STAR" onclick="Vtiger_List_Js.triggerRemoveStar()"><?php echo vtranslate('LBL_UNFOLLOW',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a></li><?php }?><li class="hide"><a id="<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
_listView_massAction_LBL_ADD_TAG" onclick="Vtiger_List_Js.triggerAddTag()"><?php echo vtranslate('LBL_ADD_TAG',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a></li><?php if ($_smarty_tpl->tpl_vars['CURRENT_TAG']->value!=''){?><li class="hide"><a id="<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
_listview_massAction_LBL_REMOVE_TAG" onclick="Vtiger_List_Js.triggerRemoveTag(<?php echo $_smarty_tpl->tpl_vars['CURRENT_TAG']->value;?>
)"><?php echo vtranslate('LBL_REMOVE_TAG',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a></li><?php }?><li class="divider hide" style="margin:9px 0px;"></li><?php $_smarty_tpl->tpl_vars['FIND_DUPLICATES_EXITS'] = new Smarty_variable(false, null, 0);?><?php  $_smarty_tpl->tpl_vars['LISTVIEW_ADVANCEDACTIONS'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['LISTVIEW_ADVANCEDACTIONS']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['LISTVIEW_LINKS']->value['LISTVIEW']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['LISTVIEW_ADVANCEDACTIONS']->key => $_smarty_tpl->tpl_vars['LISTVIEW_ADVANCEDACTIONS']->value){
$_smarty_tpl->tpl_vars['LISTVIEW_ADVANCEDACTIONS']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['LISTVIEW_ADVANCEDACTIONS']->value->getLabel()=='Print'){?><?php $_smarty_tpl->tpl_vars['PRINT_TEMPLATE'] = new Smarty_variable($_smarty_tpl->tpl_vars['LISTVIEW_ADVANCEDACTIONS']->value, null, 0);?><?php }else{ ?><?php if ($_smarty_tpl->tpl_vars['LISTVIEW_ADVANCEDACTIONS']->value->getLabel()=='LBL_FIND_DUPLICATES'){?><?php $_smarty_tpl->tpl_vars['FIND_DUPLICATES_EXISTS'] = new Smarty_variable(true, null, 0);?><?php }?><?php }?><?php } ?><?php if ($_smarty_tpl->tpl_vars['PRINT_TEMPLATE']->value){?><li class="hide"><a id="<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
_listView_advancedAction_<?php echo Vtiger_Util_Helper::replaceSpaceWithUnderScores($_smarty_tpl->tpl_vars['PRINT_TEMPLATE']->value->getLabel());?>
" <?php if (stripos($_smarty_tpl->tpl_vars['PRINT_TEMPLATE']->value->getUrl(),'javascript:')===0){?> href="javascript:void(0);" onclick='<?php echo substr($_smarty_tpl->tpl_vars['PRINT_TEMPLATE']->value->getUrl(),strlen("javascript:"));?>
;'<?php }else{ ?> href='<?php echo $_smarty_tpl->tpl_vars['PRINT_TEMPLATE']->value->getUrl();?>
' <?php }?>><?php echo vtranslate($_smarty_tpl->tpl_vars['PRINT_TEMPLATE']->value->getLabel(),$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a></li><?php }?><?php if ($_smarty_tpl->tpl_vars['FIND_DUPLICATES_EXISTS']->value){?><li class="hide"><a id="<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
_listView_advancedAction_MERGE_RECORD"  href="javascript:void(0);" onclick='Vtiger_List_Js.triggerMergeRecord()'><?php echo vtranslate('LBL_MERGE_SELECTED_RECORDS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a></li><?php }?><?php  $_smarty_tpl->tpl_vars['LISTVIEW_ADVANCEDACTIONS'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['LISTVIEW_ADVANCEDACTIONS']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['LISTVIEW_LINKS']->value['LISTVIEW']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['LISTVIEW_ADVANCEDACTIONS']->key => $_smarty_tpl->tpl_vars['LISTVIEW_ADVANCEDACTIONS']->value){
$_smarty_tpl->tpl_vars['LISTVIEW_ADVANCEDACTIONS']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['LISTVIEW_ADVANCEDACTIONS']->value->getLabel()=='LBL_IMPORT'){?><?php }elseif($_smarty_tpl->tpl_vars['LISTVIEW_ADVANCEDACTIONS']->value->getLabel()=='Print'){?><?php $_smarty_tpl->tpl_vars['PRINT_TEMPLATE'] = new Smarty_variable($_smarty_tpl->tpl_vars['LISTVIEW_ADVANCEDACTIONS']->value, null, 0);?><?php }else{ ?><?php if ($_smarty_tpl->tpl_vars['LISTVIEW_ADVANCEDACTIONS']->value->getLabel()=='LBL_FIND_DUPLICATES'){?><?php $_smarty_tpl->tpl_vars['FIND_DUPLICATES_EXISTS'] = new Smarty_variable(true, null, 0);?><?php }?><?php if ($_smarty_tpl->tpl_vars['LISTVIEW_ADVANCEDACTIONS']->value->getLabel()!='Print'){?><li class="selectFreeRecords"><a id="<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
_listView_advancedAction_<?php echo Vtiger_Util_Helper::replaceSpaceWithUnderScores($_smarty_tpl->tpl_vars['LISTVIEW_ADVANCEDACTIONS']->value->getLabel());?>
" <?php if (stripos($_smarty_tpl->tpl_vars['LISTVIEW_ADVANCEDACTIONS']->value->getUrl(),'javascript:')===0){?> href="javascript:void(0);" onclick='<?php echo substr($_smarty_tpl->tpl_vars['LISTVIEW_ADVANCEDACTIONS']->value->getUrl(),strlen("javascript:"));?>
;'<?php }else{ ?> href='<?php echo $_smarty_tpl->tpl_vars['LISTVIEW_ADVANCEDACTIONS']->value->getUrl();?>
' <?php }?>><?php echo vtranslate($_smarty_tpl->tpl_vars['LISTVIEW_ADVANCEDACTIONS']->value->getLabel(),$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a></li><?php }?><?php }?><?php } ?></ul></div><?php }?><?php if ($_smarty_tpl->tpl_vars['MODULE']->value=='Leads'){?><div style="float:left;"><a href="javascript:void();" id="today_lead" class="btn btn-default active" style="margin-left:10px;"><i class="glyphicon glyphicon-list"></i> Today Leads</a><a href="javascript:void();" id="junk_lead" class="btn btn-default active" style="margin-left:10px;"><i class="glyphicon glyphicon-trash"></i> Junk Leads</a><a href="javascript:void();" id="all_lead" class="btn btn-default active" style="margin-left:10px;"><i class="glyphicon glyphicon-list"></i> All Leads</a></div><?php }?></div></div><div class='col-md-4 col-sm-4 '><?php if ($_smarty_tpl->tpl_vars['LISTVIEW_ENTRIES_COUNT']->value=='0'&&$_smarty_tpl->tpl_vars['REQUEST_INSTANCE']->value&&$_smarty_tpl->tpl_vars['REQUEST_INSTANCE']->value->isAjax()){?><?php if ($_SESSION['lvs'][$_smarty_tpl->tpl_vars['MODULE']->value]['viewname']){?><?php $_smarty_tpl->tpl_vars['VIEWID'] = new Smarty_variable($_SESSION['lvs'][$_smarty_tpl->tpl_vars['MODULE']->value]['viewname'], null, 0);?><?php }?><?php if ($_smarty_tpl->tpl_vars['VIEWID']->value){?><?php  $_smarty_tpl->tpl_vars['FILTER_TYPES'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['FILTER_TYPES']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['CUSTOM_VIEWS']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['FILTER_TYPES']->key => $_smarty_tpl->tpl_vars['FILTER_TYPES']->value){
$_smarty_tpl->tpl_vars['FILTER_TYPES']->_loop = true;
?><?php  $_smarty_tpl->tpl_vars['FILTERS'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['FILTERS']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['FILTER_TYPES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['FILTERS']->key => $_smarty_tpl->tpl_vars['FILTERS']->value){
$_smarty_tpl->tpl_vars['FILTERS']->_loop = true;
?><?php if ($_smarty_tpl->tpl_vars['FILTERS']->value->get('cvid')==$_smarty_tpl->tpl_vars['VIEWID']->value){?><?php $_smarty_tpl->tpl_vars['CVNAME'] = new Smarty_variable($_smarty_tpl->tpl_vars['FILTERS']->value->get('viewname'), null, 0);?><?php break 1?><?php }?><?php } ?><?php } ?><?php $_smarty_tpl->tpl_vars['DEFAULT_FILTER_URL'] = new Smarty_variable($_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getDefaultUrl(), null, 0);?><?php $_smarty_tpl->tpl_vars['DEFAULT_FILTER_ID'] = new Smarty_variable($_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getDefaultCustomFilter(), null, 0);?><?php if ($_smarty_tpl->tpl_vars['DEFAULT_FILTER_ID']->value){?><?php $_smarty_tpl->tpl_vars['DEFAULT_FILTER_URL'] = new Smarty_variable((($_smarty_tpl->tpl_vars['MODULE_MODEL']->value->getListViewUrl()).("&viewname=")).($_smarty_tpl->tpl_vars['DEFAULT_FILTER_ID']->value), null, 0);?><?php }?><?php if ($_smarty_tpl->tpl_vars['CVNAME']->value!='All'){?><div><?php echo vtranslate('LBL_DISPLAYING_RESULTS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
 <?php echo vtranslate('LBL_FROM',$_smarty_tpl->tpl_vars['MODULE']->value);?>
 <b><?php echo $_smarty_tpl->tpl_vars['CVNAME']->value;?>
</b>. <a style="color:blue" href='<?php echo $_smarty_tpl->tpl_vars['DEFAULT_FILTER_URL']->value;?>
'><?php echo vtranslate('LBL_SEARCH_IN',$_smarty_tpl->tpl_vars['MODULE']->value);?>
 <?php echo vtranslate('All',$_smarty_tpl->tpl_vars['MODULE']->value);?>
 <?php echo vtranslate($_smarty_tpl->tpl_vars['MODULE']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a> </div><?php }?><?php }?><?php }?><div class="hide messageContainer" style = "height:30px;"><center><a href="#" id="selectAllMsgDiv"><?php echo vtranslate('LBL_SELECT_ALL',$_smarty_tpl->tpl_vars['MODULE']->value);?>
&nbsp;<?php echo vtranslate($_smarty_tpl->tpl_vars['MODULE']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>
&nbsp;(<span id="totalRecordsCount" value=""></span>)</a></center></div><div class="hide messageContainer" style = "height:30px;"><center><a href="#" id="deSelectAllMsgDiv"><?php echo vtranslate('LBL_DESELECT_ALL_RECORDS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a></center></div></div><div class="col-md-3 col-sm-4 "><?php $_smarty_tpl->tpl_vars['RECORD_COUNT'] = new Smarty_variable($_smarty_tpl->tpl_vars['LISTVIEW_ENTRIES_COUNT']->value, null, 0);?><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("Pagination.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('SHOWPAGEJUMP'=>true), 0);?>
</div></div></div>

<script>
$("#mark_as_unread").click(function(){
	var a = [];
    $(".listViewEntriesCheckBox:checked").each(function(){
        a.push(this.value);
    });		
	var str = a.join('|');	
	$.ajax({ type: "POST",url: "index.php?module=Leads&view=Detail&record=3&app=MARKETING&tobe=customrod&mod="+str, data:str }).done(function(datas){
		location.reload();
	});		
});

$("#Leads_listView_massAction_LBL_DELETE").hide();

$("#today_lead").click(function(){
	var txtDate = $.datepicker.formatDate('mm-dd-yy', new Date());
	location.href = 'index.php?module=Leads&parent=&view=List&viewname=1&orderby=leadid&sortorder=DESC&app=MARKETING&nolistcache=0&search_params=[[["createdtime","bw","'+txtDate+','+txtDate+'"]]]&page=1';
});

$("#junk_lead").click(function(){
	location.href = 'index.php?module=Leads&parent=&view=List&viewname=1&orderby=leadid&sortorder=DESC&app=MARKETING&search_params=[[["leadstatus","e","Junk Lead"]]]&manualety=1&page=1';
});

$("#all_lead").click(function(){
	/*location.href = 'index.php?module=Leads&parent=&view=List&viewname=1&orderby=lead_no&sortorder=DESC&app=MARKETING&search_params=[[["leadstatus","e",""]]]&page=1';*/	
	location.href='https://www.sky2c.com/crm-pawan/index.php?module=Leads&parent=&page=1&view=List&viewname=1&orderby=leadid&sortorder=DESC&app=MARKETING&search_params=[]';
	/*location.href = 'index.php?module=Leads&view=List&viewname=1&app=MARKETING&orderby=leadid&sortorder=DESC';*/
});

</script><?php }} ?>