<?php
	class bonanzaInit{

		public static function beginRequest(CEvent $event) {
			include_once($_SERVER['DOCUMENT_ROOT']."/includes/Mobile_Detect.php");
			 $detect = new Mobile_Detect(); //redireccionar a versión móvil si nos visitan desde un móvil o tablet

			if($detect->isMobile()){// para la deteccion de el dispositivo desde donde se abre la pagina ya sea movil o desktop 			
			 	Yii::app()->params['screen']="M";
			}else {
				if($detect->isTablet()){
					Yii::app()->params['screen']="T";
				 }else{
					Yii::app()->params['screen']="D"; 	
				 }	 			 	
			}
		}



	}
?>	