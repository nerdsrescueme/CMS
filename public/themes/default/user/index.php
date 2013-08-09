<?php if ($users): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Username</th>
			<th>Email</th>
			<th>Created at</th>
			<th>Activated</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($users as $user): ?>
		<tr>
			<td><?php echo $user->username ?></td>
			<td><?php echo $user->email ?></td>
			<td><?php echo date("m/d/Y", $user->created_at) ?></td>
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