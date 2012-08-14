<h2>Viewing #<?php echo $link_group->id; ?></h2>

<p>
	<strong>Site id:</strong>
	<?php echo $link_group->site_id; ?></p>
<p>
	<strong>Identifier:</strong>
	<?php echo $link_group->identifier; ?></p>

<?php echo Html::anchor('link/groups/edit/'.$link_group->id, 'Edit'); ?> |
<?php echo Html::anchor('link/groups', 'Back'); ?>