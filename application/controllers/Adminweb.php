<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Adminweb extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("master_model",'master');
		$this->master->cek_session();
	}

	public function index()
	{
		$date  = date("Y-m-d");
		$pengunjunghariini  = $this->db->query("SELECT * FROM visitor WHERE date='".$date."' GROUP BY ip")->num_rows(); // Hitung jumlah pengunjung
		$dbpengunjung = $this->db->query("SELECT COUNT(hits) as hits FROM visitor")->row(); 
		$totalpengunjung = isset($dbpengunjung->hits)?($dbpengunjung->hits):0; // hitung total pengunjung
		$bataswaktu = time() - 300;
		$pengunjungonline  = $this->db->query("SELECT * FROM visitor WHERE online > '".$bataswaktu."'")->num_rows(); // hitung pengunjung online
		$jumlahblog = $this->db->get("artikel")->num_rows();
		$data = [
			'title'=>"AdminWeb - Protemus Capital",
			'header'=>'Dashboard',
			'visit_today'=>$pengunjunghariini,
			'visit_count'=>$totalpengunjung,
			'visit_online'=>$pengunjungonline,
			'count_blog'=>$jumlahblog,
			'menu'=>'dashboard',
			'submenu'=>'',
		];
		$this->web->load('panel','panel/home',$data);
	}
	public function identitas()
	{
		$data = [
			'title'=>"AdminWeb - Protemus Capital",
			'header'=>'Identitas Website',
			'menu'=>'config',
			'submenu'=>'identitas',
			'data'=>$this->db->get('infoweb')->row(),
		];
		$this->web->load('panel','panel/identitas',$data);
	}
	function update_info(){
        $config['upload_path']="./uploads/images";
        $config['allowed_types']='gif|jpg|png';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload',$config);
        if($this->upload->do_upload("logo")){
            $data = array('upload_data' => $this->upload->data());
            $image= $data['upload_data']['file_name'];             
            $this->db->update("infoweb",['logo'=>$image],['id'=>1]);
            $results = [
	        	'result'=>TRUE,
	        	'message'=>"Data berhasil diperbaharui"
	        ];
        }else{
        	$results = [
	        	'result'=>FALSE,
	        	'message'=>$this->input->post('logo')." ".$this->upload->display_errors()
	        ];
        }
        
        echo json_encode($results,200);
     }
}
