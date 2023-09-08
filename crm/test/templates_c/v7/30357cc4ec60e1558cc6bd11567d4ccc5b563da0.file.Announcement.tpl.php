<?php /* Smarty version Smarty-3.1.7, created on 2017-09-16 06:33:19
         compiled from "/home/checkcrm/public_html/vtiger/includes/runtime/../../layouts/v7/modules/Settings/Vtiger/Announcement.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19446570859bcc5af3ac000-32996231%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '30357cc4ec60e1558cc6bd11567d4ccc5b563da0' => 
    array (
      0 => '/home/checkcrm/public_html/vtiger/includes/runtime/../../layouts/v7/modules/Settings/Vtiger/Announcement.tpl',
      1 => 1496723290,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19446570859bcc5af3ac000-32996231',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'QUALIFIED_MODULE' => 0,
    'ANNOUNCEMENT' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_59bcc5af3d173',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59bcc5af3d173')) {function content_59bcc5af3d173($_smarty_tpl) {?>
<div class="listViewPageDiv" id="listViewContent"><div class="col-sm-12 col-xs-12 "><div class="container-fluid" id="AnnouncementContainer"><div class="widget_header"><h3><?php echo vtranslate('LBL_ANNOUNCEMENTS',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</h3></div><hr><div class="contents"><textarea class="announcementContent textarea-autosize boxSizingBorderBox" rows="3" placeholder="<?php echo vtranslate('LBL_ENTER_ANNOUNCEMENT_HERE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
" style="width:100%"><?php echo $_smarty_tpl->tpl_vars['ANNOUNCEMENT']->value->get('announcement');?>
</textarea><div class="textAlignCenter"><br><button class="btn btn-success saveAnnouncement hide"><strong><?php echo vtranslate('LBL_SAVE',$_smarty_tpl->tpl_vars['QUALIFIED_MODULE']->value);?>
</strong></button></div></div></div>
<?php }} ?>