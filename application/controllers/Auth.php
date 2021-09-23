<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model("master_model",'master');
	}

	public function index()
	{
		$data = [
			'title'=>"AdminWeb - Protemus Capital",
		];
		$this->load->view('panel/login',$data);
	}
	public function login()
	{
		$cek = $this->db->get_where("users",['email'=>$this->input->post('email'),'password'=>MD5($this->input->post('password'))]);
		if ($cek->num_rows() == 0) {
			$response = [
				'result'=>FALSE,
				'message'=>"Username dan password yang anda masukan salah"
			];
		}else{
			$row = $cek->row();
			$session = [
				'login'=>TRUE,
				'name'=>$row->name,
				'email'=>$row->email,
			];
			$this->session->set_userdata($session);
			$response = [
				'result'=>TRUE,
				'message'=>"Anda berhasil Login, Kami akan mengarahkan ke admin panel"
			];
		}
		echo json_encode($response,200);
	}
}
