<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Website extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->menu = $this->db->get_where("menu",['parent'=>0])->result();
		$this->contact = $this->db->get("contact")->row();
		$this->webs = $this->db->get("infoweb")->row();
	}

	public function index()
	{
		$data = [
			'title'=>$this->webs->title,
			'menu'=>$this->menu,
			'contact'=>$this->contact,
			'web'=>$this->webs,
		];
		$this->web->load('website','home',$data);
	}
}
