<?php

class TourController extends Controller
{
	public function actionIndex()
	{	
		$cs= Yii::app()->getclientScript();
		$cs->registerCssFile(Yii::app()->params["baseUrl"].'/css/pages/checkout.css?a='. Yii::app()->params['assets'],'screen, projection');
		$cs->registerScriptFile(Yii::app()->params["baseUrl"].'/js/jquery.validate.js?a='. Yii::app()->params['assets'],CClientScript::POS_END);
		$cs->registerScriptFile(Yii::app()->params["baseUrl"].'/js/pages/checkout.js?a='. Yii::app()->params['assets'],CClientScript::POS_END);
		$varSession=Yii::app()->GenericFunctions->getVariableSession();// inicializamos la variable de session de acuerdo al idioma         
		$fechaLetras=Yii::app()->GenericFunctions->convierteFechaLetra($varSession['booking']['date'],1);
		$params = array('varSession' => $varSession, 'fechaLetras' => $fechaLetras);
		$this->render('index',$params);
	}	
    public function actionVerifica_fecha(){
			$date =$_POST['dte'];

			$date_=explode("-", $date);

			if(Yii::app()->language!='es'){
				$date =$date_[2].$date_[0].$date_[1];// convertir de formato ingles
			}else{
				$date =$date_[2].$date_[1].$date_[0];// convertir de formato español
			}

			$i 	= strtotime($date); // convertir a fecha unix 
            $dayOnWeek=date("N",$i);// dia de la semana
            if($dayOnWeek==7) $dayOnWeek=0; // si dia de la semana es igual a 7 se vuelve el valor 0

			if(Yii::app()->GenericFunctions->verificaDisponibilidadTour($dayOnWeek)){
				echo 1;
				$varSession['booking']['date']=$_POST['dte'];
				Yii::app()->GenericFunctions->setVariableSession($varSession);// enviamos la variable para que se guarde en la variable de session de acuerdo al idioma
			}else{
				echo 0;
			}
	}
	public function actioncargar_hoteles_venta(){
		if((!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')) {

			$ssql =Yii::app()->db->createCommand("SELECT destino_nombre_".Yii::app()->language." AS hotel,zona_destino AS zona FROM transportacion_zona_destinos,transportacion_zona WHERE destino_zona=zona_id AND destino_activo=1 AND zona_id BETWEEN '2' AND '6' ORDER BY hotel")->queryAll();

            $arrayName=array();
			if(count($ssql)>0){
				foreach ($ssql as $key => $result) {
					$hotel = trim($result['hotel']);
					$zona = trim($result['zona']);	


					array_push($arrayName, array('value'=>$hotel,'data'=>$zona));					
				}
			}
			
			echo json_encode($arrayName);
		}
	}

    public function actionProcesa_datos(){

        $varSession=Yii::app()->GenericFunctions->getVariableSession();// inicializamos la variable de session de acuerdo al idioma

    	if(isset($_POST['zona']) && !empty($_POST['zona']) && isset($_POST['saliendo']) && !empty($_POST['saliendo']) && isset($_POST['adults']) && !empty($_POST['adults']) && isset($_POST['departureTime']) && !empty($_POST['departureTime']) && isset($_POST['dtearrival']) && !empty($_POST['dtearrival'])  ){

			$varSession['booking']['zona'] 		   = $zona					=$_POST['zona'];
			$varSession['booking']['code'] 		   = "";
			$varSession['booking']['adult'] 		   = $numAdults			    = trim($_POST['adults']);
			$varSession['booking']['child']  		   = $numChilds			        = trim($_POST['childs']);
			$varSession['booking']['salida']  	   = $salida			    = trim($_POST['saliendo']);
			$varSession['booking']['departureTime']  = $departureTime		    = trim($_POST['departureTime']);			
			$date =	$varSession['booking']['date'];
			$date_=explode("/", $date);

			if(Yii::app()->language!='es'){
				$dateTemp =$date_[2]."-".$date_[0]."-".$date_[1];// convertir de formato ingles //formato recibidos mm/dd/aa
			}else{
				$dateTemp =$date_[2]."-".$date_[1]."-".$date_[0];// convertir de formato español //formato recibidos dd/mm/aa original $date_[2]."-".$date_[1]."-".$date_[0];
			}

			$tarifas= Yii::app()->GenericFunctions->obtenerTarifas($dateTemp,$zona);
            $varSession['booking']['tarifas']=$tarifas;
            $tarifaAdult=$tarifas['tar_adult'];
            $tarifaChild=$tarifas['tar_child'];
            $varSession['booking']['totalUSD']		= $totalTarifaUSD= ($tarifaAdult*$numAdults)+($tarifaChild*$numChilds);
            $varSession['booking']['txtUSD']		= "$ ".$totalTarifaUSD." USD";
            $varSession['booking']['total']		= $totalTarifaUSD;
            $varSession['booking']['txtTotal']		= "$ ".$totalTarifaUSD." USD";
            $varSession['booking']['moneda']		= "USD";
            $varSession['booking']['tipoCambio']= $tipoCambio 	= Yii::app()->GenericFunctions->obtenerTipoCambio();
            $varSession['booking']['totalMXN']	= $totalTarifaMXN= $totalTarifaUSD*$tipoCambio;
            $varSession['booking']['txtMXN']	= "$ ".$totalTarifaMXN." MXN";            
            $varSession['booking']['txtTour']	= "Bonanza Jungle Horseback Ride";
            
            if(Yii::app()->language=='es') $varSession['booking']['txtTour']	="Bonanza Tour a Caballo por la Selva"; // se cambia el idioma del tour 
            
            if(Yii::app()->params['Moneda']=='MXN'){  // si la moneda es pesos se imprime el tipo en pesos           	
            	$varSession['booking']['total']		= $totalTarifaMXN;
            	$varSession['booking']['txtTotal']	= "$ ".$totalTarifaMXN." MXN <br>( ".$varSession['booking']['txtUSD']." )";
            	$varSession['booking']['moneda']	= "MXN";
            }

            Yii::app()->GenericFunctions->setVariableSession($varSession);// enviamos la variable para que se guarde en la variable de session de acuerdo al idioma			
			echo json_encode(Yii::app()->GenericFunctions->getVariableSession());
		}	
    }	


    public function actionProcesa_pago(){

    	 $varSession=Yii::app()->GenericFunctions->getVariableSession();// inicializamos la variable de session de acuerdo al idioma   
    	 $idioma=Yii::app()->language;


		 $email_test = array("egonzalez@dexabyte.com.mx","lcaballero@dexabyte.com.mx","malvarez@dexabyte.com.mx","icanul@dexabyte.com.mx");		 
		 $txtIp=Yii::app()->GenericFunctions->obtenerIP();
		
			$monedaCobro=$varSession['booking']['moneda'];
			$numAdults=$varSession['booking']['adult'];
			$numChilds=$varSession['booking']['child'];
            /*  datos del solicitante */
			$txtNombre=$_POST['nombre'];
			$txtApellido=$_POST['apellido'];
			$txtEmail=$_POST['email'];
			$txtPais= $_POST['pais'];
			$txtEstado=$_POST['estado'];
			$txtTel=$_POST['phone'];
			$txtComentarios=$_POST['comments'];
			$txtDireccion=$_POST['address'];

			
			if(Yii::app()->params['Moneda']=='MXN' && Yii::app()->language=='es') {
				$GatewayMethod=explode("_",$_POST['cant_pagos']);
				print_r($GatewayMethod);
			    if ($GatewayMethod[1] == 1) {
			        Yii::app()->Santander->setVars("4018", "001", "MEX", "4018WEUS0", "4018WEUS0", "15365", "3", "MXN", "A7BEC7D1", "prod");
			    } else if ($GatewayMethod[1] == 3) {
			        Yii::app()->Santander->setVars("4018", "001", "MEX", "4018WEUS0", "4018WEUS0", "15531", "3", "MXN", "A7BEC7D1", "prod");
			    } else if ($GatewayMethod[1] == 6) {
			        Yii::app()->Santander->setVars("4018", "001", "MEX", "4018WEUS0", "4018WEUS0", "15532", "3", "MXN", "A7BEC7D1", "prod");
			    }
			    if(in_array($txtEmail,$email_test)){
                   Yii::app()->Santander->setVars("1141", "002", "MEX", "1141SIUS0", "1141SIUS0", "52863", "3", "MXN", "114AF671", "dev");
                } 
			}else{
				if(in_array($txtEmail,$email_test)){
                    Yii::app()->Santander->setVars("1141", "002", "MEX", "1141SIUS0", "1141SIUS0", "52868", "3", "USD", "114AF671", "dev");
                }
			}

		
			
			            //insertar el cliente en la bd de lomas 
			            $_Cliente = new Cliente;
			            $_Cliente->cliente_nombre = $txtNombre;
		                $_Cliente->cliente_apellido = $txtApellido;
		                $_Cliente->cliente_email = $txtEmail;
		                $_Cliente->cliente_pais_n = $txtPais;
		                $_Cliente->cliente_domicilio =$txtDireccion;
		                $_Cliente->cliente_estado = $txtEstado;
		                $_Cliente->cliente_ciudad = '';
		                $_Cliente->cliente_postal_code = '';
		                $_Cliente->cliente_telefono = $txtTel;
		                $_Cliente->cliente_comentario=$txtComentarios;
		                if($_Cliente->save()){
		                	$clientId = $_Cliente->cliente_id;
		                }else{
		                	$_SESSION['error']['Tabla']="Cliente";
		                	$_SESSION['error']="Cliente no Guardado, Imposible continuar ..";////////////////////////////// error si el cliente no se guarda
		                	 //Para que no se recarge la pagina y realize los cobros //Yii::app()->GenericFunctions->setNullVariableSession();	
		                	header("Location: /transaction_error");
		                }
              
		       $nombres_adultos="";
		       $nombres_ninios="";
		       $detalles_adultos="";
		       $detalles_ninios="";

		       for ($i=1; $i <= $numAdults ; $i++) { 
		          	 $nombres_adultos.=ucwords(trim($_POST['adult_adult_'.$i]));
		          	 $nombres_adultos.=";";  
		          	 $detalles_adultos.=ucwords(trim($_POST['adult_adult_'.$i])).",".ucwords(trim($_POST['weight_adult_'.$i])).','.ucwords(trim($_POST['medida_adult_'.$i])).','.ucwords(trim($_POST['height_adult_'.$i])).','.ucwords(trim($_POST['edad_adult_'.$i]));
		          	 $detalles_adultos.=";";  		          	      	
		        }         
		       for ($i=1; $i <= $numChilds ; $i++) { 
		          	 $nombres_ninios.=ucwords(trim($_POST['child_'.$i]));       	
		        	 $nombres_ninios.=";";
		          	 $detalles_ninios.=ucwords(trim($_POST['child_'.$i])).",".ucwords(trim($_POST['weight_child_'.$i])).','.ucwords(trim($_POST['medida_child_'.$i])).','.ucwords(trim($_POST['height_child_'.$i])).','.ucwords(trim($_POST['edad_child_'.$i]));
		          	 $detalles_ninios.=";";  			        	 
		        }

   						$_Venta = new Venta;

   							$_Venta->venta_session_id = 's/n';
							$_Venta->venta_moneda     = $varSession['booking']['moneda'];
							
							/* Para colocar el sitio en la venta  23= ingles y 22= español*/
							if(Yii::app()->language!='es'){
								$_Venta->venta_site_id    = 23;
							}else{
								$_Venta->venta_site_id    = 22;
							}
							/* */

							$_Venta->venta_user_id    = $clientId;
							$_Venta->venta_estt       = 1;
							$_Venta->venta_total      = $varSession['booking']['total']; // total de la venta 
							$_Venta->venta_fecha      = date("Y-m-d H:i:s"); 
							$_Venta->venta_hotel	  = $varSession['booking']['salida']; // 
							$_Venta->venta_ip		  = $txtIp; // la ip actual 
							$_Venta->venta_authcode	  = 'Santander';// el tipo de tarjeta santander,amex .. etc
							$_Venta->venta_observacion=$txtComentarios;
							$_Venta->tipo_pago  = 2;
							$_Venta->tipo_cambio=$varSession['booking']['tipoCambio'];
				            if($_Venta->save()){
				            	$Venta = $_Venta->venta_id;// id de la venta 
				        	}else{
				        		$_SESSION['error']['Tabla']="Venta";
				        		$_SESSION['error']=$_Venta->getErrors();
				        		 //Para que no se recarge la pagina y realize los cobros //Yii::app()->GenericFunctions->setNullVariableSession();	
					    		header("Location: /transaction_error");
				        	}
				        if($idioma!='es') {	
				        	$txtFolioReserva = "BNZ-".$Venta;//  Folio de la venta 
						}else{
							$txtFolioReserva = "BNX-".$Venta;//  Folio de la venta
						}

						$date_=explode("/", $varSession['booking']['date']);

						if(Yii::app()->language!='es'){
							$date =$date_[2].$date_[0].$date_[1];// convertir de formato ingles
						}else{
							$date =$date_[2].$date_[1].$date_[0];// convertir de formato español
						}

						$descripciones_tarifa=array(8=>"Cancun",9=>"Puerto Morelos",11=>"Riviera Maya",20=>"Tulum",10=>"Playa del Carmen");

						$descripcion="Departing from ".$descripciones_tarifa[$varSession['booking']['zona']].", Time: ".$varSession['booking']['departureTime'];
						if(Yii::app()->language=='es') $descripcion="Saliendo de ".$descripciones_tarifa[$varSession['booking']['zona']].", Hora: ".$varSession['booking']['departureTime'];

				        $hotel = new VentaDescripcion;// venta del hotel 
						$hotel->descripcion_producto = $varSession['booking']['txtTour'];//		
						$hotel->descripcion_destino =0;//
						$hotel->descripcion_brief = "n/a";
						$hotel->descripcion_tarifa = $descripcion;	
						$hotel->descripcion_venta = $Venta;//Id de la venta 
						$hotel->descripcion_fecha = date("Y-m-d H:i:s");//
						$hotel->descripcion_fecha1 = $date;//
						$hotel->descripcion_fecha2 = $date;//
						$hotel->descripcion_adultos = intval($varSession['booking']['adult']);//
						$hotel->descripcion_menores = intval($varSession['booking']['child']);//
						$hotel->descripcion_infantes = 0;
						$hotel->descripcion_cuartos = 0;//
						$hotel->descripcion_precio = $varSession['booking']['tarifas']['tar_adult'];//
						if(intval($varSession['booking']['child'])!=0){
						$hotel->descripcion_precio_nino=$varSession['booking']['tarifas']['tar_adult'];
						$hotel->descripcion_total_nino=$varSession['booking']['tarifas']['tar_child']*intval($varSession['booking']['child']);
					    }						
						$hotel->descripcion_total = $varSession['booking']['total'];//	
						$hotel->hotel_huesped = $varSession['booking']['salida'];
						$hotel->descripcion_hotel2 = "n/a";
						$hotel->descripcion_tipo_producto = 2;// tipo de producto 1 porque es hotel
						$hotel->descripcion_servicio_ini = 1;
						$hotel->descripcion_servicio_id = $txtFolioReserva;
						$hotel->descripcion_reservable = 1;
						$hotel->descripcion_pagado = 0;
						$hotel->tipo_translado  = 1; 
						$hotel->detalles_adultos=$detalles_adultos;
						$hotel->detalles_ninos=$detalles_ninios;
						$hotel->observaciones= $txtComentarios;
						$hotel->descripcion_thumb="http://lomastravel.com.mx/carta_confirmacion/bonanza_new.png";						
						$hotel->descripcion_producto_id=1005;	
						if($hotel->save()){
						$id_venta_hotel=$hotel->descripcion_id;
					    }else
					    {	$_SESSION['error']['Tabla']="Descripcion";
					    	$_SESSION['error']=$hotel->getErrors();
					    	 //Para que no se recarge la pagina y realize los cobros //Yii::app()->GenericFunctions->setNullVariableSession();	
					    	header("Location: /transaction_error");
					    }
					    /*print_r("<pre>");
				    	print_r($detalles_adultos);
				    	print_r($_REQUEST);
				    	exit();*/	  					    
					    $granTotal=$varSession['booking']['total'];
                      
					    // se aplica cargo en santander
		                $xml = Yii::app()->Santander->makeXML($txtFolioReserva, $clientId, $granTotal, $_REQUEST["card_name"], trim($_REQUEST["card_number"]) , trim($_REQUEST["card_month"]) , trim($_REQUEST["card_year"]) , trim($_REQUEST["card_code"]));

		                $iService = Yii::app()->Santander->callService($xml);
       
		                $answerSantander = get_object_vars($iService);
		                
		                   foreach ($answerSantander as $k => $v) {
		                       if (is_object($v)) {
		                           $answerSantander[$k] = get_object_vars($v);
		                        }
		                  	}

		                $tmpTns = array_merge($answerSantander, $_POST);
		                		/*  Se guardan el resultado de la transferencia sea cual sea */
		                        $_tns = new VentaTns;
		                        $_tns->venta_id = $Venta;
		                        $_tns->venta_fecha = date("Y-m-d H:i:s");
		                        $_tns->venta_data = serialize($tmpTns);

		                        if($_tns->save()){
		                        	$venta_tns=$_tns->venta_data_id;
		                        }else{
		                        	$_SESSION['error']['Tabla']="Transferencia";
							    	$_SESSION['error']=$_tns->getErrors();
							    	header("Location: /transaction_error");
		                        }
                                   
		                        
		                        if ($iService->response == "approved") {

		                            $authCode = $iService->auth; 
		                            $auth = "Santander";		                            
		                            $sucess = true;

		                                $ventaUserid = Venta::model()->findByPk($Venta);
		                                $ventaUserid->venta_estt = "2";
		                                $ventaUserid->venta_autorizador=$authCode;
		                                $ventaUserid->venta_total = $granTotal;
		                                $ventaUserid->save();

		                                $_Tarjeta = new Tarjeta;
					                    $_Tarjeta->tarjeta_cliente = $clientId;
					                    $_Tarjeta->tarjeta_venta = $Venta;
					                    $_Tarjeta->Ecom_Payment_Name = $_REQUEST["card_name"];
					                    $_Tarjeta->Ecom_Payment_Card_Number = $_REQUEST["card_number"];
					                    $_Tarjeta->Ecom_Payment_Card_Month = "0";
					                    $_Tarjeta->Ecom_Payment_Card_Year = "0";
					                    $_Tarjeta->save();

		                                /* si la pagina esta en ingles se cambia la url de donde se toman las cartas confirma */
										$link_papeleta = "http://www.lomastravel.com/voucher.html?id=" . Yii::app()->GenericFunctions->ProtectVar($id_venta_hotel);
										/* si la pagina esta en español se cambia la url de donde se toman las cartas confirma */
										if(Yii::app()->language=='es') 	$link_papeleta = "http://www.lomastravel.com.mx/cupon.html?id=" . Yii::app()->GenericFunctions->ProtectVar($id_venta_hotel);
		                                

		                                /* si es un test se cambia la peticion de la papeleta a local */
		                                if(in_array($txtEmail,$email_test)){
											$link_papeleta = "http://lomasbeta.dev/voucher.html?id=" . Yii::app()->GenericFunctions->ProtectVar($id_venta_hotel);
											 /*si la pagina esta en español se cambia la url de donde se toman las cartas confirma */
											if(Yii::app()->language=='es') 	$link_papeleta = "http://lomasmx.dev/cupon.html?id=" . Yii::app()->GenericFunctions->ProtectVar($id_venta_hotel);
		                                }


												//print_r(Yii::app()->GenericFunctions->ProtectVar($Hotel->descripcion_id));
												$info = file_get_contents($link_papeleta);
												if($info==""){
													$info="No cargo ningun datos del link proporcionado";
												}
										        
										        if($idioma=='es') {
										    		$varsession=$_SESSION['bookin_ES'];
											    }else{
											    	$varsession=$_SESSION['bookin'];
											    }

										        require_once($_SERVER['DOCUMENT_ROOT']."/includes/phpmailer_v5_1/class.phpmailer.php"); 
										        $m["mail_titulo"] = "Lomas Travel | Carta de Servicio  | #".$id_venta_hotel; // Titulo del email
												$email_carrusel="inform@lomas-travel.com";
												$email_webmaster="webmaster@lomas-travel.com";
												//Correo que se le va a enviar al cliente
												$correoC = new PHPMailer(true);
												$correoC->isSMTP(); 
												$correoC->Host = "smtp.gmail.com";
												$correoC->SMTPAuth = true; 
												$correoC->Username = "envios@lomas-travel.com";
												$correoC->Password = "r5J8Rg<S";
												$correoC->SMTPSecure = "tls"; 
												$correoC->Port = 587;
												$correoC->From 	= "envios@lomas-travel.com";
												$correoC->FromName = "Rancho Bonanza";
												$correoC->Subject = $m["mail_titulo"];
												$correoC->MsgHTML($info);			
												$correoC->AddAddress($txtEmail, "Cliente Lomas Travel");			
												$correoC->AddCC($email_carrusel,"Lomas Travel");
												$correoC->IsHTML(true);
										        $correoC->Send();
												$correoC->ClearAddresses();
											

												//Correos que se van a enviar a ventas y respaldo
												$correoA->isSMTP(); 
												$correoA->Host = "smtp.gmail.com";
												$correoA->SMTPAuth = true; 
												$correoA->Username = "envios@lomas-travel.com";
												$correoA->Password = "r5J8Rg<S";
												$correoA->SMTPSecure = "tls"; 
												$correoA->Port = 587;
												$correoA->From 	= "envios@lomas-travel.com";
												$correoA->FromName = "Rancho Bonanza";
												$correoA->AddAddress("sales@lomas-travel.com");
												$correoA->AddAddress($email_webmaster);
												$correoA->AddCC($email_webmaster);
												$correoA->AddCC("alex@ranchobonanzacancun.com");
												$correoA->Subject = $m["mail_titulo"];
												$correoA->MsgHTML($info);
												$correoA->IsHTML(true);
												$correoA->Send();
												$correoA->ClearAddresses();
												Yii::app()->GenericFunctions->setNullVariableSession();// BORRAMOS LA VARIABLE DE SESSION 
												
	                               
		                                header("Location: /transaction_aproved?ref=".Yii::app()->GenericFunctions->ProtectVar($id_venta_hotel));	
		                        
		                        } else {
		                            if ($iService->response == "denied") {		                                
		                                //Insertar Estado de la venta 
		                                $ventaUserid = Venta::model()->findByPk($Venta);
		                                $ventaUserid->venta_estt = "7";
		                                $ventaUserid->venta_total = $granTotal;
		                                $ventaUserid->save();
		                                $_SESSION['error']=$_tns->getErrors();
		                                //Para que no se recarge la pagina y realize los cobros //
		                                Yii::app()->GenericFunctions->setNullVariableSession();		                                										
									    header("Location: /transaction_denied?ref=".$iService->friendly_response);
				           				exit();                              
		                            } else {	                                
		                                 //Insertar Estado de la venta 
		                                $ventaUserid = Venta::model()->findByPk($Venta);
		                                $ventaUserid->venta_estt = "6";
		                                $ventaUserid->venta_total = $granTotal;
		                                $ventaUserid->save();		                                
		                                // Insertar Estado de la venta 
     	                                //Para que no se recarge la pagina y realize los cobros //
		                                Yii::app()->GenericFunctions->setNullVariableSession();
									    header("Location: /transaction_error?ref=".$iService->nb_error);
									    exit();		                            	
		                            }
		                        }		                        
	}




}