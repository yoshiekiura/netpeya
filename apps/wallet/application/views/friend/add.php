<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $CI = & get_instance();
?>
<form id="friend_form" class="add-friend-form p-3">
    <h2 class="text-center">Add a friend</h2>
    <div class="webkit-box">
        <div class="col-md-6">
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
        </div>
        <div class="col-md-6">
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
            <div class="form-group">
                <button id="do_add_friend" style="margin-top: 40px;height: 60px" class="submit btn-green full-width">Save</button>
            </div>
        </div>
    </div>
</form>