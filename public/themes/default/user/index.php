<?php if ($users): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Email</th>
			<th>Created at</th>
			<th>Groups</th>
			<td>Add to group</th>
			<th>Activated</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($users as $user): ?>
		<tr>
			<td><?php echo $user->email ?></td>
			<td><?php echo date("m/d/Y", $user->created_at) ?></td>
			<td>
				<ul class="unstyled">
				<?php foreach ($user->get_groups() as $group) : ?>
					<li>
						<?php echo $group->name ?>
						<small>
							<?php echo Html::anchor("/user/remove_group/".$user->id."/".$group->id, "remove") ?>
						</small>
					</li>
				<?php endforeach; ?>
				</ul>
			</td>
			<td>
				<form action="/user/add_group">
					<?php echo Form::hidden('user_id', $user->id); ?>
					<?php echo Form::select('group_id', 0, Model_Group::get_groups(), array('class' => 'input-small')); ?>
					<?php echo Form::submit("add", "+") ?>
				</form>
			</td>
			<td>
				<?php if ($user->activated) : ?>
					<?php echo Html::anchor("/user/deactivate/{$user->id}", "Deactivate user", array("class" => "btn btn-mini btn-danger")) ?>
				<?php else : ?>
					<?php echo Html::anchor("/user/activate/{$user->id}", "Activate user", array("class" => "btn btn-mini btn-success")) ?>
				<?php endif ?>
			</td>
		</tr>
<?php endforeach; ?>
	</tbody>
</table>

<?php else: ?>

<?php endif; ?>