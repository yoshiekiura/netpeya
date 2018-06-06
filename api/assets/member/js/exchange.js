$(function() {
    var selected_method = '';
    var balance = '';
    var selected_method_name = '';
    var currency = '';

    $('.show_exchange_modal').on('click', function() {
        $('body').css('overflow-y', 'hidden');
        $('#exchange_modal').show( "fade", { direction: "down" }, 200 );

        balance = $(this).attr('data-balance');
        currency = $(this).attr('data-currency');
    })
    $('#exchange_steps .stepy-step').attr('title', '');

    $('#exchange_modal .payment-method').on('click', function() {
        var method = $(this).attr('data-method');
        selected_method_name = $(this).attr('data-name');
        selected_method = method;
    })

    $('#echange_steps .stepy-finish').on('click', function(e) {
        e.preventDefault();
        var amount = parseFloat($('#exchange #amount').val().trim());

        if(selected_method == 'card') {
            var payment = {};

            payment['amount'] = amount;
            payment['cardNumber'] = $('#cardNumber').val().trim();
            payment['currency'] = currency;
            payment['expiryMonth'] = $('#expiryMonth').val().trim();
            payment['expiryYear'] = $('#expiryYear').val().trim();
            payment['cvv'] = $('#cvv').val().trim();

            if(!payment['amount'] ||
               !payment['cardNumber'] ||
               !payment['expiryMonth'] ||
               !payment['expiryYear'] ||
               !payment['cvv']) {
                NOTIFY.show('Please enter all card details to continue.', 'error');

                console.log(payment);
                return false;
            } else {
                console.log(payment);
                $.ajax({
                    url: '/api/deposit/card',
                    type: 'POST',
                    dataType: 'json',
                    data: {'payment': JSON.stringify(payment)},
                    success: function (data, textStatus, xhr) {
                        if (data.data.success == true && data['errors'].length == 0) {
                            $('#wallet_balance').text(myFormatNumber(parseFloat(balance + amount).toFixed(2)));
                            $('#wallet_balance').addClass('blue-text').removeClass('red-text');
                            $("#deposit_steps")[0].reset();
                            $('.deposit .info-box').removeClass('active');
                            $('#deposit_steps').stepy('step', 0);
                            NOTIFY.show('Deposit successful', 'success');
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        } else {
                            NOTIFY.show('Something is wrong, please try again.', 'error');
                        }
                    },
                    error: function(xhr) {
                        NOTIFY.show('Something is wrong, please try again.', 'error');
                    }
                });
            }

        }
    })

})
