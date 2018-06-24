<div class="deposit-result deposit-failed text-center">
    <img src="/assets/images/icons/wallet-red.svg" />
    <div class="cont">
        <p class="red-text"><strong><del><?= $user->currency_simbol . number_format($amount, 2, '.', ' ') ?></del></strong></p>
        <p>Deposit failed</p>
        <p><a class="btn blue-btn" href="/deposit">Try again</a></p>
    </div>
</div>