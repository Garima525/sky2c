<div class="page-bar">
	<ul class="page-breadcrumb">
		<li>
			<a href="<?= HTTP_ROOT.'users/dashboard'; ?>">Dashboard</a>
			<i class="fa fa-circle"></i>
		</li>
		<li>
			<span>Driver Details</span>
		</li>
	</ul>
</div>
<h3 class="page-title"> Driver Details <small></small></h3>

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
											<span class="caption-subject font-blue-madison bold uppercase">
												<?php echo $user_data->name; ?>'s Details</span>
										</div>
										<ul class="nav nav-tabs bold">
											<li class="active">
												<a data-toggle="tab" href="#tab_1_1">Documents</a>
											</li>
											<li>
												<a data-toggle="tab" href="#tab_1_2">Open Orders</a>
											</li>
											<li>
												<a data-toggle="tab" href="#tab_1_3">Completed Orders</a>
											</li>
										</ul>
									</div>
									
									<div class="portlet-body">
										<div class="tab-content">
											<!-- Driver Documents Tab Start -->
											<div id="tab_1_1" class="tab-pane active">
												<div class="table_driverDetail">
													
													<table width="100%" style="width: 100%;" aria-describedby="sample_2_info" role="grid" class="table table-striped table-bordered table-hover dt-responsive dataTable no-footer dtr-column collapsed commonInnerDatatable">
													  <thead>
														<tr role="row">
														  <th aria-label="" colspan="1" rowspan="1" class="control sorting_disabled text-center">S.No.
														  </th>
														  <th aria-label="" colspan="1" rowspan="1" class="control sorting_disabled ">Document name
														  </th>
														  <th aria-label="First name: activate to sort column descending" aria-sort="ascending" colspan="1" rowspan="1" aria-controls="sample_2" tabindex="0" class="all sorting_disabled">Document number
														  </th>
														  <th aria-label="Last name: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="sample_2" tabindex="0" class="min-phone-l sorting_disabled">Issued by
														  </th>
														  <th aria-label="Position: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="sample_2" tabindex="0" class="min-tablet sorting_disabled">Issued date
														  </th> 
														  <th aria-label="Position: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="sample_2" tabindex="0" class="min-tablet sorting_disabled">Expiry date
														  </th> 
														   
														  <th aria-label="Office: activate to sort column ascending" colspan="1" rowspan="1" aria-controls="sample_2" tabindex="0" class="none sorting_disabled text-center">File
														  </th>
														</tr>
													  </thead>
													  
													  <tbody>
													  <?php if(!empty($user_data)){
															$d=1;
															foreach($user_data['user_details'] as $userDocument){
																//pr($userDocument->document_title);
														?>
															<tr style="" class="odd" role="row">
															  <th class="text-center"><?php echo $d; ?>
															  </th>
															  <td><?= $userDocument->document_title; ?>
															  </td>
															  <td><?= $userDocument->document_number; ?>
															  </td>
															  <td><?= $userDocument->issued_by; ?>
															  </td>
															 <td><?= !empty($userDocument->issued_date) ? (date('M jS, Y', strtotime( $userDocument->issued_date ) )):""?></td>
															 <td><?= !empty($userDocument->expiary_date) ? (date('M jS, Y', strtotime( $userDocument->expiary_date ) )):""?>
															 </td>
															
															  <td class="sorting_1">
															  <?php if(!empty($userDocument->scanned_image)){ ?>
																<ul class="list-inline text-center">
																  <li>
																	<a href="<?php echo HTTP_ROOT.'img/drivers_documents/'.$userDocument->scanned_image ?>" target="_blank">
																	  <i class="fa fa-download">
																	  </i> 
																	</a> 
																  </li>   
																</ul>
															 <?php } ?>
															  </td>
															</tr>
											
														<?php $d++; } 
														} ?>
													  </tbody>
													</table>

												</div>
											</div>
											<!-- Driver Documents Tab End -->
														
											<!-- Assigned Order Tab Start -->
											<div id="tab_1_2" class="tab-pane">
												<div class="table_driverDetail">
																												
													<table width="100%" style="width: 100%;" aria-describedby="sample_2_info" role="grid" class="table table-striped table-bordered table-hover dt-responsive dataTable no-footer dtr-column collapsed commonInnerDatatable" >
														<thead>
															<tr role="row">
															  
															  <th colspan="1" rowspan="1" aria-controls="sample_2" tabindex="0" class="min-tablet sorting_disabled">Order Id
															  </th>
															  <th aria-label="" colspan="1" rowspan="1" class="control sorting_disabled text-center ">Package No
															  </th>
															  <th colspan="1" rowspan="1" aria-controls="sample_2" tabindex="0" class="min-tablet sorting_disabled">Title
															  </th>
															  <th colspan="1" rowspan="1" aria-controls="sample_2" tabindex="0" class="min-tablet sorting_disabled">Weight
															  </th>
															   <th colspan="1" rowspan="1" aria-controls="sample_2" tabindex="0" class="min-tablet sorting_disabled">Source
															  </th>
															  <th colspan="1" rowspan="1" aria-controls="sample_2" tabindex="0" class="min-tablet sorting_disabled">Destination
															  </th>
															</tr>

														</thead>
														<tbody>
															<?php if(!empty($open_orders)){
																$j=1;
																foreach ($open_orders as $assigned_order):
															?>
															<tr role="row" class="<?php if($j%2==0)echo 'even'; else echo 'odd'; ?>">
																<td><?= !empty($assigned_order->order_assignment['order_package']['order_id']) ? $assigned_order->order_assignment['order_package']['order_id']:"" ?></td>
																
																<td class="text-center">								
																	<?php /*echo $this->Html->link(__($assigned_order->order_assignment['order_package']['order_id']), ['controller'=>'orders','action' => 'assigned-order-detail', base64_encode(convert_uuencode($assigned_order->order_assignment['order_package']['order_id'])),4,$user_data->id],['title' => 'Packages', 'escape' => false, 'class'=> 'system_editIcon'] ) */?>
																	<?php 
																	if($assigned_order->status==1){
																		/*echo $this->Html->link(__($assigned_order->order_assignment['order_package']['package_number']), ['controller' => 'orders','action' => 'new-order-detail-driver', base64_encode(convert_uuencode($new_order['order_assignment']['order']['id']))],['title' => 'Packages', 'escape' => false, 'class'=> 'system_editIcon']);*/
																		
																		echo $this->Html->link(__($assigned_order->order_assignment['order_package']['package_number']), ['controller' => 'orders','action' => 'new-order-detail-driver', base64_encode(convert_uuencode($assigned_order->order_assignment['order_package']['order_id'])),4,$user_data->id],['title' => 'Packages', 'escape' => false, 'class'=> 'system_editIcon']);
																	}else{
																		echo $this->Html->link(__($assigned_order->order_assignment['order_package']['package_number']), ['controller' => 'orders','action' => 'assigned-order-detail', base64_encode(convert_uuencode($assigned_order->order_assignment['order_package']['order_id'])),4,$user_data->id],['title' => 'Packages', 'escape' => false, 'class'=> 'system_editIcon']);
																	}?>
																	
																	 
																</td>
																
																
																<td><?= !empty($assigned_order->order_assignment['order_package']['package_title']) ? $assigned_order->order_assignment['order_package']['package_title']:"" ?></td>
																<td><?= !empty($assigned_order->order_assignment['order_package']['package_weight']) ? $assigned_order->order_assignment['order_package']['package_weight']:"" ?></td>
																<td><?= !empty($assigned_order->order_assignment['source']) ? $assigned_order->order_assignment['source']:"" ?></td>
																<td><?= !empty($assigned_order->order_assignment['destination']) ? $assigned_order->order_assignment['destination']:"" ?></td>
																
																
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
												<div class="table_driverDetail">
													
													<table width="100%" style="width: 100%;" aria-describedby="sample_2_info" role="grid" class="table table-striped table-bordered table-hover dt-responsive dataTable no-footer dtr-column collapsed commonInnerDatatable" >
														<thead>
															<tr role="row">
															  
															  <th aria-label="" colspan="1" rowspan="1" class="control sorting_disabled text-center ">Order Id
															  </th>
															  <th colspan="1" rowspan="1" aria-controls="sample_2" tabindex="0" class="min-tablet sorting_disabled">Package No
															  </th>
															  <th colspan="1" rowspan="1" aria-controls="sample_2" tabindex="0" class="min-tablet sorting_disabled">Title
															  </th>
															  <th colspan="1" rowspan="1" aria-controls="sample_2" tabindex="0" class="min-tablet sorting_disabled">Weight
															  </th>
															   <th colspan="1" rowspan="1" aria-controls="sample_2" tabindex="0" class="min-tablet sorting_disabled">Source
															  </th>
															  <th colspan="1" rowspan="1" aria-controls="sample_2" tabindex="0" class="min-tablet sorting_disabled">Destination
															  </th>
															</tr>

														</thead>
														<tbody>
															<?php if(!empty($completed_orders)){
																$k=1;
																foreach ($completed_orders as $completed_order):
															?>
															<tr role="row" class="<?php if($k%2==0)echo 'even'; else echo 'odd'; ?>">
																
																<td class="text-center">
																	<?= $this->Html->link(__($completed_order->order_assignment['order_package']['order_id']), ['controller'=>'orders','action' => 'completed-order-detail', base64_encode(convert_uuencode($completed_order->order_assignment['order_package']['order_id'])),4,$user_data->id],['title' => 'Packages', 'escape' => false, 'class'=> 'system_editIcon'] ) ?>
																	 
																</td>
																
																<td><?= !empty($completed_order->order_assignment['order_package']['package_number']) ? $completed_order->order_assignment['order_package']['package_number']:"" ?></td>
																
																<td><?= !empty($completed_order->order_assignment['order_package']['package_title']) ? $completed_order->order_assignment['order_package']['package_title']:"" ?></td>
																<td><?= !empty($completed_order->order_assignment['order_package']['package_weight']) ? $completed_order->order_assignment['order_package']['package_weight']:"" ?></td>
																
																<td><?= !empty($completed_order->order_assignment['source']) ? $completed_order->order_assignment['source']:"" ?></td>
																
																<td><?= !empty($completed_order->order_assignment['destination']) ? $completed_order->order_assignment['destination']:"" ?></td>
																
																
															</tr>
															<?php 
																$k++;
																endforeach;
																}
															?>
														</tbody>
													</table>
												
												
												</div>
											</div>
											<!-- Completed Order Tab End -->
											
														
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
								<!-- END PROFILE CONTENT -->
				</div>
			</div>
				</div>
			</div>
		</div>
		<!-- END EXAMPLE TABLE PORTLET-->
	</div>
</div>
