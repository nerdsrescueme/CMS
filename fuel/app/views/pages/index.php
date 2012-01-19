<?php if ($pages): ?>
<table class="zebra-striped">
	<thead>
		<tr>
			<th>Title</th>
			<th>URI</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($pages as $page): ?>		<tr>

			<td><?php echo Html::anchor('/'.$page->uri, $page->title); ?></td>
			<td>/<?php echo $page->uri; ?></td>
			<td>
				<?php echo Html::anchor('pages/edit/'.$page->id, 'Edit'); ?> |
				<?php echo Html::anchor('pages/delete/'.$page->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>
			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Pages.</p>

<?php endif; ?><p>

</p>
