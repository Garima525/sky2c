<div class="page-bar">
		<ul class="page-breadcrumb">
			<li>
				<a href="<?= HTTP_ROOT.'users/dashboard'; ?>">Dashboard</a>
				<i class="fa fa-circle"></i>
			</li>
			<li>
				 <a href="javascript:void(0)" onclick="window.history.go(-1); return false;" >Orders</a>
				<i class="fa fa-circle"></i>
			</li>
			 <li>
				<span>Package detail</span>
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
                    <span class="caption-subject bold uppercase"> Package detail</span>
                </div>
				<h4 class=" text-primary mt-0">
					<b>ID - <span><?= @$package->package_number ?></span></b>
				</h4>
            </div> 

			<div class="portlet-body form">
			<?php //echo "<pre>"; print_r($package); echo "</pre>";?>
                <div class="row">
					<div class="col-md-12">
						<div class="form-body">
                            <div class="row">                                         
								<div class="col-xs-12 col-md-8">

									<!--div class="table-responsive">
										<table class="table table-bordered">

                                            <tbody>
                                                <tr>
                                                    <th>Title</th>
                                                    <td> <?= @$package->package_title; ?> </td>
                                                </tr>
                                                <tr>
                                                   <th>Number</th>
                                                    <td> <?= @$package->package_number ?></td>
                                                </tr>
                                                <tr>
                                                   <th>Qty shipped</th>
                                                    <td> <?= @$package->quantity_shipped ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Equipment initial</th>
                                                    <td> <?= @$package->equipment_initial; ?> </td>
                                                </tr>
                                                <tr>
                                                    <th>Equipment number</th>
                                                    <td> <?= @$package->equipment_number; ?> </td>
                                                </tr>
                                                
                                                <tr>
                                                   <th>Weight</th>
                                                    <td> <?= @$package->gross_weight; ?> <?= @$package->weight_unit; ?></td>
                                                </tr>
                                                <tr>
                                                   
                                                    <th>Status</th>
                                                    <td> <?php
														  if($status !=''){
																echo $status;
														  }else{
															switch (@$package->status){
																  case 1:
																	 echo "Open";
																	  break;
																  case 2:
																	  echo  "Assigned";
																	  break;
																  case 3:
																	  echo "Completed";
																	  break;
																   case 4:
																	  echo "En-routed";
																	  break;   
															}
														  }	
                                                         ?>
                                                    </td>
                                                </tr>
                                               <tr>
                                                   <th>Description</th>
                                                    <td> <?= @$package->description; ?> <?= @$package->description; ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                         
                                 </div-->
								
									<div class="well cust-info">
										<p><b>Title:</b> <?= @$package->package_title; ?></p>
										<p><b>Number:</b> <?= @$package->package_number; ?></p>
										<p><b>Qty shipped:</b> <?= @$package->quantity_shipped; ?></p>
										<p><b>Equipment initial:</b> <?= @$package->equipment_initial; ?></p>
										<p><b>Equipment number:</b> <?= @$package->equipment_number; ?></p>
										<p><b>Weight:</b> <?= @$package->gross_weight; ?> <?= @$package->weight_unit; ?></p>
										<p><b>Status:</b> <?php
															  if($status !=''){
																	echo $status;
															  }else{
																switch (@$package->status){
																	  case 1:
																		 echo "Open";
																		  break;
																	  case 2:
																		  echo  "Assigned";
																		  break;
																	  case 3:
																		  echo "Completed";
																		  break;
																	   case 4:
																		  echo "En-routed";
																		  break;   
																}}	?>
										</p>
										<p><b>Description:</b> <?= @$package->description; ?> <?= @$package->description; ?></p>
									
									</div>
																 
								</div>   
							
							<div class="ord-widget">
									<div class="col-sm-12 col-md-4">
										<div class="well cust-info package_detail">
											<?php 
											

                                          if(isset($package->order_assignment_log) && !empty($package->order_assignment_log)){
												if($package->order_assignment_log->shipment_type=='3rdparty'){
													?>
													<h5><i class="fa fa-user-secret"></i> Admin info</h5>
													
														 <?php if(isset($package->order_assignment->assign_agent_detail) && !empty($package->order_assignment->assign_agent_detail)) { ?>
														 <p><b>Name:</b> <?= @$package->order_assignment->assign_agent_detail->name; ?></p>
														 <p><b>Email:</b> <?= @$package->order_assignment->assign_agent_detail->email; ?></p>
														 <p><b>Phone:</b> <?= @$package->order_assignment->assign_agent_detail->phone; ?></p>
																								 
														 
														<?php }else{
																echo "Not assigned yet";
														} ?>
													 
													<?php
												}else{
													?>
													<h5><i class="fa fa-user-secret"></i> Agent info</h5>
														 <?php if(isset($package->order_assignment->assign_agent_detail) && !empty($package->order_assignment->assign_agent_detail)) { ?>
														 <p><b>Name:</b> <?= @$package->order_assignment->assign_agent_detail->name; ?></p>
														 <p><b>Email:</b> <?= @$package->order_assignment->assign_agent_detail->email; ?></p>
														 <p><b>Phone:</b> <?= @$package->order_assignment->assign_agent_detail->phone; ?></p>
																								 
														 
														<?php }else{
																echo "Not assigned yet";
														} ?>
													<?php 	
												}
										  }else{?>
											  <h5><i class="fa fa-user-secret"></i> Agent info</h5>
														 <?php if(isset($package->order_assignment->assign_agent_detail) && !empty($package->order_assignment->assign_agent_detail)) { ?>
														 <p><b>Name:</b> <?= @$package->order_assignment->assign_agent_detail->name; ?></p>
														 <p><b>Email:</b> <?= @$package->order_assignment->assign_agent_detail->email; ?></p>
														 <p><b>Phone:</b> <?= @$package->order_assignment->assign_agent_detail->phone; ?></p>
																								 
														 
														<?php }else{
																echo "Not assigned yet";
														} ?>
										<?php
										}
										  
                                          ?>
                                          
											 
                                          
                                          </div>
                                    </div>
									
								<div class="col-sm-12 col-md-4">
									<div class="well cust-info package_detail">
										<?php 
										if(isset($package->order_assignment_log) && !empty($package->order_assignment_log)){
												if($package->order_assignment_log->shipment_type=='3rdparty'){
													?>
												<h5><i class="fa fa-info-circle"></i> 3rd Party Info</h5>
													 <?php if(isset($package->order_assignment_log->shipping_carrier) && !empty($package->order_assignment_log->shipping_carrier)){ ?>
													 
													<p><b>Carrier Name:</b><?= ucwords(@$package->order_assignment_log->shipping_carrier->carrier_name); ?></p>
													<p><b>Phone:</b> <?= @$package->order_assignment_log->shipping_carrier->country_code; ?> -
													<?= @$package->order_assignment_log->shipping_carrier->phone; ?></p>
													 <?php }else{
															echo "Not assigned yet";
													} ?>
												 </p>
													<?php 
											}else{
											?>
												<h5><i class="fa fa-automobile"></i> Driver info</h5>
													<?php if(isset($package->order_assignment_log->driver_detail) && !empty($package->order_assignment_log->driver_detail)){ ?>
													 
													<p><b>Name:</b> <?= @$package->order_assignment_log->driver_detail->name; ?></p>
													<p><b>Email:</b> <?= @$package->order_assignment_log->driver_detail->email; ?></p>
													<p><b>Phone:</b> <?= @$package->order_assignment_log->driver_detail->phone; ?></p>
													 <?php }else{
															echo "Not assigned yet";
													} ?>
												 </p>
											<?php
											}
										}else {	
										?>
										<h5><i class="fa fa-automobile"></i> Driver info</h5>
											 <p>
												<?php if(isset($package->order_assignment_log->driver_detail) && !empty($package->order_assignment_log->driver_detail)){ ?>
												 
												<p><b>Name:</b> <?= @$package->order_assignment_log->driver_detail->name; ?></p>
												<p><b>Email:</b> <?= @$package->order_assignment_log->driver_detail->email; ?></p>
												<p><b>Phone:</b> <?= @$package->order_assignment_log->driver_detail->phone; ?></p>
												 <?php }else{
														echo "Not assigned yet";
												} ?>
											 </p>
									 <?php } ?> 
									  
									</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
            </div>
       
<!-- END EXAMPLE TABLE PORTLET-->
		</div>
    </div>
</div>

