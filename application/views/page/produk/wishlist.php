<?php $this->load->view('include/head'); ?>
<?php $this->load->view('include/navbar'); ?>
<section id="main-container" class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-5 mb-lg-0">
                <div class="post">
                    <div class="post-body">
                        <?php if ($this->db->get_where('wishlist', array('id_user' => $this->session->userdata('id')))->num_rows() == 0) {
                            echo "<h4>Wishlist Kosong</h4>";
                        }
                        ?>
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
                                            <a href="<?= site_url('wishlist/delete/' . $row->id_wish) ?>" role="button" class="btn btn-secondary btn-sm">Hapus Wishlist</a>
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



        </div>
    </div>
</section>
<?php $this->load->view('include/foot'); ?>