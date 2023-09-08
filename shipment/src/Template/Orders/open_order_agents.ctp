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
                    <!--<div class="portlet-title">
                            <ul class="list-inline mb-0 ">
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
                            </ul>
                    </div>-->
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="commonDatatable">
                       
                            <thead>
                                <tr role="row">
                                  <th aria-label="" colspan="1" rowspan="1" class="control sorting_disabled text-center ">Order id
                                  </th>
                                  <th aria-label="" colspan="1" rowspan="1" class="control sorting_disabled text-center ">Package no
                                  </th>
                                  <th colspan="1" rowspan="1" aria-controls="sample_2" tabindex="0" class="min-tablet sorting_disabled">Pickup date
                                  </th>
                                  <th colspan="1" rowspan="1" aria-controls="sample_2" tabindex="0" class="min-tablet sorting_disabled">Drop off date
                                  </th>
                                  <th colspan="1" rowspan="1" aria-controls="sample_2" tabindex="0" class="min-tablet sorting_disabled">Source
                                  </th>
                                  <th colspan="1" rowspan="1" aria-controls="sample_2" tabindex="0" class="min-tablet sorting_disabled">Destination
                                  </th>
                                </tr>

                            </thead>
                            <tbody>
                                <?php if(!empty($open_orders)){
                                    $i=1;
                                    foreach ($open_orders as $open_order):
                                ?>
                                <tr style="" class="odd" role="row">
                                    <td class="text-center">
                                    
                                        
                                         <?= $this->Html->link(__($open_order->order['id']), ['controller'=>'orders','action' => 'order-detail', base64_encode(convert_uuencode($open_order->order['id']))],['title' => 'Packages', 'escape' => false, 'class'=> 'system_editIcon'] ) ?>
                                         
                                    </td>
                                    <td><?= !empty($open_order->order_package['package_number']) ? $open_order->order_package['package_number']:"" ?><br/><?= !empty($open_order->order_package['package_title']) ? $open_order->order_package['package_title']:"" ?></td>
                                    <td><?= !empty($open_order->order['pickup_date']) ? (date('M jS, Y', strtotime( $open_order->order['pickup_date'] ) )):"" ?></td>
                                    
                                    <td><?= !empty($open_order->order['drop_off_date']) ? (date('M jS, Y', strtotime( $open_order->order['drop_off_date'] ) )):"" ?></td>
                                    
                                    <td><?php echo  $open_order->order['source']; ?></td>
                                    
                                    <td><?php echo  $open_order->order['destination']; ?></td>
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

<script>
	$(function(){
		$(".filterByStatus").change(function(){
			var val_of_filter = this.value;
			window.location.href="<?php echo HTTP_ROOT;?>/orders/orders-listing/"+val_of_filter;
		});
	});
</script>
