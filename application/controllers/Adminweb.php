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
		];
		$this->web->load('panel','panel/identitas',$data);
	}
	function upload_logo(){
        $config['upload_path']="./uploads/images";
        $config['allowed_types']='gif|jpg|png';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload',$config);
        if($this->upload->do_upload("file")){
            $data = array('upload_data' => $this->upload->data());
            $image= $data['upload_data']['file_name'];             
            $result= $this->db->update("infoweb",['logo'=>$image],['id'=>1]);
            echo json_decode($result);
        }
 
     }
}
