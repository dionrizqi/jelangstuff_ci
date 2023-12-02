<div class="content-wrapper" style="background:#fff;">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">LIST PRODUK</h1>
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
                            <button class="btn btn-success" data-toggle="modal" data-target="#form_add">TAMBAH PRODUK</button>
                        </div>
                        <div class="card-body">
                            <div style="overflow-x:auto;">
                                <table class="table table-bordered table-hover" id="table_produk" style="text-align:center !important;">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>NAMA</th>
                                            <th>FOTO</th>
                                            <th>KATEGORI</th>
                                            <th>HARGA</th>
                                            <th>BERAT (GR)</th>
                                            <th>DESKRIPSI</th>
                                            <th>STOK</th>
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
                <h4 class="modal-title" id="myModalLabel">EDIT PRODUK</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form method="post" action="<?= site_url('dashboard/edit_produk') ?>" enctype="multipart/form-data">
                <div class="modal-body" id="show_edit_produk">
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
                <h4 class="modal-title" id="myModalLabel">TAMBAH PRODUK BARU</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>

            <form action="<?= site_url('dashboard/add_produk') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Produk : <a style="color:red;">*</a></label>
                                <div class="form-label-group">
                                    <input type="text" name="nama" class="form-control" placeholder="Nama Produk" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Harga Produk (Rp) : <a style="color:red;">*</a></label>
                                <div class="form-label-group">
                                    <input type="number" name="harga" class="form-control" placeholder="Harga Produk" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Berat (gr) : <a style="color:red;">*</a></label>
                                <div class="form-label-group">
                                    <input type="number" name="berat" class="form-control" placeholder="Berat Produk" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Stok : <a style="color:red;">*</a></label>
                                <div class="form-label-group">
                                    <input type="number" name="stok" class="form-control" placeholder="Jumlah Stok" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Kategori : <a style="color:red;">*</a></label>
                                <select class="select_kategori" name="kategori" required>
                                    <option></option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Deskripsi : <a style="color:red;">*</a></label>
                                <textarea class="form-control" name="deskripsi" placeholder="Deskripsi" style="min-height:120px;" required></textarea>
                            </div>
                            <div class="form-group">
                                <label>Foto : <a style="color:red;">*</a></label>
                                <br>
                                <input type="file" name="foto[]" id="fotoProduk" multiple required>
                                <br>
                                <small>Upload sekaligus dengan multiple select gambar</small>
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