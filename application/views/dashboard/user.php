<div class="content-wrapper" style="background:#fff;">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">LIST USER</h1>
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
                            <button class="btn btn-success" data-toggle="modal" data-target="#form_add">TAMBAH USER</button>
                        </div>
                        <div class="card-body">
                            <div style="overflow-x:auto;">
                                <table class="table table-bordered table-hover" id="table_user" style="text-align:center !important;">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>NAMA</th>
                                            <th>EMAIL</th>
                                            <th>TELEPON</th>
                                            <th>ALAMAT</th>
                                            <th>LEVEL</th>
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
                <h4 class="modal-title" id="myModalLabel">EDIT USER</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form method="post" action="<?= site_url('dashboard/act_edit_user') ?>">
                <div class="modal-body" id="show_edit_user">
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
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">TAMBAH USER BARU</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>

            <form action="<?= site_url('dashboard/add_user') ?>" method="post">
                <div class="modal-body">
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
                    <br>
                    <div class="modal-footer">
                        <span>Catatan : (<span class="text-danger">*</span>) wajib diisi</span>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>