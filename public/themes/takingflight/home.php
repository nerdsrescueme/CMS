<section id="overview" class="row">
	<div id="tf-overview" data-editable="local" class="span6 offset3"><!-- start tf-overview -->Content<!-- end tf-overview --></div>
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
