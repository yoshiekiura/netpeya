$(function() {

	if($('.showDeleteIpModal').length > 0) {
		$('.showDeleteIpModal').on('click', function () {
			$('#deleteIpModal').modal('show');
			$('#deleteIpModal .modal-body .modal-message').html(`
				Are you sure you want to delete <strong> ` + $(this).attr('data-name') + `</strong> ?
			`);

			$('#deleteIpModal .modal-body #ip_id').val($(this).attr('data-id'));
		});
	}

	if($('#delete_ip_btn').length > 0) {
		$('#delete_ip_btn').on('click', function () {

			var btn = $('#delete_ip_btn');
            var btn_html = $('#delete_ip_btn').html();
            LOADER.show(btn, 'deleting ip');

			$.ajax({
				url: '/api/delete_ip',
				type: 'POST',
				dataType: 'json',
				data: {
					'id': $('#deleteIpModal .modal-body #ip_id').val().trim()
				},
				success: function (data, textStatus, xhr) {
					console.log(data.data.success);
					if (data.data.success && data['errors'].length == 0) {
						location.reload();
					} else {
						NOTIFY.show('Something is wrong, please try again later.', 'error');
					}
					LOADER.restore(btn, btn_html);
				}
			});
		});
	}

	if($('#add_ip_btn').length > 0) {
		$('#add_ip_btn').on('click', function () {
			var new_ip = $('#new_ip').val().trim();

            if(new_ip == '') {
				NOTIFY.show('Please provide an ip address', 'error');
				return false;
            }
			var btn = $('#add_ip_btn');
            var btn_html = $('#add_ip_btn').html();
            LOADER.show(btn, 'processing');

			$.ajax({
				url: '/api/add_allowed_ip',
				type: 'POST',
				dataType: 'json',
				data: {
					'new_ip': new_ip
				},
				success: function (data, textStatus, xhr) {
					console.log(data.data.success);
					if (data.data.success && data['errors'].length == 0) {
						location.reload();
					} else {
						NOTIFY.show('Something is wrong, please try again later.', 'error');
					}
					LOADER.restore(btn, btn_html);
				}
			});
		});
	}

	if($('#refresh_keys_btn').length > 0) {
		$('#refresh_keys_btn').on('click', function () {
			var btn = $('#refresh_keys_btn');
            var btn_html = $('#refresh_keys_btn').html();
            LOADER.show(btn, 'processing');
            
			$.ajax({
				url: '/api/refresh_api_keys',
				type: 'POST',
				dataType: 'json',
				data: {},
				success: function (data, textStatus, xhr) {
					if (data.data.success && data['errors'].length == 0) {
						location.reload();
					} else {
						NOTIFY.show('Something is wrong, please try again later.', 'error');
					}
					LOADER.restore(btn, btn_html);
				}
			});
		});
	}

	if($('#upload_form').length > 0) {
		$('#upload_form').submit(function(e) {
			e.preventDefault();

			var btn = $('#file_upload_btn');
            var btn_html = $('#file_upload_btn').html();
            LOADER.show(btn, 'Uploading files');

			var file_data = $('#docs').prop('files')[0];
            var form_data = new FormData();
            form_data.append('file', file_data);

            $.ajax({
                url: '/api/upload_files', // point to server-side controller method
                dataType: 'json', // what to expect back from the server
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function (data, textStatus, xhr) {
                    if (data.data.success && data['errors'].length == 0) {
						$('.verification-status').html('<p>Pending  <i class="fa fa-check-circle red-text"></i></p>');
						NOTIFY.show('Files uploaded.', 'success');
					} else {
						NOTIFY.show('Upload failed, try again.', 'error');
					}
					LOADER.restore(btn, btn_html);
                },
                error: function (data, textStatus, xhr) {
					NOTIFY.show('Upload failed, try again.', 'error');
					LOADER.restore(btn, btn_html);
                }
            });
		});
	}
})