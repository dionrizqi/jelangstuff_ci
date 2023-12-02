<?php $this->load->view('include/head'); ?>
<?php $this->load->view('include/navbar'); ?>
<section id="main-container" class="main-container">
    <div class="aboutus konten1">
        <div class="container">
            <div class="col-md-12">
            <div class="card">
                        <?php if ($detail['status'] == 'Dikirim') { ?>
                            <div class="card-header">
                                <a href="<?=site_url('riwayat/selesai/'.$detail['id'])?>" data-toggle="modal" class="tombol-confirm btn btn-success">Selesaikan Pesanan</a>
                            </div>
                        <?php } ?>
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="myTab">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#detail">Detail</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#history">Riwayat</a>
                                </li>
                            </ul>
                            <br>
                            <div class="tab-content">
                                <div id="detail" class="tab-pane fade in active show" style="overflow-x:auto;">
                                    <input type="hidden" name="id_produk" value="<?= $detail['id'] ?>">
                                    <table style="width:100%;height:210px; padding:2px">
                                        <tr>
                                            <td>Nama Produk</td>
                                            <td>:</td>
                                            <td style="text-align:right"><?= $detail['nama_produk'] ?></td>
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
                                            <td style="text-align:right"><input type="hidden" id="berat" value="<?= $detail['berat'] ?>"><?= $detail['berat'] . ' Gr' ?></td>
                                        </tr>
                                        <tr>
                                            <td>Stok</td>
                                            <td>:</td>
                                            <td style="text-align:right"><?= $detail['stok'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Pembelian</td>
                                            <td>:</td>
                                            <td style="text-align:right"><?= date('d F Y', strtotime(str_replace('/', '-', $detail['created_at']))) ?></td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah</td>
                                            <td>:</td>
                                            <td style="text-align:right"><?= $detail['jumlah'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Tarif Ongkir</td>
                                            <td>:</td>
                                            <td style="text-align:right"><?= $detail['tarif_ongkir'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Total</td>
                                            <td>:</td>
                                            <td style="text-align:right"><?= $detail['total'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Status</td>
                                            <td>:</td>
                                            <td style="text-align:right"><b><?= $detail['status'] ?></b></td>
                                        </tr>
                                    </table>
                                    <br>
                                    Total jumlah dihitung dari (harga * jumlah + (ongkir * berat/500 Gr))
                                    <hr>
                                    <h5>Info Pembeli</h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nama : <a style="color:red;">*</a></label>
                                                <input readonly type="text" name="nama" class="form-control" value="<?= $detail['nama_user'] ?>" placeholder="Nama" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Email : <a style="color:red;">*</a></label>
                                                <input readonly type="email" name="email" class="form-control" value="<?= $detail['email'] ?>" placeholder="Email address" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Nomor Telepon : <a style="color:red;">*</a></label>
                                                <div class="input-group mb-2">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">62</div>
                                                    </div>
                                                    <input readonly type="number" name="telp" class="form-control" placeholder="Nomor Telepon" value="<?= substr($detail['telepon'], 2) ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Alamat : <a style="color:red;">*</a></label>
                                                <textarea readonly class="form-control" name="alamat" placeholder="Alamat" style="min-height:120px;" required><?= $detail['alamat'] ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Bukti Pembayaran : </label><br>
                                                <img src="<?= base_url('dist/bukti/' . $detail['bukti']) ?>" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="history" class="tab-pane fade in" style="overflow-x: auto;">
                                    <table class="table table-bordered datatables" id="" style="text-align:center !important;width:100%;">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>STATUS</th>
                                                <th>KETERANGAN</th>
                                                <th>TIMESTAMP</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1; foreach($history as $row){ ?>
                                            <tr>
                                                <td><?=$no++?></td>
                                                <td><?=$row->status?></td>
                                                <td><?=$row->notes?></td>
                                                <td><?=$row->created_at?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>


                            </div>
                        </div>
                    </div>

            </div>
        </div>
    </div>
</section>

<?php $this->load->view('include/foot'); ?>