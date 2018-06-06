$('.select2').select2();

$('[data-toggle="tooltip"]').tooltip();

if($('.daterange-btn').length > 0) {
	$('.daterange-btn').daterangepicker(
		{
			ranges: {
				'Today'       : [moment(), moment()],
				'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
				'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
				'Last 30 Days': [moment().subtract(29, 'days'), moment()],
				'This Month'  : [moment().startOf('month'), moment().endOf('month')],
				'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
			},
			startDate: moment().subtract(29, 'days'),
			endDate  : moment(),
			locale: {
		       format: 'YYYY/MM/DD',
		    }
		},
		function (start, end) {
		  $('.daterange-btn span').html(start.format('YYYY/MM/DD') + ' - ' + end.format('YYYY/MM/DD'))
		}
	)
}

$(function () {
	'use strict'

	$(window).on("scroll", function () {
		// if ($(this).scrollTop() > 10) {
		// 	$(".skin-blue .main-header .navbar").css("background-color", "#f5f5f5");
		// }
		// else {
		// 	$(".skin-blue .main-header .navbar").css("background", "#ffffff");
		// }
	});

	$('.slimScrollDiv').height($(window).height() - 60);

	$('#user_environment_session_switch').on('change', function(){
		var val = $("#current_env").val() == 2 ? 1 : 2;
		$.ajax({
			url: '/api/change_user_environment',
			type: 'POST',
			dataType: 'json',
			data: {id: val},
			success: function (data, textStatus, xhr) {
				if (data.data.success && data['errors'].length == 0) {
					window.location.reload();
				} else {
					NOTIFY.show('Can\'t switch environment, please try again later.', 'error');
				}
			}
		});
	})

	$(document).ready(function () {

		$('#logout_btn').on('click', function () {
			$.ajax({
				url: '/api/logout',
				type: 'POST',
				dataType: 'json',
				data: {},
				success: function (data, textStatus, xhr) {
					if (data.data.success && data['errors'].length == 0) {
						window.location.href = '/authentication';
					} else {
						NOTIFY.show('Something is wrong, please try again later.', 'error');
					}
				}
			});
		});

		if($('#become_merchant_btn').length > 0) {
			$('#become_merchant_btn').on('click', function() {
				var btn = $('#become_merchant_btn');
                var btn_html = $('#become_merchant_btn').html();

                LOADER.show(btn, 'processing');
                $.ajax({
                    url: '/api/become_merchant',
                    type: 'POST',
                    dataType: 'json',
                    data: {},
                    success: function (data, textStatus, xhr) {
                        if (data.data.success == true && data['errors'].length == 0) {
                        	NOTIFY.show('You are now a merchant', 'success');
                        	setTimeout(function() {
                            	location.reload();
                        	}, 3000);
                        } else {
                            NOTIFY.show('Something is wrong, please try again.', 'error');
                            LOADER.restore(btn, btn_html);
                        }
                    },
                    error: function(xhr) {
                        LOADER.restore(btn, btn_html);
                        NOTIFY.show('Something is wrong, please try again.', 'error');
                    }
                });
			})
		}

		if($('#change_profile_password_btn').length > 0) {
			$('#change_profile_password_btn').on('click', function(e) {

				e.preventDefault();
				var old_password = $('#old_password').val();
				var new_password = $('#new_password').val();

				var input = $('#change_password_form .form-control.validate');

				var check = true;

				for(var i=0; i<input.length; i++) {
					if(validate(input[i]) == false){
						showValidate(input[i]);
						check=false;
					} else {
						hideValidate(input[i]);
					}
				}

				if(check) {
					var btn = $('#change_profile_password_btn');
	                var btn_html = $('#change_profile_password_btn').html();

	                LOADER.show(btn, 'processing');
	                $.ajax({
	                    url: '/api/change_password',
	                    type: 'POST',
	                    dataType: 'json',
	                    data: {
	                    	'old_password': old_password,
	                    	'new_password': new_password
	                    },
	                    success: function (data, textStatus, xhr) {
	                        if (data.data.success == true && data['errors'].length == 0) {
	                        	NOTIFY.show('Password changed', 'success');
	                        } else {
	                            NOTIFY.show(data.data.message, 'error');
	                        }
	                        LOADER.restore(btn, btn_html);
	                        $('#old_password').val('');
							$('#new_password').val('');
	                    },
	                    error: function(xhr) {
	                        LOADER.restore(btn, btn_html);
	                        NOTIFY.show('Something is wrong, please try again.', 'error');
	                    }
	                });
				}
			});
		}

		if($('#add_account_btn').length > 0) {
			$('#add_account_btn').on('click', function () {
				$(this).html('<i class="fa fa-circle-notch fa-spin"></i>');
				$.ajax({
					url: '/api/add_merchant_account',
					type: 'POST',
					dataType: 'json',
					data: {
						'currency_id': $('#new_account_currency_id').val().trim(),
						'account_name': $('#new_account_name').val().trim()
					},
					success: function (data, textStatus, xhr) {
						console.log(data.data.success);
						if (data.data.success && data['errors'].length == 0) {
							location.reload();
						} else {
							$(this).html('Add account <i class="fa fa-arrow-right"></i>');
							NOTIFY.show('Something is wrong, please try again later.', 'error');
						}
					}
				});
			});
		}

		if($('#create_card_btn').length > 0) {
			$('#create_card_btn').on('click', function () {
				$(this).html('<i class="fa fa-circle-notch fa-spin"></i>');
				$.ajax({
					url: '/api/create_card',
					type: 'POST',
					dataType: 'json',
					data: {
						'wallet_id': $('#new_card_wallet_id').val().trim()
					},
					success: function (data, textStatus, xhr) {
						console.log(data.data.success);
						if (data.data.success && data['errors'].length == 0) {
							location.reload();
						} else {
							$(this).html('Create card <i class="fa fa-check"></i>');
							NOTIFY.show('Something is wrong, please try again later.', 'error');
						}
					}
				});
			});
		}

		if($('.single-card').length > 0) {
			var current_card_id = 0;
			$('.single-card').on('mouseover', function() {
				$(this).addClass('active');
			})

			$('.single-card').on('mouseleave', function(){
				$(this).removeClass('active');
			})

			$('.single-card .actions .delete-wallet').on('click', function() {
				current_card_id = $(this).data('card-id');
				$('#deleteCardModal').modal('show');
				$('#deleteCardModal .modal-message').html('<p>Are you sure you want to delete this card?');

			})

			$('#delete_card_btn').on('click', function() {
				if(current_card_id != 0) {
					$(this).html('<i class="fa fa-circle-notch fa-spin"></i>');

					$.ajax({
					url: '/api/delete_card',
					type: 'POST',
					dataType: 'json',
					data: {
						'card_id': current_card_id
					},
					success: function (data, textStatus, xhr) {
						console.log(data.data.success);
						if (data.data.success && data['errors'].length == 0) {
							location.reload();
						} else {
							$(this).html('Delete card <i class="fa fa-trash"></i>');
							NOTIFY.show('Something is wrong, please try again later.', 'error');
						}
					}
				});
				}
			})
		}

		if($('#update_user_btn').length > 0) {

			$('#update_user_btn').on('click', function(e) {
				e.preventDefault();
				var input = $('#user_update_form .validate-input');
				$('#aggrement_error').hide();

				var btn = $('#update_user_btn');
                var btn_html = $('#update_user_btn').html();

                LOADER.show(btn, 'processing');

				var user = {};
				var data = $('#user_update_form').serializeArray().reduce(function(obj, item) {
					user[item.name] = item.value;
					return user;
				}, {});

				data['currency_ids'] = $('#currency_select').val();

				var check = true;

				for(var i=0; i<input.length; i++) {
					if(validate(input[i]) == false){
						showValidate(input[i]);
						check=false;
					} else {
						hideValidate(input[i]);
					}
				}

				if(check) {
					$.ajax({
						url: '/api/update_user',
						type: 'POST',
						dataType: 'json',
						data: {'user': JSON.stringify(data)},
						success: function(data, textStatus, xhr) {
							if (data.data.success && data['errors'].length == 0) {
								NOTIFY.show('Info updated', 'success');

							} else {
								NOTIFY.show('Something is wrong, please try again later.', 'error');
							}
							LOADER.restore(btn, btn_html);
						}
					});
				} else {
					LOADER.restore(btn, btn_html);
				}

			});
		}

	})



	$('#notification button.close').on('click', function() {
		NOTIFY.close();
	})

	$('.hide-modal').on('click', function() {
		hideModals();
	})

	$('.close_add_menu').on('click', function() {
		hideSlides();
	})

	$('.my-modal .payment-method').on('click', function () {
		$('.my-modal .info-box').removeClass('active');
		$(this).addClass('active');
	})

	$(document).click(function (e) {
	    if ($(e.target).is('.my-modal') || $(e.target).is('.my-modal .inner')) {
			hideSlides();
	        hideModals();
	    }

	});

	$('.show_add_menu').on('click', function() {
		if($('#add_menu').hasClass('in')) {
			hideSlides();
		} else {
			$('.my-modal.side-menu-add').show();
			$('#add_menu').addClass('in');
			$('#add_menu').show( "slide", { direction: "right" }, 200 );
		}
	})

	function hideSlides() {
		$('.my-modal.side-menu-add').hide( "fade", { direction: "down" }, 300 );
		$('#add_menu').removeClass('in');
		$('#add_menu').hide( "slide", { direction: "right" }, 200 );
	}

	function hideModals() {
		$('body').css('overflow-y', 'auto');
		$('.my-modal').hide( "fade", { direction: "down" }, 200 );
		$('.stepy').stepy('step', 0);
		$('.my-modal form')[0].reset();
	}
})

