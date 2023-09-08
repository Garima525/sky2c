<div class="page-bar">
		<ul class="page-breadcrumb">
			<li>
				<a href="<?= HTTP_ROOT.'users/dashboard'; ?>">Dashboard</a>
                <i class="fa fa-circle"></i>
			</li>
			<li>
				<span>Import orders</span>
			</li>
		</ul>
		
</div>
<!-- END PAGE BAR -->

<!-- END PAGE HEADER-->
<!-- BEGIN DASHBOARD STATS 1-->

<div class="clearfix"></div>
<!-- END DASHBOARD STATS 1-->

<div class="row">
  <div class="col-md-12">
    <div class="portlet light bordered">
      <div class="portlet-body form">
        <div class="row">
          <div id="tab_1" class="tab-pane active">
				<div class="portlet box blue">
					<div class="portlet-title">
						<div class="caption">
							<i class="fa fa-arrow-down"></i>Import descartes orders 
						</div>
						<div class="tools">
							<a class="collapse" href="javascript:;"  data-toggle="tooltip" title="Collapse/Expand"> </a>
						</div>
					</div>
						<div class="portlet-body form">
          
							<?php echo $this->Form->create($orders,[
							'url' 		=> ['controller' => 'Orders', 'action' => 'import-orders'],
							'class'		=>'horizontal-form',
							'id'		=>'import_order',
							'enctype'	=>'multipart/form-data',
							'novalidate'=>'novalidate',
							'autocomplete'=>'off'
							]); ?>
						  <div class="form-body">
							<h3 class="form-section">Upload descartes orders XML file <span style="color:red"class="required">*</span></h3>
																									
							
							<div class="row">
								<div class="col-md-12">
									
									<div class="form-group" >
									  <label for="exampleInputPassword1">
									  </label>
									  <div >
										 <input type="file" name="order_file">    
									  </div>
									</div>
									
								  
								</div>
							</div>
							
						</div>		
						 <div class="form-actions right">
								<button type="button"  class="btn default" onclick="window.history.go(-1);"  >Cancel</button>
								<button id="send" type="submit" class="btn blue"><i class="fa fa-check"></i> Save</button>
								
						  <p class="note_msg">* Customer will created automatically and get associate with this order.</p>
						  </div>
						  
						 <?php echo $this->form->end(); ?>
					 </div>
					
					</div>
				</div>
			</div>		
         
         
        </div>
      </div>
    </div>
  </div>
</div>

<?php echo $this->element('adminElements/phone_drop_down'); ?>

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>
