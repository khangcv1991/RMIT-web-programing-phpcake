<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<?php
echo $this->Html->css ( 'cartcss' );
echo $this->Html->script('cartJS');
function display( $session, $webroot ){
	
	if($session->read ('screenings') == null)
		 	return;
	echo $session->read['check-vocher'];
		//print_r($this->session->read(''));
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
		$index = 0;
				
		foreach ( $session->read ('screenings') as &$value ) {
			//print_r($value);
			echo '<form action="';
			echo $webroot;
			echo 'booking/delete/' ;
			echo $value['movie'];
			echo '/';
			echo $value['day'];
			echo '/';
			echo $value['time'];
			echo '" method="Post" id="cart-item';
			echo $index;
			echo '">';
			echo '<div class="item-wrapper">
			<div class="item-info">
				<span class="movie-name">' ;
			echo $value['movie'] ;
			echo '</span> <br> <span
					class="movie-session"> Showing at '; 
			echo $value['day'] ;
			echo  ', ' ;
			echo  $value['time'] ;
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
			echo '			<th>option</th>';
			
			echo '		</tr>';
			$i = 0;		
			foreach ( $value['seats'] as $key =>  $value1 ) {
				//print_r($value1[1]['quantity']);
				if($value1['quantity'] > 0){
					echo '<tr>';
					echo '	<th>';
					echo $tiketType[$i];
					echo '</th>';
					echo '	<td> $';
					echo intval(str_replace('$','',$value1['sub-total']))/intval(str_replace('$','',$value1['quantity']));
					echo '</td>';
					echo '	<td>';
					echo $value1['quantity'];
					echo '</td>';
					echo '	<td>';
					echo $value1['seats'];
					echo '</td>';
					echo '	<td>';
					echo $value1['sub-total'];
					echo '</td>';
					
					echo '	<td>';
					
					
					echo '	<a href="#"><div ';
					echo 'onclick="submitDeleteForm(';
					echo "'";
					echo $webroot;
					echo 'booking/deleteItem/' ;
					echo $value['movie'];
					echo '/';
					echo $value['day'];
					echo '/';
					echo $value['time'];
					echo '/';
					echo $i;
					echo "'";
					echo ');">delete</div></a>';
					
					echo '</td>';
					echo '</tr>';
					
				}
				intval(str_replace('$','',$value['sub-total']));
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
			echo '	<a href="#"><div class="delete-button" ';
			echo 'onclick="actionFormSubmit(';
			echo "'";
			echo 'cart-item';
			echo $index;
			echo "'";
			echo ');">delete</div></a>';
			echo '</div>';
			echo '</div>';
			echo '</form >';
			$index++;
			
			}
		
}
?>
</head>
<body>

	<div class="body-wrapper">
		
		<?php
		
			 display($this->session,$this->webroot);
		?>
		<?php
			$voucher = '';
			$discount = '0.00%';
			$grand = 0;
			if($this->Session->check('check-voucher') && $this->Session->read('check-voucher') == true){
				$voucher = $this->Session->read('voucher');
				$discount = '20.00%';
			} 
			$grand = $this->Session->read('grand-total');
		?>
		
		<div class="final-info">
			<label class="total-price" value="">Total: $<?php echo number_format($this->Session->read ( 'total' ),2); ?> </label><br> <label
				class="vocher" value="
				">Meal and Movie Deal Voucher (<?php echo $voucher; ?>): <?php echo $discount; ?></label><br> <label
				value="" label>Grand Total: $<?php echo  number_format($grand, 2); ?></label>
		</div>

		<div class="group-button-wrapper">
			<div class="left-button-group">
				<form action="<?php echo $this->webroot; ?>booking/checkVocher/" method="Post" id="vocher1">
					<span id="vocher_label"> Vocher Code:</span> <input type="text"
						name="vocher_code" id="vocher-code" class="input-area" pattern="/^\d{5}-\d{5}-[A-Z]{2}$/i" /> 
					<a href="#" onclick="actionFormSubmit('vocher1');"><div class="apply-button">apply</div></a>
				</form>
			</div>
			<?php 
			echo '<script>';
			echo 'displayNoticeMessage(';
			echo "'";
			echo $this->Session->flash();
			echo "'";
			echo ');';
			
			echo '</script>';
			?>
			<div class="right-button-group">
				<form action="<?php echo $this->webroot; ?>booking/emptyCart/" method="Post" id="emty-cart1">
					<a href="#" onclick="actionFormSubmit('emty-cart1');"><div class="empty-button">empty cart</div></a>
				 </form>
				 <form action="<?php echo $this->webroot; ?>booking/checkout/" method="Post" id="check-out">
					<a href="#" onclick="actionFormSubmit('check-out');"><div class="check-button">check out</div></a>
				</form>
			</div>
		</div>
	</div>
</body>
</html>