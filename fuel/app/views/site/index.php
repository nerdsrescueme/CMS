<h2>Listing Sites</h2>
<br>
<?php if ($sites): ?>
<table class="zebra-striped">
	<thead>
		<tr>
			<th>Host</th>
			<th>Theme</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($sites as $site): ?>		<tr>

			<td><?php echo $site->host; ?></td>
			<td><?php echo $site->theme; ?></td>
			<td>
				<?php echo Html::anchor('site/view/'.$site->id, 'View'); ?> |
				<?php echo Html::anchor('site/edit/'.$site->id, 'Edit'); ?> |
				<?php echo Html::anchor('site/delete/'.$site->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Sites.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('site/create', 'Add new Site', array('class' => 'btn success')); ?>

</p>
