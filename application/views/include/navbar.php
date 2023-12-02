<!-- Header start -->
<header id="header" class="header-one">
  <div class="bg-white">
    <div class="container">
      <div class="logo-area">
        <div class="row align-items-center">
          <div class="logo col-lg-3 text-center text-lg-left mb-3 mb-md-5 mb-lg-0">
            <a class="d-block" href="<?= site_url('/') ?>">
              <!-- <img loading="lazy" src="images/logo.png" alt="Constra"> -->
              <h1>JelangStuff</h1>
            </a>
          </div><!-- logo end -->

          <div class="col-lg-9 header-right">
            <ul class="top-info-box">
              <li>
                <div class="info-box">
                  <div class="info-box-content">
                    <p class="info-box-title">Butuh Bantuan?</p>
                    <a href="jelangstuff@gmail.com" class="info-box-subtitle">jelangstuff@gmail.com</a>
                  </div>
                </div>
              </li>
              <li>
                <div class="info-box">
                  <div class="info-box-content">
                    <?php if ($this->session->userdata('status') == 'logged_in') { ?>
                      <p class="info-box-title">Selamat Datang <?= $this->session->userdata('nama') ?></p>
                      <?php if ($this->session->userdata('level') == 'admin') {
                      } else { ?><a href="<?= site_url('auth/profile') ?>" class="info-box-subtitle">Profile Saya</a> || <?php } ?>
                      <a href="<?= site_url('auth/logout') ?>" class="info-box-subtitle">Logout</a>
                    <?php } else { ?>
                      <p class="info-box-title">Sudah Punya Akun?</p>
                      <a href="<?= site_url('auth') ?>" class="info-box-subtitle">Masuk</a>
                    <?php } ?>
                  </div>
                </div>
              </li>
              <li class="last">
                <div class="info-box last">
                  <div class="info-box-content">
                    <?php if ($this->session->userdata('status') == 'logged_in') { ?>
                      <p class="info-box-title">Cek Whistlist kamu?</p>
                      <a href="<?= site_url('wishlist') ?>" class="info-box-subtitle">Disini <div class="badge badge-danger"><?= $this->db->get_where('wishlist', array('id_user' => $this->session->userdata('id')))->num_rows() ?></div></a>
                    <?php } else { ?>
                      <p class="info-box-title">Belum Punya Akun?</p>
                      <a href="<?= site_url('auth/register') ?>" class="info-box-subtitle">Daftar</a>
                    <?php } ?>
                  </div>
                </div>
              </li>
              <li class="header-get-a-quote">
                <a role="button" class="btn btn-primary" <?php if ($this->session->userdata('status') == 'logged_in') { ?> href="<?= site_url('keranjang') ?>" <?php } else { ?> href="<?= site_url('auth') ?>" <?php } ?> class="info-box-subtitle">
                Cek Keranjang <div class="badge badge-secondary"><?= $this->db->get_where('keranjang', array('id_user' => $this->session->userdata('id')))->num_rows() ?></div>
              </a>
              </li>
            </ul><!-- Ul end -->
          </div><!-- header right end -->
        </div><!-- logo area end -->

      </div><!-- Row end -->
    </div><!-- Container end -->
  </div>

  <div class="site-navigation">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <nav class="navbar navbar-expand-lg navbar-dark p-0">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div id="navbar-collapse" class="collapse navbar-collapse">
              <ul class="nav navbar-nav mr-auto">
                <li class="nav-item"><a class="nav-link" href="<?= site_url('/') ?>">Home</a></li>

                <li class="nav-item"><a class="nav-link" href="<?= site_url('produk') ?>">Semua Produk</a></li>

                <li class="nav-item"><a class="nav-link" href="<?= site_url('faq') ?>">FAQ</a></li>

                <li class="nav-item"><a class="nav-link" href="<?= site_url('kontak') ?>">Kontak</a></li>
                <?php if ($this->session->userdata('status') == 'logged_in') { ?>
                  <li class="nav-item"><a class="nav-link" href="<?= site_url('riwayat') ?>">Riwayat Belanja</a></li>
                <?php } ?>
                <?php if ($this->session->userdata('status') == 'logged_in' && $this->session->userdata('level') == 'admin') { ?>
                  <li class="nav-item"><a class="nav-link" href="<?= site_url('dashboard') ?>">Dashboard</a></li>
                <?php } else { ?>

                <?php } ?>

              </ul>
            </div>
          </nav>
        </div>
        <!--/ Col end -->
      </div>
      <!--/ Row end -->

    </div>
    <!--/ Container end -->

  </div>
  <!--/ Navigation end -->
</header>
<!--/ Header end -->