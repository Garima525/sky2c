<div class="page-bar">
	<ul class="page-breadcrumb">
		<li>
			<a href="<?= HTTP_ROOT.'users/dashboard'; ?>">Dashboard</a>
			<i class="fa fa-circle"></i>
		</li>
		<li>
			 <a href="<?= HTTP_ROOT.'orders/orders-listing'; ?>">Orders</a>
			<i class="fa fa-circle"></i>
		</li>
		 <li>
			<span>Order details</span>
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
                    <span class="caption-subject bold uppercase"> Order detail</span>
                </div>
            </div>  

              <div class="portlet-body form">
                <div class="row">
                  <div class="col-md-12">
            
                    <form role="form">
                      <div class="form-body">
                        <h4 class=" text-primary mt-0">
                          <b>ID - 
                            <span><?= @$order->descrates_app_id; ?>
                            </span>
                          </b>
                        </h4>
                        <hr>
                        <div class="row">
                          <div class="col-xs-12">
                            <ul class="list-inline mb-0 ">
                                 <li><div class="caption font-green pull-right">
                                      <a href="#" class="icon-btn ">
                                                            <i class="fa fa-paper-plane"></i>
                                                            <div><b> Assign</b> </div>
                                                        </a>
                                       
                                    </div></li>
                                    
                                     <li><div class="caption font-green pull-right">
                                      <a href="<?php echo HTTP_ROOT.'orders/track-order/'.@$order->descrates_app_id; ?>" class="icon-btn ">
                                                            <i class="fa fa-map-marker"></i>
                                                            <div><b> Track</b> </div>
                                                        </a>
                                       
                                    </div></li> 
                           </ul>
                           <hr>
                            <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="commonDatatable">
                            <thead>
                                <tr>
                                    <th class="control sorting_disabled text-center" rowspan="1" colspan="1" aria-label="">
                                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                           <input class="select_all checkboxes" value="1" type="checkbox">
                                        <span></span>
                                        </label>
                                    </th>
                                    <th class="all">Sr. no.</th>
                                    <th class="all">Package title</th>
                                    <th class="all">Package no.</th>
                                    <th class="all">Source</th>
                                    <th class="all">Destination</th>
                                    <th class="all">Pick up date</th>
                                    <th class="all">Drop off date</th>
                                    <th class="all">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            $i=1;
                            foreach ($order->order_packages as $package): ?>
                            <tr>
                                <td class="text-center">
                                    <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                        <input class="childrens checkboxes" name="packages" value="<?= $package->package_id; ?>" type="checkbox">
                                    <span></span>
                                    </label>
                                </td>
                                <td class="text-center"><?= $this->Number->format($i) ?></td>
                                <td><?= $package->package_title; ?></td>
                                <td><?= $package->package_number; ?></td>
                                <td><?= $package->order_assignment['source']; ?></td>
                                <td><?= $package->order_assignment['destination']; ?></td>
                                <td><?= !empty($order->pickup_date) ? (date('M jS, Y', strtotime( $order->pickup_date ) )):"" ?></td>
                                <td><?= !empty($order->drop_off_date) ? (date('M jS, Y', strtotime( $order->drop_off_date ) )):"" ?></td>
                                <td><?php

                                    if(in_array( $authUser['role'], ['1','2'])){  
                                        $order_status = $package->order_assignment['status_by'];
                                    }else if(in_array( $authUser['role'], ['3'])){
                                        $order_status = $package->order_assignment['status_to'];
                                    }else{
                                        $order_status = $package->order_assignment['status_to'];
                                    }
                                     
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
                                        } ?>
                                </td>
                            </tr>
                            <?php $i++; endforeach; ?>
                            
                            </tbody>
                        </table>
                          </div>
                          <div class="col-xs-12">
                            <hr class="mt-0">
                          </div>
                        </div>   
                        <div class="ord-widget">
                          <div class="row ">
                            <div class="col-sm-12 col-md-6">
                              <div class="well cust-info">
                                <h5>Customer info
                                </h5>
                                <address>
                                 <?= ucfirst(@$order->customer_detail->name); ?>
                                  <br>
                                    <?=  @$order->customer_detail->email; ?>
                                  <br>
                                  <?=  @$order->customer_detail->phone; ?>
                                </address>
                              </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                              <div class="well cust-info">
                                <h5>Shipment info
                                </h5>
                                <b>Source:</b>  <?=  @$order->source;  ?>
                                <br>
                                <b>Destination:</b> <?=  @$order->destination;  ?>
                                <br>
                                <b>Pick up date:</b> <?= !empty($order->pickup_date) ? (date('M jS, Y', strtotime( $order->pickup_date ) )):"" ?>
                                <br>
                                <b>Drop off date:</b> <?= !empty($order->drop_off_date) ? (date('M jS, Y', strtotime( $order->drop_off_date ) )):"" ?>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
       
<!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>

<script>
	$(function(){
		$(".select_all").click(function(){
			alert(this(':checked'));		
			if(this(':checked')==true){
				$("input[class='packages']:").attr('checked',true);
			}else{
				$("input[class='packages']:").attr('checked',false);
			}	
			/*var packages = [];
            $.each($("input[class='packages']:checked"), function(){            
                packages.push($(this).val());
            });*/
		})
	});
</script>
