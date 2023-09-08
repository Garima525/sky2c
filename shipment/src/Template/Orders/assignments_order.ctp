<div class="loaderImage"></div>
<div class="page-bar">
	<ul class="page-breadcrumb">
		<li>
			<a href="<?= HTTP_ROOT.'users/dashboard'; ?>">Dashboard</a>
			<i class="fa fa-circle"></i>
		</li>
		<li>
			<span>Order Assignment</span>
		</li>
	</ul>
</div>

<!-- END PAGE HEADER-->

<div class="row">

    <div class="col-md-12">

      <!-- BEGIN EXAMPLE TABLE PORTLET-->

        <div class="portlet light bordered">   
            <div class="portlet-title">
                <div class="caption font-dark">
                    <i class="fa fa-shopping-cart"></i>
                    
                    <span class="caption-subject bold uppercase"> 
						Order Assignment - <?php echo $descrates_app_id; ?>
					</span>
					
                </div>
            </div>  
            			
			<div class=" accounts-settings">
				<div class="row">						
					
					<div class="col-md-12">
						<!-- BEGIN EXAMPLE TABLE PORTLET-->
						<div class="portlet light bordered add-btn">
							<div class="portlet-title">
								<h4> Assignments
								  </h4>
								<div class="tools">
									<a class="btn btn-outline red btn-sm cancelOrder" href="javascript:void(0)" data-href="<?php echo HTTP_ROOT.'orders/cancel-order/'.$orderID.'/'.$pkgID.'/'; ?>" data-redirect="<?php echo HTTP_ROOT.'orders/open-orders/'; ?>">
										Cancel Order
									</a>
								</div>
							</div>
							<div class="portlet-body">
								
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="table-scrollable">
											<table class="table table-bordered table-hover">
												<thead>
													<tr>
														<th> Sr. no </th>
														<th> Assigned By </th>
														<th> Assigned To </th>
														<th> Source </th>
														<th> Destination </th>	
													</tr>
												</thead>
												<tbody>
													<?php 
													$p=1;
													foreach($assignAgentData as $pkg_val){ ?>
													<tr>
														<td > <?= $p; ?> </td>
														<td> <?php echo $this->Common->getUserName($pkg_val['assign_by']); ?> </td>
														<td> <?php echo $this->Common->getUserName($pkg_val['assign_to']); ?> </td>														
														<td> <?= $pkg_val['source']; ?> </td>
														<td> <?= $pkg_val['destination']; ?> </td>	
													</tr>
													<?php  
													$p++;
													}

													foreach($assignDriverData as $pkg_val){ ?>
													<tr>
														<td > <?= $p; ?> </td>
														<td> <?php echo $this->Common->getUserName($pkg_val['assign_by']); ?> </td>
														<td> <?php echo $this->Common->getUserName($pkg_val['assign_to']); ?> </td>	
														<td> <?= $pkg_val['source']; ?> </td>
														<td> <?= $pkg_val['destination']; ?> </td>		
													</tr>
													<?php 
													$p++;
													}

													 ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								
							</div>
						</div>
								<!-- END EXAMPLE TABLE PORTLET-->
					</div>
										
				</div>
	
			</div>
            
       </div>
       
<!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>

