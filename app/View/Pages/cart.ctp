<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<?php
echo $this->Html->css ( 'cartcss' );
?>
</head>
<body>

	<div class="body-wrapper">
		
		<?php
		
		$tiketType = array (
				'Adult',
				'Consession',
				'Children',
				'First class adult',
				'first class childeren',
				'Bean bag 1',
				'Bean bag 2',
				'Bean bag 3' 
		);
		foreach ( $this->session->read ('screenings') as &$value ) {
			print_r($value)
;			echo '<div class="item-wrapper">
			<div class="item-info">
				<span class="movie-name">' ;
			echo $value['movie'] ;
			echo '</span> <br> <span
					class="movie-session"> Showing at '; 
			echo $value['day'] + ', ' + $value['time'] ;
			echo '</span>';
			echo '</div>';
			echo '<div class="item-detail">';
			echo '	<table>';
			echo '		<tr>';
			echo '			<th>Ticket Type'; 
			echo '</th>';
			echo '			<th>Cost</th>';
			echo '			<th>Qty</th>';
			echo '			<th>Seats</th>';
			echo '			<th>Subtotal</th>';
			
			echo '		</tr>';
			$i = 0;		
			foreach ( $value['seats'] as $key =>  $value1 ) {
				//print_r($value1[1]['quantity']);
				if($value1['quantity'] > 0){
					echo '<tr>';
					echo '	<th>Standard Full</th>';
					echo '	<td>$12</td>';
					echo '	<td>2</td>';
					echo '	<td>E12 E23</td>';
					echo '	<td>$24.00</td>';
					echo '</tr>';
				}
				//echo ($value1['quantity']);
				$i++;
			}
					
			echo '<tr>';
			echo '			<td colspan="3"></td>';						
			echo '			<td>Sub Total</td>';
			echo '			<td>'  ;
			echo $value['sub-total'];
			echo  '</td>';
			echo	'		</tr>';
			echo	'</table>';
			echo '</div>';
			echo '<div class="item-opt">';
			echo '	<a href="#"><div class="delete-button">delete</div></a>';
			echo '</div>';
			echo '</div>';
			}
		
		
		?>
		<div class="item-wrapper">
			<div class="item-info">
				<span class="movie-name">Inside Out</span> <br> <span
					class="movie-session"> Showing at Monday, 1pm</span>
			</div>
			<div class="item-detail">
				<table>
					<tr>
						<th>Ticket Type</th>
						<th>Cost</th>
						<th>Qty</th>
						<th>Seats</th>
						<th>Subtotal</th>
					</tr>


					<tr>
						<th>Standard Full</th>
						<td>$12</td>
						<td>2</td>
						<td>E12 E23</td>
						<td>$24.00</td>
					</tr>
					<tr>
						<td colspan="3"></td>
						
						<td>Sub Total</td>
						<td>$44.00</td>
					</tr>
				</table>
			</div>
			<div class="item-opt">
				<a href="#"><div class="delete-button">delete</div></a>
			</div>
		</div>
		
		<div class="final-info">
			<label class="total-price" value="">Total: $44.00</label><br> <label
				class="vocher" value="
				">Meal and Movie Deal Voucher (12345-67890-ZI): 20.00%</label><br> <label
				value="" label>Grand Total: $95.20</label>
		</div>

		<div class="group-button-wrapper">
			<div class="left-button-group">
				<label for="movie-name"> Vocher Code:</label> <input type="text"
					name="movie_name" id="movie-name" class="input-area" /> <a href="#"><div
						class="apply-button">apply</div></a>
			</div>
			<div class="right-button-group">
				<a href="#"><div class="empty-button">empty cart</div></a> <a
					href="#"><div class="check-button">check out</div></a>
			</div>
		</div>
	</div>
</body>
</html>