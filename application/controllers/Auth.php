<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	
	public function index()
	{
        $data['title'] = "Halaman Login";
        $data['desc'] = "Halaman Login";
		$this->load->view('page/auth/login', $data);
	}

    
	public function register()
	{
        $data['title'] = "Halaman Register";
        $data['desc'] = "Halaman Register";
		$this->load->view('page/auth/register', $data);
	}

	public function act_register(){
		$q = $this->db->insert('user', array(
			'id' => '',
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'password' => md5($this->input->post('password')),
			'telepon' => '62'.$this->input->post('telp'),
			'alamat' => $this->input->post('alamat'),
			'level' => 'user',
			'created_at' => date('Y-m-d')
		));

		if($q == TRUE){
	        $this->session->set_flashdata('success', 'Register successfully you can login now!');
			redirect(site_url('auth/register'));
		}else{
	        $this->session->set_flashdata('error', 'Something is wrong! Please try again later!');
			redirect(site_url('auth/register'));
		}

	}
	public function act_login(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$where = array(
			'email' => $email,
			'password' => md5($password)
		);
		$cek = $this->db->get_where("user", $where)->num_rows();
		if ($cek > 0) {
			$isi = $this->db->get_where("user", $where)->row();
			$dataSes = array(
				'id' => $isi->id,
				'nama' => $isi->nama,
				'email' => $isi->email,
				'telepon' => $isi->telepon,
				'alamat' => $isi->alamat,
				'level' => $isi->level,
				'created_at' => $isi->created_at,
				'status' => 'logged_in'
			);
		$this->session->set_userdata($dataSes);
		redirect(base_url('/'));		
		}else{
			echo "<script>alert('Invalid Username or Password');location='javascript:history.go(-1)';</script>";
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/');
	}
	public function edit(){
        $data['title'] = "Halaman Edit";
        $data['desc'] = "Halaman Edit";
		$data['detail'] = $this->db->get_where('user', array('id' => $this->session->userdata('id')))->row_array();
		$this->load->view('page/auth/edit', $data);
	}
	public function act_edit(){
		if($this->input->post('password') == ""){
			$q = $this->db->update('user', array(
				'nama' => $this->input->post('nama'),
				'email' => $this->input->post('email'),
				'telepon' => '62'.$this->input->post('telp'),
				'alamat' => $this->input->post('alamat'),
			), array('id' => $this->input->post('id')));
		}else{
			$q = $this->db->update('user', array(
				'nama' => $this->input->post('nama'),
				'email' => $this->input->post('email'),
				'password' => md5($this->input->post('password')),
				'telepon' => '62'.$this->input->post('telp'),
				'alamat' => $this->input->post('alamat'),
			), array('id' => $this->input->post('id')));
		}
		if($q == TRUE){
			redirect(site_url('produk/saya'));
		}else{
			echo "404 Error";
		}
		
	}

}
