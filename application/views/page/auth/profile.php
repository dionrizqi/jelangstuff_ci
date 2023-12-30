<?php $this->load->view('include/head'); ?>
<?php $this->load->view('include/navbar'); ?>
<section id="main-container" class="main-container">
    <div class="aboutus konten1">
        <div class="container">
            <div class="col-md-12">
                <h1 class="">PROFILE SAYA</h1>
                <form id="form-submit" class="form-signin" method="post" action="<?= site_url('auth/act-edit') ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="hidden" value="<?=$detail['id']?>" name="id">
                                <div class="form-group">
                                    <label>Nama : <a style="color:red;">*</a></label>
                                    <input value="<?=$detail['nama']?>" type="text" name="nama" class="form-control" placeholder="Nama" required>
                                </div>
                                <div class="form-group">
                                    <label>Email : <a style="color:red;">*</a></label>
                                    <input value="<?=$detail['email']?>" type="email" name="email" class="form-control" placeholder="Email address" required>
                                </div>
                                <div class="form-group">
                                    <label>Password : </label>
                                    <input type="password" name="password" class="form-control" placeholder="Password">
		                            <p>Kosongkan password untuk menggunakan password lama</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nomor Telepon : <a style="color:red;">*</a></label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">62</div>
                                        </div>
                                        <input value="<?=substr($detail['telepon'], 2);?>" type="number" name="telp" class="form-control" placeholder="Nomor Telepon" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Alamat : <a style="color:red;">*</a></label>
                                    <textarea class="form-control" name="alamat" placeholder="Alamat" style="min-height:120px;" required><?=$detail['alamat']?></textarea>
                                </div>

                            </div>
                        </div>
                        <br>
                        <span>Catatan : (<span class="text-danger">*</span>) wajib diisi</span>
                        <button class="btn btn-lg btn-danger btn-block text-uppercase tombol_confirm" type="submit">UBAH</button>
                    </form>             

            </div>
        </div>
    </div>
</section>

<?php $this->load->view('include/foot'); ?>