<?php if ($pages): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Title</th>
			<th>URI</th>
			<th>Actions</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($pages as $page): ?>
		<tr>
			<td><?php echo $page->title ?></td>
			<td>/<?php echo $page->uri ?></td>
			<td>
				<?php echo Html::anchor('/pages/view/'.$page->id, 'View', array('class' => 'btn btn-mini')); ?> 
				<?php echo Html::anchor('/pages/edit/'.$page->id, 'Edit', array('class' => 'btn btn-mini')); ?> 
				<?php echo Html::anchor('/pages/delete/'.$page->id, 'Delete', array('onclick' => "return confirm('Are you sure you wish to delete this page?')", 'class' => 'btn btn-mini btn-danger')); ?> 
			</td>
		</tr>
<?php endforeach; ?>
	</tbody>
</table>

<?php else: ?>

<p>No Pages.</p>

<?php endif; ?>

<p>
	<?php echo Html::anchor('/pages/create', 'Create a New Page', array('class' => 'btn btn-primary')); ?> 
</p>
