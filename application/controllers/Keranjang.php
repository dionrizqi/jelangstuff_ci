<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keranjang extends CI_Controller {

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
        $data['title'] = "Keranjang";
        $data['desc'] = "Keranjang";
        $id_user = $this->session->userdata('id');
        $data['keranjang'] = $this->Produk_model->get_keranjang($id_user);
		$data['user'] = $this->db->get_where('user', array('id' => $id_user))->row_array();
        $data['ongkir'] = $this->db->get('ongkir')->result();
		$this->load->view('page/keranjang/keranjang', $data);
	}
    public function tambah(){
        $id_produk = $this->input->post('id_produk');
        $jumlah = $this->input->post('jumlah');
        $id_user = $this->session->userdata('id');
        $q = $this->db->insert('keranjang', array(
            'id' => '',
            'id_produk' => $id_produk,
            'id_user' => $id_user,
            'jumlah' => $jumlah
        ));
        if($q == TRUE){
            redirect(site_url('keranjang'));
        }else{
            echo '404 Error';
        }
    }
    public function hapus($id){
        $this->db->delete('keranjang', array('id' => $id));
        redirect(site_url('keranjang'));
    }
    public function beli(){
        $config = array(
			'upload_path' => "./dist/bukti/",
			'allowed_types' => "jpg|png|jpeg|JPG|JPEG|PNG",
			'overwrite' => TRUE,
			'max_size' => "50000000",
			'encrypt_name' => TRUE
		);			
		$this->load->library('upload', $config);
		if (!empty($_FILES["bukti"]["name"])) {
			if($this->upload->do_upload('bukti'))
			{
				$uploadData = $this->upload->data();
				$bukti = $uploadData['file_name'];
					
			}
		}else{
		}
        
        $id_user = $this->input->post('id_user');
        $ongkir_keranjang = $this->input->post('ongkir');
        $total_beli = $this->input->post('total_keranjang');
        
		foreach($_POST['id_produk'] as $key => $val){
            $this->db->insert('beli', array(
                'id' => '',
                'id_produk' => $_POST['id_produk'][$key],
                'id_user' => $id_user,
                'jumlah' => $_POST['jumlah'][$key],
                'created_at' => date('Y-m-d H:i:s'),
                'total' => $total_beli,
                'status' => 'Pembayaran Diterima',
                'tarif_ongkir' => $ongkir_keranjang,
                'bukti' => $bukti
            ));
            $last_id = $this->db->insert_id();
            $this->db->insert('history_beli', array(
                'id' => '',
                'id_beli' => $last_id,
                'status' => 'Pembayaran Diterima',
                'created_at' => date('Y-m-d H:i:s'),
            ));
            $this->db->delete('keranjang', array('id_produk' =>  $_POST['id_produk'][$key]));
        }
        redirect(site_url('produk/riwayat'));
    }
}
