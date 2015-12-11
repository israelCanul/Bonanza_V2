
<div class="row " id="checkout_form">
	<div class="col s12 m10 offset-m1 card-panel hoverable" style="padding-top: 20px;padding-bottom: 20px;">
		<div class='col s12'>
			<div class='col s12 m8'>
				<h5 ><span class="titulo txtTitulo">Tour :</span><span class="texto txtTexto"> <?=$varSession['booking']['txtTour']?></span></h5>			
			</div>
			<div class='col s12 m3'>
				<h5 class="titulo txtTexto textoCantidades"  style="color:#920000;float:right;font-weight: bold;">$<?=$varSession['booking']['total']." ".$varSession['booking']['moneda'];?></h5>		
			</div>
		</div>
		<div class='col s12'>
			<div class='col s12 m5'>
				<h6 ><strong class="titulo txtTitulo"><?=Yii::t("global","Opción");?> : </strong></h6><h6><span class="texto txtTexto"><?=$varSession['booking']['txtTour']?>, <?=$varSession['booking']['salida']?></span></h6>			
			</div>
			<div class='col s12 m4'>
				<h6><strong class="titulo txtTitulo"><?=Yii::t("global","Fecha");?> : </strong></h6><h6><span class="texto txtTexto"><?=$fechaLetras?></span></h6> 		
			</div>
			<div class='col s12 m3'>
				<h6 class="titulo txtTitulo"><strong><?=Yii::t("global","Salida");?> : </strong></h6><h6 class="texto txtTexto"><?=$varSession['booking']['departureTime']?></h6>		
			</div>		
		</div>
		<div class='col s12'>
			<div class='col s12 m5'>
				<h6 ><span class="titulo txtTitulo"><?=Yii::t("global","Tipo");?> : </span><span class="texto txtTexto">Individual</span></h6>			
			</div>
			<div class='col s12 m4'>
				<h6><span class="titulo txtTitulo"><?=Yii::t("global","Adulto(s)");?> : </span><span class="texto txtTexto"><?=$varSession['booking']['adult']?></span></h6> 		
			</div>
			<div class='col s12 m3'>
				<h6 ><span class="titulo txtTitulo"><?=Yii::t("global","Niño(s)");?> : </span><span class="texto txtTexto"><?=$varSession['booking']['child']?></span></h6>		
			</div>		
		</div>		 
	</div>
	<div class='col s12'><br></div>


	<div class='col s12'><br></div>

	<form method="post" id="formPago" action="tour/procesa_pago">	
	<div class="col s12 m10 offset-m1">
		<div class='col s12'><h4 class="titulo txtTitulo"><?=Yii::t("global","Por favor, complete la siguiente información");?> :</h4></div>
		<div class='col s12'><h5 class="titulo txtTitulo" style="color:#0d8c8f"><?=Yii::t("global","Información personal");?></h5></div>
		<div class="col s12 textoCantidades">
			<div class="row">
				<div class='input-field col s12 m6'>
					<input required type="text" name="nombre" placeholder='<?//=Yii::t("global","Nombre(s)");?>' id="nombre" class="">
					<label for='nombre'><?=Yii::t("global","Nombre(s)");?><span class=="obligatorio">*</span></label>
				</div>
				<div class='input-field col s12 m6'>
					<input required type="text" name="apellido" id="apellido"placeholder='<?=Yii::t("global","Apellido(s)");?>' class="">
					<label for='apellido'><?=Yii::t("global","Apellido(s)");?><span class=="obligatorio">*</span></label>
				</div>
			</div>
			<div class="row">
				<div class='input-field col s12 m6'>
					<input required type="email" name="email" id="email1" placeholder='<?=Yii::t("global","Correo");?>' class="">
					<label for='email1'><?=Yii::t("global","Correo");?><span class=="obligatorio">*</span></label>
				</div>
				<div class='input-field col s12 m6'>
					<select required name="pais" id="pais" class=""><? Yii::app()->GenericFunctions->cargarPais(); ?></select>
					<label for='pais'><?=Yii::t("global","Pais");?><span class=="obligatorio">*</span></label>
				</div>
			</div>	
			<div class="row">				
				<div class='input-field col s12 m6'>
					<input required type="text" name="estado" id="estado" placeholder='<?=Yii::t("global","Estado");?>' class="">
					<label for='estado'><?=Yii::t("global","Estado");?><span class=="obligatorio">*</span>
				</div>
				<div class='input-field col s12 m6'>					
					<input type="text" placeholder='<?=Yii::t("global","Dirección");?>' name="address" id="address" class="">
					<label for='address'><?=Yii::t("global","Dirección");?></label>
				</div>
			</div>	
			<div class="row">
				<div class='input-field col s12 m6'>
					<label for="hPhone"><?=Yii::t("global","Teléfono");?><span class=="obligatorio">*</span></label>
					<input required type="tel" name="phone" id="hPhone" placeholder='<?=Yii::t("global","Teléfono");?>' class=" solo-numeros"><small><?=Yii::t("global","Incluir codigo de area");?></small>
				</div>	
				<div class='input-field col s12 m6'>
					<textarea style="padding:0px;" name="comments" id="comments" class="materialize-textarea"></textarea>
					<label for="comments" placeholder='<?=Yii::t("global","Comentarios");?>' class="active"><?=Yii::t("global","Comentarios");?></label>
				</div>				
			</div>			
		</div>
		<div class='col s12 '><h4 class="titulo txtTitulo"><?=Yii::t("global","Bonanza Tour a Caballo por la Selva");?>, <?=$varSession['booking']['salida']?></h4></div>
		<div class='col s12 '><h5 class="titulo txtTitulo" style="color:#0d8c8f"><?=Yii::t("global","Nombre(s) - Pasajeros(s)");?></h5></div>
		<div class="col s12 textoCantidades">
		<? for ($i=1; $i <= $varSession['booking']['adult'] ; $i++) { ?>
			<div class="card-panel hoverable">
				<div class=" row">	
					<div class='input-field col s12 m3'>
						<input required type="text" placeholder='<?=Yii::t("global","Nombre");?>' name="adult_adult_<?=$i?>" id="adult_adult_<?=$i?>" class="">
						<label for="adult_adult_<?=$i?>"><?=Yii::t("global","Adulto");?> <?=$i?><span class=="obligatorio">*</span></label>
					</div>
					<div class='input-field col s12 m2'>
						<select required class="etiqueta" id="experience_adult_<?=$i?>" name="experience_adult_<?=$i?>">
				    		<option value='0' selected="selected"><?=Yii::t("global","Paseos");?></option>
				    		<?
				    		for ($y=1; $y < 51; $y++) { 
				    			echo "<option value='$y'>$y</option>"; 
				    		}
				    		?>
			    		</select>
						<label for="experience_adult_<?=$i?>"><?=Yii::t("global","Experiencia");?></label>
					</div>
					<div class='input-field col s12 m2'>
						<input required type="text" name="weight_adult_<?=$i?>" placeholder='<?=Yii::t("global","Peso");?>' id="weight_adult_<?=$i?>" class="">
					</div>
					<div class='input-field col s12 m1'>
						<select required class="etiqueta" id="medida_adult_<?=$i?>" name="medida_adult_<?=$i?>">
				    		<option value='KG' selected="selected">KG</option>
				    		<option value='LBS' >LBS</option>
			    		</select>
					</div>
					<div class='input-field col s12 m2'>
						<input required type="text" name="height_adult_<?=$i?>" placeholder='<?=Yii::t("global","Estatura");?>' id="height_adult_<?=$i?>" class="">
					</div>
					<div class='input-field col s12 m2'>
						<input required type="text" name="edad_adult_<?=$i?>" placeholder='<?=Yii::t("global","Edad");?>' id="edad_adult_<?=$i?>" class="">
					</div>
				</div>																				
			</div>
		<? } ?>

		<? for ($i=1; $i <= $varSession['booking']['child'] ; $i++) { ?>
			<div class="card-panel hoverable">
				<div class=" row">	
					<div class='input-field col s12 m3'>
						<input required type="text" placeholder='<?=Yii::t("global","Nombre");?>' name="child_<?=$i?>" id="child_<?=$i?>" class="">
						<label for="child_<?=$i?>"><?=Yii::t("global","Niño");?> <?=$i?>:<span class=="obligatorio">*</span></label>
					</div>
					<div class='input-field col s12 m2'>
						<select required class="etiqueta" id="experience_child_<?=$i?>" name="experience_child_<?=$i?>">
				    		<option value='0' selected="selected"><?=Yii::t("global","Paseos");?></option>
				    		<?
				    		for ($y=1; $y < 51; $y++) { 
				    			echo "<option value='$y'>$y</option>"; 
				    		}
				    		?>
			    		</select>
						<label for="experience_child_<?=$i?>"><?=Yii::t("global","Experiencia");?></label>
					</div>
					<div class='input-field col s12 m2'>
						<input required type="text" name="weight_child_<?=$i?>" placeholder='<?=Yii::t("global","Peso");?>' id="weight_child_<?=$i?>" class="">
					</div>
					<div class='input-field col s12 m1'>
						<select required class="etiqueta" id="medida_child_<?=$i?>" name="medida_child_<?=$i?>">
				    		<option value='KG' selected="selected">KG</option>
				    		<option value='LBS' >LBS</option>
			    		</select>
					</div>
					<div class='input-field col s12 m2'>
						<input required type="text" name="height_child_<?=$i?>" placeholder='<?=Yii::t("global","Estatura");?>' id="height_child_<?=$i?>" class="">
					</div>
					<div class='input-field col s12 m2'>
						<input required type="text" name="edad_child_<?=$i?>" placeholder='<?=Yii::t("global","Edad");?>' id="edad_child_<?=$i?>" class="">
					</div>
				</div>		
			</div>
		<? } ?>				
		</div>

		<div class='col s12'><h5 class="titulo txtTitulo" style="color:#0d8c8f"><?=Yii::t("global","Información de pago");?></h5></div>

		<div class="col s12 textoCantidades">
			<div class='col s12 '>
			<p style="color:#000;text-align:justify !important;">
			<strong style="padding:0" class="titulo"><?=Yii::t("global","Noticia importante");?> :</strong><br> 
			To ensure the security of online transactions, it will be necessary to present the credit card used to make the reservation and an official identification of the cardholder when taking the service.
			<br><br>
			Due to the number of fraudulent transactions detected and to prevent misuse of credit cards, all customers booking with a credit card that is not under  their name, must submit a copy of this credit card, duly signed by the cardholder when taking the booked services.
			<br><br>
			Failure to comply with the above provisions may be grounds to deny the services booked.
			</p>
			</div>
			<div class='col s12'><br></div>

		  	<!-- Descripcion de las formas de pago  -->
			<div class='col s12 card-panel hoverable' style="padding-top: 20px;padding-bottom: 20px;color:#920000;border: 1px solid rgba(0,0,0,0.2);border-radius: 10px;">
			<div class="row"><br></div>	
			<? if(Yii::app()->language=='es' && Yii::app()->params['Moneda']=='MXN'){ ?>
				<div class="col s12 m8 l4 offset-l6 titulo txtTexto textoCantidades"><label style="color:#0d8c8f"><?=Yii::t("global","Formas de pago");?></label></div>
				<div class="col s12 m8 l4 offset-l6">
				    <input type="radio" checked="checked" name="cant_pagos" value="santander_1">
				    <label class="detalleCant">Un sólo pago</label>
				</div>
				<div class="col s12 m4 l2 cant"><label><strong>$<?=$varSession['booking']['total']." ".$varSession['booking']['moneda'];?></strong>
					<? if(Yii::app()->params['Moneda']!='MXN'){ ?><label><span class="cant">(Total MXN: $<?=$varSession['booking']['total']*$varSession['booking']['tipoCambio'];?>)</span></label>
					<? }else{ ?><label><span class="cant">(Total USD: $<?=$varSession['booking']['totalUSD'];?>)</span></label><? } ?>
					</label>
				</div>
				
				<div class="col s12 m8 l4 offset-l6"><input type="radio" name="cant_pagos" value="santander_3"><label class="detalleCant">3 Mensualidades Sin Intereses</label></div><div class="col s12 m4 l2 cant"><label>$<?=round(($varSession['booking']['total']/3),2)." ".$varSession['booking']['moneda'];?></label></div>
				<div class="col s12 m8 l4 offset-l6"><input type="radio" name="cant_pagos" value="santander_6"><label class="detalleCant">6 Mensualidades Sin Intereses</label></div><div class="col s12 m4 l2 cant"><label>$<?=round(($varSession['booking']['total']/6),2)." ".$varSession['booking']['moneda'];?></label></div>
			     
			<? }else{ ?>
				
					<div class="col s12 m8 l4 offset-l6">
						<!-- Se desvia aqui el pago si es en dolares no importa la pagina O si el pago es en pesos pero la pagina es en dolares  -->
						<!-- para cambios de pagina se debe de cambiar el texto de "Total to pay"  -->
					    <h6 class="titulo txtTitulo">Total to pay: </h6></div><div class="col s12 m4 l2 titulo txtTexto textoCantidades"><h6 style="color:#920000">$<?=$varSession['booking']['total']." ".$varSession['booking']['moneda'];?></h6>
						<? if(Yii::app()->params['Moneda']!='MXN'){ ?><h6><span class="cant">(Total MXN: $<?=$varSession['booking']['total']*$varSession['booking']['tipoCambio'];?>)</span></h6>
						<? }else{ ?><h6>><span class="cant">(Total USD: $<?=$varSession['booking']['totalUSD'];?>)</span></h6>><? } ?>						
					</div>

			<? } ?>
				<div class="row"><br></div>
			</div>
			<!-- descripcion de las formas de pago  -->
			<div class="row"><br></div>
			<div class="row">
				<div class='input-field col s12 m6'>
					<input required placeholder='<?=Yii::t("global","Tarjetahabiente");?>' type="text"  name="card_name" id="card_name" class=" solo-letras">
					<label for="card_name"><?=Yii::t("global","Tarjetahabiente");?>:<span class=="obligatorio">*</span></label>
				</div>
				<div class='input-field col s12 m6'>
						<select required id="card_month" name="card_month" class="validSelect" required>
							<option value="">Month</option>
							<? for ($i=1; $i <= 12 ; $i++) { 
								if($i<10){
									echo "<option value='0".$i."'>0".$i."</option>";	
								}else{
									echo "<option value='".$i."'>".$i."</option>";
								}
								
							} ?>
						</select>
						<label for="card_month"><?=Yii::t("global","Mes de expiración");?><span class=="obligatorio">*</span></label>
				</div>
			</div>
			<div class="row">
				<div class='input-field col s12 m6'>
					<input required type="text" maxlength="16" placeholder='<?=Yii::t("global","Numero de tarjeta");?>' name="card_number" id="card_number" class=" solo-numeros">
					<label for='card_number'><?=Yii::t("global","Numero de tarjeta");?><span class=="obligatorio">*</span></label>
				</div>
				<div class='input-field col s12 m6'>
					<select required id="card_year" name="card_year" class="" required>
						<option value="">Year</option>
						<? for ($i=15; $i <= 25 ; $i++) { 
							echo "<option value=".$i.">".$i."</option>";
						} ?>
					</select>
					<label for='card_year'><?=Yii::t("global","Año de expiración");?><span class=="obligatorio">*</span></label>
				</div>
			</div>
			<div class="row">
				<div class='input-field col s12 m6'>
					<select required name="card_type" id="card_type" class="">
						<option value="V">Visa</option>
						<option value="MC">Mastercard</option>
					</select>
					<label for='card_type'><?=Yii::t("global","Tipo de tarjeta");?><span class=="obligatorio">*</span></label>					
				</div>
				<div class='input-field col s12 m6'>
					<input required maxlength="3" type="password" name="card_code" placeholder='<?=Yii::t("global","Código de seguridad");?>' id="card_code" class=" solo-numeros">
					<label for='card_code'><?=Yii::t("global","Código de seguridad");?><span class=="obligatorio">*</span></label>
				</div>
			</div>
			<div class='col s12'><br></div>												
		</div>
		<div class="col-xs-12 col-sm-6 titulo txtTexto">
			<p>
			    <input  type="checkbox" id="chkPoliticas" name="chkPoliticas" value="1" />
			    <label for="chkPoliticas">I have read and accept the &nbsp;</label><a class="modal-trigger waves-effect waves-light" style="cursor:pointer" href="#modal1">reservation policies</a>					
			</p>
		</div>

		<div class='col s12 m10 offset-m1' ><button class="btn btn-success btn-lg hide" id="btnEnviar" style="float:right">PAY</button></div>
							
	</div>
	</form>			
	
