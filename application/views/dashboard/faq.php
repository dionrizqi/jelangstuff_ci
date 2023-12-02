<div class="content-wrapper" style="background:#fff;">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">LIST FAQ</h1>
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
                            <button class="btn btn-success" data-toggle="modal" data-target="#form_add">TAMBAH FAQ</button>
                        </div>
                        <div class="card-body">
                            <div style="overflow-x:auto;">
                                <table class="table table-bordered table-hover" id="table_faq" style="text-align:center !important;">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>JUDUL</th>
                                            <th>ISI</th>
                                            <th>TIMESTAMP</th>
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
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">EDIT FAQ</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form method="post" action="<?= site_url('dashboard/act_edit_faq') ?>">
                <div class="modal-body" id="show_edit_faq">
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
                <h4 class="modal-title" id="myModalLabel">TAMBAH FAQ</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>

            <form action="<?= site_url('dashboard/add_faq') ?>" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>JUDUL : <a style="color:red;">*</a></label>
                                <input type="text" name="judul" class="form-control" placeholder="Judul" required>
                            </div>
                            <div class="form-group">
                                <label>ISI : <a style="color:red;">*</a></label>
                                <textarea class="form-control" name="isi" placeholder="Isi" required></textarea>
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
</div>