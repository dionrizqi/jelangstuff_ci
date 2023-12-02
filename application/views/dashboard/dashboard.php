<div class="content-wrapper" style="background:#fff;">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">DASHBOARD</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                  <h4>TOTAL USER : <?=$this->db->get_where('user', array('level' => 'user'))->num_rows()?></h4>
                  <h4>TOTAL PRODUK DIJUAL : <?=$this->db->get('produk')->num_rows()?></h4>
                </div>
            </div>
        </div>
    </section>


</div>