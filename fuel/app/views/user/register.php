<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>CMS User Registration</title>

	<?php echo Asset::css('bootstrap.css') ?>

	<style type="text/css">
	html, body {
		background-color: #eee;
	}
	.container > footer {
		margin-top: 12px;
		text-align: center;
	}
	.container {
		margin-top: 60px;
		width: 460px;
	}
	.content {
		background-color: #fff;
		padding: 20px;
		margin: 0 -20px;
		-webkit-border-radius: 0 0 6px 6px;
		   -moz-border-radius: 0 0 6px 6px;
		        border-radius: 0 0 6px 6px;
		-webkit-box-shadow: 0 1px 2px rgba(0,0,0,.15);
		   -moz-box-shadow: 0 1px 2px rgba(0,0,0,.15);
		        box-shadow: 0 1px 2px rgba(0,0,0,.15);
	}
	.page-header {
		background-color: #f5f5f5;
		padding: 20px 20px 10px;
		margin: -20px -20px 20px;
	}
	.content .span4 {
		margin-left: 0;
		padding-left: 19px;
		border-left: 1px solid #eee;
	}
	</style>
</head>

<body>

<?php if($message = Session::get_flash('success')) : ?>
<p>Success: <?php echo $message ?></p>
<?php endif ?>

<div class="container">

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

<footer>
	<p>Powered by: The Nerd CMS</p>
</footer>

</div> <!-- /container -->

</body>
</html>
