<?php
class Login extends MY_Controller{
	function index()
	{
		$this->load->library('form_validation');
		$this->load->helper('form');
		if($this->input->post('submit'))
		{
			$this->form_validation->set_rules('login', 'login', 'callback_check_login');
			if($this->form_validation->run())
			{
				$info = array(
					'username' => $this->input->post('username'),
				);
				
				$this->session->set_userdata($info);
				$this->session->set_userdata('logged_in', true); //Neu kiem tra la dang thanh cong het thi cho dang nhap

				redirect(admin_url('transaction'));//Chuyen den giao dien admin
			}
		}
		$this->load->view('admin/login/index');
	}

	//kiem tra username va password co dung khong
	function check_login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$password = md5($password);
		$this->load->model('admin_model');
		$where = array(
			'username' => $username, 
			'password' => $password
		);

		if($this->admin_model->check_exists($where))
		{
			return true;
		}

		$this->form_validation->set_message(__FUNCTION__,'Sai tài khoản/mật khẩu ');
		return false;
	}
}