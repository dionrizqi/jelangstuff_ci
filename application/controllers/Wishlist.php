<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wishlist extends CI_Controller {
    public function __construct()
	{
		parent:: __construct();
		if($this->session->userdata('status') != 'logged_in'){
            redirect('auth');
        }
		date_default_timezone_set("Asia/Jakarta");
	}
	public function index()
	{
        $id = $this->session->userdata('id');
		$data['title'] = "Wishlist Saya";
        $data['desc'] = "Wishlist Saya";
		$this->load->library('pagination');
		$config['base_url'] = base_url('wishlist/index'); //site url
        $config['total_rows'] = $this->db->where('id_user', $id)->from("wishlist")->count_all_results(); //total row
        $config['per_page'] = 10;  //show record per halaman
        $config["uri_segment"] = 4;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = 3;
 
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
        $data['showProduk'] = $this->Produk_model->get_my_wishlist($config["per_page"], $data['page'], $id);
        $data['pagination'] = $this->pagination->create_links();
		$this->load->view('page/produk/wishlist', $data);
	}
    public function delete($id){
        $this->db->delete('wishlist', array('id' => $id));
        redirect(site_url('wishlist'));
    }
}
