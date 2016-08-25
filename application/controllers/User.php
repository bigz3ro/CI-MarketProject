<?php
class User extends MY_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->model('user_model');
	}
	//Xu li dang ki user
	function register(){

		if($this->input->post())
		{

		$this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email|is_unique[user.email]');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
			$this->form_validation->set_rules('re_password', 'Password Confirmation', 'trim|required|matches[password]');
			$this->form_validation->set_rules('name', 'Name', 'trim|required');



			if($this->form_validation->run() == TRUE)
			{
				$email = $this->input->post('email');
				$password = $this->input->post('password');
				$re_password = $this->input->post('re_password');
				$name = $this->input->post('name');
				$phone = $this->input->post('phone');
				$address = $this->input->post('address');

				$data_new = array(
					'name' 		=> $name,
					'email' 	=> $email,
					'phone' 	=> $phone,
					'address' 	=> $address,
					'password' 	=> md5($password),
					'created' 	=> now()
				);
				
				if($this->user_model->create($data_new))
				{
					echo "YES";
					$this->session->set_flashdata('message', 'Thêm mới dữ liệu thành công');
				}else{
					echo "NO";
					$this->session->set_flashdata('message', 'Không thêm được');
				}
			}
		}

		$this->data['temp'] = 'user/register';
		$this->load->view('site/layout', $this->data);
	}
	function login(){
		$this->data['temp'] = 'user/login';
		$this->load->view('site/layout', $this->data);
	}
}