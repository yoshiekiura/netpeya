$(function () {
	'use strict'

	$(document).ready(function() {
		if($('.single-wallet').length > 0) {
			var current_wallet_id = 0;
			var wallet_balance = 0;
			var current_wallet_code = '';

			$('.single-wallet.not-default').on('mouseover', function() {
				$(this).addClass('active');
			})

			$('.single-wallet.not-default').on('mouseleave', function(){
				$(this).removeClass('active');
			})

			$('.single-wallet .action-tab .delete-wallet').on('click', function() {
				current_wallet_id = $(this).data('wallet-id');
				current_wallet_code = $(this).data('wallet-code');
				wallet_balance = $(this).data('balance');
				$('#deleteWalletModal').modal('show');
				if(wallet_balance > 0) {
					$('#deleteWalletModal .modal-message').html('<p>Wallet can not be deleted</p><strong>' + current_wallet_code + '</strong> has funds, please transfer or withdraw before deleting.');
					$('#delete_wallet_btn').hide();
				} else {
					$('#deleteWalletModal .modal-message').html('<p>Are you sure you want to delete</p><strong>' + current_wallet_code + '</strong><p>You will loose all history linked to this wallet.</p>');
				$('#delete_wallet_btn').show();
				}
			})

			$('.single-wallet .action-tab .make-default').on('click', function() {
				current_wallet_id = $(this).data('wallet-id');
				current_wallet_code = $(this).data('wallet-code');
				wallet_balance = $(this).data('balance');
				$('#defaultWalletModal').modal('show');
				$('#defaultWalletModal .modal-message').html('<p>Are you sure you want to make default</p><strong>' + current_wallet_code + '</strong>');
			})

			$('#delete_wallet_btn').on('click', function() {
				if(current_wallet_code != '' && current_wallet_id != 0) {
					$(this).html('<i class="fa fa-circle-notch fa-spin"></i>');

					$.ajax({
					url: '/api/delete_wallet',
					type: 'POST',
					dataType: 'json',
					data: {
						'wallet_id': current_wallet_id
					},
					success: function (data, textStatus, xhr) {
						console.log(data.data.success);
						if (data.data.success && data['errors'].length == 0) {
							location.reload();
						} else {
							$(this).html('Delete wallet <i class="fa fa-trash"></i>');
							NOTIFY.show('Something is wrong, please try again later.', 'error');
						}
					}
				});
				}
			})

			$('#default_wallet_btn').on('click', function() {
				$(this).html('<i class="fa fa-circle-notch fa-spin"></i>');

				$.ajax({
					url: '/api/make_default_wallet',
					type: 'POST',
					dataType: 'json',
					data: {
						'wallet_id': current_wallet_id
					},
					success: function (data, textStatus, xhr) {
						console.log(data.data.success);
						if (data.data.success && data['errors'].length == 0) {
							location.reload();
						} else {
							$(this).html('Make deafult <i class="fa fa-check"></i>');
							NOTIFY.show('Something is wrong, please try again later.', 'error');
						}
					}
				});
			})
		}
	})

})