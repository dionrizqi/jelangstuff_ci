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


<script type="text/javascript">
  $("#fotoProduk").change(function() {
    var fileExtension = ['jpeg', 'jpg', 'png'];
    if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
      alert("Only formats are allowed : " + fileExtension.join(', '));
      $("#fotoProduk").val('');
    }
  });

  function beli_produk(stok, harga, berat) {
    var jml = $("#jumlah_beli").val();
    if (jml == 0 || jml == "" || jml == null) {
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
    var total = parseInt($("#total_beli").val());
    var ongkir = parseInt($("#ongkir").val());
    var berat = parseInt($("#berat").val());
    $("#total_beli").val(total + (ongkir * (berat/500)));
  });
</script>
</body>

</html>