	<div class="container"> 
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<!-- Order Detail -->
			<section class="track_order_detail">
				
				<h2>
				<?php
 					if(!empty($orderPackageDetail)){
						foreach($orderPackageDetail as $orderVal){
							echo $orderVal->package_number." / ";
							if($orderVal->status == 1){
								echo "Open";
							}else if($orderVal->status == 2){
								echo "In-Progress";
							}else if($orderVal->status == 3){
								echo "Completed";
							}else{
								echo "Shipped";
							}
						}
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
							if(!empty($orderPackageDetail)){
								foreach($orderPackageDetail as $orderVal){
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
			
			<section class="track_order_detail mt30">
				<h2>
				<?php 
					if(!empty($orderPackageDetail)){
						foreach($orderPackageDetail as $orderVal){
							echo $orderVal->package_number." / ";
							if($orderVal->status == 1){
								echo "Open";
							}else if($orderVal->status == 2){
								echo "In-Progress";
							}else if($orderVal->status == 3){
								echo "Completed";
							}else{
								echo "Shipped";
							}
						}
					}
				?>
				</h2>
				<h3>Package no / Status</h3>
				<div class="table-responsive">
					<table class="table-striped table-hovered table">
						<thead>
							<tr>
								<th>Type</th>
								<th>Container</th>
								<th>Date</th>
								<th>Time</th>								
								<th>Location</th>
								<th>Code</th>
								<th>Status/Comment</th>
							
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
								if(!empty($trackingRecords[0]['order_tracking'])){
								
								
									$j=1;
									foreach($trackingRecords[0]['order_tracking'] as $trackingDet){
										if($j%2==0){
											$class="even";	
										}else{
											$class="odd";
										}
										$columnStatus = '';
										if($trackingDet['status']==4){
											$columnStatus = 'track_process_completed';
										}else if($trackingDet['status']==3){
											$columnStatus = 'track_underprocess';
										}
								?>		
							<?php if($trackingDet['third_party_status'] ==''){ ?>					  
								
							<tr>
								<td><?php echo $orderData['transportation_method'];?></td>
								<td><?php echo $trackingDet['container_number'];?></td>
								<td>
									<?php
										if(!empty($trackingDet['third_party_status_date'])){
											//echo date('M jS, Y', strtotime($trackingDet['third_party_status_date']));
											echo $this->Common->dateConvert($trackingDet['third_party_status_date'], 'UTC', 'd/m/Y H:i:s', $timeZone, 'M jS, Y');
										}
									?>
								</td>
								<td>
									<?php
										if(!empty($trackingDet['third_party_status_date'])){
											//echo date('g:i A', strtotime($trackingDet['third_party_status_date']));
											echo $this->Common->dateConvert($trackingDet['third_party_status_date'], 'UTC', 'd/m/Y H:i:s', $timeZone, 'g:i A');
										}
									?>
								</td>								
								<td><?php echo (!empty($trackingDet['city']))?$trackingDet['city']." -":""; ?> <?php echo (!empty($trackingDet['zip']))?$trackingDet['zip'].", ":""; ?><?php echo (!empty($trackingDet['state']))?$trackingDet['state'].", ":""; ?>  <?php echo (!empty($trackingDet['country']))?$trackingDet['country']:""; ?></td>
								<td><?php echo (!empty($trackingDet['tracking_description']))?$trackingDet['tracking_description']:"---"; ?></td>
								<td>Sky2c</td>
								
							</tr>
							
							<?php }else{ ?>
							
							<tr>
								<td><?php echo $orderData['transportation_method'];?></td>
								<td><?php echo $trackingDet['container_number'];?></td>
								<td>
									<?php
										if(!empty($trackingDet['third_party_status_date'])){
											//echo date('M jS, Y', strtotime($trackingDet['third_party_status_date']));
											echo $this->Common->dateConvert($trackingDet['third_party_status_date'], 'UTC', 'd/m/Y H:i:s', $timeZone, 'M jS, Y');
										}
									?>
								</td>	
								<td>
									<?php
										if(!empty($trackingDet['third_party_status_date'])){
											//echo date('g:i A', strtotime($trackingDet['third_party_status_date']));
											echo $this->Common->dateConvert($trackingDet['third_party_status_date'], 'UTC', 'd/m/Y H:i:s', $timeZone, 'g:i A');
										}
									?>
								</td>								
								<td><?php echo (!empty($trackingDet['location']))?$trackingDet['location']:""; ?></td>
								<td><?php
						echo !empty($trackingDet['carrier'])?ucwords($trackingDet['carrier']):"";
						?></td>
								<td><?php echo (!empty($trackingDet['third_party_status']))?$trackingDet['third_party_status']:"---"; ?></td>
							</tr>
							
							<?php } ?>		
							<?php 
								$j++;
								}
							 }else{
							 ?>	
									<tr>
										<td colspan="4">Order in progress, you can not view the tracking details today.</td>
									</tr>
							 <?php		
							 }
							 ?>
						  
						</tbody>
					</table>
				</div>
			</section>
			</div>
			
		</div>
	
	</div>
	
	
