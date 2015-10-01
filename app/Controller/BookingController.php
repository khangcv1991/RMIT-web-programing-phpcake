<?php
class BookingController extends AppController {
	public function add() {
		// $this->log($this->Session->id().':'.$this->here.':'.'/*relevant message about whatsup*/', LOG_DEBUG);
		$time1 = $this->request->data; // $this->request->data['MyModel']['movie_name'];//date('H:i:s', time() - date('Z')); // 12:50:29
		
		$helper = array (
				'Html',
				'Form',
				'Session' 
		);
		
		$movie_name = $this->request->data ['movie_name'];
		$movie_day = $this->request->data ['movie_day'];
		$movie_time = $this->request->data ['movie_time'];
		$sa = array (
				"quantity" => $this->request->data ['SA_quanity'],
				"seats" => $this->request->data ['SA_cart'] 
		);
		$sp = array (
				"quantity" => $this->request->data ['SP_quanity'],
				"seats" => $this->request->data ['SP_cart'] 
		);
		$sc = array (
				"quantity" => $this->request->data ['SC_quanity'],
				"seats" => $this->request->data ['SC_cart'] 
		);
		$fa = array (
				"quantity" => $this->request->data ['FA_quanity'],
				"seats" => $this->request->data ['FA_cart'] 
		);
		$fc = array (
				"quantity" => $this->request->data ['FC_quanity'],
				"seats" => $this->request->data ['FC_cart'] 
		);
		$b1 = array (
				"quantity" => $this->request->data ['B1_quanity'],
				"seats" => $this->request->data ['B1_cart'] 
		);
		$b2 = array (
				"quantity" => $this->request->data ['B2_quanity'],
				"seats" => $this->request->data ['B2_cart'] 
		);
		$b3 = array (
				"quantity" => $this->request->data ['B3_quanity'],
				"seats" => $this->request->data ['B3_cart'] 
		);
		
		$screening = array (
				 
						
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
		if (! $this->Session->check ( 'screenings' )) {
			$this->Session->write ( 'screenings', array( $screening) );
		} else {
			$data = $this->Session->read ( 'screenings' );
			$data [] = $screening;
			$this->Session->write ( 'screenings', $data );
		}
		//$this->Session->delete('screenings');
		return $this->redirect ( '/pages/booking' );
		// return $this->redirect($this->webroot + 'pages/home',null,false);
	}
	public function delete($id) {
	}
}

?>