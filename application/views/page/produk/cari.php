<?php $this->load->view('include/head'); ?>
<?php $this->load->view('include/navbar'); ?>
<section id="main-container" class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="post">
                    <div class="post-body">
                        <?php foreach ($showProduk as $row) { ?>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <img loading="lazy" class="img-fluid" src="<?= base_url('dist/foto_produk/' . $row->foto); ?>" alt="img">
                                        </div>
                                        <div class="col-md-6">
                                            <h4><?= $row->nama ?></h4>
                                            <h4>Rp. <?= number_format($row->harga) ?></h4>
                                            <h5><i class="far fa-calendar"></i> <?= date('d F Y', strtotime(str_replace('/', '-', $row->created_at))) ?></h5>
                                            <br>
                                            <a href="<?= site_url('produk/detail/' . $row->link) ?>" role="button" class="btn btn-danger btn-sm">Lihat Detail</a>
                                            <?php if ($this->session->userdata('status') == 'logged_in') { ?>
                                                <a href="#" role="button" class="btn btn-secondary btn-sm
                                                <?php if ($row->stok <= 0) {
                                                    echo "disabled";
                                                }
                                                ?>
                                                ">Wishlist</a>
                                            <?php } ?>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body" style="font-size:1em;">
                                            <table style="width:100%;">
                                                <tr>
                                                    <td>Kategori</td>
                                                    <td>:</td>
                                                    <td style="text-align:right"><?= $row->nama_kategori ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Berat</td>
                                                    <td>:</td>
                                                    <td style="text-align:right"><?= $row->berat . ' Gr' ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Stok</td>
                                                    <td>:</td>
                                                    <td style="text-align:right"><?= $row->stok ?></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        <?php } ?>

                    </div><!-- post-body end -->

                </div><!-- 1st post end -->



                <center>
                    <div class="row">
                        <div class="col">
                            <!--Tampilkan pagination-->
                            <div><?= $pagination ?></div>
                        </div>
                    </div>
                </center>

            </div><!-- Content Col end -->

            <div class="col-lg-4">

                <div class="sidebar sidebar-right">
                    <div class="widget recent-posts">
                        <h3 class="widget-title">Cari Spesifik</h3>
                        <form method="post" action="<?= site_url('produk/cari') ?>">
                            <select class="form-control select2" required name="jenis">
                                <option selected hidden disabled>Cari apa nih?</option>
                                <?php foreach ($kategori as $rowK) { ?>
                                    <option value="<?= $rowK->id ?>"><?= $rowK->nama ?></option>
                                <?php } ?>
                            </select>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="number" name="min" placeholder="Harga Min" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <input type="number" name="max" placeholder="Harga Max" class="form-control">
                                </div>
                            </div>
                            <br>

                            <textarea name="cari" placeholder="Cari lebih spesifik" class="form-control"></textarea>
                            <button class="btn btn-danger btn-sm btn-block">Cari Sekarang</button>
                        </form>
                    </div><!-- Recent post end -->

                </div><!-- Sidebar end -->
            </div><!-- Sidebar Col end -->

        </div>
    </div>
</section>
<?php $this->load->view('include/foot'); ?>