<?php
class BookingController extends AppController {
	protected function _getTimetable() {
		$PRICE_LIST_M_T = array (
				'S_FU' => 12,
				'S_CO' => 10,
				'S_CH' => 8,
				'F_AD' => 25,
				'F_CH' => 20,
				'BB' => 20 
		);
		$PRICE_LIST_W_F = array (
				'S_FU' => 18,
				'S_CO' => 15,
				'S_CH' => 12,
				'F_AD' => 30,
				'F_CH' => 25,
				'BB' => 30 
		);
		$e = $this->request->data ( 'movie_day' );
		if (strcmp ( trim ( $e ), "Mon" ) == 0 || strcmp ( trim ( $e ), "Tue" ) == 0) {
			return $PRICE_LIST_M_T;
		}
		if (strcmp ( trim ( $e ), "please select" ) == 0)
			return null;
		if (strcmp ( trim ( $e ), "Sat" ) == 0 || strcmp ( trim ( $e ), "Sun" ) == 0) {
			return $PRICE_LIST_W_F;
			// return priceList;
		}
		if (strcmp ( trim ( $e ), "Sat" ) != 0 || strcmp ( trim ( $e ), "Sun" ) != 0) {
			$e = $this->request->data ( 'movie_time' );
			if (strcmp ( trim ( $e ), "please select" ) == 0)
				return null;
			if (strcmp ( trim ( $e ), "1PM" ) == 0) {
				return $PRICE_LIST_M_T;
				// return priceList;
			} else {
				return $PRICE_LIST_W_F;
				// return priceList;
			}
		}
	}
	protected function _checkTotal() {
		$timetable = $this->_getTimetable ();
		$total = 0;
		$total += intval ( $this->request->data ['SA_quanity'] ) * $timetable ['S_FU'];
		$total += intval ( $this->request->data ['SP_quanity'] ) * $timetable ['S_CO'];
		$total += intval ( $this->request->data ['SC_quanity'] ) * $timetable ['S_CH'];
		$total += intval ( $this->request->data ['FA_quanity'] ) * $timetable ['F_AD'];
		$total += intval ( $this->request->data ['FC_quanity'] ) * $timetable ['F_CH'];
		$total += intval ( $this->request->data ['B1_quanity'] ) * $timetable ['BB'];
		$total += intval ( $this->request->data ['B2_quanity'] ) * $timetable ['BB'];
		$total += intval ( $this->request->data ['B3_quanity'] ) * $timetable ['BB'];
		print_r ( intval ( $this->request->data ['SA_quanity'] ) );
		print_r ( $timetable ['F_AD'] );
		print_r ( $this->request->data ['total_price'] );
		if ($total != intval ( str_replace ( '$', '', $this->request->data ['total_price'] ) )) {
			$this->Session->setFlash ( 'invalid reservation!' );
			return false;
		}
		
		return true;
	}
	public function add() {
		// $this->log($this->Session->id().':'.$this->here.':'.'/*relevant message about whatsup*/', LOG_DEBUG);
		$helper = array (
				'Html',
				'Form',
				'Session' 
		);
		if ($this->_checkTotal () == false)
			// return $this->redirect ( '/pages/booking' );
			return;
		$tseats = "";
		$movie_name = $this->request->data ['movie_name'];
		$movie_day = $this->request->data ['movie_day'];
		$movie_time = $this->request->data ['movie_time'];
		$tseats .= $this->request->data ['SA_cart'];
		$tseats .= " ";
		$tseats .= $this->request->data ['SP_cart'];
		$tseats .= " ";
		$tseats .= $this->request->data ['SC_cart']; // + " ";
		$tseats .= " ";
		$tseats .= $this->request->data ['FA_cart']; // + " ";
		$tseats .= " ";
		$tseats .= $this->request->data ['FC_cart']; // + " ";
		$tseats .= " ";
		$tseats .= $this->request->data ['B1_cart']; // + " ";
		$tseats .= " ";
		$tseats .= $this->request->data ['B2_cart']; // + " ";
		$tseats .= " ";
		$tseats .= $this->request->data ['B3_cart']; // + " ";
		$tseats .= " ";
		$sa = array (
				"quantity" => $this->request->data ['SA_quanity'],
				"seats" => $this->request->data ['SA_cart'],
				"sub-total" => $this->request->data ['SA_display'] 
		);
		
		$sp = array (
				"quantity" => $this->request->data ['SP_quanity'],
				"seats" => $this->request->data ['SP_cart'],
				"sub-total" => $this->request->data ['SP_display'] 
		);
		
		$sc = array (
				"quantity" => $this->request->data ['SC_quanity'],
				"seats" => $this->request->data ['SC_cart'],
				"sub-total" => $this->request->data ['SC_display'] 
		);
		$fa = array (
				"quantity" => $this->request->data ['FA_quanity'],
				"seats" => $this->request->data ['FA_cart'],
				"sub-total" => $this->request->data ['FA_display'] 
		);
		$fc = array (
				"quantity" => $this->request->data ['FC_quanity'],
				"seats" => $this->request->data ['FC_cart'],
				"sub-total" => $this->request->data ['FC_display'] 
		);
		$b1 = array (
				"quantity" => $this->request->data ['B1_quanity'],
				"seats" => $this->request->data ['B1_cart'],
				"sub-total" => $this->request->data ['B1_display'] 
		);
		$b2 = array (
				"quantity" => $this->request->data ['B2_quanity'],
				"seats" => $this->request->data ['B2_cart'],
				"sub-total" => $this->request->data ['B2_display'] 
		);
		$b3 = array (
				"quantity" => $this->request->data ['B3_quanity'],
				"seats" => $this->request->data ['B3_cart'],
				"sub-total" => $this->request->data ['B3_display'] 
		);
		
		$screening = array (
				"total-seats" => $tseats,
				"movie" => $movie_name,
				"day" => $movie_day,
				"time" => $movie_time,
				"seats" => [ 
						$sa,
						$sp,
						$sc,
						$fa,
						$fc,
						$b1,
						$b2,
						$b3 
				],
				"sub-total" => $this->request->data ['total_price'] 
		);
		// $this->Cookie->write ( $movie_name + $movie_day + $movie_time, $tseats, $encrypt = false, $expires = null );
		if (! $this->Session->check ( 'screenings' )) {
			$this->Session->write ( 'screenings', array (
					$screening 
			) );
			// $this->Cookie->write ( $movie_name + $movie_day + $movie_time, $tseats, $encrypt = false, $expires = null );
			$this->Session->write ( 'total', intval ( str_replace ( '$', '', $this->request->data ['total_price'] ) ) );
			if ($this->Session->check ( 'check-voucher' ) && $this->Session->read ( 'check-voucher' ) == true) {
				$this->Session->write ( 'grand-total', round ( intval ( $this->Session->read ( 'total' ) ) * 80 / 100 ) );
			} else {
				$this->Session->write ( 'grand-total', intval ( $this->Session->read ( 'total' ) ) );
			}
			// debug($this->request->data ['total_price'] );
		} else {
			$data = $this->Session->read ( 'screenings' );
			$data [] = $screening;
			$this->Session->write ( 'screenings', $data );
			$i = 0;
			$total = 0;
			foreach ( $this->Session->read ( 'screenings' ) as $key => $value ) {
				// print_r($value['sub-total']);
				$total += intval ( str_replace ( '$', '', $value ['sub-total'] ) );
				$i ++;
			}
			
			$this->Session->write ( 'total', $total );
			if ($this->Session->check ( 'check-voucher' ) && $this->Session->read ( 'check-voucher' ) == true) {
				$this->Session->write ( 'grand-total', round ( intval ( $this->Session->read ( 'total' ) ) * 80 / 100 ) );
			} else {
				$this->Session->write ( 'grand-total', intval ( $this->Session->read ( 'total' ) ) );
			}
			// $this->Cookie->write ( $movie_name + $movie_day + $movie_time, $tseats, $encrypt = false, $expires = null );
		}
		// $this->Session->delete('screenings');
		return $this->redirect ( '/pages/booking' );
		// return $this->redirect($this->webroot + 'pages/home',null,false);
	}
	public function delete($movie, $day, $time) {
		$i = 0;
		
		foreach ( $this->Session->read ( 'screenings' ) as $key => $value ) {
			
			// $total += intval(str_replace('$','',$value['sub-total']));
			if (strcmp ( $value ['movie'], $movie ) == 0 && strcmp ( $value ['day'], $day ) == 0 && strcmp ( $value ['time'], $time ) == 0) {
				// return $this->redirect ( '/pages/home' );
				$tmp = $this->Session->read ( 'screenings' );
				
				$this->Session->write ( 'screenings', array_values ( $tmp ) );
				$tmpTotal = intval ( str_replace ( '$', '', $this->Session->read ( 'total' ) ) ) - intval ( str_replace ( '$', '', $value ['sub-total'] ) );
				$this->Session->delete ( 'total' );
				$this->Session->write ( 'total', $tmpTotal );
				if ($this->Session->check ( 'check-voucher' ) && $this->Session->read ( 'check-voucher' ) == true) {
					$this->Session->write ( 'grand-total', round ( intval ( $this->Session->read ( 'total' ) ) * 80 / 100 ) );
				} else {
					$this->Session->write ( 'grand-total', intval ( $this->Session->read ( 'total' ) ) );
				}
				unset ( $tmp [$i] );
				$this->Session->delete ( 'screenings' );
				$this->Session->write ( 'screenings', $tmp );
				return $this->redirect ( '/pages/cart' );
			}
			$i ++;
		}
	}
	public function deleteItem($movie, $day, $time, $line) {
		$i = 0;
		
		foreach ( $this->Session->read ( 'screenings' ) as $key => $value ) {
			
			// $total += intval(str_replace('$','',$value['sub-total']));
			if (strcmp ( $value ['movie'], $movie ) == 0 && strcmp ( $value ['day'], $day ) == 0 && strcmp ( $value ['time'], $time ) == 0) {
				// return $this->redirect ( '/pages/home' );
				$tmp = $this->Session->read ( 'screenings' );
				// print_r($tmp);
				$subTotal = $tmp [$i] ['seats'] [$line] ['sub-total'];
				// print_r($subTotal);
				
				$this->Session->write ( 'screenings', array_values ( $tmp ) );
				
				$tmpTotal = intval ( str_replace ( '$', '', $this->Session->read ( 'total' ) ) ) - intval ( str_replace ( '$', '', $subTotal ) );
				// print_r($tmpTotal);
				$this->Session->delete ( 'total' );
				$this->Session->write ( 'total', $tmpTotal );
				
				$tmpTotal = intval ( str_replace ( '$', '', $tmp [$i] ['sub-total'] ) ) - intval ( str_replace ( '$', '', $subTotal ) );
				$tmp [$i] ['sub-total'] = '$' . $tmpTotal . '.00';
				
				// unset ( $tmp [$i]['seats'] [$line] );
				$tmparray = array (
						"quantity" => 0,
						"seats" => '',
						"sub-total" => '' 
				);
				$tmp [$i] ['seats'] [$line] = $tmparray;
				if ($this->Session->check ( 'check-voucher' ) && $this->Session->read ( 'check-voucher' ) == true) {
					$this->Session->write ( 'grand-total', round ( intval ( $this->Session->read ( 'total' ) ) * 80 / 100 ) );
				} else {
					$this->Session->write ( 'grand-total', intval ( $this->Session->read ( 'total' ) ) );
				}
				$this->Session->delete ( 'screenings' );
				$this->Session->write ( 'screenings', $tmp );
				
				return $this->redirect ( '/pages/cart' );
			}
			$i ++;
		}
		return $this->redirect ( '/pages/cart' );
	}
	public function emptyCart() {
		$this->Session->delete ( 'screenings' );
		$this->Session->delete ( 'total' );
		$this->Session->write ( 'check-voucher', false );
		$this->Session->delete ( 'grand-total' );
		$this->Session->write ( 'total', 0 );
		return $this->redirect ( '/pages/cart' );
	}
	public function checkout() {
		if ($this->Session->read ( 'screenings' ) == null)
			return $this->redirect ( '/pages/cart' );
		
		return $this->redirect ( '/pages/customer' );
	}
	public function displayDetail() {
		$customer = $this->request->data ( 'customer' );
		$email = $this->request->data ( 'email' );
		$phone = $this->request->data ( 'phone' );
		
		$this->Session->write ( 'name', $customer );
		$this->Session->write ( 'email', $email );
		$this->Session->write ( 'phone', $phone );
		
		$array = array (
				'name' => $this->Session->read ( 'name' ),
				'phone' => $this->Session->read ( 'phone' ),
				'email' => $this->Session->read ( 'email' ),
				'screenings' => $this->Session->read ( 'screenings' ) 
		);
		
		$this->Session->write ( 'json', json_encode ( $array ) );
		return $this->redirect ( '/pages/checkout' );
	}
	public function checkVocher() {
		$alpha = array (
				'A',
				'B',
				'C',
				'D',
				'E',
				'F',
				'G',
				'H',
				'I',
				'J',
				'K',
				'L',
				'M',
				'N',
				'O',
				'P',
				'Q',
				'R',
				'S',
				'T',
				'U',
				'V',
				'W',
				'X',
				'Y',
				'Z' 
		);
		$code = $this->request->data ['vocher_code'];
		$array = str_split ( str_replace ( '-', '', $code ) );
		debug ( count ( $array ) );
		if ($code == null || strcmp ( trim ( $code ), '' ) == 0 || count ( $array ) != 12) {
			debug ( print_r ( $array ) );
			$this->Session->write ( 'check-voucher', false );
			$this->Session->delete ( 'voucher' );
			$this->Session->write ( 'grand-total', intval ( $this->Session->read ( 'total' ) ) );
			debug ( print_r ( $array ) );
			debug ( count ( $array ) );
			return;
			// return $this->redirect ( '/pages/home');
		}
		//
		
		$chk1 = $alpha [((intval ( $array [0] ) * intval ( $array [1] ) + intval ( $array [2] )) * intval ( $array [3] ) + intval ( $array [4] )) % 26];
		$chk2 = $alpha [((intval ( $array [5] ) * intval ( $array [6] ) + intval ( $array [7] )) * intval ( $array [8] ) + intval ( $array [9] )) % 26];
		
		debug ( $this->Session->check ( 'check-voucher' ) );
		debug ( $this->Session->read ( 'check-voucher' ) );
		if ((! $this->Session->check ( 'check-voucher' ) || $this->Session->read ( 'check-voucher' ) == false) && strcmp ( $chk1, $array [count ( $array ) - 2] ) == 0 && strcmp ( $chk2, $array [count ( $array ) - 1] ) == 0) {
			$this->Session->write ( 'check-voucher', true );
			$this->Session->write ( 'voucher', $this->request->data ['vocher_code'] );
			$this->Session->write ( 'grand-total', round ( intval ( $this->Session->read ( 'total' ) ) * 80 / 100 ) );
			
			return $this->redirect ( '/pages/cart' );
		}
		$this->Session->write ( 'check-voucher', false );
		$this->Session->delete ( 'voucher' );
		$this->Session->write ( 'grand-total', intval ( $this->Session->read ( 'total' ) ) );
		$this->Session->setFlash ( 'your voucher does not exist!' );
		return $this->redirect ( '/pages/cart' );
	}
	public function confirm() {
		$myfile = fopen ( $this->Session->read ( 'email' ), "w" ) or die ( "Unable to open file!" );
		fwrite ( $myfile, $this->Session->read ( 'json' ) );
		fclose ( $myfile );
		$this->Session->delete ( 'json' );
		$this->Session->delete ( 'name' );
		$this->Session->delete ( 'phone' );
		$this->Session->delete ( 'email' );
		$this->Session->delete ( 'screenings' );
		$this->Session->delete ( 'voucher' );
		$this->Session->delete ( 'check-voucher' );
		$this->Session->delete ( 'grand-total' );
		$this->Session->delete ( 'total' );
		
		return $this->redirect ( '/pages/' );
	}
	public function viewReservarion() {
		$filename = $this->request->data['email'];
		$myfile = fopen($filename, "r") or die("Unable to open file!");
		$this->Session->write('json',fread($myfile,filesize($filename)));
		fclose($myfile);		
		
		return $this->redirect ( '/pages/checkout' );
		
		
		
		
	}
}

?>