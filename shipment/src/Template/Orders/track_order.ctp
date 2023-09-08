<div class="page-bar">
	<ul class="page-breadcrumb">
		<li>
			<a href="<?= HTTP_ROOT.'users/dashboard'; ?>">Dashboard</a>
			<i class="fa fa-circle"></i>
		</li>
		<li>
			<span>Track orders</span>
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
						Track order - <?php 
										echo !empty($trackingRecords[0]['descrates_app_id'])?$trackingRecords[0]['descrates_app_id']:@$descrates_app_id;
									  ?>
					</span>
					
                </div>
            </div>  
			<?php if(!empty($trackingRecords)){ ?>
				<div class=" accounts-settings">
					<div class="row">
						<div class="col-md-12">
							<!-- BEGIN EXAMPLE TABLE PORTLET-->
							<div class="portlet light bordered add-btn">
								<div class="portlet-body">
									<div class="ac-1">
										<div class="row">
											<div class="col-sm-12 col-md-12 col-lg-12 track_thumb_details">
												<div class="row">
													<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
														
														<div class="well ">
															
															<h5 class="bold">Shipment dates</h5>
															
															<ul class="list-inline mb-0">
																<li>
																	Pick up date
																</li>
																<li class="pull-right">
																	
																		<?php 
																		echo !empty($trackingRecords[0]['pickup_date'])?(date('M jS, Y', strtotime($trackingRecords[0]['pickup_date']))):"";
																		?>
																	
																</li>
															</ul>
															<ul class="list-inline mb-0">
																
																<li>
																	Drop off date
																</li>
																<li class="pull-right">
																	
																	<?php 
																		echo !empty($trackingRecords[0]['drop_off_date'])?(date('M jS, Y', strtotime($trackingRecords[0]['drop_off_date']))):"";
																	?>
																	
																</li>
															</ul>
															
														</div>
													</div>
													<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
														
														<div class="well ">
															<h5 class="bold">Source</h5>
															<p>
															<?php 
																echo !empty($trackingRecords[0]['source'])?$trackingRecords[0]['source']:"";
															?>
															</p>
														</div>
														
													</div>
													
													<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
														<div class="well ">
															
															<h5 class="bold">Destination</h5>
															<p>
															<?php 
																echo !empty($trackingRecords[0]['destination'])?$trackingRecords[0]['destination']:"";
															?>
															</p>
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
						
						<?php if(!empty($trackingRecords[0]['order_packages'])){ ?>
						<div class="col-md-12">
							<!-- BEGIN EXAMPLE TABLE PORTLET-->
							<div class="portlet light bordered add-btn">
								<div class="portlet-title">
									<h4> Package information
									  </h4>
									<div class="tools"></div>
								</div>
								<div class="portlet-body">
									
									<div class="row">
										<div class="col-md-12 col-sm-12 col-xs-12">
											<div class="table-scrollable">
												<table class="table table-bordered table-hover">
													<thead>
														<tr>
															<th> Sr. no </th>
															<th> Package title </th>
															<th> Package number </th>
															<th> Gross weight </th>
															<th> Status </th>
															<th> Track </th>
														</tr>
													</thead>
													<tbody>
														<?php 
														$p=1;
														foreach($trackingRecords[0]['order_packages'] as $pkg_val){ ?>
														<tr>
															<td > <?= $p; ?> </td>
															<td> <?= $pkg_val['package_title']; ?> </td>
															<td> <?= $pkg_val['package_number']; ?> </td>
															<td> <?= $pkg_val['gross_weight']." ".$pkg_val['weight_unit']; ?> </td>
															<td> 
																<?php
																switch ($pkg_val['status']) {
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
																			echo ENROUTED;
																			break;	
																}
																?>
															 </td>
															<td>
																<a class="btn btn-outline red btn-sm" href="<?php echo HTTP_ROOT.'orders/track-package/'.@$pkg_val['order_id']."/".$pkg_val['id']; ?>">
																  <i class="fa fa-map-marker"></i> Track package
																</a>
															</td>
														</tr>
														<?php 
														$p++;
														} ?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
									
								</div>
							</div>
									<!-- END EXAMPLE TABLE PORTLET-->
						</div>
						<?php } ?>
						
						<div class="col-md-12">
							<!-- BEGIN EXAMPLE TABLE PORTLET-->
							<div class="portlet light bordered add-btn">
								<div class="portlet-title">
									<h4> Order information
									  </h4>
									<div class="tools"></div>
								</div>
								<div class="portlet-body">
									
									<div class="row">
										
										<div class="col-md-6 col-sm-6 col-xs-12">
											<!-- BEGIN EXAMPLE TABLE PORTLET-->
											
											<table class="table  table-bordered  dt-responsive dataTable no-footer dtr-column collapsed" role="grid" aria-describedby="sample_2_info" style="width: 100%;" width="100%">
												<tbody>
													
														<tr role="row" class="odd">
															<td class="text-center">Transaction id</td>
															<td class="text-center">
																<?php echo $trackingRecords[0]['transaction_id']; ?>
															</td>
														</tr>
														
														<tr role="row" class="even">
															<td class="text-center">Shipment type</td>
															<td class="text-center">
																<?php echo $trackingRecords[0]['shipment_type']; ?>
															</td>
														</tr>
														
														<tr role="row" class="odd">
															<td class="text-center">House bill number</td>
															<td class="text-center">
																<?php echo $trackingRecords[0]['house_bill_number']; ?>
															</td>
														</tr>
														
														<tr role="row" class="even">
															<td class="text-center">Booking number</td>
															<td class="text-center">
																<?php echo $trackingRecords[0]['booking_number']; ?>
															</td>
														</tr>
														
														<tr role="row" class="odd">
															<td class="text-center">Type of service</td>
															<td class="text-center">
																<?php echo $trackingRecords[0]['type_of_service']; ?>
															</td>
														</tr>
														
													
												</tbody>
											</table>
											
											<!-- END EXAMPLE TABLE PORTLET-->
										</div>
										
										<div class="col-md-6 col-sm-6 col-xs-12">
											<!-- BEGIN EXAMPLE TABLE PORTLET-->
											
											<table class="table  table-bordered  dt-responsive dataTable no-footer dtr-column collapsed" role="grid" aria-describedby="sample_2_info" style="width: 100%;" width="100%">
												<tbody>
													
														<tr role="row" class="odd">
															<td class="text-center">Payment method</td>
															<td class="text-center">
																<?php echo $trackingRecords[0]['payment_method']; ?>
															</td>
														</tr>
														
														<tr role="row" class="even">
															<td class="text-center">Transportation method</td>
															<td class="text-center">
																<?php echo $trackingRecords[0]['transportation_method']; ?>
															</td>
														</tr>
														
														<tr role="row" class="odd">
															<td class="text-center">Type of move</td>
															<td class="text-center">
																<?php echo $trackingRecords[0]['type_of_move']; ?>
															</td>
														</tr>
														
														<tr role="row" class="even">
															<td class="text-center">Vessel name</td>
															<td class="text-center">
																<?php echo $trackingRecords[0]['vessel_name']; ?>
															</td>
														</tr>
														
														<tr role="row" class="odd">
															<td class="text-center">Voyage flight number</td>
															<td class="text-center">
																<?php echo $trackingRecords[0]['voyage_flight_number']; ?>
															</td>
														</tr>
														
												</tbody>
											</table>
											
											<!-- END EXAMPLE TABLE PORTLET-->
										</div>
									
									</div>
								</div>
							</div>
									<!-- END EXAMPLE TABLE PORTLET-->
						</div>
						
					</div>
		
				</div>
            <?php }else{ ?>
				<div class=" accounts-settings">
					<div class="row">
						
						<div class="col-md-12">
							
							<!-- BEGIN EXAMPLE TABLE PORTLET-->
							<div class="portlet light bordered add-btn">
								
								<div class="portlet-body">
									
									<div class="ac-1">
										
										<div class="row">
											
											<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
												
												<div class="well ">
													<h5 class="bold">Order in progress, you can not view the tracking details today.</h5>
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
			<?php } ?>
       </div>
       
<!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>

