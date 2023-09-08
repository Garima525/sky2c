<!-- src/Template/Users/edit.ctp -->
<div class="">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h4>Assign order<small></small></h4>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <?php echo $this->Form->create($order,[
              'url'     => ['controller' => 'Users', 'action' => 'edit-driver',  $order->convertedId],
              'class'   =>'form-horizontal form-label-left',
              'id'    =>'usersEdit',
              'enctype' =>'multipart/form-data',
              'novalidate'=>'novalidate',
               // 'autocomplete'=>'off',
                  ]) ?>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                          Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php 
                                echo $this->Form->input('name',[
                                   'label' => false,
                                   'required' => true,
                                   'class'=>'form-control col-md-7 col-xs-12']);
                                ?>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                          Username<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php 
                                echo $this->Form->input('username',[
                                   'label' => false,
                                   'required' => true,
                                   // 'error' => false,
                                   // 'format'=>array('after', 'input'),
                                   'class'=>'form-control col-md-7 col-xs-12']);
                                ?>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                          Email <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php 
                                echo $this->Form->input('email',[
                                   'label' => false,
                                   'readonly' => 'readonly',
                                   'disabled' => 'disabled',
                                   'required' => true,
                                   'class'=>'form-control col-md-7 col-xs-12']);
                                ?>
                        </div>
                    </div>
                    <!-- <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                          Country Code <span class="required">*</span>
                        </label>
                        <div class="col-md-2 col-sm-2 col-xs-12">
                            
                                <select class='form-control col-md-6 col-xs-12' name="country_code" id="countries">
                                 <?php 
                                  if(!empty($country_info)){
                                    foreach($country_info as $cc_key=>$cc_val){
                                      ?>
                                      <option <?php if($user['country_code']==$cc_key){echo "selected"; }?> value='<?php echo $cc_key; ?>' data-image="<?php echo HTTP_ROOT; ?>img/blank.gif" data-imagecss="flag <?php echo strtolower($cc_val); ?>"><?php echo $cc_key; ?></option>
                                      <?php
                                    }
                                  }
                                ?>
                              </select>   
                        </div>
                    </div> -->
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">
                          Phone <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <?php 
                                echo $this->Form->input('phone',[
                                   'label' => false,
                                   'required' => true,
                                   'class'=>'form-control col-md-7 col-xs-12']);
                                ?>
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Category">Profile Image <span class="required"></span>
                        </label>
                        <div class='col-md-6 col-sm-6 col-xs-12'>
                            <input type="file" name="image">                     
                          <?php if (!empty($user->profile_image)) { 
                                              $imagePic = $user->profile_image;
                                        }else{
                                              $imagePic = "prof_photo.png";
                                        }
                            ?>
                          <img height="100" width="100" alt="" class="img-responsive img-thumbnail img-circle" src="<?php echo HTTP_ROOT.'img/uploads/'.$imagePic; ?>"/>
                        </div>
                    </div>

                    
                    <hr />
                    <br />
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                            <button type="button"  class="btn btn-primary" onclick="window.history.go(-1);"  >Cancel</button>
                            <button id="send" type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                    <?php echo $this->form->end(); ?>
                    <!-- end form -->
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .ct{
    display:none;
    }
</style>
