<?php

class Testimonial{

  	public function getTestimonials(){
		  $sql = "SELECT t.nombre, t.comentario, t.fecha, s.sitio_nombre FROM testimonials AS t INNER JOIN sitios AS s ON t.sitio = s.sitio_id WHERE sitio IN (23) ORDER BY sitio, fecha DESC";
      $testimonials = Yii::app()->db->createCommand($sql)->queryAll();
      return $testimonials;
    }

    public function getLastTestimonial(){
    	$sql = "SELECT * FROM testimonials WHERE sitio IN (23) ORDER BY fecha DESC";
    	$testimonial = Yii::app()->db->createCommand($sql)->queryRow();
         return $testimonial;
    }
}


?>