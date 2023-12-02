<?php $this->load->view('include/head'); ?>
<?php $this->load->view('include/navbar'); ?>
<section id="main-container" class="main-container">
    <div class="container">
        <form method="post" action="<?=site_url('produk/act-jual')?>" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Jenis Kendaraan</label>
                            <select class="form-control" name="jenis" required>
                                <option value="" disabled hidden selected>Pilih Jenis Kendaraan</option>
                                <option value="mobil">Mobil</option>
                                <option value="motor">Motor</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Merek</label>
                            <input type="text" class="form-control" placeholder="contoh: Honda, Toyota, etc" name="merek" required>
                        </div>
                        <div class="form-group">
                            <label>Tipe</label>
                            <input type="text" class="form-control" placeholder="contoh: Civic, Ninja, etc" name="tipe" required>
                        </div>
                        <div class="form-group">
                            <label>Kondisi</label>
                            <select class="form-control" name="kondisi" required>
                                <option value="" disabled hidden selected>Pilih Kondisi</option>
                                <option value="baru">Baru</option>
                                <option value="bekas">Bekas</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Kilometer</label>
                            <input type="number" class="form-control" placeholder="contoh: 100, 200,etc" name="km" required>
                        </div>
                        <div class="form-group">
                            <label>Tahun</label>
                            <input type="number" class="form-control" placeholder="contoh: 2021, 2022, etc" name="tahun" required>
                        </div>
                        <div class="form-group">
                            <label>Warna</label>
                            <input type="text" class="form-control" placeholder="contoh: Hitam, Biru, etc" name="warna" required>
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
                                <option value="" disabled hidden selected>Pilih Transmisi</option>
                                <option>Automatic</option>
                                <option>Manual</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Catatan Penjual</label>
                            <textarea class="form-control" placeholder="contoh: Pajak Mati..." required name="catatan" style="min-height:100px;"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="number" class="form-control" placeholder="contoh: 100000, 20000, etc" name="harga" required>
                        </div>
                        <div class="form-group">
                            <label>Foto</label>
                            <br>
                            <input type="file" name="foto[]" id="fotoProduk" multiple required>
                            <br>
                            <small>Upload sekaligus dengan multiple select gambar</small>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary">Jual Sekarang</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
</section>
<?php $this->load->view('include/foot'); ?>