<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $CI = & get_instance();
    $CI->load->view('templates/header');

?>
<div class="header text-right">
    <a href="/friends" class="back pull-left">Back</a>
    <span class="text-center title">Friend edit<span>
</div>
<form id="friend_edit_form" class="friend-form">
    <p class="text-center friend-profile"><?= $friend->first_name[0] . $friend->last_name[0] ?></p>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <div class="input-group">
                    <div class="label-holder focus"><span>First name</span></div>
                    <input type="text" tabindex="1" autocomplete="false" value="<?= $friend->first_name ?>" name="first_name" class="form-control input-translate" />
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="label-holder focus"><span>E-mail</span></div>
                    <input type="email" tabindex="3" autocomplete="false" value="<?= $friend->email ?>" name="email" class="form-control input-translate" />
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <div class="input-group">
                    <div class="label-holder focus"><span>Last name</span></div>
                    <input type="text" tabindex="2" autocomplete="false" value="<?= $friend->last_name ?>" name="last_name" class="form-control input-translate" />
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="label-holder focus"><span>Phone (Optional)</span></div>
                    <input type="text" tabindex="4" autocomplete="false" value="<?= $friend->phone ?>" name="phone" class="form-control input-translate" />
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group text-center">
                <button id="do_add_friend" style="" class="submit btn-green">Save</button>
            </div>
        </div>
    </div>
</form>
<?php $CI->load->view('templates/footer'); ?>