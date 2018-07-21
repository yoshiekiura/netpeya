<?php if($pageTitle != 'transactions'): ?>
				</div>
	        </div>
	    </div>
	</section>
<?php endif; ?>
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

</div>
        </main>
        <footer>
        	<div class="mobile">
        		<nav class="mobile-footer-nav">
        			<ul>
        				<li>
                        	<a href="/deposit" class="deposit">
                        		<img class="icon" src="/assets/images/icons/deposit.png" />
                        		<span>deposit</span>
                        	</a>
	                    </li>
	                    <li>
	                        <a href="" class="withdraw">
	                        	<img class="icon" src="/assets/images/icons/withdraw.png" />
                        		<span>withdraw</span>
	                        </a>
	                    </li>
        				<li>
                        	<a href="/deposit" class="deposit">
                        		<img class="icon" src="/assets/images/icons/send.png" />
                        		<span>send</span>
                        	</a>
	                    </li>
	                    <li>
	                        <a href="" class="withdraw">
	                        	<img class="icon" src="/assets/images/icons/request.png" />
                        		<span>request</span>
	                        </a>
	                    </li>
        			</ul>
        		</nav>
        	</div>
        	<div class="container hidden-mobile">
        		<div class="webkit-box">
        			<div class="col-md-1 no-left">
        				<a href="" class="logo"><img src="/assets/svg/logos/logo-short.svg" /></a>
        			</div>
        			<div class="col-md-11 no-right">
		        		<div class="footer-top">
		        			<span class="updated">Last updated: Mar 19, 2018 4:02 PM UTC</span>
		        			<p class="pull-right">
			        			<a class="nav-link lang dropdown-btn">English</a>
			        			<ul class="dropdown-content language-switch">
								    <li data-value="en">English</li>
								    <li data-value="es">Spanish</li>
								</ul>
							</p>
		        		</div>
		        		<div class="footer-bottom">
		        			<ul>
		        				<li class="copy">
		        					<a href="">© 2018 netpeya.com</a>
		        				</li>
		        				<li>
		        					<a href="">Terms</a>
		        				</li>
		        				<li>
		        					<a href="">Privacy</a>
		        				</li>
		        				<li>
		        					<a href="">Send Feedback</a>
		        				</li>
		        				<li class="pull-right">
		        					<a href="">Become an affiliate</a>
		        				</li>
		        			</ul>
		        		</div>
		        	</div>
	        	</div>
        	</div>
        </footer>
        <div class="np-modal-wrapper" id="addDepositMethodModal">
	        <div class="np-modal">
	        	<div class="np-modal-header"><a href="" class="np-modal-close"><img src="/assets/images/icons/close.png"></a></div>
	    		<div class="np-modal-body">
	        		
		        </div>
		        <div class="np-modal-footer"></div>
	        </div>
	    </div>
    </body>
<script type="text/javascript" src="/assets/vendors/jquery/jquery.min.js"></script>
<script type="text/javascript" src="/assets/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="/assets/vendors/card-validator/card_validator.js"></script>
<script type="text/javascript" src="/assets/vendors/validate/jquery.validate.min.js"></script>
<script type="text/javascript" src="/assets/vendors/validate/additional-methods.min.js"></script>
<script type="text/javascript" src="/assets/js/app.js"></script>
<script type="text/javascript" src="/assets/js/deposit.js"></script>
<script type="text/javascript" src="/assets/js/friends.js"></script>
</html>