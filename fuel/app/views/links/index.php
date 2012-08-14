<?php if ($links): ?>
<table class="zebra-striped" data-trigger="orderable">
	<thead>
		<tr>
			<th>Link group id</th>
			<th>Parent id</th>
			<th>Title</th>
			<th>Subtitle</th>
			<th>Url</th>
			<th>Class</th>
			<th>Target</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($links as $link): ?>
		<tr data-id="<?php echo $link->id ?>">
			<td><?php echo $link->link_group_id; ?></td>
			<td><?php echo $link->parent_id; ?></td>
			<td><?php echo $link->title; ?></td>
			<td><?php echo $link->subtitle ?></td>
			<td><?php echo $link->url; ?></td>
			<td><?php echo $link->class; ?></td>
			<td><?php echo $link->target; ?></td>
			<td>
				<?php echo Html::anchor('links/view/'.$link->id, 'View'); ?> |
				<?php echo Html::anchor('links/edit/'.$link->id, 'Edit'); ?> |
				<?php echo Html::anchor('links/delete/'.$link->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Links.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('links/create', 'Add new Link', array('class' => 'btn success')); ?>

</p>
