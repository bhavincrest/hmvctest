<?php
		Class Templates extends MX_Controller {
		
			public function __Construct() {
				
				parent::__Construct();
				$this->load->helper(array('url','form'));
			}
			
			
			public function set_theme($data) {
				$this->load->view('header');
				$this->load->view('main_layout',$data);
				$this->load->view('footer');
			}
			
		}