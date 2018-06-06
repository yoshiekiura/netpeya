$(function() {
    var sender_wallet_id = 0,
        recipient_email = '',
        currency_from = '',
        currency_to = '',
        amount = 0,
        exchange_rate = 0,
        recipient_id = 0 ,
        fees = $('#fees').val() / 100;

        $('#amount_addon').text($('#sender_wallet_id').select2('data')[0].text.split(' - ')[0].trim());

        function get_rates(from, to) {
            var amount = 1;

            if(amount != '') {
                $.ajax({
                    url: '/api/get_rates',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        'from': from,
                        'to': to,
                        'amount': amount
                    },
                    success: function(data, textStatus, xhr) {
                        if (data.data.success && data['errors'].length == 0) {
                            var exchange_result = data.data.exchange_result;
                            var rate = exchange_result.rate;
                            $('#exchange_rates').html('1 <strong>' + from + '</strong> <i class="green-text fas fa-exchange-alt"></i> ' + rate + ' <strong>' + to + '</strong>');
                            exchange_rate = rate;

                        } else {
                            NOTIFY.show('Something is wrong, please try again later.', 'error');
                        }
                    }
                });
            }

        }


        $('#sender_wallet_id').select2().on('change', function () {
            $('.transfer #amount').val('');
            $('#amount_addon').text($(this).select2('data')[0].text.split(' - ')[0].trim());
            $('#total_charge, #total_received').html('0.00');
            currency_from = $(this).select2('data')[0].text.split(' - ')[0].trim();
            if(currency_from != $('#to_currency').select2('data')[0].text) {
                get_rates($('#to_currency').select2('data')[0].text, currency_from);
            } else {
                exchange_rate = 0;
                $('#exchange_rates').empty();
            }
        });

        $('#to_currency').select2().on('change', function () {
            $('.transfer #amount').val('');
            $('#total_charge, #total_received').html('0.00');
            currency_to = $(this).select2('data')[0].text;
            if($(this).select2('data')[0].text != $('#sender_wallet_id').select2('data')[0].text.split(' - ')[0].trim()) {
                get_rates(currency_to, $('#sender_wallet_id').select2('data')[0].text.split(' - ')[0].trim());
            } else {
                exchange_rate = 0;
                $('#exchange_rates').empty();
            }
        });

        $('#do_transfer').on('click', function(e) {
            e.preventDefault();
            amount = $('.transfer #amount').val().trim();
            if($('#user_recipients_list').length > 0) {
                recipient_email = $('#user_recipients_list').val().trim();
            } else if($('#recipient_identity').length > 0) {
                recipient_email = $('#recipient_identity').val().trim()
            }
            sender_wallet_id = $('#sender_wallet_id').val().trim();
            currency_to = $('#to_currency').select2('data')[0].text;

            if(sender_wallet_id == '0') {
                NOTIFY.show("Please select a wallet.", "error");
                return false;
            }

            if(recipient_email == '') {
                NOTIFY.show("Please enter recipient email", "error");
                return false;
            }

            if(sender_wallet_id != '' && amount != '') {

                var btn = $('#do_transfer');
                var btn_html = $('#do_transfer').html();

                LOADER.show(btn, 'processing');

                $.ajax({
                    url: '/api/transfer_money',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        'sender_wallet_id': sender_wallet_id,
                        'recipient_email': recipient_email,
                        'currency_to': currency_to,
                        'includes_fees': $('#include_fees').prop('checked'),
                        'amount': amount
                    },
                    success: function(data, textStatus, xhr) {
                        if (data.data.success && data['errors'].length == 0) {
                            selected_wallet_id = '';
                            recipient_id = data.data.recipient_id;
                            $('#recipient_id, #amount, #amount_after_rates').val('');
                            $('#recipient_identity').val('');
                            $('#total_charge, #total_received').html('0.00');
                            LOADER.restore(btn, btn_html);
                            updateWalletBalance(sender_wallet_id);
                            if(data.data.recipient_saved == false) {
                                $('#saveRecipientModal').modal('show');
                                $('#saveRecipientModal #add_recipient_email').val(recipient_email);
                            } else {
                                NOTIFY.show('Transfer successfull', 'success');
                            }

                        } else {

                            if (data.data.message) {
                                LOADER.restore(btn, btn_html);
                                NOTIFY.show(data.data.message, 'error');
                                return false;
                            }
                            LOADER.restore(btn, btn_html);
                            NOTIFY.show('Something is wrong, please try again later.', 'error');
                        }
                    }
                });
            } else {
                NOTIFY.show('Please fill in all details.', 'error');
            }
        });

        if($('#select_recipient_btn').length > 0) {
            $('#select_recipient_btn').on('click', function() {
                var rec_email = $('#userRecipientsModal #user_recipients_list').val();
                $('#recipient_identity').val(rec_email);
                $('#userRecipientsModal').modal('hide');
            });
        }

        if($('#save_recipient_btn').length > 0) {
            $('#save_recipient_btn').on('click', function() {

                var btn = $('#save_recipient_btn');
                var btn_html = $('#save_recipient_btn').html();

                $.ajax({
                    url: '/api/add_recipient',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        'recipient_id': recipient_id
                    },
                    success: function(data, textStatus, xhr) {
                        if (data.data.success && data['errors'].length == 0) {
                            $('#saveRecipientModal').modal('hide');
                            NOTIFY.show('Transfer successfull, Recipient created!', 'success');
                        } else {

                            if (data.data.message) {
                                LOADER.restore(btn, btn_html);
                                NOTIFY.show(data.data.message, 'error');
                                return false;
                            }
                            LOADER.restore(btn, btn_html);
                            NOTIFY.show('Something is wrong, please try again later.', 'error');
                        }
                    }
                });
            });
        }

        if($('#add_recipient_btn').length > 0) {
            $('#add_recipient_btn').on('click', function() {
                var recipient_email = $('#addRecipientModal #new_recipient_email').val().trim();
                $('<option value="' + recipient_email + '">'+ recipient_email +'</option>').appendTo('#user_recipients_list');
                $('#user_recipients_list').val(recipient_email);

                $('#addRecipientModal').modal('hide');
            });
        }


        $('.transfer #amount').on('keyup', function() { do_calculate_rates(); });

        $('#include_fees').on('change', function() {
            if($('#amount').val() != '') { do_calculate_rates() };
        });

        function do_calculate_rates() {
            var amount = parseFloat($('.transfer #amount').val().trim());
            var total_fees = parseFloat(amount * fees);
            var amount_after_fees = amount;

            var amount_after_rates = amount;
            if($('#sender_wallet_id').select2('data')[0].text.split(' - ')[0].trim() != $('#to_currency').select2('data')[0].text) {
                amount_after_rates = CURRENCY_CONVERTER.convert(
                    $('#sender_wallet_id').select2('data')[0].text.split(' - ')[0].trim(),
                    $('#to_currency').select2('data')[0].text,
                    exchange_rate,
                    amount
                );

                amount_after_rates += total_fees;
            }


            if($('#include_fees').prop("checked") == true) {
                console.log('subtract');
                amount_after_fees -= total_fees;
            } else {
                amount_after_rates += total_fees;
            }

            $('#total_charge').html(
                '<strong>' + $('#sender_wallet_id').select2('data')[0].text.split(' - ')[0].trim() + '</strong>' +
                myFormatNumber(parseFloat(amount_after_rates).toFixed(2)));

            $('#total_received').html(
                '<strong>' + $('#to_currency').select2('data')[0].text + '</strong>' +
                myFormatNumber(parseFloat(amount_after_fees).toFixed(2)));
        }

})
