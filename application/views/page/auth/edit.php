<?php $this->load->view('include/head'); ?>
<?php $this->load->view('include/navbar'); ?>
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-8 mx-auto">

            <div class="card card-signin my-5">
                <div class="card-body">

                    <h3 class="card-title text-center">Ubah Akun</h3>
                    <form class="form-signin" method="post" action="<?=site_url('auth/act-edit')?>">
                        <div class="row">
                            <div class="col-md-6">
                            <input type="hidden" name="id" value="<?=$detail['id']?>">
                                <label>Nama :</label>
                                <div class="form-label-group">
                                    <input type="text" name="nama" class="form-control" placeholder="Nama" value="<?=$detail['nama']?>" required>
                                </div>

                                <label>Email :</label>
                                <div class="form-label-group">
                                    <input type="email" name="email" class="form-control" placeholder="Email address" value="<?=$detail['email']?>" required>
                                </div>

                                <label>Password :</label>
                                <div class="form-label-group">
                                    <input type="password" name="password" class="form-control" placeholder="Password" >
                                    <sup><b>Kosongkan password untuk menggunakan password lama</b></sup>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <label>Nomor Telepon :</label>
                                <div class="form-label-group">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">62</div>
                                    </div>
                                    <input type="number" name="telp" class="form-control" placeholder="Nomor Telepon" value="<?=$detail['telepon']?>" required>
                                </div>
                                </div>
                                <label>Alamat :</label>
                                <div class="form-label-group">
                                    <textarea class="form-control" name="alamat" placeholder="Alamat" style="min-height:120px;" required><?=$detail['alamat']?></textarea>
                                </div>
                            </div>
                        </div>
                        
							<?php if ($this->session->flashdata('success')){ ?>
                                <br>
								<div class="alert alert-success">
									<?php echo $this->session->flashdata('success'); ?>
								</div>
							<?php }else if ($this->session->flashdata('error')) { ?>
                                <br>
								<div class="alert alert-danger">
									<?php echo $this->session->flashdata('error'); ?>
								</div>
							<?php } ?>

                        <br>

                        <button class="btn btn-lg btn-danger btn-block text-uppercase" type="submit">Ubah</button>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('include/foot'); ?>