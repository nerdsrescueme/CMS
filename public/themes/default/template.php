<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>My Website</title>
	<!--<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lato:400,700">-->
	<?php echo Asset::css('bootstrap.css'); ?>
	<?php echo Asset::css('default.css'); ?>
</head>
<body>

<?php if ($m = CMS::flash()) : ?>
	<div id="flash" class="<?php echo $m['type'] ?>">
		<?php echo $m['message'] ?>
	</div>
<?php endif ?>

<?php if ($user = CMS::user_logged_in()) : ?>
	<p>
		Logged in as:
		<?php echo CMS::user_link($user) ?> - 
		<a href="/user/logout">logout</a>
	</p>
<?php else : ?>
	<p>
		<a href="/user/login">Login</a>
	</p>
<?php endif ?>

<div class="container layout-<?php echo @$page->layout_id  ?: 'basic' ?>">

<header id="header" class="row">
	<div id="logo" class="span4 mercury-region" data-type="editable"><a href="/">Nerd</a></div>
	<nav id="nav" class="span8">
		<ol>
			<li><a href="#">Contact Us</a></li>
			<li><a href="#">Second Link</a></li>
			<li><a href="/test">Test</a></li>
		</ol>
	</nav>
</header>

<?php echo $content ?>

</div> <!-- /Container -->

</body>
</html>
