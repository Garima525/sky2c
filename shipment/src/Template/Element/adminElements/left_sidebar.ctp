<?php $controller = $this->request->params['controller'];
  $action = $this->request->params['action']; ?>  

<div class="page-sidebar-wrapper">
                <!-- BEGIN SIDEBAR -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <div class="page-sidebar navbar-collapse collapse">
                    <!-- BEGIN SIDEBAR MENU -->
                    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                        <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                        <li class="sidebar-toggler-wrapper hide">
                            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                            <div class="sidebar-toggler">
                                <span></span>
                            </div>
                            <!-- END SIDEBAR TOGGLER BUTTON -->
                        </li>
                        <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
                        <li class="sidebar-search-wrapper">
                            <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                            <!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
                            <!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
                            <form action="<?php echo HTTP_ROOT; ?>orders/track-order" class="sidebar-search" id="track_order" method="POST">
                                <a href="javascript:;" class="remove">
                                    <i class="icon-close"></i>
                                </a>
                                <div class="input-group error_tracking">
                                    <input type="text" class="form-control" value="<?php echo isset($descrates_app_id)?$descrates_app_id:''; ?>" autocomplete="off" name='order_id' placeholder="Enter Order Id...">
                                    <span class="input-group-btn">
                                        <!--<a href="javascript:void(0);" onclick="submit_tracking_form();" class="btn"></a>-->
                                        <button class="btn" type="submit"><i class="icon-magnifier"></i></button>
                                    </span>
                                </div>
                                
                            </form>
                            <!-- END RESPONSIVE QUICK SEARCH FORM -->
                        </li>
                        <li class="nav-item <?php if($action=='dashboard') echo 'start active open'; ?>">
                            <a href="<?php echo HTTP_ROOT; ?>users/dashboard" class="nav-link ">
                                        <i class="icon-bar-chart"></i>
                                        <span class="title">Dashboard </span>
                                        <span class="selected"></span>
                                    </a>    
                        </li>
                      
                         <?php if (isset($authUser['role']) && in_array( $authUser['role'], ['1']) ) {
                       
                               if($action == "staffListing" ){
                                    $staffClass = "start active open";    
                                    $staffStyle = "style='display: block'";    
                               }else{
                                    $staffClass = "";  
                                    $staffStyle = "";  
                               }
                        ?>
                        <li class="nav-item  <?= $staffClass; ?>">
                            <a href="<?php echo HTTP_ROOT; ?>users/staff-listing" class="nav-link nav-toggle">
                                <i class="icon-users"></i>
                                <span class="title">Sky2c staff</span>
                                <!--<span class="arrow <?= $staffClass; ?>"></span>-->
                                        <span class="selected"></span>
                            </a>
                            <!--<ul class="sub-menu"  <?= $staffStyle; ?> >
                                <li class="nav-item  ">
                                    <a href="<?php echo HTTP_ROOT; ?>users/staff-listing" class="nav-link ">
                                        <span class="title">Listing</span>
                                    </a>
                                </li>
                            </ul>-->
                        </li>
                        <?php }
                        if (isset($authUser['role']) && in_array( $authUser['role'], ['1', '2']) ) { 
                               if($action == "agentsListing"){
                                    $agentClass = "start active open";    
                                    $agentStyle = "style='display: block'";    
                               }else{
                                    $agentClass = "";  
                                    $agentStyle = "";  
                               }
                        ?>
                        <li class="nav-item <?= $agentClass; ?>">
                            <a href="<?php echo HTTP_ROOT; ?>users/agents-listing" class="nav-link nav-toggle">
                                <i class="fa fa-user-secret"></i>
                                <span class="title">Agents</span>
                                        <span class="selected"></span>
                                <!--<span class="arrow"></span>-->
                            </a>
                            <!--<ul class="sub-menu" <?= $agentStyle; ?> >
                                <li class="nav-item  ">
                                    <a href="<?php echo HTTP_ROOT; ?>users/agents-listing" class="nav-link ">
                                        <span class="title">Listing</span>
                                    </a>
                                </li>
                            </ul>-->
                        </li>
                        <?php }
                        if (isset($authUser['role']) && in_array( $authUser['role'], ['1', '2','3']) ) { 
                               if($action == "driversListing"){
                                    $driverClass = "start active open";    
                                    $driverStyle = "style='display: block'";    
                               }else{
                                    $driverClass = "";  
                                    $driverStyle = "";  
                               }
                        ?>
                        <li class="nav-item <?= $driverClass; ?>">
                            <a href="<?php echo HTTP_ROOT; ?>users/drivers-listing"  class="nav-link nav-toggle">
                                <i class="fa fa-automobile"></i>
                                <span class="title">Drivers</span>
                                <span class="selected"></span>
                                
                            </a>
                           
                        </li>
                       
                        <?php }
                        ?>
                         <?php  
                         
                         
                        if (isset($authUser['role']) && in_array( $authUser['role'], ['4']) ) { 
						
						 if(in_array( $action, ['driverCertificates','addDriverCertificate','editDriverCertificate'])){
                                    $driverCertificatesClass = "start active open";    
                                    $driverCertificatesStyle = "style='display: block'";    
                               }else{
                                    $driverCertificatesClass = "";  
                                    $driverCertificatesClass = "";  
                               }
						?>
                      
                         <li class="nav-item <?= $driverCertificatesClass; ?>">
                            <a href="<?php echo HTTP_ROOT; ?>users/driver-certificates" class="nav-link nav-toggle">
                                <i class="fa fa-certificate"></i>
                                <span class="title">Certificates</span>
                                <span class="selected"></span>
                               
                            </a>
                           
                        </li>
                        <?php }
                           if (isset($authUser['role']) && in_array( $authUser['role'], ['1', '2','3','4']) ) {
							  
							   if(in_array( $action, ['openOrders', 'assignedOrders','completedOrders','newOrders','rejectedOrders','openOrderDetail','openOrderDetail','assignedOrderDetail','completedOrderDetail','packageDetail','newOrderDetailDriver','rejectedOrderDetailDriver','completedOrderDetailDriver','enroutedOrders'])){
                                    $orderClass = "start active open";    
                                    $orderStyle = "style='display: block'";    
                               }else{
                                    $orderClass = "";  
                                    $orderStyle = "";  
                               }
                        ?>
                         <li class="nav-item <?= $orderClass; ?>">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="fa fa-shopping-cart"></i>
                                <span class="title">Orders</span>
                                <span class="arrow <?= $orderClass; ?> "></span>
                                        <span class="selected"></span>
                            </a>
                            <ul class="sub-menu" <?= $orderStyle; ?> >
                                <?php if (isset($authUser['role']) && in_array( $authUser['role'], ['4']) ) {/* ?>
                                <li class="nav-item <?php if($action=='newOrders'){echo "active"; } ?>">
                                    <a href="<?php echo HTTP_ROOT; ?>orders/new-orders" class="nav-link ">
                                        <span class="title">New orders</span>
                                    </a>
                                </li>
                                <?php */} ?> 
                                <li class="nav-item <?php if($action=='openOrders'){echo "active"; } ?>">
                                    <a href="<?php echo HTTP_ROOT; ?>orders/open-orders" class="nav-link ">
                                        <span class="title">Open orders</span>
                                    </a>
                                </li>
								
                                <?php if (isset($authUser['role']) && in_array( $authUser['role'], ['1', '2','3']) ) { ?>
                                <li class="nav-item <?php if($action=='assignedOrders'){echo "active"; } ?>">
                                    <a href="<?php echo HTTP_ROOT; ?>orders/assigned-orders" class="nav-link ">
                                        <span class="title">Assigned orders</span>
                                    </a>
                                </li>
                                <?php } ?>

								<?php if (isset($authUser['role']) && in_array( $authUser['role'], ['1', '2']) ) { ?>
                                <li class="nav-item <?php if($action=='enroutedOrders'){echo "active"; } ?>">
                                    <a href="<?php echo HTTP_ROOT; ?>orders/enrouted-orders" class="nav-link ">
                                        <span class="title">Enrouted orders</span>
                                    </a>
                                </li>
                                <?php } ?>

                                <li class="nav-item <?php if($action=='completedOrders'){echo "active"; } ?>">
                                    <a href="<?php echo HTTP_ROOT; ?>orders/completed-orders" class="nav-link ">
                                        <span class="title">Completed orders</span>
                                    </a>
                                </li>
                                <?php if (isset($authUser['role']) && in_array( $authUser['role'], ['4']) ) { ?>
                                <li class="nav-item <?php if($action=='rejectedOrders'){echo "active"; } ?>">
                                    <a href="<?php echo HTTP_ROOT; ?>orders/rejected-orders" class="nav-link ">
                                        <span class="title">Rejected orders</span>
                                    </a>
                                </li>
                                <?php } ?> 
                            </ul>
                        </li>
                         <?php } 

                          if (isset($authUser['role']) && in_array( $authUser['role'], ['1']) ) { 
                               if($action == "emailTemplates" || $action == "emailTemplateEdit" || $action == "cmsPages" || $action == "cmsPagesEdit" || $action == "shippingCarriers" || $action == "addShippingCarrier" || $action == "editShippingCarrier"){
                                    $emailClass = "start active open";    
                                    $emailStyle = "style='display: block'";    
                               }else{
                                    $emailClass = "";  
                                    $emailStyle = "";  
                               }
                               
                               if($action == "importOrders"){
                                    $importClass = "active";    
                               }else{
                                    $importClass = "";  
                               }
                        ?>
						
                         
                         <li class="nav-item <?= $emailClass; ?>">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="fa fa-cog"></i>
                                <span class="title">CMS</span>
                                <span class="arrow <?= $emailClass; ?> "></span>
                                        <span class="selected"></span>
                            </a>
                            <ul class="sub-menu" <?= $emailStyle; ?> >
                                <li class="nav-item  <?php if($action=='emailTemplateEdit' || $action=='emailTemplates'){echo "active"; } ?>">
                                    <a href="<?php echo HTTP_ROOT; ?>cmspages/email-templates" class="nav-link ">
                                        <i class="fa fa-envelope-o"></i> <span class="title">Email template</span>
                                    </a>
                                </li>
                                <li class="nav-item <?php if($action=='cmsPages' || $action=='cmsPagesEdit'){echo "active"; } ?>">
                                    <a href="<?php echo HTTP_ROOT; ?>cmspages/cms-pages" class="nav-link ">
                                        <i class="icon-layers"></i> <span class="title">Page management</span>
                                    </a>
                                </li>
                                <!--
                                <li class="nav-item <?php if($action == "shippingCarriers" || $action == "addShippingCarrier" || $action == "editShippingCarrier"){echo "active"; } ?>">
                                    <a href="<?php echo HTTP_ROOT; ?>cmspages/shipping-carriers" class="nav-link ">
                                        <i class="fa fa-truck"></i> <span class="title">Shipping carrier management</span>
                                    </a>
                                </li>-->
                            </ul>
                        </li>
                         
                        <li class="nav-item <?= $importClass; ?>">
                            <a href="<?php echo HTTP_ROOT; ?>orders/import-orders" class="nav-link nav-toggle">
                                <i class="fa fa-arrow-down"></i>
                                <span class="title">Import orders</span>
                                        <span class="selected"></span>
                               
                            </a>
                         </li>
                                                 
                         <?php } 

                        if (isset($authUser['role']) && in_array( $authUser['role'], ['2','1']) ) {
                            if($action == "customersListing"){
                                $customerClass = "active";    
                            }else{
                                $customerClass = "";  
                            }
                         ?>
                         <li class="nav-item <?= $customerClass; ?>">
                            <a href="<?php echo HTTP_ROOT; ?>users/customers-listing" class="nav-link nav-toggle">
                                <i class="fa fa-users"></i>
                                <span class="title">Customers</span>
                                        <span class="selected"></span>
                               
                            </a>
                         </li>
                         <?php } 
                         
                         /*ORDER HISTORY OF CLIENT START*/
                           if (isset($authUser['role']) && in_array( $authUser['role'], ['5']) ) {
							  
							   if(in_array( @$order_status, ['open-orders','inprogress-orders','completed-orders'])){
                                    $orderHistoryClass = "start active open";    
                                    $orderHistoryStyle = "style='display: block'";    
                               }else{
                                    $orderHistoryClass = "";  
                                    $orderHistoryStyle = "";  
                               }
                        ?>
                         <li class="nav-item <?= $orderHistoryClass; ?>">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="fa fa-shopping-cart"></i>
                                <span class="title">Orders History</span>
                                <span class="arrow <?= $orderHistoryClass; ?> "></span>
                                        <span class="selected"></span>
                            </a>
                            <ul class="sub-menu" <?= $orderHistoryStyle; ?> >
                                <li class="nav-item <?php if(@$order_status=='open-orders'){echo "active"; } ?>">
                                    <a href="<?php echo HTTP_ROOT; ?>orders/orders-history/open-orders" class="nav-link ">
                                        <span class="title">Open orders</span>
                                    </a>
                                </li>
								                               
                                <li class="nav-item <?php if(@$order_status=='inprogress-orders'){echo "active"; } ?>">
                                    <a href="<?php echo HTTP_ROOT; ?>orders/orders-history/inprogress-orders" class="nav-link ">
                                        <span class="title">In-Progress orders</span>
                                    </a>
                                </li>
                              
                                <li class="nav-item <?php if(@$order_status=='completed-orders'){echo "active"; } ?>">
                                    <a href="<?php echo HTTP_ROOT; ?>orders/orders-history/completed-orders" class="nav-link ">
                                        <span class="title">Completed orders</span>
                                    </a>
                                </li>
                                
                            </ul>
                        </li>
                         <?php }  /*ORDER HISTORY OF CLIENT END*/?>
                         
                         <?php 

                            if (isset($authUser['role']) && !(in_array( $authUser['role'], ['5'])) ) {
    							if($action == "generateQrCode"){
    								$qrClass = "active";    
    							}else{
    								$qrClass = "";  
    							}
                         ?>
                                 <li class="nav-item <?= $qrClass; ?>">
                                    <a href="<?php echo HTTP_ROOT; ?>orders/generate-qr-code" class="nav-link nav-toggle">
                                        <i class="fa fa-barcode"></i>
                                        <span class="title">Generate QR Code</span><span class="selected"></span>
                                    </a>
                                 </li>
                        <?php
                            }
                        ?>
                        
                         
                    </ul>
                    <!-- END SIDEBAR MENU -->
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>
<style>
ul.sub-menu li.active {
  background: #397fae none repeat scroll 0 0 !important;
}
#order_id-error {
  color: yellow;
  font-size: 12px;
}
</style>
