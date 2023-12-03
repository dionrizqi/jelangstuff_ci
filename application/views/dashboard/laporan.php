<div class="content-wrapper" style="background:#fff;">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">LIST LAPORAN</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Filter Tanggal</label>
                                    <input class="form-control daterange" type="text" onchange="change_laporan()" name="due_date" id="date_laporan" placeholder="Select Range" autocomplete="off" />
                                </div>
                            </div>
                            <br>
                            <div style="overflow-x:auto;">
                                <table class="table table-bordered table-hover" id="table_laporan" style="text-align:center !important;">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>PRODUK</th>
                                            <th>USER</th>
                                            <th>JUMLAH</th>
                                            <th>TARIF ONGKIR</th>
                                            <th>TOTAL</th>
                                            <th>STATUS</th>
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

<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">DETAIL USER</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
                <div class="modal-body" id="show_detail_user">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
        </div>
    </div>
</div>