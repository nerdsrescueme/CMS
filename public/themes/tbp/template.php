<!DOCTYPE html>   
<html lang="en" class="no-js">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<?php if ($layout and $layout == 'home') : ?>
	<title>Team Building and Leadership Development by Team Builders Plus</title>
	<meta name="description" content="Team Builders Plus links development experiences to real-world business issues through team building programs, leadership development and one-on-one performance coaching.">
	<meta content="keywords" content="team building, leadership development, team builders plus, marlton new jersey">
	<?php else : ?>
	<title><?php echo $page->title ?> - <?php echo $page->subtitle ?></title>
	<meta name="description" content="<?php echo $page->description ?>">
	<meta name="keywords" content="<?php echo $page->keywords ?>">
	<?php endif ?>
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
			<a href="hhttp://www.youtube.com/user/TeamBuildersPlus" title="Visit our YouTube Channel"><img src="/themes/tbp/assets/img/icons-social/youtube_32.png"></a>
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
			<li>
				<a href="/leadership-development">Leadership<small>Development</small></a>
				<ul>
					<li><a href="http://www.360-degreefeedback.com/" target="_blank">360 Degree Feedback</a></li>
				</ul>
			</li>
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
			<li>
				<a href="http://www.takingflightwithdisc.com" target="_blank">Taking Flight<small>With <acronym title="Dominant, Interactive, Supportive, Conscientious">DISC</a></small></a>
				<ul>
					<li><a href="http://www.takingflightwithdisc.com/book" target="_blank">The Book</a></li>
					<li><a href="http://www.takingflightwithdisc.com/speaking" target="_blank">Speaking/Keynote</a></li>
					<li><a href="http://www.takingflightwithdisc.com/shop" target="_blank">Products</a></li>
					<li><a href="http://www.takingflightwithdisc.com/blog" target="_blank">Blog</a></li>
					<li><a href="http://www.takingflightwithdisc.com/resources" target="_blank">Resources</a></li>
				</ul>
			</li>
			<li>
				<a href="/blog/team-building">Blog</a>
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
				<a href="/about"><img src="/assets/img/uploads/Marketing/Success.png"></a>
			</div>
			<div class="item">
				<a href="/leadership-development"><img src="/assets/img/uploads/Marketing/Leadership.png"></a>
			</div>
			<div class="item">
				<a href="/team-building/all-programs"><img src="/assets/img/uploads/Marketing/Team.png"></a>
			</div>
		</div>
	</div>
	<?php endif ?> 
	<div id="tagline-content" class="span12">
	
		<div id="rfp" class="pull-right">
			<a href="http://teambuildersplus.wufoo.com/forms/request-for-proposal-team-builders-plus/" target="_blank" class="btn btn-warning" rel="tooltip" title="Want to know more?"><i class="icon-comment icon-white"></i> Request a Proposal</a>
		</div>
	
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
	<div class="row">
		<div class="span12">
			<p style="text-align:center;margin-top:24px">
				Website &copy; 2012 <acronym title="Team Builders Plus">TBP</acronym> &mdash;
				112A Centre Blvd. Marlton, NJ 08053 &mdash; USA (888) 672-1120 &mdash; Int'l +1 (856) 596-4196
			</p>
		</div>
	</div>
</footer>

</div><!--!/#container -->

<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lato:400,700|Shanti">
<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="/themes/tbp/assets/js/bootstrap-transition.js"></script>
<script src="/themes/tbp/assets/js/bootstrap-tooltip.js"></script>
<script src="/themes/tbp/assets/js/bootstrap-carousel.js"></script>
<script src="/themes/tbp/assets/js/bootstrap-dropdown.js"></script>

<script type="text/javascript">
$(document).ready(function() {
	$('#slider').carousel({ interval: 9000 })
	$('#social a[title]').tooltip({ placement: 'bottom' })
	$('a[rel=tooltip]').tooltip({ placement: 'top' })
	$('#testimonials').carousel({ interval: 6000 })
	
	$('#social img')
		.mouseover(function(event) {
			$(this).animate({width: '20px', height: '20px'})
		})
		.mouseout(function(event) {
			$(this).animate({width: '18px', height: '18px'})
		})
})

var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-972486-1']);
_gaq.push(['_trackPageview']);

(function() {
	var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
</script>

</body>
</html>