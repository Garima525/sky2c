<!-- END PAGE HEADER-->
<div class="page-bar">
	<ul class="page-breadcrumb">
		<li>
			<a href="<?= HTTP_ROOT.'users/dashboard'; ?>">Dashboard</a>
			<i class="fa fa-circle"></i>
		</li>
		<li>
			<span><?php echo str_replace("-"," ",$order_status); ?></span>
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
                    <span class="caption-subject bold uppercase"> <?php echo str_replace("-"," ",$order_status); ?></span>
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
									if(!empty($orders)){
										$j=1;
										foreach ($orders as $order_detail):
									?>
									
									 <tr style="" class="odd" role="row">
                                    
										<td class="text-center">
											<?php echo $j; ?>
										</td>
										<td class="text-center">
											<?php echo $order_detail['descrates_app_id']; ?>
										</td>
										<td class="text-center">
											<?php echo $order_detail['source']; ?>
										</td>
										<td class="text-center">
											<?php echo $order_detail['destination']; ?>
										</td>
										<td class="text-center">
											<?= !empty($order_detail->drop_off_date) ? (date('M jS, Y', strtotime( $order_detail->drop_off_date ) )):"" ?>
										</td>
										<td class="text-center">
											<?= !empty($order_detail->drop_off_date) ? (date('M jS, Y', strtotime( $order_detail->drop_off_date ) )):"" ?>
										</td>
										<td class="text-center">
											<a href="<?php echo HTTP_ROOT.'orders/track-order/'.$order_detail->descrates_app_id; ?>" class="btn btn-outline red btn-sm width90"><i class="fa fa-map-marker"></i> Track</a>
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

