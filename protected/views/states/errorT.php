<div class="row">
    <div class="col s12 m10 offset-m1">
 

            <div class="card-panel orange accent-4 white-text">
                <h5 class="center-align"><strong><?=Yii::t("global","Hay un error en su transacción");?></strong></h5>
            </div>
            <br/>
            <div class="col s12" style="padding: 10px;color: red;">
                <b>
                    <strong><? if($_SESSION['error']!="" && isset($_SESSION['error']) ) {print_r($_SESSION['error']);}else{ print_r($_GET['ref']); }?></strong>
                </b>
            </div>
            <br/>
            <h6 class="left-align black-text"><?=Yii::t("global","Si necesita asistencia inmediata, por favor");?><a href="<?php echo Yii::app()->request->baseUrl; ?>/#contact" target="_blank"> contact us</a>.</h6>
            <br/>
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