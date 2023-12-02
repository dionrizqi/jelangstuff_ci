<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller {

	
	public function index()
	{
        $data['title'] = "Kontak";
        $data['desc'] = "Kontak";
		$this->load->view('page/kontak/kontak', $data);
	}
}
