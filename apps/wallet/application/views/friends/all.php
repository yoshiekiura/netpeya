<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $CI = & get_instance();
    $CI->load->view('templates/header');

?>

<?php if(count($friends) > 0): ?>
	<div class="friends-holder p-3">
		<?php foreach($friends as $friend): ?>
			<div class="single-friend webkit-box">
				<div class="col-md-2">
					<p class="friend-abrv"><?= $friend->first_name[0] . $friend->last_name[0] ?></p>
				</div>
				<div class="col-md-6">
					<p><?= $friend->first_name . ' ' . $friend->last_name ?> <span class="pull-right"><?= $friend->email  ?></span></p>
				</div>
				<div class="col-md-4">
					<p class="pull-right">
						<button class="btn transact_friend_btn"></button>
						<a href="/friends/edit/<?= $friend->id ?>" class="btn edit_friend_btn" data-id="<?= $friend->id ?>"></a>
						<a class="btn hot_friend_btn"></a>
					</p>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
<?php else: ?>
	<div class="no-friends">
		<p class="text-center">No friends found</p>
		<a href="/friends/add" class="btn">Add a friend</a>
	</div>
<?php endif; ?>

<?php $CI->load->view('templates/footer'); ?>
            