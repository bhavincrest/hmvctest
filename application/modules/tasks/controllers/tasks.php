<?php

	Class Tasks extends MX_Controller {
	
		protected $set_data;
	
		public function __Construct() {
			parent::__Construct();
			$this->load->model('db_opration/mdl_db_opration','mdl_task');
			$this->load->library(array('form_validation','pagination'));
			$this->load->helper(array('form','url'));
			$this->mdl_task->set_table('tasks');
		}
		
		public function index() {
		
				$limit = 5;
				$page = $this->uri->segment(4);
				$offset = 0;
				if(is_numeric($page) && $page > 1) {
					$offset = ($page - 1) * $limit;
				}
				$config['base_url'] = base_url()."tasks/index/page/";
				$config['total_rows'] = $this->mdl_task->get_total();
				
				$config['per_page'] = $limit;
				$config['use_page_numbers']  = TRUE;
				$config['uri_segment'] = 4;
			
				$config['num_tag_open'] = '<li>';
				$config['num_tag_close'] = '</li>';
				
				$config['cur_tag_open'] = '<li class="disabled"><a href="#">';
				$config['cur_tag_close'] = '</a></li>';
				
				$config['prev_tag_open'] = '<li>';
				$config['prev_tag_close'] = '</li>';
				$config['prev_link'] = '&lt;';
				
				$config['next_tag_close'] = '</li>';
				$config['next_tag_open'] = '<li>';
				$config['next_link'] = '&gt;';
		
				$data['task_lists'] = $this->mdl_task->get_list('priority,id',$offset,$limit);
				$data['view_file'] = 'list_task';
				$data['module'] = 'tasks';
				
				$this->pagination->initialize($config); 
				$data['pagination_data'] = $this->pagination->create_links(); 
				
				echo Modules::run('templates/set_theme',$data);
		}
		
		public function add() {
			
			
			$id = $this->uri->segment(3);
			
			$config_validation = array (
					array(
						'field' => 'tasks_name',
						'label' => 'Task Name',
						'rules' => 'trim|required|min_length[4]|xss_clean'
					),
					array(
						'field' => 'task_priority',
						'label' => 'Priority Of Task',
						'rules' => 'trim|required|xss_clean|numeric'
					)
			);
			$this->form_validation->set_rules($config_validation);
			
			if($this->form_validation->run() == FALSE) {
			
				if(is_numeric($id)) {
					$find_record = array('id'=>$id);
					$data['result'] = $this->mdl_task->get_record($find_record);
					$data['result'] = $data['result'][0];
				}
				else {
					$data['result'] = $this->input->post();
				}
				$data['view_file'] = 'add'; 
				$data['module'] = 'tasks'; 
				echo Modules::run('templates/set_theme',$data);
			
			} else {
				$this->set_data();
				if(is_numeric($id)) {
					$array_update = array('id'=>$id);
					$this->mdl_task->update($array_update,$this->set_data);
				} else {
					$this->mdl_task->add($this->set_data);	
				}
				redirect('tasks','refresh');
			}
			
		}
		
		public function set_data() {
		
				$this->set_data = array (
					'task' => $this->input->post('tasks_name'),
					'priority' => $this->input->post('task_priority')
				);
		
		}
		
		public function delete() {
			$this->mdl_task->delete('id',$this->input->post('task_delete'));
			redirect('tasks','refresh');
		}
		
		public function get_total_task() {
			return $this->mdl_task->get_total();
		}
	
	}