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

	public function index()
	{
		$data['isi'] = $this->db->get('user');
		$this->load->view('showuser' ,$data);
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
			header("Location:../User");
		}else
			confirm("Add User Gagal!!");
	}
	//update one item
	public function update( $id = '')
	{
		$this->db->where('id',$id);
		$data['isi'] = $this->db->get('user');

		$this ->load->view('update',$data);
	}

	//update action
	public function updateAction( $id = '')
	{
		$data=array('username' => $this->input->post('username'),
					'password' => $this->input->post('password'),
					'fullname' => $this->input->post('fullname'),
					'level' => $this->input->post('level'));

		$this->db->get('user');
		$this->db->where('id',$id);
		$sukses = $this->db->update('user', $data);

		if($sukses){
			header("Location:../index");
		}else{
			echo "Update Failed!";
		}

	}

	//Delete one item
	public function delete( $id = '')
	{
		$this->db->where('id',$id);

		$delete = $this->db->delete('user');

		if($delete){
			header("Location:../index");
		}else{
			echo "Delete Failed!";
		}
	}

	public function login(){

		$this->load->view('user');
	}

	public function loginAction(){
		$this->db->get('id',$id);
	}
}

?>