</div>

  <div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4>Privacy and Safety Policy</h4>
			<div class="espaciado"></div>
			<p class="infolistado">Due to the deep respect and commitment with our customer's privacy and with those people using this online reservation services, Lomas Travel has set up a safety system VeriSign Certificate SSL 3.0 to protect all the information sent by your browser to our website and data base. All the data provided by our customers regarding the operations done with our customer's credit card are encrypted, so nobody can access our network, as a result having 100% safe transactions when processing online payments.</p>
			<div class="espaciado"></div>
			<p class="infolistado">All the information (such as name, address, e-mail address, telephone number and other data regarding the reservation) provided by our customers to Lomas Travel (DBA Viajes Turquesa del Caribe Mexicano, S.A. de C.V., and/or Caribbean Coast Reservations , Inc.) when processing online payments will be strictly confidential unless specified otherwise to our customers.</p>
			
			<div class="espaciado"></div>
			<h5>Tours Cancellation Policies:</h5>
			<div class="espaciado"></div>
			<ol class="politicas_cancelacion">
				<li>
                            Full refund will apply in the following cases:<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- When the service is canceled by the supplier.<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Due to illness, presenting a doctor´s report.<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- The Cancellation or date change is made prior to 11:00 am the day before the service.

                       </li>   
                       <li>
                            No refunds will apply:<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- If the client does not show on the date and time of service.
                       </li>   
			</ol>

    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Close</a>
    </div>
  </div>			