<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $CI = & get_instance();
    $CI->load->view('mobile/templates/header');
?>

<div class="container">
	<section>
		<div class="card user-summary box-shadow">
            <div class="user-profile">
                <div class="user-pic"><?= $user->first_name[0] . $user->last_name[0] ?></div>
                <div class="user-details">
                    <span class="user-name"><?= $user->first_name . ' ' . $user->last_name ?></span>
                    <span class="user-account-id"><strong>ID: </strong><?= $user->np_id ?></span>
                </div>
            </div>
            <div class="user-balance mt-3 border-top pt-3">
                <div class="user-currency" style="background-image: url('/assets/svg/countries/<?= strtolower($user->currency_code) ?>.svg');"></div>
                <div class="balance-details">
                    <strong class="balance-title">Your Balance:</strong>
                    <span class="balance-amount green-text"><?= $user->currency_simbol . number_format($user->account_balance, 2, '.', ' ') ?></span>
                </div>
            </div>
        </div>
	</section>
	<section>
		<div class="app_content card lazyload">
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
												<div class="left"><span class="time fade-text"><?= $activity->time ?></span></div>
												<div class="right"><span><?= $activity->description ?></span></div>
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
	</section>
</div>

<?php $CI->load->view('mobile/templates/footer'); ?>