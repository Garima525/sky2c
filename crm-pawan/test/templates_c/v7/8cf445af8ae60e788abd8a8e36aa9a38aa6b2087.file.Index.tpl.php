<?php /* Smarty version Smarty-3.1.7, created on 2019-08-02 18:38:28
         compiled from "/home/sky2co/public_html/crm-pawan/includes/runtime/../../layouts/v7/modules/Settings/Picklist/Index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19340393105d448324c6fff7-86789856%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8cf445af8ae60e788abd8a8e36aa9a38aa6b2087' => 
    array (
      0 => '/home/sky2co/public_html/crm-pawan/includes/runtime/../../layouts/v7/modules/Settings/Picklist/Index.tpl',
      1 => 1560287228,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19340393105d448324c6fff7-86789856',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'QUALIFIED_MODULE' => 0,
    'PICKLIST_MODULES' => 0,
    'SELECTED_MODULE_NAME' => 0,
    'PICKLIST_MODULE' => 0,
    'NO_PICKLIST_FIELDS' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5d448324cbee4',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5d448324cbee4')) {function content_5d448324cbee4($_smarty_tpl) {?>



<div class="listViewPageDiv detailViewContainer " id="listViewContent">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-horizontal" >
        <br>
        <div class="detailViewInfo">
            <div class="row form-group"><div class="col-lg-3 col-md-3 col-sm-3 control-label fieldLabel">
                    <label class="fieldLabel "><?php echo vtranslate('LBL_SELECT_MODULE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
 </label>
                </div>
                <div class="fieldValue col-sm-3 col-xs-3">
                    <select class="select2 inputElement" id="pickListModules" name="pickListModules">
                        <option value=""><?php echo vtranslate('LBL_SELECT_OPTION',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</option>
                        <?php  $_smarty_tpl->tpl_vars['PICKLIST_MODULE'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['PICKLIST_MODULE']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['PICKLIST_MODULES']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['PICKLIST_MODULE']->key => $_smarty_tpl->tpl_vars['PICKLIST_MODULE']->value){
$_smarty_tpl->tpl_vars['PICKLIST_MODULE']->_loop = true;
?>
                            <option <?php if ($_smarty_tpl->tpl_vars['SELECTED_MODULE_NAME']->value==$_smarty_tpl->tpl_vars['PICKLIST_MODULE']->value->get('name')){?> selected="" <?php }?> value="<?php echo $_smarty_tpl->tpl_vars['PICKLIST_MODULE']->value->get('name');?>
"><?php echo vtranslate($_smarty_tpl->tpl_vars['PICKLIST_MODULE']->value->get('name'),$_smarty_tpl->tpl_vars['PICKLIST_MODULE']->value->get('name'));?>
</option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>

        <div id="modulePickListContainer">
            <?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("ModulePickListDetail.tpl",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>
        <br>
        <div id="modulePickListValuesContainer">
            <?php if (empty($_smarty_tpl->tpl_vars['NO_PICKLIST_FIELDS']->value)){?>
                <?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("PickListValueDetail.tpl",$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

            <?php }?>
        </div>

    </div>
</div><?php }} ?>