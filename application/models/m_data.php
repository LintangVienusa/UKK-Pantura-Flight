<?php 
 
class M_data extends CI_Model{
	function tampil_data(){
		return $this->db->get('user');
	}
 
	function input_data($data,$table){
		$this->db->insert($table,$data);
	}

	function hapus_user($id){
		$this->db->where('id', $id);
		$this->db->delete('user');
	}

	function edit_user($user,$where){
		return $this->db->get_where($user,$where);
	}

	function update_user($id){
		$data = array('username' => $this->input->post('user'));
		$this->db->where('id', $id);
		$this->db->update('user', $data);
	}
}