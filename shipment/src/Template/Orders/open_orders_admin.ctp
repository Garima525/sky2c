<link href="<?php echo HTTP_ROOT;?>assets/global/plugins/bootstrap-modal/css/bootstrap-modal-bs3patch.css" rel="stylesheet" type="text/css" />
<!-- END PAGE HEADER-->
<div class="page-bar">
	<ul class="page-breadcrumb">
		<li>
			<a href="<?= HTTP_ROOT.'users/dashboard'; ?>">Dashboard</a>
			<i class="fa fa-circle"></i>
		</li>
		<li>
			<span>Orders </span>
		</li>
	</ul>
</div>                 
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->

        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <i class="fa fa-shopping-cart"></i>
                    <span class="caption-subject bold uppercase"> Orders management</span>
                </div>
            </div> 
            
            <div class="portlet-body">
                <div class="portlet light bordered">
         
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="commonDatatable">
                            <thead>
                                <tr>
                                    <th class="text-center all">Sr. no</th>
                                    <th class="all">Descartes id</th>
                                    <th class="all">Source</th>
                                    <th class="min-phone-l">Destination</th>
                                    <th class="none">Pick up date</th>
                                    <th class="none">Drop off date</th>
                                    <?php if($this->request->action=='openOrders' &&  (isset($authUser['role']) && in_array( $authUser['role'], ['1']))){ ?>
										<th class="none">Action</th> 
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            $i=1;
                            if(!empty($orders)){
                            foreach ($orders as $order): ?>
                            <tr>
                                <td class="text-center"><?= $this->Number->format($i) ?></td>
                                <td class="text-center sorting_1 bold">
                                     <?= $this->Html->link(__($order->descrates_app_id), ['action' => 'open-order-detail', base64_encode(convert_uuencode($order->id))],['title' => 'Packages', 'escape' => false, 'class'=> 'system_editIcon'] ) ?>
                                </td>
                                <td><?= $order->source; ?></td>
                                <td><?= $order->destination; ?></td>
                                <td><?= !empty($order->pickup_date) ? (date('M jS, Y', strtotime( $order->pickup_date ) )):"" ?></td>
                                <td><?= !empty($order->drop_off_date) ? (date('M jS, Y', strtotime( $order->drop_off_date ) )):"" ?></td>

                                <?php if($this->request->action=='openOrders' &&  (isset($authUser['role']) && in_array( $authUser['role'], ['1']))){ ?>
									<td>
										<a href="javascript:void(0);" data-id="<?= $order->id; ?>" class="assignOrderToAgent btn btn-outline green btn-sm width90">
										   <i class="fa fa-paper-plane"></i> Assign
										</a>
										<div class="clearfix">&nbsp;</div>
										<a href="<?php echo HTTP_ROOT.'orders/track-order/'.$order->descrates_app_id; ?>" class="btn btn-outline red btn-sm width90">
										   <i class="fa fa-map-marker"></i> Track
										</a>
									</td>
                                <?php } ?>
                                
                                <!-- <td><?php
                                      
                                    
                                        switch ($order->status) {
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
                                </td> -->
                            </tr>
                            <?php $i++; endforeach; } ?>
                            
                            </tbody>
                        </table>
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
				<h4 class="modal-title">Assign order</h4>
			</div>
			
			<div class="modal-body orderPkgData">
				
			</div>
			
			<div class="modal-footer">
				<button type="button" data-dismiss="modal" class="btn btn-outline dark">Close</button>
				<button type="button" class="btn green order_assign_to_agent">Save changes</button>
			</div>
		</div>
	</div>
</div>
<!-- Order Assignment Form Popup End -->

<script>
	$(function(){
		
		$(".driver_control").attr('disabled',true);
				
		$(".assignOrderToAgent").click(function(){
			
			$.ajax({
				url: "<?php echo HTTP_ROOT; ?>orders/check-order-package-status-by-admin",//AJAX URL WHERE THE LOGIC HAS BUILD
				data:{orderid:$(this).data('id')},//ALL SUBMITTED DATA FROM THE FORM
				 
				success:function(res)
				{
					$('.orderPkgData').html(res);	
					$('#responsive').modal('show');	
										
				}
			});
			
		});
		
		$('body').on('click','.order_assign_to_agent',function(){
			$('#order_assign_to_agent').submit();
		});		
		
		$('body').on('click','.shipping_provider',function(){
			if($.trim($(this).attr("id"))=="driver"){
				$(".agent").addClass('hide');
				$(".driver").removeClass('hide');
				
				$(".agent_control").attr('disabled',true);
				$(".driver_control").attr('disabled',false);
				
			}else if($.trim($(this).attr("id"))=="agent"){
				$(".agent").removeClass('hide');
				$(".driver").addClass('hide');
				
				$(".agent_control").attr('disabled',false);
				$(".driver_control").attr('disabled',true);
			}
			
		});		
	
	});//MAIN DOCUMENT READY BRACES OFF
</script>
<!--style>
.portlet.light .dataTables_wrapper .dt-buttons {
  margin-top: -80px !important;
}
</style-->
