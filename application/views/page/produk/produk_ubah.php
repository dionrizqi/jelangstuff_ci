<?php $this->load->view('include/head'); ?>
<?php $this->load->view('include/navbar'); ?>
<section id="main-container" class="main-container">
    <div class="container">
        <form method="post" action="<?=site_url('produk/act-ubah')?>" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <input type="hidden" name="id" value="<?=$produk['id']?>">
                        <div class="form-group">
                            <label>Jenis Kendaraan</label>
                            <select class="form-control" name="jenis" required>
                                <option value="<?=$produk['kendaraan']?>" hidden selected><?=ucfirst($produk['kendaraan'])?></option>
                                <option value="mobil">Mobil</option>
                                <option value="motor">Motor</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Merek</label>
                            <input type="text" class="form-control" placeholder="contoh: Honda, Toyota, etc" value="<?=$produk['merek']?>" name="merek" required>
                        </div>
                        <div class="form-group">
                            <label>Tipe</label>
                            <input type="text" class="form-control" placeholder="contoh: Civic, Ninja, etc" value="<?=$produk['jenis']?>" name="tipe" required>
                        </div>
                        <div class="form-group">
                            <label>Kondisi</label>
                            <select class="form-control" name="kondisi" required>
                                <option value="<?=$produk['kondisi']?>" hidden selected><?=ucfirst($produk['kondisi'])?></option>
                                <option value="baru">Baru</option>
                                <option value="bekas">Bekas</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Kilometer</label>
                            <input type="number" class="form-control" placeholder="contoh: 100, 200,etc" value="<?=$produk['kilometer']?>" name="km" required>
                        </div>
                        <div class="form-group">
                            <label>Tahun</label>
                            <input type="number" class="form-control" placeholder="contoh: 2021, 2022, etc" value="<?=$produk['tahun']?>" name="tahun" required>
                        </div>
                        <div class="form-group">
                            <label>Warna</label>
                            <input type="text" class="form-control" placeholder="contoh: Hitam, Biru, etc" value="<?=$produk['warna']?>" name="warna" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Transmisi</label>
                            <select class="form-control" name="transmisi" required>
                                <option value="<?=$produk['transmisi']?>" hidden selected><?=$produk['transmisi']?></option>
                                <option>Automatic</option>
                                <option>Manual</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Catatan Penjual</label>
                            <textarea class="form-control" placeholder="contoh: Pajak Mati..." required name="catatan" style="min-height:100px;"><?=$produk['notes']?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="number" class="form-control" placeholder="contoh: 100000, 20000, etc" value="<?=$produk['harga']?>" name="harga" required>
                        </div>
                        <div class="form-group">
                            <label>Foto</label><br>
                            Klik foto dibawah untuk menghapus
                            <br>
                            <?php foreach($foto as $row){ ?>
                                <a href="<?=site_url('produk/hapus_foto/'.$row->id)?>" data-toggle="tooltip" title="Hapus"><img src="<?=base_url('dist/kendaraan/'.$row->foto)?>" style="height:50px;width:100px;"></a> &nbsp;&nbsp;
                            <?php } ?>
                            <br>
                            <br>
                            <input type="file" name="foto[]" id="fotoProduk" multiple >
                            <br>
                            <small>Upload sekaligus dengan multiple select gambar</small>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary">Ubah</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
</section>
<?php $this->load->view('include/foot'); ?>