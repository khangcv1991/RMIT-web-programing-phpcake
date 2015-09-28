
<?php
		 echo $this->Html->css('contactcss');
		echo $this->Html->script('contactJS.js');
		?>
<div class="body-wrapper">
	<form action="http://titan.csit.rmit.edu.au/~e54061/wp/testcontact.php"
		method="post" id="mContactForm">
		<div class="contact-wrapper">
			<div class="title-contactus">Contact Us</div>
			<div class="q-ques-type">
				<div class="left-q-ques-type">
					What are you contacting us about? <span class="hidden-error"
						id="subject-error"> &larr; should not be null</span>
				</div>
				<div class="right-q-ques-type">
					<select class="input-area" id="question-subject" name="subject">
						<option>please select</option>
						<option value="General Enquiry">General Enquiry</option>
						<option value="Group and Corporate Bookings">Group and
							Corporate Bookings</option>
						<option value='Suggestions &amp; Complaints'>Suggestions
							&amp; Complaints</option>
					</select>
				</div>
			</div>
			<div class="q-cust-type">
				<div class="right-q-cust-type">
					What type of customer are you? <span class="hidden-error"
						id="cusType-error"> &larr; should not be null</span>
				</div>
				<div class="left-q-cust-type">
					<label for="cust-type-personal">Personal</label> <input
						type="radio" value="personal" id="cust-type-personal"
						name="customerType" /> <label for="cust-type-group">Group</label>
					<input type="radio" value="business" id="cust-type-group"
						name="customerType" />
				</div>
			</div>
			<div class="q-cust-name">
				<label for="cust-name-txt-area">Name <span
					class="hidden-error" id="cusName-error"> &larr; Name should
						not be null</span></label> <br /> <input type="text" class="input-area"
					id="cust-name-txt-area" />
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
					id="cust-phone-txt-area" name="cusPhone" />
			</div>
			<div class="q-postcode">
				<label for="cust-postcode-txt-area">Post code <span
					class="hidden-error" id="cusPostcode-error"> &larr; Post
						code should not be null</span></label> <br /> <input type="text"
					class="input-area" id="cust-postcode-txt-area" name="custPostcode" />
			</div>
			<div class="q-mess">
				<label for="cust-mess-txt-area">Message <span
					class="hidden-error" id="cusMess-error"> &larr; Message
						should not be null</span></label> <br />
				<textarea class="input-area" id="cust-mess-txt-area"
					style="width: 390px; height: 250px;" name='message'>
						</textarea>
			</div>
			<div class="q-conf-box">
				<input type="checkbox" id="cust-confirm-box"
					style="width: 30px; border-radius: 10px" /> <label
					for="cust-confirm-box">Yes, Please respond to my enquiry. <span
					class="hidden-error" id="error-confirm-box"> &larr; You
						should confirm</span></label>
			</div>
			<div class="q-button">
				<a href="#" id="mCF_submit" onclick="actionFormSubmit();"><div
						class="submit-button">Submit</div></a>

			</div>

		</div>

	</form>
</div>

</body>
</html>