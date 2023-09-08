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
									<tr role="row">
                                  
										<th class="text-center all">Sr. no</th>
										<th class="all">Descartes id</th>
										<th class="all">Source</th>
										<th class="min-phone-l">Destination</th>
										<th class="none">Pick up date</th>
										<th class="none">Drop off date</th>
										<th class="none">Action</th>
									</tr>

								</thead>
								<tbody>
									<?php 
									if($this->request->action=='newOrders'){
										$actionRed = 'new-order-detail-driver';
									}else if($this->request->action=='rejectedOrders'){
										$actionRed = 'rejected-order-detail-driver';
									}else{
										$actionRed = 'open-order-detail';
									} 
									
									if(!empty($open_orders)){
										$j=1;
										foreach ($open_orders as $assigned_order):
										if($assigned_order['status']==1){
											$actionRed = 'new-order-detail-driver';
										}
									?>
									
									 <tr style="" class="odd" role="row">
                                    
										<td class="text-center">
											
											
											 <?= $assigned_order->order_assignment['order']['id']; ?>
											 
										</td>
										<td><?php echo $this->Html->link(__($assigned_order->order_assignment['order']['descrates_app_id']), ['controller'=>'orders','action' => $actionRed, base64_encode(convert_uuencode($assigned_order->order_assignment['order_package']['order_id']))],['title' => 'Packages', 'escape' => false, 'class'=> 'system_editIcon'] ); ?></td>
										<td><?php echo $assigned_order->order_assignment['order']['source']; ?></td>
										<td><?php echo $assigned_order->order_assignment['order']['destination']; ?></td>
										
										<td><?= !empty($assigned_order->order_assignment['order']['pickup_date']) ? (date('M jS, Y', strtotime( $assigned_order->order_assignment['order']['pickup_date'] ) )):"" ?></td>
										
										<td><?= !empty($assigned_order->order_assignment['order']['drop_off_date']) ? (date('M jS, Y', strtotime( $assigned_order->order_assignment['order']['drop_off_date'] ) )):"" ?></td>
										 <td class="actions">
											
											<?php  
												if($assigned_order['status']==1){
													echo $this->Form->postLink(__('<i class="fa fa-thumbs-o-up"></i> Accept'), ['action' => 'bulk-order-action', base64_encode(convert_uuencode($assigned_order['order_id'])),2], ['title' => 'Accept Order', 'escape' => false, 'class' => 'btn btn-outline btn-circle green btn-sm blue', 'confirm' => __('Are you sure you want to accept this order ?')]); 
													echo '<br/><br/>';
													echo $this->Form->postLink(__('<i class="fa fa-thumbs-o-down"></i> Reject'), ['action' => 'bulk-order-action', base64_encode(convert_uuencode($assigned_order['order_id'])),4], ['title' => 'Reject Order', 'escape' => false, 'class' => 'btn btn-outline btn-circle red btn-sm blue', 'confirm' => __('Are you sure you want to reject this order ?')]); 
												}else{
													echo '---';
												}
											?>
										</td> 
									</tr>
									
									<?php 
										$j++;
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

<script>
	$(function(){
		$(".filterByStatus").change(function(){
			var val_of_filter = this.value;
			window.location.href="<?php echo HTTP_ROOT;?>/orders/orders-listing/"+val_of_filter;
		});
	});
</script>

<!--style>
.portlet.light .dataTables_wrapper .dt-buttons {
  margin-top: -80px !important;
}
</style-->
