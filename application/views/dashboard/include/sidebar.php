<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link" style="background:white;">
    <center><span class="brand-text font-weight-light" style="color:#000;"><b>DASHBOARD</b></span></center>
    <!-- <span class="brand-text font-weight-light">Dashboard</span> -->
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <span style="align:center;color:white;">WELCOME ADMIN</span>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="<?= site_url('dashboard') ?>" class="nav-link">
            <i class="nav-icon fas fa-home"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-archive"></i>
            <p>
              Master Data
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= site_url('dashboard/kategori') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Kategori</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= site_url('dashboard/ongkir') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Ongkir</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= site_url('dashboard/faq') ?>" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>FAQ</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="<?= site_url('dashboard/produk') ?>" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              List Produk
            </p>
          </a>
        </li>
        
        <li class="nav-item">
          <a href="<?= site_url('dashboard/pembelian') ?>" class="nav-link">
            <i class="nav-icon fas fa-clipboard"></i>
            <p>
              List Pembelian
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= site_url('dashboard/user') ?>" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>
              List User
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= site_url('/') ?>" class="nav-link">
            <i class="nav-icon fas fa-home"></i>
            <p>
              Home
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= site_url('auth/logout') ?>" class="nav-link">
            <i class="nav-icon fas fa-power-off"></i>
            <p>
              Logout
            </p>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>