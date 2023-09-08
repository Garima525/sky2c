<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <a href="<?= HTTP_ROOT.'users/dashboard'; ?>">Dashboard</a>
            <i class="fa fa-circle"></i>
        </li>
         <li>
            <span>QR Code</span>
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
                    <i class="fa fa-barcode"></i>
                    <span class="caption-subject bold uppercase"> Generate QR Code</span>
                </div>
            </div>  

            <div class="portlet-body form">
                <?php 
                    echo $this->Form->create('Order',[
                      'url'     => ['controller' => 'Orders', 'action' => 'generate-qr-code'],
                      'class'   =>'horizontal-form',
                      'id'    =>'usersAdd',
                      'enctype' =>'multipart/form-data',
                      'novalidate'=>'novalidate',
                      'autocomplete'=>'off'
                      ]); 
                ?>
                
                    <div class="form-body">
                        <div class="row"> 
                            
                            <div class="col-md-6">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Order ID <span class="required" aria-required="true">*</span>
                                        </label>
                                        <div>
                                            <?php 
                                                echo $this->Form->input('order_id',[
                                               'label' => false,
                                               'type'  => 'text',
                                               'required' => true,
                                               'class'=>'form-control']);
                                            ?>
                                        </div>
                                    </div>
                                </div>
        
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Package Number <span class="required" aria-required="true">*</span></label>
                                        <div>
                                            <?php 
                                                echo $this->Form->input('package_number',[
                                               'label' => false,
                                               'type'  => 'text',
                                               'required' => true,
                                               'class'=>'form-control']);
                                            ?>
                                        </div>
                                    </div>                
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <?php 
                                    if(isset($code) && $code!=""){
                                        echo $code;
                                    }
                                    if(isset($code1) && $code1!=""){
                                        echo $code1;
                                    }
                                ?>
                            </div>
                            
                        </div></br>
                    </div>
                    <div class="form-actions left">
                        <button id="send" type="submit" class="btn blue"><i class="fa fa-check"></i> Submit</button>
                    </div>
                
                <?php echo $this->form->end(); ?>
            </div>
        </div>       
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>


