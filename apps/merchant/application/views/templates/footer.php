<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$CI = & get_instance();
?>
<!-- Main content -->
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
	<div class="text-center hidden-xs">
		&copy;<?= date('Y') ?> XanniaPay, a division of Xannia Inc. All rights reserved.
	</div>
</footer>
<input type="hidden" id="current_env" value="<?= $this->user_session['environment_id']?>" name="">

<?php $this->load->view('/templates/side_modals'); ?>

<!-- FastClick -->
<script src="<?= $this->config->item('shared_resources_source') ?>bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?= $this->config->item('base_url') ?>assets/js/global.min.js"></script>
<!-- Sparkline -->
<script src="<?= $this->config->item('shared_resources_source') ?>bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- SlimScroll -->
<script src="<?= $this->config->item('shared_resources_source') ?>bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?= $this->config->item('shared_resources_source') ?>bower_components/moment/min/moment.min.js"></script>
<script src="<?= $this->config->item('shared_resources_source') ?>bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="<?= $this->config->item('shared_resources_source') ?>bower_components/fuelux/js/fuelux.min.js"></script>
<script src="<?= $this->config->item('shared_resources_source') ?>bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="<?= $this->config->item('shared_resources_source') ?>bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="<?= $this->config->item('shared_resources_source') ?>plugins/iCheck/icheck.min.js"></script>
<script src="<?= $this->config->item('shared_resources_source') ?>plugins/pace/pace.min.js"></script>
<script src="<?= $this->config->item('shared_resources_source') ?>plugins/jQueryScrollTo/jquery.scrollTo.min.js"></script>
<script src="<?= $this->config->item('shared_resources_source') ?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= $this->config->item('shared_resources_source') ?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= $this->config->item('base_url') ?>assets/js/app.js"></script>
<script src="<?= $this->config->item('base_url') ?>assets/js/auth.js"></script>
<script src="<?= $this->config->item('base_url') ?>assets/js/withdraw.js"></script>
</body>
</html>
