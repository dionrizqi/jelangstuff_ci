<?php $this->load->view('include/head'); ?>
<?php $this->load->view('include/navbar'); ?>
<section id="main-container" class="main-container">
    <div class="aboutus konten1">
        <div class="container">
            <?php if($this->db->get_where('keranjang', array('id_user' => $this->session->userdata('id')))->num_rows() > 0){ ?>
            <form method="post" action="<?=site_url('keranjang/beli')?>" id="form_keranjang" enctype="multipart/form-data">
                <div class="col-md-12">
                    <h2>Keranjang Belanja</h2>
                    <div style="overflow-x: auto;">
                    <table class="datatables table table-bordered" style="text-align:center !important;">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>PRODUK</th>
                                <th>HARGA</th>
                                <th>BERAT (GR)</th>
                                <th>STOK</th>
                                <th>JUMLAH  <a style="color:red;">*</a></th>
                                <th>SUB TOTAL</th>
                                <th>OPSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            $total = 0;
                            $berat = 0;
                            foreach ($keranjang as $row) { ?>
                                <tr>
                                    <td>
                                        <?= $no++ ?>
                                        <input type="hidden" value="<?=$row->id?>" name="id_produk[]">
                                    </td>
                                    <td><a href="<?= site_url('produk/detail/' . $row->link) ?>" target="_blank" style="color:blue;"><b><?= $row->nama ?></b></a></td>
                                    <td><?= $row->harga ?></td>
                                    <td><?= $row->berat ?></td>
                                    <td><?= $row->stok ?></td>
                                    <td>
                                        <div class="input-group inline-group">
                                            <div class="input-group-prepend">
                                                <a onclick="cek_jumlah(<?=$row->id.','.$row->stok.','.$row->harga?>)" href="javascript:void(0)" role="button" class="btn btn-outline-secondary btn-minus">
                                                    <i class="fa fa-minus"></i>
                                                </a>
                                            </div>
                                            <input type="number" onchange="cek_jumlah(<?=$row->id.','.$row->stok.','.$row->harga?>)" name="jumlah[]" min="1" max="<?= $row->stok ?>" class="jumlahKeranjang_<?=$row->id?> form-control" value="<?= $row->jumlah ?>">
                                            <div class="input-group-append">
                                                <a onclick="cek_jumlah(<?=$row->id.','.$row->stok.','.$row->harga?>)" href="javascript:void(0)" role="button" class="btn btn-outline-secondary btn-plus">
                                                    <i class="fa fa-plus"></i>
                                                </a>
                                            </div>
                                        </div>

                                        <p id="text_jumlah" style="color:red;font-weight:bold;"></p>
                                    </td>
                                    <td><p class="subKeranjang totalKeranjang_<?=$row->id?>"><?= $row->total ?></p></td>
                                    <td><a href="<?= site_url('keranjang/hapus/' . $row->id_keranjang) ?>" class="btn btn-sm btn-danger"><i class="fas fa-icon fa-trash"></i></a></td>
                                </tr>
                            <?php 
                        $total = $total + $row->total;
                        $berat = $berat + $row->berat;
                        } ?>
                        </tbody>
                    </table>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Pilih Ongkir  <a style="color:red;">*</a></label>
                                <select name="ongkir" id="ongkir_keranjang" class="form-control" required>
                                    <option value="" selected hidden>Pilih ongkir</option>
                                    <?php foreach ($ongkir as $rowO) { ?>
                                        <option value="<?= $rowO->tarif ?>"><?= $rowO->nama_kota . ' - ' . $rowO->tarif ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Jumlah Berat (Gr)</label>
                                <input type="number" name="berat" class="form-control" value="<?=$berat?>" id="total_berat" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Total</label>
                                <input type="number" name="total_keranjang" class="form-control" value="<?=$total?>" id="total_keranjang" readonly>
                            </div>
                        </div>
                    </div>
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
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Upload Bukti Pembayaran : <a style="color:red;">*</a></label><br>
                                <input type="file" name="bukti" required>
                            </div>
                        </div>
                    </div>
                    <hr>
                    
                    <span>Catatan : (<span class="text-danger">*</span>) wajib diisi</span><br>
                    <button class="btn btn-success" id="btn_beli">Beli</button>
                </div>
            </form>
        <?php }else{ ?>
            <div class="col-md-12">
                <h2>KERANJANG MASIH KOSONG</h2>
                <h4>Mulai Belanja Sekarang</h4>
                <a href="<?=site_url('produk')?>" class="btn btn-danger">CEK PRODUK</a>
            </div>
        <?php } ?>
        </div>
    </div>
</section>

<?php $this->load->view('include/foot'); ?>