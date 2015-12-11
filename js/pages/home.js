$(window).ready(function(){
/* declaracion para owl carousel */	
	var owl = $('.owl-carousel');
	owl.owlCarousel({
			items:1,
		    smartSpeed:450,
	    	nav:true,
	    	animateOut: 'fadeOutDownBig',
    		animateIn: 'fadeInDownBig',	    	
			});

	$('#atras').click(function() {
	    owl.trigger('prev.owl.carousel', [300]);
	});
	$('#adelante').click(function() {
	    owl.trigger('next.owl.carousel');
	});
/* declaracion para owl carousel */		
});