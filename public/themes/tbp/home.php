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

<section class="row">
	<div class="span4" id="row-2-1" data-editable="local"><!-- start row-2-1 -->
		Content
	<!-- end row-2-1 --></div>
	<div class="span4" id="row-2-2" data-editable="local"><!-- start row-2-2 -->
		Content
	<!-- end row-2-2 --></div>
	<div class="span4" id="row-2-3" data-editable="local"><!-- start row-2-3 -->
		Content
	<!-- end row-2-3 --></div>
</section>

<section id="choose" class="row">
	<div class="span6">
		<h4 class="underlined">Testimonials</h4>
		<div id="testimonials" class="carousel slide">
		<div class="carousel-inner">
			<div class="item active">
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
				<img src="/assets/img/uploads/Logos/mars.gif" class="bordered left">
				<blockquote>" The group was overwhelmingly happy with the results of our event and talked about it for the next day and a half&hellip;"</blockquote>
				<p>&mdash; Minerva Moriole, <b>Mars, Incorporated</b></p>
			</div>

			<div class="item">
				<img src="/assets/img/uploads/Logos/janssen.gif" class="bordered left">
				<blockquote>"&hellip;The sessions were engaging (especially Team Samurai), with practical suggestions, and the right amount of humor thrown in. We would highly recommend TeamBuilders Plus for your corporate needs!"</blockquote>
				<p>&mdash; Kelly O&#39;Shea, <b>Janssen</b></p>
			</div>
			<div class="item">
				<img src="/assets/img/uploads/Logos/1st-advantage.gif" class="bordered left">
				<blockquote>"Merrick did a fantastic job facilitating at our Manager’s Retreat. His sessions were relevant, practical and customized for our team. The feedback from the Managers was so positive that we are having him back for this year’s Retreat!"</blockquote>
				<p>&mdash; Lisa Church, <b>1st Advantage FCU</b></p>
			</div>
			<div class="item">
				<img src="/assets/img/uploads/Logos/carefirst-bxbs.gif" class="bordered left">
				<blockquote>"I haven’t heard such buzz after one of our events – ever.  We’ve had an unprecedented number of associates comment to us about how pleased they were to be part of the day’s activities&hellip;"</blockquote>
				<p>&mdash; Becky Jones, <b>CareFirst BlueCross BlueShield</b></p>
			</div>
			<div class="item">
				<img src="/assets/img/uploads/Logos/quadrant.gif" class="bordered left">
				<blockquote>"I want you to know that I am using my skills and had a cool experience yesterday when one of the other attendees who attended our training session stopped what she was doing to thank me in perfect “S” style&hellip;"</blockquote>
				<p>&mdash; Christine, <b>Quadrant EPP, USA</b></p>
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
