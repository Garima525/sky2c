<div class="page-bar">
    <ul class="page-breadcrumb">
      <li>
        <a href="<?= HTTP_ROOT.'users/dashboard'; ?>">Dashboard</a>
                <i class="fa fa-circle"></i>
      </li>
      <li>
        <a href="<?= HTTP_ROOT.'users/agents-listing'; ?>">Agents management</a>
                <i class="fa fa-circle"></i>
      </li>
       <li>
        <span>Edit agent</span>
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
              <i class="fa fa-user-secret"></i>Edit agent </div>
              <div class="tools">
                <a class="collapse" href="javascript:;" data-original-title="" title=""> </a>
              </div>
            </div>
            <div class="portlet-body form">
          
              <?php echo $this->Form->create($user,[
              'url'     => ['controller' => 'Users', 'action' => 'edit-agent', $user->convertedId],
              'class'   =>'horizontal-form',
              'id'    =>'usersAdd',
              'enctype' =>'multipart/form-data',
              'novalidate'=>'novalidate',
              'autocomplete'=>'off'
              ]); ?>
              <div class="form-body">
              <h3 class="form-section">Agent info</h3>
              
              <div class="row">
                
                <div class="col-md-6">
                  <div class="form-group" >
                    <label for="exampleInputPassword1">Full name <span class="required">*</span>
                    </label>
                    <div >
                  
                    <?php 
                      echo $this->Form->input('name',[
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
                    <label for="exampleInputPassword1">Username <span class="required">*</span>
                    </label>
                    <div >
                    <?php 
                      echo $this->Form->input('username',[
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
                    <label for="exampleInputPassword1">Email <span class="required">*</span>
                    </label>
                    <div >
                    <?php 
                    echo $this->Form->input('email',[
                       'label' => false,
                       'required' => true,
                       'maxlength' => TEXT_LIMIT,
                       //'readonly' => 'readonly',
                      // 'disabled' => 'disabled',
                       'class'=>'form-control']);
                    ?>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Country code <span class="required">*</span>
                    </label>
                    <select class='form-control input-small' name="country_code" id="countries">
                     <?php 
                      if(!empty($country_info)){
                      foreach($country_info as $cc_key=>$cc_val){
                        if(empty($user['country_code'])){
                        ?>
                          <option <?php if($cc_val['iso']=='US'){echo "selected"; }?> value='<?php echo $cc_val['iso']; ?>' data-image="<?php echo HTTP_ROOT; ?>img/blank.gif" data-imagecss="flag <?php echo strtolower($cc_val['iso']); ?>" > (<?php echo $cc_val['iso']; ?>) <?php echo $cc_val['phonecode']; ?></option>
                        <?php
                        }else{
                        ?>
                          <option <?php if($cc_val['iso']==$user['iso']){echo "selected"; }?> value='<?php echo $cc_val['iso']; ?>' data-image="<?php echo HTTP_ROOT; ?>img/blank.gif" data-imagecss="flag <?php echo strtolower($cc_val['iso']); ?>" > (<?php echo $cc_val['iso']; ?>) <?php echo $cc_val['phonecode']; ?></option>
                          <?php
                          }
                        }
                      }
                    ?>
                    </select> 
                  </div>
                  
                </div>
                <div class="col-md-6">
                  <div class="form-group" >
                    <label for="exampleInputPassword1">Phone <span class="required">*</span>
                    </label>
                    <div >
                    <?php 
                    echo $this->Form->input('phone',[
                       'label' => false,
                       'required' => true,
                       'maxlength'=>12,
                       'class'=>'form-control']);
                    ?>
                    </div>
                  </div>
                  
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  
                  <div class="form-group" >
                    <label for="exampleInputPassword1">Profile avatar
                    </label>
                    <div >
                     <input type="file" name="image">    
                     <?php 
                     if(!empty($user->profile_image)){ 
                          $imagePic = $user->profile_image;
                     }else{
                          $imagePic = "prof_photo.png";
                     }
                     ?>
                            
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                <img height="100" width="100" alt="" class="img-responsive img-thumbnail img-circle" src="<?php echo HTTP_ROOT.'img/uploads/'.$imagePic; ?>"/>
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

<?php echo $this->element('adminElements/phone_drop_down'); ?>
