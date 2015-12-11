<div class="row">
	<div class="col s12" id="wrap_video">
		<video id="videoPrincipal" class="video" loop preload="auto" name="media">
			<source src="<?php echo Yii::app()->params['baseUrl']; ?>images/video/bonanza1.mp4" type="video/mp4">
		</video>
	</div>	
</div>
<div class="row">
	<div class="col s12 wrapGaleria" style="position: relative;overflow: hidden; " id='wrapGaleria'>
<!-- 		<h5><?=Yii::t("global","Galería");?></h5> -->	
		<div id="container">	
		 		<img class="item responsive-img" src="/images/galeria/V1.jpg">
				<img class="item responsive-img" src="/images/galeria/C2.jpg">
				<img class="item responsive-img" src="/images/galeria/C3.jpg">
				<img class="item responsive-img" src="/images/galeria/C4.jpg">
				<img class="item responsive-img" src="/images/galeria/C5.jpg">
		 		<img class="item responsive-img" src="/images/galeria/L1.jpg">
				<img class="item responsive-img" src="/images/galeria/L2.jpg">
				<img class="item responsive-img" src="/images/galeria/L3.jpg">
				<img class="item responsive-img" src="/images/galeria/L4.jpg">
		 		<img class="item responsive-img" src="/images/galeria/C1.jpg">
				<img class="item responsive-img" src="/images/galeria/V2.jpg">
				<img class="item responsive-img" src="/images/galeria/V3.jpg">
				<img class="item responsive-img" src="/images/galeria/V4.jpg">
		</div>					 									
	</div>
	<div class="col s12 m10 offset-m1 redesMedia" style="position:absolute" id='redes'>
		<a class="redIcon" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo Yii::app()->params['baseUrl']; ?>" target="_blank"><i class="zmdi zmdi-hc-2x zmdi-facebook white-text"></i>&nbsp;&nbsp;</a>		
		<a class="redIcon" href="http://www.twitter.com/home?status=<?php echo Yii::app()->params['baseUrl']; ?>" target="_blank"><i class="zmdi zmdi-hc-2x zmdi-twitter white-text"></i>&nbsp;&nbsp;</a>
		<a class="redIcon" href="https://plus.google.com/share?url=<?php echo Yii::app()->params['baseUrl']; ?>" target="_blank"><i class="zmdi zmdi-hc-2x zmdi-google-plus white-text"></i>&nbsp;&nbsp;</a>
	</div>
	<div class="controles ocultar-xs redesMedia">
		<div class="col s6">
		<a id="atrasGaleria"><img src="/images/iconos/direccion.svg"></a>
		</div>
		<div class="col s6">
		<a id="adelanteGaleria"><img src="/images/iconos/direccion.svg"></a>
		</div>
	</div>
</div>
<script type="text/javascript">
	 $("#videoPrincipal").get(0).play();
	 $("#videoPrincipal").prop('muted', true);


</script>
