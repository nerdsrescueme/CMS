<p>
	<strong>Page Title:</strong>
	<?php echo $page->title; ?></p>
<p>
	<strong>Uri:</strong>
	/<?php echo $page->uri; ?></p>
<p>
	<strong>Description:</strong>
	<?php echo $page->description; ?></p>
<p>
	<strong>Site id:</strong>
	<?php echo $page->site_id; ?></p>
<p>
	<strong>Layout id:</strong>
	<?php echo $page->layout_id; ?></p>

<?php echo Html::anchor('pages/edit/'.$page->id, 'Edit'); ?> |
<?php echo Html::anchor('pages', 'Back'); ?>