<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $CI = & get_instance();
    $CI->load->view('templates/header');
    ?>
<!-- Main content -->
<section class="content">
    <!-- Info boxes -->
    <div class="row">
        <div class="container">
            <div class="col-md-10">
                <section class="content-header">
                    <h1>Account settings <span class="line"></span></h1>
                </section>
                <div class="col-md-12 col-sm-12 no-left">
                    <ul class="nav nav-tabs nav-justified">
                        <li class="active"><a data-toggle="tab" href="#profile">Profile</a></li>
                        <li><a data-toggle="tab" href="#verification">Verification
                            <?php if(!$this->user['bank_account_verified'] || !$this->user['email_verified']|| !$this->user['address_verified'] ): ?>
                                <img src="/assets/images/icons/info_icon.svg" />
                            <?php endif; ?>
                            </a></li>
                        <li><a data-toggle="tab" href="#banking">Banking details</a></li>
                        <li><a data-toggle="tab" href="#change_password">Password</a></li>
                        <li><a data-toggle="tab" href="#security">Security</a></li>
                        <?php if($this->user_model->is_merchant()): ?>
                            <li><a data-toggle="tab" href="#api">API Access</a></li>
                        <?php endif; ?>
                        <?php if($this->user_model->is_merchant()): ?>
                            <li><a data-toggle="tab" href="#methods">Methods</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="col-md-6 col-sm-12 no-left">
                    <div class="tab-content">
                        <div id="profile" class="tab-pane fade in active">
                            <form id="user_update_form" class="box">
                                <div class="form-group">
                                    <label for="address_1">Address line 1:</label>
                                    <input type="text" class="form-control validate-input" id="address_1" name="address_1" value="<?= $this->user['address_1'] ?>" placeholder="Address 1" />
                                </div>
                                <div class="form-group">
                                    <label for="address_2">Address line 2:</label>
                                    <input type="text" class="form-control validate-input" id="address_2" name="address_2" value="<?= $this->user['address_2'] ?>" placeholder="Address 2" />
                                </div>
                                <div class="form-group">
                                    <label for="city">City:</label>
                                    <input type="text" class="form-control validate-input" id="city" name="city" value="<?= $this->user['city'] ?>" placeholder="City" />
                                </div>
                                <div class="form-group">
                                    <label for="province">Province:</label>
                                    <input type="text" class="form-control validate-input" id="province" name="province" value="<?= $this->user['province'] ?>" placeholder="Province" />
                                </div>
                                <div class="form-group">
                                    <label for="postal_code">Zip/Postal Code:</label>
                                    <input type="text" class="form-control validate-input" id="postal_code" name="postal_code" value="<?= $this->user['postal_code'] ?>" placeholder="Zip/Postal Code" />
                                </div>
                                <button class="btn btn-success" id="update_user_btn">Save <i class="fa fa-check"></i></button>
                            </form>
                        </div>
                        <div id="verification" class="tab-pane fade">
                            <table class="table table-bordered table-striped">
                                <tbody>
                                    <tr>
                                        <td>
                                            <strong>Email Address</strong>
                                            <span class="activity-lower">
                                            <?php if($this->user['email_verified']): ?>
                                            <img src="/assets/images/icons/tick_icon.svg" /> Verified
                                            <?php else: ?>
                                            <img src="/assets/images/icons/info_icon.svg" /> Not Verified
                                            <?php endif; ?>
                                            </span>
                                        </td>
                                        <td class="text-right">
                                            <?php if($this->user['email_verified']): ?>
                                            <strong class="green-text">Verified</strong>
                                            <?php else: ?>
                                            <strong><a class="green-text" href="">Verify now</a></strong>
                                            <?php endif; ?>
                                            <span class="activity-lower">Can not be changed</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Residential Address</strong>
                                            <span class="activity-lower">
                                            <?php if($this->user['address_verified']): ?>
                                            <img src="/assets/images/icons/tick_icon.svg" /> Verified
                                            <?php else: ?>
                                            <img src="/assets/images/icons/info_icon.svg" /> Not Verified
                                            <?php endif; ?>
                                            </span>
                                        </td>
                                        <td class="text-right">
                                            <strong><?= $this->user['address_verified'] ? 'Did this change?' : 'Upload proof of address' ?></strong>
                                            <span class="activity-lower">Click button below</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>Bank Account</strong>
                                            <span class="activity-lower">
                                            <?php if($this->user['bank_account_verified']): ?>
                                            <img src="/assets/images/icons/tick_icon.svg" /> Verified
                                            <?php else: ?>
                                            <img src="/assets/images/icons/info_icon.svg" /> Pending
                                            <?php endif; ?>
                                            </span>
                                        </td>
                                        <td class="text-right">
                                            <strong><?= $this->user['bank_account_verified'] ? 'Did this change?' : 'Upload bank statement' ?></strong>
                                            <span class="activity-lower">Click button below</span>
                                        </td>
                                    </tr>
                                <tfoot>
                                    <tr>
                                        <th class="text-center" colspan="2"><a href="/verify" class="btn btn-success">Upload Documents</a></th>
                                    </tr>
                                </tfoot>
                                </tbody>
                            </table>
                        </div>
                        <div id="banking" class="tab-pane fade in">
                            <form id="user_banking_form" class="box">

                                <button class="btn btn-success" id="update_banking_btn">Save <i class="fa fa-check"></i></button>
                            </form>
                        </div>
                        <div id="change_password" class="tab-pane fade in">
                            <form id="change_password_form" class="box">
                                <div class="form-group">
                                    <label for="current_password">Current Password:</label>
                                    <input type="password" class="form-control validate-input" id="current_password" name="current_password" value="" placeholder="Enter current password" />
                                </div>
                                <div class="form-group">
                                    <label for="new_password">New password:</label>
                                    <input type="password" class="form-control validate-input" id="new_password" name="new_password" value="" placeholder="Enter new password" />
                                </div>
                                <div class="form-group">
                                    <label for="repeat_password">Repeat password:</label>
                                    <input type="password" class="form-control validate-input" id="repeat_password" name="repeat_password" value="" placeholder="Repeat password" />
                                </div>
                                <button class="btn btn-success" id="change_password_btn">Change password <i class="fa fa-check"></i></button>
                            </form>
                        </div>
                        <div id="security" class="tab-pane fade">
                            <h3>Menu 1</h3>
                            <p>Some content in menu 1.</p>
                        </div>
                        <?php if($this->user_model->is_merchant()): ?>
                            <div id="api" class="tab-pane fade">
                                <h3>Menu 1</h3>
                                <p>Some content in menu 1.</p>
                            </div>
                            <div id="methods" class="tab-pane fade">
                                <h3>Menu 1</h3>
                                <p>Some content in menu 1.</p>
                            </div>
                        <?php endif; ?>
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
<?php $CI->load->view('templates/footer'); ?>