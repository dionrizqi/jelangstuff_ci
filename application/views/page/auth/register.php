<?php $this->load->view('include/head'); ?>
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-8 mx-auto">

            <div class="card card-signin my-5">
                <div class="card-body">

                    <h3 class="card-title text-center">Daftar</h3>
                    <form id="form-submit" class="form-signin" method="post" action="<?= site_url('auth/act-register') ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nama : <a style="color:red;">*</a></label>
                                    <input type="text" name="nama" class="form-control" placeholder="Nama" required>
                                </div>
                                <div class="form-group">
                                    <label>Email : <a style="color:red;">*</a></label>
                                    <input type="email" name="email" class="form-control" placeholder="Email address" required>
                                </div>
                                <div class="form-group">
                                    <label>Password : <a style="color:red;">*</a></label>
                                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nomor Telepon : <a style="color:red;">*</a></label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">62</div>
                                        </div>
                                        <input type="number" name="telp" class="form-control" placeholder="Nomor Telepon" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Alamat : <a style="color:red;">*</a></label>
                                    <textarea class="form-control" name="alamat" placeholder="Alamat" style="min-height:120px;" required></textarea>
                                </div>

                            </div>
                        </div>

                        <?php if ($this->session->flashdata('success')) { ?>
                            <br>
                            <div class="alert alert-success">
                                <?php echo $this->session->flashdata('success'); ?>
                            </div>
                        <?php } else if ($this->session->flashdata('error')) { ?>
                            <br>
                            <div class="alert alert-danger">
                                <?php echo $this->session->flashdata('error'); ?>
                            </div>
                        <?php } ?>

                        <br>
                        <span>Catatan : (<span class="text-danger">*</span>) wajib diisi</span>
                        <button class="btn btn-lg btn-danger btn-block text-uppercase tombol_confirm" type="submit">DAFTAR</button>
                        <a href="<?= site_url('/') ?>" style="background: #fff;color:#000;" class="btn btn-lg btn-default btn-block text-uppercase" type="submit">KEMBALI</a>

                        <p>Sudah Punya Akun?</p>
                        <a href="<?= site_url('auth') ?>">Login Di sini!</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('include/foot'); ?>