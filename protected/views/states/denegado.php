<div class="row">
	<div class="col s12 m10 offset-m1">
 					

	<div class="card-panel orange accent-4 white-text">
		<h5 class="center-align"><strong><?=Yii::t("global","Lo sentimos su transacción con su tarjeta de crédito no fue completada satisfactoriamente");?></strong></h5>
	</div>
	<h6 class="left-align black-text"><?=Yii::t("global","Su cargo a sido rechazado/ denegado por el banco emisor");?></h6>
	<br/>
	<div class="col s12" style="padding: 10px;color: red;"><b><? print_r($_GET['ref']);?></b></div>
	<h6 class="left-align black-text"><?=Yii::t("global","Si necesita asistencia inmediata, por favor");?><a href="<?php echo Yii::app()->request->baseUrl; ?>/#contact" target="_blank">contact us</a>.</h6>

	    <p> Av. de los colegios #37 por Av. Bonfil Calle de acceso (L28)<br />
	    Sm 309 Mz 16 Lt 37<br />
	    <strong>Zip code</strong>: 77560<br />
	    <strong>From the US:</strong> 011(52) 998 8819400<br />
	    <strong>In M&eacute;xico:</strong> (52) 998 8819400<br />
	    <strong>email: </strong><a href="mailto:sales@lomas-travel.com">sales@lomas-travel.com</a></p>
	<br/>
	</div>		  	
</div>
<? $_SESSION['error']=""; ?>