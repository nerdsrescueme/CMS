<?php echo render('links/_form'); ?>

<p>
	<?php echo Html::anchor('links/view/'.$link->id, 'View'); ?> |
	<?php echo Html::anchor('links', 'Back'); ?>
</p>
