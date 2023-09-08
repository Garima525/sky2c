<!-- END PAGE HEADER-->
<div class="page-bar">
	<ul class="page-breadcrumb">
		<li>
			<a href="<?= HTTP_ROOT.'users/dashboard'; ?>">Dashboard</a>
			<i class="fa fa-circle"></i>
		</li>
		<li>
			<span>Agents management</span>
		</li>
	</ul>
</div>
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <i class="fa fa-user-secret"></i>
                    <span class="caption-subject bold uppercase"> Agents management</span>
                </div>
                <div class="list-inline mb-0 pull-right">
					<a href="<?php echo HTTP_ROOT; ?>users/add-agent" class="nav-link ">
						<button id="sample_editable_1_new" class="btn sbold green"> Add new
							<i class="fa fa-plus"></i>
						</button>
					</a>
				</div>
            </div> 
            <div class="portlet-body">
                <div class="portlet light bordered">
                  
                   <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="commonDatatable">
                            <thead>
                                <tr>
									<th class="all">Sr. no</th>
                                     <th class="all">Full name</th>
                                    <th class="all">Username</th>
                                    <th class="all">Email</th>
                                    <th class="min-phone-l">Phone</th>
                                    <!-- <th class="min-tablet">Role</th> -->
                                    <?php if(($authUser['role'] == 1) || ($authUser['role'] == 2)){ ?>
                                    <?php } ?>
                                    <th class="none">Created</th>
                           
                                    <th class="none">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            $i=1;
                            foreach ($users as $user): ?>
                            <tr>
                                <td class="text-center"><?= $this->Number->format($i) ?></td>
                                <td class="sorting_1 bold"><a href="<?php echo HTTP_ROOT."users/agent-detail/".base64_encode(convert_uuencode($user->id)); ?>"><?= $user->name ?></a></td>
                                <td><?= $user->username ?></td>
                                <td><?= $user->email ?></td>
                                <td>
									<?php 
									if(!empty($user->phone)) {
                                          echo $this->Common->convertPhoneFormat($user->phone); 
									}else{
										echo "----";
									} ?>
                                </td>
                                <!-- <td><?= @$roles[$user->role] ?></td> -->
                                <td><?= !empty($user->created) ? (date('M jS, Y', strtotime( $user->created ) )):"" ?></td>
                               
                                <td class="actions">
                            <?php  
                            if ( $user->status == 1 ) 
                            {
                                echo $this->Form->postLink(__('<i class="fa fa-user text-green" aria-hidden="true"></i>'), ['action' => 'changeStatus', $user->id, 'off','users','agents-listing'], ['title' => 'Active', 'escape' => false, 'class' => 'system_user', 'confirm' => __('Are you sure you want to deactivate {0}?', ucfirst( $user->name ) )]); 
                            }
                            else
                            {
                                echo $this->Form->postLink(__('<i class="fa fa-user-times text-danger" aria-hidden="true"></i>'), ['action' => 'changeStatus', $user->id, 'on','users','agents-listing'], ['title' => 'Inactive', 'escape' => false, 'class' => 'system_user', 'confirm' => __('Are you sure you want to activate {0}?', ucfirst( $user->name ) )]); 
                            }
                            ?>
                            <?= $this->Html->link(__('<i class="fa fa-pencil font-dark" aria-hidden="true"></i>'), ['action' => 'edit-agent', base64_encode(convert_uuencode($user->id))],['title' => 'Edit', 'escape' => false, 'class'=> 'system_editIcon'] ) ?>
                            <?php /* $this->Html->link(__('<i class="fa fa-unlock-alt aria-hidden="true"></i>'), ['action' => 'changePassword','agents-listing', base64_encode(convert_uuencode($user->id))], ['title' => 'Change Password', 'escape' => false]) */ ?> 
                            
                            <?php
                            echo $this->Form->postLink(__('<i class="fa fa-unlock-alt aria-hidden="true"></i>'), ['action' => 'changeUserPassword', base64_encode(convert_uuencode($user->id)),'users','agents-listing'], ['title' => 'Reset '.ucfirst( $user->name ).'\'s Password', 'escape' => false, 'class' => 'system_user', 'confirm' => __('Are you sure ! You want to reset the password of {0} ?', ucfirst( $user->name ) )]); ?>
                            
                            <?php
                            /***
                             if ($user->role != 1){ ?>
                                <?= $this->Form->postLink(__('<i class="fa fa-trash-o text-danger pull-right" aria-hidden="true"></i>'), ['action' => 'delete', $user->id], ['title' => 'Delete', 'escape' => false, 'class' => 'system_deleteIcon', 'confirm' => __('Are you sure you want to delete {0}?', ucfirst( $user->name ) )]) ?> 
                            <?php } 
                            /***/
                            ?>
                                </td>
                            </tr>
                            <?php 
                            $i++;
                            endforeach; ?>
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
<!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>
