<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Dashboard_M');
	}
	public function index()
	{
		$data['tampil_user']	=	$this->Dashboard_M->ambilUser();
		$this->load->view('Dashboard',$data);	
	}
	function simpan(){
		$cek 		=	$this->Dashboard_M->simpanData();
		echo json_encode($cek); 
		// return response()->json($cek);

	}
	function delete($id){
		$cek 		=	$this->Dashboard_M->deleteData($id);
		echo json_encode($cek);
	}
	function edit($id){
		$cek 		=	$this->Dashboard_M->editData($id);
		echo json_encode($cek);
	}
	function update(){
		$cek 		=	$this->Dashboard_M->updateData();
		echo json_encode($cek);
	}
}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */ ?>