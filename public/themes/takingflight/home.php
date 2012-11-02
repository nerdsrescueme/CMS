<section id="overview" class="row">
	<div id="tf-overview" data-editable="local" class="span12"><!-- start tf-overview --><h2>Welcome to Take Flight Learning</h2><p>On TakeFlightLearning.com you can order the book, download free training or classroom resources in conjunction with Taking Flight!: Master the DISC Styles to Transform your Career, Your Relationships…Your Life, learn about our Taking Flight! DISC trainers certification program,  find links to other DISC resources, and check out a wide range of articles on all things DISC.</p>
<!-- end tf-overview --></div>
</section>

<section id="recent" class="row">
	<div class="span6">
		<h4 class="underlined">Testimonials</h4>
		<div id="testimonials" class="carousel slide">
			<div class="carousel-inner">
				<div class="item active">
					<blockquote>"I enjoyed the exercises because they made the concepts more realistic and applicable."</blockquote>
					<p>&mdash; Cheryl Davis, <b>Campbell Soup Company</b></p>
				</div>
				<div class="item">
					<blockquote>"The quality and the usefulness of the 360 reports and the fact that we had group data added greatly to the overall leadership experience for our most senior people."</blockquote>
					<p>&mdash; Ian Cormack, <b>Campbell Soup Company</b></p>
				</div>
			</div>
		</div>
	</div>
	<div class="span6">
		<h4 class="underlined"><a href="http://twitter.com/DISCStyles">Recent Tweets</a></h4>
		<ol id="tweets">
		<?php $twitter = CMS::twitter('DISCStyles', 3); ?> 
		<?php foreach($twitter as $tweet) : ?> 
			<li><a href="#"><time><?php echo CMS::relative_date(strtotime($tweet['created_at'])) ?></time></a> <?php echo $tweet['text'] ?></li>
		<?php endforeach ?> 
		</ol>
	</div>
</section>
