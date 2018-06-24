$(function() {
    $(document).on('click', '#deposit_continue_btn', function(e) {
        e.preventDefault();
        getPage('deposit/forms/' + $('#method').val().trim(), {amount: $('#deposit_amount').val().trim()});
    })
	//======= Deposit index =============
	$('#deposit_amount').on('keyup', function() {
        var amount = parseFloat($(this).val().trim());
        var fee = $('#selected-method-fees').length > 0 ? $('#selected-method-fees').text() : 0;
        $('.btn-amount').text(myFormatNumber(calculateTotalDeposit(fee, amount)));
    });

    $('.method-select .dropdown-content li').on('click', function() {
        var method = $(this).data('method');
        var method_slug = $(this).data('method-slug');
        var fee = $(this).data('fee');
        var amount = parseFloat($('#deposit_amount').val().trim());
        $('#method').val(method_slug);
        $('.method-select .dropdown-content li').removeClass('active');
        $('.method-select .dropdown-btn .method-logo').attr('src', 'assets/images/payment_methods/' + method_slug + '.svg');
        $('.method-select .dropdown-btn p .method-name').text(method);
        $('#selected-method-fees').text(fee);
        $(this).addClass('active');

        $('.btn-amount').text(myFormatNumber(calculateTotalDeposit(fee, amount)));
    });

    function calculateTotalDeposit(fee, amount) {
        var charges = (parseFloat(fee) / 100) * parseFloat(amount);
        return (parseFloat(amount) + charges).toFixed(2);
    }

	//=============== Credit Card =========

	$(document).on('keyup', '#card-exp-month', function() {
		if($(this).val().length == 2) $('#card-exp-year').focus();
	});

    $(document).on('keyup', '#cc_number', function() {
        var val = $(this).val();
        var newval = '';
        val = val.replace(/\s/g, '');
        for(var i=0; i < val.length; i++) {
            if(i%4 == 0 && i > 0) newval = newval.concat(' ');
            newval = newval.concat(val[i]);
        }
        $(this).val(newval);
    });

    $(document).on('click', '#creditcard_pay_btn', function(e) {
        e.preventDefault();
        var validator = $("#creditcard_form").validate({
            rules: {
                cc_number: {
                    required: true,
                    creditcard: true
                },
                cc_holder: {
                    required: true,
                    minlength: 2
                },
                cc_exp_month: {
                    required: true,
                    digits: true,
                    card_exp_month: true,
                    minlength: 2,
                    maxlength: 2
                },
                cc_exp_year: {
                    required: true,
                    digits: true,
                    card_exp_year: true,
                    minlength: 4,
                    maxlength: 4
                },
                cc_cvv: {
                    required: true,
                    digits: true,
                    minlength: 3,
                    maxlength: 4
                }
            }
        });

        if(validator.form()) {
            var payment_data = {};
            var data = $("#creditcard_form").serializeArray().reduce(function (obj, item) {
                payment_data[item.name] = item.value;
                return payment_data;
            }, {});

            var container = $('.app_content');
            container.html('').removeClass('loaded');

            $.ajax({
                url: '/ajax/proccess_deposit',
                type: 'POST',
                data: {
                    'payment_data': JSON.stringify(data)
                },
                success: function (data, textStatus, xhr) {
                    setTimeout(function() {
                        if (data) {
                            container.html(data).addClass('loaded').css({'padding': '0', 'height': 'auto'});
                            container.find('.deposit-result img').addClass('animated zoomInDown');
                            container.find('.cont').addClass('animated slideInUp');
                            setTimeout(function() {
                                container.find('.deposit-result').css('background-color', '#fff');
                            }, 1000)
                        } else {
                            container.html('<div class="not-found text-center">Not Found</div>').addClass('loaded');
                        }
                    }, 1000);
                }
            });
        }
    })

});