<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $CI = & get_instance();
    $CI->load->view('templates/auth_header');
    ?>
<div class="row">
    <div class="content">
        <div class="col-md-10 col-md-offset-1">
            <div class="col-md-6 col-md-offset-3 login-container">
                <div class="text-center">
                    <a class="btn btn-clear-green" href="/login">Login here <i class="fa fa-arrow-right"></i></a>
                </div>
                <form id="activation_form" class="box">
                    <h4 class="form-title text-center">Please wait</h4>
                    <div class="form-group">
                        <p style="padding-top: 50px;font-size: 40px" class="text-center ajax-btn-holder"><span class="ajax-loading"><i class="fa fa-circle-notch fa-spin"></i> activating account...</span></p>
                        <input type="hidden" id="activation_status" value="<?= $activation_status ?>" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $CI->load->view('templates/auth_footer'); ?>
<script type="text/javascript">
    $(function() {
        $(document).ready(function() {
            if($('#activation_status').val() == '1') {
                setTimeout(function() {
                    location.href = '/login';
                }, 4000);
            } else {
                location.href = '/login';
            }
        })
    })
</script>