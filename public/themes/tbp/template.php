<!DOCTYPE html>   
<html lang="en" class="no-js">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>Team Builders Plus, Concept 1</title>
	<meta name="description" content="">
	<meta name="keywords" content="">

	<link rel="stylesheet" href="/themes/tbp/assets/css/bootstrap.css?v=1" media="screen">
	<link rel="stylesheet" href="/themes/tbp/assets/css/style1.css?v=1" media="screen">
</head>

<body>

<div id="container" class="container">

<header id="header" class="row">
	<div id="info" class="span12">
		<p class="pull-left" data-editable="global">We have some an important message! <a href="#">Read more</a> about it!</p>
		<p id="social" class="pull-right" data-editable="global">
			<a href="http://twitter.com/TeamBuildrsPlus" title="Follow us on Twitter"><img src="/themes/tbp/assets/img/icons-social/twitter_16.png"></a>
			<a href="http://facebook.com/TeamBuildersPlus" title="Fan us on Facebook"><img src="/themes/tbp/assets/img/icons-social/facebook_16.png"></a>
			<a href="http://linkedin.com/TeamBuildersPlus" title="Connect with us on LinkedIn"><img src="/themes/tbp/assets/img/icons-social/linkedin_16.png"></a>
			<a href="http://digg.com" title="Digg This"><img src="/themes/tbp/assets/img/icons-social/digg_16.png"></a>
			<a href="http://google.com" title="Google +1"><img src="/themes/tbp/assets/img/icons-social/google_plus_16.png"></a>
			<a href="http://stumbleupon.com" title="Stumble Upon This"><img src="/themes/tbp/assets/img/icons-social/stumbleupon_16.png"></a>
			<a href="http://vimeo.com" title="See our Vimeo Channel"><img src="/themes/tbp/assets/img/icons-social/vimeo_16.png"></a>
			<a href="http://youtube.com" title="Visit our YouTube Channel"><img src="/themes/tbp/assets/img/icons-social/youtube_16.png"></a>
		</p>
	</div>
	<div id="logo" class="span3"><a href="#">Team Builders Plus</a></div>
	<nav id="main-nav" class="span9">
		<ul>
			<li>
				<a href="#nowhere">About<small>who we are</small></a>
				<ul>
					<li><a href="#">Item One</a></li>
					<li><a href="#">Item Two</a></li>
				</ul>
			</li>
			<li><a href="#nowhere">Services<small>what we do</small></a></li>
			<li><a href="#nowhere">Cities<small>in your area</small></a></li>
			<li><a href="#nowhere">Blog<small>read on</small></a></li>
			<li><a href="#nowhere">Contact<small>get in touch</small></a></li>
		</ul>
	</nav>
	<div class="span12" class="bottom-border"> </div><!-- Nasty hack -->
</header>

<section id="tagline" class="row home">
	<?php if ($layout and $layout == 'home') : ?> 
	<div id="slider" class="span12 carousel slide">
		<div class="carousel-inner">
			<div class="item active">
				<img src="/themes/tbp/assets/img/teamwork-figures.jpg">
			</div>
			<div class="item">
				<img src="/themes/tbp/assets/img/slider2.jpg">
			</div>
		</div>
		<a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
		<a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
	</div>
	<?php endif ?> 
	<div id="tagline-content" class="span12">
		<p id="login" class="pull-right">
		<?php if ($user = CMS::user_logged_in()) : ?> 
			Logged in as:
			<?php echo CMS::user_link($user) ?> - 
			<a href="/user/logout">logout</a>
		<?php else : ?> 
			<a href="/user/login">Login</a>
		<?php endif ?> 
		</p>

		<h1>Home Page</h1>
		<p>The homepage has a special marketing masthead</p>
	</div>
</section>

<?php echo $content ?> 

<footer id="footer">
	<div class="row">
		<div class="span4">
		<div class="bump-right" data-editable="global">
			<h4 class="underlined">Featured Program</h4>
			<p>That great America on the other side of the sphere, Australia, was given to the enlightened world by the whaleman. After its first blunder-born discovery by a Dutchman, all other ships long shunned those shores as pestiferously barbarous; but the whale-ship touched there. The whale-ship is the true mother of that now mighty colony.</p>
		</div>
		</div>
		<div class="span4" data-editable="global">
			<h4 class="underlined">From the Blog</h4>
			<ol>
				<li><a href="#">Post One Here</a> &mdash; 20 minutes ago</li>
				<li><a href="#">Second Posting</a> &mdash; 2 days ago</li>
				<li><a href="#">Lets try again</a> &mdash; 4 days ago</li>
				<li><a href="#">Keep Going for this one</a> &mdash; 8 days ago</li>
				<li><a href="#">And Once More!</a> &mdash; 10 days ago</li>
			</ol>
		</div>
		<div class="span4" data-editable="global">
		<div class="bump-left">
			<h4 class="underlined">Our Newsletter</h4>
			<p>Sign up to receive our monthly newsletter.</p>
			<p>{A sign up form goes here}</p>
		</div>
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
	$('#logo').click(function(){window.location = 'index.html'});
})
</script>

</body>
</html>