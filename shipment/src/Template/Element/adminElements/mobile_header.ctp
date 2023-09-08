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
		
            </div>
            <!-- END HEADER INNER -->
        </div>
<style>
.sizeLogo{
	height:45px;
	width:110px;
}
</style>
