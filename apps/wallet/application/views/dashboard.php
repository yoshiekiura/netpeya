<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $CI = & get_instance();
    $CI->load->view('templates/header');

?>
<section class="app-top border-top">
    <div class="webkit-box">
        <div class="col-md-4 no-left request-send">
            <div class="card user-summary">
                <div class="user-profile">
                    <div class="user-pic"><?= $user->first_name[0] . $user->last_name[0] ?></div>
                    <div class="user-details">
                        <span class="user-name"><?= $user->first_name . ' ' . $user->last_name ?></span>
                        <span class="user-account-id"><?= $user->country ?></span>
                    </div>
                </div>
                <div class="user-balance mt-3 border-top pt-3">
                    <div class="user-currency" style="background-image: url('/assets/svg/countries/<?= $user->currency_code ?>.svg');"></div>
                    <div class="balance-details">
                        <span class="balance-title">Your Balance:</span>
                        <span class="balance-amount"><?= $user->currency_simbol . number_format($user->account_balance, 2, '.', ' ') ?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 no-right no-left balances ">
            <div id="app_content" class="lazyload">
                
            </div>
        </div>
    </div>
</section>
<?php $CI->load->view('templates/footer'); ?>
            