function updateWalletBalance(id) {
	is_initial_click = false;
	$.ajax({
		url: '/api/refresh_wallet',
		type: 'POST',
		dataType: 'json',
		data: {
			'wallet_id': id
		},
		success: function (data, textStatus, xhr) {
			if (data.data.success && data['errors'].length == 0) {
				var wallet = data.data.wallet;
				$('#wallet_balance_' + wallet.wallet_id).text(myFormatNumber(wallet.wallet_balance.toFixed(2)));
			} else {
				NOTIFY.show('Something is wrong, please try again later.', 'error');
			}
		}
	});
}

$('.form-control.validate').each(function(){
        $(this).focus(function(){
           hideValidate(this);
        });
    });

    $('.form-control.validate').each(function(){
        $(this).keyup(function(){
            if(validate(this) == false) {
                showValidate(this);
            } else {
                hideValidate(this);
            }
        });
	});

	var input = $('.form-control');

    function validate (input) {
        if($(input).attr('type') == 'email' || $(input).hasClass('email')) {
            if($(input).val().trim().match(/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$/) == null) {
                return false;
            }
        }

        if($(input).attr('type') == 'password' || $(input).hasClass('password')) {
            if($(input).val().trim().match(/[^\s]*[0-9][^\s]*[A-Z][^\s]*|[^\s]*[A-Z][^\s]*[0-9][^\s]*$/) == null) {
                return false;
            }
        }

        if($(input).hasClass('name')) {
            if ($(input).val().trim().length < 3) {
                return false;
            }
        } else {
            if($(input).val().trim() == ''){
                return false;
            }
        }

        return true;
    }

    function showValidate(input) {
        var thisAlert = $(input);
        $(thisAlert).parent().find('span.validate-error').html('<i class="fa fa-exclamation-circle red-text"></i>').addClass('error');

        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input);
        $(thisAlert).parent().find('span.validate-error').html('').removeClass('error');

        $(thisAlert).removeClass('alert-validate');
	}

