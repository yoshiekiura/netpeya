<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $CI = & get_instance();
    $CI->load->view('templates/header');
    ?>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="container">
            <div class="col-md-10 border-right">
                <section class="content-header">
                    <h1>My Xannia cards <span class="pull-right link circle-btn" data-toggle="tooltip" data-container="body" data-placement="left" title="Create a new card"><img data-toggle="modal" data-target="#createCardModal" src="/assets/images/icons/black_plus_icon.svg" /></span> <span class="line"></span></h1>
                </section>
                <?php foreach($cards as $card): ?>
                    <div class="single-card">
                        <p class="top">
                            <?php if($this->user['first_name'] != null): ?>
                                <?= $this->user['first_name'] ?>&nbsp;<?= $this->user['last_name'] ?></span>
                            <?php else: ?>
                                <?= $this->user['email_address'] ?>
                            <?php endif; ?>
                            <span class="pull-right"><?= $card['wallet_currency_code'] ?></span>
                        </p>
                        <p class="middle"><?= implode( '-', str_split($card['card_number'], 4)) ?></p>
                        <p class="bottom">CVV: <?= $card['cvv'] ?><span class="pull-right">EXP: <?= $card['expiry_month'] ?>/<?= $card['expiry_year'] ?></span></p>
                        <div class="actions">
                            <span class="delete-wallet" data-card-id="<?= $card['card_id'] ?>"><img src="/assets/images/icons/close_icon.svg" /> Delete</span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="col-md-2">
                <section class="content-header">
                    <h1>Help center <span class="line"></span></h1>
                </section>
            </div>
        </div>
    </div>
</section>
<?php $CI->load->view('templates/footer'); ?>