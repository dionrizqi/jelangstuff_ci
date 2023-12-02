</body>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
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
    $(document).on('click', '.tombol-hapus', function(e){
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

        $('#table_faq').DataTable({
            "ajax": {
                url: '<?= base_url() ?>dashboard/get_faq',
                type: 'GET'
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
    function hapus_foto(id, produk){
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
</script>

</html>