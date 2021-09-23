<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Master_model extends CI_Model {

	public function cek_session()
	{
		if ($this->session->userdata("login") == FALSE) {
			return redirect("auth");
		}else{
			return TRUE;
		}
	}
}