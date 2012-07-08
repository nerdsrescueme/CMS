
<section id="features" class="row">
	<div class="span3"><div id="feature-1" data-editable="local"><!-- start feature-1 -->
		<h4 class="underlined">TBP Overview</h4>
		<img src="/themes/tbp/assets/img/icons-dark/cloud_flag.png" class="left">
		<p>This is a little bit of information about Team Builders Plus. I'm seeing a small, brief overview. Perhaps your mission statement.</p>
	<!-- end feature-1 --></div></div>
	<div class="span3"><div id="feature-2" data-editable="local"><!-- start feature-2 -->
		<h4 class="underlined">TBP In Your City</h4>
		<img src="/themes/tbp/assets/img/icons-dark/city_map.png" class="left">
		<p>Space is reserved for a single item that carries the message you wish to convey on your home page. Perhaps a bit of local information?</p>
	<!-- end feature-2 --></div></div>
	<div class="span3"><div id="feature-3" data-editable="local"><!-- start feature-3 -->
		<h4 class="underlined">Philly Networking Event</h4>
		<img src="/themes/tbp/assets/img/icons-dark/system_connection.png" class="left">
		<p>Reserved for another content area, perhaps with some images? Any bit of content can be used in here, but it should be regulated.</p>
	<!-- end feature-3 --></div></div>
	<div class="span3"><div id="feature-4" data-editable="local"><!-- start feature-4 -->
		<h4 class="underlined">And Another</h4>
		<img src="/themes/tbp/assets/img/icons-dark/simple_star.png" class="left">
		<p>Block is here to make sure you have enough space to convey what you want to get across. I'm out of random sentences for the night.</p>
	<!-- end feature-4 --></div></div>
</section>

<section id="recent" class="row">
	<div id="event" class="span6" data-editable="global"><!-- start event -->
		<h4 class="underlined">Latest Event: Bikes for the World</h4>
		<img src="/themes/tbp/assets/img/team.jpg" class="bordered">
		<p>This area is reserved for a slightly longer description of a team building event you have hosted. It is dynamic and should contain links to areas within and outside <a href="#">read more</a></p>
	<!-- end event --></div>
	<div class="span6">
		<h4 class="underlined"><a href="#">Testimonials</a></h4>
		<div id="testimonials" class="carousel slide">
		<div class="carousel-inner">
			<div class="item active">
				<img src="/themes/tbp/assets/img/headshot1.jpg" class="bordered left">
				<blockquote>"Team Builders Plus has been absolutely fantastic. There are so many good things to say I don't know where to start!"</blockquote>
				<p>&mdash; Cindy Brady, <b>The Bunch</b></p>
			</div>
			<div class="item">
				<img src="/themes/tbp/assets/img/headshot2.jpg" class="bordered left">
				<blockquote>I have some wonderful things to say as well, but I can't really put them into words right now.</blockquote>
				<p>&mdash; Andy Reed, <b>Philadelphia Eagles</b></p>
			</div>
			<div class="item">
				<img src="/themes/tbp/assets/img/headshot3.jpg" class="bordered left">
				<blockquote>I would like to take the opportunity to say that I really, really enjoy scrolling testimonials with headshots. Adds a personal touch.</blockquote>
				<p>&mdash; Frank Bardon, <b>Nerds, Rescue Me!</b></p>
			</div>
		</div>
	</div>
</section>

<section id="choose" class="row">
	<div id="why" class="span6" data-editable="local"><!-- start why -->
		<h4 class="underlined">Why Choose TBP?</h4>
		<div class="row">
			<div class="span3">
			<ul>
				<li>Quality Service</li>
				<li>Friendly People</li>
				<li>Lorem Ipsum Dolor</li>
				<li>Another Reason</li>
			</ul>
			</div>
			<div class="span3">
			<ul>
				<li>Quality Service</li>
				<li>Friendly People</li>
				<li>Lorem Ipsum Dolor</li>
			</ul>
			</div>
		</div>
	<!-- end why --></div>
	<div class="span6">
		<h4 class="underlined"><a href="http://twitter.com/TeamBuildrsPlus">Recent Tweets</a></h4>
		<ol id="tweets">
		<?php $twitter = CMS::twitter('TeamBuildrsPlus', 3); ?> 
		<?php foreach($twitter as $tweet) : ?> 
			<li><a href="#"><time><?php echo CMS::relative_date(strtotime($tweet['created_at'])) ?></time></a> <?php echo $tweet['text'] ?></li>
		<?php endforeach ?> 
		</ol>
	</div>
</section>
