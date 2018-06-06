//Datemask dd/mm/yyyy
// $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': '' })
// $('[data-mask]').inputmask()


var login_attempts = 3;
var count_down = 180;


$(function () {
    'use strict'

    $(document).ready(function () {

        $('#register_account_type').on('change', function() {
            var checked = $(this).prop('checked');
            var value = 1;
            var lbl = 'Default wallet';
            if(checked) {
                value = 2;
                lbl = 'Account currency';
                $('#business_name_holder').show(100);
            } else {
                $('#business_name_holder').hide(100);
            }

            $('#register_account_type_id').val(value);
            $('#currency_lbl').text(lbl);
        });

        $('#register_btn').on('click', function (e) {
            e.preventDefault();

            var input = $('#register_form .form-control.validate');
            var check = true;

            for (var i = 0; i < input.length; i++) {
                if (validate(input[i]) == false) {
                    showValidate(input[i]);
                    check = false;
                } else {
                    hideValidate(input[i]);
                }
            }

            if (check) {
                var user = {};
                var data = $('#register_form').serializeArray().reduce(function (obj, item) {
                    user[item.name] = item.value;
                    return user;
                }, {});

                var btn = $('#register_btn');
                var btn_html = $('#register_btn').html();

                LOADER.show(btn, 'creating your account');

                $.ajax({
                    url: '/api/register',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        'user': JSON.stringify(data)
                    },
                    success: function (data, textStatus, xhr) {
                        console.log(data.data.success);
                        if (data.data.success && data['errors'].length == 0) {
                            location.href = "/register/success";

                        } else {
                            var err = data['errors'];

                            if (login_attempts == 2) {
                                err += '<p>You are left with <strong>1</strong> login attempt</p>';
                            }

                            if (err.length > 0 || !data.data.success) {
                                NOTIFY.show('Something is wrong, please try again later.', 'error');
                                $('#register_form .errors').show().html(err);
                            }

                        }

                        LOADER.restore(btn, btn_html);
                    }
                });
            }
        });

        $('#finish_setup_btn').on('click', function(e){
            e.preventDefault();

            var input = $('#finish_setup_form .form-control.validate');
            var check = true;

            for (var i = 0; i < input.length; i++) {
                if (validate(input[i]) == false) {
                    showValidate(input[i]);
                    check = false;
                } else {
                    hideValidate(input[i]);
                }
            }

            if (check) {
                var user = {};
                var data = $('#finish_setup_form').serializeArray().reduce(function (obj, item) {
                    user[item.name] = item.value;
                    return user;
                }, {});

                var btn = $('#finish_setup_btn');
                var btn_html = $('#finish_setup_btn').html();

                LOADER.show(btn, 'finishing setup');

                $.ajax({
                    url: '/api/setup_complete',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        'user': JSON.stringify(data)
                    },
                    success: function (data, textStatus, xhr) {
                        console.log(data.data.success);
                        if (data.data.success && data['errors'].length == 0) {
                            location.href = "/dashboard";

                        } else {
                            NOTIFY.show('Something is wrong, please try again later.', 'error');

                        }

                        LOADER.restore(btn, btn_html);
                    }
                });
            }
        });

        $('#country_id').on('select2:selecting', function (e) {
            var code = e.params.args.data.element.dataset.dialCode;
            $(this).attr('data-dial-code', code)
            $('#tel_addon').text(code);
        });

        $('#login_btn').on('click', function (e) {
            e.preventDefault();
            login_attempts--;
            var input = $('#login_form .form-control.validate');
            var check = true;

            for (var i = 0; i < input.length; i++) {
                if (validate(input[i]) == false) {
                    showValidate(input[i]);
                    check = false;
                } else {
                    hideValidate(input[i]);
                }
            }

            if (check) {
                var btn = $('#login_btn');
                var btn_html = $('#login_btn').html();

                LOADER.show(btn, 'logging in');

                var user = {};
                var data = $('#login_form').serializeArray().reduce(function (obj, item) {
                    user[item.name] = item.value;
                    return user;
                }, {});

                $.ajax({
                    url: '/api/login',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        'user': JSON.stringify(data)
                    },
                    success: function (data, textStatus, xhr) {
                        console.log(data.data.success);
                        if (data.data.success && data['errors'].length == 0) {
                            location.href = "/dashboard";

                        } else {
                            setTimeout(function () {
                                $('#cs_loader').hide();
                                $('#auth_modal').modal('show');
                                $('#form_errors').show();
                            }, 2000);

                            var err = data['errors'];

                            if (login_attempts > 0) {
                                err += '<p>You are left with <strong class="red-text">' + login_attempts + '</strong> login attempt</p>';
                            } else if (login_attempts == 0) {
                                $('#login_btn').attr('disabled', 'disabled');
                                err = '<p>You have been locked out, please try again in:<br/> <strong id="login_count_down" class="red-text">2m 59s</strong></p>';
                                var countDownDate = new Date();
                                countDownDate.setSeconds(countDownDate.getSeconds() + count_down);

                                // Update the count down every 1 second
                                var x = setInterval(function () {
                                    var now = new Date().getTime();
                                    var distance = countDownDate - now;

                                    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                                    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                                    $('#login_count_down').text(minutes + "m " + seconds + "s");

                                    if (minutes == 0 && seconds == 10) {
                                        $.ajax({
                                            url: '/api/clear_lockdown',
                                            type: 'POST',
                                            dataType: 'json',
                                            data: {
                                                identity: $('#login_email').val().trim()
                                            },
                                            success: function (data, textStatus, xhr) {}
                                        });
                                    }

                                    if (minutes == 0 && seconds == 0) {
                                        $('#login_form')[0].reset();
                                        $('#login_btn').removeAttr('disabled');
                                        $('.errors').html('').hide();
                                        clearInterval(x);
                                    }
                                }, 1000);
                            }

                            if (data['errors'].length > 0) {
                                $('#login_form .errors').show().html(err);
                            }

                        }
                        LOADER.restore(btn, btn_html);
                    }
                });
            } else {
                return false;
            }
        });

        $('#change_password_btn').on('click', function(e) {
            e.preventDefault();
            var input = $('#reset_password_form .form-control.validate');
            var check = true;

            for (var i = 0; i < input.length; i++) {
                if (validate(input[i]) == false) {
                    showValidate(input[i]);
                    check = false;
                } else {
                    hideValidate(input[i]);
                }
            }

            if (check) {
                if($('#change_password').val().trim() == $('#repeat_change_password').val().trim()) {

                    var btn = $('#change_password_btn');
                    var btn_html = $('#change_password_btn').html();

                    LOADER.show(btn, 'changing password');

                    $.ajax({
                        url: '/api/complete_forgot_password',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            'password': $('#change_password').val().trim(),
                            'email': $('#user_email').val().trim()
                        },
                        success: function (data, textStatus, xhr) {
                            if (data.data.success && data['errors'].length == 0) {
                                NOTIFY.show('Password changed', 'success');
                                setTimeout(function() {
                                    location.href = '/login';
                                }, 4000)
                            } else {
                                if (data['errors'].length > 0) {
                                    NOTIFY.show('An error occured, please try again.', 'error');
                                }

                            }

                            LOADER.restore(btn, btn_html);
                        }
                    });
                } else {
                    NOTIFY.show('Passwords do not match.', 'error');
                }
            } else {
                return false;
            }
        });

        $('#forgotPasswordModal').on('show.bs.modal', function() {
            $('#forgotPasswordModal #forgot_password_form, #forgot_password_btn').show();
            $('#forgotPasswordModal #forgot_password_form .errors, #forgotPasswordModal .success').hide().html('');
        })

        $('#forgot_password_btn').on('click', function(e) {
            e.preventDefault();
            $('#forgotPasswordModal #forgot_password_form .errors, #forgotPasswordModal .success').hide().html('');
            var input = $('#forgot_password_form .form-control.validate');
            var check = true;

            for (var i = 0; i < input.length; i++) {
                if (validate(input[i]) == false) {
                    showValidate(input[i]);
                    check = false;
                } else {
                    hideValidate(input[i]);
                }
            }

            if (check) {
                var btn = $('#forgot_password_btn');
                var btn_html = $('#forgot_password_btn').html();

                LOADER.show(btn, 'sending link');

                $.ajax({
                    url: '/api/forgot_password',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        'email': $('#forgot_password_email').val().trim()
                    },
                    success: function (data, textStatus, xhr) {
                        if(data.data.message) {
                            $('#forgotPasswordModal #forgot_password_form .errors').show().html(data.data.message);
                        } else {
                            if (data.data.success && data['errors'].length == 0) {
                                $('#forgotPasswordModal .success').show().html('<p class="text-center">Instructions to reset your password will be sent to you shortly. Please check your email</p>');
                                $('#forgotPasswordModal #forgot_password_form, #forgot_password_btn').hide();
                            } else {
                                if (data['errors'].length > 0) {
                                    $('#forgot_password_form .errors').show().html(data['errors']);
                                    $('#forgot_password_btn');
                                }

                            }
                        }

                        LOADER.restore(btn, btn_html);
                    }
                });
            } else {
                return false;
            }
        });


        $('#activate_btn').on('click', function (e) {
            e.preventDefault();
            var input = $('#activation_form .form-control.validate');
            var check = true;

            for (var i = 0; i < input.length; i++) {
                if (validate(input[i]) == false) {
                    showValidate(input[i]);
                    check = false;
                } else {
                    hideValidate(input[i]);
                }
            }

            if (check) {
                var btn = $('#activate_btn');
                var btn_html = $('#activate_btn').html();

                LOADER.show(btn, 'activating your account');

                $.ajax({
                    url: '/api/activate_account',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        'code': $('#activation_code').val().trim(),
                        'email': $('#param').val().trim()
                    },
                    success: function (data, textStatus, xhr) {
                        if (data.data.success && data['errors'].length == 0) {
                            location.href = "/dashboard";

                        } else {
                            if (err.length > 0) {
                                $('#login_form .errors').show().html(err);
                            }

                        }
                        LOADER.restore(btn, btn_html);
                    }
                });
            } else {
                return false;
            }
        });

    })
})