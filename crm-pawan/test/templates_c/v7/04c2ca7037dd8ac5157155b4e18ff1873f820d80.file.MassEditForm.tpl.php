<?php /* Smarty version Smarty-3.1.7, created on 2018-02-02 12:07:17
         compiled from "/home/skytwocc/public_html/crm-pawan/includes/runtime/../../layouts/v7/modules/Vtiger/MassEditForm.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5369953775a572f09657257-74976663%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '04c2ca7037dd8ac5157155b4e18ff1873f820d80' => 
    array (
      0 => '/home/skytwocc/public_html/crm-pawan/includes/runtime/../../layouts/v7/modules/Vtiger/MassEditForm.tpl',
      1 => 1517573219,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5369953775a572f09657257-74976663',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5a572f096fcee',
  'variables' => 
  array (
    'MODULE' => 0,
    'CVID' => 0,
    'SELECTED_IDS' => 0,
    'EXCLUDED_IDS' => 0,
    'SEARCH_PARAMS' => 0,
    'TITLE' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a572f096fcee')) {function content_5a572f096fcee($_smarty_tpl) {?>
<div id="massEditContainer" class='fc-overlay-modal modal-content'><form class="form-horizontal" id="massEdit" name="MassEdit" method="post" action="index.php"><input type="hidden" name="module" value="<?php echo $_smarty_tpl->tpl_vars['MODULE']->value;?>
" /><input type="hidden" name="action" value="MassSave" /><input type="hidden" name="viewname" value="<?php echo $_smarty_tpl->tpl_vars['CVID']->value;?>
" /><input type="hidden" name="selected_ids" value=<?php echo ZEND_JSON::encode($_smarty_tpl->tpl_vars['SELECTED_IDS']->value);?>
><input type="hidden" name="excluded_ids" value=<?php echo ZEND_JSON::encode($_smarty_tpl->tpl_vars['EXCLUDED_IDS']->value);?>
><input type="hidden" name="search_params" value='<?php echo ZEND_JSON::encode($_smarty_tpl->tpl_vars['SEARCH_PARAMS']->value);?>
' /><div><header class="overlayHeader" style='flex:0 0 auto;'><?php ob_start();?><?php echo vtranslate('LBL_MASS_EDITING',$_smarty_tpl->tpl_vars['MODULE']->value);?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['TITLE'] = new Smarty_variable($_tmp1, null, 0);?><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("ModalHeader.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('TITLE'=>$_smarty_tpl->tpl_vars['TITLE']->value), 0);?>
</header><div class='modal-body' style="margin-bottom:60px"><div class='datacontent editViewContents'><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("partials/EditViewContents.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</div></div><footer class='modal-footer overlayFooter'><center><button type='submit' class='btn btn-success saveButton'><?php echo vtranslate('LBL_SAVE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</button>&nbsp;&nbsp;<a class='cancelLink' data-dismiss="modal" href="#"><?php echo vtranslate('LBL_CANCEL',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a></center></footer></div></form></div>

<script>
var assigned_user_id = $('select[name="assigned_user_id"] option:selected').val();
if(assigned_user_id!=1){	
	$("#s2id_autogen7").hide();
	var assigns = $('select[name="assigned_user_id"] option:selected').text();	
	$("#_detailView_fieldValue_assigned_user_id").html(assigns);	
}
</script><?php }} ?>