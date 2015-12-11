<div class="row">
<div class="col s12">
	<img class="responsive-img" src="<?=Yii::app()->params["baseUrl"]."images/home/testimonial.jpg";?>">
</div>
	<div class="col s12 m10 offset-m1">
		<section>
			<?php $sitio = ''; ?>
			
			<?php foreach($testimonials as $t): ?>
				<?php 
					if($sitio != $t['sitio_nombre']):
						$sitio = $t['sitio_nombre'];
						echo '<h6 class="site">' .str_replace('US', '', $t['sitio_nombre']). '<h6>'; 
					endif;
				?>
				<article class="testimonial">
					<p class="testimonial-date"><?php echo Yii::app()->GenericFunctions->convertPresentableDates($t['fecha']); ?></p>
					<p class="testimonial-name"><?php echo $t['nombre']; ?></p>
					<p class="testimonial-comment">
						<i class="material-icons">chat_bubble</i>
						<?php echo utf8_encode($t['comentario']); ?>
					</p>
				</article>
			<?php endforeach; ?>
		</section>
	</div>
</div>

