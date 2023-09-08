<!-- END PAGE HEADER-->
<div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="<?= HTTP_ROOT.'users/dashboard'; ?>">Dashboard</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>Certificates management</span>
                            </li>
                        </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-dark">
                    <i class="fa fa-file"></i>
                    <span class="caption-subject bold uppercase"> Certificates management</span>
                </div>
            </div> 
            <div class="portlet-body">
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <div class="btn-group">
                                <a href="<?php echo HTTP_ROOT; ?>users/add-driver-certificate" class="nav-link ">
                                    <button id="sample_editable_1_new" class="btn sbold green"> Upload document
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div class="tools"> </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="commonDatatable">
                            <thead>
                                <tr>
                                    <th class="all">S.No.</th>
                                    <th class="all">Document title</th>
                                    <th class="all">Document number</th>
                                    <th class="all">Issued by</th>
                                    <th class="all">Issued date</th>
                                    <th class="all">Expiry date</th>
									<th class="none">Created</th>
                                    <th class="none">Modified</th>
                                    <th class="none">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            $i=1;
                            foreach ($documents as $document): ?>
                            <tr>
                                <td class="text-center"><?= $this->Number->format($i) ?></td>
                                <td><?= $document->document_title ?></td>
                                <td><?= $document->document_number ?></td>
                                <td><?= $document->issued_by ?></td>
                                <td><?= !empty($document->issued_date) ? (date('M jS, Y', strtotime( $document->issued_date ) )):"" ?></td>
                                <td><?= !empty($document->expiary_date) ? (date('M jS, Y', strtotime( $document->expiary_date ) )):"" ?></td>
                                <td><?= !empty($document->created) ? (date('M jS, Y', strtotime( $document->created ) )):"" ?></td>
                                <td><?= !empty($document->modified) ? (date('M jS, Y', strtotime( $document->modified ) )):"" ?></td>
                                <td class="actions">
                                   <?= $this->Html->link(__('<i class="fa fa-pencil font-dark" aria-hidden="true"></i>'), ['action' => 'edit-driver-certificate', base64_encode(convert_uuencode($document->id))],['title' => 'Edit', 'escape' => false, 'class'=> 'system_editIcon'] ) ?>
                                </td>
                            </tr>
                            <?php 
								$i++; 
								endforeach; 
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
