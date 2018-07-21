<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $CI = & get_instance();
    $CI->load->view('templates/header');

?>
<div class="dashboard-app">
	<div class="activity-holder">
		<?php if(count($activities) > 0): ?>
				<p class="title">Account Activity</p>
				<ul class="activity-list">
					<?php foreach($activities as $key => $day_activity): ?>
						<li class="single-activity">
							<p class="sub-title"><?= $key ?></p>
							<ul>
								<?php foreach ($day_activity as $activity): ?>
									<li>
										<div class="row">
											<div class="col-md-2 no-right"><span class="time fade-text"><?= $activity->time ?></span></div>
											<div class="col-md-10 no-left no-right"><span><?= $activity->description ?></span></div>
										</div>
									</li>
								<?php endforeach; ?>
							</ul>
						</li>
					<?php endforeach; ?>
				</ul>
		<?php endif; ?>
	</div>
</div>

<?php $CI->load->view('templates/footer'); ?>

            