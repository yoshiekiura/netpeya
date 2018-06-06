<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $CI = & get_instance();
    $CI->load->view('templates/header');
    //var_dump($this->user);die();
    ?>
<!-- Main content -->
<section class="content">
    <!-- Info boxes -->
    <div class="row">
        <div class="container">
            <div class="col-md-10">
                <section class="content-header">
                    <h1>Verify account <span class="line"></span></h1>
                </section>
                <div class="col-md-6 col-sm-12 no-left border-right">
                    <h3 class="form-title green-text">Documents</h3>
                    <div class="top-30">
                        <p>Create a <code>.zip</code> file with the following documents in it and upload it below.
                            <ol>
                                <li>Proof of business registration</li>
                                <li>Identity for the managing director</li>
                                <li>Proof of physical address of the business</li>
                                <li>Physical address for the managing director</li>
                            </ol>
                        </p>
                        <div class="col-md-6 top-30 no-left">
                            <div class="form-group" />
                                <?php echo form_open_multipart(' ', array('action' => '', 'id' => 'upload_form'));?>
                                    <div class="form-group">
                                        <input type="file" accept=".zip" id="docs" name="docs">
                                    </div>
                                    <div class="ajax-btn-holder form-group">
                                        <?php if($this->user['is_verified'] > 0):?>
                                            <label class="black-text"><strong><i style="font-size: 16px;" class="fa fa-exclamation-triangle red-text"></i> </strong> Your previous files will be overwritten.</label>
                                        <?php endif; ?>
                                        <button type="submit" id="file_upload_btn" class="ajax-btn btn btn-success">
                                            <?php if($this->user['is_verified'] > 0):?>
                                                Upload new files
                                            <?php else: ?>
                                                Upload
                                            <?php endif; ?>
                                            <i class="fa fa-arrow-up"></i>
                                        </button>
                                    </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 no-left">
                    <div class="col-md-12 ">
                        <h2 class="form-title green-text">Verification Status</h2>
                        <div class="form-group verification-status">
                            <?php if($this->user['is_verified'] == 0):?>
                                <p>Not verified <i class="fa fa-exclamation-circle red-text"></i></p>
                            <?php elseif($this->user['is_verified'] == 1): ?>
                                <p>Pending  <i class="fa fa-check-circle red-text"></i></p>
                            <?php else: ?>
                                <p>Verified  <i class="fa fa-check-circle green-text"></i></p>
                            <?php endif; ?>
                        </div>
                        <div class="alert alert-info alert-dismissible">
                            <p>Please allow 3-5 business days for the verification process.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2 right-sidebar">
                <section class="content-header">
                    <h1>Help center <span class="line"></span></h1>
                </section>
                <ul class="help-guide-list">
                    <li>
                        <span class="heading">For actions on a single wallet</span>
                        <span class="description">Hover over the wallet</span>
                    </li>
                    <li>
                        <span class="heading">To delete a wallet</span>
                        <span class="description">Click on <strong>'DELETE'</strong> link and confirm from the popup window.</span>
                    </li>
                    <li>
                        <span class="heading">To a wallet default</span>
                        <span class="description">Click on <strong>'MAKE DEFAULT'</strong> link and confirm from the popup window.</span>
                        <span class="description">The new deafult wallet will be used for unspeciafied transactions.</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /.row -->
</section>
<script src="/assets/js/api_settings.js"></script>
<script src="<?= $this->config->item('shared_resources_source') ?>plugins/ajaxFileUploader/ajaxfileupload.js"></script>
<?php $CI->load->view('templates/footer'); ?>