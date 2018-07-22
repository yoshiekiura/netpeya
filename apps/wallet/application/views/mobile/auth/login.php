<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    $CI = & get_instance();
    $CI->load->view('mobile/templates/auth_header');
?>

<div class="login">
	<h2 class="header-title">Sign in to<br/><span class="green-text">Net</span>Peya</h2>
</div>


<a class="bottom-bar" href="/register">Don't have an account?<span class="green-text">Sign up</span></a>

<?php $CI->load->view('mobile/templates/footer'); ?>