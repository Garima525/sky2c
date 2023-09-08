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
                                <?php if(!empty($assigned_orders)){
                                    $j=1;
                                    foreach ($assigned_orders as $assigned_order):
                                ?>
                                <tr style="" class="odd" role="row">
                                    
                                    <td class="text-center">
                                    
                                        
                                         <?= $this->Html->link(__($assigned_order->order_assignment['order']['id']), ['controller'=>'orders','action' => 'assign-order-detail', base64_encode(convert_uuencode($assigned_order->order_assignment['order']['id']))],['title' => 'Packages', 'escape' => false, 'class'=> 'system_editIcon'] ) ?>
                                         
                                    </td>
                                    <td><?php echo  $assigned_order->order_assignment['order_package']['package_number']; ?><br/>
                                    <?php echo  $assigned_order->order_assignment['order_package']['package_title']; ?>
                                    </td>
                                    <td><?= !empty($assigned_order->order_assignment['order']['pickup_date']) ? (date('Y-m-d', strtotime( $assigned_order->order_assignment['order']['pickup_date'] ) )):"" ?></td>
                                    
                                    <td><?= !empty($assigned_order->order_assignment['order']['drop_off_date']) ? (date('Y-m-d', strtotime( $assigned_order->order_assignment['order']['drop_off_date'] ) )):"" ?></td>
                                    
                                    <td><?php echo  $assigned_order->order_assignment['order']['source']; ?></td>
                                    
                                    <td><?php echo $assigned_order->order_assignment['order']['destination']; ?></td>
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
