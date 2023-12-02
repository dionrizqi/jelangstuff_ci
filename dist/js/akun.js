$(".loadernya").hide();
$("#pInfoForm").submit(function(e) {
	e.preventDefault();
	var frm = $(this).serialize(), a = $("#ava").val();
	$.ajax({
	  url: '../processes/act_updateinfo/?ava='+a,
	  data: frm,
	  type: 'POST',
	  dataType: 'JSON',
	  beforeSend:function() {
	  	console.log(frm);
	  	$(".loadernya ").fadeIn().show();
	  },
	  success:function(data) {
	  	console.log(data);
	  }
	});
})