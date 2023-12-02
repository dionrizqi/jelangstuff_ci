<?php $this->load->view('include/head'); ?>
<?php $this->load->view('include/navbar'); ?>
<section id="main-container" class="main-container">
    <div class="container">
        <div class="row">
        <div class="col-lg-7 mb-5 mb-lg-0">
        <div class="post">
          <div class="post-body">
            <?php foreach($showProduk as $row){ ?>
            <div class="row">
                <div class="col-md-12">
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
                            <a href="<?site_url('produk/add_wish/'.$row->id)?>"
                                role="button" class="btn btn-secondary btn-sm
                                <?php if($this->db->get_where('wishlist',array('id_produk'=> $row->id, 'id_user' => $this->session->userdata('id')))->num_rows() > 0 )
                                {
                                    echo "disabled";
                                }
                                ?>
                                ">Wish List</a>
                        </div>
                    </div>
                </div>
                
            </div>
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

      <div class="col-lg-5">

      <div class="card" style="height:auto;">
                    <div class="card-body">
                        <h2><?=$detail['nama']?></h2>
                        <!-- <p>Seller Mobil Terpercaya Se-JABODETABEK. Menyediakan berbagai macam Merek dan Jenis Mobil</p> -->
                        <table style="width:100%;height:auto; padding:2px">
                            <tr>
                                <td>Bergabung Semenjak</td>
                                <td>:</td>
                                <td style="text-align:right"><?=date('d F Y', strtotime(str_replace('/', '-', $detail['created_at'])))?></td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>
                                <td style="text-align:right"><?=$detail['alamat']?></td>
                            </tr>
                            <tr>
                                <td>Nomor Telepon</td>
                                <td>:</td>
                                <td style="text-align:right"><?=$detail['telepon']?></td>
                            </tr>
                            <tr>
                                <td>Total Produk</td>
                                <td>:</td>
                                <td style="text-align:right"><?=$detail['total']?></td>
                            </tr>
                        </table>

                    </div>
                </div>
      </div><!-- Sidebar Col end -->

        </div>  
    </div>
</section>
<?php $this->load->view('include/foot'); ?>