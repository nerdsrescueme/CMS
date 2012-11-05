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
				
				<div class="item">
					<blockquote>"We really enjoyed the activity “Why We Click With Some and Clank With Others”.  By the end of the day not only were we all clicking but calling each other but the letter that identified us (i.e. D, I, S, or C).  Dan was great and by adding his personal stories made everything relatable."</blockquote>
					<p>&mdash; Ailyn Thurman, MetaCure (USA) Inc.</p>
				</div>
				<div class="item">
					<blockquote>"Your DISC presentation was extremely well done.  You presented the content thoroughly, in a manner that made it relevant for the audience AND was enjoyable.  There is an art to doing that and it is something that I greatly respect and appreciate. I have worked with the DiSC material with other groups.  The element that I thought was a great upgrade to what I had seen previously was the use of the DiSC style to tailor and "sell" their message or concept to resonate with all."</blockquote>
					<p>&mdash; Jackie Boatwright, W.L. Gore & Associates, Inc.</p>
				</div>
				<div class="item">
					<blockquote>"Thank you so much for the wonderful day!  Everyone found the session incredibly helpful.  It was pretty amazing, after we understood the different styles, it gave us the language to use so that no one got offended.  All I keep thinking is "what a great result- finally we can talk and accept each other without feelings getting hurt."  I think this result will be so significant to the success of our program."</blockquote>
					<p>&mdash; Whitney, Fox Rothschild</p>
				</div>
				<div class="item">
					<blockquote>"The DiSC is an extremely valuable tool which has enlightened our entire staff to understand and implement the Platinum Rule.  Knowledge of the DiSC immediately increased our morale by restructuring our interactions with one another through enhanced awareness of our individuality.  The Personalized Action Planning Sessions were a key component to the changed environment of our office. Dan Silvert was instrumental in the change through his ability to recognize and communicate to each of us our strengths and provide guidance on how to overcome our weaknesses."</blockquote>
					<p>&mdash; Teri Johnson, CPA, Fellner & Kuhn, P.C.</p>
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
