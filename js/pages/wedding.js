$(window).ready(function(){

	var owl = $('.owl-carousel_2');
        	owl.owlCarousel({
            center: true,
            items:2,
            loop:true,
            margin:10,
        	autoplay:true,
        	autoplayTimeout:5000,
        	autoplayHoverPause:false ,   
            responsive:{
                320:{
                	items:1
                },
                600:{
                    items:1
                },
                1200:{
                	items:1
                }
            }	
		});
            
});