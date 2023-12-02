<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{


    public function index()
    {
        $data['title'] = "Semua Produk";
        $data['desc'] = "Semua Produk";
        $data['kategori'] = $this->db->get('kategori')->result();
        $this->load->library('pagination');
        $config['base_url'] = base_url('produk/index'); //site url
        $config['total_rows'] = $this->db->count_all('produk'); //total row
        $config['per_page'] = 10;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = 4;

        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<pagination id="paging-art" class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></pagination>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span style="background-color:#e9454b;" class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['showProduk'] = $this->Produk_model->get_all_produk($config["per_page"], $data['page']);
        $data['pagination'] = $this->pagination->create_links();
        $this->load->view('page/produk/produk_list', $data);
    }
    public function detail($link)
    {
        $data['detail'] = $this->Produk_model->detail($link);
        $data['foto'] = $this->Produk_model->foto_detail($link);
		$id_user = $this->session->userdata('id');
		$data['user'] = $this->db->get_where('user', array('id' => $id_user))->row_array();
        $data['ongkir'] = $this->db->get('ongkir')->result();
        $data['title'] = $data['detail']['nama'];
        $data['desc'] = $data['detail']['nama'];
        $this->load->view('page/produk/produk_detail', $data);
    }
    public function jual()
    {
        $data['title'] = "Jual Produk";
        $data['desc'] = "Jual Produk";
        $this->load->view('page/produk/produk_jual', $data);
    }
    public function hapus($id)
    {
        $this->db->delete('produk', array('id' => $id));
        $this->db->delete('foto_produk', array('id_produk' => $id));
        redirect(site_url('produk/saya'));
    }
    public function saya()
    {
        $id = $this->session->userdata('id');
        $data['title'] = "Produk Saya";
        $data['desc'] = "Produk Saya";
        $this->load->library('pagination');
        $config['base_url'] = base_url('produk/saya/index'); //site url
        $config['total_rows'] = $this->db->count_all('produk'); //total row
        $config['per_page'] = 10;  //show record per halaman
        $config["uri_segment"] = 4;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = 4;

        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<pagination id="paging-art" class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></pagination>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span style="background-color:#e9454b;" class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data['showProduk'] = $this->Produk_model->get_my_produk($config["per_page"], $data['page'], $id);
        $data['detail'] = $this->Produk_model->get_dealer_detail($id);
        $data['pagination'] = $this->pagination->create_links();
        $this->load->view('page/produk/produk_saya', $data);
    }
    public function ubah($id)
    {
        $data['title'] = "Produk Saya";
        $data['desc'] = "Produk Saya";
        $data['produk'] = $this->db->get_where('produk', array('id' => $id))->row_array();
        $data['foto'] = $this->db->get_where('foto_produk', array('id_produk' => $id))->result();
        $this->load->view('page/produk/produk_ubah', $data);
    }
    public function add_wish($id)
    {
        if ($this->session->userdata('status') != 'logged_in') {
            redirect(site_url('auth'));
        } else {
            $this->db->insert('wishlist', array(
                'id' => '',
                'id_produk' => $id,
                'id_user' => $this->session->userdata('id')
            ));
            echo "<script>location='javascript:history.go(-1)';</script>";
        }
    }
    public function cari()
    {
        $jenis = $this->input->post('jenis');
        $min = $this->input->post('min');
        $max = $this->input->post('max');
        $key = $this->input->post('cari');
        if ($jenis == "" and $min == "" and $max == "" and $key == "") {
            echo "<script>alert('Semua form pencarian tidak boleh kosong!');location='javascript:history.go(-1)';</script>";
        } else {
            $data['kategori'] = $this->db->get('kategori')->result();
            $data['title'] = "Hasil Pencarian";
            $data['desc'] = "Hasil Pencarian";
            $this->load->library('pagination');
            $config['base_url'] = base_url('produk/cari/index'); //site url
            $config['total_rows'] = $this->Produk_model->get_search(9999999999, 0, $jenis, $key, $min, $max)->num_rows();
            $config['per_page'] = 10;  //show record per halaman
            $config["uri_segment"] = 4;  // uri parameter
            $choice = $config["total_rows"] / $config["per_page"];
            $config["num_links"] = 4;

            // Membuat Style pagination untuk BootStrap v4
            $config['first_link']       = 'First';
            $config['last_link']        = 'Last';
            $config['next_link']        = 'Next';
            $config['prev_link']        = 'Prev';
            $config['full_tag_open']    = '<pagination id="paging-art" class="pagging text-center"><nav><ul class="pagination justify-content-center">';
            $config['full_tag_close']   = '</ul></nav></pagination>';
            $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
            $config['num_tag_close']    = '</span></li>';
            $config['cur_tag_open']     = '<li class="page-item active"><span style="background-color:#e9454b;" class="page-link">';
            $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
            $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
            $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
            $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
            $config['prev_tagl_close']  = '</span>Next</li>';
            $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
            $config['first_tagl_close'] = '</span></li>';
            $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
            $config['last_tagl_close']  = '</span></li>';
            $this->pagination->initialize($config);
            $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
            $data['showProduk'] = $this->Produk_model->get_search($config["per_page"], $data['page'], $jenis, $key, $min, $max)->result();
            $data['pagination'] = $this->pagination->create_links();
            $this->load->view('page/produk/cari', $data);
        }
    }
    public function kategori($id)
    {
        $jenis = $id;
        $min = $this->input->post('min');
        $max = $this->input->post('max');
        $key = $this->input->post('cari');
        $data['kategori'] = $this->db->get('kategori')->result();
        $data['title'] = "Hasil Pencarian";
        $data['desc'] = "Hasil Pencarian";
        $this->load->library('pagination');
        $config['base_url'] = base_url('produk/cari/index'); //site url
        $config['total_rows'] = $this->Produk_model->get_search(9999999999, 0, $jenis, $key, $min, $max)->num_rows();
        $config['per_page'] = 10;  //show record per halaman
        $config["uri_segment"] = 4;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = 4;

        // Membuat Style pagination untuk BootStrap v4
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<pagination id="paging-art" class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></pagination>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span style="background-color:#e9454b;" class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;
        $data['showProduk'] = $this->Produk_model->get_search($config["per_page"], $data['page'], $jenis, $key, $min, $max)->result();
        $data['pagination'] = $this->pagination->create_links();
        $this->load->view('page/produk/cari', $data);
    }
    public function beli_langsung(){
        $id_produk = $this->input->post('id_produk');
        $id_user = $this->input->post('id_user');
        $jumlah_beli = $this->input->post('jumlah_beli');
        $ongkir = $this->input->post('ongkir');
        $total_beli = $this->input->post('total_beli');
        $this->db->insert('beli', array(
            'id' => '',
            'id_produk' => $id_produk,
            'id_user' => $id_user,
            'jumlah' => $jumlah_beli,
            'created_at' => date('Y-m-d H:i:s'),
            'total' => $total_beli,
            'status' => 'Menunggu Pembayaran',
        ));
        $last_id = $this->db->insert_id();
        $this->db->insert('history_beli', array(
            'id' => '',
            'id_beli' => $last_id,
            'status' => 'Menunggu Pembayaran',
            'created_at' => date('Y-m-d H:i:s'),
        ));
    }
}
