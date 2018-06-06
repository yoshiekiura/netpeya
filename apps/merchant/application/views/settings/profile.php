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
                    <form id="user_update_form">
                <section class="content-header">
                    <h1>Profile settings <span class="line"></span></h1>
                </section>
                <div class="col-md-6 col-sm-12 no-left border-right">
                        <h3 class="form-title black-text">User Details</h3>
                        <p class="errors"></p>
                        <div class="col-md-6 no-left">
                            <div class="form-group">
                                <label>First name: <span data-toggle="tooltip" data-container="body" data-placement="left" title="Required - must be at least 3 characters long." class="validate-error pull-right"></span></label>
                                <input type="text" class="form-control validate name" tabindex="1" name="first_name" id="first_name" value="<?= $this->user['first_name'] ?>" placeholder="Enter first name" />
                            </div>
                            <div class="form-group">
                                <label>Email: <span  data-toggle="tooltip" data-container="body" data-placement="left" title="Required - must be a valid email address." class="validate-error pull-right"></span></label>
                                <input type="text" tabindex="3" class="form-control validate email" name="email_address" id="email_address" value="<?= $this->user['email_address'] ?>" placeholder="Enter email address" />
                            </div>
                            <div class="form-group">
                                <label>Cell number: <span  data-toggle="tooltip" data-container="body" data-placement="left" title="Required - must be a valid email address." class="validate-error pull-right"></span></label>
                                <input type="text" tabindex="3" class="form-control validate" name="cell_number" id="cell_number" value="<?= $this->user['cell_number'] ?>" placeholder="Cellphone number" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Last name: <span  data-toggle="tooltip" data-container="body" data-placement="left" title="Required - must be at least 3 characters long" class="validate-error pull-right"></span></label>
                                <input type="text" tabindex="2" class="form-control validate name" name="last_name" id="last_name" value="<?= $this->user['last_name'] ?>" placeholder="Enter last name" />
                            </div>
                            <div class="form-group">
                                <p><i class="fa fa-exclamation-triangle red-text"></i> If you change your email, <strong>remember</strong> to use it next time you login.</p>
                            </div>
                        </div>
                        <div class="col-md-12 no-left">
                            <div class="form-group">
                                <h3 class="form-title black-text">Business Details</h3>
                            </div>
                        </div>
                        <div class="col-md-6 no-left">
                            <div class="form-group">
                                <label>Business name: <span data-toggle="tooltip" data-container="body" data-placement="left" title="Required - must be at least 3 characters long." class="validate-error pull-right"></span></label>
                                <input type="text" class="form-control validate name" tabindex="1" name="business_name" id="business_name" value="<?= $this->user['business_name'] ?>" placeholder="Business name" />
                            </div>
                            <div class="form-group">
                                <label>Address 1: <span data-toggle="tooltip" data-container="body" data-placement="left" title="Required." class="validate-error pull-right"></span></label>
                                <input type="text" class="form-control validate" tabindex="1" name="address_1" id="address_1" value="<?= $this->user['address_1'] ?>" placeholder="Address 1" />
                            </div>
                            <div class="form-group">
                                <label>City: <span data-toggle="tooltip" data-container="body" data-placement="left" title="Required." class="validate-error pull-right"></span></label>
                                <input type="text" class="form-control validate" tabindex="1" name="city" id="city" value="<?= $this->user['city'] ?>" placeholder="City" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Business phone: <span  data-toggle="tooltip" data-container="body" data-placement="left" title="Required - must be at a valid phone number" class="validate-error pull-right"></span></label>
                                <input type="text" tabindex="2" class="form-control validate name" name="business_phone" id="business_phone" value="<?= $this->user['business_phone'] ?>" placeholder="Business phone" />
                            </div>
                            <div class="form-group">
                                <label>Address 2: <span data-toggle="tooltip" data-container="body" data-placement="left" title="Required." class="validate-error pull-right"></span></label>
                                <input type="text" class="form-control validate" tabindex="1" name="address_2" id="address_2" value="<?= $this->user['address_2'] ?>" placeholder="Address 2" />
                            </div>
                            <div class="form-group">
                                <label>Postal code: <span data-toggle="tooltip" data-container="body" data-placement="left" title="Required." class="validate-error pull-right"></span></label>
                                <input type="text" class="form-control validate" tabindex="1" name="postal_code" id="postal_code" value="<?= $this->user['postal_code'] ?>" placeholder="Postal code" />
                            </div>
                        </div>
                </div>
                <div class="col-md-6">
                    <div class="col-md-12 no-left">
                        <h3 class="form-title black-text">Banking Details</h3>
                        <div class="top-30">
                            <div class="col-md-12 no-left">
                                <div class="form-group">
                                    <label>Beneficiary: <span data-toggle="tooltip" data-container="body" data-placement="left" title="Required." class="validate-error pull-right"></span></label>
                                    <input type="text" tabindex="2" class="form-control validate" name="bank_beneficiary_name" value="<?= $this->user['bank_beneficiary_name'] ?>" id="bank_beneficiary_name" placeholder="Account holder name" />
                                </div>
                            </div>
                            <div class="col-md-6 no-left">
                                <div class="form-group">
                                    <label>Account number / IBAN: <span data-toggle="tooltip" data-container="body" data-placement="left" title="Required." class="validate-error pull-right"></span></label>
                                    <input type="text" tabindex="2" class="form-control validate" name="bank_account_number" id="bank_account_number" value="<?= $this->user['bank_account_number'] ?>" placeholder="Account number" />
                                </div>
                                <div class="form-group">
                                    <label>Bank country:</label>
                                    <select class="select2 form-control" id="bank_country_id" name="bank_country_code">
                                        <?php foreach($countries as $country): ?>
                                        <option <?= $country['code'] == $this->user['bank_country_code'] ? 'selected' : '' ?> value="<?= $country['code'] ?>"><?= $country['name'] . ' - ' . $country['code'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Bank name: <span data-toggle="tooltip" data-container="body" data-placement="left" title="Required." class="validate-error pull-right"></span></label>
                                    <input type="text" tabindex="2" class="form-control validate" name="bank_name" value="<?= $this->user['bank_name'] ?>" id="bank_name" placeholder="Bank name" />
                                </div>
                                <div class="form-group">
                                    <label>SWIFT code: <span data-toggle="tooltip" data-container="body" data-placement="left" title="Required." class="validate-error pull-right"></span></label>
                                    <input type="text" tabindex="2" class="form-control validate" name="bank_swift_code" value="<?= $this->user['bank_swift_code'] ?>" id="bank_swift_code" placeholder="Swift code" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 no-left">
                        <h3 class="form-title black-text">Withdrawals</h3>
                        <div class="form-group col-md-4">
                            <label>Threshhold <span class="black-text">(<?= $this->user['currency']['code'] ?>):</span> <span data-toggle="tooltip" data-container="body" data-placement="left" title="Required." class="validate-error pull-right"></span></label>
                            <input type="text" style="font-size: 20px; letter-spacing: 1px" class="form-control validate" tabindex="1" name="withdrawal_threshold" id="withdrawal_threshold" value="<?= $this->user['withdrawal_threshold'] ?>" placeholder="Threshold" />
                        </div>
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    <div class="form-group ajax-btn-holder">
                        <button id="update_user_btn" class="ajax-btn btn btn-success">Save all changes <i class="fa fa-arrow-right"></i></button>
                    </div>
                </div>
                    </form>
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