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
                    <div class="portlet-title">
                            <ul class="list-inline mb-0 ">
                                <li class="">
                                   <div class="form-group update-option-position">
                                        <label><b>Filter by status</b></label>
                                        <select class="form-control filterByStatus">
                                            <option <?php echo  (@$filter=='open')?"selected":'';?> value='open'>Open</option>
                                            <option <?php echo  (@$filter=='assigned')?"selected":'';?> value='assigned'>Assigned</option>
                                            <option <?php echo  (@$filter=='completed')?"selected":'';?> value='completed'>Completed</option>
                                            <option <?php echo  (@$filter=='')?"selected":'';?> value=''>All</option>
                                        </select>
                                   </div>
                                </li>
                            </ul>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="commonDatatable">
                            <thead>
                                <tr>
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
                            $i=1;
                            foreach ($orders as $order): ?>
                            <tr>
                                <td class="text-center"><?= $this->Number->format($i) ?></td>
                                <td class="text-center sorting_1 bold">
                                     <?= $this->Html->link(__($order->descrates_app_id), ['action' => 'order-detail', base64_encode(convert_uuencode($order->id))],['title' => 'Packages', 'escape' => false, 'class'=> 'system_editIcon'] ) ?>
                                </td>
                                <td><?= $order->source; ?></td>
                                <td><?= $order->destination; ?></td>
                                <td><?= !empty($order->pickup_date) ? (date('M jS, Y', strtotime( $order->pickup_date ) )):"" ?></td>
                                <td><?= !empty($order->drop_off_date) ? (date('M jS, Y', strtotime( $order->drop_off_date ) )):"" ?></td>
                                <td><?php
                                      
                                    
                                        switch ($order->status) {
                                                case 1:
                                                   echo "Open";
                                                    break;
                                                case 2:
                                                    echo  "Assigned";
                                                    break;
                                                case label3:
                                                    echo "Completed";
                                                    break;
                                        } ?>
                                </td>
                            </tr>
                            <?php $i++; endforeach; ?>
                            
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
