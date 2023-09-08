<!-- END PAGE HEADER-->
<div class="loaderImage"></div>
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
                    <div class="portlet-title">
                            <!--<ul class="list-inline mb-0 ">
                                <li class="">
                                   <div class="form-group update-option-position">
                                        <label><b>Filter By Status</b></label>
                                        <select class="form-control filterByStatus">
                                            <option <?php echo  (@$filter=='open')?"selected":'';?> value='open'>Open</option>
                                            <option <?php echo  (@$filter=='assigned')?"selected":'';?> value='assigned'>Assigned</option>
                                            <option <?php echo  (@$filter=='completed')?"selected":'';?> value='completed'>Completed</option>
                                            <option <?php echo  (@$filter=='')?"selected":'';?> value=''>All</option>
                                        </select>
                                   </div>
                                </li>
                            </ul>-->
                    </div>
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
                                    <?php if($this->request->action=='openOrders' &&  (isset($authUser['role']) && in_array( $authUser['role'], ['3']))){ ?>
										<th class="none">Action</th> 
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($open_orders)){
                                    $i=1;
                                    foreach ($open_orders as $open_order):
                                ?>
                                <tr style="" class="odd" role="row">
									<td class="text-center"><?= $this->Number->format($i) ?></td>
                                    <td class="text-center">
										<?= $this->Html->link(__($open_order['order']['descrates_app_id']), ['action' => 'open-order-detail', base64_encode(convert_uuencode($open_order['order']['id']))],['title' => 'Packages', 'escape' => false, 'class'=> 'system_editIcon'] ) ?>
                                    </td>
                                    <td><?php echo $open_order['order']['source']; ?></td>
                                    <td><?php echo $open_order['order']['destination']; ?></td>
									<td><?= !empty($open_order['order']['pickup_date']) ? (date('M jS, Y', strtotime( $open_order['order']['pickup_date'] ) )):"" ?></td>
									<td><?= !empty($open_order['order']['drop_off_date']) ? (date('M jS, Y', strtotime( $open_order['order']['drop_off_date'] ) )):"" ?></td>
                                    
                                    <?php if($this->request->action=='openOrders' &&  (isset($authUser['role']) && in_array( $authUser['role'], ['3']))){ ?>
										<td>
											<a href="javascript:void(0);" class="assignOrderToAgent btn btn-outline green btn-sm width90" data-id="<?= $open_order['order']['id']; ?>">
											   <i class="fa fa-paper-plane"></i> Assign
											</a>
											<div class="clearfix">&nbsp;</div>
											<a href="<?php echo HTTP_ROOT.'orders/track-order/'.$open_order['order']['descrates_app_id']; ?>" class="btn btn-outline red btn-sm width90">
											   <i class="fa fa-map-marker"></i> Track
											</a>
                                            <div class="clearfix">&nbsp;</div>
                                            <a data-href="<?php echo HTTP_ROOT.'orders/complete-order-status/'.$open_order['order']['id']; ?>" href="javascript:void(0)" data-redirect="<?php echo HTTP_ROOT.'orders/completed-orders';?>" class="btn btn-outline green btn-sm width90 markComplete">
                                               <i class="fa fa-check"></i> Mark As Complete
                                            </a>
										</td>
									<?php } ?>
                                </tr>
                                <?php 
                                    $i++;
                                    endforeach;
                                    }else{
                                ?>
                                   
                                <?php
                                }
                                ?>
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
				<h4 class="modal-title">Assign packages</h4>
			</div>
			
			<div class="modal-body orderPkgData">
			
			</div>
			
			<div class="modal-footer">
				<button type="button" data-dismiss="modal" class="btn btn-outline dark">Close</button>
				<button type="button" class="btn green order_assign_to_driver">Save changes</button>
			</div>
		</div>
	</div>
</div>
<!-- Order Assignment Form Popup End -->

<script>
	$(function(){			
		$(".assignOrderToAgent").click(function(){
			
			$.ajax({
				url: "<?php echo HTTP_ROOT; ?>orders/check-order-package-status-by-agent",//AJAX URL WHERE THE LOGIC HAS BUILD
				data:{orderid:$(this).data('id')},//ALL SUBMITTED DATA FROM THE FORM
				 
				success:function(res)
				{
					$('.orderPkgData').html(res);	
					$('#responsive').modal('show');	
										
				}
			});
			
		});		
	});//MAIN DOCUMENT READY BRACES OFF
</script>

