<?php /* @var $this Controller */ 
   include_once $_SERVER['DOCUMENT_ROOT'].'/includes/Mobile_Detect.php';
    $detect = new Mobile_Detect(); //redireccionar a versión móvil si nos visitan desde un móvil o tablet
?>
<div class="row" >
	<div class="col s12 m10 offset-m1">
		<h3><strong><?=Yii::t("global","Contacto");?></strong></h3>	
		<h5 class="texto">
			<?=Yii::t("global","En Rancho Bonanza el servicio es nuestra meta; por esto sus comentarios son importantes para nosotros. Nuestro personal está listo para responder sus dudas y tomar en cuenta sus sugerencias.");?>
		</h5>
	</div>
	<div class="col s12"><br></div>
	<div class="col s12 m10 offset-m1">

			<div class="col-xs-12">
				<div class="input-field col s12 m5 offset-m1">
			    	<label class="hidden-xs" style="font-weight:bold;">Nombre *</label>
			    	<input type="text" class="form-control etiqueta" id="name" placeholder="Enter Name">
			  	</div>
				<div class="input-field col s12 m5 offset-m1">
			    	<label class="hidden-xs" style="font-weight:bold;">Correo *</label>
			    	<input type="text" class="form-control etiqueta" id="email" placeholder="Enter Email">
			  	</div>		  
			</div>
			<div class="col-xs-12">
				<div class="input-field col s12 m5 offset-m1">
			    	<label class="hidden-xs" style="font-weight:bold;">Teléfono</label>
			    	<input type="text" class="form-control etiqueta" id="phone" placeholder="Enter Phone">
			    </div>
				<div class="input-field col s12 m5 offset-m1">
			    	<label class="hidden-xs" style="font-weight:bold;">Pais *</label>
			    	<input type="text" class="form-control etiqueta" id="country" placeholder="Enter Country">
			  	</div>		  
			</div>
			<div class="col-xs-12">
				<div class="input-field col s12 m5 offset-m1">
			    	
			    	<textarea rows="3" class="materialize-textarea" style="width:100%" id="comments">
			    		
			    	</textarea>
			    	<label class="hidden-xs" for="comments" style="font-weight:bold;">Comentarios *</label> 
			    </div>
				<div class="col s12 m4 offset-m1 l2 offset-l1 col-xs-12 col-sm-4 col-sm-offset-1 col-md-2 col-md-offset-1">
			    	<button class="btn btn-success orange accent-4" id="btnSubmit" >Enviar</button>
			  	</div>		    
			</div>

	</div>
<!-- 	<div class="col s12 "><br><br></div>
	<div class="col s12 m8 offset-m2">
		<div id="mapHotel" style="height:500px;" class="mapa"></div>
	</div> -->
</div>
<div class="row">
	<div class="col s12 m10 offset-m1">
		<div class="col s12 m8 offset-m2">
			<h4><?=Yii::t("global","Como llegar desde Cancún");?></h4>
			<iframe src="https://www.google.com/maps/embed?pb=!1m26!1m12!1m3!1d238426.4592441743!2d-87.02928364735374!3d20.976058549983094!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m11!3e0!4m5!1s0x8f4c2b05aef653db%3A0xce32b73c625fcd8a!2zQ2FuY8O6biwgUS5SLg!3m2!1d21.161908!2d-86.8515279!4m3!3m2!1d20.792036!2d-86.94469029999999!5e0!3m2!1ses-419!2smx!4v1449093444697" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>
		<div class="col s12 m8 offset-m2">
			<h4><?=Yii::t("global","Como llegar desde Playa del Carmen");?></h4>
			<iframe src="https://www.google.com/maps/embed?pb=!1m26!1m12!1m3!1d142032.68627885755!2d-87.11307882170124!3d20.696544781746585!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m11!3e6!4m5!1s0x8f4e4323d22d4e61%3A0xe8c10b783bab4adc!2sPlaya+del+Carmen!3m2!1d20.6295586!2d-87.0738851!4m3!3m2!1d20.792036!2d-86.94469029999999!5e0!3m2!1ses-419!2smx!4v1449092818935" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

		</div>		
	</div>
</div>
