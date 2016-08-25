<?php
Class Home extends MY_Controller{
	public function index()
	{
		$this->data['temp'] = 'admin/home/index';
		$this->load->view('admin/home/main', $this->data);
	}
}