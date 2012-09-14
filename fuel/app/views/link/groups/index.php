<h2>Listing Link_groups</h2>
<br>
<?php if ($link_groups): ?>
<table class="table zebra-striped">
	<thead>
		<tr>
			<th>Site id</th>
			<th>Identifier</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($link_groups as $link_group): ?>		<tr>

			<td><?php echo $link_group->site_id; ?></td>
			<td><?php echo $link_group->identifier; ?></td>
			<td>
				<?php echo Html::anchor('links/index/'.$link_group->id, 'View'); ?> |
				<?php echo Html::anchor('link/groups/edit/'.$link_group->id, 'Edit'); ?> |
				<?php echo Html::anchor('link/groups/delete/'.$link_group->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Link_groups.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('link/groups/create', 'Add new Link group', array('class' => 'btn success')); ?>

</p>
