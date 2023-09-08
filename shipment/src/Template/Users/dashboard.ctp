<div class="page-bar">
	<ul class="page-breadcrumb">
		<li>
			<span>Dashboard</span>
		</li>
	</ul>
</div> 

<h3 class="page-title"></h3>
	<!-- end admin details -->
	<!-- END PAGE TITLE-->
	<!-- END PAGE HEADER-->
	<!-- BEGIN DASHBOARD STATS 1-->
		<div class="row">
			
			<?php if (isset($authUser['role']) && in_array( $authUser['role'], ['1','2']) ) { ?>
										
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<a class="dashboard-stat dashboard-stat-v2 blue" href="<?php echo HTTP_ROOT.'users/customers-listing'; ?>">
						<div class="visual">
							<i class="fa fa-users"></i>  
						</div>
						<div class="details">
							<div class="number">
								<span data-counter="counterup" data-value="<?= $usersInfo['customerCount'] ?>">0</span>
							</div>
							<div class="desc"> Customers </div>
						</div>
					</a>
				</div>
				<?php if($authUser['role']==1){?>
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<a class="dashboard-stat dashboard-stat-v2 red" href="<?php echo HTTP_ROOT.'users/staff-listing'; ?>">
						<div class="visual">
							<i class="fa fa-user-secret"></i>
						</div>
						<div class="details">
							<div class="number">
								<span data-counter="counterup" data-value="<?= $usersInfo['staffCount'] ?>">0</span> </div>
							<div class="desc"> Sky2C staff </div>
						</div>
					</a>
				</div>
				<?php } ?>
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<a class="dashboard-stat dashboard-stat-v2 green" href="<?php echo HTTP_ROOT.'orders/completed-orders'; ?>">
						<div class="visual">
						   <i class="fa fa-shopping-cart"></i>
						</div>
						<div class="details">
							<div class="number">
								<span data-counter="counterup" data-value="<?php echo isset($completedOrders)?$completedOrders:0; ?>"><?php echo isset($completedOrders)?$completedOrders:0; ?></span>
							</div>
							<div class="desc"> Order completed </div>
						</div>
					</a>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<a class="dashboard-stat dashboard-stat-v2 purple" href="<?php echo HTTP_ROOT.'orders/open-orders'; ?>">
						<div class="visual">
						   <i class="fa fa-shopping-cart"></i>
						</div>
						<div class="details">
							<div class="number"> 
								<span data-counter="counterup" data-value="<?php echo isset($openOrders)?$openOrders:0; ?>"></span> </div>
							<div class="desc"> Orders un-assigned </div>
						</div>
					</a>
				</div>
			
			<?php } ?>
			<?php if (isset($authUser['role']) && in_array( $authUser['role'], ['3']) ) { ?>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<a class="dashboard-stat dashboard-stat-v2 red" href="<?php echo HTTP_ROOT.'users/drivers-listing'; ?>">
						<div class="visual">
							<i class="fa fa-user-secret"></i>
						</div>
						<div class="details">
							<div class="number">
								<span data-counter="counterup" data-value="<?= $usersInfo['driverCount'] ?>">0</span> </div>
							<div class="desc"> Drivers </div>
						</div>
					</a>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<a class="dashboard-stat dashboard-stat-v2 green" href="<?php echo HTTP_ROOT.'orders/completed-orders'; ?>">
						<div class="visual">
						   <i class="fa fa-shopping-cart"></i>
						</div>
						<div class="details">
							<div class="number">
								<span data-counter="counterup" data-value="<?php echo isset($completedOrders)?$completedOrders:0; ?>"><?php echo isset($completedOrders)?$completedOrders:0; ?></span>
							</div>
							<div class="desc"> Order completed </div>
						</div>
					</a>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<a class="dashboard-stat dashboard-stat-v2 purple" href="<?php echo HTTP_ROOT.'orders/open-orders'; ?>">
						<div class="visual">
						   <i class="fa fa-shopping-cart"></i>
						</div>
						<div class="details">
							<div class="number"> 
								<span data-counter="counterup" data-value="<?php echo isset($openOrders)?$openOrders:0; ?>"></span> </div>
							<div class="desc"> Orders un-assigned </div>
						</div>
					</a>
				</div>
			
			<?php } ?> 
			<?php if (isset($authUser['role']) && in_array( $authUser['role'], ['4']) ) { ?>				
				
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<a class="dashboard-stat dashboard-stat-v2 green" href="<?php echo HTTP_ROOT.'orders/completed-orders'; ?>">
						<div class="visual">
						   <i class="fa fa-shopping-cart"></i>
						</div>
						<div class="details">
							<div class="number">
								<span data-counter="counterup" data-value="<?php echo isset($completedOrders)?$completedOrders:0; ?>"><?php echo isset($completedOrders)?$completedOrders:0; ?></span>
							</div>
							<div class="desc"> Order completed </div>
						</div>
					</a>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<a class="dashboard-stat dashboard-stat-v2 purple" href="<?php echo HTTP_ROOT.'orders/open-orders'; ?>">
						<div class="visual">
						   <i class="fa fa-shopping-cart"></i>
						</div>
						<div class="details">
							<div class="number"> 
								<span data-counter="counterup" data-value="<?php echo isset($assignedOrders)?$assignedOrders:0; ?>"></span> </div>
							<div class="desc"> Open orders </div>
						</div>
					</a>
				</div>
			
			<?php } ?>
			<?php if (isset($authUser['role']) && in_array( $authUser['role'], ['5']) ) { ?>
				
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<a class="dashboard-stat dashboard-stat-v2 green" href="<?php echo HTTP_ROOT.'orders/orders-history/open-orders'; ?>">
						<div class="visual">
						   <i class="fa fa-shopping-cart"></i>
						</div>
						<div class="details">
							<div class="number">
								<span data-counter="counterup" data-value="<?php echo isset($openOrders)?$openOrders:0; ?>"><?php echo isset($openOrders)?$openOrders:0; ?></span>
							</div>
							<div class="desc"> Open orders </div>
						</div>
					</a>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<a class="dashboard-stat dashboard-stat-v2 purple" href="<?php echo HTTP_ROOT.'orders/orders-history/inprogress-orders'; ?>">
						<div class="visual">
						   <i class="fa fa-shopping-cart"></i>
						</div>
						<div class="details">
							<div class="number"> 
							   <span data-counter="counterup" data-value="<?php echo isset($assignedOrders)?$assignedOrders:0; ?>"><?php echo isset($assignedOrders)?$assignedOrders:0; ?></span>
							</div>
							<div class="desc"> In-progress orders </div>
						</div>
					</a>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
					<a class="dashboard-stat dashboard-stat-v2 purple" href="<?php echo HTTP_ROOT.'orders/orders-history/completed-orders'; ?>">
						<div class="visual">
						   <i class="fa fa-shopping-cart"></i>
						</div>
						<div class="details">
						   <div class="number"> 
							   <span data-counter="counterup" data-value="<?php echo isset($completedOrders)?$completedOrders:0; ?>"><?php echo isset($completedOrders)?$completedOrders:0; ?></span>
							</div>
							<div class="desc"> Completed orders </div>
						</div>
					</a>
				</div>
			
			<?php } ?>
			
		</div>
                    
		<div class="clearfix"></div>
		 
		 <?php if (isset($authUser['role']) && in_array( $authUser['role'], ['1','2']) ) { ?>
			<div class="row">
								
			  <div class="col-md-6">
				
				<div class="portlet light bordered">
				  <div class="portlet-title">
					<div class="caption font-green">
					  <i class="fa fa-location-arrow font-green">
					  </i>
					  <span class="caption-subject bold uppercase">New orders
					  </span>
					</div>
					<div class="tools"> 
					</div>
				  </div>
				  <div class="portlet-body">
					<div class="dataTables_wrapper no-footer" id="sample_2_wrapper">
					  
					  <div class="">
						<table width="100%" style="width: 100%;" aria-describedby="sample_2_info" role="grid" id="db_comming_users_listing" class="table table-striped table-bordered table-hover dt-responsive dataTable no-footer dtr-column collapsed">
						  <thead>
							<tr role="row">
							  <th aria-label="" style="width: 0px;" colspan="1" rowspan="1" class="control sorting_disabled text-center">Sr. no.
							  </th>
							  <th aria-label="" style="width: 0px;" colspan="1" rowspan="1" class="control sorting_disabled text-center">Customer
							  </th>
							  <th aria-label="First name: activate to sort column descending" aria-sort="ascending" style="width: 114px;" colspan="1" rowspan="1" aria-controls="sample_2" tabindex="0" class="all sorting_disabled">Order no.
							  </th>
							  <th aria-label="Last name: activate to sort column ascending" style="width: 112px;" colspan="1" rowspan="1" aria-controls="sample_2" tabindex="0" class="min-phone-l sorting_disabled">Status
							  </th>
							  <th aria-label="Position: activate to sort column ascending" style="width: 223px;" colspan="1" rowspan="1" aria-controls="sample_2" tabindex="0" class="min-tablet sorting_disabled">Date &amp; time
							  </th>
							
							</tr>
						  </thead>
						  <tbody>
							  <?php 
							  $j=1;
							  foreach ($newOrders as $new_order): ?>
								<tr role="row" class="<?php if($j%2==0)echo 'even'; else echo 'odd'; ?>">
									<td class="text-center"><?php echo trim($this->Number->format($j)); ?></td>
									
									<td>
										<a href="<?php echo HTTP_ROOT."users/customer-detail/".base64_encode(convert_uuencode($new_order->customer_detail->id)); ?>">
										<?= ($new_order->customer_detail->name !='')?$new_order->customer_detail->name:$new_order->customer_detail->username; ?>
										</a>
									</td>
									
									<td><?= $this->Html->link(__($new_order->descrates_app_id), ['controller' => 'orders','action' => 'open-order-detail', base64_encode(convert_uuencode($new_order->id))],['title' => 'Packages', 'escape' => false, 'class'=> ''] ) ?></td>
									<td><?php
										  
										
											switch ($new_order->status) {
													case 1:
													   echo "Open";
														break;
													case 2:
														echo  "Assigned";
														break;
													case 3:
														echo "Completed";
														break;
											} ?></td>
									<td><?php if($new_order->drop_off_date!=""){ echo date('M jS, Y',strtotime($new_order->drop_off_date)); } ?></td>
									
								</tr>
							<?php 
								$j++;
								endforeach; 
							?>	
							
							
						  </tbody>
						</table>
					  </div>
					 </div>
				  </div>
				</div>
				
			  </div>
		
			  <div class="col-md-6">
				
				<div class="portlet light bordered">
				  <div class="portlet-title">
					<div class="caption font-green">
					  <i class="fa fa-fighter-jet font-green">
					  </i>
					  <span class="caption-subject bold uppercase">Delivered today
					  </span>
					</div>
					<div class="tools"> 
					</div>
				  </div>
				  <div class="portlet-body">
					<div class="dataTables_wrapper no-footer" id="sample_2_wrapper">
					  
					  <div class="">
						<table width="100%" style="width: 100%;" aria-describedby="sample_2_info" role="grid" id="db_comming_users_listing1" class="table table-striped table-bordered table-hover dt-responsive dataTable no-footer dtr-column collapsed">
						  <thead>
							<tr role="row">
							  <!--<th aria-label="" style="width: 0px;" colspan="1" rowspan="1" class="control sorting_disabled text-center">Sr. no.
							  </th>-->
							  <th aria-label="First name: activate to sort column descending" aria-sort="ascending" style="width: 114px;" colspan="1" rowspan="1" aria-controls="sample_2" tabindex="0" class="all sorting_disabled">Order no.
							  </th>
							  <th aria-label="" style="width: 0px;" colspan="1" rowspan="1" class="control sorting_disabled text-center">Customer
							  </th>
							  <th aria-label="Last name: activate to sort column ascending" style="width: 112px;" colspan="1" rowspan="1" aria-controls="sample_2" tabindex="0" class="min-phone-l sorting_disabled">Status
							  </th>
							  <th aria-label="Position: activate to sort column ascending" style="width: 223px;" colspan="1" rowspan="1" aria-controls="sample_2" tabindex="0" class="min-tablet sorting_disabled">Date &amp; time
							  </th>
							  <th aria-label="Office: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="sample_2" tabindex="0" class="none sorting_disabled text-center">Track
							  </th>
							</tr>
						  </thead>
						  <tbody>
							  <?php 
							  $i=1;
							  foreach ($todayOrders as $today_order): ?>
								<tr role="row" class="<?php if($i%2==0)echo 'even'; else echo 'odd'; ?>">
									<!--<td class="text-center"><?php echo $this->Number->format($i); ?></td>-->
									<td><?= $today_order->descrates_app_id; ?></td>
									<td>
										<a href="<?php echo HTTP_ROOT."users/customer-detail/".base64_encode(convert_uuencode($today_order->customer_detail->id)); ?>">
										<?= ($today_order->customer_detail->name !='')?$today_order->customer_detail->name:$today_order->customer_detail->username; ?>
										</a>
									</td>
									<td>
									<?php 
										if($today_order->status==1){
											echo "Open";
										}elseif($today_order->status==2){
											echo "Assigned";
										}else if($today_order->status==3){
											echo "Completed";
										}
									?>
									</td>
									<td>
										<?php 
											if($today_order->drop_off_date!=""){ 
												echo $this->Common->dateConvert($today_order->drop_off_date, 'UTC', 'd/m/Y H:i:s', $timeZone, 'M jS, Y ');
											} 
											
										?>	
										<?php /*if($today_order->drop_off_date!=""){ echo date('M jS, Y',strtotime($today_order->drop_off_date)); }*/ ?>
											
										</td>
									<td class="text-center">
										<a href="<?php echo HTTP_ROOT.'orders/track-order/'.@$today_order->descrates_app_id; ?>">
										  <i class="fa fa-map-marker">
										  </i>
										</a>
									  </td>
								</tr>
								
								
								
								
								<?php 
									$i++;
									endforeach;
								?>	
							</tbody>
						</table>
					  </div>
					 </div>
				  </div>
				</div>
				
			  </div>
		
			</div>
		 <?php } ?>
					
		<?php if (isset($authUser['role']) && in_array($authUser['role'], ['3']) ) { ?>
			<div class="row">
				<div class="col-md-6">
					
					<div class="portlet light bordered">
						
						<div class="portlet-title">
							<div class="caption font-green">
								<i class="fa fa-location-arrow font-green"></i>
								<span class="caption-subject bold uppercase">New orders</span>
							</div>
							<div class="tools"></div>
						</div>
									  
						<div class="portlet-body">
							<div class="dataTables_wrapper no-footer" id="sample_2_wrapper">
								<div class="">
									<table width="100%" style="width: 100%;" aria-describedby="sample_2_info" role="grid" id="db_comming_users_listing" class="table table-striped table-bordered table-hover dt-responsive dataTable no-footer dtr-column collapsed">
									  <thead>
										<tr role="row">
										  <th aria-label="" style="width: 0px;" colspan="1" rowspan="1" class="control sorting_disabled text-center">Sr. no.
										  </th>
										  <th aria-label="" style="width: 0px;" colspan="1" rowspan="1" class="control sorting_disabled text-center">Customer
										  </th>
										  <th aria-label="First name: activate to sort column descending" aria-sort="ascending" style="width: 114px;" colspan="1" rowspan="1" aria-controls="sample_2" tabindex="0" class="all sorting_disabled">Order no
										  </th>
										  <th aria-label="Last name: activate to sort column ascending" style="width: 112px;" colspan="1" rowspan="1" aria-controls="sample_2" tabindex="0" class="min-phone-l sorting_disabled">Status
										  </th>
										  <th aria-label="Position: activate to sort column ascending" style="width: 223px;" colspan="1" rowspan="1" aria-controls="sample_2" tabindex="0" class="min-tablet sorting_disabled">Date &amp; time
										  </th>
										
										</tr>
									  </thead>
									  <tbody>
										  <?php 
										  $j=1;
										  
										  foreach ($newOrders as $new_order): ?>
											<tr role="row" class="<?php if($j%2==0)echo 'even'; else echo 'odd'; ?>">
												<td class="text-center"><?php echo trim($this->Number->format($j)); ?></td>
												<td>
													
													<?= ($new_order['order']['customer_detail']['name'] !='')?$new_order['order']['customer_detail']['name']:$new_order['order']['customer_detail']['username']; ?>
													
												</td>
												<td><?= $this->Html->link(__($new_order['order']['descrates_app_id']), ['controller' => 'orders','action' => 'open-order-detail', base64_encode(convert_uuencode($new_order['order']['id']))],['title' => 'Packages', 'escape' => false, 'class'=> ''] ) ?></td>
												<td><?php
													  
													
														switch ($new_order->status_to) {
																case 1:
																   echo "Open";
																	break;
																case 2:
																	echo  "Assigned";
																	break;
																case 3:
																	echo "Completed";
																	break;
														} ?></td>
												<td>

													<!--<?= date('M jS, Y',strtotime($new_order['order']['drop_off_date'])); ?>-->
													
													<?php if(!empty($new_order['order']['drop_off_date'])){ 
													echo $this->Common->dateConvert($new_order['order']['drop_off_date'], 'UTC', 'd/m/Y ', $timeZone, 'M jS, Y H:i:s'); 
													} ?>

													</td>
												
											</tr>
											
											
										<?php 
											$j++;
											endforeach; 
										?>	
										
										
									  </tbody>
									</table>
								</div>
							</div>
						</div>
					
					</div><!-- END portlet light bordered -->
									
				</div>
							
				<div class="col-md-6">
					<div class="portlet light bordered">
						<div class="portlet-title">
							<div class="caption font-green">
								<i class="fa fa-fighter-jet font-green"></i>
								<span class="caption-subject bold uppercase">Delivered today</span>
							</div>
							<div class="tools"></div>
						</div>
						
						<div class="portlet-body">
							<div class="dataTables_wrapper no-footer" id="sample_2_wrapper">
								<div class="">
									<table width="100%" style="width: 100%;" aria-describedby="sample_2_info" role="grid" id="db_comming_users_listing1" class="table table-striped table-bordered table-hover dt-responsive dataTable no-footer dtr-column collapsed">
									  <thead>
										<tr role="row">
										  <!--<th aria-label="" style="width: 0px;" colspan="1" rowspan="1" class="control sorting_disabled text-center">Sr. no.
										  </th>-->
										  <th aria-label="First name: activate to sort column descending" aria-sort="ascending" style="width: 114px;" colspan="1" rowspan="1" aria-controls="sample_2" tabindex="0" class="all sorting_disabled">Order no
										  </th>
										  <th aria-label="" style="width: 0px;" colspan="1" rowspan="1" class="control sorting_disabled text-center">Customer
										  </th>
										  <th aria-label="Last name: activate to sort column ascending" style="width: 112px;" colspan="1" rowspan="1" aria-controls="sample_2" tabindex="0" class="min-phone-l sorting_disabled">Status
										  </th>
										  <th aria-label="Position: activate to sort column ascending" style="width: 223px;" colspan="1" rowspan="1" aria-controls="sample_2" tabindex="0" class="min-tablet sorting_disabled">Date &amp; time
										  </th>
										  <th colspan="1" rowspan="1" aria-controls="sample_2" tabindex="0" class="none sorting_disabled text-center">Track</th>
										</tr>
									  </thead>
									  <tbody>
										  <?php 
										  $i=1;
										  foreach($todayOrders as $today_order){ ?>
											<tr role="row" class="<?php if($i%2==0)echo 'even'; else echo 'odd'; ?>">
												<!--<td class="text-center"><?php echo $this->Number->format($i); ?></td>-->
												<td><?= $today_order['order']['descrates_app_id']; ?></td>
												<td>
													
													<?= ($today_order['order']['customer_detail']['name'] !='')?$today_order['order']['customer_detail']['name']:$today_order['order']['customer_detail']['username']; ?>
													
												</td>
												
												<td><?php
													  
													
														switch ($today_order->status_to) {
																case 1:
																   echo "Open";
																	break;
																case 2:
																	echo  "Assigned";
																	break;
																case 3:
																	echo "Completed";
																	break;
														} ?>
												</td>
												<td>
													<?= date('M jS, Y',strtotime($today_order['order']['drop_off_date'])); ?>
												</td>
												
												<td class="text-center">
													<a href="<?php echo HTTP_ROOT.'orders/track-order/'.@$today_order['order']['descrates_app_id']; ?>">
													  <i class="fa fa-map-marker">
													  </i>
													</a>
												</td>
												
											</tr>
										<?php 
											$i++;
										}
										?>	
									</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
					
		<?php if (isset($authUser['role']) && in_array( $authUser['role'], ['4']) ) { ?>
			<div class="row">
	
			  <div class="col-md-6">
				
				<div class="portlet light bordered">
				  <div class="portlet-title">
					<div class="caption font-green">
					  <i class="fa fa-location-arrow font-green">
					  </i>
					  <span class="caption-subject bold uppercase">New orders
					  </span>
					</div>
					<div class="tools"> 
					</div>
				  </div>
				  <div class="portlet-body">
					<div class="dataTables_wrapper no-footer" id="sample_2_wrapper">
					  
					  <div class="">
						<table width="100%" style="width: 100%;" aria-describedby="sample_2_info" role="grid" id="db_comming_users_listing" class="table table-striped table-bordered table-hover dt-responsive dataTable no-footer dtr-column collapsed">
						  <thead>
							<tr role="row">
							  <th aria-label="" style="width: 0px;" colspan="1" rowspan="1" class="control sorting_disabled text-center">Sr. no.
							  </th>
							  <th aria-label="" style="width: 0px;" colspan="1" rowspan="1" class="control sorting_disabled text-center">Customer
							  </th>
							  <th aria-label="First name: activate to sort column descending" aria-sort="ascending" style="width: 114px;" colspan="1" rowspan="1" aria-controls="sample_2" tabindex="0" class="all sorting_disabled">Order no
							  </th>
							  <th aria-label="Last name: activate to sort column ascending" style="width: 112px;" colspan="1" rowspan="1" aria-controls="sample_2" tabindex="0" class="min-phone-l sorting_disabled">Status
							  </th>
							  <th aria-label="Position: activate to sort column ascending" style="width: 223px;" colspan="1" rowspan="1" aria-controls="sample_2" tabindex="0" class="min-tablet sorting_disabled">Date &amp; time
							  </th>
							
							</tr>
						  </thead>
						  <tbody>
							  <?php 
							  $j=1;
							  foreach ($newOrders as $new_order): 
							  
							  $orderStatus = $new_order->status;
							  ?>
								<tr role="row" class="<?php if($j%2==0)echo 'even'; else echo 'odd'; ?>">
									<td class="text-center"><?php echo trim($this->Number->format($j)); ?></td>
									<td>
													
										<?= ($new_order['order_assignment']['order']['customer_detail']['name'] !='')?$new_order['order_assignment']['order']['customer_detail']['name']:$new_order['order_assignment']['order']['customer_detail']['username']; ?>
										
									</td>
									<td>
										<?php 
										if($orderStatus==1){
											echo $this->Html->link(__($new_order['order_assignment']['order']['descrates_app_id']), ['controller' => 'orders','action' => 'new-order-detail-driver', base64_encode(convert_uuencode($new_order['order_assignment']['order']['id']))],['title' => 'Packages', 'escape' => false, 'class'=> '']);
										}else{
											echo $this->Html->link(__($new_order['order_assignment']['order']['descrates_app_id']), ['controller' => 'orders','action' => 'open-order-detail', base64_encode(convert_uuencode($new_order['order_assignment']['order']['id']))],['title' => 'Packages', 'escape' => false, 'class'=> '']);
										}?>
										
									</td>
									
									
									<td><?php
										  
										
											switch ($new_order->status) {
													case 1:
													   echo "Open";
														break;
													case 2:
														echo  "Assigned";
														break;
													case 3:
														echo "Completed";
														break;
											} ?></td>
									<td><?= date('M jS, Y',strtotime($new_order['order_assignment']['order']['drop_off_date'])); ?></td>
									
								</tr>
								
								
								
								
							<?php 
								$j++;
								endforeach; 
							?>	
							
							
						  </tbody>
						</table>
					  </div>
					 </div>
				  </div>
				</div>
				
			  </div>
			
			  <div class="col-md-6">
				
				<div class="portlet light bordered">
				  <div class="portlet-title">
					<div class="caption font-green">
					  <i class="fa fa-fighter-jet font-green">
					  </i>
					  <span class="caption-subject bold uppercase">Delivered today
					  </span>
					</div>
					<div class="tools"> 
					</div>
				  </div>
				  <div class="portlet-body">
					<div class="dataTables_wrapper no-footer" id="sample_2_wrapper">
					  
					  <div class="">
						<table width="100%" style="width: 100%;" aria-describedby="sample_2_info" role="grid" id="db_comming_users_listing1" class="table table-striped table-bordered table-hover dt-responsive dataTable no-footer dtr-column collapsed">
						  <thead>
							<tr role="row">
							  <!--<th aria-label="" style="width: 0px;" colspan="1" rowspan="1" class="control sorting_disabled text-center">Sr. no.
							  </th>-->
							   <th aria-label="First name: activate to sort column descending" aria-sort="ascending" style="width: 114px;" colspan="1" rowspan="1" aria-controls="sample_2" tabindex="0" class="all sorting_disabled">Order no
							  </th>
							  <th aria-label="" style="width: 0px;" colspan="1" rowspan="1" class="control sorting_disabled text-center">Customer
							  </th>
							 
							  <th aria-label="Last name: activate to sort column ascending" style="width: 112px;" colspan="1" rowspan="1" aria-controls="sample_2" tabindex="0" class="min-phone-l sorting_disabled">Status
							  </th>
							  <th aria-label="Position: activate to sort column ascending" style="width: 223px;" colspan="1" rowspan="1" aria-controls="sample_2" tabindex="0" class="min-tablet sorting_disabled">Date &amp; time
							  </th>
							  <th colspan="1" rowspan="1" aria-controls="sample_2" tabindex="0" class="none sorting_disabled text-center">Track</th>	
							</tr>
						  </thead>
						  <tbody>
							  <?php 
							  $j=1;
							  foreach ($todayOrders as $today_order): ?>
								<tr role="row" class="<?php if($j%2==0)echo 'even'; else echo 'odd'; ?>">
									<!--<td class="text-center"><?php echo trim($this->Number->format($j)); ?></td>-->
									<td><?= $this->Html->link(__($today_order['order_assignment']['order']['descrates_app_id']), ['controller' => 'orders','action' => 'open-order-detail', base64_encode(convert_uuencode($today_order['order_assignment']['order']['id']))],['title' => 'Packages', 'escape' => false, 'class'=> ''] ) ?></td>
									<td>
													
										<?= ($today_order['order_assignment']['order']['customer_detail']['name'] !='')?$today_order['order_assignment']['order']['customer_detail']['name']:$today_order['order_assignment']['order']['customer_detail']['username']; ?>
										
									</td>
									<td><?php
										  
										
											switch ($today_order->status) {
													case 1:
													   echo "Open";
														break;
													case 2:
														echo  "Assigned";
														break;
													case 3:
														echo "Completed";
														break;
											} ?></td>
									<td>
										<?= date('M jS, Y',strtotime($today_order['order_assignment']['order']['drop_off_date'])); ?>
									</td>
									<td class="text-center">
										<a href="<?php echo HTTP_ROOT.'orders/track-order/'.@$today_order['order_assignment']['order']['descrates_app_id']; ?>">
										  <i class="fa fa-map-marker">
										  </i>
										</a>
									</td>
								</tr>
								
								
								
								
							<?php 
								$j++;
								endforeach; 
							?>	
							
							
						  </tbody>
						</table>
					  </div>
					 </div>
				  </div>
				</div>
				
			  </div>
			
			</div>
		<?php } ?>
					

<style>
.dataTables_filter {
  float: right;
}
.btn.btn-outline.dark {
  margin-right: 5px;
}
.dataTables_info {
    margin-top: 20px;
}


</style>
