<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_M extends CI_Model {
	function ambilUser(){
		$this->db->select('*'); // Optional, * bisa diganti dengan spesifik column yang anda mau
		$this->db->from('tb_users');
		$query 		=	$this->db->get();
		return $query->result();
	}
	function deleteData($id){
		$this->db->delete('tb_users',array("id_users"=>$id));
	}
	function editData($id){
		$this->db->from('tb_users');
		$this->db->where('id_users', $id);
		$query 	= $this->db->get();
		return $query->row();
	}
	function updateData(){
		$config['upload_path'] 		= './assets/img/';
		$config['allowed_types'] 	= 'jpg|png';
		$config['encrypt_name']		= TRUE;
		$this->upload->initialize($config);
		if (!$this->upload->do_upload('file')){
			$this->session->set_flashdata('error-img', 'Gagal Upload Gambar');
		}
		else{
			$id 				=	$this->input->post('id_users');
			$upload_data		=	$this->upload->data();
			$file_name			=	$upload_data['file_name'];
			$data 				=	array(	"username"		=>$this->input->post('username'),
											"password"		=>password_hash($this->input->post('password'),PASSWORD_DEFAULT),
											"jenis_kelamin"	=>$this->input->post('jenis_kelamin'),
											"ket"			=>$this->input->post('ket'),
											"gambar"		=>$file_name);
			$this->db->update('tb_users', $data,array("id_users"=>$id));
		}
	}
	function simpanData(){
		$config['upload_path'] 		= './assets/img/';
		$config['allowed_types'] 	= 'jpg|png';
		$config['encrypt_name']		= TRUE;
		$this->upload->initialize($config);
		if (!$this->upload->do_upload('file')){
			$this->session->set_flashdata('error-img', 'Gagal Upload Gambar');
		}
		else{
			$upload_data		=	$this->upload->data();
			$file_name			=	$upload_data['file_name'];
			$data_insert 		=	array(	'username'		=>	$this->input->post('usr'),
											'password'		=>	password_hash($this->input->post('psd'),PASSWORD_DEFAULT),
											'jenis_kelamin'	=>	$this->input->post('jk'),
											'ket'			=>	$this->input->post('ket'),
											'gambar'		=>	$file_name);
			$this->db->insert('tb_users', $data_insert);
		}
	}

}

/* End of file Dashboard_M.php */
/* Location: ./application/models/Dashboard_M.php */ ?>