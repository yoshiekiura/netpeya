
<div id="forgotPasswordModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><img src="/assets/images/icons/close_icon.svg" /></button>
                <p class="modal-title">Forgot Password</p>
            </div>
            <div class="modal-body">
                <div class="form-group text-center">
                    <p class="green-text success"></p>
                </div>
                <form id="forgot_password_form">
                    <div class="form-group">
                        <label for="forgot_password_email">Enter your registered email</label>
                        <input type="email" class="form-control" name="forgot_password_email" id="forgot_password_email" placeholder="Your email address" />
                    </div>
                    <div class="form-group">
                        <p class="red-text errors"></p>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="forgot_password_btn" class="btn btn-success">Reset password <i class="fa fa-arrow-right"></i></button>
            </div>
        </div>
    </div>
</div>
<script src="<?= $this->config->item('base_url') ?>assets/plugins/iCheck/icheck.min.js"></script>
<script src="<?= $this->config->item('shared_resources_source') ?>bower_components/jquery-ui/jquery-ui.min.js"></script>
<script src="<?= $this->config->item('shared_resources_source') ?>bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="<?= $this->config->item('base_url') ?>assets/js/app.js"></script>
<script src="<?= $this->config->item('base_url') ?>assets/js/auth.js"></script>

</body>
</html>