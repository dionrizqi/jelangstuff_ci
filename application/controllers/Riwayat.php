<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') != 'logged_in') {
			redirect('auth');
		}
		date_default_timezone_set("Asia/Jakarta");
	}
	public function index()
	{
        $data['title'] = "Riwayat Belanja";
        $data['desc'] = "Riwayat Belanja";
        $id_user = $this->session->userdata('id');
        $data['pembelian'] = $this->db->query("SELECT beli.*, produk.nama nama_produk, 
		user.nama nama_user, produk.link 
		FROM beli
		JOIN produk ON produk.id = beli.id_produk
		JOIN user ON user.id = beli.id_user
        WHERE user.id = '$id_user'
		ORDER BY created_at DESC
		")->result();
		$this->load->view('page/riwayat/riwayat', $data);
	}
    public function detail($id){
        $data['title'] = "Riwayat Belanja";
        $data['desc'] = "Riwayat Belanja";
		$data['detail'] = $this->Produk_model->get_pembelian_detail($id);
        $data['history'] = $this->db->query("SELECT history_beli.status, history_beli.created_at, history_beli.notes
		FROM history_beli
		WHERE id_beli = '$id'
		ORDER BY created_at DESC
		")->result();
		$this->load->view('page/riwayat/riwayat_detail', $data);
    }
    public function selesai($id){
        $this->db->insert('history_beli', array(
			'id' => '',
			'id_beli' => $id,
			'status' => 'Selesai',
			'created_at' => date('Y-m-d H:i:s'),
			'notes' => ''
		));
		$q = $this->db->update('beli', array('status' => 'Selesai'), array('id' => $id));
		if($q == TRUE){
			redirect(site_url('riwayat/detail/'.$id));
		}else{
			echo '404 Error';
		}
    }
}
