<?php $this->load->view('include/head'); ?>
<?php $this->load->view('include/navbar'); ?>
<section id="main-container" class="main-container">
    <div class="aboutus konten1">
        <div class="container">
            <div class="col-md-12">
                <?php if ($this->db->get_where('beli', array('id_user' => $this->session->userdata('id')))->num_rows() > 0) { ?>
                    <h2 class="">RIWAYAT BELANJA</h2>
                    <div style="overflow-x: auto;">
                        <table class="datatables table table-bordered" style="text-align:center !important;">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>PRODUK</th>
                                    <th>JUMLAH</th>
                                    <th>TARIF ONGKIR</th>
                                    <th>TOTAL</th>
                                    <th>STATUS</th>
                                    <th>TIMESTAMP</th>
                                    <th>OPSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no=1;foreach($pembelian as $row){ ?>
                                <tr>
                                    <td><?=$no++?></td>
                                    <td><a href="<?= site_url('produk/detail/' . $row->link) ?>" target="_blank" style="color:blue;"><b><?= $row->nama_produk ?></b></a></td>
                                    <td><?=$row->jumlah?></td>
                                    <td><?=$row->tarif_ongkir?></td>
                                    <td><?=$row->total?></td>
                                    <td><?=$row->status?></td>
                                    <td><?=$row->created_at?></td>
                                    <td><a href="<?=site_url('riwayat/detail/'.$row->id)?>" role="button" class="btn-sm btn btn-success"><i class="fas fa-icon fa-eye"></i></a></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                <?php } else { ?>
                    <h2>RIWAYAT BELANJA KAMU MASIH KOSONG</h2>
                    <h4>MULAI BELANJA SEKARANG</h4>
                    <a href="<?= site_url('produk') ?>" class="btn btn-danger">CEK PRODUK</a>
                <?php } ?>

            </div>
        </div>
    </div>
</section>

<?php $this->load->view('include/foot'); ?>