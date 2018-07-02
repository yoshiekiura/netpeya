<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $CI = & get_instance();
    $CI->load->view('templates/header');

?>

<?php if(count($friends) > 0): ?>
	<div class="friends-holder p-3">
		<?php foreach($friends as $friend): ?>
			<div class="single-friend">
				<?= $friend->first_name . ' ' . $friend->last_name ?>
			</div>
		<?php endforeach; ?>
	</div>
<?php endif; ?>

<?php $CI->load->view('templates/footer'); ?>
            