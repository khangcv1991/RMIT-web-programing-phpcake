<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Insert title here</title>
<?php
	echo $this->Html->css ( 'cartcss' );
	echo $this->Html->script ( 'cartJS' );	
	function display( $session1, $webroot ){
	$session = (array)$session1;
	if($session['screenings'] == null)
		 	return;	
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
				
		foreach ( $session['screenings'] as &$valuee ) {
			$value = ( array)$valuee;
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
			
			echo '		</tr>';
			$i = 0;		
			foreach ( $value['seats'] as $key =>  $value12 ) {
				//print_r($value1[1]['quantity']);
				$value1 = (array) $value12;
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
			
			echo '</div>';
			echo '</div>';
			echo '</form >';
			$i++;
			
			}
		
}
function convertToArray($data){
}
?>
</head>
<body>
	<div class="body-wrapper">
	<div class="item-wrapper" style="margin-top=400px;">
		<span class="movie-name">
			<span class="c_row"><?php echo $this->Session->read('name');?>  </span> <br>
			<span class="c_row"><?php echo $this->Session->read('phone');?>  </span> <br>
			<span class="c_row" ><?php echo $this->Session->read('email');?>  </span><br>
		</span>
		<d>
	</div>
<?php
	
	$tmp = json_decode($this->Session->read('json'));	
	//print_r($tmp);
	display($tmp, $this->webroot); 
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
				
			</div>
			<div class="right-button-group">				
				 <form action="<?php echo $this->webroot; ?>booking/confirm/" method="Post" id="check-out">
					<a href="#" onclick="actionFormSubmit('check-out');"><div class="check-button">confirm</div></a>
				</form>
			</div>
		</div>
 </div>
</body>
</html>