<script type="text/javascript">var base_url = '<?php echo HTTP_ROOT; ?>';</script>
<?php 
if($this->request->params['action'] != 'index')
{
    $set_filename_csv = $this->request->params['controller']."-".$this->request->params['action'];
}
else
{
    $set_filename_csv = $this->request->params['controller'];
}
?>
<script type="text/javascript"> var set_filename_csv = '<?php echo $set_filename_csv; ?>'</script>

<div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <a href="<?php echo HTTP_ROOT.'users/dashboard';?>">
                    <img height="30" class="logo-default img-responsive" alt="logo" src="<?php echo HTTP_ROOT; ?>/assets/images/logo_inner.png">
				<!-- 	<img class=" sizeLogo logo-default" src="<?php echo HTTP_ROOT.'img/uploads/'.(@$siteinfo->site_logo != ''?@$siteinfo->site_logo:'logo.jpg'); ?>"/> -->
                        <!-- <img src="../assets/layouts/layout/img/logo.png" alt="logo" class="logo-default" /> --> </a>
                    <div class="menu-toggler sidebar-toggler">
                        <span></span>
                    </div>
                </div>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                    <span></span>
                </a>
				
                <!-- END RESPONSIVE MENU TOGGLER -->
                <!-- BEGIN TOP NAVIGATION MENU -->
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                        <!-- BEGIN NOTIFICATION DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
						<?php echo $notification; ?>
                        <!-- END NOTIFICATION DROPDOWN -->
                        <!-- BEGIN INBOX DROPDOWN -->
                        <!-- BEGIN USER LOGIN DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        <li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <?php if (isset($authUser['profile_image']) && !empty($authUser['profile_image'])) { 
                                            $imagePic = $authUser['profile_image'];
                                      }else{
                                            $imagePic = "prof_photo.png";
                                      }
                                    
                                ?>
							<img alt="" class="img-circle" src="<?php echo HTTP_ROOT.'img/uploads/'.$imagePic; ?>"/>
                              	<?php 
                              	if($authUser['role']==1){
									$userRole = "Administrator";
								}else if($authUser['role']==2){
									$userRole = "Sky2c staff";
								}else if($authUser['role']==3){
									$userRole = "Agent";
								}else if($authUser['role']==4){
									$userRole = "Driver";
								}else if($authUser['role']==5){
									$userRole = "Customer";
								}else{
								
								}
                              	?>						
                                <span class="username username-hide-on-mobile"><?php  echo ucfirst($authUser['name']) ;?> (<?=$userRole; ?>)</span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                                <!--  <li>
                                <li>
                                    <a href="<?php echo HTTP_ROOT."Users/admin-edit"; ?>">
                                        <i class="icon-user"></i> My Profile </a>
                                </li>
                                    <a href="app_calendar.html">
                                        <i class="icon-calendar"></i> My Calendar </a>
                                </li>
                                <li>
                                    <a href="app_inbox.html">
                                        <i class="icon-envelope-open"></i> My Inbox
                                        <span class="badge badge-danger"> 3 </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="app_todo.html">
                                        <i class="icon-rocket"></i> My Tasks
                                        <span class="badge badge-success"> 7 </span>
                                    </a>
                                </li>
                                <li class="divider"> </li>
                                <li>
                                    <a href="page_user_lock_1.html">
                                        <i class="icon-lock"></i> Lock Screen </a>
                                </li>
                                base64_encode(convert_uuencode($authUser['id'])) -->
								<li>
                                    <a target="_blank" href="<?php echo HTTP_ROOT;?>">
                                        <i class="fa fa-eye"></i> View website</a>
                                </li> 
                                
                                <li>
                                    <a href="<?php echo HTTP_ROOT.'users/edit-profile/';?>">
                                        <i class="fa fa-user"></i> Edit profile</a>
                                </li> 
                                <li>
                                    <a href="<?php echo HTTP_ROOT.'users/change-password/dashboard/'.base64_encode(convert_uuencode($authUser['id']));?>">
                                        <i class="fa fa-unlock-alt"></i> Change password</a>
                                </li>
                               <?php if (isset($authUser['role']) && in_array( $authUser['role'], ['4']) ) { ?>
                                <li>
                                    <a href="<?php echo HTTP_ROOT.'users/driver-certificates';?>">
                                        <i class="fa fa-certificate"></i>Certificates</a>
                                </li>
                               <?php } ?>
                               
                               <?php /*if (isset($authUser['role']) && in_array( $authUser['role'], ['5']) ) { ?>
                                <li>
                                    <a href="<?php echo HTTP_ROOT.'users/user-settings';?>">
                                        <i class="fa fa-gears"></i> Settings</a>
                                </li>
                               <?php } */?>
                               
                               
                                <?php if (isset($authUser['role']) && in_array( $authUser['role'], ['1']) ) { ?>
                                <li>
                                    <a href="<?php echo HTTP_ROOT.'users/website-settings';?>">
                                        <i class="fa fa-gears"></i> Settings</a>
                                </li>
                               <?php } ?>
                               
                                <li>
                                    <a href="<?php echo HTTP_ROOT.'users/logout';?>">
                                        <i class="fa fa-sign-out"></i> Log out </a>
                                </li>
                            </ul>
                        </li>
                        <!-- END USER LOGIN DROPDOWN -->
                        <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        <li class="dropdown dropdown-quick-sidebar-toggler" style='display:none;'>
                            <a href="javascript:;" class="dropdown-toggle">
                                <i class="icon-logout"></i>
                            </a>
                        </li>
                        <!-- END QUICK SIDEBAR TOGGLER -->
                    </ul>
                </div>
                <!-- END TOP NAVIGATION MENU -->
            </div>
            <!-- END HEADER INNER -->
        </div>
<style>
.sizeLogo{
	height:45px;
	width:110px;
}
</style>
