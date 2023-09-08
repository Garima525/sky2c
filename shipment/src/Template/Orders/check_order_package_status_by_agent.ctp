<script src="<?php echo HTTP_ROOT;?>js/form-validation.js"></script>
<?php if($msg=='orderassignedalready'){ ?>
	<div class="response">
	</div>
	<div class="row">
		<div class="col-md-12">
			<h4>All packages are assinged of this order. Kindly choose another order</h4>
		</div>		
	</div>
<?php }else{ ?>
	<div class="response">
				</div>
				<div class="row">
					<form class="horizontal-form" id="order_assign_to_driver" action="<?php echo HTTP_ROOT; ?>orders/assign-order-packages-by-agent" role="form">
						<input type="hidden" value="<?= @$orderId; ?>" name="order_id" />
						<input type="hidden" id="current_url" value="<?php echo base64_encode(convert_uuencode(@$orderId)); ?>" name="current_url" />
						<div class="col-md-12 form-group">
							<label>Select packages <span class="required">*</span></label>
							<select name="packages[]" id="my_packages" multiple="" class="form-control">
								<?php 
								if(!empty($remainingPackages)){ 
									foreach($remainingPackages as $orderPkgKey=>$orderPkgVal){
								?>
									<option selected value="<?php echo $orderPkgKey; ?>"><?php echo $orderPkgVal; ?></option>
								<?php } 
								} ?>
							</select>
						</div>
						<div class="col-md-12 form-group">
							
								<div class="mt-radio-inline">
									<label class="mt-radio">
										<input name="optionsRadios" class="shipping_provider" id="self" value="self" checked="checked" type="radio"> Self
										<span></span>
									</label>
									<label class="mt-radio">
										<input name="optionsRadios" class="shipping_provider" id="driver" value="driver" type="radio"> Driver
										<span></span>
									</label>
									<!--<label class="mt-radio">
										<input name="optionsRadios" class="shipping_provider" id="thirdparty" value="thirdparty" type="radio"> 3rd party
										<span></span>
									</label>-->
									
								</div>
							
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
						<!--
						<div class="hide thirdparty col-md-6 form-group">
							<label>Select 3rd party</label>
							
							<select name="thirdparty_providers" class="form-control thirdparty_control">
								<option value="">Select 3rd party</option>
								<?php 
								if(!empty($providers)){ 
									foreach($providers as $providersKey=>$providersVal){
								?>
									<option value="<?php echo $providersKey; ?>"><?php echo $providersVal; ?></option>
								<?php } 
								} ?>
								
								
							</select>
						</div>
						
						<div class="hide thirdparty col-md-6 form-group">
							<label>Tracking id</label>
							<input type="text" name="tacking_id" class="form-control thirdparty_control">
						</div>-->
						
						<div class="col-md-6 form-group">
							<label>Source</label>
							<textarea name="source" class="form-control" rows="2"><?php echo ($OrderAssignments[0]['order']['destination'] !='')?$OrderAssignments[0]['order']['destination']:''; ?></textarea>
						</div>
						<div class="col-md-6 form-group">
							<label>Destination</label>
							<textarea name="destination" placeholder="" resize class="form-control" rows="2"><?php echo ($OrderAssignments[0]['order']['destination'] !='')?$OrderAssignments[0]['order']['destination']:''; ?></textarea>
						</div>						
								
					</form>
				</div>
	
<?php } ?>

<script>
	$(function(){
		$(".thirdparty_control").attr('disabled',true);
		$(".driver_control").attr('disabled',true);
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
				$('#my_packages option[value=' + $(this).val() + ']').attr('selected', true);
			});
			
			var selectedValue = packages.join(",");
			
			if(selectedValue==''){
				alert('Kindly select atleast one package from the list');
			}else{
				$('#responsive').modal('show');
			}
		});
		
		$('body').on('click','.order_assign_to_driver',function(){
			$('#order_assign_to_driver').submit();
		});		
		$('body').on('click','.shipping_provider',function(){
			if($.trim($(this).attr("id"))=="self"){
				$(".thirdparty").addClass('hide');
				$(".driver").addClass('hide');
				
				$(".thirdparty_control").attr('disabled',true);
				$(".driver_control").attr('disabled',true);
				
			}else if($.trim($(this).attr("id"))=="driver"){
				$(".thirdparty").addClass('hide');
				$(".driver").removeClass('hide');
				
				$(".thirdparty_control").attr('disabled',true);
				$(".driver_control").attr('disabled',false);
				
			}else if($.trim($(this).attr("id"))=="thirdparty"){
				$(".driver").addClass('hide');
				$(".thirdparty").removeClass('hide');
				
				$(".thirdparty_control").attr('disabled',false);
				$(".driver_control").attr('disabled',true);
			}
			
		});		
			
	});
</script>
<style>
.help-block.help-block-error {
  font-size: 12px;
  position: absolute;
  right: 15px;
}
</style>
