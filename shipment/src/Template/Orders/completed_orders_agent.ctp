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
                    <span class="caption-subject bold uppercase"> Completed Orders management</span>
                </div>
            </div> 
            
            <div class="portlet-body">
                <div class="portlet light bordered">
                    
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="commonDatatable">
                       
                            <thead>
									<tr role="row">
                                  
										<th class="text-center all">#</th>
										<th class="all">Descartes id</th>
										<th class="all">Source</th>
										<th class="min-phone-l">Destination</th>
										<th class="none">Pick up date</th>
										<th class="none">Drop off date</th>
										<th class="none">Status</th>
									</tr>


								</thead>
								<tbody>
									<?php 
									//echo "<pre>"; print_r($completed_orders); die;
									if(!empty($completed_orders)){
										$j=1;
										foreach ($completed_orders as $completed_order):
									?>
									 <tr style="" class="odd" role="row">
                                    
										<td class="text-center">
											
											
											 <?=  $completed_order->order['id']; ?>
											 
										</td>
										<td><?php echo $this->Html->link(__($completed_order->order['descrates_app_id']), ['controller'=>'orders','action' => 'completed-order-detail', base64_encode(convert_uuencode($completed_order->order['id']))],['title' => 'Packages', 'escape' => false, 'class'=> 'system_editIcon'] ); ?></td>
										<td><?php echo $completed_order->order['source']; ?></td>
										<td><?php echo $completed_order->order['destination']; ?></td>
										
										<td><?= !empty($completed_order->order['pickup_date']) ? (date('M jS, Y', strtotime( $completed_order->order['pickup_date'] ) )):"" ?></td>
										
										<td><?= !empty($completed_order->order['drop_off_date']) ? (date('M jS, Y', strtotime($completed_order->order['drop_off_date'] ) )):"" ?></td>
										 <td class="actions">
											
											<?php  
												if($completed_order->order['status']==1){
													echo 'Opne';
												}else if($completed_order->order['status']==2){
													echo 'Assigned';
												}else if($completed_order->order['status']==3){
													echo 'Completed';
												}else if($completed_order->order['status']==4){
													echo 'Enrouted';
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
<style>
table.dataTable tbody td{
  padding:8px 0 8px 4px !important;
}
</style>
