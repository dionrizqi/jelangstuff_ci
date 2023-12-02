<?php $this->load->view('include/head'); ?>
<?php $this->load->view('include/navbar'); ?>
<section id="main-container" class="main-container">
    <div class="container">
        <div class="row">
        <div class="col-lg-8 mb-5 mb-lg-0">
        <div class="post">
          <div class="post-body">
            <?php foreach($showProduk as $row){ ?>
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-6">
                            <img loading="lazy" class="img-fluid" src="<?= base_url('dist/kendaraan/'.$row->foto); ?>" alt="img">
                        </div>
                        <div class="col-md-6">
                            <h4><?=$row->merek.' - '.$row->jenis.' - '.$row->kondisi?></h4>
                            <h4>Rp. <?=number_format($row->harga)?></h4>
                            <h5><i class="far fa-calendar"></i> <?=date('d F Y', strtotime(str_replace('/', '-', $row->created_at)))?></h5>
                            <br>
                            <a href="<?=site_url('produk/detail/'. $row->link)?>" role="button" class="btn btn-danger btn-sm">Lihat Detail</a>
                            <?php if($row->id_user != $this->session->userdata('id')){ ?>
                                <a href="<?=site_url('produk/add_wish/'.$row->id)?>"
                                role="button" class="btn btn-secondary btn-sm
                                <?php if($this->db->get_where('wishlist',array('id_produk'=> $row->id, 'id_user' => $this->session->userdata('id')))->num_rows() > 0 )
                                {
                                    echo "disabled";
                                }
                                ?>
                                ">Wish List</a>
                            <?php } ?>
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"><?=$row->nama?></h4>
                        </div>
                        <div class="card-body" style="font-size:.8em;">
                            <?=$row->alamat?><br>
                            <a href="<?=site_url('dealer/detail/'.$row->id_user)?>" role="button" class="btn btn-danger btn-sm">Cek Dealer</a>
                            <a target="_blank" 
                            href="https://api.whatsapp.com/send?phone=<?=$row->telepon?>&text=Hallo,%20saya%20tertarik%20dengan%20produk%20anda%20pada%20<?=site_url('produk/detail/'.$row->link)?>%0ABolehkan%20saya%20minta%20janji%20bertemu?" 
                            role="button" class="btn btn-success btn-sm">Whatsapp</a>
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
            <form method="post" action="<?=site_url('produk/cari')?>">
                <select class="form-control" name="jenis">
                    <option selected value="mobil">Mobil</option>
                    <option value="motor">Motor</option>
                </select>
                <br>
                <select class="form-control" name="kondisi">
                    <option selected value="baru">Baru</option>
                    <option value="bekas">Bekas</option>
                </select>
                <br>
                <select class="form-control" name="lokasi">
                    <option selected disabled hidden>Lokasi</option>
                    <option>Jakarta</option>
                    <option>Bogor</option>
                    <option>Depok</option>
                    <option>Tanggerang</option>
                    <option>Bekasi</option>
                </select>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <input type="number" placeholder="Min Harga" name="min" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <input type="number" placeholder="Max Harga" name="max" class="form-control">
                    </div>
                </div>
                <br>
                <input type="text" class="form-control" name="cari" placeholder="Cari lebih spesifik">
                <button class="btn btn-danger btn-sm btn-block">Cari Sekarang</button>
                </form>
          </div><!-- Recent post end -->

        </div><!-- Sidebar end -->
      </div><!-- Sidebar Col end -->

        </div>  
    </div>
</section>
<?php $this->load->view('include/foot'); ?>