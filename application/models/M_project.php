<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_project extends CI_Model {

	public $table = 'project';

	public $pk = 'id_project';

	public function get_project($id)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('id_user', $id);
		$var = $this->db->get();
		return $var->result();
	}

	public function add_project($data=array()){
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function edit_project($id='', $data){
		$this->db->where($this->pk, $id);
		$this->db->update($this->table, $data);
		if ($this->db->affected_rows()) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function form_edit_project($id='')
	{
		$this->db->where($this->pk, $id);
		$get_user = $this->db->get($this->table);
		return $get_user->row();
	}

	public function delete_project($id=''){
		$this->db->where($this->pk, $id);
		$this->db->delete($this->table);
		return TRUE;
	}

	public function check_project($col, $val)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where($col, $val);
		$var = $this->db->get();
		return $var->row();
	}

	public function join_with($table, $set=NULL)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join($table, $table.'.id_project = '.$this->table.'.id_project');
		// if (isset($set)) {
		// 	$this->db->where('id_user', $this->session->userdata('id'));
		// }
		$var = $this->db->get();
		return $var->result();
	}

}

/* End of file M_ini.php */
/* Location: ./application/models/M_ini.php */