$(document).ready(function() {

	setTimeout(function () {
	    $('.lazyload').addClass('loaded');
	 }, 1000); //wait a second

	//***** DROPDOWN ************//

	$(document).on('click', '.dropdown-btn', function(e){
		e.preventDefault();
		$('.dropdown-content').removeClass('show');
		$(this).parent().css('position', 'relative');
		var dropContent = $(this).parent().find('.dropdown-content');
		var parentBottom = $(this).parent().height();

		dropContent.css('top', parentBottom + 5).addClass('show').addClass('active');
	});

	$(document).on('click', '.dropdown-content', function() {
		$(this).removeClass('show').removeClass('active');
	});

	$(document).click(function(event) {
	  	if (!$(event.target).closest('.dropdown-content, .dropdown-btn').length) {
	    	$('body').find('.dropdown-content').removeClass('show');
	  	}
	});

	//******** MODAL ****************//

	$('.show-modal').on('click', function(e) {
			e.preventDefault();
			var modal = $('#' + $(this).data('modal-id'));
			modal.addClass('shown');
	});

	$('.np-modal-close').on('click', function() {
		$('.np-modal-wrapper').removeClass('shown');
	});

	$(document).click(function(event) {
	  	if (!$(event.target).closest('.np-modal, .show-modal').length) {
	    	$('body').find('.np-modal-wrapper').removeClass('shown');
	  	}
	});

	$('.checkbox, .checkbox-label').on('click', function(e) {
		e.preventDefault();
		if($(this).parent().find('.checkbox').hasClass('checked')) {
			$(this).parent().find('.checkbox').removeClass('checked');
			$(this).parent().find('input').val('');
			return;
		} else {
			$(this).parent().find('.checkbox').addClass('checked');
			$(this).parent().find('input').val(1);
		}
	});

	$(document).on('focus change', 'form .input-translate', function() {
		$(this).parent().find('.label-holder').addClass('focus');
	});

	$(document).on('blur', 'form .input-translate', function() {
		if($(this).val().length == 0) {
			$(this).parent().find('.label-holder').removeClass('focus');
		}
	});

    $(document).on('click', '.third-nav ul li a', function(e) {
        e.preventDefault();
        $('.third-nav ul li a').removeClass('active');
        $(this).addClass('active');
    });

	$('.pager').on('click', function(e) {
		$('.pager').removeClass('active');
		$(this).addClass('active');
		var page = $(this).data('page');
		getPage(page);
	})


	//================== AUTH ============================

	$('#register_btn').on('click', function(e) {
		e.preventDefault();

		if(validateForm('#register_form')) {
			var user = {};
            var data = $('#register_form').serializeArray().reduce(function (obj, item) {
                user[item.name] = item.value;
                return user;
            }, {});

            var btn = $('#register_btn');
            var btn_html = $('#register_btn').html();

            LOADER.show(btn, 'creating your wallet');
            $('.errors').empty().hide();

            $.ajax({
                url: '/ajax/register',
                type: 'POST',
                dataType: 'json',
                data: {
                    'user': JSON.stringify(data)
                },
                success: function (data, textStatus, xhr) {
                    if (data.data.success && data['errors'].length == 0) {
                        location.href = "/dashboard";
                    	LOADER.restore(btn, btn_html);

                    } else {
                    	if(data['errors'] !== null) {
                    		if(data['errors'].length > 0) {
	                    		$.each(data['errors'], function(v, t) {
	                    			$('#register_form .errors').show().append('<p>' + t + '</p>');
	                    		});
	                    	}
                    	}
                    	LOADER.restore(btn, btn_html);
                    }

                    LOADER.restore(btn, btn_html);
                }
            });
		} else {
			return false;
		}
        
	});

	$('#login_btn').on('click', function(e) {
		e.preventDefault();

		if(validateForm('#login_form')) {
			var user = {};
            var data = $('#login_form').serializeArray().reduce(function (obj, item) {
                user[item.name] = item.value;
                return user;
            }, {});

            var btn = $('#login_btn');
            var btn_html = $('#login_btn').html();

            LOADER.show(btn, 'logging into wallet');
            $('.errors').empty().hide();

            $.ajax({
                url: '/ajax/login',
                type: 'POST',
                dataType: 'json',
                data: {
                    'user': JSON.stringify(data)
                },
                success: function (data, textStatus, xhr) {
                    if (data.data.success && data['errors'].length == 0) {
                        location.href = "/dashboard";
                    	LOADER.restore(btn, btn_html);

                    } else {

                    	if(data['errors'] !== null) {
                    		if(data['errors'].length > 0) {
	                    		$.each(data['errors'], function(v, t) {
	                    			$('#login_form .errors').show().append('<p>' + t + '</p>');
	                    		});
	                    	}
                    	}
                    	LOADER.restore(btn, btn_html);
                    }

                    LOADER.restore(btn, btn_html);
                }
            });
		} else {
			return false;
		}
        
	});
	
});

