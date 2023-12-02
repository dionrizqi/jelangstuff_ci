<?php 
class Produk_model extends CI_Model {
    public function get_all_produk($limit, $start){
        return $this->db->query("SELECT a.*, b.nama nama_kategori,
        (SELECT foto FROM foto_produk WHERE foto_produk.id_produk = a.id LIMIT 1) foto
        FROM produk a 
        JOIN kategori b ON a.kategori = b.id
        ORDER BY a.created_at DESC LIMIT $start, $limit")->result();
    }
    public function get_all_mobil($limit, $start){
        return $this->db->query("SELECT a.*, b.nama, b.alamat, b.created_at bergabung, b.telepon, b.email, 
        (SELECT foto FROM foto_produk WHERE foto_produk.id_produk = a.id LIMIT 1) foto
        FROM produk a, user b WHERE a.id_user = b.id AND a.kendaraan = 'mobil' 
        ORDER BY a.created_at DESC LIMIT $start, $limit")->result();
    }
    public function get_all_motor($limit, $start){
        return $this->db->query("SELECT a.*, b.nama, b.alamat, b.created_at bergabung, b.telepon, b.email,
        (SELECT foto FROM foto_produk WHERE foto_produk.id_produk = a.id LIMIT 1) foto
        FROM produk a, user b WHERE a.id_user = b.id AND a.kendaraan = 'motor' 
        ORDER BY a.created_at DESC LIMIT $start, $limit")->result();
    }
    public function get_mobil_baru($limit, $start){
        return $this->db->query("SELECT a.*, b.nama, b.alamat, b.created_at bergabung, b.telepon, b.email,
        (SELECT foto FROM foto_produk WHERE foto_produk.id_produk = a.id LIMIT 1) foto
        FROM produk a, user b WHERE a.id_user = b.id AND a.kendaraan = 'mobil' AND a.kondisi = 'baru'
        ORDER BY a.created_at DESC LIMIT $start, $limit")->result();
    }
    public function get_mobil_bekas($limit, $start){
        return $this->db->query("SELECT a.*, b.nama, b.alamat, b.created_at bergabung, b.telepon, b.email,
        (SELECT foto FROM foto_produk WHERE foto_produk.id_produk = a.id LIMIT 1) foto
        FROM produk a, user b WHERE a.id_user = b.id AND a.kendaraan = 'mobil' AND a.kondisi = 'bekas'
        ORDER BY a.created_at DESC LIMIT $start, $limit")->result();
    }    
    public function get_motor_baru($limit, $start){
        return $this->db->query("SELECT a.*, b.nama, b.alamat, b.created_at bergabung, b.telepon, b.email,
        (SELECT foto FROM foto_produk WHERE foto_produk.id_produk = a.id LIMIT 1) foto
        FROM produk a, user b WHERE a.id_user = b.id AND a.kendaraan = 'motor' AND a.kondisi = 'baru'
        ORDER BY a.created_at DESC LIMIT $start, $limit")->result();
    }    
    public function get_motor_bekas($limit, $start){
        return $this->db->query("SELECT a.*, b.nama, b.alamat, b.created_at bergabung, b.telepon, b.email,
        (SELECT foto FROM foto_produk WHERE foto_produk.id_produk = a.id LIMIT 1) foto
        FROM produk a, user b WHERE a.id_user = b.id AND a.kendaraan = 'motor' AND a.kondisi = 'bekas'
        ORDER BY a.created_at DESC LIMIT $start, $limit")->result();
    }
    public function get_my_produk($limit, $start, $id){
        return $this->db->query("SELECT a.*, b.nama, b.alamat, b.created_at bergabung, b.telepon, b.email,  
        (SELECT foto FROM foto_produk WHERE foto_produk.id_produk = a.id LIMIT 1) foto
        FROM produk a, user b WHERE a.id_user = b.id AND a.id_user = '$id' 
        ORDER BY a.created_at DESC LIMIT $start, $limit")->result();
    }
    public function get_produk_dealer($limit, $start, $id){
        return $this->db->query("SELECT a.*, b.nama, b.alamat, b.created_at bergabung, b.telepon, b.email,  
        (SELECT foto FROM foto_produk WHERE foto_produk.id_produk = a.id LIMIT 1) foto
        FROM produk a, user b WHERE a.id_user = b.id AND a.id_user = '$id' ORDER BY a.created_at DESC 
        LIMIT $start, $limit")->result();
    }
    public function get_dealer_detail($id){
        return $this->db->query("SELECT b.*, 
        (SELECT count(id) FROM produk WHERE produk.id_user = b.id) total
        FROM user b WHERE b.id = '$id' ")->row_array();

    }
    public function get_newest_home(){
        return $this->db->query("SELECT a.*, b.nama nama_kategori,
        (SELECT foto FROM foto_produk WHERE foto_produk.id_produk = a.id LIMIT 1) foto
        FROM produk a 
        JOIN kategori b ON a.kategori = b.id
        ORDER BY a.created_at DESC LIMIT 6")->result();
    }
    public function get_all_dealer($limit, $start){
        return $this->db->query("SELECT b.*, 
        (SELECT count(id) FROM produk WHERE produk.id_user = b.id) total
        FROM user b WHERE b.level != 'admin' ORDER BY b.created_at DESC LIMIT $start, $limit ")->result();   
    }
    public function get_dealer_home(){
        return $this->db->query("SELECT b.nama, b.email, b.telepon, b.alamat, b.created_at,
        (SELECT COUNT(id) FROM produk WHERE produk.id_user = b.id) jumlah,
        (SELECT foto FROM foto_produk WHERE foto_produk.id_user = b.id ORDER BY RAND() LIMIT 1) foto
        FROM produk a, user b WHERE a.id_user = b.id 
        ORDER BY (SELECT COUNT(id) FROM produk WHERE produk.id_user = b.id) LIMIT 5;")->result();
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
        WHERE a.kategori = b.id AND c.id_user = '$id' AND c.id_produk = a.id
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
    public function get_dealer_search($limit, $start, $lokasi, $key){
        return $this->db->query("SELECT b.*, 
        (SELECT count(id) FROM produk WHERE produk.id_user = b.id) total
        FROM user b WHERE b.level != 'admin' AND
        b.alamat LIKE '%$lokasi%' AND
        b.nama LIKE '%$key%'
        ORDER BY b.created_at DESC LIMIT $start, $limit ")->result();   
    }
}