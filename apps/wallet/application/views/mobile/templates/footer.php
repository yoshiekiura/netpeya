<?php
	if($this->session->flashdata('flash_erros')) {
		$this->session->unmark_flash('flash_erros');
		unset($_SESSION['flash_erros']);
	}
	if(isset($_SESSION['flash_success'])) {
		$this->session->unmark_flash('flash_success');
		unset($_SESSION['flash_success']);
	}
?>
</main>
</body>
<script type="text/javascript" src="/assets/vendors/jquery/jquery.min.js"></script>
<script type="text/javascript" src="/assets/vendors/jquery/jquery.cookie.js"></script>
<script type="text/javascript" src="/assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="/assets/vendors/card-validator/card_validator.js"></script>
<script type="text/javascript" src="/assets/vendors/validate/jquery.validate.min.js"></script>
<script type="text/javascript" src="/assets/vendors/validate/additional-methods.min.js"></script>
<script type="text/javascript" src="/assets/js/app.js"></script>
<script type="text/javascript" src="/assets/js/deposit.js"></script>
<script type="text/javascript" src="/assets/js/friends.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$([document.documentElement, document.body]).animate({
	        scrollTop: $("header").offset().top
	    }, 500);

	    $(document).on('click', '#sidebar_opener', function() {
	    	$('.app header .right').css('background-color', '#fff');
	    	$('.sidebar, .app header .right #sidebar_close').show();
	    });

	    $(document).on('click', '#sidebar_close', function() {
	    	$('.app header .right').css('background-color', 'transparent');
	    	$('.sidebar, .app header .right #sidebar_close').hide();
	    });
	})
</script>
</html>