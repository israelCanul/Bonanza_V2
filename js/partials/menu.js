function initMenu(){
	var actual=false;
	$("#show_menu_movil").on("click",function(){
		$("#menu_movil").switchClass("noactivo",'activo',1000);
	});
	$("#hide_menu_movil").on("click",function(){
		$("#menu_movil").switchClass('activo',"noactivo",1000);
	});
	$(window).resize(function(){
		menuResponsive();		
	});
	crearMenu();
	//menuResponsive();
		$(".label_original").hover(
			function(){
				that=$(this);
				$(this).addClass('actual');
				setTimeout(function (){
					if(that.hasClass('actual')){
						var index=$(that).data('index');
						$(".itemsOcultos.activo").switchClass("activo",'inactivo',200);
						$("#label_copia_"+index).switchClass("inactivo",'activo',300);						
					}
				}, 400);				

			},function(){
				$(this).removeClass('actual');
				var index=$(this).data('index');
				$(".itemsOcultos.activo").switchClass("activo",'inactivo',200);
		});	
}

function menuResponsive(){
	
	var hijos=$("#yw0").children('div');

	var ancho=$("#yw0").width();
	var alto=$("#yw0").height();
	var cont=0;
	$("#yw0").children('div').map(function(li){
		var anchoDiv=ancho/hijos.length;
		$(hijos[li]).css('width',(anchoDiv.toFixed()-2)+"px");
	});
}

function crearMenu(){
	var hijos=$("#yw0").children('div');

	var ancho=$("#yw0").width();
	var alto=$("#yw0").height();
	var cont=0;
	$("#yw0").children('div').map(function(li){
		var anchoDiv=ancho/hijos.length;
		$(hijos[li]).css('width',(anchoDiv.toFixed()-5)+"px");
		$(hijos[li]).addClass('item_menu');
		var labelA=$(hijos[li]).find('a');
		var labelOriginal=$(hijos[li]).find('label');
		$(labelOriginal).addClass('label_original');
		$(labelOriginal).attr('data-index',cont);
		var label='<label class="inactivo itemsOcultos" id="label_copia_'+cont+'">'+$(labelOriginal).html()+'</laebl>';
		labelA.append(label);
		
	cont++;
	});
}