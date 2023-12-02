$("#jnisC").change(function(e) {
	e.preventDefault();
	var i = $(this).val();
	if (i=='all') {
		$("#tableAll").show();
		$("#tableAllOrder").hide();
	}else if(i!=''){
		$.ajax({
		  url: '../processes/getOrderData/',
		  type: 'GET',
		  data: {id:i},
		  dataType: 'html',
		  success:function(html) {
		  	if (html=="") {
		  		$("#tableAllOrder").html("<center><h3>Data Kosong</h3></center>");
		  	}else{
		  		$("#tableAll").hide();
		  		$("#tableAllOrder").html(html);
		  	}
		  }
		});
	}
})