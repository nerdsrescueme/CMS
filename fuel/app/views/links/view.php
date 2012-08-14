<h2>Viewing #<?php echo $link->id; ?></h2>

<p>
	<strong>Link group id:</strong>
	<?php echo $link->link_group_id; ?></p>
<p>
	<strong>Parent id:</strong>
	<?php echo $link->parent_id; ?></p>
<p>
	<strong>Title:</strong>
	<?php echo $link->title; ?></p>
<p>
	<strong>Url:</strong>
	<?php echo $link->url; ?></p>
<p>
	<strong>Class:</strong>
	<?php echo $link->class; ?></p>
<p>
	<strong>Target:</strong>
	<?php echo $link->target; ?></p>

<?php echo Html::anchor('links/edit/'.$link->id, 'Edit'); ?> |
<?php echo Html::anchor('links', 'Back'); ?>