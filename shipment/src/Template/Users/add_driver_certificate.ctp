
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
        <span>Add driver certificate</span>
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

               <i class="fa fa-file"></i>Add certificate</div>
              <div class="tools">
                <a class="collapse" href="javascript:;" data-original-title="" title=""> </a>
              </div>
            </div>
            <div class="portlet-body form">
          
              <?php echo $this->Form->create(@$userDetail,[
              'url'     => ['controller' => 'Users', 'action' => 'add-driver-certificate'],
              'class'   =>'horizontal-form',
              'id'    =>'addDriverCertificate',
              'enctype' =>'multipart/form-data',
              'novalidate'=>'novalidate',
              'autocomplete'=>'off'
              ]); ?>
              <div class="form-body">
              <h3 class="form-section">Personal info</h3>
              
              <div class="row">
                
                <div class="col-md-6">
                  <div class="form-group" >
                    <label for="exampleInputPassword1">Certificate title <span class="required">*</span>
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
                    <div>
                    <?php 

                    echo $this->Form->input('issued_by',[
                       'label' => false,
                       'required' => true,
                       'type' => 'text',
                       'maxlength' => TEXT_LIMIT,
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
                       'class'=>'form-control']);
                    ?> 
                     <!-- <div class="cal-box"><i class="fa fa-calendar"></i></div>  -->
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group" >
                    <label for="exampleInputPassword1">Document
                    </label>
                    <div >
                     <input type="file" name="image">    
                    </div>
                  </div>
                </div>
              </div>
              
            </div>    
             <div class="form-actions right">
                <button type="button"  class="btn default" onclick="window.history.go(-1);"  >Cancel</button>
                <button id="send" type="submit" class="btn blue"><i class="fa fa-check"></i> Submit</button>
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

