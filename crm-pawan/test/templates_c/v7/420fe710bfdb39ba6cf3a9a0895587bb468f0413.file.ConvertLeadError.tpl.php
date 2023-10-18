<?php /* Smarty version Smarty-3.1.7, created on 2018-02-07 21:04:03
         compiled from "/home/skytwocc/public_html/crm-pawan/includes/runtime/../../layouts/v7/modules/Leads/ConvertLeadError.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19250255295a7b69c30008c5-86126528%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '420fe710bfdb39ba6cf3a9a0895587bb468f0413' => 
    array (
      0 => '/home/skytwocc/public_html/crm-pawan/includes/runtime/../../layouts/v7/modules/Leads/ConvertLeadError.tpl',
      1 => 1496723290,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19250255295a7b69c30008c5-86126528',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SINGLE_MODULE' => 0,
    'MODULE' => 0,
    'EXCEPTION' => 0,
    'CURRENT_USER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5a7b69c30691f',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a7b69c30691f')) {function content_5a7b69c30691f($_smarty_tpl) {?>
<table border='0' cellpadding='5' cellspacing='0' width='100%' height='450px'>
	<tr>
		<td align='center'>
			<div style='border: 3px solid rgb(153, 153, 153); background-color: rgb(255, 255, 255); width: 70%; position: relative; z-index: 10000000;'>
				<table border='0' cellpadding='5' cellspacing='0' width='98%'>
					<tbody>
						<tr>
							<td rowspan='2' width='11%'><img src="<?php echo vimage_path('denied.gif');?>
" ></td>
							<td style='border-bottom: 1px solid rgb(204, 204, 204);' nowrap='nowrap' width='70%'>
								<span class='genHeaderSmall'>
									<?php $_smarty_tpl->tpl_vars['SINGLE_MODULE'] = new Smarty_variable("SINGLE_".($_smarty_tpl->tpl_vars['MODULE']->value), null, 0);?>
									<span class='genHeaderSmall'><?php echo vtranslate($_smarty_tpl->tpl_vars['SINGLE_MODULE']->value,$_smarty_tpl->tpl_vars['MODULE']->value);?>
 <?php echo vtranslate('CANNOT_CONVERT',$_smarty_tpl->tpl_vars['MODULE']->value);?>

									<br>
										<ul> <?php echo vtranslate('LBL_FOLLOWING_ARE_POSSIBLE_REASONS',$_smarty_tpl->tpl_vars['MODULE']->value);?>
 :
											<li><?php echo vtranslate('LBL_LEADS_FIELD_MAPPING_INCOMPLETE',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</li>
											<li><?php echo vtranslate('LBL_MANDATORY_FIELDS_ARE_EMPTY',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</li>
											<?php if ($_smarty_tpl->tpl_vars['EXCEPTION']->value){?>
											<li><?php echo $_smarty_tpl->tpl_vars['EXCEPTION']->value;?>
</li>
											<?php }?>
										</ul>
									</span>
								</span>
							</td>
						</tr>
						<tr>
							<td class='small' align='right' nowrap='nowrap'>
				<?php if ($_smarty_tpl->tpl_vars['CURRENT_USER']->value->isAdminUser()){?>
					<a href='index.php?parent=Settings&module=Leads&view=MappingDetail'><?php echo vtranslate('LBL_LEADS_FIELD_MAPPING',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a><br>
				<?php }?>
					<a href='javascript:window.history.back();'><?php echo vtranslate('LBL_GO_BACK',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</a><br>
				</td>
			</tr>
		</tbody>
		</table>
	</div>
		</td>
	</tr>
		</td>
	</tr>
</table><?php }} ?>