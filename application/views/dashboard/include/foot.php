</body>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="<?= base_url(); ?>dist/js/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js" integrity="sha512-ubuT8Z88WxezgSqf3RLuNi5lmjstiJcyezx34yIU2gAHonIi27Na7atqzUZCOoY4CExaoFumzOsFQ2Ch+I/HCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="<?= base_url(); ?>plugins/js/swal/sweetalert2.all.min.js"></script>

<script>
    var uri = 0;
    <?php if ($this->uri->segment(3) == true) { ?>
        uri = <?= $this->uri->segment(3) ?>;
    <?php } ?>
    console.log(uri);

    $('.daterange').daterangepicker({
        opens: 'left',
        autoUpdateInput: false,
        locale: {
            format: 'YYYY-MM-DD',
            cancelLabel: 'Clear'
        }
    });
    $('.daterange').on('apply.daterangepicker', function(ev, picker) {
        $(this).val(picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format('YYYY-MM-DD')).change();
    });
    $('.daterange').on('cancel.daterangepicker', function(ev, picker) {
        $(this).val('').change();
    });

    $(document).on('click', '.tombol-hapus', function(e) {
        e.preventDefault();
        var href = $(this).attr('href');

        Swal({
            title: 'Anda yakin?',
            text: "Data akan dihapus secara permanen!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#e74c3c',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Delete'
        }).then((result) => {
            if (result.value) {
                document.location.href = href;
            }
        })

    });

    $(document).on('click', '.tombol-confirm', function(e) {
        e.preventDefault();
        var href = $(this).attr('href');

        Swal({
            title: 'Anda yakin?',
            text: "Aksi ini tidak dapat dikembalikan!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#e74c3c',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Submit'
        }).then((result) => {
            if (result.value) {
                document.location.href = href;
            }
        })

    });




    $(document).ready(function() {
        $('.datatables').DataTable();
        $('#table_user').DataTable({
            "ajax": {
                url: '<?= base_url() ?>dashboard/get_user',
                type: 'GET'
            },
        });

        $('#table_produk').DataTable({
            "ajax": {
                url: '<?= base_url() ?>dashboard/get_produk',
                type: 'GET'
            },
        });

        $('#table_kategori').DataTable({
            "ajax": {
                url: '<?= base_url() ?>dashboard/get_kategori',
                type: 'GET'
            },
        });

        $('#table_ongkir').DataTable({
            "ajax": {
                url: '<?= base_url() ?>dashboard/get_ongkir',
                type: 'GET'
            },
        });

        $('#table_faq').DataTable({
            "ajax": {
                url: '<?= base_url() ?>dashboard/get_faq',
                type: 'GET'
            },
        });

        $('#table_pembelian').DataTable({
            "ajax": {
                url: '<?= base_url() ?>dashboard/get_pembelian',
                type: 'GET'
            },
        });

        $('#table_laporan').DataTable({
                destroy: true,
            "ajax": {
                url: '<?= base_url() ?>dashboard/get_laporan',
                type: 'GET'
            },
        });


        $('#table_history').DataTable({
            "ajax": {
                data: {
                    id: uri
                },
                url: '<?= base_url() ?>dashboard/get_history_pembelian',
                type: 'POST'
            },
        });

        $('.select_kategori').select2({
            width: '100%',
            placeholder: 'Pilih Kategori',
            theme: "bootstrap4",
            ajax: {
                dataType: 'json',
                delay: 250,
                url: '<?= site_url('dashboard/select_kategori') ?>',
                data: function(params) {
                    return {
                        searchTerm: params.term
                    }
                },
                processResults: function(data) {
                    var results = [];
                    $.each(data, function(index, item) {
                        results.push({
                            id: item.id,
                            text: item.nama
                        });
                    });
                    return {
                        results: results
                    };
                }
            }
        });

    });

    function edit_kategori(id) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>dashboard/show_edit_kategori",
            data: {
                id: id
            },
            success: function(data) {
                $("#show_edit_kategori").html(data);
            }
        });
    }

    function edit_user(id) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>dashboard/show_edit_user",
            data: {
                id: id
            },
            success: function(data) {
                $("#show_edit_user").html(data);
            }
        });
    }

    function user_modal(id) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>dashboard/show_detail_user",
            data: {
                id: id
            },
            success: function(data) {
                $("#show_detail_user").html(data);
            }
        });
    }

    function edit_produk(id) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>dashboard/show_edit_produk",
            data: {
                id: id
            },
            success: function(data) {
                $("#show_edit_produk").html(data);
            }
        });
    }

    function edit_faq(id) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>dashboard/show_edit_faq",
            data: {
                id: id
            },
            success: function(data) {
                $("#show_edit_faq").html(data);
            }
        });
    }

    function edit_ongkir(id) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>dashboard/show_edit_ongkir",
            data: {
                id: id
            },
            success: function(data) {
                $("#show_edit_ongkir").html(data);
            }
        });
    }

    function hapus_foto(id, produk) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>dashboard/hapus_foto",
            data: {
                id: id
            },
            success: function(data) {
                edit_produk(produk);
            }
        });
    }

    function change_laporan() {
        $("#table_laporan").dataTable().fnDestroy();
        var awal = $("#date_laporan").val().slice(0, 11);
        var akhir = $("#date_laporan").val().slice(12, 23);
        $('#table_laporan').DataTable({
            "ajax": {
                destroy: true,
                data: {
                    awal: awal,
                    akhir: akhir
                },
                url: '<?= base_url() ?>dashboard/get_laporan_filter',
                type: 'POST'
            },
        });
        $('#table_laporan').DataTable().ajax.reload();
    }
</script>

</html>