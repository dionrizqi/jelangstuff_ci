<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends CI_Controller {

	
	public function index()
	{
        $data['title'] = "FAQ";
        $data['desc'] = "FAQ";
		$data['faq'] = $this->db->get('faq')->result();
		$this->load->view('page/faq/faq', $data);
	}
}
