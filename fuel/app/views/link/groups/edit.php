<h2>Editing Link_group</h2>
<br>

<?php echo render('link/groups/_form'); ?>
<p>
	<?php echo Html::anchor('link/groups/view/'.$link_group->id, 'View'); ?> |
	<?php echo Html::anchor('link/groups', 'Back'); ?></p>
