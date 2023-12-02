// $("#kilo").hide();
$(".loader").hide();
$("#jenis_b").on('change',function(e) {
	e.preventDefault();
	var i = $(this).val();
	if (i=='kiloan') {
		$("#kilo").fadeIn().show();
	}else if (i=='satuan') {
		$("#kilo").fadeOut().hide();
	}
	if ($("#eJenisB").hasClass('has-error')) {
		$("#eJenisB").removeClass('has-error');
	}else{

	}
});
$("#jenis_p").change(function(e) {
	e.preventDefault();
	if ($("#eJenisP").hasClass('has-error')) {
		$("#eJenisP").removeClass('has-error');
	}else{

	}
})
$("#jenis_c").on('change',function (e) {
	e.preventDefault();
	var id = $(this).val(),kg = $("#berat").val(),hrg = $("#hpk").val();
	if (id!='-1') {
		$("#eJenisC").removeClass('has-error');
	}else{

	}
	$.ajax({
		url: '../processes/get_harga_jeniscucian',
		data: {'id_jenisC':id},
		type: 'GET',
		dataType:'json',
		beforeSend:function() {
			$("#hpk").attr('placeholder','Mohon tunggu');
			$("#hpk_view").attr('placeholder','Mohon tunggu');
		},
		success:function(data) {
			var hrgnya = data.harga;
			$("#hpk").val(data.harga);
			$("#hpk_view").val(data.harga);
			var tot = kg*hrgnya;
			if (kg=="") {
				$("#total_view").val("");
				$("#total").val("");
			}else{
				$("#total").val(tot);
				$("#total_view").val(tot);
			}
		}
	});

});
$("#berat").on("keyup",function(e) {
	e.preventDefault();
	var kg = $(this).val(),
	hrgjenisc = $("#hpk").val(),
	itung = kg*hrgjenisc;
	if ($("#jenis_c").val()=='-1') {
		$("#eJenisC").addClass('has-error');
		$("#total_view").attr('placeholder','Pilih jenis cucian terlebih dahulu');
	}else{
		if (kg=="") {
			$("#eBerat").addClass('has-error');
			$("#alBerat").html("Nilai tidak boleh kosong");
		}else if(kg<3){
			$("#eBerat").addClass('has-error');
			$("#alBerat").html("Minimal pemesanan adalah 3kg atau lebih");
		}else if(kg>200){

		}else{
			$("#eBerat").removeClass('has-error');
			$("#alBerat").html("");	
		}
		$("#total").val(itung);
		$("#total_view").val(itung);
		$("#eJenisC").removeClass('has-error');
	}
});
$("#frmOrder").submit(function(e) {
	e.preventDefault();
	var frm = $(this).serialize();
	$.ajax({
	  url: '../processes/act_order/',
	  data: frm,
	  type: 'POST',
	  dataType: 'json',
	  beforeSend:function() {
	  	$(".loader").fadeIn().show();
	  },
	  success:function(data) {
	  	var s = data.success,m=data.msg;

	  	if (m=='form_kosong') {
	  		$("#alFormOrder").fadeIn().removeClass('hide alert-success').addClass('alert-danger').html('<strong>Gagal!</strong> Harap isi semua field di Form.');
	  		$("#frmOrder .form-group-no").addClass('has-error');
	  	}else if(s=='true'){
	  		$("#frmOrder .form-group-no").removeClass('has-error');
	  		$("#alFormOrder").fadeIn().removeClass('hide alert-danger').addClass('alert-success').html('<strong>Berhasil!</strong> Pesanan Anda sudah diterima, silahkan tunggu sampai ada notifikasi dari Staff kami :)');
	  		$("#frmOrder")[0].reset();
	  	}else{
	  		$("#frmOrder .form-group-no").removeClass('has-error');
	  		$("#alFormOrder").fadeIn().removeClass('hide alert-success').addClass('alert-danger').html('<strong>Gagal!</strong> Ada kesalahan sistem dalam memproses pesanan Anda. Silahkan hubungi Staff Admin kami melalui menu Hubungi Kami');
	  		$("#frmOrder")[0].reset();
	  	}
	  	toTop();
	  	$(".loader").fadeOut().hide();
	  	// console.log(s);
	  }
	})
	console.log(frm);
});
function toTop() {
	$('html, body').animate({
		scrollTop: $(".content-header").offset().top
	}, 200);
}