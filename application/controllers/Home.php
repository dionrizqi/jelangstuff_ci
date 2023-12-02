<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	
	public function index()
	{
        $data['title'] = "JelangStuff";
        $data['desc'] = "JelangStuff";
		$data['kategori'] = $this->db->get('kategori')->result();
		$data['getProduk'] = $this->Produk_model->get_newest_home();
		$this->load->view('home', $data);
	}
}
