<?php
class Transaction extends MY_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$this->load->model('transaction_model');

		$total_rows = $this->transaction_model->get_total();
		//Lay so luong tat ca cac giao dich
		$this->data['total_rows'] = $total_rows;
		$this->load->library('pagination');
		$config  = array();
		$config['total_rows'] = $total_rows;
		$config['base_url'] = admin_url('transaction/index');
		$config['per_page'] = 7;
		$config['uri_segment'] = 4; //lay so trang muon hien thi tren url
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Previous';
		//Khoi tao cac cau hinh phan trang
		$this->pagination->initialize($config); // Chạy phân trang

		$segment = $this->uri->segment(4);
		$segment = intval($segment);

		$input = array();
		$input['limit'] = array($config['per_page'], $segment);

		// kiem tra co thuc hien loc tim kiem khong
		$id = $this->input->get('id');
		$id = intval($id);
		if($id > 0)
		{
			$input['where']['id'] = $id;
		}
		$list = $this->transaction_model->get_list($input);
		$this->data['list'] = $list;

		$message = $this->session->flashdata('message');
		$this->data['message'] = $message;

		$this->data['temp'] = 'admin/transaction/index';
		$this->load->view('admin/home/main', $this->data);
	}

	//Xoa 1 san pham
	function delete()
	{
		$id = $this->uri->segment(4);
		$this->_del($id);
		$this->session->set_flashdata('message', 'Xóa giao dịch thành công');
		redirect(admin_url('transaction'));
	}
	//Xoa nhieu san pham
	function delete_all()
	{
		$ids = $this->input->post('ids');
		foreach($ids as $id)
		{
			$this->_del($id);
		}
	}

	private function _del($id)
	{
		$transaction = $this->transaction_model->get_info($id);
		if(!$transaction)
		{
			$this->session->set_flashdata('message', 'Không tồn tại giao dịch này');
			redirect(admin_url('transaction'));
		}
		//Xoa du lieu
		$this->transaction_model->delete($transaction->id);
	}

}