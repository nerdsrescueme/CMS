<div class="content">
	<div class="page-header">
		<h1>CMS <small>User Registration</small></h1>
	</div>
	<div class="row">
		<div class="span6">
		<?php
		if (isset($errors))
		{
			echo '<div class="alert alert-error">'.$errors.'</div>';
		}
		?>
		<form action="/user/register" method="post" class="form-horizontal">
		<fieldset>
			<div class="control-group">
				<label class="control-label" for="username">Username</label>
				<div class="controls">
					<input type="text" name="username">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="email">Email</label>
				<div class="controls">
					<input type="email" name="email">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="password">Password</label>
				<div class="controls">
					<input type="password" name="password">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="confirm">Confirm Password</label>
				<div class="controls">
					<input type="password" name="confirm">
				</div>
			</div>
			<button type="submit" class="btn btn-large">Login</button>
		</fieldset>
		</form>
		</div>
	</div>
</div><!-- /content -->
