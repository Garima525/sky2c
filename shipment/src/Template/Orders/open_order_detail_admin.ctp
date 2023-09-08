<link href="<?php echo HTTP_ROOT;?>assets/global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css" rel="stylesheet" type="text/css" />
<div class="page-bar">
	<ul class="page-breadcrumb">
		<li>
			<a href="<?= HTTP_ROOT.'users/dashboard'; ?>">Dashboard</a>
			<i class="fa fa-circle"></i>
		</li>
		<li>
			 <a href="javascript:void(0)" onClick='window.history.go(-1)' >Open orders</a>
			<i class="fa fa-circle"></i>
		</li>
		 <li>
			<span>Open order details</span>    
		</li>
	</ul>
</div>
<?php //echo "<pre>"; print_r($order); die; ?>
<!-- END PAGE HEADER-->
<div class="row">
    <div class="col-md-12">
      <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">   
            <div class="portlet-title">
                <div class="caption font-dark">
                    <i class="fa fa-shopping-cart"></i>
                    <span class="caption-subject bold uppercase">Open order detail</span>
                </div> 
				<h4 class="text-primary mt-0"><b>ID - <span><?= @$order->descrates_app_id; ?></span></b></h4>
				<ul class="list-inline mb-0 pull-right">
					<?php if($order->status==1){ ?>
					<li>
						<div class="caption pull-right">
							<a href="javascript:void(0);" class="assigned icon-btn btn green"><i class="fa fa-paper-plane"></i>
								<div><b> Assign</b> </div>
							</a>
						</div>
					</li>
					<?php } ?>    
					<li>
						<div class="caption pull-right">
							<a class="icon-btn btn blue" href="<?php echo HTTP_ROOT.'orders/track-order/'.@$order->descrates_app_id; ?>"><i class="fa fa-map-marker"></i>
								<div><b> Track</b> </div>
							</a>
						</div>
					</li>					
			   </ul>
            </div>  

              <div class="portlet-body form">
                <div class="row">
                  <div class="col-md-12">
                    <form role="form">
                      <div class="form-body">
                        <div class="row">
                          <div class="col-xs-12">
                            <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="commonDatatable">
								<thead>
									<tr>
										<th class="control text-center">
											<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
											   <input class="select_all checkboxes" value="1" type="checkbox">
											<span></span>
											</label>
										</th>
										<th class="all">Sr. no.</th>
										<th class="all">Package title</th>
										<th class="all">Package no.</th>
										<th class="all">Status</th>
										<th class="all">Action</th>
									</tr>
								</thead>
								<tbody>
								<?php 
									$i=1; 
									foreach ($order->order_packages as $package): 

										if(!in_array($package->id,$customPkgArr)){
											$customPkgArr[] = $package->id;
										/*
										if(in_array($authUser['role'], ['1','2'])){  
											$order_status = $package->order_assignment['status_by'];
										}else if(in_array( $authUser['role'], ['3'])){
											$order_status = $package->order_assignment['status_to'];
										}else{
											$order_status = $package->order_assignment['status_to'];
										}*/
										$order_status = $package->status;
										
								?>
								<tr>
									<td class="text-center">
										<?php if($order_status == 2 || $order_status == 3){
											echo '---';
										}else{ ?>
										<label class="mt-checkbox mt-checkbox-single mt-checkbox-outline text-center">
										   <input class="childrens checkboxes" name="packages" value="<?php echo $package->id; ?>" type="checkbox"><span></span></label>
										<?php } ?>
									</td>
									<td class="text-center"><?= $this->Number->format($i) ?></td>
									<td><?= $package->package_title; ?></td>
									<!-- <td><?= $package->package_number; ?></td> -->
									<td class="text-center sorting_1 bold">
										 <?= $this->Html->link(__($package->package_number), ['action' => 'package-detail', base64_encode(convert_uuencode($package->id))],['title' => 'Packages', 'escape' => false, 'class'=> ''] ) ?>
									</td>
									<td>
										<?php
										switch ($order_status){
											case 1:
												echo "Open";
												break;
											case 2:
												echo  "Assigned";
												break;
											case 3:
												echo "Completed";
												break;
											} 
										?>
									
									</td>
									<td>
										<?php if($order_status==2){ ?>
										<a href="<?php echo HTTP_ROOT.'orders/assignments-order/'.$package->order_id.'/'.$package->id; ?>">Assignment</a>
										<?php } ?>
									</td>
								</tr>
								<?php $i++; } endforeach; ?>
								
								</tbody>
							</table>
                          </div>
                          
                          <div class="col-xs-12"></div>
                        </div> 
                        
						<?php if(!empty($order->order_details)){ ?>
							<div class="ord-widget order_party_detail">
							  <h5 class="bold text-primary">Order's parties details</h5>	
							  
							  <div class="order_detail_sec">
								
								<?php 
								$i=1;
								foreach($order->order_details as $order_details_key => $order_details_val){ 
								
								?>
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
                        
                        <?php if(!empty($order->order_packages)){ ?>
                        <div class="ord-widget">
                          <div class="row ">
                            
                            <div class="col-sm-12 col-md-6 col-lg-4">
								
								<div class="well cust-info">
									<h5>Customer info</h5>
									<p><b>Name:</b>  <?=  ($order->customer_detail->name !='')?@ucfirst(@$order->customer_detail->name):"---";  ?></p>
									<p><b>Email:</b>  <?=  ($order->customer_detail->email !='')?@ucfirst(@$order->customer_detail->email):"---";  ?></p>
									<p><b>Phone:</b>  <?=  ($order->customer_detail->phone !='')?@ucfirst(@$order->customer_detail->phone):"---";  ?></p>
								</div>	
                              
                              
                            </div>
                            
                            <div class="col-sm-12 col-md-6 col-lg-4">
                              <div class="well cust-info">
                                <h5>Shipment info</h5>
								<p><b>Source:</b>  <?=  @$order->source;  ?></p>
                                <p><b>Destination:</b> <?=  @$order->destination;  ?></p>
                                <p><b>Pick up date:</b> <?= !empty($order->pickup_date) ? (date('M jS, Y', strtotime( $order->pickup_date ) )):"" ?></p>
                                <p><b>Drop off date:</b> <?= !empty($order->drop_off_date) ? (date('M jS, Y', strtotime( $order->drop_off_date ) )):"" ?></p>
                              </div>
                            </div>
                          </div>
                        </div>
                        <?php } ?>
                        
                        <?php if(!empty($order->order_locations)){ ?>
							<div class="ord-widget ">
							  <h5 class="bold text-primary">Order's location details</h5>	
							  
							  <div class="row ">
								
								<?php foreach($order->order_locations as $locationkey => $location){ ?>
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
                    </form>
                  </div>
                </div>
              </div>
            </div>
       
			<!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>


<!-- Order Assignment Form Popup  -->
<div id="responsive" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
				<h4 class="modal-title">Assign packages</h4>
			</div>
			<div class="modal-body">
				<div class="response">
				</div>
				<div class="row">
					<form class="horizontal-form" id="order_assign_to_agent" action="<?php echo HTTP_ROOT; ?>orders/assigned-main-orders-by-admin" role="form">
						<input type="hidden" value="<?= @$order->id; ?>" name="order_id" />
						<input type="hidden" value="" id="all_packages" name="all_packages" />
						<input type="hidden" id="current_url" value="<?php echo base64_encode(convert_uuencode(@$order->id)); ?>" name="current_url" />
                                        <div class="form-body">
						<div class="col-md-12 form-group">
							<label>Select packages <span class="required">*</span></label>
							<select name="packages[]" id="packages" multiple="" class="form-control">
								<?php 
								if(!empty($orderPackages)){ 
									foreach($orderPackages as $orderPkgKey=>$orderPkgVal){
								?>
									<option value="<?php echo $orderPkgKey; ?>"><?php echo $orderPkgVal; ?></option>
								<?php } 
								} ?>
							</select>
						</div>
						<div class="col-md-12 form-group">
				
							<div class="mt-radio-inline">
								<label class="mt-radio">
									<input name="optionsRadios" class="shipping_provider" id="agent" value="agent" checked="checked" type="radio"> Agent
									<span></span>
								</label>
								<label class="mt-radio">
									<input name="optionsRadios" class="shipping_provider" id="driver" value="driver" type="radio"> Driver
									<span></span>
								</label>
								<label class="mt-radio">
									<input name="optionsRadios" class="shipping_provider" id="thirdparty" value="thirdparty" type="radio"> 3rd party
									<span></span>
								</label>
							</div>
				
						</div>
						
						<div class="agent col-md-12 form-group">
							<label>Select agent <span class="required">*</span></label>
							
							<select name="agent" class="form-control agent_control bs-select">
								<option value="">Select agent</option>
								<?php 
								if(!empty($agentsLists)){ 
									foreach($agentsLists as $agentListsKey=>$agentListsVal){
								?>
									<option value="<?php echo $agentListsKey; ?>"><?php echo ucwords($agentListsVal); ?></option>
								<?php } 
								} ?>
								
								
							</select>
						
						</div>
						
						<div class="hide driver col-md-12 form-group">
							<label>Select driver <span class="required">*</span></label>
							
							<select name="driver" class="form-control driver_control">
								<option value="">Select driver</option>
								<?php 
								if(!empty($driversLists)){ 
									foreach($driversLists as $driversListsKey=>$driversListsVal){
								?>
									<option value="<?php echo $driversListsKey; ?>"><?php echo ucwords($driversListsVal); ?></option>
								<?php } 
								} ?>
								
								
							</select>
						
						</div>
						<div class="hide thirdparty col-md-6 form-group">
							<label>Select 3rd party <span class="required">*</span></label>
							
							<select name="thirdparty_providers" class="form-control thirdparty_control">
								<option value="">Select 3rd party</option>
								<?php 
								if(!empty($providers)){ 
									foreach($providers as $providersKey=>$providersVal){
								?>
									<option value="<?php echo $providersKey; ?>"><?php echo ucwords($providersVal); ?></option>
								<?php } 
								} ?>
								
								
							</select>
						</div>
						
						<div class="hide thirdparty col-md-6 form-group">
							<label>Tracking id <span class="required">*</span></label>
							<input type="text" name="tacking_id" class="form-control thirdparty_control">
						</div>
												
								<div class="col-md-6 form-group">
									<label>Assignment Source</label>
									<textarea name="source" class="form-control" rows="2"><?= @$order->source; ?></textarea>
								</div>
								<div class="col-md-6 form-group">
									<label>Assignment Destination</label>
									<textarea name="destination" placeholder="" class="form-control" rows="2"><?= @$order->destination; ?></textarea>
								</div>
								<div class="col-md-6 form-group">
									<label><b>Original Source</b></label>
									<textarea readonly name="org_source" class="form-control" rows="2"><?= @$order->source; ?></textarea>
								</div>
								<div class="col-md-6 form-group">
									<label><b>Original  Destination</b></label>
									<textarea readonly name="org_destination" placeholder="" class="form-control" rows="2"><?= @$order->destination; ?></textarea>
								</div>
						</div>
					</form>
				</div>
			</div>
		
	
			<div class="modal-footer">
				<button type="button" data-dismiss="modal" class="btn btn-outline dark">Close</button>
				<button type="button" class="btn green order_assign_to_agent">Save changes</button>
			</div>
		</div>	
	</div>
</div>
<!-- Order Assignment Form Popup End -->
<style>
.help-block.help-block-error {
  font-size: 12px;
  position: absolute;
  right: 15px;
}
</style>


<script>
	$(function(){
		$(".driver_control").attr('disabled',true);
		$(".thirdparty_control").attr('disabled',true);
		
		$(".select_all").click(function(){
			
			//Checked the all child checkboc when selcted all clicked
			if($(this).prop("checked")==true){
				$(".childrens").prop("checked", true);
			}else{
				$(".childrens").prop("checked", false);
			}
			
			//un-Checked the select all checkbox when children checkbox is un selcted
			$('.childrens').click(function(){
				if($(".childrens").length == $(".childrens:checked").length) {
					$(".select_all").prop("checked", true);
				}else {
					$(".select_all").prop("checked", false);            
				}
			});
		});
		
		$(".assigned").click(function(){
			var packages = [];
			$.each($("input[name='packages']:checked"), function(){            
				packages.push($(this).val());
				$('#packages option[value=' + $(this).val() + ']').attr('selected', true);
			});
			
			var selectedValue = packages.join(",");
			if(selectedValue==''){
				alert('Kindly select atleast one package from the list');
			}else{
				$('#responsive').modal('show');
			}
		});
		
		$('body').on('click','.order_assign_to_agent',function(){
			$('#order_assign_to_agent').submit();
		});		
		
		$('body').on('click','.shipping_provider',function(){
			if($.trim($(this).attr("id"))=="driver"){
				$(".agent").addClass('hide');
				$(".thirdparty").addClass('hide');
				$(".driver").removeClass('hide');
				
				$(".agent_control").attr('disabled',true);
				$(".thirdparty_control").attr('disabled',true);
				$(".driver_control").attr('disabled',false);
				
			}else if($.trim($(this).attr("id"))=="agent"){
				$(".agent").removeClass('hide');
				$(".driver").addClass('hide');
				$(".thirdparty").addClass('hide');
				
				$(".agent_control").attr('disabled',false);
				$(".driver_control").attr('disabled',true);
				$(".thirdparty_control").attr('disabled',true);
			}else if($.trim($(this).attr("id"))=="thirdparty"){
				$(".driver").addClass('hide');
				$(".agent").addClass('hide');
				$(".thirdparty").removeClass('hide');
				
				$(".thirdparty_control").attr('disabled',false);
				$(".driver_control").attr('disabled',true);
				$(".agent_control").attr('disabled',true);
			}
			
		});		
			
	});
</script>

