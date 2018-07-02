<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $CI = & get_instance();
    $CI->load->view('templates/header');

?>
<div class="dashboard-app">
<?php if(count($activities) > 0): ?>
	<div class="activity-holder">
		<p class="title">Account Activity</p>
		<ul class="activity-list">
			<?php foreach($activities as $key => $day_activity): ?>
				<li class="single-activity">
					<p class="sub-title"><?= $key ?></p>
					<ul>
						<?php foreach ($day_activity as $activity): ?>
							<li>
								<span class="time fade-text"><?= $activity->time ?></span>
								<span class="pl-3"><?= $activity->description ?></span>
							</li>
						<?php endforeach; ?>
					</ul>
				</li>
			<?php endforeach; ?>
		</ul>
		<p class="pull-right"><a class="view-more" href="">View more <img src="/assets/images/icons/arrow-right.png" /></a></p>
	</div>
<?php endif; ?>
</div>

<?php $CI->load->view('templates/footer'); ?>

            