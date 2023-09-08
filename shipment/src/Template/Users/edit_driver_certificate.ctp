<div class="page-bar">
      <ul class="page-breadcrumb">
      <li>
        <a href="<?= HTTP_ROOT.'users/dashboard'; ?>">Dashboard</a>
                <i class="fa fa-circle"></i>
      </li>
      <li>
        <a href="<?= HTTP_ROOT.'users/driver-certificates'; ?>">Certificate management</a>
                <i class="fa fa-circle"></i>
      </li>
       <li>
        <span>Edit driver certificate</span>
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
              <i class="fa fa-file"></i>Edit certificate</div>
              <div class="tools">
                <a class="collapse" href="javascript:;" data-original-title="" title=""> </a>
              </div>
            </div>
            <div class="portlet-body form">
          
              <?php echo $this->Form->create($userDetail,[
                  'url'     => ['controller' => 'Users', 'action' => 'edit-driver-certificate', $userDetail->convertedId],
                  'class'   =>'horizontal-form',
                  'id'    =>'addDriverCertificate',
                  'enctype' =>'multipart/form-data',
                  'novalidate'=>'novalidate'
                   // 'autocomplete'=>'off',
              ]); ?>    
              <div class="form-body">
              <h3 class="form-section">Document info</h3>
              
              <div class="row">
                
                <div class="col-md-6">
                  <div class="form-group" >
                    <label for="exampleInputPassword1">Certificate title  <span class="required">*</span>
                    </label>
                    <div >
                  
                     <?php 
                    echo $this->Form->input('document_title',[
                       'label' => false,
                       'required' => true,
                       'maxlength' => TEXT_LIMIT,
                       'class'=>'form-control']);
                    ?>
                    </div>
                  </div>
                    
                </div>
                
                <div class="col-md-6">
                  <div class="form-group" >
                    <label for="exampleInputPassword1">Document number <span class="required">*</span>
                    </label>
                    <div >
                    <?php 
                    echo $this->Form->input('document_number',[
                       'label' => false,
                       'required' => true,
                       'maxlength' => TEXT_LIMIT,
                       // 'error' => false,
                       // 'format'=>array('after', 'input'),
                       'class'=>'form-control']);
                    ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                
                <div class="col-md-12">
                  <div class="form-group" >
                    <label for="exampleInputPassword1">Issued by <span class="required">*</span>
                    </label>
                    <div >
                     <?php 
                      echo $this->Form->input('issued_by',[
                         'label' => false,
                         'required' => true,
                         'class'=>'form-control']);
                      ?>
                    </div>
                  </div>
                </div>
              </div>
               <div class="row">
                 <div class="col-md-6">
                  <div class="form-group" >
                    <label for="exampleInputPassword1">Issued date<span class="required">*</span>
                    </label>
                    <div >
                    <?php 
                      echo $this->Form->input('issued_date',[
                         'label' => false,
                         'required' => true,
                         'readonly'=>true,
                         'type' => 'text',
                         'value' => !empty($userDetail->issued_date) ? (date('Y-m-d', strtotime( $userDetail->issued_date ) )):"" ,
                         'class'=>'form-control']);
                    ?>
                    <!-- <div class="cal-box"><i class="fa fa-calendar"></i></div> -->
                    </div>
                  </div>
                    
                </div>
                <div class="col-md-6">
                  <div class="form-group" >
                    <label for="exampleInputPassword1">Expiry date<span class="required">*</span>
                    </label>
                    <div >
                    <?php 
                      echo $this->Form->input('expiary_date',[
                       'label' => false,
                       'required' => true,
                       'readonly'=>true,
                       'type' => 'text',
                       'value' => !empty($userDetail->expiary_date) ? (date('Y-m-d', strtotime( $userDetail->expiary_date ) )):"" ,
                       'class'=>'form-control']);
                    ?> 
                    <!--  <div class="cal-box"><i class="fa fa-calendar"></i></div>  -->
                    </div>
                  </div>
                </div>
              </div>
              
              
              
              <div class="row">
                <div class="col-md-6">
                  
                  <div class="form-group" >
                    <label for="exampleInputPassword1">Document
                    </label>
                     <input type="file" name="image">  
                    <div >
                     <?php 
                            if (!empty($userDetail->scanned_image)) { 
									$scanned_image = $userDetail->scanned_image;
                            }else{
									$scanned_image = "document.png";
                            }
                            $fileName = $scanned_image;
							$ext = strtolower(trim(substr($fileName, strrpos($fileName,'.'))));
							$explodeExt = explode('.',$fileName);
                     ?>
                    </div>
                  </div>
                  
                </div>
                <div class="col-md-6">
                  <div class="form-group" >
                  
                    <div>
						<?php 
						if($ext=='.pdf' || $ext=='.docx' || $ext=='.doc'){ ?> 
							<a style="font-size: 40px;" title="Click for download document" href="<?php echo HTTP_ROOT.'img/drivers_documents/'.$scanned_image; ?>" target="_blank">
							  <i class="fa fa-download">
							  </i> 
							</a>
						<?php  }else{ ?>
							<img height="100" width="100" alt="" class="img-responsive img-thumbnail img-circle" src="<?php echo HTTP_ROOT.'img/drivers_documents/'.$scanned_image; ?>"/>                   
						<?php } ?>
                    
                    </div>
                  </div>
                  
                </div>
              </div>
              
              
              
            </div>    
             <div class="form-actions right">
                <button type="button"  class="btn default" onclick="window.history.go(-1);"  >Cancel</button>
                <button id="send" type="submit" class="btn blue"><i class="fa fa-check"></i> Update</button>
                
              
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
<script>
    $(document).ready(function(){
        
        setInterval(function() {
           $('div.success, div.flasherror').slideUp();
        }, 10000);
 
		/*DATE PICKER SCRIPT FOR HOME PAGE CALENDER START*/
		$( "#issued-date" ).datepicker({
		  defaultDate: "+1",
		  changeMonth: true,
		  changeYear: true,
		  maxDate: new Date,
		  dateFormat: 'yy-mm-dd', 
		  numberOfMonths: 1,
		  yearRange: "-50:+0",
		  onClose: function( selectedDate ) {
			$( "#expiary-date" ).datepicker( "option", {"minDate":0,"yearRange":"-0:+50"} );
		  }
		});
		
		//DATE PICKER SCRIPT FOR TO DATE
		$( "#expiary-date" ).datepicker({
		  defaultDate: "+1",
		  changeMonth: true,
		  changeYear: true,
		  minDate: 0,
		  dateFormat: 'yy-mm-dd',
		  numberOfMonths: 1,
		  yearRange: "-0:+50",
		  onClose: function( selectedDate ) {
			$( "#issued-date" ).datepicker( "option", "maxDate", new Date );
		  }
		});

	  });
</script>
<?php echo $this->element('adminElements/phone_drop_down'); ?>
