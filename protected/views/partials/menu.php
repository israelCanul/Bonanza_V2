
<!-- css del partial -->
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/partials/menu.css" media="screen, projection">
<!-- js del partial -->
<script type="text/javascript" src="/js/partials/menu.js"></script>
<style type="text/css">
	.premio{
		width: 114px; 
	}
</style>
		<div class="row">
				<div class="col m5 laterales ocultar-lg">
					<img class="premio" src="/images/iconos/2012.jpg">
					<img class="premio" src="/images/iconos/2013.jpg">
					<img class="premio" src="/images/iconos/2014.jpg">
					<img class="premio" src="/images/iconos/bravo.jpg">
				</div>
				<div class="col m2 ocultar-lg">
					<a href="<?php echo $this->createUrl("site/index"); ?>"><img style="max-height: 140px;" class="responsive-img" src="/images/iconos/logo.png"></a>
				</div>
				<div class="col m5 laterales ocultar-lg" >
					<div class="col s12" style="padding:0px;"><h6 class="right-align"><strong>Call Us: (998) 881 94 13 &bull; 414 755 2527 &bull; 414 755 0529</strong></h6></div>
					<div class="col s12">
						<h5 class="right-align">
							<strong class='cafe-text line-orange-below-3'>FOLLOW US :</strong>  
							&nbsp; &nbsp;<a class="url"><i class="zmdi zmdi-hc-lg zmdi-facebook"></i></a> 
							&nbsp; &nbsp;<i class="zmdi zmdi-hc-lg zmdi-twitter"></i> 
							&nbsp; &nbsp;<i class="zmdi zmdi-hc-lg zmdi-google-plus"></i>
							&nbsp; &nbsp;<a class="url" href="/es"><img src="/images/iconos/flag-ES.png"></a>
						</h5>
					</div>
				</div>	
		</div>
		<div class="row">
		    <div class="col s12">
				<?php $this->widget('zii.widgets.CMenu',array(
					'items'=>array(
						array('label'=>'BOOK YOUR RIDE',
							'linkOptions'=>array('class'=>'Book_form'),
							),
						array('label'=>'THE RANCH', 
							'url'=>array('site/index'),
							'linkOptions'=>array()
							),
						array('label'=>'THE TOUR', 'url'=>array('site/tour')),
						/*array('label'=>'MEET OUR HORSES & STAFF', 'url'=>array('site/meet_us')),*/
						array('label'=>'WEDDING EXPERIENCE', 'url'=>array('site/wedding')),
						array('label'=>'MEDIA', 'url'=>array('site/media')),
						array('label'=>'TESTIMONIALS', 'url'=>array('site/testimonial')),
						array('label'=>'CONTACT', 'url'=>array('site/contact'))
					),
				)); 
				?>

		    </div>
		    <div class="left mostrar-md-xs col s6 m3">
		        <a href="<?php echo $this->createUrl("site/index"); ?>"><img style="" class="logo responsive-img" src="/images/iconos/logo2.png"></a>
		    </div>		    
		    <div class="col s6 m9">
		    	<div class="redesTablet">
					<div class="col s12" style="padding:0px;"><h6 class="right-align"><strong>Call Us: (998) 881 94 13 &bull; 414 755 2527 &bull; 414 755 0529</strong></h6></div>
					<div class="col s12"><h5 class="right-align"><strong class='cafe-text line-orange-below-3'>FOLLOW US :</strong>  &nbsp; &nbsp;<i class="zmdi zmdi-hc-lg zmdi-facebook"></i> &nbsp; &nbsp;<i class="zmdi zmdi-hc-lg zmdi-twitter"></i> &nbsp; &nbsp;<i class="zmdi zmdi-hc-lg zmdi-google-plus"></i>&nbsp; &nbsp;<a href="/es"><img src="/images/iconos/flag-ES.png"></a></h5></div> 				
		    	</div>
		    	<div class="right mostrar-md-xs ">
		        	<a class="show_menu_movil url" id='show_menu_movil'><i class="large material-icons cafe-text">menu</i></a>
 				</div>
		    </div>
		</div>
		<div id="menu_movil" class="mostrar-md-xs noactivo">
		    <ul>
				<li><a href="<?php echo $this->createUrl("site/index"); ?>">THE RANCH</a></li>
				<li><a href="<?php echo $this->createUrl("site/tour"); ?>">THE TOUR</a></li>
				<!-- <li><a href="#">FLIGHTS</a></li> -->
				<li><a href="<?php echo $this->createUrl("/activities"); ?>">MEET US</a></li>
				<!-- <li><a href="#">PACKAGES</a></li> -->
				<li><a target="_blank" href="<?php echo $this->createUrl("site/wedding"); ?>">WEDDING EXPERIENCE</a></li>
				<li><a href="<?php echo $this->createUrl("site/media"); ?>">MEDIA</a></li>
				<li><a href="<?php echo $this->createUrl("site/testimonial"); ?>">TESTIMONIALS</a></li>
				<li><a href="<?php echo $this->createUrl("site/contact"); ?>">CONTACT</a></li>
		    </ul>
			<div class="row">
				<div class="col s12">
					<div class="right">
					<a id="hide_menu_movil">
						<i class="medium material-icons white-text back url">arrow_upward</i>
					</a>
					</div>
				</div> 
			</div>		    
		</div>    


		<div class="row menu_fixed menu_fixed_inActivo" style="    border: 2px solid rgba(0, 0, 0, 0.2);">
		    <div class="col s6 m2" style="height: 100%;">
		        <a href="<?php echo $this->createUrl("site/index"); ?>"><img style="max-height: 100%;" class="logo responsive-img" src="/images/iconos/logo2.png"></a>
		    </div>	
		    <div class="col s6 m10 ocultar-lg">
		    	<nav>
				    <ul >
						<li><a href="<?php echo $this->createUrl("site/index"); ?>">RANCH</a></li>
						<li><a href="<?php echo $this->createUrl("site/tour"); ?>">TOUR</a></li>
						<!-- <li><a href="#">FLIGHTS</a></li> -->
						<li><a href="<?php echo $this->createUrl("/activities"); ?>">MEET US</a></li>
						<!-- <li><a href="#">PACKAGES</a></li> -->
						<li><a target="_blank" href="<?php echo $this->createUrl("site/wedding"); ?>">WEDDING</a></li>
						<li><a href="<?php echo $this->createUrl("site/media"); ?>">MEDIA</a></li>
						<li><a href="<?php echo $this->createUrl("site/testimonial"); ?>">TESTIMONIALS</a></li>
						<li><a href="<?php echo $this->createUrl("site/contact"); ?>">CONTACT</a></li>
				    </ul>
			    </nav>
		    </div>
		    <div class="right mostrar-md-xs ">
		    	<a class="show_menu_movil url" ><i class="large material-icons cafe-text url">menu</i></a>
		    </div>		    
		</div>