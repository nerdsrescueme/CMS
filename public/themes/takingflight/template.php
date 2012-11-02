<!DOCTYPE html>   
<html lang="en" class="no-js">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<?php if ($layout and $layout == 'home') : ?>
	<title>Take Flight Learning &mdash; Master the DISC behavior styles</title>
	<meta name="description" content="Team Builders Plus links development experiences to real-world business issues through team building programs, leadership development and one-on-one performance coaching.">
	<meta content="keywords" content="team building, leadership development, team builders plus, marlton new jersey">
	<?php else : ?>
	<title><?php echo $page->title ?> - <?php echo $page->subtitle ?></title>
	<meta name="description" content="<?php echo $page->description ?>">
	<meta name="keywords" content="<?php echo $page->keywords ?>">
	<?php endif ?>
	<link rel="stylesheet" href="/themes/takingflight/assets/css/bootstrap.css?v=1" media="screen">
	<link rel="stylesheet" href="/themes/takingflight/assets/css/style1.css?v=1" media="screen">
	
	<script src="/themes/takingflight/assets/js/modernizr.js"></script>
</head>

<body class="">

<div id="bird">
<?php  echo Random::choose(
	'<img src="/themes/takingflight/assets/img/birds/dorian.png" id="dorian" alt="Dorian (Dominant)" rel="tooltip" title="Hey! My name is Dorian!">',
	'<img src="/themes/takingflight/assets/img/birds/ivy.png" id="ivy" alt="Ivy (Interactive)" rel="tooltip" title="Hey! My name is Ivy!">',
	'<img src="/themes/takingflight/assets/img/birds/sarah.png" id="sarah" alt="Sarah (Supportive)" rel="tooltip" title="Hey! My name is Sarah!">',
	'<img src="/themes/takingflight/assets/img/birds/clark.png" id="clark" alt="Clark (Consciencious)" rel="tooltip" title="Hey! My name is Clark!">'
) ?> 
</div>

<div id="container" class="container">

<header id="header" class="row">
	<div id="info" class="span12">
		<p id="tf-top-message" class="pull-left" data-editable="global"><!-- start tf-top-message -->Header message<a href="#">Read more</a>.<!-- end tf-top-message --></p>
		<p id="social" class="pull-right">
			<a href="http://twitter.com/DISCStyles" title="Follow us on Twitter"><img src="/themes/takingflight/assets/img/icons-social/twitter_32.png"></a>
			<a href="https://www.facebook.com/TakingFlightwithDISC?sk=wall" title="Like us on Facebook"><img src="/themes/takingflight/assets/img/icons-social/facebook_32.png"></a>
			<a href="http://www.linkedin.com/groupRegistration?gid=3673115" title="Connect to us on LinkedIn"><img src="/themes/takingflight/assets/img/icons-social/linkedin_32.png"></a>
		</p>
	</div>
	<div id="logo" class="span4"><a href="#">Team Builders Plus</a></div>
	<nav id="main-nav" class="span8">
		<?php echo Navigation::build('TakingFlight') ?>
	</nav>
	<div class="span12" class="bottom-border"> </div><!-- Nasty hack -->
</header>

<section id="tagline" class="row home">
	<?php if ($layout and $layout == 'home') : ?> 
	<div id="slider" class="span12 carousel slide">
		<div class="carousel-inner">
			<div class="item active">
				<a href="#"><img src="/assets/img/uploads/Marketing/Success.png"></a>
			</div>
			<div class="item">
				<a href="#"><img src="/assets/img/uploads/Marketing/Leadership.png"></a>
			</div>
		</div>
	</div>
	<?php endif ?> 
	<div id="tagline-content" class="span12">
		<?php if ($layout and $layout == 'home') : ?> 
			<p>&nbsp;</p>
		<?php else : ?>
		<h1><?php echo $page->title ?></h1>
		<p><?php echo $page->subtitle ?></p>
		<?php endif ?>
	</div>
</section>

<?php echo $content ?> 

<footer id="footer">
	<div class="row">
		<div class="span4">
		<div id="tf-footer-1" class="bump-right" data-editable="global"><!-- start tf-footer-1 -->
			<h4 class="underlined">Featured Program: {Program}</h4>
			<p>Enter a program description.</p>
		<!-- end tf-footer-1 --></div>
		</div>
		<div id="tf-footer-2" class="span4" data-editable="global"><!-- start tf-footer-2 -->
			<h4 class="underlined">From the Blog</h4>
			<ol>
				<li><a href="#">Post One Here</a> &mdash; 20 minutes ago</li>
				<li><a href="#">Second Posting</a> &mdash; 2 days ago</li>
			</ol>
		<!-- end tf-footer-2 --></div>
		<div class="span4">
		<div id="tf-footer-3" class="bump-left" data-editable="global"><!-- start tf-footer-3 -->
			<h4 class="underlined">Our Newsletter</h4>
			<p>Sign up to receive our monthly newsletter.</p>
			<p>{A sign up form goes here}</p>
		<!-- end tf-footer-3 --></div>
		</div>
	</div>
	<div class="row"> </div>
</footer>

</div><!--!/#container -->

<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tinos:400,700|Shanti">
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="/themes/takingflight/assets/js/bootstrap-transition.js"></script>
<script src="/themes/takingflight/assets/js/bootstrap-tooltip.js"></script>
<script src="/themes/takingflight/assets/js/bootstrap-carousel.js"></script>
<script src="/themes/takingflight/assets/js/bootstrap-dropdown.js"></script>

<script type="text/javascript">
$(document).ready(function() {
	$('#slider').carousel({ interval: 9000 })
	$('#social a[title]').tooltip({ placement: 'bottom' })
	//$('img[rel=tooltip]').tooltip({ placement: 'top' })
	$('#testimonials').carousel({ interval: 7000 })
	
	$('#social img')
		.mouseover(function(event) {
			$(this).animate({width: '20px', height: '20px'})
		})
		.mouseout(function(event) {
			$(this).animate({width: '18px', height: '18px'})
		})
})

/*
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-972486-1']);
_gaq.push(['_trackPageview']);

(function() {
	var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
*/
</script>

</body>
</html>