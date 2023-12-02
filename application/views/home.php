<?php $this->load->view('include/head'); ?>
<?php $this->load->view('include/navbar'); ?>


<div class="banner-carousel banner-carousel-2 mb-0">
    <div class="banner-carousel-item" style="background-image:url(<?= base_url(''); ?>dist/img/home-img.jpg)">
        <div class="container">
            <div class="box-slider-content">
                <div class="box-slider-text">
                    <h2 class="box-slide-title">CARI PAKAIAN SESUAI GAYA KAMU</h2>
                    <h3 class="box-slide-sub-title">TEMPAT BELI PAKAIAN MUDAH DAN CEPAT</h3>
                    <form method="post" action="<?=site_url('produk/cari')?>">
                    <select class="form-control select2" required name="jenis">
                        <option selected hidden disabled>Cari apa nih?</option>
                        <?php foreach($kategori as $rowK){ ?>
                            <option value="<?=$rowK->id?>"><?=$rowK->nama?></option>
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
                    <br>
                    <p>
                        <button class="slider btn btn-primary">Cari Sekarang</button>
                    </p>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>

<section id="project-area" class="project-area solid-bg">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-12">
                <!-- <h2 class="section-title">Work of Excellence</h2> -->
                <h3 class="section-sub-title">Baru Ditambahkan</h3>
            </div>
        </div>
        <!--/ Title row end -->

        <div class="row">
            <div class="col-12">

                <div class="row shuffle-wrapper">
                    <div class="col-1 shuffle-sizer"></div>
                    <?php foreach($getProduk as $row){?>
                    <div class="col-lg-4 col-md-6 shuffle-item">
                        <div class="project-img-container">
                            <a class="gallery-popup" href="<?= base_url(''); ?>dist/foto_produk/<?=$row->foto?>" aria-label="project-img">
                                <img style="width:400px;height:400px;" src="<?= base_url(''); ?>dist/foto_produk/<?=$row->foto?>" alt="project-img">
                                <span class="gallery-icon">Zoom</span>
                            </a>
                            <div class="project-item-info">
                                <div class="project-item-info-content">
                                    <h3 class="project-item-title">
                                        <a href="<?=site_url('produk/detail/'. $row->link)?>"><?=$row->nama?></a>
                                        <p class="text-light">Rp. <?=number_format($row->harga)?></p>
                                        <p class="text-light"><?=$row->nama_kategori?></p>
                                    </h3>
                                    <a href="<?=site_url('produk/detail/'. $row->link)?>" class="project-cat">Cek Detail</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- shuffle item 1 end -->
                    <?php } ?>
                </div><!-- shuffle end -->
            </div>

            <div class="col-12">
                <div class="general-btn text-center">
                    <a class="btn btn-primary" href="<?=site_url('produk')?>">Lihat Semua</a>
                </div>
            </div>

        </div><!-- Content row end -->
    </div>
    <!--/ Container end -->
</section><!-- Project area end -->

<section>
    <div class="container">
        <div class="row text-center">
            <div class="col-12">
                <h3 class="section-sub-title">Produk Terlaris</h3>
            </div>
        </div>
        <!--/ Title row end -->

        <div class="row">
            <?php foreach($getTerlaris as $row){ ?>
            <div class="col-lg-3 col-md-3 mb-3">
                <div class="latest-post">
                    <div class="latest-post-media">
                        <a href="#" class="latest-post-img">
                            <img loading="lazy" class="img-fluid" style="height:300px !important;" src="<?= base_url(''); ?>dist/foto_produk/<?=$row->foto?>" alt="img">
                        </a>
                    </div>
                    <div class="post-body">
                        <h4 class="post-title">
                            <a href="#" class="d-inline-block"><?=$row->nama?></a>
                        </h4>
                        <div class="latest-post-meta">
                            <span class="post-item-date">
                                Total Pembelian: <?=$row->jumlah?> <br>
                                Kategori: <?=$row->nama_kategori?>
                            </span>
                        </div>
                    </div>
                </div><!-- Latest post end -->
            </div><!-- 1st post col end -->
            <?php } ?>

            

        </div>
        <!--/ Content row end -->


    </div>
    <!--/ Container end -->
</section>



<footer id="footer" class="footer bg-overlay">
    <div class="footer-main">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-4 col-md-6 footer-widget footer-about">
                    <h3 class="widget-title">Tentang Kami</h3>
                    <!-- <img loading="lazy" class="footer-logo" src="images/footer-logo.png" alt="Constra"> -->
                    <h1 style="color:#fff !important;">Logo Here</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor inci done idunt ut
                        labore et dolore magna aliqua.</p>
                    <div class="footer-social">
                        <ul>
                            <li><a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                            </li>
                            <li><a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                    </div><!-- Footer social end -->
                </div><!-- Col end -->

                <div class="col-lg-4 col-md-6 footer-widget mt-5 mt-md-0">
                    <h3 class="widget-title">Jam Layanan</h3>
                    <div class="working-hours">
                        We work 7 days a week, every day excluding major holidays. Contact us if you have an emergency, with our
                        Hotline and Contact form.
                        <br><br> Monday - Friday: <span class="text-right">10:00 - 16:00 </span>
                        <br> Saturday: <span class="text-right">12:00 - 15:00</span>
                        <br> Sunday and holidays: <span class="text-right">09:00 - 12:00</span>
                    </div>
                </div><!-- Col end -->

                <div class="col-lg-3 col-md-6 mt-5 mt-lg-0 footer-widget">
                    <h3 class="widget-title">Jaringan Kami</h3>
                    <ul class="list-arrow">
                        <li><a href="#">Adikari Wisesa Indonesia</a></li>
                        <li><a href="#">Rizky Jelang</a></li>
                        <li><a href="#">Universitas Gunadarma</a></li>
                    </ul>
                </div><!-- Col end -->
            </div><!-- Row end -->
        </div><!-- Container end -->
    </div><!-- Footer main end -->
</footer><!-- Footer end -->
<?php $this->load->view('include/foot'); ?>