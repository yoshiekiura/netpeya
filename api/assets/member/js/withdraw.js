$(function () {
	var recipient = [];
	var balance = '';
	var wallet_currency_code = '';
	var selected_wallet_id = '';
	var sender_wallet_id = '';

	$('.show_withdraw_modal').on('click', function () {
		$('body').css('overflow-y', 'hidden');
		$('#withdraw_modal').show("fade", { direction: "down" }, 200);
		balance = $(this).attr('data-balance');
		wallet_currency_code = $(this).attr('data-currency');
        $('#withdraw_modal .modal-title').append(' - (' + wallet_currency_code + ' wallet)');
	})


	$('#withdraw_form .stepy-finish').on('click', function (e) {
		e.preventDefault();
		var amount = $('#withdraw_form #amount').val().trim();
		amount = amount.replace(' ', '');
		amount = amount.replace(',', '');

		if (selected_wallet_id != '' && amount != '' && recipient_id != '') {
			$.ajax({
				url: '/api/transfer_money',
				type: 'POST',
				dataType: 'json',
				data: {
					'sender_wallet': sender_wallet_id,
					'recipient_id': recipient_id,
					'recipient_wallet': selected_wallet_id,
					'amount': amount
				},
				success: function (data, textStatus, xhr) {
					if (data.data.success && data['errors'].length == 0) {
						selected_wallet_id = '';
						$('#recipient_id, #amount').val('');
						$('#recipient_wallets .wallet').removeClass('selected');
						$('#recipient_wallets').empty();
						$('#recipient_identity').val('');
						NOTIFY.show("Transfer successfull", "success");
						$('#wallet_balance').text(myFormatNumber(parseFloat(balance - amount).toFixed(2)));
						$('#transfer_form').stepy('step', 0);

						setTimeout(function () {
							location.reload();
						}, 2000);

					} else {
						NOTIFY.show('Something is wrong, please try again later.', 'error');
					}
				}
			});
		}
	});
})
