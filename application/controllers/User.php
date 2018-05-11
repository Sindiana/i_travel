<?php

/**
* 
*/
class User extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();

	}

	public function add()
	{
		$this->load->view('add_user');
	}

	public function adduser()
	{
		$data = array('username' => $this->input->post('username'),
					'password' => $this->input->post('password'),
					'fullname' => $this->input->post('fullname'),
					'level' => $this->input->post('level'));

		$sukses = $this->db->insert('user' , $data);
		if($sukses){
			header("Location:../User/add");
		}else
			confirm("Add User Gagal!!");
	}
}

?>