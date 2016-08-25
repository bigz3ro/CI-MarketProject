<?php
if(!defined('BASEPATH')) exit("No direct script access allowed");
class MY_Model extends CI_Model{
	var $table = '';
	function create($data){
		if($this->db->insert($this->table, $data))
		{
			return TRUE;
		}
		else {
			return false;
		}
	}
	function update($id, $data){
		if(!$id) return FALSE;
		$where = array();
		$where['id'] = $id;
			return $this->update_rule($where, $data);
	}
	function update_rule($where, $data){
		if(!$where)
		{
			return FALSE;
		}
		$this->db->where($where);
		if($this->db->update($this->table, $data))
			return TRUE;
		return FALSE;
	}
	/**
*Xoa row tu id
*/
function delete($id)
	{
		if (!$id)
		{
			return FALSE;
		}
		if(is_numeric($id))//nếu $id là số
			{
				$where = array('id' => $id);
			}else
			{
				//id nằm trong chuoi các id truyền vào
				$where =  "id IN (".$id.") ";
			}
		return $this->del_rule($where);
	}
/**
* Xoa row tu dieu kien
*/
function del_rule($where)
{
	if (!$where)
	{
		return FALSE;
	}
	$this->db->where($where);//thêm điều kiện
	if($this->db->delete($this->table))//thực hiện xóa
	{
		return TRUE;
	}
	return FALSE;
}
/**
* Xoa row tu dieu kien
*/
function del_all($where)
{
	if (!$where)
	{
		return FALSE;
	}
	//where_in($cot, $mang_gia_tri)
	$this->db->where_in($this->key,$where);
	$this->db->delete($this->table);
	return TRUE;
}
/**
* Lay thong tin cua row tu id
* $id: Khóa chính muốn lấy thông tin
*/
function get_info($id)
{
	if (!$id)
	{
		return FALSE;
	}
	$where = array();
	$where['id'] = $id;
	return $this->get_info_rule($where);
}
/**
* Lay thong tin cua row tu dieu kien
* $where: Mảng điều kiện
*/
function get_info_rule($where = array())
{
	$this->db->where($where);
	$query = $this->db->get($this->table);
	if ($query->num_rows())
	{
		return $query->row();
	}
	return FALSE;
}
/**
* Lay tong so
*/
function get_total($input = array())
{
	//gắn các tùy chọn nếu có
	$this->get_list_set_input($input);
	//thuc hien truy van du lieu
	$query = $this->db->get($this->table);
	//tra ve du lieu
	return $query->num_rows();
}
/**
* Lay danh sach
*/
function get_list($input = array())
{
	//gắn các tùy chọn nếu có
	$this->get_list_set_input($input);
	//thuc hien truy van du lieu
	$query = $this->db->get($this->table);
	//tra ve du lieu
	return $query->result();
}
/**
* Gan cac thuoc tinh trong input khi lay danh sach
*/
protected function get_list_set_input($input)
{
	// Select
	if (isset($input['select']))
	{
		$this->db->select($input['select']);
	}

	// Thêm điều kiện cho câu truy vấn truyền qua biến $input['where']
	if ((isset($input['where'])) && $input['where'])
	{
		$this->db->where($input['where']);
	}
	// Thêm sắp xếp dữ liệu thông qua biến $input['order'] (ví dụ $input['order'] = array('id','DESC'))
	if (isset($input['order'][0]) && isset($input['order'][1]))
	{
		$this->db->order_by($input['order'][0], $input['order'][1]);
	}
	//Loc theo like
	if((isset($input['like'])) && $input['like'])
	{
		$this->db->like($input['like'][0], $input['like'][1]);
	}
	else
	{
		//mặc định sẽ sắp xếp theo id giảm dần
		$this->db->order_by('id', 'desc');
	}
	// Thêm điều kiện limit cho câu truy vấn thông qua biến $input['limit'] (ví dụ $input['limit'] = array('10' ,'0'))
	if (isset($input['limit'][0]) && isset($input['limit'][1]))
	{
		$this->db->limit($input['limit'][0], $input['limit'][1]);
	}
}
/**
* kiểm tra sự tồn tại của dữ liệu theo 1 điều kiện nào đó
*/
    /**
    * kiểm tra sự tồn tại của dữ liệu theo 1 điều kiện nào đó
    */
    function check_exists($where = array())
    {
         $this->db->where($where);
         //thuc hien cau truy van lay du lieu voi cai where o tren
         $query = $this->db->get($this->table);
      
         if($query->num_rows() > 0){
            return TRUE;
         }else{
            return FALSE;
         }
    }
}

