<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_task extends CI_Model {

	public $table = 'tasks';

	public $pk = 'id_task';

	public function get_task($id, $col)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('id_user', $id);
		if ($col == 'priority') {
			$this->db->order_by($col, 'desc');
		}else{
			$this->db->order_by($col, 'asc');
		}
		$var = $this->db->get();
		return $var->result();
	}

	public function add_task($data=array()){
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function edit_task($id='', $data){
		$this->db->where($this->pk, $id);
		$this->db->update($this->table, $data);
		if ($this->db->affected_rows()) {
			return TRUE;
		}
	}

	public function form_edit_task($id='')
	{
		$this->db->where($this->pk, $id);
		$get_task = $this->db->get($this->table);
		return $get_task->row();
	}

	public function delete_task($id=''){
		$this->db->where($this->pk, $id);
		$this->db->delete($this->table);
		return TRUE;
	}

	public function num_task($id)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('id_user', $id);
		$this->db->order_by('due_date', 'asc');
		$var = $this->db->get();
		return $var->num_rows();
	}

	public function empty_table_task()
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$var = $this->db->get();
		return $var->num_rows();
	}

	public function join_with($table, $key, $id_user)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->join($table, $table.'.'.$key.' = '.$this->table.'.'.$key);
		$this->db->where($this->table.'.id_user', $id_user);
		$var = $this->db->get();
		return $var->result();
	}

}

/* End of file M_ini.php */
/* Location: ./application/models/M_ini.php */