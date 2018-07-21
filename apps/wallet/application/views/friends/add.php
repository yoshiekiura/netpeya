<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $CI = & get_instance();
    $CI->load->view('templates/header');

?>
<div class="header text-right">
    <a href="/friends" class="back pull-left">Back</a>
    <span class="text-center title">Add a friend<span>
</div>
<form id="friend_form" class="friend-form">
    <div class="">
            <div class="form-group">
                <div class="input-group">
                    <div class="label-holder"><span>First name</span></div>
                    <input type="text" tabindex="1" autocomplete="false" name="first_name" class="form-control input-translate" />
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="label-holder"><span>E-mail</span></div>
                    <input type="email" tabindex="3" autocomplete="false" name="email" class="form-control input-translate" />
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="label-holder"><span>Last name</span></div>
                    <input type="text" tabindex="2" autocomplete="false" name="last_name" class="form-control input-translate" />
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="label-holder"><span>Phone (Optional)</span></div>
                    <input type="text" tabindex="4" autocomplete="false" name="phone" class="form-control input-translate" />
                </div>
            </div>
            <div class="form-group text-center">
                <button id="do_add_friend" class="submit btn-green">Save</button>
            </div>
    </div>
</form>
<?php $CI->load->view('templates/footer'); ?>