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
                    <span class="caption-subject bold uppercase"> Enrouted Orders management</span>
                </div>
            </div> 
            
            <div class="portlet-body">
                <div class="portlet light bordered">
                    
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="commonDatatable">
                       
                           <thead>
                                <tr role="row">
                                  
									<th class="text-center all">Order id</th>
                                    <th class="all">Descartes id</th>
                                    <th class="all">Source</th>
                                    <th class="min-phone-l">Destination</th>
                                    <th class="none">Pick up date</th>
                                    <th class="none">Drop off date</th>
                                </tr>

                            </thead>
                            <tbody>
                                <?php if(!empty($assigned_orders)){
                                    $j=1;
                                    foreach ($assigned_orders as $assigned_order):
                                ?>
                                <tr style="" class="odd" role="row">
                                    
                                    <td class="text-center">
                                    
                                        
                                    <?= $assigned_order->order_assignment['order']['id']; ?>
                                         
                                    </td>
                                    <td><?php echo $this->Html->link(__($assigned_order->order_assignment['order']['descrates_app_id']), ['controller'=>'orders','action' => 'assigned-order-detail', base64_encode(convert_uuencode($assigned_order->order_assignment['order']['id']))],['title' => 'Packages', 'escape' => false, 'class'=> 'system_editIcon'] ); ?></td>
                                    <td><?php echo $assigned_order->order_assignment['order']['source']; ?></td>
                                    <td><?php echo $assigned_order->order_assignment['order']['destination']; ?></td>
                                    
                                    <td><?= !empty($assigned_order->order_assignment['order']['pickup_date']) ? (date('Y-m-d', strtotime( $assigned_order->order_assignment['order']['pickup_date'] ) )):"" ?></td>
                                    
                                    <td><?= !empty($assigned_order->order_assignment['order']['drop_off_date']) ? (date('Y-m-d', strtotime( $assigned_order->order_assignment['order']['drop_off_date'] ) )):"" ?></td>
                                  
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
<!--style>
.portlet.light .dataTables_wrapper .dt-buttons {
  margin-top: -80px !important;
}
</style-->
