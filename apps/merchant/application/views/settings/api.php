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
                    <h1>API settings <span class="line"></span></h1>
                </section>
                <div class="col-md-6 col-sm-12 no-left border-right">
                    <h3 class="form-title black-text">API Access</h3>
                    <div class="top-30">
                        <p class="errors"></p>
                        <div class="col-md-12 no-left">
                            <div class="form-group">
                                <label>Merchant ID:</label>
                                <p style="font-size: 16px" class="form-control"><?= $this->user['xannia_number'] ?></p>
                            </div>
                        </div>
                        <?php if($api): ?>
                            <div class="col-md-8 no-left">
                                <div class="form-group">
                                    <label>API Key:</label>
                                    <p id="api_key" style="font-size: 16px" class="form-control"><?= $api['api_key'] ?></p>
                                </div>
                                <div class="form-group">
                                    <label>Secret Key:</label>
                                    <p id="secret_key" style="font-size: 16px" class="form-control"><?= $api['secret_key'] ?></p>
                                </div>
                            </div>
                        <?php endif; ?>
                        <div class="col-md-4">
                            <div class="form-group ajax-btn-holder">
                                <p class="text-justify"><i class="fa fa-exclamation-triangle red-text"></i> Current keys will not work after the refresh.</p>
                                <button id="refresh_keys_btn" class="ajax-btn btn btn-primary full-width top-30">Refresh keys <i class="fa fa-sync"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="col-md-12">
                        
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
<?php $CI->load->view('templates/footer'); ?>