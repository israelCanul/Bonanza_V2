<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		$cs= Yii::app()->getclientScript();
		$cs->registerCssFile(Yii::app()->params["baseUrl"].'/css/plugins/owl/owl.carousel.css?a='. Yii::app()->params['assets'],'screen, projection');
		$cs->registerCssFile(Yii::app()->params["baseUrl"].'/css/animate.css?a='. Yii::app()->params['assets'],'screen, projection');
		$cs->registerCssFile(Yii::app()->params["baseUrl"].'/css/pages/index.css?a='. Yii::app()->params['assets'],'screen, projection');
		$cs->registerScriptFile(Yii::app()->params["baseUrl"].'/js/plugins/owl/owl.carousel.js?a='. Yii::app()->params['assets'],CClientScript::POS_END);
		$cs->registerScriptFile(Yii::app()->params["baseUrl"].'/js/pages/home.js?a='. Yii::app()->params['assets'],CClientScript::POS_HEAD);

		$this->pageTitle='Bonanza';
		$this->render('index');
	}

	public function actionTour()
	{
		$cs= Yii::app()->getclientScript();
		$cs->registerCssFile(Yii::app()->params["baseUrl"].'/css/pages/tour.css?a='. Yii::app()->params['assets'],'screen, projection');

		$this->pageTitle='The Tour';
		$this->render('tour');
	}

	public function actionWedding()
	{
		$cs= Yii::app()->getclientScript();
		$cs->registerCssFile(Yii::app()->params["baseUrl"].'/css/plugins/owl/owl.carousel.css?a='. Yii::app()->params['assets'],'screen, projection');
		$cs->registerCssFile(Yii::app()->params["baseUrl"].'/css/pages/wedding_experience.css?a='. Yii::app()->params['assets'],'screen, projection');
		
		$cs->registerScriptFile(Yii::app()->params["baseUrl"].'/js/plugins/owl/owl.carousel.js?a='. Yii::app()->params['assets'],CClientScript::POS_END);
		$cs->registerScriptFile(Yii::app()->params["baseUrl"].'/js/pages/wedding.js?a='. Yii::app()->params['assets'],CClientScript::POS_HEAD);

		$this->pageTitle='The Tour';
		$this->render('wedding');
	}
	public function actionMedia()
	{
		$cs= Yii::app()->getclientScript();
		//$cs->registerCssFile(Yii::app()->params["baseUrl"].'/css/plugins/owl/owl.carousel.css?a='. Yii::app()->params['assets'],'screen, projection');
		$cs->registerCssFile(Yii::app()->params["baseUrl"].'/css/pages/media.css?a='. Yii::app()->params['assets'],'screen, projection');
		$cs->registerCssFile(Yii::app()->params["baseUrl"].'/css/plugins/owl/owl.carousel.css?a='. Yii::app()->params['assets'],'screen, projection');

		$cs->registerScriptFile(Yii::app()->params["baseUrl"].'/js/plugins/freewall/freewall.js?a='. Yii::app()->params['assets'],CClientScript::POS_END);
		$cs->registerScriptFile(Yii::app()->params["baseUrl"].'/js/pages/media.js?a='. Yii::app()->params['assets'],CClientScript::POS_HEAD);
		$cs->registerScriptFile(Yii::app()->params["baseUrl"].'/js/jquery.mobile.touch.js?a='. Yii::app()->params['assets'],CClientScript::POS_END);
		$cs->registerScriptFile(Yii::app()->params["baseUrl"].'/js/plugins/owl/owl.carousel.js?a='. Yii::app()->params['assets'],CClientScript::POS_END);		

		$this->pageTitle='Media';
		$this->render('media');
	}	
	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$cs= Yii::app()->getclientScript();
		//$cs->registerCssFile(Yii::app()->params["baseUrl"].'/css/plugins/owl/owl.carousel.css?a='. Yii::app()->params['assets'],'screen, projection');
		$cs->registerCssFile(Yii::app()->params["baseUrl"].'/css/pages/contact.css?a='. Yii::app()->params['assets'],'screen, projection');		
		$cs->registerScriptFile('//maps.googleapis.com/maps/api/js?v=3.exp&sensor=false',CClientScript::POS_HEAD);
		$cs->registerScriptFile(Yii::app()->params["baseUrl"].'/js/pages/contact.js?a='. Yii::app()->params['assets'],CClientScript::POS_END);


		$this->pageTitle=Yii::t("global","Contacto");
		$this->render('contact');
	}

	/**
	 * Displays the login page
	 */
	public function actionTestimonial(){
		$cs= Yii::app()->getclientScript();
		//$cs->registerCssFile(Yii::app()->params["baseUrl"].'/css/plugins/owl/owl.carousel.css?a='. Yii::app()->params['assets'],'screen, projection');
		$cs->registerCssFile(Yii::app()->params["baseUrl"].'/css/pages/testimonial.css?a='. Yii::app()->params['assets'],'screen, projection');		
		//$cs->registerScriptFile(Yii::app()->params["baseUrl"].'/js/plugins/freewall/freewall.js?a='. Yii::app()->params['assets'],CClientScript::POS_END);
		//$cs->registerScriptFile(Yii::app()->params["baseUrl"].'/js/pages/wedding.js?a='. Yii::app()->params['assets'],CClientScript::POS_HEAD);

		$_test 		  = new Testimonial();
	   	$testimonials = $_test->getTestimonials();
		$this->render("testimonial", array('testimonials' => $testimonials));
	}

