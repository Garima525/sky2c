<div class="page-bar">
	<ul class="page-breadcrumb">
		<li>
			<a href="<?= HTTP_ROOT.'users/dashboard'; ?>">Dashboard</a>
			<i class="fa fa-circle"></i>
		</li>
		<li>
			<span>Agent detail</span>
		</li>
	</ul>
</div>

<h3 class="page-title"> Agent details <small></small></h3>

<div class="row">
	<div class="col-md-12">
		<!-- BEGIN EXAMPLE TABLE PORTLET-->
		<div class="portlet light bordered add-btn">
			
			<div class="portlet-body">
				
				<div class="dataTables_wrapper no-footer" id="sample_2_wrapper">
					
					<div class="row">
						<div class="col-md-12">
							<div class="dt-buttons"></div>
							<div class="clearfix"></div>
						</div>
					</div>
					<!-- Close Row Div -->
					
					<div class="row">
						<div class="col-md-12">
							<!-- BEGIN PROFILE SIDEBAR -->
							<div class="profile-sidebar">
								<!-- PORTLET MAIN -->
								<div class="portlet light profile-sidebar-portlet ">
									<!-- SIDEBAR USERPIC -->
									<div class="profile-userpic">
										  <?php 
											if (!empty($user_data->profile_image)) { 
													$imagePic = $user_data->profile_image;
											}else{
													$imagePic = "prof_photo.png";
											}
										  ?>
										<img alt="" class="img-responsive" src="<?php echo HTTP_ROOT.'img/uploads/'.$imagePic; ?>">
										</div>
										<!-- END SIDEBAR USERPIC -->
										<!-- SIDEBAR USER TITLE -->
										<div class="profile-usertitle">
											<div class="profile-usertitle-name"> <?php echo $user_data->name; ?> </div>
										</div>
										<!-- END SIDEBAR USER TITLE -->
									</div>
								<!-- END PORTLET MAIN -->
								
								<!-- PORTLET MAIN -->
								<div class=" text-center light ">
									<div>
										<div class=" profile-desc-link">
											<i class="fa fa-envelope"></i>
											<a href="mailto:<?php echo $user_data->name; ?>"><?php echo $user_data->email; ?></a>
										</div>
										<div class="margin-top-20 profile-desc-link">
											<i class="fa fa-phone"></i>
											<a href=""><?php echo isset($user_data->country_code)?"+".$user_data->country_code."-":''; ?> <?php echo $user_data->phone; ?></a>
										</div>
									</div>
								</div>
								<!-- END PORTLET MAIN -->
							</div>
							<!-- END BEGIN PROFILE SIDEBAR -->
														
							<!-- BEGIN PROFILE CONTENT -->
							<div class="profile-content">
								<div class="row">
									<div class="col-md-12">
										<div class="portlet light ">
											
											<div class="portlet-title tabbable-line">
												<div class="caption caption-md">
													<i class="icon-globe theme-font hide"></i>
													<span class="caption-subject font-blue-madison bold uppercase"><?php echo $user_data->name; ?>'s Details</span>
												</div>
												<ul class="nav nav-tabs bold">
													<li class="active">
														<a data-toggle="tab" href="#tab_1_1">Open orders</a>
													</li>
													<li>
														<a data-toggle="tab" href="#tab_1_2">Assigned orders</a>
													</li>
													<li>
														<a data-toggle="tab" href="#tab_1_3">Completed orders</a>
													</li>
												</ul>
											</div>
											
											<div class="portlet-body">
												<div class="tab-content">
													<!-- Open Order Tab Start -->
													<div id="tab_1_1" class="tab-pane active">
														<div class="table-scrollable table-responsive">
															
															<table width="100%" style="width: 100%;" aria-describedby="sample_2_info" role="grid" class="table table-striped table-bordered table-hover dt-responsive dataTable no-footer dtr-column collapsed commonInnerDatatable">
																<thead>
																	<tr role="row">
																	  <th aria-label="" colspan="1" rowspan="1" class="control sorting_disabled text-center ">Order id
																	  </th>
																	  <th aria-label="" colspan="1" rowspan="1" class="control sorting_disabled text-center ">Package no
																	  </th>
																	  <th colspan="1" rowspan="1" aria-controls="sample_2" tabindex="0" class="min-tablet sorting_disabled">Pickup date
																	  </th>
																	  <th colspan="1" rowspan="1" aria-controls="sample_2" tabindex="0" class="min-tablet sorting_disabled">Drop off date
																	  </th>
																	  <th colspan="1" rowspan="1" aria-controls="sample_2" tabindex="0" class="min-tablet sorting_disabled">Source
																	  </th>
																	  <th colspan="1" rowspan="1" aria-controls="sample_2" tabindex="0" class="min-tablet sorting_disabled">Destination
																	  </th>
																	</tr>

																</thead>
																<tbody>
																	<?php if(!empty($open_orders)){
																		$i=1;
																		foreach ($open_orders as $open_order):
																	?>
																	<tr style="" class="odd" role="row">
																		<td class="text-center">
																		
																			<?php echo $open_order->order['descrates_app_id']; ?>

																			 <?php /* $this->Html->link(__($open_order->order['descrates_app_id']), ['controller'=>'orders','action' => 'open-order-detail', base64_encode(convert_uuencode($open_order->order['id'])),3,$user_data->id],['title' => 'Packages', 'escape' => false, 'class'=> 'system_editIcon'] ) */ ?>
																			 
																		</td>
																		<td><?= !empty($open_order->order_package['package_number']) ? $open_order->order_package['package_number']:"" ?><br/><?= !empty($open_order->order_package['package_title']) ? $open_order->order_package['package_title']:"" ?></td>
																		<td><?= !empty($open_order->order['pickup_date']) ? (date('M jS, Y', strtotime( $open_order->order['pickup_date'] ) )):"" ?></td>
																		
																		<td><?= !empty($open_order->order['drop_off_date']) ? (date('M jS, Y', strtotime( $open_order->order['drop_off_date'] ) )):"" ?></td>
																		
																		<td><?php echo  $open_order->order['source']; ?></td>
																		
																		<td><?php echo  $open_order->order['destination']; ?></td>
																	</tr>
																	<?php 
																		$i++;
																		endforeach;
																		}
																	?>
																</tbody>
															</table>
														
														</div>
													</div>
													<!-- Open Order Tab End -->
													
													<!-- Assigned Order Tab Start -->
													<div id="tab_1_2" class="tab-pane">
														<div class="table-scrollable table-responsive">
																														
															<table width="100%"   style="width: 100%;" aria-describedby="sample_2_info" role="grid" class="table table-striped table-bordered table-hover dt-responsive dataTable no-footer dtr-column collapsed commonInnerDatatable">
																<thead>
																	<tr role="row">
																	 
																	  <th aria-label="" colspan="1" rowspan="1" class="control sorting_disabled text-center ">Order id
																	  </th>
																	   <th aria-label="" colspan="1" rowspan="1" class="control sorting_disabled text-center ">Package no
																	  </th>
																	  <th colspan="1" rowspan="1" aria-controls="sample_2" tabindex="0" class="min-tablet sorting_disabled">Pickup date
																	  </th>
																	  <th colspan="1" rowspan="1" aria-controls="sample_2" tabindex="0" class="min-tablet sorting_disabled">Drop off date
																	  </th>
																	  <th colspan="1" rowspan="1" aria-controls="sample_2" tabindex="0" class="min-tablet sorting_disabled">Source
																	  </th>
																	  <th colspan="1" rowspan="1" aria-controls="sample_2" tabindex="0" class="min-tablet sorting_disabled">Destination
																	  </th>
																	</tr>

																</thead>
																<tbody>
																	<?php if(!empty($assigned_orders)){
																		$j=1;
																		foreach ($assigned_orders as $assigned_order):
																		
																	?>
																	<tr style="" class="odd" role="row">
															
																		<td class="text-center">
																			<?php echo $assigned_order->order['descrates_app_id']; ?>
																			
																			 <?php /* $this->Html->link(__($assigned_order->order_assignment['order']['descrates_app_id']), ['controller'=>'orders','action' => 'assigned-order-detail', base64_encode(convert_uuencode($assigned_order->order_assignment['order']['id'])),3,$user_data->id],['title' => 'Packages', 'escape' => false, 'class'=> 'system_editIcon'] ) */ ?>
																			 
																		</td>
																		<td><?php echo  $assigned_order->order_package['package_number']; ?><br/>
																		<?php echo  $assigned_order->order_package['package_title']; ?>
																		</td>
																		<td><?= !empty($assigned_order->order['pickup_date']) ? (date('M jS, Y', strtotime( $assigned_order->order['pickup_date'] ) )):"" ?></td>
																		
																		<td><?= !empty($assigned_order->order['drop_off_date']) ? (date('M jS, Y', strtotime( $assigned_order->order['drop_off_date'] ) )):"" ?></td>
																		
																		<td><?php echo  $assigned_order->order['source']; ?></td>
																		
																		<td><?php echo $assigned_order->order['destination']; ?></td>
																	</tr>
																	<?php 
																		$j++;
																		endforeach;
																	}
																	?>
																</tbody>
															</table>
														
														</div>
													</div>
													<!-- Assigned Order Tab End -->
													
													<!-- Completed Order Tab Start -->
													<div id="tab_1_3" class="tab-pane">
														<div class="table-scrollable table-responsive">
															
															<table width="100%" style="width: 100%;" aria-describedby="sample_2_info" role="grid" class="table table-striped table-bordered table-hover dt-responsive dataTable no-footer dtr-column collapsed commonInnerDatatable">
																<thead>
																	<tr role="row">
																	  <th aria-label="" colspan="1" rowspan="1" class="control sorting_disabled text-center ">Order id
																	  </th>
																	  <th aria-label="" colspan="1" rowspan="1" class="control sorting_disabled text-center ">Package no
																	  </th>
																	  <th colspan="1" rowspan="1" aria-controls="sample_2" tabindex="0" class="min-tablet sorting_disabled">Pickup date
																	  </th>
																	  <th colspan="1" rowspan="1" aria-controls="sample_2" tabindex="0" class="min-tablet sorting_disabled">Drop off Date
																	  </th>
																	  <th colspan="1" rowspan="1" aria-controls="sample_2" tabindex="0" class="min-tablet sorting_disabled">Source
																	  </th>
																	  <th colspan="1" rowspan="1" aria-controls="sample_2" tabindex="0" class="min-tablet sorting_disabled">Destination
																	  </th>
																	</tr>

																</thead>
																<tbody>
																	<?php if(!empty($completed_orders)){
																		$i=1;
																		foreach ($completed_orders as $completed_order):
																	?>
																	<tr style="" class="odd" role="row">
																		<td class="text-center">
																		
																			<?php echo $completed_order->order['descrates_app_id'];?>

																			 <?php /* $this->Html->link(__($completed_order->order['descrates_app_id']), ['controller'=>'orders','action' => 'completed-order-detail', base64_encode(convert_uuencode($completed_order->order['id'])),3,$user_data->id],['title' => 'Packages', 'escape' => false, 'class'=> 'system_editIcon'] ) */ ?>
																			 
																		</td>
																		<td>
																			<?= !empty($completed_order->order_package['package_number']) ? $completed_order->order_package['package_number']:"" ?><br/><?= !empty($completed_order->order_package['package_title']) ? $completed_order->order_package['package_title']:"" ?>
																		</td>
																		<td>
																			<?= !empty($completed_order->order['pickup_date']) ? (date('M jS, Y', strtotime( $completed_order->order['pickup_date'] ) )):"" ?>
																		</td>
																		
																		<td><?= !empty($completed_order->order['drop_off_date']) ? (date('M jS, Y', strtotime( $completed_order->order['drop_off_date'] ) )):"" ?></td>
																		
																		<td><?php echo  $completed_order->order['source']; ?></td>
																		
																		<td><?php echo  $completed_order->order['destination']; ?></td>
																	</tr>
																	<?php 
																		$i++;
																		endforeach;
																		}
																	?>
																</tbody>
															</table>
														</div>
														</div>
													</div>	
													<!-- Completed Order Tab End -->
												</div>
											</div>
											
									</div>
								</div>
							</div>
							<!-- END PROFILE CONTENT -->
						
						</div>
						<!-- Close MD12 Div -->
					</div>
					<!-- Close Row Div -->
						
				</div>
				<!-- Close sample_2_wrapper Div -->	
			</div>
			<!-- Close portlet-body Div -->		
		</div>
		<!-- Close portlet light bordered add-btn Div -->
	</div>
	<!-- Close col-md-12 Div -->				
</div>	
