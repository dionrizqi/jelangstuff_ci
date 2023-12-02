<?php $this->load->view('include/head'); ?>
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">

            <div class="card card-signin my-5">
                <div class="card-body">

                    <h3 class="card-title text-center">Login</h3>
                    <form class="form-signin" method="post" action="<?=site_url('auth/act-login')?>">
                        <label>Email Address :</label>
                        <div class="form-label-group">
                            <input type="email" name="email" class="form-control" placeholder="Email address" required>
                        </div>

                        <label>Password :</label>
                        <div class="form-label-group">
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                        <br>

                        <button class="btn btn-lg btn-danger btn-block text-uppercase" type="submit">LOGIN</button>
                        <a href="<?=site_url('/')?>" style="background: #fff;color:#000;" class="btn btn-lg btn-default btn-block text-uppercase" type="submit">KEMBALI</a>
                        
                        <p>Belum Punya Akun?</p>
                        <a href="<?=site_url('auth/register')?>">Daftar Di sini!</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('include/foot'); ?>