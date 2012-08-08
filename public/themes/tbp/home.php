
<section id="recent" class="row">
	<div id="event" class="span6" data-editable="global"><!-- start event -->
		<h4 class="underlined">Latest Event: Bikes for the World</h4>
		<img src="/assets/img/uploads/team.jpg" class="bordered">
		<p>This area is reserved for a slightly longer description of a team building event you have hosted. It is dynamic and should contain links to areas within and outside <a href="#">read more</a></p>
	<!-- end event --></div>
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
</section>

<section id="choose" class="row">
	<div class="span6">
		<h4 class="underlined">Testimonials</h4>
		<div id="testimonials" class="carousel slide">
		<div class="carousel-inner">
			<div class="item active">
				<img src="/assets/img/uploads/Logos/peco.gif" class="bordered left">
				<blockquote>"Team Builders Plus identified underlying issues and developed programs based on their findings. We got just what we needed and it really made a difference."</blockquote>
				<p>&mdash; Ted Fiala, <b>PECO Energy</b></p>
			</div>
			<div class="item">
				<img src="/assets/img/uploads/Logos/campbells.gif" class="bordered left">
				<blockquote>"I enjoyed the exercises because they made the concepts more realistic and applicable."</blockquote>
				<p>&mdash; Cheryl Davis, <b>Campbell Soup Company</b></p>
			</div>
			<div class="item">
				<img src="/assets/img/uploads/Logos/campbells.gif" class="bordered left">
				<blockquote>"The quality and the usefulness of the 360 reports and the fact that we had group data added greatly to the overall leadership experience for our most senior people."</blockquote>
				<p>&mdash; Ian Cormack, <b>Campbell Soup Company</b></p>
			</div>
			<div class="item">
				<img src="/assets/img/uploads/Logos/hp.gif" class="bordered left">
				<blockquote>"Everyone just loved the event. All feedback was very positive for our meeting but your team building even was the highlight of the meeting."</blockquote>
				<p>&mdash; Kim Whittington, <b>Hewlett-Packard</b></p>
			</div>
			<div class="item">
				<img src="http://placehold.it/120x140&amp;text=Logo" class="bordered left">
				<blockquote>"Harvard Management Update rates Teambuildinginc.com as one of the 3 best sites for teams!"</blockquote>
				<p>&mdash; <b>Harvard Management</b></p>
			</div>
			<div class="item">
				<img src="/assets/img/uploads/Logos/chase.gif" class="bordered left">
				<blockquote>"The facilitator was an absolute pleasure to work with during both the planning stage and the actual event. Everything went off without a hitch&hellip;"</blockquote>
				<p>&mdash; Michael Sweeney, <b>Chase Home Lending</b></p>
			</div>
			<div class="item">
				<img src="/assets/img/uploads/Logos/mars.gif" class="bordered left">
				<blockquote>" The group was overwhelmingly happy with the results of our event and talked about it for the next day and a half.&hellip;"</blockquote>
				<p>&mdash; Minerva Moriole, <b>Mars, Incorporated</b></p>
			</div>
		</div>
		</div>
	</div>
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
