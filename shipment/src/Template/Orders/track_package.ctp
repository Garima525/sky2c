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
                    <span class="caption-subject bold uppercase"> Track order - 
						<?php 
							echo !empty($trackingRecords[0]['order_packages'][0]['package_number'])?$trackingRecords[0]['order_packages'][0]['package_number']:@$descrates_app_id; 
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
																		/*echo !empty($trackingRecords[0]['pickup_date'])?(date('M jS, Y', strtotime($trackingRecords[0]['pickup_date']))):"";*/
																		?>									
																		<?php 
																			echo $this->Common->dateConvert($trackingRecords[0]['pickup_date'], 'UTC', 'd/m/Y H:i:s', $timeZone, 'M jS, Y');
																		?>								
																</li>
																</ul>
															<ul class="list-inline mb-0">
																
																<li>
																	Drop off date
																</li>
																<li class="pull-right">
																	
																	<?php 
																		/*echo !empty($trackingRecords[0]['drop_off_date'])?(date('M jS, Y', strtotime($trackingRecords[0]['drop_off_date']))):"";*/
																	?>
																	<?php 

																			echo $this->Common->dateConvert($trackingRecords[0]['drop_off_date'], 'UTC', 'd/m/Y H:i:s', $timeZone, 'M jS, Y');
																		?>	
																	
																</li>
															</ul>
															
														</div>
													</div>
													<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
														
														<div class="well ">
															<h5 class="bold">From</h5>
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
						
						<div class="col-md-12">
							<!-- BEGIN EXAMPLE TABLE PORTLET-->
							<div class="portlet light bordered add-btn shipment_detail">
								<div class="portlet-title">
									<h4> Shipment travel history </h4>
									
									<div class="tools">
										<p class="btn btn-outline sbold blue-madison">
											<b>Title</b> <?php echo $trackingRecords[0]['order_packages'][0]['package_title']; ?>
										</p>
										<p class="btn btn-outline sbold blue-madison">
											<b>Weight</b> <?php echo $trackingRecords[0]['order_packages'][0]['gross_weight']." ".$trackingRecords[0]['order_packages'][0]['weight_unit']; ?>
										</p>
									</div>
									<p style="padding: 0px 10px;">All shipment travel activity is displayed in local time for location</p>
								</div>
								<div class="portlet-body">
									<div class="row">
										<div class="col-md-5 col-sm-6 col-xs-12">
											<!-- BEGIN EXAMPLE TABLE PORTLET-->
											
											<?php 
											if(!empty($trackingRecords[0]['order_packages'])){
											?>	
											
											<!--table class="table  table-bordered  dt-responsive dataTable no-footer dtr-column collapsed" role="grid" aria-describedby="sample_2_info">
												<tbody>
													<?php 
													
														$i=1;
														foreach($trackingRecords[0]['order_packages'] as $pkgDet){
															if($i%2==0){
																$class="even";	
															}else{
																$class="odd";
															}
													?>
														<tr role="row" class="<?=$class;?>">
															<td class="text-center">Title</td>
															<td class="text-center"><?php echo $pkgDet['package_title']; ?></td>
														</tr>
														<tr role="row" class="<?=$class;?>">
															<td class="text-center">Weight</td>
															<td class="text-center"><?php echo $pkgDet['gross_weight']." ".$pkgDet['weight_unit']; ?></td>
														</tr>
													<?php 
														$i++;
														}
													 ?>
													
												</tbody>
											</table-->
											<?php }else{ ?>
												<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
													<div class="well ">
														<h5>Package detail not found.</h5>
													</div>
												</div>			
											<?php } ?>
											<!-- END EXAMPLE TABLE PORTLET-->
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12 col-md-8">
												<?php 
												echo $this->element('adminElements/order_tracking/driver');
												
												?>
										</div>
										<div class="col-xs-12 col-md-4">
												<?php 
													if(!empty($trackingRecords[0]['order_tracking'])){
														$img=1;
														foreach($trackingRecords[0]['order_tracking'] as $trackingDet){
															if($trackingDet['status']==4){
																if (!empty($trackingDet['customer_signature'])) { 
																		$signPic = $trackingDet['customer_signature'];
																 }else{
																		$signPic = "prof_photo.png";
																}
															?>	

															<img alt="" class="img-responsive img-thumbnail mt20" src="<?php echo HTTP_ROOT.'img/uploads/'.$signPic; ?>"/>
															<?php
															}
														}
													}
												?>
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

<style>
.mt20{margin-top:20px}
</style>




