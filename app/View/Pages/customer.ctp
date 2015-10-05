<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
<?php
	echo $this->Html->css ( 'customerCSS' );
	echo $this->Html->script('customerJS'); 
?>
</head>
<body>
<form action="<?php echo $this->webroot; ?>booking/displayDetail/"
		method="post" id="mContactForm">
		<div class="contact-wrapper">
			<div class="title-contactus">Customer Details</div>
			
			
			<div class="q-cust-name">
				<label for="cust-name-txt-area">Name <span
					class="hidden-error" id="cusName-error"> &larr; Name should
						not be null</span></label> <br /> <input type="text" class="input-area"
					id="cust-name-txt-area" name="customer"/>
			</div>
			<div class="q-email">
				<label for="cust-email-txt-area">Email <span
					class="hidden-error" id="cusEmail-error"> &larr; Email
						should not be null or must have @ </span></label> <br /> <input type="email"
					class="input-area" id="cust-email-txt-area" name="email" />
			</div>
			<div class="q-phone">
				<label for="cust-phone-txt-area">Phone <span
					class="hidden-error" id="cusPhone-error"> &larr; Phone
						should not be null</span></label> <br /> <input type="text" class="input-area"
					id="cust-phone-txt-area" name="phone" />
			</div>
		
			<div class="q-button">
				<a href="#" id="mCF_submit" onclick="actionFormSubmit();"><div
						class="submit-button">Submit</div></a>

			</div>

		</div>

	</form>

</body>
</html>