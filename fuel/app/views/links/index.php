<?php if ($links): ?>
<table class="zebra-striped" data-interaction="sortable">
	<thead>
		<tr>
			<th>Link Id</th>
			<th>Parent id</th>
			<th>Title</th>
			<th>Subtitle</th>
			<th>Url</th>
			<th>Target</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($links as $link): ?>
		<tr data-id="<?php echo $link->id ?>" data-parent="<?php echo $link->link_group_id ?>">
			<td><?php echo $link->id ?></td>
			<td><?php echo $link->parent_id; ?></td>
			<td><?php echo $link->title; ?></td>
			<td><?php echo $link->subtitle ?></td>
			<td><?php echo $link->url; ?></td>
			<td><?php echo $link->named_target(); ?></td>
			<td>
				<!--<?php echo Html::anchor('links/view/'.$link->id, 'View'); ?> |-->
				<?php echo Html::anchor('links/edit/'.$link->id, 'Edit'); ?> |
				<?php echo Html::anchor('links/delete/'.$link->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>
	</tbody>
</table>

<?php else: ?>
<p>No Links.</p>
<?php endif; ?>
<p>
	<?php echo Html::anchor('links/create', 'Add new Link', array('class' => 'btn success')); ?> 
</p>

<style type="text/css">

	tr[data-id] {
		cursor: move;
		height: 14px;
	}
	
	tr[data-id]:hover {
		background-color: lightblue
	}

</style>

<script type="text/javascript">

$(document).ready(function() {
	$('[data-interaction=sortable]').sortable({
		items: 'tbody tr[data-id]',
		containment: 'parent',
		axis: 'y',
		
		update: function(event, ui)
		{
			var items = $(event.target).find('tbody tr[data-id]')
			,   out   = { data: {}}
			,   id    = items.first().data('parent')

			items.each(function(index, item) {
				out.data[$(item).data('id')] = index + 1;
			})
			
			$.ajax({
				type: 'POST'
			,	url: '/links/sort/' + id
			,	data: out
			})
		}
	})
});

</script>