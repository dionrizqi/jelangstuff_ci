<div class="content-wrapper" style="background:#fff;">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">LIST ONGKIR</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <button class="btn btn-success" data-toggle="modal" data-target="#form_add">TAMBAH ONGKIR</button>
                        </div>
                        <div class="card-body">
                            <div style="overflow-x:auto;">
                                <table class="table table-bordered table-hover" id="table_ongkir" style="text-align:center !important;">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>NAMA</th>
                                            <th>TARIF</th>
                                            <th>OPSI</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">EDIT ONGKIR</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form method="post" action="<?= site_url('dashboard/edit_ongkir') ?>">
                <div class="modal-body" id="show_edit_ongkir">
                </div>
                <div class="modal-footer">
                    <span>Catatan : (<span class="text-danger">*</span>) wajib diisi</span>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="form_add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">TAMBAH ONGKIR BARU</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>

            <form action="<?= site_url('dashboard/add_ongkir') ?>" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nama Ongkir : <a style="color:red;">*</a></label>
                                <div class="form-label-group">
                                    <input type="text" name="nama" class="form-control" placeholder="Nama Ongkir" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tarif : <a style="color:red;">*</a></label>
                                <div class="form-label-group">
                                    <input type="number" name="tarif" class="form-control" placeholder="Tarif Ongkir" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="modal-footer">
                        <span>Catatan : (<span class="text-danger">*</span>) wajib diisi</span>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>