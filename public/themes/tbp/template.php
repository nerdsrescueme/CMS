<!DOCTYPE html>   
<html lang="en" class="no-js">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Team Builders Plus, Concept 1</title>
	<meta name="description" content="<?php echo $page->description ?>">
	<meta name="keywords" content="<?php echo $page->keywords ?>">

	<link rel="stylesheet" href="/themes/tbp/assets/css/bootstrap.css?v=1" media="screen">
	<link rel="stylesheet" href="/themes/tbp/assets/css/style1.css?v=1" media="screen">
</head>

<body>

<div id="container" class="container">

<header id="header" class="row">
	<div id="info" class="span12">
		<p id="top-message" class="pull-left" data-editable="global"><!-- start top-message -->Header message<a href="#">Read more</a>.<!-- end top-message --></p>
		<p id="social" class="pull-right">
			<a href="http://twitter.com/TeamBuildrsPlus" title="Follow us on Twitter"><img src="/themes/tbp/assets/img/icons-social/twitter_32.png"></a>
			<a href="http://facebook.com/TeamBuildersPlus" title="Fan us on Facebook"><img src="/themes/tbp/assets/img/icons-social/facebook_32.png"></a>
			<a href="http://linkedin.com/TeamBuildersPlus" title="Connect with us on LinkedIn"><img src="/themes/tbp/assets/img/icons-social/linkedin_32.png"></a>
			<a href="http://google.com" title="Google +1"><img src="/themes/tbp/assets/img/icons-social/google_plus_32.png"></a>
			<a href="http://youtube.com" title="Visit our YouTube Channel"><img src="/themes/tbp/assets/img/icons-social/youtube_32.png"></a>
		</p>
	</div>
	<div id="logo" class="span3"><a href="#">Team Builders Plus</a></div>
	<nav id="main-nav" class="span9">
		<ul>
			<li><a href="/">Home</a></li>
			<li>
				<a href="/about">About Us<small></small></a>
				<ul>
					<li><a href="/about/press-releases">Press Releases</a></li>
					<li><a href="/about/staff">Staff</a></li>
					<li><a href="/about/mission-vision-values">Mission, Vision, Values</a></li>
				</ul>
			</li>
			<li><a href="/leadership-development">Leadership<small>Development</small></a></li>
			<li>
				<a href="/team-building">Team<small>Building</small></a>
				<ul>
					<li><a href="/team-building/all-programs">All Programs</a></li>
					<li><a href="/team-building/fun-events">Fun Events</a></li>
					<li><a href="/team-building/large-group">Large Group</a></li>
					<li><a href="/team-building/philanthropic">Philanthropic</a></li>
					<li><a href="/team-building/senior-teams">Senior Teams</a></li>
					<li><a href="/team-building/treasure-hunts">Treasure Hunts</a></li>
					<li><a href="/team-building/team-development">Team Development</a></li>
				</ul>
			</li>
			<li><a href="/taking-flight">Book<small>Taking Flight</small></a></li>
			<li>
				<a href="/blog">Blog</a>
				<ul>
					<li><a href="/blog/team-building">Team Building</a></li>
					<li><a href="/blog/leadership-development">Leadership Development</a></li>
				</ul>
			</li>
		</ul>
	</nav>
	<div class="span12" class="bottom-border"> </div><!-- Nasty hack -->
</header>

<section id="tagline" class="row home">
	<?php if ($layout and $layout == 'home') : ?> 
	<div id="slider" class="span12 carousel slide">
		<div class="carousel-inner">
			<div class="item active">
				<img src="/themes/tbp/assets/img/marketing/Success.png">
			</div>
			<div class="item">
				<img src="/themes/tbp/assets/img/marketing/Leadership.png">
			</div>
			<div class="item">
				<img src="/themes/tbp/assets/img/marketing/Team.png">
			</div>
		</div>
		<a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
		<a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
	</div>
	<?php endif ?> 
	<div id="tagline-content" class="span12">
	
		<p id="rfp" class="pull-right"><a href="http://teambuildersplus.wufoo.com/forms/request-for-proposal-team-builders-plus/" target="_blank">Request a Proposal</a></p>
	
		<!--<p id="login" class="pull-right">
		<?php if ($user = CMS::user_logged_in()) : ?> 
			Logged in as:
			<?php echo CMS::user_link($user) ?> - 
			<a href="/user/logout">logout</a>
		<?php else : ?> 
			<a href="/user/login">Login</a>
		<?php endif ?> 
		</p>-->

		<h1><?php echo $page->title ?></h1>
		<p><?php echo $page->subtitle ?></p>
	</div>
</section>

<?php echo $content ?> 

<footer id="footer">
	<div class="row">
		<div class="span4">
		<div id="footer-1" class="bump-right" data-editable="global"><!-- start footer-1 -->
			<h4 class="underlined">Featured Program: {Program}</h4>
			<p>Enter a program description.</p>
		<!-- end footer-1 --></div>
		</div>
		<div id="footer-2" class="span4" data-editable="global"><!-- start footer-2 -->
			<h4 class="underlined">From the Blog</h4>
			<ol>
				<li><a href="#">Post One Here</a> &mdash; 20 minutes ago</li>
				<li><a href="#">Second Posting</a> &mdash; 2 days ago</li>
			</ol>
		<!-- end footer-2 --></div>
		<div class="span4">
		<div id="footer-3" class="bump-left" data-editable="global"><!-- start footer-3 -->
			<h4 class="underlined">Our Newsletter</h4>
			<p>Sign up to receive our monthly newsletter.</p>
			<p>{A sign up form goes here}</p>
		<!-- end footer-3 --></div>
		</div>
	</div>
	<div class="row"> </div>
</footer>

</div><!--!/#container -->

<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lato:400,700|Shanti">
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="/themes/tbp/assets/js/bootstrap-transition.js"></script>
<script src="/themes/tbp/assets/js/bootstrap-tooltip.js"></script>
<script src="/themes/tbp/assets/js/bootstrap-carousel.js"></script>
<script src="/themes/tbp/assets/js/bootstrap-dropdown.js"></script>

<script>

$(document).ready(function() {
	$('#slider').carousel({ interval: 9000 });
	$('#social a[title]').tooltip({ placement: 'bottom' });
	$('#testimonials').carousel({ interval: 6000 });
	$('#rfp').hide().delay(200).fadeIn('slow');
	
	$('#social img')
	.mouseover(function(event) {
		$(this).animate({width: '20px', height: '20px'})
	})
	.mouseout(function(event) {
		$(this).animate({width: '18px', height: '18px'})
	})
})
</script>

</body>
</html>