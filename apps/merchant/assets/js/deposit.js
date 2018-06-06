$(function() {
    var selected_method = '',
        currency = '';

    $('.payment_methods .payment-method').on('click', function() {
        $('.payment_methods .payment-method').removeClass('active');
        $(this).addClass('active');
        var method = $(this).attr('data-method');
        selected_method = method;
        $('.payment-forms, .payment-form').hide();

        if(selected_method == 'card') {
            $('.payment-forms, .payment-form.card').show("slide", { direction: "up" }, 400 );
        } else if(selected_method == 'neteller') {
            $('.payment-forms, .payment-form.neteller').show("slide", { direction: "up" }, 400 );
        }
    });

    $('#do_deposit').on('click', function(e) {
        e.preventDefault();
        if(selected_method == '') {
            NOTIFY.show('Please select a deposit method', 'error');
            return false;
        }

        var amount = parseFloat($('.deposit #amount').val().trim());

        if(selected_method == 'card') {
            var payment = {};

            payment['amount'] = amount;
            payment['cardNumber'] = $('#cardNumber').val().trim();
            payment['currency'] = $('#wallet_currency').val().trim();
            payment['expiryMonth'] = $('#expiryMonth').val().trim();
            payment['expiryYear'] = $('#expiryYear').val().trim();
            payment['cvv'] = $('#cvv').val().trim();

            if(payment['amount'] == '' ||
               payment['cardNumber'] == '' ||
               payment['expiryMonth'] == '' ||
               payment['expiryYear'] == '' ||
               payment['cvv'] == '') {
                NOTIFY.show('Please enter all card details to continue.', 'error');
                return false;
            } else {
                var btn = $('#do_deposit');
                var btn_html = $('#do_deposit').html();

                LOADER.show(btn, 'processing');
                $.ajax({
                    url: '/api/deposit/card',
                    type: 'POST',
                    dataType: 'json',
                    data: {'payment': JSON.stringify(payment)},
                    success: function (data, textStatus, xhr) {
                        if (data.data.success == true && data['errors'].length == 0) {
                            selected_method = '',
                            balance = '',
                            currency = '';
                            var wallet = data.data.wallet;
                            $('#deposit_form')[0].reset();
                            $('.payment-forms, .payment-form').hide("slide", { direction: "down" }, 200 );
                            $('.payment_methods .payment-method').removeClass('active');
                            updateWalletBalance(wallet.wallet_id);
                            LOADER.restore(btn, btn_html);
                            NOTIFY.show('Deposit successful', 'success');
                        } else {
                            NOTIFY.show('Something is wrong, please try again.', 'error');
                            LOADER.restore(btn, btn_html);
                        }
                    },
                    error: function(xhr) {
                        LOADER.restore(btn, btn_html);
                        NOTIFY.show('Something went wrong, please try again.', 'error');
                    }
                });
            }

        } else if(selected_method == 'neteller') {
            // to-do
        }
    })

})
