<?php

	class Helloworld extends MX_Controller {
	
		public function __Construct() {
			parent::__Construct();
		}

		public function index() {
			
			$this->load->view('welcome');
			
		}		
	}

?>