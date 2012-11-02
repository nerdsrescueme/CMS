<section id="recent" class="row">
	<div id="tf-event" class="span6" data-editable="global"><!-- start tf-event -->
		<h4 class="underlined">Latest Event: Bikes for the World</h4>
		<img src="/assets/img/uploads/team.jpg" class="bordered">
		<p>This area is reserved for a slightly longer description of a team building event you have hosted. It is dynamic and should contain links to areas within and outside <a href="#">read more</a></p>
	<!-- end tf-event --></div>
	<div id="tf-why" class="span6" data-editable="local"><!-- start tf-why -->
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
	<!-- end tf-why --></div>
</section>

<section id="choose" class="row">
	<div class="span6">
		<h4 class="underlined">Buzz for the book</h4>
		<div id="testimonials" class="carousel slide">
		<div class="carousel-inner">
			<div class="item active">
				<img src="/assets/img/uploads/Logos/campbells.gif" class="bordered left">
				<blockquote>"I enjoyed the exercises because they made the concepts more realistic and applicable."</blockquote>
				<p>&mdash; Cheryl Davis, <b>Campbell Soup Company</b></p>
			</div>
		</div>
		</div>
	</div>
	<div class="span6">
		<h4 class="underlined"><a href="http://twitter.com/TeamBuildrsPlus">Recent Tweets</a></h4>
		<ol id="tweets">
		<?php $twitter = CMS::twitter('MerrickR', 3); ?> 
		<?php foreach($twitter as $tweet) : ?> 
			<li><a href="#"><time><?php echo CMS::relative_date(strtotime($tweet['created_at'])) ?></time></a> <?php echo $tweet['text'] ?></li>
		<?php endforeach ?> 
		</ol>
	</div>
</section>
