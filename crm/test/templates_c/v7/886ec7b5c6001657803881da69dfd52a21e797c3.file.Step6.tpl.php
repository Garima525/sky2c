<?php /* Smarty version Smarty-3.1.7, created on 2017-09-16 06:38:50
         compiled from "/home/checkcrm/public_html/vtiger/includes/runtime/../../layouts/v7/modules/Install/Step6.tpl" */ ?>
<?php /*%%SmartyHeaderCode:24615633059bcb8eab62832-60506772%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '886ec7b5c6001657803881da69dfd52a21e797c3' => 
    array (
      0 => '/home/checkcrm/public_html/vtiger/includes/runtime/../../layouts/v7/modules/Install/Step6.tpl',
      1 => 1496723290,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24615633059bcb8eab62832-60506772',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'AUTH_KEY' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_59bcb8eab883f',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_59bcb8eab883f')) {function content_59bcb8eab883f($_smarty_tpl) {?>

<form class="form-horizontal" name="step6" method="post" action="index.php">
	<input type=hidden name="module" value="Install" />
	<input type=hidden name="view" value="Index" />
	<input type=hidden name="mode" value="Step7" />
	<input type=hidden name="auth_key" value="<?php echo $_smarty_tpl->tpl_vars['AUTH_KEY']->value;?>
" />

	<div class="row main-container">
		<div class="inner-container">
			<div class="row">
				<div class="col-sm-10">
					<h4><?php echo vtranslate('LBL_ONE_LAST_THING','Install');?>
</h4>
				</div>
				<div class="col-sm-2">
					<a href="https://wiki.vtiger.com/vtiger6/" target="_blank" class="pull-right">
						<img src="<?php echo vimage_path('help.png');?>
" alt="Help-Icon"/>
					</a>
				</div>
			</div>
			<hr>
			<div class="offset2 row">
				<div class="col-sm-2"></div>
				<div class="col-sm-8">
					<table class="config-table input-table">
						<tbody>
							<tr>
								<td><strong>Please let us know your Industry</strong> <span class="no">*</span></td>
								<td>
									<select name="industry" class="select2" required="true" style="width:250px;" placeholder="Choose one...">
										<option>Accounting</option>
										<option>Advertising</option>
										<option>Agriculture</option>
										<option>Apparel &amp; Accessories</option>
										<option>Automotive</option>
										<option>Banking &amp; Financial Services</option>
										<option>Biotechnology</option>
										<option>Call Centers</option>
										<option>Careers/Employment</option>
										<option>Chemical</option>
										<option>Computer Hardware</option>
										<option>Computer Software</option>
										<option>Consulting</option>
										<option>Construction</option>
										<option>Education</option>
										<option>Energy Services</option>
										<option>Engineering</option>
										<option>Entertainment</option>
										<option>Financial</option>
										<option>Food &amp; Food Service</option>
										<option>Government</option>
										<option>Health care</option>
										<option>Insurance</option>
										<option>Legal</option>
										<option>Logistics</option>
										<option>Manufacturing</option>
										<option>Media &amp; Production</option>
										<option>Non-profit</option>
										<option>Pharmaceutical</option>
										<option>Real Estate</option>
										<option>Rental</option>
										<option>Retail &amp; Wholesale</option>
										<option>Security</option>
										<option>Service</option>
										<option>Sports</option>
										<option>Telecommunications</option>
										<option>Transportation</option>
										<option>Travel &amp; Tourism</option>
										<option>Utilities</option>
										<option>Other</option>
									</select>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									We collect anonymous information (Country, OS) 
									to help us improve future versions of Vtiger. 
									Data about how CRM is used and where it is being used helps 
									us identify the areas in the product that need to be enhanced. 
									We use this data to improve your experience with Vtiger. 
									None of the data collected here can be linked back to an individual.
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="row offset2">
				<div class="col-sm-2"></div>
				<div class="col-sm-8">
					<div class="button-container">
						<input type="button" class="btn btn-large btn-primary" value="<?php echo vtranslate('LBL_NEXT','Install');?>
" name="step7"/>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
<div id="progressIndicator" class="row main-container hide">
	<div class="inner-container">
		<div class="inner-container">
			<div class="row">
				<div class="col-sm-12 welcome-div alignCenter">
					<h3><?php echo vtranslate('LBL_INSTALLATION_IN_PROGRESS','Install');?>
...</h3><br>
					<img src="<?php echo vimage_path('install_loading.gif');?>
"/>
					<h6><?php echo vtranslate('LBL_PLEASE_WAIT','Install');?>
.... </h6>
				</div>
			</div>
		</div>
	</div>
</div><?php }} ?>