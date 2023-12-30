</div>
<!-- Javascript Files
  ================================================== -->

<!-- initialize jQuery Library -->
<script src="<?= base_url(''); ?>plugins/jQuery/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="<?= base_url(); ?>plugins/js/swal/sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- Bootstrap jQuery -->
<script src="<?= base_url(''); ?>plugins/bootstrap/bootstrap.min.js" defer></script>
<!-- Slick Carousel -->
<script src="<?= base_url(''); ?>plugins/slick/slick.min.js"></script>
<script src="<?= base_url(''); ?>plugins/slick/slick-animation.min.js"></script>
<!-- Color box -->
<script src="<?= base_url(''); ?>plugins/colorbox/jquery.colorbox.js"></script>
<!-- shuffle -->
<script src="<?= base_url(''); ?>plugins/shuffle/shuffle.min.js" defer></script>
<!-- Google Map API Key-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU" defer></script>
<!-- Google Map Plugin-->
<script src="<?= base_url(''); ?>plugins/google-map/map.js" defer></script>
<!-- Template custom -->
<script src="<?= base_url(''); ?>plugins/js/script.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>


<script type="text/javascript">
  
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
  });
  $("#fotoProduk").change(function() {
    var fileExtension = ['jpeg', 'jpg', 'png'];
    if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
      alert("Only formats are allowed : " + fileExtension.join(', '));
      $("#fotoProduk").val('');
    }
  });

  function beli_produk(stok, harga, berat) {
    var jml = $("#jumlah_beli").val();
    if (jml <= 0 || jml == "" || jml == null) {
      $("#text_jumlah").html("Jumlah tidak boleh kosong!");
    } else if (jml > stok) {
      $("#text_jumlah").html("Jumlah tidak boleh melebihi stok!");
    } else {
      $("#text_jumlah").html("");
      $("#jumlah_modal").val(jml);
      $("#total_beli").val(jml * harga);
      $('#beliModal').modal();
    }
  }
  $("#ongkir").on( "change", function() {
    var jml = $("#jumlah_beli").val();
    var harga = $("#harga").val();
    $("#total_beli").val(jml * harga);
    var total = parseInt($("#total_beli").val());
    var ongkir = parseInt($("#ongkir").val());
    var berat = parseInt($("#berat").val());
    $("#total_beli").val(total + (ongkir * (berat/500)));
  });
  $('.btn-plus, .btn-minus').on('click', function(e) {
    const isNegative = $(e.target).closest('.btn-minus').is('.btn-minus');
    const input = $(e.target).closest('.input-group').find('input');
    if (input.is('input')) {
      input[0][isNegative ? 'stepDown' : 'stepUp']()
    }
  });

  function cek_jumlah(id, stok, harga){
    var jml_k = $(".jumlahKeranjang_"+id).val();
    if (jml_k <= 0 || jml_k == "" || jml_k == null || jml_k < 0) {
      $("#text_jumlah").html("Jumlah tidak boleh kosong!");
      $("#btn_beli").prop("disabled", true);
    } else if (jml_k > stok) {
      $("#text_jumlah").html("Jumlah tidak boleh melebihi stok!");
      $("#btn_beli").prop("disabled", true);
    } else {
      $("#text_jumlah").html("");
      $("#btn_beli").prop("disabled", false);
    }
    $(".totalKeranjang_"+id).html(parseInt(harga * jml_k));
    var sum = 0;
    $('.subKeranjang').each(function()
    {
        sum += parseFloat($(this).text());
    });
    $("#total_keranjang").val(sum);
  }
  $("#ongkir_keranjang").on( "change", function() {
    var total = parseInt($("#total_keranjang").val());
    var ongkir = parseInt($("#ongkir_keranjang").val());
    var berat = parseInt($("#total_berat").val());
    $("#total_keranjang").val(total + (ongkir * (berat/500)));
  });
</script>
</body>

</html>