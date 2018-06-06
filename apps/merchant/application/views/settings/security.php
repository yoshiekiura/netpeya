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
                    <h1>Security settings <span class="line"></span></h1>
                </section>
                <div class="col-md-6 col-sm-12 no-left border-right">
                    <h3 class="form-title black-text">Allowed IPs</h3>
                    <div class="top-30 col-md-6 no-left">
                        <div class="ip-holder">
                            <?php foreach($allowed_ips as $ip): ?>
                                <div class="form-group" style="margin-bottom: 15px;">
                                    <p class="form-control"><?= $ip['ip'] ?> <a data-name="<?= $ip['ip'] ?>" data-id="<?= $ip['id'] ?>" class="showDeleteIpModal pull-right red-text"><i class="fa fa-trash"></i> Remove</a></p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                        <div class="form-group">
                            <label>Add new ip<span data-toggle="tooltip" data-container="body" data-placement="left" title="Required." class="validate-error pull-right"></span></label>
                            <input type="text" tabindex="2" class="form-control validate" name="new_ip" id="new_ip" placeholder="eg: 127.0.0.1" />
                        </div>

                        <button class="btn btn-primary pull-right" id="add_ip_btn">Add new IP <i class="fa fa-plus"></i></button>
                    </div>
                </div>
                <div class="col-md-6">
                    <h3 class="form-title black-text">Logging in</h3>
                    <div class="col-md-12 no-left">
                        <div class="form-group top-30">
                            <label for="register_account_type">Email me code on login:</label>
                            <div class="onoffswitch">
                                <input type="checkbox" class="onoffswitch-checkbox" id="register_account_type">
                                <label class="onoffswitch-label" for="register_account_type">
                                <span class="onoffswitch-inner"></span>
                                <span class="onoffswitch-switch"></span>
                                </label>
                            </div>
                            <input type="hidden" id="register_account_type_id" name="register_account_type"  value="1" />
                        </div>
                        <span><strong><i style="font-size: 16px;" class="fa fa-info-circle green-text"></i> </strong> You will receive an email with a login code.</span>
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