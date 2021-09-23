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
		$input = $this->input->post();
        $config['upload_path']="./uploads/images";
        $config['allowed_types']='gif|jpg|png';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload',$config);
        if($this->upload->do_upload("logo")){
            $data = array('upload_data' => $this->upload->data());
            $image= $data['upload_data']['file_name'];
            $datas =[
	        	'title'=>$input['title'],
	        	'author'=>$input['author'],
	        	'description'=>$input['description'],
	        	'logo'=>$image,
	        ];         
            $this->db->update("infoweb",$datas,['id'=>1]);   
        }
        if($this->upload->do_upload("favicon")){
            $data = array('upload_data' => $this->upload->data());
            $image= $data['upload_data']['file_name'];
            $datas =[
	        	'title'=>$input['title'],
	        	'author'=>$input['author'],
	        	'description'=>$input['description'],
	        	'favicon'=>$image,
	        ];          
            $this->db->update("infoweb",$datas,['id'=>1]);   
        }
        
        $datas =[
        	'title'=>$input['title'],
        	'author'=>$input['author'],
        	'description'=>$input['description'],
        ];
        $save = $this->db->update('infoweb',$datas,['id'=>1]);
        if ($save) {
        	$this->session->set_flashdata('pesan','<script type="text/javascript">toastr.success("Data berhasil diperbaharui")</script>');
        	redirect("adminweb/identitas");
        }else{
        	$this->session->set_flashdata('pesan','<script type="text/javascript">toastr.error("Data gagal diperbaharui")</script>');
        	redirect("adminweb/identitas");
        }
     }
     public function menu()
	{
		$data = [
			'title'=>"AdminWeb - Protemus Capital",
			'header'=>'Menu Website',
			'menu'=>'config',
			'submenu'=>'menu',
			'data'=>$this->db->get('menu')->result(),
			'parent'=>$this->db->get_where('menu',['parent'=>0])->result(),
		];
		$this->web->load('panel','panel/menu',$data);
	}
}
