<?php

class Crud extends CI_Controller{
 
	function __construct(){
		parent::__construct();		
		$this->load->model('m_data');
		$this->load->helper('url');
 
	}
 
	function index(){
		$data['user'] = $this->m_data->tampil_data()->result();
		$this->load->view('v_admin',$data);

	}

	function tambah(){
		$this->load->view('v_input');
	}
 
	function tambah_aksi(){
		$id = $this->input->post('id');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$fullname = $this->input->post('fullname');
		$level = $this->input->post('level');
 
		$data = array(
			'id' => $id,
			'username' => $username,
			'password' => $password,
			'fullname' => $fullname,
			'level' => $level
			);
		$this->m_data->input_data($data,'user');
		redirect('Crud/index');
	} 

	function delete($id){
		$this->m_data->hapus_user($id);
		redirect('Crud/index');
	}

	function edit($id){
		$where = array('id' => $id);
		$data['user'] = $this->m_data->edit_user('user',$where)->result();
		$this->load->view('v_edit-user',$data);
	}

	function update($id){
		$this->m_data->update_user($id);
		redirect('Crud/index','refresh');
	}
}