<?php /* Smarty version Smarty-3.1.7, created on 2020-06-05 12:50:04
         compiled from "/home/sky2co/public_html/crm-pawan/includes/runtime/../../layouts/v7/modules/Import/ImportResult.tpl" */ ?>
<?php /*%%SmartyHeaderCode:84798345eda3f7c6e3139-68434861%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0879cc2cd98b71d51853ecd95d2f9ab24e75a8cc' => 
    array (
      0 => '/home/sky2co/public_html/crm-pawan/includes/runtime/../../layouts/v7/modules/Import/ImportResult.tpl',
      1 => 1560286002,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '84798345eda3f7c6e3139-68434861',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE' => 0,
    'TITLE' => 0,
    'FOR_MODULE' => 0,
    'IMPORT_RESULT' => 0,
    'ERROR_MESSAGE' => 0,
    'MERGE_ENABLED' => 0,
    'OWNER_ID' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5eda3f7caee5c',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5eda3f7caee5c')) {function content_5eda3f7caee5c($_smarty_tpl) {?>



<div class='fc-overlay-modal modal-content'>
    <div class="overlayHeader">
        <?php ob_start();?><?php echo vtranslate('LBL_IMPORT_SUMMARY',$_smarty_tpl->tpl_vars['MODULE']->value);?>
<?php $_tmp1=ob_get_clean();?><?php $_smarty_tpl->tpl_vars['TITLE'] = new Smarty_variable($_tmp1, null, 0);?>
        <?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("ModalHeader.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('TITLE'=>$_smarty_tpl->tpl_vars['TITLE']->value), 0);?>

    </div>
    <div class='modal-body' style="margin-bottom:100%">
        <div class="summaryWidgetContainer">
            <input type="hidden" name="module" value="<?php echo $_smarty_tpl->tpl_vars['FOR_MODULE']->value;?>
" />
            <h4><?php echo vtranslate('LBL_TOTAL_RECORDS_SCANNED',$_smarty_tpl->tpl_vars['MODULE']->value);?>
&nbsp;&nbsp;:&nbsp;&nbsp;<?php echo $_smarty_tpl->tpl_vars['IMPORT_RESULT']->value['TOTAL'];?>
</h4>
            <?php if ($_smarty_tpl->tpl_vars['ERROR_MESSAGE']->value!=''){?><span><?php echo $_smarty_tpl->tpl_vars['ERROR_MESSAGE']->value;?>
</span><?php }?>
            <hr>
            <div><?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("Import_Result_Details.tpl",'Import'), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</div>
        </div>
    </div>
    <div class='modal-overlay-footer border1px clearfix'>
       <div class="row clearfix">
            <div class='textAlignCenter col-lg-12 col-md-12 col-sm-12 '>
                <button name="next" class="btn btn-primary btn-lg"
                        onclick="return Vtiger_Import_Js.triggerImportAction();"><?php echo vtranslate('LBL_IMPORT_MORE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</button>
                &nbsp;&nbsp;&nbsp;
                <?php if ($_smarty_tpl->tpl_vars['MERGE_ENABLED']->value=='0'){?>
                    <button name="next" class="btn btn-danger btn-lg"
                            onclick="Vtiger_Import_Js.undoImport('index.php?module=<?php echo $_smarty_tpl->tpl_vars['FOR_MODULE']->value;?>
&view=Import&mode=undoImport&foruser=<?php echo $_smarty_tpl->tpl_vars['OWNER_ID']->value;?>
')"><?php echo vtranslate('LBL_UNDO_LAST_IMPORT',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</button>
                    &nbsp;&nbsp;&nbsp;
                <?php }?>
                <button class='btn btn-success btn-lg' data-dismiss="modal" onclick="Vtiger_Import_Js.loadListRecords();"><?php echo vtranslate('LBL_FINISH',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</button>
            </div>
        </div>
    </div>
</div>
<?php }} ?>