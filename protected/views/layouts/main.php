<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/materialize.css" media="screen, projection">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" media="screen, projection">
	<!-- Iconos -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
	<!-- JS -->
	<script type="text/javascript" src="/js/jquery.js"></script>
	<script type="text/javascript" src="/js/jquery-ui.js"></script>
	<script type="text/javascript" src="/js/materialize.js"></script>
	<script type="text/javascript" src="/js/general.js"></script>
	<script type="text/javascript" src="/js/main.js"></script>
	<title><?php echo $this->pageTitle; ?></title>
</head>

<body>
<header>
<div id="mainmenu" class="row">
	<? $this->renderPartial('application.views.partials.menu',true);?>
	<?php	$this->widget('application.components.BookWidget'); ?>
</div><!-- mainmenu -->
</header>
<main>

	<?php echo $content; ?>

</main>
<footer class="page-footer">
<div id="footer">
		<? $this->renderPartial('application.views.partials.footer',true);?>
</div><!-- footer -->
</footer>
</body>
</html>
