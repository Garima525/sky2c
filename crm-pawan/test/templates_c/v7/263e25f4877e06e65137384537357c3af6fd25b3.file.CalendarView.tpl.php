<?php /* Smarty version Smarty-3.1.7, created on 2019-10-17 18:14:39
         compiled from "/home/sky2co/public_html/crm-pawan/includes/runtime/../../layouts/v7/modules/Calendar/CalendarView.tpl" */ ?>
<?php /*%%SmartyHeaderCode:968057965da8af8f24e350-99725007%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '263e25f4877e06e65137384537357c3af6fd25b3' => 
    array (
      0 => '/home/sky2co/public_html/crm-pawan/includes/runtime/../../layouts/v7/modules/Calendar/CalendarView.tpl',
      1 => 1560285987,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '968057965da8af8f24e350-99725007',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'CURRENT_USER' => 0,
    'CURRENT_USER_MODEL' => 0,
    'LEFTPANELHIDE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5da8af8f2aee1',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5da8af8f2aee1')) {function content_5da8af8f2aee1($_smarty_tpl) {?>

<input type="hidden" id="currentView" value="<?php echo $_REQUEST['view'];?>
" /><input type="hidden" id="start_day" value="<?php echo $_smarty_tpl->tpl_vars['CURRENT_USER']->value->get('dayoftheweek');?>
" /><input type="hidden" id="activity_view" value="<?php echo $_smarty_tpl->tpl_vars['CURRENT_USER']->value->get('activity_view');?>
" /><input type="hidden" id="time_format" value="<?php echo $_smarty_tpl->tpl_vars['CURRENT_USER']->value->get('hour_format');?>
" /><input type="hidden" id="start_hour" value="<?php echo $_smarty_tpl->tpl_vars['CURRENT_USER']->value->get('start_hour');?>
" /><input type="hidden" id="date_format" value="<?php echo $_smarty_tpl->tpl_vars['CURRENT_USER']->value->get('date_format');?>
" /><input type="hidden" id="hideCompletedEventTodo" value="<?php echo $_smarty_tpl->tpl_vars['CURRENT_USER']->value->get('hidecompletedevents');?>
"><input type="hidden" id="show_allhours" value="<?php echo $_smarty_tpl->tpl_vars['CURRENT_USER']->value->get('showallhours');?>
" /><div id="mycalendar" class="calendarview col-lg-12"><?php $_smarty_tpl->tpl_vars['LEFTPANELHIDE'] = new Smarty_variable($_smarty_tpl->tpl_vars['CURRENT_USER_MODEL']->value->get('leftpanelhide'), null, 0);?><div class="essentials-toggle" title="<?php echo vtranslate('LBL_LEFT_PANEL_SHOW_HIDE','Vtiger');?>
"><span class="essentials-toggle-marker fa <?php if ($_smarty_tpl->tpl_vars['LEFTPANELHIDE']->value=='1'){?>fa-chevron-right<?php }else{ ?>fa-chevron-left<?php }?> cursorPointer"></span></div></div>
<?php }} ?>