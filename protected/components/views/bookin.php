<script type="text/javascript" src="/js/partials/bookin.js"></script>
<link rel="stylesheet" type="text/css" href="/css/partials/bookin.css" media="screen, projection">
<link rel="stylesheet" type="text/css" href="/css/jquery-ui.css" media="screen, projection">
<link href='https://fonts.googleapis.com/css?family=Squada+One' rel='stylesheet' type='text/css'>
<!-- Bookin -->
<div class="row items bookin-m-l <? print_r($datos['activo']);?>" id="bookin">
	<h4 class="center-align"><?=Yii::t("global","ESTÁS LISTO PARA UN PASEO");?></h4>
	<div class="row"><br></div>
	<div class="col s12" id="formBookin">
		<form class="form-inline" method="post" action="" id="frmBookin">
		  <input type="hidden" name="zona" id="zona">
		  <div class="form-group col s12 m5 offset-m1 l3 offset-l2">
		    <label class="hidden-xs" style="" for="departure"><?=Yii::t("global","Saliendo de :");?></label>
		    <input required type="text" class=" etiqueta" id="saliendo" name="saliendo" placeholder="<?=Yii::t("global","Saliendo de");?>">
		  </div>
		  <div class="form-group col s6 m2   l2 offset-l1">
		    <label class="col s12" style="" for="adults"><?=Yii::t("global","Adultos");?></label>
		    	<select required class=" etiqueta" id="adults" name="adults">
		    		<option value='1' selected="selected">1</option>
		    		<?
		    		for ($i=2; $i < 51; $i++) { 
		    			echo "<option value='$i'>$i</option>"; 
		    		}
		    		?>
		    	</select>
		  </div>
		  <div class="form-group col s6 m2 offset-m1 l2">
		    <label class="col s12" style="" for="childs"><?=Yii::t("global","Niños");?></label>
		    	<select class=" etiqueta" id="childs" name="childs">
		    		<option value='0'>0</option>
		    		<option value='1' selected="selected">1</option>
		    		<?
		    		for ($i=2; $i < 51; $i++) { 
		    			echo "<option value='$i'>$i</option>"; 
		    		}
		    		?>
		    	</select>
		  </div>
		  <div class="form-group col s6 m5 offset-m1 l2 offset-l2">
		    <label class="col s12" style="" for="departures"><?=Yii::t("global","Horarios");?></label>
		    	<select required class=" etiqueta" id="departures" name="departureTime">
		    		<option value=""><?=Yii::t("global","Horario");?></option>
		    		<option selected="selected" value="09:30 am">09:30 am</option>
		    		<option value="12:00 pm">12:00 pm</option>
					<option value="03:00 pm">03:00 pm</option>		    		
		    	</select>
		  </div>		  
		  <div class="form-group col s6 m5 l2 offset-l1">
		    <label class="col s12" for="arrival" style="" ><?=Yii::t("global","Fecha");?></label>
		    <input required class="datepicker " type="text" min="<?=date('Y-m-d', strtotime('+2 day'))?>" id="arrival" name="dtearrival" placeholder="<?=Yii::t("global","Fecha");?>"  type="text" readonly="readonly">	
		  </div>
		</form>	

		  <div class=" col s12 m10  offset-m1 l3 offset-l1">
		  	<div class="row"><br></div>
		  	<div class="row"><br></div>
		  	<button data-ajax="false" style="background-color: rgb(110,148,74);" id="bntCost" class="btn btn-success"><?=Yii::t("global","RESERVAR");?></button>
		  </div>
		<div class="row"><br></div>  
		<div class="row hide" id="dtllBookin" style="padding: 20px;">
			<div class="col s12">
				<div class="col s12 m4">
					<div class="col s12 m12  titulo"><h5><?=Yii::t("global","Precio por Adulto");?>: </h5></div>
					<div class="col s12 m12 "><label class="textoCantidades" id="cstAdult"></label></div>
				</div>
				<div class="col s12 m4">
					<div class="col s12 m12  titulo"><h5><?=Yii::t("global","Precio por Niño");?>: </h5></div>
					<div class="col s12 m12 "><label class="textoCantidades" id="cstChild"></label></div>				
				</div>
				<div class="col s12 m4">
					<div class="col s12 m12  titulo"><h5><?=Yii::t("global","Total");?>: </h5></div>
					<div class="col s12 m12 "><label class="textoCantidades" id="cstTotal"></label></div>				
				</div>
				<div class="col s12 m4 offset-m4 l2 offset-l5">
					<form id="frmPago" action="/tour" data-ajax="false" method="post">
					<button class="btn col s12 btn-success" id="btnBook"><?=Yii::t("global","Reservar Ahora");?></button>				
					</form>
				</div>			
			</div>
		</div>		
	</div>

</div>