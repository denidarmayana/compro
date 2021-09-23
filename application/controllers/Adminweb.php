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
		];
		$this->web->load('panel','panel/home',$data);
	}
}
