<?php // pr($package_detail); die;?>
<div class="page-bar">
		<ul class="page-breadcrumb">
			<li>
				<a href="<?= HTTP_ROOT.'users/dashboard'; ?>">Dashboard</a>
				<i class="fa fa-circle"></i>
			</li>
			<li>
				 <a href="<?= HTTP_ROOT.'orders/new-orders'; ?>">New orders</a>
				<i class="fa fa-circle"></i>
			</li>
			 <li>
				<span>New order details</span>
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
                    <span class="caption-subject bold uppercase">New order detail</span>
                </div> 
				<h4 class="text-primary mt-0"><b>ID - <span><?php if(!empty(@$order)){ echo @$order[0]['order_assignment']['order']['descrates_app_id']; }; ?></span></b></h4>
				<ul class="list-inline mb-0 pull-right">
					<li>
						<div class="caption pull-right">
							<a href="<?php echo HTTP_ROOT.'orders/track-order/'.@$order[0]['order_assignment']['order']['descrates_app_id']; ?>" class="icon-btn btn blue">
								<i class="fa fa-map-marker"></i>
								<div><b> Track</b> </div>
							</a>
						</div>
					</li> 
			   </ul>
            </div>  

              <div class="portlet-body form">
                <div class="row">
                  <div class="col-md-12">
                   
                      <div class="form-body">
                        
                        <div class="row">
                          <div class="col-xs-12">
                            
                            <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="commonDatatable">
                            <thead>
                                <tr>
                                   
                                    <th class="all">Sr. no.</th>
                                    <th class="all">Package title</th>
                                    <th class="all">Package no.</th>
                                   <!--  <th class="all">Source</th>
                                    <th class="all">Destination</th>
                                    <th class="all">Pick Up Date</th>
                                    <th class="all">Drop Off Date</th> -->
                                    <?php if($authUser['role']==4){ ?>
                                    <th class="all">Action</th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            $i=1;
                            foreach ($order as $package): ?>
                            <tr>
                                
                                
                                <td class="text-center"><?= $this->Number->format($i) ?></td>
                                <td><?= $package['order_assignment']['order_package']['package_title']; ?></td>
                                <!-- <td><?= $package->package_number; ?></td> -->
                                <td class="text-center sorting_1 bold">
                                     <?= $this->Html->link(__($package['order_assignment']['order_package']['package_number']), ['action' => 'package-detail', base64_encode(convert_uuencode($package['order_assignment']['order_package']['id']))],['title' => 'Packages', 'escape' => false, 'class'=> ''] ) ?>
                                </td>
                                <!-- <td><?= $package->order_assignment['source']; ?></td>
                                <td><?= $package->order_assignment['destination']; ?></td>
                                <td><?= !empty($order->pickup_date) ? (date('M jS, Y', strtotime( $order->pickup_date ) )):"" ?></td>
                                <td><?= !empty($order->drop_off_date) ? (date('M jS, Y', strtotime( $order->drop_off_date ) )):"" ?></td> -->
                                <?php if($authUser['role']==4){ ?>
                                 <td class="actions">
											
											
											<?php  
												if($package['status']==1){
													echo $this->Form->postLink(__('<i class="fa fa-thumbs-o-up"></i> Accept'), ['action' => 'order-action', base64_encode(convert_uuencode($package['id'])),2], ['title' => 'Accept Order', 'escape' => false, 'class' => 'btn btn-outline btn-circle green btn-sm blue', 'confirm' => __('Are you sure you want to accept this order ?')]); 
													
													echo $this->Form->postLink(__('<i class="fa fa-thumbs-o-down"></i> Reject'), ['action' => 'order-action', base64_encode(convert_uuencode($package['id'])),4], ['title' => 'Reject Order', 'escape' => false, 'class' => 'btn btn-outline btn-circle red btn-sm blue', 'confirm' => __('Are you sure you want to reject this order ?')]); 
												}else{
													echo '---';
												}
											?>
										</td> 
								<?php } ?>		
                            </tr>
                            <?php $i++; endforeach; ?>
                            
                            </tbody>
                        </table>
                          </div>
                          <div class="col-xs-12"></div>
                        </div>
                          
                       <?php if(!empty($order['0']['order_assignment']['order']['order_details'])){ ?>
							<div class="ord-widget order_party_detail">
							  <h5 class="bold text-primary">Order's parties details</h5>	
							  
							  <div class="order_detail_sec">
								
								<?php 
								$i=1;
								foreach($order['0']['order_assignment']['order']['order_details'] as $order_details_key => $order_details_val){ ?>
								
								  <div class="well cust-info">
									<h5><?php echo isset($order_details_val->party_type)?$order_details_val->party_type:'---'; ?></h5>
									<p><b>Party code:</b> <?php echo isset($order_details_val->party_code)?$order_details_val->party_code:'---'; ?></p>
									<p><b>Party name:</b> <?php echo isset($order_details_val->party_name)?$order_details_val->party_name:'---'; ?></p>
									<p><b>Party address:</b> <?php echo isset($order_details_val->address_1)?$order_details_val->address_1:'---'; ?></p>
									<p><b>City:</b> <?php echo isset($order_details_val->city_name)?$order_details_val->city_name:'---'; ?></p>
									<p><b>Postal code:</b> <?php echo isset($order_details_val->postal_code)?$order_details_val->postal_code:'---'; ?></p>
									<p><b>State code:</b> <?php echo isset($order_details_val->state_or_province_code)?$order_details_val->state_or_province_code:"---"; ?></p>
									<p><b>Country code:</b> <?php echo isset($order_details_val->country_code)?$order_details_val->country_code:"---"; ?></p>
								  </div>
								  
								<?php 
								if($i%3==0){
									echo '</div><div class="order_detail_sec">';
								}
								$i++;
								} ?>
									
							  </div>
							</div>
						<?php } ?>
                         
                        <?php if(!empty($order)){ ?>
                        <div class="ord-widget">
                          <div class="row ">
                            <div class="col-sm-12 col-md-6 col-lg-4">
								
								<div class="well cust-info">
									<h5>Customer info</h5>
									<p><b>Name:</b>  <?=  ($order['0']['order_assignment']['order']['customer_detail']['name'] !='')?@ucfirst(@$order['0']['order_assignment']['order']['customer_detail']['name']):"---";  ?></p>
									<p><b>Email:</b>  <?=  ($order['0']['order_assignment']['order']['customer_detail']['email'] !='')?@ucfirst(@$order['0']['order_assignment']['order']['customer_detail']['email']):"---";  ?></p>
									<p><b>Phone:</b>  <?=  ($order['0']['order_assignment']['order']['customer_detail']['phone'] !='')?@ucfirst(@$order['0']['order_assignment']['order']['customer_detail']['phone']):"---";  ?></p>
							  </div>	
							</div>
							
                             <div class="col-sm-12 col-md-6 col-lg-4">
							
							 <div class="well cust-info">
                                <h5>Shipment info</h5>
								<p><b>Source:</b>  <?=  @$order['0']['source'];  ?></p>
                                <p><b>Destination:</b> <?=  @$order['0']['destination'];  ?></p>
                                <p><b>Pick up date:</b> <?= !empty($order['0']['order_assignment']['order']['pickup_date']) ? (date('M jS, Y', strtotime( $order['0']['order_assignment']['order']['pickup_date'] ) )):"" ?></p>
                                <p><b>Drop off date:</b> <?= !empty($order['0']['order_assignment']['order']['drop_off_date']) ? (date('M jS, Y', strtotime( $order['0']['order_assignment']['order']['drop_off_date'] ) )):"" ?></p>
                              </div>	 
							
                            </div>
                          </div>
                        </div>
                        <?php } ?>
                        
                        <?php if(!empty($order['0']['order_assignment']['order']['order_locations'])){ ?>
							<div class="ord-widget">
							  <h5 class="bold text-primary">Order's location details</h5>	
							  
							  <div class="row ">
								
								<?php foreach($order['0']['order_assignment']['order']['order_locations'] as $locationkey => $location){ ?>
								<div class="col-sm-12 col-md-6 col-lg-4">
								
								  <div class="well cust-info">
									<h5><?php echo isset($location->location_type)?preg_replace('/(?!^)[A-Z]{2,}(?=[A-Z][a-z])|[A-Z][a-z]/', ' $0', $location->location_type):'---'; ?></h5>
									<p><b>Location id:</b> <?php echo isset($location->location_id)?$location->location_id:'---'; ?></p>
									<p><b>Location name:</b> <?php echo isset($location->location_name)?$location->location_name:'---'; ?></p>
									<p><b>Location id qualifier:</b> <?php echo isset($location->location_id_qualifier)?$location->location_id_qualifier:'---'; ?></p>
									<p><b>State code:</b> <?php echo isset($location->state_or_province_code)?$location->state_or_province_code:"---"; ?></p>
									<p><b>Country code:</b> <?php echo isset($location->country_code)?$location->country_code:"---"; ?></p>
								  </div>
								  
								</div>
								<?php } ?>
									
							  </div>
							</div>
						<?php } ?>
						
                      </div>
                   
                  </div>
                </div>
              </div>
            </div>
        
<!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>

