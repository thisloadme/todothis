<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

	public $table = 'users';

	public $pk = 'id_user';

	public function get_user($id)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where($this->pk, $id);
		$var = $this->db->get();
		return $var->result();
	}

	public function add_user($data=array()){
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function edit_user($id='', $data){
		$this->db->where($this->pk, $id);
		$this->db->update($this->table, $data);
		if ($this->db->affected_rows()) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function form_edit_user($id='')
	{
		$this->db->where($this->pk, $id);
		$get_user = $this->db->get($this->table);
		return $get_user->row();
	}

	public function delete_user($id=''){
		$this->db->where($this->pk, $id);
		$this->db->delete($this->table);
		if ($this->db->affected_rows()) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function check_user($col, $val)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where($col, $val);
		$var = $this->db->get();
		return $var->row();
	}

}

/* End of file M_ini.php */
/* Location: ./application/models/M_ini.php */