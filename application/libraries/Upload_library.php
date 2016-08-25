<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Upload_library
{
	var $CI = '';
	function __construct()
	{
		$this->CI = & get_instance();//Goi den doi tuong cua phan doi tuong cha cua no co trong phan core & get_instance() la truyen tham chieu
	}
	
	function upload($upload_path = '', $file_name='')
	{
		$config = $this->config($upload_path);//Goi trong chinh class nay thi dung this
		$this->CI->load->library('upload', $config);

		//Upload khong thanh cong 
		if($this->CI->upload->do_upload($file_name))
		{
			//Tra ve du lieu loi duoi dang mang
			$data = $this->CI->upload->data();
		}else{
			$data = $this->CI->upload->display_errors();
		}
		return $data;
	}

	function upload_file($upload_path='', $file_name ='')
	{
		 //lay thong tin cau hinh upload
        $config = $this->config($upload_path);
		//lưu biến môi trường khi thực hiện upload
        $file  = $_FILES['image_list'];
        $count = count($file['name']);//lấy tổng số file được upload

		$image_list = array(); //luu ten cac file anh upload thanh cong
		
		for($i=0; $i<=$count-1; $i++) 
		{
			$_FILES['userfile']['name'] 		= $file['name'][$i];
			$_FILES['userfile']['type'] 		= $file['type'][$i];
			$_FILES['userfile']['tmp_name'] 	= $file['tmp_name'][$i];
			$_FILES['userfile']['error'] 		= $file['error'][$i];
			$_FILES['userfile']['size'] 		= $file['size'][$i];

			$this->CI->load->library('upload', $config);
			//@this->CI la tro den doi tuong cha la thang Upload Controller o phan core system
			//Move file tu tmp_file den upload_path da cau hinh o tren
			if($this->CI->upload->do_upload())
			{
				//upload thanh cong tra ve 1 mang data ($data = array());
				$data = $this->CI->upload->data();
				$image_list[] = $data['file_name'];
			}
		}
		return $image_list;
	}

	function config($upload_path ='')
	{
		$config = array();
		$config['upload_path'] = $upload_path;
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['max_size'] = 0;
		$config['max_width'] = 0;
		$config['max_height'] = 0;
		//tra ve bien $config
		return $config;
	}
}