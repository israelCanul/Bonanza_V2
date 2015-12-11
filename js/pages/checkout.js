$(window).ready(function(){


	$("#formPago").validate({
	  submitHandler: function(form) {
	  	var pasa=true;
	    if($("#card_month").val()==''){
	    	Materialize.toast('<span >Set a valid Expiration month</span>', 4000,'','');
	    	var padre=$("#card_month").parent();
	    	var nombre=$("#card_month").attr('id');
	    	$("#card_month-error").remove();
	    	$(padre).append('<label id="card_month-error" class="error" for="card_month">This field is required.</label>');	    	
	    	pasa=false;
	    }
	    if($("#pais").val()==''){
	    	Materialize.toast('<span >Set a valid Country</span>', 4000,'','');
	    	var padre=$("#pais").parent();
	    	var nombre=$("#pais").attr('id');
	    	$("#pais-error").remove();
	    	$(padre).append('<label id="pais-error" class="error" for="pais">This field is required.</label>');	    	
	    	pasa=false;
	    }

	    if(!$("#chkPoliticas").prop('checked')){
			$("#btnEnviar").removeClass('hide');
			 Materialize.toast('<span >Check the reservation policies to continue..</span>', 6000,'','');
			pasa=false;
		}

		if($("#card_year").val()==''){
	    	Materialize.toast('<span >Set a valid Expiration Year</span>', 4000,'','');
	    	var padre=$("#card_year").parent();
	    	var nombre=$("#card_year").attr('id');
	    	$("#card_year-error").remove();
	    	$(padre).append('<label id="card_month-error" class="error" for="card_month">This field is required.</label>');
			pasa=false;			
		}

	    if(pasa){
	    	form.submit();
	   	} 
	    
	  }
	});

	$("#chkPoliticas").on('click',function(){
		if($(this).prop('checked')){
			$("#btnEnviar").removeClass('hide');
		}else{
			$("#btnEnviar").addClass('hide');
		}
	});


});