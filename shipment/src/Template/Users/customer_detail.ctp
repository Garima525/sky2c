<div class="page-bar">
	<ul class="page-breadcrumb">
		<li>
			<a href="<?= HTTP_ROOT.'users/dashboard'; ?>">Dashboard</a>
			<i class="fa fa-circle"></i>
		</li>
		<li>
			<span>Customer details</span>
		</li>
	</ul>
</div>

<h3 class="page-title"> Customer details <small></small></h3>
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
												Order details</span>
										</div>
										<ul class="nav nav-tabs bold">
											<li class="active">
												<a data-toggle="tab" href="#tab_1_1">Open orders</a>
											</li>
											<li>
												<a data-toggle="tab" href="#tab_1_2">Completed orders</a>
											</li>
											
										</ul>
									</div>
									
									<div class="portlet-body">
										<div class="tab-content">
											<!-- Customer Documents Tab Start -->
											<div id="tab_1_1" class="tab-pane active">
												<div class="table_CustomerDetail">
													<table width="100%" style="width: 100%;" aria-describedby="sample_2_info" role="grid" class="table table-striped table-bordered table-hover dt-responsive dataTable no-footer dtr-column collapsed commonInnerDatatable" id="openorderCustomer" >
														<thead>
															<tr role="row">
															  
															  <th aria-label="" colspan="1" rowspan="1" class="control sorting_disabled text-center ">Descartes id
															  </th>
															 
															  <th colspan="1" rowspan="1" aria-controls="sample_2" tabindex="0" class="min-tablet sorting_disabled">Source
															  </th>
															  <th colspan="1" rowspan="1" aria-controls="sample_2" tabindex="0" class="min-tablet sorting_disabled">Destination
															  </th>
															  
															 <th colspan="1" rowspan="1" aria-controls="sample_2" tabindex="0" class="min-tablet sorting_disabled">Pickup date
															  </th>
															  <th colspan="1" rowspan="1" aria-controls="sample_2" tabindex="0" class="min-tablet sorting_disabled">Drop off date
															  </th>
															</tr>

														</thead>
														<tbody>
															<?php if(!empty($open_orders)){
																$j=1;
																foreach ($open_orders as $open_order):
															?>
															<tr role="row" class="<?php if($j%2==0)echo 'even'; else echo 'odd'; ?>">
																
																<td class="text-center">								
																	<?= $this->Html->link(__($open_order['descrates_app_id']), ['controller'=>'orders','action' => 'open-order-detail', base64_encode(convert_uuencode($open_order['id']))],['title' => 'Packages', 'escape' => false, 'class'=> 'system_editIcon'] ) ?>
																	 
																</td>
																
																<td><?= !empty($open_order['source']) ? $open_order['source']:"" ?></td>
																<td><?= !empty($open_order['destination']) ? $open_order['destination']:"" ?></td>
																	<td><?= !empty($open_order['pickup_date']) ? date("M jS, Y",strtotime($open_order['pickup_date'])):"" ?></td>
																<td><?= !empty($open_order['drop_off_date']) ? date("M jS, Y",strtotime($open_order['drop_off_date'])):"" ?></td>
																
																
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
											<!-- Customer Documents Tab End -->
														
											<!-- Assigned Order Tab Start -->
											<div id="tab_1_2" class="tab-pane">
												<div class="table_CustomerDetail">
													
													<table width="100%" style="width: 100%;" aria-describedby="sample_2_info" role="grid" class="table table-striped table-bordered table-hover dt-responsive dataTable no-footer dtr-column collapsed commonInnerDatatable" id="completedorderCustomer" >
														<thead>
															<tr role="row">
															  
															  <th aria-label="" colspan="1" rowspan="1" class="control sorting_disabled text-center ">Descartes id
															  </th>
															 
															  <th colspan="1" rowspan="1" aria-controls="sample_2" tabindex="0" class="min-tablet sorting_disabled">Source
															  </th>
															  <th colspan="1" rowspan="1" aria-controls="sample_2" tabindex="0" class="min-tablet sorting_disabled">Destination
															  </th>
															  
															 <th colspan="1" rowspan="1" aria-controls="sample_2" tabindex="0" class="min-tablet sorting_disabled">Pickup date
															  </th>
															  <th colspan="1" rowspan="1" aria-controls="sample_2" tabindex="0" class="min-tablet sorting_disabled">Drop off date
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
																	<?= $this->Html->link(__($completed_order['descrates_app_id']), ['controller'=>'orders','action' => 'open-order-detail', base64_encode(convert_uuencode($completed_order['id']))],['title' => 'Packages', 'escape' => false, 'class'=> 'system_editIcon'] ) ?>
																	 
																</td>
																
																<td><?= !empty($completed_order['source']) ? $completed_order['source']:"" ?></td>
																<td><?= !empty($completed_order['destination']) ? $completed_order['destination']:"" ?></td>
																<td><?= !empty($completed_order['pickup_date']) ? date("M jS, Y",strtotime($completed_order['pickup_date'])):"" ?></td>
																<td><?= !empty($completed_order['drop_off_date']) ? date("M jS, Y",strtotime($completed_order['drop_off_date'])):"" ?></td>
																
																
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
											<!-- Assigned Order Tab End -->
											
											
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
<style>
.portlet.light .dataTables_wrapper .dt-buttons {
    margin-top: 0px !important;
    padding-bottom: 10px !important;
}
</style>
