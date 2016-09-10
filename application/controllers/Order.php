<?php
class Order extends MY_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('form');
	}

	//Kiem tra don hang 
	function check_out(){
		if(!$this->session->userdata('user_id_login'))
		{
			redirect(site_url('user/login'));
		}
		$this->load->model('user_model');
		$this->load->model('transaction_model');
		$this->load->model('order_model');
		//Lay cac san pham co trong gio hang
		$carts = $this->cart->contents();
		// pre($carts);
		//So luong san pham trong gio hang
		$total_items = $this->cart->total_items();
		if($total_items <= 0)
		{
			redirect();
		}

		//Tong so tien can thanh toan
		$total_amount = 0;
		foreach ($carts as $row) {
			$total_amount = $total_amount + $row['subtotal'];
		}
		$this->data['total_amount'] = $total_amount;	

		//Neu user da dang nhap thi lay thong tin cua thanh vien
		$user_id = 0;
		$user = '';
		if($this->session->userdata('user_id_login'))
		{
			$user_id = $this->session->userdata('user_id_login');
			$user = $this->user_model->get_info($user_id);
		}
		$this->data['user'] = $user;

		if($this->input->post())
		{
										
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
			$this->form_validation->set_rules('name', 'Tên', 'required');
			$this->form_validation->set_rules('phone', 'Điện thoại', 'required');
			$this->form_validation->set_rules('address', 'Địa chỉ', 'required');
			$this->form_validation->set_rules('message', 'Ghi chú', '');
			$this->form_validation->set_rules('payment', 'Cổng thanh toán', 'required');

			if($this->form_validation->run())
			{
				$payment = $this->input->post('payment');
				$data = array(
						'status' 		=> 0,
						'user_id'		=> $user_id,
						'user_name' 	=> $this->input->post('name'),
						'user_address' 	=> $this->input->post('address'),
						'user_email' 	=> $this->input->post('email'),
						'user_phone'	=> $this->input->post('phone'),
						'message'		=> $this->input->post('message'),
						'amount'		=> $total_amount,
						'payment'		=> $payment,
						'created'		=> now()
					);
					//Them du lieu bang transaction
					$this->transaction_model->create($data);

					//Them vao bang order(chi tiet don hang)
					//Moi dung trong bang order la 1 san pham
					$transaction_id = $this->db->insert_id();
					foreach ($carts as $row) 
					{
					$data = array(
						'transaction_id' 	=> $transaction_id,
						'product_id' 		=> $row['id'],
						'qty'				=> $row['qty'],
						'amount'			=> $row['subtotal'],
						'status'			=> 0
					);
					$this->order_model->create($data);
					
				}
				$this->cart->destroy();
				if($payment == 'offline')
				{
					$this->session->set_flashdata('Bạn đặt hàng thành công');
					redirect();//Chuyen den trang chi tiet don hang
				}
				
			}
		}

		$this->data['temp'] = 'site/order/check_out';
		$this->load->view('site/layout', $this->data);
	}
}