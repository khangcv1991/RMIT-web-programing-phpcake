
<?php echo $this->Html->css('bookingcss'); 
	echo $this->Html->script('bookingJS');
	echo $this->Session->flash("asdasd");
?>
<body onload="initiateMap()">

<div class="body-wrapper" >
	
	<form action="bookingAction.php" method="post" id="mBookingForm">
		<input type="hidden" id="curr-cart" name="curr_cart" value=""/>
		
		<div class="booking-wrapper" onclick="calculatePrice();">
			<label for="movie-name"> Movie Name</label> <select name="movie_name"
				id="movie-name" class="input-area">
				<option>please select</option>
				<option>Ant Man</option>
				<option>Force of Destiny</option>
				<option>Ben-Hur</option>
				<option>A Walk in the Woods</option>
			</select> <label for="movie-day"> Session Day</label> <select name="movie_day"
				id="movie-day" class="input-area">
				<option>please select</option>
				<option></option>
				<option></option>
				<option></option>
				<option></option>
				<option></option>
				<option></option>
				<option></option>
			</select> <label for="movie-time"> Session Time</label> <select
				name="movie_time" id="movie-time" class="input-area">
				<option>please select</option>
				<option></option>

			</select> <label></label> <br> <span class="hidden-error"
				id="error-movie-select"> you have to select movie and chose
				time</span></label>
			<div id="seat_map" onclick="seat_onClick(event)">

			</div>
			<table>

				<tr>
					<th>Ticket Type</th>
					<th>Quanity</th>
					<th>Subtotal</th>
				</tr>


				<tr>

					<td>Adult</td>
					<td><input type="text" id="SA-quanity" name="SA_quanity"
						class="input-area" value='0'>
						
					</input></td>
					<td><input type="text" class="input-area" name="SA_display"
						id="SA-display" /></td>

				</tr>

				<tr>
					<td>Concession</td>
					<td><input type="text" id="SP-quanity" name="SP_quanity"
						class="input-area" value='0'>							
					</input></td>
					<td><input type="text" class="input-area" name="SP_display"
						id="SP-display" /></td>

				</tr>

				<tr>
					<td>Child</td>
					<td><input type="text" id="SC-quanity" name="SC_quanity"
						class="input-area" value='0'>						
					</input></td>
					<td><input type="text" class="input-area" name="SC_display"
						id="SC-display" /></td>

				</tr>

				<tr>
					<td>First Class Adult</td>
					<td><input type="text" id="FA-quanity" name="FA_quanity"
						class="input-area" value='0'>							
					</input></td>
					<td><input type="text" class="input-area" name="FA_display"
						id="FA-display" /></td>


				</tr>

				<tr>
					<td>First Class Child</td>
					<td><input type="text" id="FC-quanity" name="FC_quanity"
						class="input-area" value='0'>
						
					</input></td>
					<td><input type="text" class="input-area" name="FC_display"
						id="FC-display" /></td>

				</tr>
				<tr>
					<td>Beanbag -1 Person</td>
					<td><input type="text" id="B1-quanity" name="B1_quanity"
						class="input-area" value='0'>
							
					</input></td>
					<td><input type="text" class="input-area" name="B1_display"
						id="B1-display" /></td>

				</tr>
				<tr>
					<td>Beanbag - 2 Person</td>
					<td><input type="text" id="B2-quanity" name="B2_quanity"
						class="input-area" value='0'>
							
					</input></td>
					<td><input type="text" class="input-area" name="B2_display"
						id="B2-display" /></td>

				</tr>
				<tr>
					<td>Beanbag - 3 Person</td>
					<td><input type="text" id="B3-quanity" name="B3_quanity"
						class="input-area" value='0'>
							
					</input></td>
					<td><input type="text" class="input-area" name="B3_display"
						id="B3-display" /></td>

				</tr>
				<tr>
					<td></td>
					<td>Total Price</td>
					<td><input type="text" class="input-area" id="total_price"
						name="total_price" /></td>
				</tr>
			</table>
		</div>
		<span class="hidden-error" id="error-ticket-select"> you have
			to pick up some tickets</span>
		<div class="q-button">
			<a href="#" id="mCF_submit" onclick="actionFormSubmit();"><div
					class="submit-button">Add Cart</div></a>
		</div>
	</form>
</div>



</body>
