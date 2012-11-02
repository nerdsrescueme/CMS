<section id="overview" class="row">
	<div id="tf-overview-1" data-editable="local" class="span4"><!-- start tf-overview-1 -->Content<!-- end tf-overview-1 --></div>
	<div id="tf-overview" data-editable="local" class="span4"><!-- start tf-overview --><h2>Welcome to Take Flight Learning</h2><p>On TakeFlightLearning.com you can order the book, download free training or classroom resources in conjunction with Taking Flight!: Master the DISC Styles to Transform your Career, Your Relationships…Your Life, learn about our Taking Flight! DISC trainers certification program,  find links to other DISC resources, and check out a wide range of articles on all things DISC.</p><!-- end tf-overview --></div>
	<div id="tf-overview-3" data-editable="local" class="span4"><!-- start tf-overview-3 -->Content<!-- end tf-overview-3 --></div>
</section>

<section id="recent" class="row">
	<div class="span6">
		<h4 class="underlined">Testimonials</h4>
		<div id="testimonials" class="carousel slide">
			<div class="carousel-inner">
				<div class="item active">
					<blockquote>"Taking Flight! is packed with life-changing insights about you and everyone you know. You'll never look at people quite the same way again"</blockquote>
					<p>&mdash; Marshall Goldsmith, Author of MOJO and What Got You Here Won't Get You There</p>
				</div>
				<div class="item">
					<blockquote>"Taking Flight! is an instant classic that will forever change how you see yourself and interact with others. The engaging fable that opens the book - and enlightening discussion that follows - should be read by anyone seeking growth and success."</blockquote>
					<p>&mdash; Ken Blanchard, Coauthor of The One Minute Manager and Lead with LUV</p>
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
