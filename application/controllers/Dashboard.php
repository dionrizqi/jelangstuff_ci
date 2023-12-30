<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') != 'logged_in' and $this->session->userdata('level') != 'admin') {
			redirect('/');
		}
		date_default_timezone_set("Asia/Jakarta");
	}
	public function index()
	{
		$data['page_view'] = 'dashboard/dashboard';
		$this->load->view('dashboard/index', $data);
	}
	public function user()
	{
		$data['showUser'] = $this->db->get('user')->result();
		$data['page_view'] = 'dashboard/user';
		$this->load->view('dashboard/index', $data);
	}
	public function kategori()
	{
		$data['showUser'] = $this->db->get('kategori')->result();
		$data['page_view'] = 'dashboard/kategori';
		$this->load->view('dashboard/index', $data);
	}
	public function produk()
	{
		$data['showUser'] = $this->db->get('produk')->result();
		$data['page_view'] = 'dashboard/produk';
		$this->load->view('dashboard/index', $data);
	}
	public function ongkir()
	{
		$data['page_view'] = 'dashboard/ongkir';
		$this->load->view('dashboard/index', $data);
	}
	public function faq()
	{
		$data['page_view'] = 'dashboard/faq';
		$this->load->view('dashboard/index', $data);
	}
	public function pembelian()
	{
		$data['page_view'] = 'dashboard/pembelian';
		$this->load->view('dashboard/index', $data);
	}
	public function laporan()
	{
		$data['page_view'] = 'dashboard/laporan';
		$this->load->view('dashboard/index', $data);
	}
	public function detail_pembelian($id)
	{
		$data['page_view'] = 'dashboard/detail_pembelian';
		$data['detail'] = $this->Produk_model->get_pembelian_detail($id);
		$this->load->view('dashboard/index', $data);
	}
	public function get_user()
	{
		$draw = intval($this->input->get("draw"));

		$query = $this->db->get('user')->result();
		$total = $this->db->get('user')->num_rows();
		$data = [];
		$no = 1;
		foreach ($query as $row) {
			$data[] = array(
				$no++,
				$row->nama,
				$row->email,
				$row->telepon,
				$row->alamat,
				$row->level,
				'
				<button data-target="#editModal" data-toggle="modal" onclick="edit_user(' . $row->id . ')" class="btn btn-success"><i class="fas fa-icon fa-edit"></i></button>
				<a href="' . site_url('dashboard/delete-user/' . $row->id) . '" role="button" class="tombol-hapus btn btn-danger"><i class="fas fa-icon fa-trash"></i></a>
				'
			);
		}
		$result = array(
			"draw" => $draw,
			"recordsTotal" => $total,
			"recordsFiltered" => $total,
			"data" => $data
		);

		echo json_encode($result);
	}
	public function get_kategori()
	{
		$draw = intval($this->input->get("draw"));
		$query = $this->db->get("kategori");
		$data = [];
		$no = 1;
		foreach ($query->result() as $row) {
			$data[] = array(
				$no++,
				$row->nama,
				'
				<button data-target="#editModal" data-toggle="modal" onclick="edit_kategori(' . $row->id . ')" class="btn btn-success"><i class="fas fa-icon fa-edit"></i></button> &nbsp;
				<a href="' . site_url('dashboard/delete-kategori/' . $row->id) . '" role="button" class="tombol-hapus btn btn-danger"><i class="fas fa-icon fa-trash"></i></a>
				'
			);
		}

		$result = array(
			"draw" => $draw,
			"recordsTotal" => $query->num_rows(),
			"recordsFiltered" => $query->num_rows(),
			"data" => $data
		);

		echo json_encode($result);
	}
	public function get_ongkir()
	{
		$draw = intval($this->input->get("draw"));
		$query = $this->db->get("ongkir");
		$data = [];
		$no = 1;
		foreach ($query->result() as $row) {
			$data[] = array(
				$no++,
				$row->nama_kota,
				$row->tarif,
				'
				<button data-target="#editModal" data-toggle="modal" onclick="edit_ongkir(' . $row->id_ongkir . ')" class="btn btn-success"><i class="fas fa-icon fa-edit"></i></button> &nbsp;
				<a href="' . site_url('dashboard/delete-ongkir/' . $row->id_ongkir) . '" role="button" class="tombol-hapus btn btn-danger"><i class="fas fa-icon fa-trash"></i></a>
				'
			);
		}

		$result = array(
			"draw" => $draw,
			"recordsTotal" => $query->num_rows(),
			"recordsFiltered" => $query->num_rows(),
			"data" => $data
		);

		echo json_encode($result);
	}
	public function get_produk()
	{
		$draw = intval($this->input->get("draw"));
		$query = $this->db->query("SELECT P.*, K.nama nama_kategori,
		(SELECT foto FROM foto_produk WHERE foto_produk.id_produk = P.id LIMIT 1) as foto
		FROM produk P
		JOIN kategori K ON K.id = P.kategori
		ORDER BY P.created_at DESC");
		$data = [];
		$no = 1;
		foreach ($query->result() as $row) {
			$data[] = array(
				$no++,
				ucfirst($row->nama),
				'<img src="' . base_url('dist/foto_produk/' . $row->foto) . '" style="width:100px;heigth:100px;"> ',
				$row->nama_kategori,
				$row->harga,
				$row->berat,
				$row->deskripsi,
				$row->stok,
				$row->created_at,
				'
				<a href="' . site_url('produk/detail/' . $row->link) . '" target="_blank" role="button" class="btn btn-sm btn-primary"><i class="fas fa-icon fa-eye"></i></a>
				<button data-target="#editModal" data-toggle="modal" onclick="edit_produk(' . $row->id . ')" class="btn btn-sm btn-success"><i class="fas fa-icon fa-edit"></i></button>
				<a href="' . site_url('dashboard/delete-produk/' . $row->id) . '" role="button" class="tombol-hapus btn btn-sm btn-danger"><i class="fas fa-icon fa-trash"></i></a>
				'
			);
		}
		$result = array(
			"draw" => $draw,
			"recordsTotal" => $query->num_rows(),
			"recordsFiltered" => $query->num_rows(),
			"data" => $data
		);

		echo json_encode($result);
	}
	public function get_faq()
	{
		$draw = intval($this->input->get("draw"));

		$query = $this->db->get('faq')->result();
		$total = $this->db->get('faq')->num_rows();
		$data = [];
		$no = 1;
		foreach ($query as $row) {
			$data[] = array(
				$no++,
				$row->judul,
				$row->isi,
				$row->created_at,
				'
				<button data-target="#editModal" data-toggle="modal" onclick="edit_faq(' . $row->id . ')" role="button" class="btn btn-sm btn-success"><i class="fas fa-icon fa-edit"></i></button>&nbsp;
				<a href="' . site_url('dashboard/delete-faq/' . $row->id) . '" role="button" class="tombol-hapus btn btn-sm btn-danger"><i class="fas fa-icon fa-trash"></i></a>
				'
			);
		}
		$result = array(
			"draw" => $draw,
			"recordsTotal" => $total,
			"recordsFiltered" => $total,
			"data" => $data
		);

		echo json_encode($result);
	}
	public function add_user()
	{
		$q = $this->db->insert('user', array(
			'id' => '',
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'password' => md5($this->input->post('password')),
			'telepon' => '62' . $this->input->post('telp'),
			'alamat' => $this->input->post('alamat'),
			'level' => $this->input->post('level'),
			'created_at' => date('Y-m-d')
		));

		if ($q == TRUE) {
			redirect(site_url('dashboard/user'));
		} else {
			echo "404 Error";
		}
	}
	public function add_kategori()
	{
		$q = $this->db->insert('kategori', array(
			'id' => '',
			'nama' => $this->input->post('nama'),
		));

		if ($q == TRUE) {
			redirect(site_url('dashboard/kategori'));
		} else {
			echo "404 Error";
		}
	}
	public function edit_kategori(){
		$q = $this->db->update('kategori', array(
			'nama' => $this->input->post('nama'),
		), array(
			'id' => $this->input->post('id')
		));

		if ($q == TRUE) {
			redirect(site_url('dashboard/kategori'));
		} else {
			echo "404 Error";
		}
	}
	public function add_ongkir()
	{
		$q = $this->db->insert('ongkir', array(
			'id_ongkir' => '',
			'nama_kota' => $this->input->post('nama'),
			'tarif' => $this->input->post('tarif'),
		));

		if ($q == TRUE) {
			redirect(site_url('dashboard/ongkir'));
		} else {
			echo "404 Error";
		}
	}
	public function edit_ongkir()
	{
		$q = $this->db->update('ongkir', array(
			'nama_kota' => $this->input->post('nama'),
			'tarif' => $this->input->post('tarif'),
		), array(
			'id_ongkir' => $this->input->post('id')
		));

		if ($q == TRUE) {
			redirect(site_url('dashboard/ongkir'));
		} else {
			echo "404 Error";
		}
	}
	public function delete_ongkir($id){
		$this->db->delete('ongkir', array('id_ongkir' => $id));
		redirect(site_url('dashboard/ongkir'));
	}
	public function delete_user($id)
	{
		$this->db->delete('user', array('id' => $id));
		$this->db->delete('wishlist', array('id_user' => $id));
		$getb = $this->db->get_where('beli', array('id_user' => $id))->row_array();
		$this->db->delete('history_beli', array('id_beli' => $getb['id']));
		$this->db->delete('beli', array('id_user' => $id));
		redirect(site_url('dashboard/user'));
	}
	public function show_edit_user()
	{
		$id = $this->input->post('id');
		$detail = $this->db->get_where('user', array('id' => $id))->row_array();
		echo '<div class="row">';
		echo '<div class="col-md-6">';
		echo '<input type="hidden" name="id" value="' . $detail['id'] . '">';
		echo '<div class="form-group">';
		echo '<label>Nama : <a style="color:red;">*</a></label>';
		echo '<input type="text" name="nama" class="form-control" value="' . $detail['nama'] . '" placeholder="Nama" required>';
		echo '</div>';
		echo '<div class="form-group">';
		echo '<label>Email : <a style="color:red;">*</a></label>';
		echo '<input type="email" name="email" class="form-control" value="' . $detail['email'] . '" placeholder="Email address" required>';
		echo '</div>';
		echo '<div class="form-group">';
		echo '<label>Password : <a style="color:red;">*</a></label>';
		echo '<input type="password" name="password" class="form-control" placeholder="Password">';
		echo '<p>Kosongkan password untuk menggunakan password lama</p>';
		echo '</div>';
		echo '<div class="form-group">';
		echo '<label>Level : <a style="color:red;">*</a></label>';
		echo '<select class="form-control" name="level" required>';
		echo '<option value="' . $detail['level'] . '" selected hidden>' . ucfirst($detail['level']) . '</option>';
		echo '<option value="admin">Admin</option>';
		echo '<option value="user">User</option>';
		echo '</select>';
		echo '</div>';
		echo '</div>';
		echo '<div class="col-md-6">';
		echo '<div class="form-group">';
		echo '<label>Nomor Telepon : <a style="color:red;">*</a></label>';
		echo '<div class="input-group mb-2">';
		echo '<div class="input-group-prepend">';
		echo '<div class="input-group-text">62</div>';
		echo '</div>';
		echo '<input type="number" name="telp" class="form-control" placeholder="Nomor Telepon" value="' . substr($detail['telepon'], 2) . '" required>';
		echo '</div>';
		echo '</div>';
		echo '<div class="form-group">';
		echo '<label>Alamat : <a style="color:red;">*</a></label>';
		echo '<textarea class="form-control" name="alamat" placeholder="Alamat" style="min-height:120px;" required>' . $detail['alamat'] . '</textarea>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
	}
	public function show_detail_user()
	{
		$id = $this->input->post('id');
		$detail = $this->db->get_where('user', array('id' => $id))->row_array();
		echo '<div class="row">';
		echo '<div class="col-md-6">';
		echo '<input type="hidden" name="id" value="' . $detail['id'] . '">';
		echo '<div class="form-group">';
		echo '<label>Nama :</label>';
		echo '<input type="text" disabled name="nama" class="form-control" value="' . $detail['nama'] . '" placeholder="Nama" required>';
		echo '</div>';
		echo '<div class="form-group">';
		echo '<label>Email :</label>';
		echo '<input type="email" disabled name="email" class="form-control" value="' . $detail['email'] . '" placeholder="Email address" required>';
		echo '</div>';
		echo '</div>';
		echo '<div class="col-md-6">';
		echo '<div class="form-group">';
		echo '<label>Nomor Telepon :</label>';
		echo '<div class="input-group mb-2">';
		echo '<div class="input-group-prepend">';
		echo '<div class="input-group-text">62</div>';
		echo '</div>';
		echo '<input type="number" disabled name="telp" class="form-control" placeholder="Nomor Telepon" value="' . substr($detail['telepon'], 2) . '" required>';
		echo '</div>';
		echo '</div>';
		echo '<div class="form-group">';
		echo '<label>Alamat :</label>';
		echo '<textarea class="form-control" disabled name="alamat" placeholder="Alamat" style="min-height:120px;" required>' . $detail['alamat'] . '</textarea>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
	}
	public function act_edit_user()
	{
		if ($this->input->post('password') == "") {
			$q = $this->db->update('user', array(
				'nama' => $this->input->post('nama'),
				'email' => $this->input->post('email'),
				'telepon' => '62' . $this->input->post('telp'),
				'alamat' => $this->input->post('alamat'),
				'level' => $this->input->post('level'),
			), array('id' => $this->input->post('id')));
		} else {
			$q = $this->db->update('user', array(
				'nama' => $this->input->post('nama'),
				'email' => $this->input->post('email'),
				'password' => md5($this->input->post('password')),
				'telepon' => '62' . $this->input->post('telp'),
				'alamat' => $this->input->post('alamat'),
				'level' => $this->input->post('level'),
			), array('id' => $this->input->post('id')));
		}
		if ($q == TRUE) {
			redirect(site_url('dashboard/user'));
		} else {
			echo "404 Error";
		}
	}
	public function delete_kategori($id)
	{
		$this->db->delete('kategori', array('id' => $id));
		redirect(site_url('dashboard/kategori'));
	}
	public function delete_produk($id)
	{
		$this->db->delete('produk', array('id' => $id));
		$this->db->delete('foto_produk', array('id_produk' => $id));
		$this->db->delete('wishlist', array('id_produk' => $id));
		$getb = $this->db->get_where('beli', array('id_user' => $id))->row_array();
		$this->db->delete('history_beli', array('id_beli' => $getb['id']));
		$this->db->delete('beli', array('id_user' => $id));
		redirect(site_url('dashboard/produk'));
	}
	public function add_faq()
	{
		$q = $this->db->insert('faq', array(
			'id' => '',
			'judul' => $this->input->post('judul'),
			'isi' => $this->input->post('isi'),
			'created_at' => date('Y-m-d H:i:s')
		));
		if ($q == TRUE) {
			redirect(site_url('dashboard/faq'));
		} else {
			echo "404 Error";
		}
	}
	public function delete_faq($id)
	{
		$this->db->delete('faq', array('id' => $id));
		redirect(site_url('dashboard/faq'));
	}
	public function act_edit_faq()
	{
		$q = $this->db->update('faq', array(
			'judul' => $this->input->post('judul'),
			'isi' => $this->input->post('isi'),
			'created_at' => date('Y-m-d H:i:s')
		), array('id' => $this->input->post('id')));
		if ($q == TRUE) {
			redirect(site_url('dashboard/faq'));
		} else {
			echo "404 Error";
		}
	}
	public function show_edit_faq()
	{
		$id = $this->input->post('id');
		$detail = $this->db->get_where('faq', array('id' => $id))->row_array();
		echo '<div class="row">';
		echo '<div class="col-md-12">';
		echo '<input type="hidden" name="id" value="' . $detail['id'] . '">';
		echo '<div class="form-group">';
		echo '<label>JUDUL : <a style="color:red;">*</a></label>';
		echo '<input type="text" name="judul" class="form-control" placeholder="Judul" value="' . $detail['judul'] . '" required>';
		echo '</div>';
		echo '<div class="form-group">';
		echo '<label>ISI : <a style="color:red;">*</a></label>';
		echo '<textarea class="form-control" name="isi" placeholder="Isi" required>' . $detail['isi'] . '</textarea>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
	}
	public function select_kategori()
	{
		$search = $this->input->get('searchTerm');
		$query = $this->db->query("SELECT * FROM kategori WHERE nama LIKE '%$search%' ")->result_array();
		echo json_encode($query);
	}
	public function show_edit_kategori()
	{
		$id = $this->input->post('id');
		$detail = $this->db->get_where('kategori', array('id' => $id))->row_array();
		echo '<div class="form-group">';
		echo '<input type="hidden" name="id" value="' . $detail['id'] . '">';
		echo '<label>Nama Kategori : <a style="color:red;">*</a></label>';
		echo '<input type="text" class="form-control" value="' . $detail['nama'] . '" name="nama" required>';
		echo '</div>';
	}
	public function show_edit_ongkir()
	{
		$id = $this->input->post('id');
		$detail = $this->db->get_where('ongkir', array('id_ongkir' => $id))->row_array();
		echo '<input type="hidden" name="id" value="' . $detail['id_ongkir'] . '">';
		echo '<div class="form-group">';
		echo '<label>Nama ongkir : <a style="color:red;">*</a></label>';
		echo '<input type="text" class="form-control" value="' . $detail['nama_kota'] . '" name="nama" required>';
		echo '</div>';
		echo '<div class="form-group">';
		echo '<label>Tarif : <a style="color:red;">*</a></label>';
		echo '<input type="number" class="form-control" value="' . $detail['tarif'] . '" name="tarif" required>';
		echo '</div>';
	}
	public function add_produk()
	{
		$nama = $this->input->post('nama');
		$kategori = $this->input->post('kategori');
		$berat = $this->input->post('berat');
		$harga = $this->input->post('harga');
		$deskripsi = $this->input->post('deskripsi');
		$stok = $this->input->post('stok');
		$get_kategori = $this->db->get_where('kategori', array('id' => $kategori))->row_array();
		$get_last_id = $this->db->query("SELECT MAX(id) id FROM produk")->row_array();
		$max_id = $get_last_id['id'] + 1;
		$link = strtolower($nama . '-' . $get_kategori['nama'] .'-'. $max_id);
		$no_space =  str_replace(" ", "-", "$link");
		$fin_link = preg_replace('/[^A-Za-z0-9\-]/', '', $no_space);
		$q = $this->db->insert('produk', array(
			'id' => '',
			'nama' => $nama,
			'kategori' => $kategori,
			'berat' => $berat,
			'harga' => $harga,
			'deskripsi' => $deskripsi,
			'stok' => $stok,
			'link' => $fin_link. '-' . date('Y-m-d'),
			'created_at' => date('Y-m-d H:i:s')
		));
		$last_id = $this->db->insert_id();

		@$jumlah_berkas = count((array)$_FILES['foto']['name']);
		for ($i = 0; $i < $jumlah_berkas; $i++) {
			if (!empty($_FILES['foto']['name'][$i])) {

				$_FILES['file']['name'] = $_FILES['foto']['name'][$i];
				$_FILES['file']['type'] = $_FILES['foto']['type'][$i];
				$_FILES['file']['tmp_name'] = $_FILES['foto']['tmp_name'][$i];
				$_FILES['file']['error'] = $_FILES['foto']['error'][$i];
				$_FILES['file']['size'] = $_FILES['foto']['size'][$i];

				$config['upload_path']          = 'dist/foto_produk';
				$config['allowed_types']        = 'jpg|png|jpeg|JPG|JPEG|PNG';
				$config['overwrite']            = TRUE;
				$config['file_name'] = $_FILES['foto']['name'][$i];
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('file')) {
					$uploadData = $this->upload->data();
					$filename = $uploadData['file_name'];
					$this->db->insert('foto_produk', array(
						'id' => '',
						'id_produk' => $last_id,
						'foto' => $filename
					));
				}
			}
		}
		if ($q == TRUE) {
			redirect('dashboard/produk');
		} else {
			echo "<script>alert('Sorry but there is something wrong right now!');location='javascript:history.go(-1)';</script>";
		}
	}
	public function show_edit_produk()
	{
		$id = $this->input->post('id');
		$detail = $this->db->query("SELECT P.*, K.nama nama_kategori, K.id id_kategori FROM produk P
		JOIN kategori K ON K.id = P.kategori WHERE P.id = '$id' ")->row_array();
		$kategori = $this->db->get('kategori')->result();
		$foto = $this->db->get_where('foto_produk', array('id_produk' => $detail['id']))->result();
		echo '<div class="row">';
		echo '<div class="col-md-6">';
		echo '<input type="hidden" name="id" value="' . $detail['id'] . '" required>';
		echo '<div class="form-group">';
		echo '<label>Nama Produk : <a style="color:red;">*</a></label>';
		echo '<div class="form-label-group">';
		echo '<input type="text" name="nama" class="form-control" value="' . $detail['nama'] . '" placeholder="Nama Produk" required>';
		echo '</div>';
		echo '</div>';
		echo '<div class="form-group">';
		echo '<label>Harga Produk (Rp) : <a style="color:red;">*</a></label>';
		echo '<div class="form-label-group">';
		echo '<input type="number" name="harga" class="form-control" placeholder="Harga Produk" value="' . $detail['harga'] . '" required>';
		echo '</div>';
		echo '</div>';
		echo '<div class="form-group">';
		echo '<label>Berat (gr) : <a style="color:red;">*</a></label>';
		echo '<div class="form-label-group">';
		echo '<input type="number" name="berat" class="form-control" placeholder="Berat Produk" value="' . $detail['berat'] . '" required>';
		echo '</div>';
		echo '</div>';
		echo '<div class="form-group">';
		echo '<label>Stok : <a style="color:red;">*</a></label>';
		echo '<div class="form-label-group">';
		echo '<input type="number" name="stok" class="form-control" placeholder="Jumlah Stok" value="' . $detail['stok'] . '" required>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '<div class="col-md-6">';
		echo '<div class="form-group">';
		echo '<label>Kategori : <a style="color:red;">*</a></label>';
		echo '<select class="form-control" name="kategori" required>';
		echo '<option selected hidden value="' . $detail['id_kategori'] . '">' . $detail['nama_kategori'] . '</option>';
		foreach ($kategori as $rowK) {
			echo '<option value="' . $rowK->id . '" >' . $rowK->nama . '</option>';
		}
		echo '</select>';
		echo '</div>';
		echo '<div class="form-group">';
		echo '<label>Deskripsi : <a style="color:red;">*</a></label>';
		echo '<textarea class="form-control" name="deskripsi" placeholder="Deskripsi" style="min-height:120px;" required>' . $detail['deskripsi'] . '</textarea>';
		echo '</div>';
		echo '<div class="form-group">';
		echo '<label>Foto : <a style="color:red;">*</a></label>';
		echo 'Klik foto dibawah untuk menghapus<br>';
		foreach ($foto as $rowF) {
			echo '<a href="#" onclick="hapus_foto(' . $rowF->id . ',' . $detail['id'] . ')" data-toggle="tooltip" title="Hapus">
			<img src="' . base_url('dist/foto_produk/' . $rowF->foto) . '" style="height:50px;width:100px;">
			</a> &nbsp;&nbsp;';
		}
		echo '<br><br><input type="file" name="foto[]" id="fotoProduk" multiple ><br>';
		echo '<small>Upload sekaligus dengan multiple select gambar</small>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
	}
	public function hapus_foto()
	{
		$id = $this->input->post('id');
		$q = $this->db->delete('foto_produk', array('id' => $id));
		echo json_encode($q);
	}
	public function edit_produk()
	{
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$kategori = $this->input->post('kategori');
		$berat = $this->input->post('berat');
		$harga = $this->input->post('harga');
		$deskripsi = $this->input->post('deskripsi');
		$stok = $this->input->post('stok');
		$get_kategori = $this->db->get_where('kategori', array('id' => $kategori))->row_array();
		$link = strtolower($nama . '-' . $get_kategori['nama'] . '-' . $id);
		$no_space =  str_replace(" ", "-", "$link");
		$fin_link = preg_replace('/[^A-Za-z0-9\-]/', '', $no_space);
		$q = $this->db->update('produk', array(
			'nama' => $nama,
			'kategori' => $kategori,
			'berat' => $berat,
			'harga' => $harga,
			'deskripsi' => $deskripsi,
			'stok' => $stok,
			'link' => $fin_link . '-' . date('Y-m-d'),
			'created_at' => date('Y-m-d H:i:s')
		), array('id' => $id));

		@$jumlah_berkas = count((array)$_FILES['foto']['name']);
		for ($i = 0; $i < $jumlah_berkas; $i++) {
			if (!empty($_FILES['foto']['name'][$i])) {

				$_FILES['file']['name'] = $_FILES['foto']['name'][$i];
				$_FILES['file']['type'] = $_FILES['foto']['type'][$i];
				$_FILES['file']['tmp_name'] = $_FILES['foto']['tmp_name'][$i];
				$_FILES['file']['error'] = $_FILES['foto']['error'][$i];
				$_FILES['file']['size'] = $_FILES['foto']['size'][$i];

				$config['upload_path']          = 'dist/foto_produk';
				$config['allowed_types']        = 'jpg|png|jpeg|JPG|JPEG|PNG';
				$config['overwrite']            = TRUE;
				$config['file_name'] = $_FILES['foto']['name'][$i];
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('file')) {
					$uploadData = $this->upload->data();
					$filename = $uploadData['file_name'];
					$this->db->insert('foto_produk', array(
						'id' => '',
						'id_produk' => $this->input->post('id'),
						'foto' => $filename,
					));
				}
			}
		}
		if ($q == TRUE) {
			redirect('dashboard/produk');
		} else {
			echo "<script>alert('Sorry but there is something wrong right now!');location='javascript:history.go(-1)';</script>";
		}
	}

	
	public function get_pembelian()
	{
		$draw = intval($this->input->get("draw"));
		$query = $this->db->query("SELECT beli.*, produk.nama nama_produk, 
		user.nama nama_user, produk.link 
		FROM beli
		JOIN produk ON produk.id = beli.id_produk
		JOIN user ON user.id = beli.id_user
		ORDER BY created_at DESC
		");
		$data = [];
		$no = 1;
		foreach ($query->result() as $row) {
			$data[] = array(
				$no++,
				'<a href="'.site_url('produk/detail/'.$row->link).'" target="_blank">'.$row->nama_produk.'</a>',
				'<a href="#userModal" data-toggle="modal" onclick="user_modal('.$row->id_user.')">'.$row->nama_user.'</a>',
				$row->jumlah,
				$row->tarif_ongkir,
				$row->total,
				$row->status,
				$row->created_at,
				'
				<a href="'.site_url('dashboard/detail-pembelian/'.$row->id).'" role="button" class="btn-sm btn btn-primary"><i class="fas fa-icon fa-eye"></i></a>
				<a href="' . site_url('dashboard/delete-pembelian/' . $row->id) . '" role="button" class="tombol-hapus btn-sm btn btn-danger"><i class="fas fa-icon fa-trash"></i></a>
				'
			);
		}

		$result = array(
			"draw" => $draw,
			"recordsTotal" => $query->num_rows(),
			"recordsFiltered" => $query->num_rows(),
			"data" => $data
		);

		echo json_encode($result);
	}
	public function delete_pembelian($id)
	{
		$this->db->delete('beli', array('id' => $id));
		$this->db->delete('history_beli', array('id_beli' => $id));
		redirect(site_url('dashboard/pembelian'));
	}
	
	public function get_history_pembelian()
	{
		$draw = intval($this->input->get("draw"));
		$id = $this->input->post('id');
		$query = $this->db->query("SELECT history_beli.status, history_beli.created_at, history_beli.notes
		FROM history_beli
		WHERE id_beli = '$id'
		ORDER BY created_at DESC
		");
		$data = [];
		$no = 1;
		foreach ($query->result() as $row) {
			$data[] = array(
				$no++,
				$row->status,
				$row->notes,
				$row->created_at,
			);
		}

		$result = array(
			"draw" => $draw,
			"recordsTotal" => $query->num_rows(),
			"recordsFiltered" => $query->num_rows(),
			"data" => $data
		);

		echo json_encode($result);
	}
	public function konfirmasi(){
		$id_beli = $this->input->post('id_beli');
		$id_produk = $this->input->post('id_produk');
		$kurir = $this->input->post('kurir');
		$resi = $this->input->post('resi');
		$jumlah = $this->input->post('jumlah');
		$stok = $this->input->post('stok');
		if($kurir != '' || $kurir != null){
			$txtKurir = 'Kurir: '.$kurir.' ';
		}else{
			$txtKurir = '';
		}
		if($resi != '' || $resi != null){
			$txtResi = 'Resi: '.$resi.' ';
		}else{
			$txtResi = '';
		}
		$this->db->insert('history_beli', array(
			'id' => '',
			'id_beli' => $id_beli,
			'status' => 'Dikirim',
			'created_at' => date('Y-m-d H:i:s'),
			'notes' => $txtKurir.$txtResi
		));
		$this->db->update('beli', array('status' => 'Dikirim'), array('id' => $id_beli));
		$q = $this->db->update('produk', array('stok' => $stok - $jumlah), array('id' => $id_produk));
		if($q == TRUE){
			redirect(site_url('dashboard/detail_pembelian/'.$id_beli));
		}else{
			echo '404 Error';
		}
	}
	public function tolak($id){
		$this->db->insert('history_beli', array(
			'id' => '',
			'id_beli' => $id,
			'status' => 'Ditolak',
			'created_at' => date('Y-m-d H:i:s'),
			'notes' => ''
		));
		$q = $this->db->update('beli', array('status' => 'Ditolak'), array('id' => $id));
		if($q == TRUE){
			redirect(site_url('dashboard/detail_pembelian/'.$id));
		}else{
			echo '404 Error';
		}
	}

	public function get_laporan()
	{
		$draw = intval($this->input->get("draw"));
		$query = $this->db->query("SELECT beli.*, produk.nama nama_produk, 
		user.nama nama_user, produk.link 
		FROM beli
		JOIN produk ON produk.id = beli.id_produk
		JOIN user ON user.id = beli.id_user
		WHERE beli.status = 'Selesai'
		ORDER BY created_at DESC
		");
		$data = [];
		$no = 1;
		foreach ($query->result() as $row) {
			$data[] = array(
				$no++,
				'<a href="'.site_url('produk/detail/'.$row->link).'" target="_blank">'.$row->nama_produk.'</a>',
				'<a href="#userModal" data-toggle="modal" onclick="user_modal('.$row->id_user.')">'.$row->nama_user.'</a>',
				$row->jumlah,
				$row->tarif_ongkir,
				$row->total,
				$row->status,
				$row->created_at,
				'
				<a href="'.site_url('dashboard/detail-pembelian/'.$row->id).'" role="button" class="btn-sm btn btn-primary"><i class="fas fa-icon fa-eye"></i></a>
				<a href="' . site_url('dashboard/delete-pembelian/' . $row->id) . '" role="button" class="tombol-hapus btn-sm btn btn-danger"><i class="fas fa-icon fa-trash"></i></a>
				'
			);
		}

		$result = array(
			"draw" => $draw,
			"recordsTotal" => $query->num_rows(),
			"recordsFiltered" => $query->num_rows(),
			"data" => $data
		);

		echo json_encode($result);
	}
	
	public function get_laporan_filter()
	{
		$draw = intval($this->input->get("draw"));
		$awal = $this->input->post('awal');
		$akhir = $this->input->post('akhir');
		$query = $this->db->query("SELECT beli.*, produk.nama nama_produk, 
		user.nama nama_user, produk.link 
		FROM beli
		JOIN produk ON produk.id = beli.id_produk
		JOIN user ON user.id = beli.id_user
		WHERE beli.status = 'Selesai' AND (beli.created_at BETWEEN '$awal' AND '$akhir')
		ORDER BY created_at DESC
		");
		$data = [];
		$no = 1;
		foreach ($query->result() as $row) {
			$data[] = array(
				$no++,
				'<a href="'.site_url('produk/detail/'.$row->link).'" target="_blank">'.$row->nama_produk.'</a>',
				'<a href="#userModal" data-toggle="modal" onclick="user_modal('.$row->id_user.')">'.$row->nama_user.'</a>',
				$row->jumlah,
				$row->tarif_ongkir,
				$row->total,
				$row->status,
				$row->created_at,
				'
				<a href="'.site_url('dashboard/detail-pembelian/'.$row->id).'" role="button" class="btn-sm btn btn-primary"><i class="fas fa-icon fa-eye"></i></a>
				<a href="' . site_url('dashboard/delete-pembelian/' . $row->id) . '" role="button" class="tombol-hapus btn-sm btn btn-danger"><i class="fas fa-icon fa-trash"></i></a>
				'
			);
		}

		$result = array(
			"draw" => $draw,
			"recordsTotal" => $query->num_rows(),
			"recordsFiltered" => $query->num_rows(),
			"data" => $data
		);

		echo json_encode($result);
	}
}
