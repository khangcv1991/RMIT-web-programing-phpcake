<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
<?php
	echo $this->Html->css ( 'customerCSS' );
	echo $this->Html->script('viewticketJS'); 
?>
</head>
<body>
<form action="<?php echo $this->webroot; ?>booking/viewReservarion/"
		method="post" id="mViewForm">
		<div class="contact-wrapper">
			<div class="title-contactus">Check Reservation</div>
			<div class="q-email">
				<label for="cust-email-txt-area">Email <span
					class="hidden-error" id="cusEmail-error"> &larr; Email
						should not be null or must have @ </span></label> <br /> <input type="email"
					class="input-area" id="cust-email-txt-area" name="email" />
			</div>
			
			<div class="q-button">
				<a href="#" id="mCF_submit" onclick="actionFormSubmit('mViewForm');"><div
						class="submit-button">Submit</div></a>

			</div>

		</div>

	</form>

</body>
</html>