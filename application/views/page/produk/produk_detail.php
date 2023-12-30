<?php $this->load->view('include/head'); ?>
<?php $this->load->view('include/navbar'); ?>
<section id="main-container" class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="banner-carousel banner-carousel-1 mb-0">
                    <?php foreach ($foto as $row) { ?>
                        <div class="banner-carousel-item" style="background-image:url(<?= base_url('dist/foto_produk/' . $row->foto); ?>); max-height:400px;">
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card" style="height:auto;">
                    <div class="card-body">
                        <h1><?= $detail['nama'] ?></h1>
                        <h2>Rp. <?= number_format($detail['harga']) ?></h2>
                        <table style="width:100%;height:210px; padding:2px">
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td style="text-align:right"><?= $detail['nama'] ?></td>
                            </tr>
                            <tr>
                                <td>Harga</td>
                                <td>:</td>
                                <td style="text-align:right">Rp. <?= number_format($detail['harga']) ?></td>
                            </tr>
                            <tr>
                                <td>Kategori</td>
                                <td>:</td>
                                <td style="text-align:right"><?= $detail['nama_kategori'] ?></td>
                            </tr>
                            <tr>
                                <td>Berat</td>
                                <td>:</td>
                                <td style="text-align:right"><?= $detail['berat'] . ' Gr' ?></td>
                            </tr>
                            <tr>
                                <td>Stok</td>
                                <td>:</td>
                                <td style="text-align:right"><?= $detail['stok'] ?></td>
                            </tr>
                            <tr>
                                <td>Tanggal Dibuat</td>
                                <td>:</td>
                                <td style="text-align:right"><?= date('d F Y', strtotime(str_replace('/', '-', $detail['created_at']))) ?></td>
                            </tr>
                        </table>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <a href="<?= site_url('produk/kategori/' . $detail['id_kategori']) ?>" role="button" class="btn btn-secondary btn-sm btn-block">Lihat Produk Dengan Kategori Ini</a>
                            </div>
                            <div class="col-md-6">
                                <a href="<?= site_url('produk/add_wish/' . $detail['id']) ?>" role="button" class="btn btn-success btn-block btn-sm
                                <?php if ($this->db->get_where('wishlist', array('id_produk' => $detail['id'], 'id_user' => $this->session->userdata('id')))->num_rows() > 0) {
                                    echo "disabled";
                                }
                                ?>
                                ">Wish List</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Deskripsi</h4>
                            </div>
                            <div class="card-body">
                                <p>
                                    <?= $detail['deskripsi'] ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <form method="post" action="<?=site_url('keranjang/tambah')?>">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="hidden" name="id_produk" value="<?=$detail['id']?>">
                                            <?php if ($detail['stok'] < 5 && $detail['stok'] != 0) { ?>
                                                <p style="color:red;font-weight:bold;">Stok mau habis, segera beli!</p>
                                            <?php } else if ($detail['stok'] == 0) { ?>
                                                <p style="color:red;font-weight:bold;">Stok habis!</p>
                                            <?php } else {
                                            } ?>
                                            <div class="form-group">
                                                <label>Jumlah :  <a style="color:red;">*</a></label>
                                                <div class="input-group inline-group">
                                                    <div class="input-group-prepend">
                                                        <a href="javascript:void(0)" role="button" class="btn btn-outline-secondary btn-minus">
                                                            <i class="fa fa-minus"></i>
                                                        </a>
                                                    </div>
                                                    <input name="jumlah" value="1" type="number" id="jumlah_beli" min="1" max="<?= $detail['stok'] ?>" class="form-control" placeholder="Masukkan Jumlah" required>
                                                    <div class="input-group-append">
                                                        <a href="javascript:void(0)" role="button" class="btn btn-outline-secondary btn-plus">
                                                            <i class="fa fa-plus"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <p id="text_jumlah" style="color:red;font-weight:bold;"></p>
                                            </div>
                                            <?php if ($detail['stok'] <= 0) {
                                                $dis = 'disabled';
                                            } else {
                                                $dis = '';
                                            } ?>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <button  
                                                    <?php if ($detail['stok'] <= 0 || $this->db->get_where('keranjang', array('id_produk' => $detail['id'], 'id_user' => $this->session->userdata('id')))->num_rows() > 0) {
                                                        echo "disabled";
                                                     }
                                                    ?>
                                                    class="btn btn-secondary btn-sm btn-block">Keranjang</button>
                                                </div>
                                                <div class="col-md-6">
                                                    <a <?php if ($this->session->userdata('status') != 'logged_in') { ?> href="<?= site_url('auth') ?>" <?php } else { ?> href="#" onclick="beli_produk(<?= $detail['stok'] . ',' . $detail['harga'] . ',' . $detail['berat'] ?>)" <?php } ?> class="<?= $dis ?> btn btn-success btn-sm btn-block">Beli</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <br>
    </div>
</section>

<div class="modal fade" id="beliModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">BELI <?= $detail['nama'] ?></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form method="post" action="<?= site_url('produk/beli_langsung') ?>" enctype="multipart/form-data">
                <div class="modal-body" id="">
                    <input type="hidden" name="id_produk" value="<?= $detail['id'] ?>">
                    <table style="width:100%;height:210px; padding:2px">
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td style="text-align:right"><?= $detail['nama'] ?></td>
                        </tr>
                        <tr>
                            <td>Harga</td>
                            <td>:</td>
                            <td style="text-align:right"><input type="hidden" id="harga" value="<?= $detail['harga'] ?>">Rp. <?= number_format($detail['harga']) ?></td>
                        </tr>
                        <tr>
                            <td>Kategori</td>
                            <td>:</td>
                            <td style="text-align:right"><?= $detail['nama_kategori'] ?></td>
                        </tr>
                        <tr>
                            <td>Berat</td>
                            <td>:</td>
                            <td style="text-align:right"><input type="hidden" id="berat" value="<?= $detail['berat'] ?>"><?= $detail['berat'] . ' Gr' ?></td>
                        </tr>
                        <tr>
                            <td>Stok</td>
                            <td>:</td>
                            <td style="text-align:right"><?= $detail['stok'] ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Dibuat</td>
                            <td>:</td>
                            <td style="text-align:right"><?= date('d F Y', strtotime(str_replace('/', '-', $detail['created_at']))) ?></td>
                        </tr>
                        <tr>
                            <td>Jumlah <a style="color:red;">*</a></td>
                            <td>:</td>
                            <td style="text-align:right"><input type="number" required min="1" max="<?= $detail['stok'] ?>" style="width:50%;" name="jumlah_beli" id="jumlah_modal"></td>
                        </tr>
                        <tr>
                            <td>Pilih Ongkir <a style="color:red;">*</a></td>
                            <td>:</td>
                            <td style="text-align:right">
                                <select name="ongkir" id="ongkir" style="width:50%;height:30px;" required>
                                    <option value="" selected hidden>Pilih ongkir</option>
                                    <?php foreach ($ongkir as $rowO) { ?>
                                        <option value="<?= $rowO->tarif ?>"><?= $rowO->nama_kota . ' - ' . $rowO->tarif ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Total <a style="color:red;">*</a></td>
                            <td>:</td>
                            <td style="text-align:right">
                                <input type="number" readonly style="width:50%;" name="total" id="total_beli">
                            </td>
                        </tr>
                    </table>
                    <br>
                    Total jumlah dihitung dari (harga * jumlah + (ongkir * berat/500 Gr))
                    <hr>
                    <h5>Info Pembeli</h5>
                    Edit info di menu profile user jika data tidak sesuai
                    <div class="row">
                        <div class="col-md-6">
                            <input type="hidden" name="id_user" value="<?= $user['id'] ?>">
                            <div class="form-group">
                                <label>Nama : <a style="color:red;">*</a></label>
                                <input readonly type="text" name="nama" class="form-control" value="<?= $user['nama'] ?>" placeholder="Nama" required>
                            </div>
                            <div class="form-group">
                                <label>Email : <a style="color:red;">*</a></label>
                                <input readonly type="email" name="email" class="form-control" value="<?= $user['email'] ?>" placeholder="Email address" required>
                            </div>
                            <div class="form-group">
                                <label>Nomor Telepon : <a style="color:red;">*</a></label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">62</div>
                                    </div>
                                    <input readonly type="number" name="telp" class="form-control" placeholder="Nomor Telepon" value="<?= substr($user['telepon'], 2) ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Alamat : <a style="color:red;">*</a></label>
                                <textarea readonly class="form-control" name="alamat" placeholder="Alamat" style="min-height:120px;" required><?= $user['alamat'] ?></textarea>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Upload Bukti Pembayaran : <a style="color:red;">*</a></label><br>
                                <input type="file" name="bukti" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <span>Catatan : (<span class="text-danger">*</span>) wajib diisi</span>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-success">Beli</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $this->load->view('include/foot'); ?>