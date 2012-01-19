<h2>Editing Site</h2>
<br>

<?php echo render('site/_form'); ?>
<p>
	<?php echo Html::anchor('site/view/'.$site->id, 'View'); ?> |
	<?php echo Html::anchor('site', 'Back'); ?></p>
