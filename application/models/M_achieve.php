<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_achieve extends CI_Model {

	public $table = 'achievement';

	public $pk = 'id_user';

	public function get_achieve($id)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where($this->pk, $id);
		$this->db->order_by('date', 'desc');
		$this->db->limit(7);
		$var = $this->db->get();
		return $var->result();
	}

	public function add_achieve($data=array()){
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function edit_achieve($id='', $date, $data){
		$this->db->where($this->pk, $id);
		$this->db->where('date', $date);
		$this->db->update($this->table, $data);
		if ($this->db->affected_rows()) {
			return TRUE;
		}else{
			return false;
		}
	}

	public function form_edit_achieve($id='')
	{
		$this->db->where($this->pk, $id);
		$get_task = $this->db->get($this->table);
		return $get_task->row();
	}

	public function delete_achieve($id=''){
		$this->db->where($this->pk, $id);
		$this->db->delete($this->table);
		return TRUE;
	}

	public function num_achieve($id='', $date)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where($this->pk, $id);
		$this->db->where('date', $date);
		$var = $this->db->get();
		return $var->num_rows();
	}

}

/* End of file M_ini.php */
/* Location: ./application/models/M_ini.php */