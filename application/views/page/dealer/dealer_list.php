<?php $this->load->view('include/head'); ?>
<?php $this->load->view('include/navbar'); ?>
<section id="main-container" class="main-container">
    <div class="container">
        <div class="row">
        <div class="col-lg-8 mb-5 mb-lg-0">
        <div class="post">
          <div class="post-body">
            <?php foreach($showDealer as $row){ ?>
            <div class="row">
                <div class="col-md-8">
                    <h3><?=$row->nama?></h3>
                    <?=$row->alamat?><br>
                    <?=$row->telepon?><br>
                    Total Produk : <?=$row->total?> <br><br>
                    <a href="<?=site_url('dealer/detail/'.$row->id)?>" class="btn btn-danger btn-sm">Lihat Semua Produk</a>
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
            <form method="post" action="<?=site_url('dealer/cari')?>">
                <select class="form-control" name="lokasi">
                    <option selected disabled hidden>Lokasi</option>
                    <option>Jakarta</option>
                    <option>Bogor</option>
                    <option>Depok</option>
                    <option>Tanggerang</option>
                    <option>Bekasi</option>
                </select>
                <br>
                <input type="text" name="cari" class="form-control" placeholder="Cari lebih spesifik">
                <button class="btn btn-danger btn-sm btn-block">Cari Sekarang</button>
            </form>
          </div><!-- Recent post end -->

        </div><!-- Sidebar end -->
      </div><!-- Sidebar Col end -->

        </div>  
    </div>
</section>
<?php $this->load->view('include/foot'); ?>