public function actionEnviar(){
		require_once($_SERVER['DOCUMENT_ROOT']."/includes/phpmailer_v5_1/class.phpmailer.php"); 
		/*INICIO DE VARIABLES*/

		foreach ($_POST as $secvalue) {
		if ((eregi("]*script.*\"?[^>]*>", $secvalue)) ||
				(eregi("]*object.*\"?[^>]*>", $secvalue)) ||
				(eregi("]*iframe.*\"?[^>]*>", $secvalue)) ||
				(eregi("]*applet.*\"?[^>]*>", $secvalue)) ||
				(eregi("]*window.*\"?[^>]*>", $secvalue)) ||
				(eregi("]*document.*\"?[^>]*>", $secvalue)) ||
				(eregi("]*cookie.*\"?[^>]*>", $secvalue)) ||
				(eregi("]*meta.*\"?[^>]*>", $secvalue)) ||
				(eregi("]*style.*\"?[^>]*>", $secvalue)) ||
				(eregi("]*alert.*\"?[^>]*>", $secvalue)) ||
				(eregi("]*form.*\"?[^>]*>", $secvalue)) ||
				(eregi("]*php.*\"?[^>]*>", $secvalue)) ||
				(eregi("]*]*>", $secvalue)) ||
				(eregi("]*img.*\"?[^>]*>", $secvalue))) {
				header('location: /index.php');
				exit();
				
				}
		}


		$motivo_del_mensaje = "Information";
		$nombre 			= utf8_decode($_POST['name']);
		$correo 			= utf8_decode($_POST['email']);
		$telefono 			= $_POST['phone'];
		$country		 	= utf8_decode($_POST['country']);
		$message			= utf8_decode($_POST['message']);

		
	
		$mail = new PHPMailer(true);
		$mail->isSMTP(); 
		$mail->Host = "smtp.gmail.com";
		$mail->SMTPAuth = true; 
		$mail->Username = "envios@lomas-travel.com";
		$mail->Password = "r5J8Rg<S";
		$mail->SMTPSecure = "tls"; 
		$mail->Port = 587;
		$mail->From 	= "envios@lomas-travel.com";
		$mail->FromName = "Rancho Bonanza";
		$mail->Subject 	= "Contact Us - Rancho Bonanza Cancun";
		$mail->AddAddress($correo,$nombre);
		//$mail->AddCC("info@ranchobonanzacancun.com","Rancho Bonanza Cancun");
		//$mail->AddBCC("webmaster@lomas-travel.com","Rancho Bonanza Cancun");
		$mail->AddBCC("icanul@dexabyte.com.mx","Rancho Bonanza Cancun");

		$body  = "
				<html>
					<head></head>
					<body>
						<div style=' width:750px;margin: 0 auto; border:4px solid #0662AD;'>
							<table width='100%' bgcolor='#0662AD'>
			                        	<tr>
			                            	<td width='30%'><img src='http://www.ranchobonanzacancun.com/recursos/images/logo.png' /> </td>
			                                <td width='70%' align='left'>
		    	                            	<h1 style='color:#fff'>Contact Us Rancho Bonanza</h1>
			                                </td>
	            		                </tr>
	                    		    </table>
			    			<div style='padding:2%'>
									<table>
	                                	<tr>
	                                    	<td align='right'><h1 style='color:#000'>Reason Post:</h1></td>
	                                        <td><h1><span style='color:#0662AD'>$motivo_del_mensaje</span></h1></td>
	                                    </tr>
	                                    <tr>
	                                    	<td align='right'><h1 style='color:#000'>Name:</h1></td>
	                                        <td><h1><span style='color:#0662AD'>$nombre</span></h1></td>
	                                    </tr>
	                                    <tr>
	                                    	<td align='right'><h1 style='color:#000'>E-mail:</h1></td>
	                                        <td><h1><span style='color:#0662AD'>$correo</span></h1></td>
	                                    </tr>
	                                    <tr>
	                                    	<td align='right'><h1 style='color:#000'>Phone:</h1></td>
	                                        <td><h1><span style='color:#0662AD'>$telefono</span></h1></td>
	                                    </tr>
	                                    <tr>
	                                    	<td align='right'><h1 style='color:#000'>Country:</h1></td>
	                                        <td><h1><span style='color:#0662AD'>$country</span></h1></td>
	                                    </tr>
	                                    <tr>
	                                    	<td align='right'><h1 style='color:#000'>Message:</h1></td>
	                                        <td><h1><span style='color:#0662AD'>$message</span></h1></td>
	                                    </tr>
	                                </table>
	                            </div>					
						</div>
					</body>
				</html>
		";
		
		$mail->Body = $body;
		
		$mail->AltBody = "Habilitar el soporte para paginas web gracias.";
		$mail->IsHTML(true);
		
		if($message!=""){
			$mail->Send();
		}
		
		
		if($error == 2){
				echo 1;
		} else {
			echo 0;
		}
	
}


}