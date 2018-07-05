$(function() {
	// $(document).on('click', '#add_friend_btn', function(e) {
 //        e.preventDefault();
 //        window.location.hash += 'add';
 //        getPage('friend/add');
 //    });

 //    $(document).on('click', '.edit_friend_btn', function(e) {
 //        e.preventDefault();
 //        var id = $(this).data('id');
 //        getPage('friend/edit/'+ id);
 //    });


    $(document).on('click', '#do_add_friend', function(e) {
        e.preventDefault();
        var validator = $("#friend_form").validate({
            rules: {
                first_name: {
                    required: true,
                    minlength: 3
                },
                last_name: {
                    required: true,
                    minlength: 3
                },
                email: {
                    required: true,
                    email: true
                },
                phone: {
                }
            }
        });

        if(validator.form()) {
            var friend = {};
            var data = $("#friend_form").serializeArray().reduce(function (obj, item) {
                friend[item.name] = item.value;
                return friend;
            }, {});

            var container = $('.app_content');
            container.html('').removeClass('loaded');

            $.ajax({
                url: '/ajax/add_friend',
                type: 'POST',
                data: {
                    'friend': JSON.stringify(data)
                },
                success: function (data, textStatus, xhr) {
                    setTimeout(function() {
                        if (data) {
                            container.html(data).addClass('loaded').css({'padding': '0', 'height': 'auto'});
                            container.find('.add-friend-result img').addClass('animated zoomInDown');
                            container.find('.cont').addClass('animated slideInUp');
                            setTimeout(function() {
                                container.find('.add-friend-result').css('background-color', '#fff');
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