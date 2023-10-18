<?php /* Smarty version Smarty-3.1.7, created on 2018-06-08 19:24:06
         compiled from "/home/skytwocc/public_html/crm-pawan/includes/runtime/../../layouts/v7/modules/Vtiger/UnifiedSearchResults.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4052642845b1ad7d6a283c8-87725529%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2a1cb938c540c1ac42ecf3ba489151311fbf2f65' => 
    array (
      0 => '/home/skytwocc/public_html/crm-pawan/includes/runtime/../../layouts/v7/modules/Vtiger/UnifiedSearchResults.tpl',
      1 => 1496723290,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4052642845b1ad7d6a283c8-87725529',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE' => 0,
    'ADV_SEARCH_FIELDS_INFO' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5b1ad7d6b410c',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b1ad7d6b410c')) {function content_5b1ad7d6b410c($_smarty_tpl) {?>



<div id="searchResults-container">
    <div class="container-fluid">
        <div class="row" style="margin-top: 10px; margin-bottom: 10px;">
            <div class="col-lg-6">
                <span style="font-size: 24px;"><strong> <?php echo vtranslate('LBL_SEARCH_RESULTS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
 </strong></span>
            </div>
            <div class="col-lg-6">
                <div class="pull-right">
                    <a class="btn btn-default module-buttons" href="javascript:void(0);" id="showFilter"><?php echo vtranslate('LBL_SAVE_MODIFY_FILTER',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a>
                </div>
            </div>
        </div>
        <div class="row moduleResults-container">
            <?php echo $_smarty_tpl->getSubTemplate (vtemplate_path("UnifiedSearchResultsContents.tpl",$_smarty_tpl->tpl_vars['MODULE']->value), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        </div>
    </div>
    <?php if ($_smarty_tpl->tpl_vars['ADV_SEARCH_FIELDS_INFO']->value!=null){?>
        <script type="text/javascript">
            var adv_search_uimeta = (function() {
                var fieldInfo = <?php echo $_smarty_tpl->tpl_vars['ADV_SEARCH_FIELDS_INFO']->value;?>
;
                return {
                    field: {
                        get: function(name, property) {
                            if (name && property === undefined) {
                                return fieldInfo[name];
                            }
                            if (name && property) {
                                return fieldInfo[name][property]
                            }
                        },
                        isMandatory: function(name) {
                            if (fieldInfo[name]) {
                                return fieldInfo[name].mandatory;
                            }
                            return false;
                        },
                        getType: function(name) {
                            if (fieldInfo[name]) {
                                return fieldInfo[name].type;
                            }
                            return false;
                        }
                    },
                };
            })();
        </script>
<?php }?>
</div>

<?php }} ?>