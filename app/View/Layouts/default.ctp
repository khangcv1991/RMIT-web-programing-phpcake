<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('background');
		
		echo $this->Html->script('http://code.jquery.com/jquery-1.10.2.js'); 
		echo $this->Html->script('http://code.jquery.com/ui/1.11.4/jquery-ui.js'); 
		echo $this->Html->script('myjs');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		
	?>
</head>
<body>
	<div class="wrapper">
		<div class="header">
				<div class="header-nav">
					<div class="cart-wrapper">
						<ul>
							<li><a href="<?php echo $this->webroot; ?>pages/cart"><span id="cart-money"> $<?php echo number_format($this->Session->read ( 'total' ), 2); ?> </span><img
									src="<?php echo $this->webroot; ?>img/cart.png" alt="Smiley face" height="21" width="21"></a>
								<ul>
								</ul></li>
							<ul>
					
					</div>
				</div>
				<div class="left-header   ">
					<a href="<?php  echo $this->webroot;?>"> <img alt="" src="<?php echo $this->webroot; ?>img/logo1.png">
					</a>
				</div>
				<div class="right-header">
					<form name="mail_form" id="mail_form" method="POST" action="">
						<div class="search-wrapper">
							<div
								style="position: absolute; width: 24px; height: 20px; margin-left: 200px; padding-top: 2px">
								<a href=""> <i class="fa-icon">hhh</i>
								</a>
							</div>
							<input type="text" name="" class="search-box" placeholder="Search" />
			
						</div>
					</form>
				</div>
				<div class="cen-header">
					<!-- add title name -->
					<div class="title">
						<h1>The Cinema of RMIT</h1>
					</div>
					<div class="sub-title">
						
					</div>
				</div>
			</div>
			
		<div class="navigator">
	<div style="margin-left: 0px; width: 850px; height: 45px;">
		<ul class="nav nav-tabs">
			<li><a href="<?php  echo $this->webroot."pages/movie";?>">Movie</a></li>
			<li><a href="#">Event</a></li>
			<li><a href="<?php  echo $this->webroot."pages/viewticket";?>">STicket</a></li>
			<li><a href="<?php  echo $this->webroot."pages/booking";?>">Booking</a></li>
			<li><a href="#">Location</a></li>
			<li><a href="<?php  echo $this->webroot."pages/contactpage";?>">Contact Us</a></li>
		</ul>
	</div>
</div>
		
		<div id="content">

			<?php echo $this->Flash->render(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div class="footer">
	<div class="footer-part1">
		<div class="left-footer-part1">
			<h3>Contact us</h3>
			<p>Phone:123 456</p>
			<p>Fax:123 456</p>
			<p>Email:rmit_cinema@gmail.com</p>
		</div>

		<div class="middle-footer-part1">
			<h3>Address</h3>
			<p>
				376 Bowen Street<br>Melbourne VIC 3000<br>Australia
			</p>
		</div>

		<div class="right-footer-part1">
			<ul class="social links">
				<li><a href="https://www.facebook.com/RMITuniversity"><img
						src="<?php echo $this->webroot; ?>img/facebook.png" alt="#" style="width: 40px; height: 40px" /></a></li>
				<li><a href="https://twitter.com/rmit"><img src="<?php echo $this->webroot; ?>img/twitter.png"
						alt="" style="width: 40px; height: 40px" /></a></li>
				<li><a href="https://www.youtube.com/user/rmitmedia"><img
						src="<?php echo $this->webroot; ?>img/youtube.png" alt="" style="width: 40px; height: 40px" /></a></li>

			</ul>
		</div>
	</div>
	<div class="footer-part2">
		<div class="left-footer-part2">
			<ul class="footer-nav">
				<li><a href="#">About Us</a></li>
				<li class="dropdown"><a href="#">Privacy Policy<span class="caret"></span></a></li>
				<li><a href="#">Conditions</a></li>

				<li><a href="#">VMC Terms</a></li>
				<li><a href="#">FAQs</a></li>
			</ul>
		</div>
		<div class="right-footer-part2">
			&copy; Van Khang Cao s3525926& Zhen Duan s3548038
			<script>
						document.write(new Date().getFullYear());
					</script>
		</div>
	</div>
</div>

	</div>
	
</body>
</html>
