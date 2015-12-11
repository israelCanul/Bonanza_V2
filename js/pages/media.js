$(window).ready(function(){
	var cont = 0;
	var slideActual=0;
	var cantAvance=$("#wrapGaleria").width();
	var widthContainer = $("#container").width() - $("#wrapGaleria").width();
	var contSlide = widthContainer / cantAvance ;
	var decimal = contSlide - Math.floor(contSlide)
	var topContainer=$("#container").offset().top + $("#wrapGaleria").height()-50;
	var posRedes=topContainer;	

	var wall= new freewall('#container');
	wall.reset({
	  selector: '.brick',
	  animate:true,
	  cellW: function(width) {
	      var cellWidth = width / 3;
	      return cellWidth - 20;
	    },
	  cellH: 160,
	  fixSize:1,
	});	
	wall.fitZone(800, 600);
	$('#container').css('left','0px');
	regraficar();
});

$(window).resize(function(){
	$('#container').css('left','0px');
	regraficar();
});


function regraficar(){
	cont = 0;
	slideActual=0;
	cantAvance=$("#wrapGaleria").width();
	widthContainer = $("#container").width() - $("#wrapGaleria").width();
	contSlide = widthContainer / cantAvance ;
	decimal = contSlide - Math.floor(contSlide)
	topContainer=$("#container").offset().top + $("#wrapGaleria").height()-50;
	posRedes=topContainer;
	console.log(decimal);
	$(".redesMedia").css('top',posRedes);
	//console.log(contSlide);
	

	$('#wrapGaleria').on("swiperight",function(){//contenedores de video 

 		if(cont > 0){

 			if(cont > contSlide){
 				var avanceDecimal = decimal * cantAvance;
 				slideActual+= avanceDecimal;
 			}else{
 				slideActual+=cantAvance;	
 			}

 			//slideActual+=cantAvance;
 			//$('#container').animate({Left:this.cont+"px"}, 100,function(){});
 			//$('#container').css('left',slideActual+"px");
 			$('#container').animate({left: ""+slideActual+""},100);
 			cont--;
 			console.log(cont);
 		}	
 		
	}); 

	$("#atrasGaleria").on('click',function(){
 		if(cont > 0){

 			if(cont > contSlide){
 				var avanceDecimal = decimal * cantAvance;
 				slideActual+= avanceDecimal;
 			}else{
 				slideActual+=cantAvance;	
 			}

 			//slideActual+=cantAvance;
 			//$('#container').animate({Left:this.cont+"px"}, 100,function(){});
 			//$('#container').css('left',slideActual+"px");
 			$('#container').animate({left: ""+slideActual+""},100);
 			cont--;
 			console.log(cont);
 		}		
	})
	$("#adelanteGaleria").on('click',function(){
 		if(cont < (contSlide)){
 			
 			if((cont+1)>contSlide){
 				var avanceDecimal = decimal * cantAvance;
 				slideActual-= avanceDecimal;
 			}else{
 				slideActual-=cantAvance;	
 			}
 			
 			//$('#container').animate({Left:this.cont+"px"}, 100,function(){});
 			//$('#container').css('left',slideActual+"px");
 			$('#container').animate({left: ""+slideActual+""},100);
 			cont++;
 			console.log(cont);
 		}		
	});

	$('#wrapGaleria').on("swipeleft",function(){//contenedores de video 

 		if(cont < (contSlide)){
 			
 			if((cont+1)>contSlide){
 				var avanceDecimal = decimal * cantAvance;
 				slideActual-= avanceDecimal;
 			}else{
 				slideActual-=cantAvance;	
 			}
 			
 			//$('#container').animate({Left:this.cont+"px"}, 100,function(){});
 			//$('#container').css('left',slideActual+"px");
 			$('#container').animate({left: ""+slideActual+""},100);
 			cont++;
 			console.log(cont);
 		}	

	});
}
