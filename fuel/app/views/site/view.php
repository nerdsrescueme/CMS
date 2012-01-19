<h2>Viewing #<?php echo $site->id; ?></h2>

<p>
	<strong>Host:</strong>
	<?php echo $site->host; ?></p>
<p>
	<strong>Theme:</strong>
	<?php echo $site->theme; ?></p>

<?php echo Html::anchor('site/edit/'.$site->id, 'Edit'); ?> |
<?php echo Html::anchor('site', 'Back'); ?>