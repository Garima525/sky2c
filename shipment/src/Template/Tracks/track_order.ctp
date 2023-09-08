	<div class="container"> 
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<!-- Order Detail -->
			<section class="track_order_detail">
				
				<h2>
				<?php echo @$orderData->descrates_app_id; ?> / 
				<?php 
				
					if($orderData->status == 1){
						echo "Open";
					}else if($orderData->status == 2){
						echo "In-Progress";
					}else if($orderData->status == 3){
						echo "Completed";
					}else{
						echo "Shipped";
					}
				?></h2>
				<h3>Status / Scan details</h3>
				<div class="table-responsive">
					<table class="table-striped table-hovered table">
						<thead>
							<tr>
								<th>Package title</th>
								<th>Package number</th>
								<th>Weight</th>
								<th>Status</th>
								<th></th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<td colspan="6">
									<p>For further details / clarification on the remarks / additional
									instructions please write to us at
									info(at)Sky2c.com</p>
								</td>
							</tr>
						</tfoot>
						<tbody>	
							<?php 
							if(!empty($orderData->order_packages)){
								foreach($orderData->order_packages as $orderVal){
							?>
								<tr>
									<td><?php echo $orderVal->package_title; ?></td>
									<td><?php echo $orderVal->package_number; ?></td>
									<td><?php echo $orderVal->gross_weight." ".$orderVal->weight_unit; ?></td>
									<td>
										<?php 
											if($orderVal->status == 1){
												echo "Open";
											}else if($orderVal->status == 2){
												echo "In-Progress";
											}else if($orderVal->status == 3){
												echo "Completed";
											}else{
												echo "Shipped";
											}
										?>
									</td>
									<td>
										<a class="btn btn-outline red btn-sm" href="<?php echo HTTP_ROOT.'tracks/track-package/'.@base64_encode(convert_uuencode($orderVal->order_id))."/".base64_encode(convert_uuencode($orderVal->id)); ?>">
										  <i class="fa fa-map-marker"></i> Track package
										</a>
									</td>
									
								</tr>						
							<?php	
								}
							}else{
							?>
								<tr>
									<td colspan="5">Packages not found related to this order.</td>
								</tr>						
							<?php
							}
							?>
						</tbody>
					</table>
				</div>
			</section>
			
			</div>
			<?php /*
			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
				<h3 class="pt50">Order information</h3>
				<!-- BEGIN EXAMPLE TABLE PORTLET-->
				<table class="table  table-bordered  dt-responsive dataTable no-footer dtr-column collapsed" role="grid" aria-describedby="sample_2_info" style="width: 100%;" width="100%">
					<tbody>
						
							<tr role="row" class="odd">
								<td >Transaction id</td>
								<td >
									<?php echo $orderData->transaction_id; ?>
								</td>
							</tr>
							
							<tr role="row" class="even">
								<td >Shipment type</td>
								<td >
									<?php echo $orderData->shipment_type; ?>
								</td>
							</tr>
							
							<tr role="row" class="odd">
								<td >House bill number</td>
								<td >
									<?php echo $orderData->house_bill_number; ?>
								</td>
							</tr>
							
							<tr role="row" class="even">
								<td >Booking number</td>
								<td >
									<?php echo $orderData->booking_number; ?>
								</td>
							</tr>
							
							<tr role="row" class="odd">
								<td >Type of service</td>
								<td >
									<?php echo $orderData->type_of_service; ?>
								</td>
							</tr>
							
						
					
						
							<tr role="row" class="odd">
								<td >Payment method</td>
								<td >
									<?php echo $orderData->payment_method; ?>
								</td>
							</tr>
							
							<tr role="row" class="even">
								<td >Transportation method</td>
								<td >
									<?php echo $orderData->transportation_method; ?>
								</td>
							</tr>
							
							<tr role="row" class="odd">
								<td >Type of move</td>
								<td >
									<?php echo $orderData->type_of_move; ?>
								</td>
							</tr>
							
							<tr role="row" class="even">
								<td >Vessel name</td>
								<td >
									<?php echo $orderData->vessel_name; ?>
								</td>
							</tr>
							
							<tr role="row" class="odd">
								<td >Voyage flight number</td>
								<td >
									<?php echo $orderData->voyage_flight_number; ?>
								</td>
							</tr>
							
					</tbody>
				</table>
				
				<!-- END EXAMPLE TABLE PORTLET-->
			</div>
			
			*/?>
		</div>
	
	</div>
	
	
