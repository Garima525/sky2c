<?php /* Smarty version Smarty-3.1.7, created on 2018-01-09 07:18:58
         compiled from "/home/skytwocc/public_html/crm-pawan/includes/runtime/../../layouts/v7/modules/Vtiger/partials/SidebarAppMenu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9565392045a546ce2039745-45470069%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'efc0b89873790f3292d191f2306f1b7c94c5a876' => 
    array (
      0 => '/home/skytwocc/public_html/crm-pawan/includes/runtime/../../layouts/v7/modules/Vtiger/partials/SidebarAppMenu.tpl',
      1 => 1496723290,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9565392045a546ce2039745-45470069',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'DASHBOARD_MODULE_MODEL' => 0,
    'USER_PRIVILEGES_MODEL' => 0,
    'HOME_MODULE_MODEL' => 0,
    'MODULE' => 0,
    'APP_LIST' => 0,
    'APP_NAME' => 0,
    'APP_GROUPED_MENU' => 0,
    'APP_MENU_MODEL' => 0,
    'FIRST_MENU_MODEL' => 0,
    'APP_IMAGE_MAP' => 0,
    'moduleModel' => 0,
    'moduleName' => 0,
    'translatedModuleLabel' => 0,
    'MAILMANAGER_MODULE_MODEL' => 0,
    'DOCUMENTS_MODULE_MODEL' => 0,
    'USER_MODEL' => 0,
    'EMAILTEMPLATES_MODULE_MODEL' => 0,
    'RECYCLEBIN_MODULE_MODEL' => 0,
    'RSS_MODULE_MODEL' => 0,
    'PORTAL_MODULE_MODEL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_5a546ce2150f4',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a546ce2150f4')) {function content_5a546ce2150f4($_smarty_tpl) {?>

<div class="app-menu hide" id="app-menu">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-2 col-xs-2 cursorPointer app-switcher-container">
				<div class="row app-navigator">
					<span id="menu-toggle-action" class="app-icon fa fa-bars"></span>
				</div>
			</div>
		</div>
		<?php $_smarty_tpl->tpl_vars['USER_PRIVILEGES_MODEL'] = new Smarty_variable(Users_Privileges_Model::getCurrentUserPrivilegesModel(), null, 0);?>
		<?php $_smarty_tpl->tpl_vars['HOME_MODULE_MODEL'] = new Smarty_variable(Vtiger_Module_Model::getInstance('Home'), null, 0);?>
		<?php $_smarty_tpl->tpl_vars['DASHBOARD_MODULE_MODEL'] = new Smarty_variable(Vtiger_Module_Model::getInstance('Dashboard'), null, 0);?>
		<div class="app-list row">
			<?php if ($_smarty_tpl->tpl_vars['USER_PRIVILEGES_MODEL']->value->hasModulePermission($_smarty_tpl->tpl_vars['DASHBOARD_MODULE_MODEL']->value->getId())){?>
				<div class="menu-item app-item dropdown-toggle" data-default-url="<?php echo $_smarty_tpl->tpl_vars['HOME_MODULE_MODEL']->value->getDefaultUrl();?>
">
					<div class="menu-items-wrapper">
						<span class="app-icon-list fa fa-dashboard"></span>
						<span class="app-name textOverflowEllipsis"> <?php echo vtranslate('LBL_DASHBOARD',$_smarty_tpl->tpl_vars['MODULE']->value);?>
</span>
					</div>
				</div>
			<?php }?>
			<?php $_smarty_tpl->tpl_vars['APP_GROUPED_MENU'] = new Smarty_variable(Settings_MenuEditor_Module_Model::getAllVisibleModules(), null, 0);?>
			<?php $_smarty_tpl->tpl_vars['APP_LIST'] = new Smarty_variable(Vtiger_MenuStructure_Model::getAppMenuList(), null, 0);?>
			<?php  $_smarty_tpl->tpl_vars['APP_NAME'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['APP_NAME']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['APP_LIST']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['APP_NAME']->key => $_smarty_tpl->tpl_vars['APP_NAME']->value){
$_smarty_tpl->tpl_vars['APP_NAME']->_loop = true;
?>
				<?php if ($_smarty_tpl->tpl_vars['APP_NAME']->value=='ANALYTICS'){?> <?php continue 1?><?php }?>
				<?php if (count($_smarty_tpl->tpl_vars['APP_GROUPED_MENU']->value[$_smarty_tpl->tpl_vars['APP_NAME']->value])>0){?>
					<div class="dropdown app-modules-dropdown-container">
						<?php  $_smarty_tpl->tpl_vars['APP_MENU_MODEL'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['APP_MENU_MODEL']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['APP_GROUPED_MENU']->value[$_smarty_tpl->tpl_vars['APP_NAME']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['APP_MENU_MODEL']->key => $_smarty_tpl->tpl_vars['APP_MENU_MODEL']->value){
$_smarty_tpl->tpl_vars['APP_MENU_MODEL']->_loop = true;
?>
							<?php $_smarty_tpl->tpl_vars['FIRST_MENU_MODEL'] = new Smarty_variable($_smarty_tpl->tpl_vars['APP_MENU_MODEL']->value, null, 0);?>
							<?php if ($_smarty_tpl->tpl_vars['APP_MENU_MODEL']->value){?>
								<?php break 1?>
							<?php }?>
						<?php } ?>
						<div class="menu-item app-item dropdown-toggle app-item-color-<?php echo $_smarty_tpl->tpl_vars['APP_NAME']->value;?>
" data-app-name="<?php echo $_smarty_tpl->tpl_vars['APP_NAME']->value;?>
" id="<?php echo $_smarty_tpl->tpl_vars['APP_NAME']->value;?>
_modules_dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" data-default-url="<?php echo $_smarty_tpl->tpl_vars['FIRST_MENU_MODEL']->value->getDefaultUrl();?>
&app=<?php echo $_smarty_tpl->tpl_vars['APP_NAME']->value;?>
">
							<div class="menu-items-wrapper app-menu-items-wrapper">
								<span class="app-icon-list fa <?php echo $_smarty_tpl->tpl_vars['APP_IMAGE_MAP']->value[$_smarty_tpl->tpl_vars['APP_NAME']->value];?>
"></span>
								<span class="app-name textOverflowEllipsis"> <?php echo vtranslate("LBL_".($_smarty_tpl->tpl_vars['APP_NAME']->value));?>
</span>
								<span class="fa fa-chevron-right pull-right"></span>
							</div>
						</div>
						<ul class="dropdown-menu app-modules-dropdown" aria-labelledby="<?php echo $_smarty_tpl->tpl_vars['APP_NAME']->value;?>
_modules_dropdownMenu">
							<?php  $_smarty_tpl->tpl_vars['moduleModel'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['moduleModel']->_loop = false;
 $_smarty_tpl->tpl_vars['moduleName'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['APP_GROUPED_MENU']->value[$_smarty_tpl->tpl_vars['APP_NAME']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['moduleModel']->key => $_smarty_tpl->tpl_vars['moduleModel']->value){
$_smarty_tpl->tpl_vars['moduleModel']->_loop = true;
 $_smarty_tpl->tpl_vars['moduleName']->value = $_smarty_tpl->tpl_vars['moduleModel']->key;
?>
								<?php $_smarty_tpl->tpl_vars['translatedModuleLabel'] = new Smarty_variable(vtranslate($_smarty_tpl->tpl_vars['moduleModel']->value->get('label'),$_smarty_tpl->tpl_vars['moduleName']->value), null, 0);?>
								<li>
									<a href="<?php echo $_smarty_tpl->tpl_vars['moduleModel']->value->getDefaultUrl();?>
&app=<?php echo $_smarty_tpl->tpl_vars['APP_NAME']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['translatedModuleLabel']->value;?>
">
										<span class="vicon-<?php echo strtolower($_smarty_tpl->tpl_vars['moduleName']->value);?>
 module-icon"></span>
										<span class="module-name textOverflowEllipsis"> <?php echo $_smarty_tpl->tpl_vars['translatedModuleLabel']->value;?>
</span>
									</a>
								</li>
							<?php } ?>
						</ul>
					</div>
				<?php }?>
			<?php } ?>
			<div class="app-list-divider"></div>
			<?php $_smarty_tpl->tpl_vars['MAILMANAGER_MODULE_MODEL'] = new Smarty_variable(Vtiger_Module_Model::getInstance('MailManager'), null, 0);?>
			<?php if ($_smarty_tpl->tpl_vars['USER_PRIVILEGES_MODEL']->value->hasModulePermission($_smarty_tpl->tpl_vars['MAILMANAGER_MODULE_MODEL']->value->getId())){?>
				<div class="menu-item app-item app-item-misc" data-default-url="index.php?module=MailManager&view=List">
					<div class="menu-items-wrapper">
						<span class="app-icon-list fa vicon-mailmanager"></span>
						<span class="app-name textOverflowEllipsis"> <?php echo vtranslate('MailManager');?>
</span>
					</div>
				</div>
			<?php }?>
			<?php $_smarty_tpl->tpl_vars['DOCUMENTS_MODULE_MODEL'] = new Smarty_variable(Vtiger_Module_Model::getInstance('Documents'), null, 0);?>
			<?php if ($_smarty_tpl->tpl_vars['USER_PRIVILEGES_MODEL']->value->hasModulePermission($_smarty_tpl->tpl_vars['DOCUMENTS_MODULE_MODEL']->value->getId())){?>
				<div class="menu-item app-item app-item-misc" data-default-url="index.php?module=Documents&view=List">
					<div class="menu-items-wrapper">
						<span class="app-icon-list fa vicon-documents"></span>
						<span class="app-name textOverflowEllipsis"> <?php echo vtranslate('Documents');?>
</span>
					</div>
				</div>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['USER_MODEL']->value->isAdminUser()){?>
				<?php if (vtlib_isModuleActive('ExtensionStore')){?>
					<div class="menu-item app-item app-item-misc" data-default-url="index.php?module=ExtensionStore&parent=Settings&view=ExtensionStore">
						<div class="menu-items-wrapper">
							<span class="app-icon-list fa fa-shopping-cart"></span>
							<span class="app-name textOverflowEllipsis"> <?php echo vtranslate('LBL_EXTENSION_STORE','Settings:Vtiger');?>
</span>
						</div>
					</div>
				<?php }?>
			<?php }?>
			<div class="dropdown app-modules-dropdown-container dropdown-compact">
				<?php  $_smarty_tpl->tpl_vars['APP_MENU_MODEL'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['APP_MENU_MODEL']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['APP_GROUPED_MENU']->value[$_smarty_tpl->tpl_vars['APP_NAME']->value]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['APP_MENU_MODEL']->key => $_smarty_tpl->tpl_vars['APP_MENU_MODEL']->value){
$_smarty_tpl->tpl_vars['APP_MENU_MODEL']->_loop = true;
?>
					<?php $_smarty_tpl->tpl_vars['FIRST_MENU_MODEL'] = new Smarty_variable($_smarty_tpl->tpl_vars['APP_MENU_MODEL']->value, null, 0);?>
					<?php if ($_smarty_tpl->tpl_vars['APP_MENU_MODEL']->value){?>
						<?php break 1?>
					<?php }?>
				<?php } ?>
				<div class="menu-item app-item dropdown-toggle app-item-misc" data-app-name="TOOLS" id="TOOLS_modules_dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
					<div class="menu-items-wrapper app-menu-items-wrapper">
						<span class="app-icon-list fa fa-ellipsis-h"></span>
						<span class="app-name textOverflowEllipsis"> <?php echo vtranslate("LBL_MORE");?>
</span>
						<span class="fa fa-chevron-right pull-right"></span>
					</div>
				</div>
				<ul class="dropdown-menu app-modules-dropdown dropdown-modules-compact" aria-labelledby="<?php echo $_smarty_tpl->tpl_vars['APP_NAME']->value;?>
_modules_dropdownMenu" data-height="0.34">
					<?php $_smarty_tpl->tpl_vars['EMAILTEMPLATES_MODULE_MODEL'] = new Smarty_variable(Vtiger_Module_Model::getInstance('EmailTemplates'), null, 0);?>
					<?php if ($_smarty_tpl->tpl_vars['EMAILTEMPLATES_MODULE_MODEL']->value&&$_smarty_tpl->tpl_vars['USER_PRIVILEGES_MODEL']->value->hasModulePermission($_smarty_tpl->tpl_vars['EMAILTEMPLATES_MODULE_MODEL']->value->getId())){?>
						<li>
							<a href="<?php echo $_smarty_tpl->tpl_vars['EMAILTEMPLATES_MODULE_MODEL']->value->getDefaultUrl();?>
">
								<span class="fa vicon-emailtemplates module-icon"></span>
								<span class="module-name textOverflowEllipsis"> <?php echo vtranslate($_smarty_tpl->tpl_vars['EMAILTEMPLATES_MODULE_MODEL']->value->getName(),$_smarty_tpl->tpl_vars['EMAILTEMPLATES_MODULE_MODEL']->value->getName());?>
</span>
							</a>
						</li>
					<?php }?>
					<?php $_smarty_tpl->tpl_vars['RECYCLEBIN_MODULE_MODEL'] = new Smarty_variable(Vtiger_Module_Model::getInstance('RecycleBin'), null, 0);?>
					<?php if ($_smarty_tpl->tpl_vars['RECYCLEBIN_MODULE_MODEL']->value&&$_smarty_tpl->tpl_vars['USER_PRIVILEGES_MODEL']->value->hasModulePermission($_smarty_tpl->tpl_vars['RECYCLEBIN_MODULE_MODEL']->value->getId())){?>
						<li>
							<a href="<?php echo $_smarty_tpl->tpl_vars['RECYCLEBIN_MODULE_MODEL']->value->getDefaultUrl();?>
">
								<span class="fa fa-trash module-icon"></span>
								<span class="module-name textOverflowEllipsis"> <?php echo vtranslate('Recycle Bin');?>
</span>
							</a>
						</li>
					<?php }?>
					<?php $_smarty_tpl->tpl_vars['RSS_MODULE_MODEL'] = new Smarty_variable(Vtiger_Module_Model::getInstance('Rss'), null, 0);?>
					<?php if ($_smarty_tpl->tpl_vars['RSS_MODULE_MODEL']->value&&$_smarty_tpl->tpl_vars['USER_PRIVILEGES_MODEL']->value->hasModulePermission($_smarty_tpl->tpl_vars['RSS_MODULE_MODEL']->value->getId())){?>
						<li>
							<a href="index.php?module=Rss&view=List">
								<span class="fa fa-rss module-icon"></span>
								<span class="module-name textOverflowEllipsis"><?php echo vtranslate($_smarty_tpl->tpl_vars['RSS_MODULE_MODEL']->value->getName(),$_smarty_tpl->tpl_vars['RSS_MODULE_MODEL']->value->getName());?>
</span>
							</a>
						</li>
					<?php }?>
					<?php $_smarty_tpl->tpl_vars['PORTAL_MODULE_MODEL'] = new Smarty_variable(Vtiger_Module_Model::getInstance('Portal'), null, 0);?>
					<?php if ($_smarty_tpl->tpl_vars['PORTAL_MODULE_MODEL']->value&&$_smarty_tpl->tpl_vars['USER_PRIVILEGES_MODEL']->value->hasModulePermission($_smarty_tpl->tpl_vars['PORTAL_MODULE_MODEL']->value->getId())){?>
						<li>
							<a href="index.php?module=Portal&view=List">
								<span class="fa fa-desktop module-icon"></span>
								<span class="module-name textOverflowEllipsis"> <?php echo vtranslate('Portal');?>
</span>
							</a>
						</li>
					<?php }?>
				</ul>
			</div>
			<?php if ($_smarty_tpl->tpl_vars['USER_MODEL']->value->isAdminUser()){?>
				<div class="dropdown app-modules-dropdown-container dropdown-compact">
					<div class="menu-item app-item dropdown-toggle app-item-misc" data-app-name="TOOLS" id="TOOLS_modules_dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" data-default-url="<?php if ($_smarty_tpl->tpl_vars['USER_MODEL']->value->isAdminUser()){?>index.php?module=Vtiger&parent=Settings&view=Index<?php }else{ ?>index.php?module=Users&view=Settings<?php }?>">
						<div class="menu-items-wrapper app-menu-items-wrapper">
							<span class="app-icon-list fa fa-cog"></span>
							<span class="app-name textOverflowEllipsis"> <?php echo vtranslate('LBL_SETTINGS','Settings:Vtiger');?>
</span>
							<?php if ($_smarty_tpl->tpl_vars['USER_MODEL']->value->isAdminUser()){?>
								<span class="fa fa-chevron-right pull-right"></span>
							<?php }?>
						</div>
					</div>
					<ul class="dropdown-menu app-modules-dropdown dropdown-modules-compact" aria-labelledby="<?php echo $_smarty_tpl->tpl_vars['APP_NAME']->value;?>
_modules_dropdownMenu" data-height="0.27">
						<li>
							<a href="?module=Vtiger&parent=Settings&view=Index">
								<span class="fa fa-cog module-icon"></span>
								<span class="module-name textOverflowEllipsis"> <?php echo vtranslate('LBL_CRM_SETTINGS','Vtiger');?>
</span>
							</a>
						</li>
						<li>
							<a href="?module=Users&parent=Settings&view=List">
								<span class="fa fa-user module-icon"></span>
								<span class="module-name textOverflowEllipsis"> <?php echo vtranslate('LBL_MANAGE_USERS','Vtiger');?>
</span>
							</a>
						</li>
					</ul>
				</div>
			<?php }?>
		</div>
	</div>
</div>
<?php }} ?>