function getPage(page, data = []) {
	var container = $('.app_content');
	container.html('').removeClass('loaded');

	$.ajax({
        url: '/' + page,
        type: 'POST',
        data: data,
        success: function (data, textStatus, xhr) {
        	setTimeout(function() {
	            if (data) {
	                container.html(data).addClass('loaded');
	            } else {
	                container.html('<div class="not-found text-center">Not Found</div>').addClass('loaded');
	            }
        	}, 1000);
        }
    });
}

$.validator.addMethod("card_exp_month", function (value, element) {
		    return (value >= 1 && value <= 12);
        },
        "Must be a valid expiry month"
        );
$.validator.addMethod("card_exp_year", function (value, element) {
            var today = new Date();
		    var thisYear = today.getFullYear();

		    return (value >= thisYear);
        },
        "Must be a valid expiry year"
        );


function myFormatNumber(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
}

function validateForm(form_id) {
	$(form_id + ' .validate-message').hide();
	var elements = $(form_id + ' .validate');
    var check = true;
    var errors, ex_errors = 0;

    for (var i = 0; i < elements.length; i++) {
		var val = $(elements[i]).val().trim();
        if(val == "") {
        	errors++;
	        ex_errors++;
		} else {
			if($(elements[i]).attr('type') == 'email' || $(elements[i]).hasClass('email')) {
	            if(val.match(/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$/) == null) {
	        		errors++;
	        		ex_errors++;
	            }
	        } else if($(elements[i]).attr('type') == 'password' || $(elements[i]).hasClass('password')) {
	            if(val.match(/[^\s]*[0-9][^\s]*[A-Z][^\s]*|[^\s]*[A-Z][^\s]*[0-9][^\s]*$/) == null) {
	        		errors++;
	        		ex_errors++;
	            }
	        } else if($(elements[i]).hasClass('name')) {
	            if (val.trim().length < 3) {
	                errors++;
	                ex_errors++;
	            }
	        }
	    }

        if (errors > 0) {
			$(elements[i]).parent().find('.validate-message').show();
        }

        errors = 0;
    }

    return ex_errors > 0 ? false : true;
}

var LOADER = {
	show: function(input, text = '') {
		if($('.errors').length > 0) {
			$('.errors').hide();
		}

		text == '' ? 'please wait' : text;
		$(input).attr('disabled', 'disabled').addClass('btn-loading').html('<span class="ajax-loading"><i class="fa fa-circle-notch fa-spin"></i> ' + text + '...</span>');
	},
	restore: function(input, html) {
		setTimeout(function() {
			$(input).removeAttr('disabled').removeClass('btn-loading').html(html);
		}, 1000);
	}
}

var NOTIFY = {
	show: function(errors, type) {
		$('.notification-holder').show();
		$.each(errors, function(i, v) {
			$('.notification-holder').append('<span id="' + i + '" class="' + type + '">' + v + '</span>');
			setTimeout(function() {
				$('.notification-holder #' + i).remove();
			}, 5000);
		});
	}
}