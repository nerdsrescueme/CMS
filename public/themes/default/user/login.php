<div class="content">
	<div class="page-header">
		<h1>CMS <small>Administrative Login</small></h1>
	</div>
	<div class="row">
		<div class="span6">
		<?php
		if (isset($errors))
		{
			echo '<div class="alert alert-error">'.$errors.'</div>';
		}
		?>
		<form action="/user/login" method="post" class="form-inline">
		<fieldset class="control-group">
			<input type="text" class="span3" name="email" placeholder="Email Address">
			<input type="password" class="span2" name="password" placeholder="Password">
			<input type="hidden" name="remember" value="0">
			<button type="submit" class="btn">Login</button>
		</fieldset>
		</form>
		</div>
	</div>
</div><!-- /content -->