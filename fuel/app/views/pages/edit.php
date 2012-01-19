<h2>Editing Page</h2>
<br>

<?php echo render('pages/_form'); ?>
<p>
	<?php echo Html::anchor('pages/view/'.$page->id, 'View'); ?> |
	<?php echo Html::anchor('pages', 'Back'); ?></p>
