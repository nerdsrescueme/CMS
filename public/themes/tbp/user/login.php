<div class="content row-fluid">
	<div class="page-header span5">
		<h3>Restricted Access <small>Please Login</small></h3>
		<p>Team Builders Plus is a Preferred Vendor for Meeting Planners and DMCs from around the country. Our world-class team building programs, exceptional customer service, ease of scheduling and competitive pricing differentiates us from other team building firms.</p>
		<p>If you are currently a Team Builders Plus partner, please log in.</p>
		<p>If you are interested in becoming a Team Builders Plus partner, contact us at 856-596-4196 to learn more.</p>
	</div>
	<div class="span5 well">
		<?php
		if (isset($errors))
		{
			echo '<div class="alert alert-error">'.$errors.'</div>';
		}
		?>
		<form action="/user/login" method="post" class="form-stacked">
		<input type="hidden" name="remember" value="0">
		<fieldset class="control-group">
			<div class="control-group">
				<label class="control-label">Email address</label>
				<div class="controls">
					<input type="text" class="input-medium" name="email" placeholder="Email Address">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Password</label>
				<div class="controls">
					<input type="password" class="input-medium" name="password" placeholder="Password">
				</div>
			</div>
			<button type="submit" class="btn">Login</button>
		</fieldset>
		</form>
	</div>
</div><!-- /content -->