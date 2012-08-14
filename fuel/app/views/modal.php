<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
	<?php echo Asset::css('bootstrap-original.min.css'); ?> 
	<?php echo Asset::js('jquery.js'); ?> 
	<?php echo Asset::js('jqueryui.min.js'); ?> 
</head>
<body>
	<div class="container">
		<div class="row">

<?php if(!isset($noheader)) : ?>

			<div class="span12">
				<h1><?php echo $title; ?></h1>
				<hr>
<?php if (Session::get_flash('success')): ?>
				<div class="alert-message success">
					<p>
					<?php echo implode('</p><p>', (array) Session::get_flash('success')); ?>
					</p>
				</div>
<?php endif; ?>
<?php if (Session::get_flash('error')): ?>
				<div class="alert-message error">
					<p>
					<?php echo implode('</p><p>', (array) Session::get_flash('error')); ?>
					</p>
				</div>
<?php endif; ?>
			</div>

<?php endif ?>

			<div class="span12">
<?php echo $content; ?>
			</div>
		</div>
		<footer>

		</footer>
	</div>
</body>
</html>
