<?php 
class Produk_model extends CI_Model {
    public function get_all_produk($limit, $start){
        return $this->db->query("SELECT a.*, b.nama nama_kategori,
        (SELECT foto FROM foto_produk WHERE foto_produk.id_produk = a.id LIMIT 1) foto
        FROM produk a 
        JOIN kategori b ON a.kategori = b.id
        ORDER BY a.created_at DESC LIMIT $start, $limit")->result();
    }    
    public function get_newest_home(){
        return $this->db->query("SELECT a.*, b.nama nama_kategori,
        (SELECT foto FROM foto_produk WHERE foto_produk.id_produk = a.id LIMIT 1) foto
        FROM produk a 
        JOIN kategori b ON a.kategori = b.id
        ORDER BY a.created_at DESC LIMIT 6")->result();
    }
    public function get_terlaris(){
        return $this->db->query("SELECT a.*, b.nama nama_kategori,
        (SELECT foto FROM foto_produk WHERE foto_produk.id_produk = a.id LIMIT 1) foto,
        (SELECT SUM(jumlah) FROM beli WHERE beli.id_produk = a.id) jumlah
        FROM produk a 
        JOIN kategori b ON a.kategori = b.id
        ORDER BY (SELECT SUM(jumlah) FROM beli WHERE beli.id_produk = a.id) DESC LIMIT 4")->result();
    }    
    public function detail($link){
        return $this->db->query("SELECT a.*, b.nama nama_kategori, b.id id_kategori,
        (SELECT foto FROM foto_produk WHERE foto_produk.id_produk = a.id LIMIT 1) foto
        FROM produk a 
        JOIN kategori b ON a.kategori = b.id
        WHERE a.link = '$link' ")->row_array();
    }
    public function foto_detail($link){
        return $this->db->query("SELECT a.* FROM foto_produk a, produk b WHERE a.id_produk = b.id AND b.link = '$link' ")->result();
    }
    public function get_my_wishlist($limit, $start, $id){
        return $this->db->query("SELECT a.*, b.nama nama_kategori, c.id id_wish,
        (SELECT foto FROM foto_produk WHERE foto_produk.id_produk = a.id LIMIT 1) foto
        FROM produk a 
        JOIN kategori b ON a.kategori = b.id 
        JOIN wishlist c ON c.id_produk = a.id
        WHERE c.id_user = '$id' AND c.id_produk = a.id
        ORDER BY a.created_at DESC LIMIT $start, $limit")->result();
    }
    public function get_search($limit, $start, $jenis, $key, $min, $max){
        if($min == '' OR $min == NULL){
            $min = 0;
        }
        if($max == '' OR $max == NULL){
            $max = 9999999999;
        }
        return $this->db->query("SELECT a.*, b.nama nama_kategori,
        (SELECT foto FROM foto_produk WHERE foto_produk.id_produk = a.id LIMIT 1) foto
        FROM produk a 
        JOIN kategori b ON a.kategori = b.id 
        WHERE 
        b.id = COALESCE(NULLIF('$jenis', ''), b.id) AND
        (a.nama LIKE '%$key%' OR a.deskripsi LIKE '%$key%') AND
        (a.harga BETWEEN $min AND $max)
        ORDER BY a.created_at DESC LIMIT $start, $limit");
    }
    public function get_pembelian_detail($id){
		$query = $this->db->query("SELECT beli.*, produk.nama nama_produk, 
		user.nama nama_user, produk.link, kategori.nama nama_kategori, produk.harga,
        produk.berat, produk.stok, user.email, user.telepon, user.alamat, produk.id id_produk,
        beli.jumlah, produk.stok
		FROM beli
		JOIN produk ON produk.id = beli.id_produk
		JOIN user ON user.id = beli.id_user
        JOIN kategori ON kategori.id = produk.kategori
        WHERE beli.id = '$id'
		")->row_array();
        return $query;
    }
    public function get_keranjang($id){
        return $this->db->query("SELECT a.*, c.id id_keranjang, c.jumlah,
        (a.harga * c.jumlah) total
        FROM produk a 
        JOIN keranjang c ON c.id_produk = a.id
        WHERE c.id_user = '$id'")->result();
    }
}