var LOADER = {
	show: function(input, text = '') {
		if($('.errors').length > 0) {
			$('.errors').hide();
		}

		text == '' ? 'please wait' : text;
		$(input).addClass('btn-loading').html('<span class="ajax-loading"><i class="fa fa-circle-notch fa-spin"></i> ' + text + '...</span>');
	},
	restore: function(input, html) {
		setTimeout(function() {
			$(input).removeClass('btn-loading').html(html);
		}, 1000);
	}
}

function myFormatNumber(x) {
	return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
}

var CURRENCY_CONVERTER = {
	convert: function(from, to, rate, amount) {
        return rate != 0 ? amount * rate : amount;
	}
}



var NOTIFY = {
	show: function(message, type) {
		var t = setTimeout(function() {
			NOTIFY.close();
		}, 6000);

		if($('#notification').hasClass('shown')) {
			window.clearTimeout(t);
			return false;
		}

		$('#notification').animate({
			height: "toggle"
		});

		$('#notification').addClass('shown');
		$('#notification .close').show();

		if(type == 'error') {
			$('#notification').addClass('danger').removeClass('success');
		} else {
			$('#notification').removeClass('danger').addClass('success');
		}

		$('#notification .message-text').text(message);

	},
	close: function() {
		if($('#notification').hasClass('shown')) {
			$('#notification .message-text').text('');
			$('#notification .close').hide();
			$('#notification').animate({
				height: "toggle"
			}, 200, function() {
			    $('#notification').removeClass('shown');
			});
		}
	}
}
