<?php if(count($this->user['user_wallets']) < $this->config->item('max_wallets', 'xannia') && count($this->user['unused_wallets']) > 0): ?>
<div id="addWalletModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><img src="/assets/images/icons/close_icon.svg" /></button>
                <p class="modal-title">Add wallet</p>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Wallet currency</label>
                    <select class="select2 form-control" id="new_wallet_currency_id">
                        <?php foreach($this->user['unused_wallets'] as $currency): ?>
                        <option value="<?= $currency['id'] ?>"><?= $currency['code'] . ' - ' . $currency['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Wallet name</label>
                    <input type="text" class="form-control" name="new_wallet_wallet_name" id="new_wallet_wallet_name" placeholder="Wallet name" />
                </div>
            </div>
            <div class="modal-footer">
                <button id="add_wallet_btn" class="btn btn-success">Add wallet <i class="fa fa-arrow-right"></i></button>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
<div id="deleteWalletModal" class="modal fade warning" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><img src="/assets/images/icons/close_icon.svg" /></button>
                <p class="modal-title red-text">Delete</p>
            </div>
            <div class="modal-body text-center">
                <div class="modal-message"></div>
            </div>
            <div class="modal-footer">
                <button id="delete_wallet_btn" class="btn btn-success">Delete wallet <i class="fa fa-trash"></i></button>
            </div>
        </div>
    </div>
</div>

<div id="deleteCardModal" class="modal fade warning" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><img src="/assets/images/icons/close_icon.svg" /></button>
                <p class="modal-title red-text">Delete</p>
            </div>
            <div class="modal-body text-center">
                <div class="modal-message"></div>
            </div>
            <div class="modal-footer">
                <button id="delete_card_btn" class="btn btn-success">Delete card <i class="fa fa-trash"></i></button>
            </div>
        </div>
    </div>
</div>


<div id="defaultWalletModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><img src="/assets/images/icons/close_icon.svg" /></button>
                <p class="modal-title">Make Default</p>
            </div>
            <div class="modal-body text-center">
                <div class="modal-message"></div>
            </div>
            <div class="modal-footer">
                <button id="default_wallet_btn" class="btn btn-success">Make default <i class="fa fa-check"></i></button>
            </div>
        </div>
    </div>
</div>

<div id="saveRecipientModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><img src="/assets/images/icons/close_icon.svg" /></button>
                <p class="modal-title">Save recipient?</p>
            </div>
            <div class="modal-body">
                <p class="text-center">Do you want to save this recipient?</p>
            </div>
            <div class="modal-footer ajax-btn-holder">
                <button class="btn btn-default" data-dismiss="modal">No</button>
                <button id="save_recipient_btn" class="ajax-btn btn btn-success">Yes <i class="fa fa-check"></i></button>
            </div>
        </div>
    </div>
</div>

<div id="addRecipientModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><img src="/assets/images/icons/close_icon.svg" /></button>
                <p class="modal-title">Add recipient</p>
            </div>
            <div class="modal-body">
                <p class="text-center" style="background-color: #d9edf7;padding: 10px;margin-bottom: 30px; font-size: 13px">If this recipient doesn't have a Xannia account we will create an account preloaded with this transfer amount. We will then send them an email with a link to login and start using their funds. </p>
                <div class="form-group">
                    <label>Recipient email</label>
                    <input type="email" id="new_recipient_email" autofocus class="form-control" placeholder="Enter recipient email" name="">
                </div>
            </div>
            <div class="modal-footer ajax-btn-holder">
                <button id="add_recipient_btn" class="ajax-btn btn btn-success">Add recipient <i class="fa fa-check"></i></button>
            </div>
        </div>
    </div>
</div>

<div id="createCardModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><img src="/assets/images/icons/close_icon.svg" /></button>
                <p class="modal-title">Create Xannia Card</p>
            </div>
            <div class="modal-body text-center">
                <div class="form-group">
                    <label>Select card wallet</label>
                    <select class="select2 form-control" id="new_card_wallet_id">
                        <?php foreach ($this->user['user_wallets'] as $wallet): ?>
                            <option value="<?=$wallet['wallet_id'] ?>" data-balance="<?= $wallet['wallet_balance'] ?>"><?= $wallet['wallet_currency_code'] ?> - <?= $wallet['wallet_currency_name'] ?>
                                <i class="fa fa-arrow-left"></i>
                            </option>
                            <!-- /.col -->
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button id="create_card_btn" class="btn btn-success">Create card <i class="fa fa-check"></i></button>
            </div>
        </div>
    </div>
</div>