<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') != 'login') {
			$this->session->set_flashdata('emptypass', 'You must login to use ToDoThis.');
			redirect('login');
		}
	}

	public function index($col='due_date')
	{
		$this->var['title'] = 'ToDoThis | Get All Your Tasks Done';
		$this->var['content'] = ('user/frontend');
		$this->var['active_js'] = 'active';
		$this->var['tasks'] = $this->m_task->get_task($this->session->userdata('id'), $col);
		// echo '<pre>'.print_r($this->var['tasks'],1).'</pre>';
		$this->var['info'] = $this->m_project->join_with('tasks');
		// $this->var['user_project'] = $this->m_project->join_with('tasks', 'this');
		$this->var['users'] = $this->m_user->get_user($this->session->userdata('id'));
		$this->var['total'] = $this->m_task->num_task($this->session->userdata('id'));
		$this->var['name'] = $this->m_user->check_user('id_user', $this->session->userdata('id'));
		$this->var['project'] = $this->m_project->get_project($this->session->userdata('id'));
		// echo '<pre>'.print_r($this->var['project'],1).'</pre>';
		$this->var['task_pro'] = $this->m_task->join_with('project', 'id_project', $this->session->userdata('id'));
		// echo '<pre>'.print_r($this->var['task_pro'],1).'</pre>'; exit;
		switch ($col) {
			case 'due_date':
				$this->session->set_flashdata('sort', 'Sorted by task due date');
				break;
			case 'name_task':
				$this->session->set_flashdata('sort', 'Sorted by task name');
				break;
			case 'priority':
				$this->session->set_flashdata('sort', 'Sorted by task priority (High - Low)');
				break;
		}

		// echo '<pre>'.print_r($this->var['name']).'</pre>';
		$this->load->view('user/home', $this->var);
	}

	public function completed_task($id_task)
	{
		$date = date('Y-m-d');
		$num = $this->m_achieve->get_achieve($this->session->userdata('id'), $date);
		$users = $this->m_user->get_user($this->session->userdata('id'));
		foreach ($num as $s) {
			$that = $s->task_done;
		}
		$data = array(
				'task_done' => $that+=1
			);
		$var = $this->m_task->delete_task($id_task);

		foreach ($users as $s) {
			if ($s->holiday == 0) {
				$check = $this->m_achieve->num_achieve($this->session->userdata('id'), $date);
				if ($check != 1) {
					$input = array(
							'id_user' => $this->session->userdata('id'),
							'date' => date('Y-m-d'),
							'task_done' => 1
						);
					$var = $this->m_achieve->add_achieve($input);
				}else{
					$var = $this->m_achieve->edit_achieve($this->session->userdata('id'), $date, $data);
				}
			}
		}
		// print_r($var3);
		if ($var) {
			$this->session->set_flashdata('task', 'This task was done');
			redirect('app');
		}else{
			echo 'gagal';
		}
	}

	public function add_task()
	{
		date_default_timezone_set('Asia/Jakarta');
		$task_name = $this->input->post('task_name');
		$due_date = convert_date($this->input->post('due_date'));
		$due_time = $this->input->post('due_time');
		$priority = $this->input->post('priority');
		$project = $this->input->post('project');
		$task_img = $this->input->post('task_img');
		$note = $this->input->post('note');
		$get_date = date('Y-m-d');
		$create = convert_date($get_date).' '.date('h:i A');
		$filename = "file_".time();
		// print_r($due_);

		$config = array(
			'upload_path' => './aset/img',
			'allowed_types' => 'jpg|png',
			'filename' => $filename
		);
		// print_r($config);		
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('task_img')){
			$data = array(
				"id_task" => '',
				"due_date" => $due_date.' '.$due_time,
				"name_task" => $task_name,
				"priority" => $priority,
				"create_at" => $create,
				"id_user" => $this->session->userdata('id'),
				"id_project" => $project,
				"note" => $note
			);
		}else{
			$var = $this->upload->data();
			$data = array(
				"id_task" => '',
				"due_date" => $due_date.' '.$due_time,
				"name_task" => $task_name,
				"priority" => $priority,
				"create_at" => $create,
				"id_user" => $this->session->userdata('id'),
				"img_task" => $var['file_name'],
				"id_project" => $project,
				"note" => $note
			);
		}
			$var2 = $this->m_task->add_task($data);
			if ($var2) {	
				$this->session->set_flashdata('task', 'The new Task was created succesfully');
				redirect('app');
			}else{
				echo 'Failed adding a new task';
			}
	}

	public function settings_page($set='account')
	{
		$this->var['title'] = 'ToDoThis | Settings';
		$this->var['content'] = ('user/settings');
		$this->var['name'] = $this->m_user->check_user('id_user', $this->session->userdata('id'));
		$this->var['set'] = $set;
		$this->var['info'] = $this->m_project->join_with('tasks');
		$this->var['users'] = $this->m_user->get_user($this->session->userdata('id'));
		$this->var['total'] = $this->m_task->num_task($this->session->userdata('id'));
		$this->var['project'] = $this->m_project->get_project($this->session->userdata('id'));
		$this->var['all'] = $this->m_feedback->get_feedback($this->session->userdata('id'));
		$this->load->view('user/home', $this->var);
	}

	public function add_project()
	{
		$name = $this->input->post('pro_name');
		$data = array(
			'id_project' => '',
			'name_project' => $name,
			'id_user' => $this->session->userdata('id'),
			'icon' => 'loyalty',
			'href' => '#' //masih butuh link
		);

		$var = $this->m_project->add_project($data);
		if ($var) {
			$this->session->set_flashdata('task', 'The new project was created');
			redirect('app');
		}else{
			$this->session->set_flashdata('task', 'Failed create a new one');
			redirect('app');
		}
	}

	public function calendar()
	{
		$this->var['title'] = "ToDoThis | Calendar";
		$this->var['calendar_js'] = 'Okey';
		$this->var['users'] = $this->m_user->get_user($this->session->userdata('id'));
		$this->var['name'] = $this->m_user->check_user('id_user', $this->session->userdata('id'));
		$this->var['content'] = ('user/calendar');
		$this->load->view('user/home', $this->var);
	}

	public function achieve_page()
	{
		$this->var['title'] = "ToDoThis | Achievement";
		$this->var['achievement_js'] = 'Okey';
		$this->var['users'] = $this->m_user->get_user($this->session->userdata('id'));
		$this->var['name'] = $this->m_user->check_user('id_user', $this->session->userdata('id'));
		$this->var['content'] = ('user/achievement');
		$this->var['achieve'] = $this->m_achieve->get_achieve($this->session->userdata('id'));
		// print_r($this->var['achieve']);
		$this->load->view('user/home', $this->var);
	}

	public function holiday()
	{
		$holiday = $this->input->post('group1');
		$achieve = $this->input->post('group2');
		$data = array(
				'holiday' => $holiday,
				'achievement' => $achieve
			);
		$var = $this->m_user->edit_user($this->session->userdata('id'), $data);
		if ($var) {
			$this->session->set_flashdata('success', 'Saved');
			redirect('settings');
		}else{
			$this->session->set_flashdata('success', 'Failed to save');
			redirect('settings');
		}
	}

	public function reminder()
	{
		$remind = $this->input->post('remind');
		$data = array(
				'reminder' => $remind
			);
		$var = $this->m_user->edit_user($this->session->userdata('id'), $data);
		if ($var) {
			$this->session->set_flashdata('success', 'Saved.');
			redirect('settings');
		}else{
			$this->session->set_flashdata('success', 'Failed, try again.');
			redirect('settings');
		}
	}

	public function delete_acc()
	{
		$var = $this->m_user->delete_user($this->session->userdata('id'));
		if ($var) {
			$this->session->set_flashdata('emptypass', 'This account was successfully deleted');
			$this->session->sess_destroy();
			$this->load->view('login');
		}else{
			$this->session->set_flashdata('task', 'Failed to delete');
			redirect('app');
		}
	}

	public function change_pass()
	{
		$old = $this->input->post('oldpass');
		$new = $this->input->post('newpass');
		$new2 = $this->input->post('newpass2');
		$check = $this->m_user->get_user($this->session->userdata('id'));
		foreach ($check as $s) {
		// echo '<pre>'.print_r($s->password,1).'</pre>';
			if ($old != $s->password) {
				$this->session->set_flashdata('flash', 'The old password you entered is wrong');
				redirect('settings/1');
			}else{
				if ($new2 != $new) {
					$this->session->set_flashdata('flash', 'The new password you entered not same');
					redirect('settings/1');
				}else{
					$data = array(
							'password' => $new
						);
					$var = $this->m_user->edit_user($this->session->userdata('id'), $data);
					// echo '<pre>'.print_r($var,1).'</pre>';
					if ($var) {
						$this->session->set_flashdata('flash', 'Password changed successfully');
						redirect('settings/1');
					}else{
						$this->session->set_flashdata('flash', 'Failed change password');
						redirect('settings/1');
					}
				}
			}
		}
	}

	public function change_profile()
	{
		$user = $this->input->post('username');
		$name = $this->input->post('fullname');
		$email = $this->input->post('email');
		$bio = $this->input->post('bio');

		$data = array(
				'username' => $user,
				'fullname' => $name,
				'email' => $email,
				'bio' => $bio
			);
		$var = $this->m_user->edit_user($this->session->userdata('id'), $data);
		if ($var) {
			$this->session->set_flashdata('flash', 'Saved');
			redirect('settings/1');
		}else{
			$this->session->set_flashdata('flash', 'Failed');
			redirect('settings/1');
		}
	}

	public function add_feedback()
	{
		$summ = $this->input->post('summ');
		$feed = $this->input->post('feed');
		$data = array(
				'id_user' => $this->session->userdata('id'),
				'summary' => $summ,
				'body' => $feed
			);
		$var = $this->m_feedback->add_feedback($data);
		if ($var) {
			$this->var['title'] = 'Thanks';
			$this->var['feed'] = 'feedback';
			$this->var['content'] = ('feedback_approved');
			$this->load->view('user/home', $this->var);
		}else{
			$this->session->set_flashdata('feed', 'Failed bring feedback to us');
			redirect('settings/4');
		}
	}

	public function delete_feed($id)
	{
		$this->m_feedback->delete_feedback($id);
		$this->session->set_flashdata('feed', 'Successfully deleted');
		redirect('settings/4');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
	
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */