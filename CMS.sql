-- MySQL dump 10.13  Distrib 5.1.56, for apple-darwin10.3.0 (i386)
--
-- Host: localhost    Database: CMS
-- ------------------------------------------------------
-- Server version	5.1.56

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `level` int(11) NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `parent` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` VALUES (33,'banned',0,0,0),(32,'guest',1,0,0),(31,'user',100,0,0),(30,'writer',300,1,0),(29,'editor',500,1,0),(28,'admin',900,1,0),(27,'super',1000,1,0);
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `htmls`
--

DROP TABLE IF EXISTS `htmls`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `htmls` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_id` int(11) NOT NULL DEFAULT '0',
  `key` varchar(32) NOT NULL,
  `data` text NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `htmls`
--

LOCK TABLES `htmls` WRITE;
/*!40000 ALTER TABLE `htmls` DISABLE KEYS */;
INSERT INTO `htmls` VALUES (1,0,'top-message','Important Callout<!-- end top-message -->',1341628199,1341950150),(2,0,'event','<!-- start event -->\n		<h4 class=\"underlined\">Latest Event: {Event}</h4>\n		<img src=\"http://placehold.it/450x120&amp;text=Event+Photo\" class=\"bordered\">\n		<p>Brief description here.</p>\n	<!-- end event -->',1341628199,1341946655),(3,0,'footer-1','<!-- start footer-1 -->\n			<h4 class=\"underlined\">Featured Program: Movie Mayhem!</h4>\n			<p>In Movie Mayhem, you’re given the props, the costumes, the camera, and a healthy dose of team building inspiration before being unleashed to create a short film about the core theme you’ve chosen to portray your team’s performance <a href=\"/team-building/movie-mayhem\" target=\"_top\">read more</a>!</p>\n		<!-- end footer-1 -->',1341628199,1341950150),(4,0,'footer-2','<!-- start footer-2 -->\n			<h4 class=\"underlined\">From the Blog</h4>\n			<ol>\n				<li><a href=\"/blog/team-building/bicycle-building-is-team-building\" target=\"_top\">Bicycle building is team building </a>— 07-01-2012</li>\n				<li><a href=\"/blog/leadership-development/leaf\" target=\"_top\">How can I resolve a conflict? </a>— 07-01-2012</li>\n			</ol>\n		<!-- end footer-2 -->',1341628199,1341950150),(20,15,'main','<!-- start main -->\n<img src=\"http://placehold.it/620x180\" class=\"bordered centered\"><p class=\" drop-cap\" =\"\"=\"\">Team Builders Plus was founded in 1991 with the passion to develop the skills that ensure long-lasting personal, professional, and organizational success. Our experienced staff helps identify client needs through individual, team, and organizational assessment. We link development experiences to real-world business issues through one-on-one performance coaching and training programs.</p><p></p><p>Our team building programs range from fun team retreats to intensive team interventions and everything in between. Our leadership development programs target basic supervisory skills, as well as the higher-level competencies needed by senior executives. Programs are fun, memorable, and create lasting results. By integrating training sessions with one-on-one coaching, individuals achieve maximum results.</p><p>Team Builders Plus assessment services help individuals, teams and organizations to gain a clear perspective of their strengths and challenges. Our online survey system is state-of-the-art. And our survey design experts turn 360-degree feedback processes, team evaluation, and organizational climate surveys into the foundation for success.</p><p>Our website <a href=\"http://360-DegreeFeedback.com\" target=\"_top\">360-DegreeFeedback.com</a>&nbsp;provides information and resources to help organizations effectively conduct 360 processes. Our <a href=\"http://AssessmentTools.com\" target=\"_top\">AssessmentTools.com</a>&nbsp;and <a href=\"http://2020InsightGOLD.com\" target=\"_top\">2020InsightGOLD.com</a>&nbsp;sites offer the behavioral profiles, personal assessments, and survey software to help organizations develop their people.</p><p>We believe that our unwavering commitment to continually develop our own skills and constantly seek the most effective methods and tools for transforming people, teams, and organizations has led to our ongoing success. We strive to be the leading team building company in the United States and fully engage our hearts and minds to fulfill that reality.</p><p><br></p><p><br></p>\n<!-- end main -->',1341895356,1341945999),(5,0,'footer-3','<!-- start footer-3 -->\n			<h4 class=\"underlined\">Our Newsletter</h4>\n<form name=\"ccoptin\" class=\"form-inline\" action=\"http://visitor.r20.constantcontact.com/d.jsp\" target=\"_blank\" method=\"post\">Enter your email address to receive our monthly team building updates\n<br><br><input type=\"text\" name=\"ea\" class=\"input-large\" placeholder=\"Email Address\">\n<input type=\"submit\" value=\"Signup\" name=\"go\" class=\"btn btn-mini\"></form>\n<!-- end footer-3 -->',1341628199,1341950150),(6,0,'feature-1','<!-- start feature-1 -->\n		<h4 class=\"underlined\">Team Building</h4>\n		<img src=\"/themes/tbp/assets/img/icons-dark/cloud_flag.png\" class=\"left\">\n		<p>Description</p>\n	<!-- end feature-1 -->',1341628199,1341946655),(7,0,'feature-2','<!-- start feature-2 -->\n		<h4 class=\"underlined\">Leadership Development</h4>\n		<img src=\"/themes/tbp/assets/img/icons-dark/city_map.png\" class=\"left\">\n		<p>Description</p>\n	<!-- end feature-2 -->',1341628199,1341946655),(8,0,'feature-3','<!-- start feature-3 -->\n		<h4 class=\"underlined\">Taking Flight!</h4>\n		<img src=\"/themes/tbp/assets/img/icons-dark/system_connection.png\" class=\"left\">\n		<p>Description</p>\n	<!-- end feature-3 -->',1341628199,1341946655),(9,0,'feature-4','<!-- start feature-4 -->\n		<h4 class=\"underlined\">360 Degree Feedback</h4>\n		<img src=\"/themes/tbp/assets/img/icons-dark/simple_star.png\" class=\"left\">\n		<p>Description</p>\n	<!-- end feature-4 -->',1341628199,1341946655),(10,0,'choose','<!-- start choose -->\n	<div id=\"why\" class=\"span6\">\n		<h4 class=\"underlined\">Why Choose TBP?</h4>\n		<div class=\"row\">\n			<div class=\"span3\">\n			<ul>\n				<li>Quality Service</li>\n				<li>Friendly People</li>\n				<li>Lorem Ipsum Dolor</li>\n				<li>Another Reason</li>\n			</ul>\n			</div>\n			<div class=\"span3\">\n			<ul>\n				<li>Quality Service</li>\n				<li>Friendly People</li>\n				<li>Lorem Ipsum Dolor</li>\n			</ul>\n			</div>\n		</div>\n	<!-- end choose --></div>\n	<div class=\"span6\">\n		<h4 class=\"underlined\"><a href=\"http://twitter.com/TeamBuildrsPlus\" target=\"_top\">Recent Tweets</a></h4>\n		<ol id=\"tweets\">\n			<li><a href=\"#\" target=\"_top\"><time>about 26 minutes ago</time></a> This is one of my 140 character tweets from Twitter!</li>\n			<li><a href=\"#\" target=\"_top\"><time>about 18 minutes ago</time></a> I just posted this fantastic link up, check it out. <a href=\"#\" target=\"_top\">#links</a></li>\n			<li><a href=\"#\" target=\"_top\"><time>about 2 minutes ago</time></a> This is one of my 140 character tweets from Twitter! Just needs to be a little bit longer.</li>\n		</ol>\n	</div>\n',1341628199,1341628199),(11,0,'why','<!-- start why -->\n		<h4 class=\"underlined\">Why Choose TBP?</h4>\n		<div class=\"row\">\n			<div class=\"span3\">\n			<ul>\n				<li>Item One</li>\n			</ul>\n			</div>\n			<div class=\"span3\">\n			<ul>\n				<li>Item Two</li>\n			</ul>\n			</div>\n		</div>\n	<!-- end why -->',1341628379,1341946655),(19,0,'about-navigation','<!-- start about-navigation -->\n	<ol>\n		<li class=\"active\"><a href=\"/about\" target=\"_top\">About Us</a></li><li class=\"active\"><a href=\"/about/press-releases\" target=\"_top\">Press Releases</a></li><li class=\"active\"><a href=\"/about/staff\" target=\"_top\">Our Staff</a></li><li class=\"active\"><a href=\"/about/mission-vision-values\" target=\"_top\">Mission, Vision &amp; Values</a></li>\n	</ol>\n	<!-- end about-navigation -->',1341895356,1341945999),(13,11,'main-body','\n	<h2>Main Headline Here</h2><p>Fusce nec pretium diam. Morbi ac urna ut est pulvinar tristique. <em>Aliquam erat volutpat</em>. Morbi eu ligula tortor, nec fermentum ipsum. Vestibulum pellentesque eleifend arcu, sed vestibulum magna consequat vitae. In tincidunt facilisis nunc, et fringilla lorem gravida non. Etiam in lobortis leo.</p>\n',1341778073,1341778113),(12,10,'main','<!-- start main -->\n		<h2>Main Headline</h2>\n		<p>Main body content goes here. This content needs to be replaced!</p>\n		<h3>Secondary Headline</h3>\n		<p>Secondary content goes here. This content needs to be replaced!</p>\n	<!-- end main -->',1341628428,1341628428),(14,0,'blog-categories','<!-- start blog-categories -->\n	<ol>\n		<li><a href=\"/blog/team-building\" target=\"_top\">Team Building</a></li><li><a href=\"/blog/leadership-development\" target=\"_top\">Leadership Development</a></li>\n	<!-- end blog-categories --></ol>\n	\n	\n	\n	\n	\n	\n	',1341778157,1341950150),(15,11,'main','<!-- start main -->\n<img src=\"http://placehold.it/610x220\" class=\"centered bordered\">\n	<p class=\"drop-cap first-paragraph\">Recently, there were quite a few articles published about a government agency who spent $822,000 on a retreat in Las Vegas for 300 employees.&nbsp; The New York Times listed the break down of their expenditures, including $75,000 on a “bicycle building project” designed as a “team-building exercise”.&nbsp; Another source wrote that the group spent “$75,000 to build a bike”.&nbsp; Regardless of how frivolous the agency wasted tax payer dollars, the reporters who write the articles clearly have no concept of what a team building program is.</p><p>To some people, team building is just going to a bar after work and hanging out.&nbsp; To others, its going to a popular indoor arcade establishment for grown-ups to play &nbsp;video games or bowl.&nbsp; Team building &nbsp;programs allow your team to be engaged in an event while helping to change future behavior. The benefits to your team can include improved trust, communication and the development of skills that lead to a more cohesive team environment.&nbsp;&nbsp; The government group that built the bicycles did more than screw on a few wheels and pedals.&nbsp; Team Builders Plus was&nbsp;the team building organization that led the “bicycle building project” in Las Vegas but their program involves challenges that the teams take part in to earn the bike parts.&nbsp;&nbsp; From this program, teams have fun while they learn to work together, improve communication and collaboration skills.&nbsp; Not to mention the kids who receive the bikes at the end of the program.</p><p>There are many different types of Team building programs, some more lighter fun and others that are more developmental.&nbsp; Bicycle building as a team building program is a truly memorable and rewarding experience.&nbsp;&nbsp; If you don’t agree, then that is because you haven’t taken part in one.</p>\n<!-- end main -->',1341778157,1341934835),(16,0,'blog-description','<!-- start blog-description -->\n	<h2>Description</h2>\n	<p>This is simply a short description of this blog pages\' content, and what to expect in this category.</p>\n	<!-- end blog-description -->',1341778617,1341934187),(17,12,'main','<!-- start main -->\n	<h4><a href=\"/blog/team-building/bicycle-building-is-team-building\" target=\"_top\">Bicycle Building is Team Building</a>&nbsp;– 07-01-2012</h4><p>There are many different types of Team building programs, some more lighter fun and others that are more developmental.&nbsp; Bicycle building as a team building program is a truly memorable and rewarding experience.&nbsp;&nbsp; If you don’t agree, then that is because you haven’t taken part in one.</p>\n<!-- end main -->',1341778617,1341934276),(18,13,'main','<!-- start main -->\n	<h2>Blog Category Title</h2>\n	<p class=\"drop-cap\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus cursus fermentum velit sit amet lacinia. Suspendisse nec lacus id justo sagittis ultrices. Aenean vulputate <b>interdum arcu, consequat</b> consectetur turpis ornare ac. Integer cursus mi at enim tristique et ornare arcu sodales. Ut bibendum pretium nibh. Integer eget nibh urna. Nam eu fringilla magna. <a href=\"#\" target=\"_top\">Vestibulum pretium</a> rhoncus nibh, in consequat tellus egestas ac. Maecenas in est ac orci elementum dictum ornare id urna.</p>\n	<h3>This is an h3 tag</h3>\n	<p>Fusce nec pretium diam. Morbi ac urna ut est pulvinar tristique. <em>Aliquam erat volutpat</em>. Morbi eu ligula tortor, nec fermentum ipsum. Vestibulum pellentesque eleifend arcu, sed vestibulum magna consequat vitae. In tincidunt facilisis nunc, et fringilla lorem gravida non. Etiam in lobortis leo.</p>\n<!-- end main -->',1341779065,1341779065),(21,16,'main','<!-- start main -->\n	<h2>Recent Press</h2>\n	<h4><a href=\"/about/press-releases/one\">Press Release One</a></h4><p>07-12-2011 - This press release will have a short description of what it is about. Press releases are generally boring, so we provide a description in order to allow people to \'skim\' read through them.<br></p><h4><a href=\"/about/press-releases/two\">Second Newsworthy Item</a></h4><p>08-06-2010 - A slightly older press release, but it will have a short description. This way, anyone visiting simply to see your newsworthy releases do not have to comb through to find them.</p>\n<!-- end main -->',1341896707,1341896707),(22,17,'main','<!-- start main -->\n\n<img src=\"http://placehold.it/270x230&amp;text=Staff+Image\" class=\"left bordered\">\n	<p><a href=\"/about/staff/jeff\" target=\"_top\">Jeffrey Backal</a>, MBA – CEO<br><a href=\"/about/staff/merrick\" target=\"_top\">Merrick Rosenberg</a>, MBA – President &amp; Chief Learning Officer<br><a href=\"/about/staff/ken\" target=\"_top\">Ken Blackwell</a> – SVP, Learning &amp; Development<br><a href=\"/about/staff/daniel\" target=\"_top\">Daniel Silvert</a> – VP, Learning &amp; Development<br><a href=\"/about/staff/stew\" target=\"_top\">Stew Balno</a>, MBA, EdM – Sr Learning &amp; Development Consultant<br><a href=\"/about/staff/heather\" target=\"_top\">Heather Hafner</a> – Sr Training Specialist<br><a href=\"/about/staff/kerry\" target=\"_top\">Kerry Fillmore</a> – Facilitator<br><a href=\"/about/staff/aaren\" target=\"_top\">Aaren</a> –<br><a href=\"/about/staff/andy\" target=\"_top\">Andy Kraus</a> – Director, Business Development<br><a href=\"/about/staff/delores\" target=\"_top\">Delores Woodington</a> – Controller<br><a href=\"/about/staff/lesley\" target=\"_top\">Lesley Cruz</a> – Learning Resources Specialist<br><a href=\"/about/staff/andrea\" target=\"_top\">Andrea Bardon</a> – Media &amp; Marketing Director<br><a href=\"/about/staff/britni\" target=\"_top\">Britni Coleman</a> – Training Coordinator<br><br></p><h3>Team Builders Plus Consultants</h3><p>Our talented consultants form an impressive team. Each has years of experience in human resources and/or organizational and professional development. They have conducted countless individual, team and organizational assessments followed by designing and delivering highly successful programs that get results. Their consulting experience spans the organizational hierarchy, from senior level executives to the newest, least experienced employees. They have helped companies build successful teams, develop exceptional managers and create productive work environments.</p><p>Team Builders Plus facilitators are dynamic, fun and engaging. They know what it takes to design and deliver a powerful program that engages the participants in lively discussions and interactive experiences that have a lasting impact. All of our trainers receive the highest ratings from client evaluations.</p><p>Team Builders Plus consultants have shared their expertise by presenting to a variety of groups including: ASTD, The Society of Human Resource Managers, Greater Philadelphia Chamber of Commerce, The Wharton School\'s Small Business Development Center, among others. &nbsp;&nbsp;</p>\n<!-- end main -->',1341927009,1341930840),(23,19,'main','<!-- start main -->\n<img src=\"/themes/tbp/assets/img/headshots/jeff.jpg\" class=\"left bordered\">\n	<p class=\"first-paragraph\">Jeff Backal brings to his clients 20 years of management and consulting experience. He holds a Masters Degree from Drexel University, where he was a founding partner in the Drexel Consulting Group.</p><p>Jeff’s passion for helping groups of individuals truly develop into cohesive teams was his driving force to create Team Builders Plus. Early in his career, he realized many individuals and companies have a strong desire to grow and Jeff wanted to find a way to help. This lead Jeff to spending much of his time working closely with clients to understand their culture, identifying their development needs, and recommend solutions to help them achieve their goals. Since co-founding Team Builders Plus in 1991, tens of thousands of individuals, teams and organizations from across the country have benefited from Jeff’s dedication to creating better work environments.</p><p>Through Jeff’s leadership, Team Builders Plus has been honored with several prestigious awards, such as Philly 100 (fastest growing company in the Philadelphia Region), South Jersey 25 (fastest growing company in South Jersey), New Jersey’s Business of the Year, and Best Places to Work… Jeff was also the 2011 recipient of the Philadelphia Regions HR Consultant of the Year.</p><p>In addition, Team Builders Plus has made several substantial acquisitions over the past few years, including Silver Career Management and Teambuilding, Inc.</p><p>Jeff sits on the Steininger Behavior Care Services Board of Directors and on the Executive Advisory Board of Performance Support Systems (the publisher of the 20/20 Insight GOLD). He is an active member in professional organizations such as Tri-State Human Resource Management Association, The Delaware Valley Initiative (an employment issues resource center dedicated to helping area business owners and HR professionals), The Chamber of Commerce and ASTD. He is also an Inscape Publishing Diamond Consultant. Most recently Jeff was voted in to an exclusive CEO organization, BCA, as the premier provider of Team Building Programs.&nbsp;</p><p><em>You might be surprised to know that: Jeff spends his spare time coaching all types of youth teams, such as soccer, wrestling, baseball, softball... &nbsp; &nbsp;</em></p>\n<!-- end main -->',1341927444,1341927980),(24,19,'sidebar-top','<h2><a href=\"/about/staff\">Back to Staff List</a></h2><!-- start sidebar-top --><!-- end sidebar-top -->',1341927770,1341927819),(25,20,'main','<!-- start main -->\n<img src=\"/themes/tbp/assets/img/headshots/merrick.jpg\" class=\"left bordered\">\n	<h4>Co-Author of Taking Flight!: Master the Four Behavioral Styles and Transform Your Career, Your Relationships…Your Life.</h4><div><br></div><p class=\"first-paragraph\">Merrick is an experienced speaker, facilitator, performance coach, author, and entrepreneur. He co-founded Team Builders Plus in 1991 and has worked with people at all levels, from line staff to senior managers. Merrick co-authored Taking Flight: Master the Four Behavioral Styles and Transform Your Career, Your Relationships…Your Life. In fact, Ken Blanchard called Taking Flight! “an instant classic” and Marshall Goldsmith noted, “You’ll never look at people quite the same way again.\"</p><p>As President &amp; Chief Learning Officer of Team Builders Plus, he has led his organization to the be selected by the Philadelphia Business Journal as one of the Fastest Growing Companies and Best Places to Work in the Philadelphia region. Under his leadership, Team Builders Plus was recently selected as the New Jersey Business of the Year by NJ Biz magazine.</p><p>Merrick specializes in team building, leadership development, and utilizing the DISC model to build better relationships and create an engaging work environment. He received his MBA specializing in Organizational Development from Drexel University who selected him as the Alumni Entrepreneur of the Year. Merrick has been published in numerous publications including, ASTD’s Training &amp; Development magazine and Training magazine.</p><p>Merrick is also an engaging speaker and presenter. He has been a featured guest on Money Matters Today on the Comcast Network and on The Executive Leaders Radio Program. He has spoken for organizations such as: TEDx, ASTD, the Society for Human Resource Management, the Project Management Institute, the International Society for Performance Improvement, the Employer\'s Council, the American Society for Quality, and Vistage International.</p><p>Merrick has worked with more than half of the Fortune 100 companies in 35 states and around the world. He has worked with small and large organizations in a variety of industries : AAA, Adidas, Alstom Power, Aramark, Bank of America, Blue Children’s Hospital of Philadelphia, Cross Blue Shield, Campbell Soup Company, Chase, Colgate Palmolive Comcast, ExxonMobil, Ford Motor Company, General Electric, GlaxoSmithKline, Hewlett-Packard, InterContinental Hotels Group, Johnson &amp; Johnson, L\'Oreal, Lockheed Martin, Lufthansa, Nabisco, National Institute of Health, NBCUniversal, Nestle Purina, Novartis, PECO Energy, Pepsi, Philadelphia Eagles, Reliance Standard Life, Roche, Samaritan Hospice, Temple University, and Verizon. Merrick has also worked with government agencies, such as the Environmental Protection Agency, Interpol, Social Security Administration, US Forest Service, as well as the US Army, Navy, Air Force and Marines. &nbsp;&nbsp;</p>\n<!-- end main -->',1341928178,1341928178),(26,21,'main','<!-- start main -->\n<img src=\"/themes/tbp/assets/img/headshots/ken.jpg\" class=\"left bordered\">\n	<p class=\"first-paragraph\">Ken cuts through the clutter to help clients identify the critical keys to enhancing their effectiveness and improving their productivity.&nbsp;&nbsp;</p><p>Whether working with individuals or international corporations, Ken has the focused ability to translate abstract visions into concrete results.&nbsp;\n\nHe has enabled:</p><p></p><ul><li>a geographically dispersed finance team to function as one cohesive team, improving efficiency and internal customer service</li><li>managers to develop coaching &amp; feedback skills to improve retention and enhance succession planning</li><li>a new plant manager to make his facility a market leader</li><li>a multi-national firm to create an effective 360-degree feedback process to identify high potential leaders and enhance leadership skills throughout the organization</li></ul><p></p><p>A pioneer in Team Builders Plus’ 360-Degree Feedback process, Ken has coached hundreds of senior executives to bridge the communication gaps and resolve the interpersonal issues that create long-term success and can revitalize growth, both professionally and personally.</p><p>Ken was published in the 360 Smart Kit and was instrumental in the development of the 20/20® Insight GOLD, a survey software designed to bring 360-degree feedback to the next level.</p><p>A certified coach and trainer, Ken has spent over 15 years working nationally and internationally with leaders from a wide range of industries including: AIG; Blue Cross Blue Shield; Bristol Myers Squibb; Campbell Soup Company; Chase; Dallas Morning News; Johns Hopkins University; L’Oreal; Maritronics (Dubai, UAE); Nabisco; Novartis (Malta); Ocean Spray; PepsiCo; Roche Molecular Systems; Rohm &amp; Haas; Saint-Gobain; Schering AG; Sino Saudi Gas Limited (KSA); US Army; US Marines; US Navy; Verizon and W.L. Gore.</p><p>Ken is a sought after speaker and has presented at a variety of organizations including: ASQ (American Society for Quality), ASTD (American Society of Training &amp; Development), Organizational Development Network, SHRM (Society for Human Resource Management) and many corporate conferences. He has also appeared as a guest on CN8’s Money Matters. &nbsp;&nbsp;</p>\n<!-- end main -->',1341928520,1341928695),(27,18,'main','<!-- start main -->\n<img src=\"http://placehold.it/260x320\" class=\"right bordered\">\n	<h2>Purpose</h2><p class=\"drop-cap\">The Team Builders Plus mission is to inspire and enable individuals and teams to create a positive, engaging, and productive work environment.</p><h2>Values</h2><p>We are deeply committed to:</p><p></p><p>1. Adhering to the Team Builders Plus 24-Hour Rule in which we completely satisfy our customer’s needs and requests within one business day<br>2. Delivering innovative, transformative, and memorable training and development services that generate organizational buzz<br>3. Making our own passion for teamwork and leadership contagious to everyone we encounter<br>4. Creating and sustaining a high-performance team environment for Team Builders Plus staff<br>5. Supporting a work environment that is open and nurturing without biases based on differences of any kind<br>Modeling all of the interpersonal and organizational skills that we teach our clients</p><p></p>\n<!-- end main -->',1341931677,1341932190),(28,22,'main','<!-- start main -->\n	<p>The Team Builders Plus staff is amazed how she is able to manage all of the media and marketing efforts for the office and work her magic as the primary customer service representative who answers questions about the hundreds of products in our Teambuilding, Inc. Store - The Training Catalog.</p><p>Andrea\'s keen eye for design which allows her to improve and maintain all Team Builders Plus websites, as well as coordinating all marketing efforts for the company. She serves as a vital link between Team Builders Plus and our clients through social media networks.</p><p>Her attention to detail and caring personal service are one of the keys to the longevity of our Teambuilding, Inc. Store - <a href=\"http://store.teambuildinginc.com\">The Training Catalog</a> client relationships. &nbsp;&nbsp;</p>\n<!-- end main -->',1341932732,1341932732),(29,12,'blog-image','<!-- start blog-image -->\n		<img src=\"http://placehold.it/210x160\" class=\"bordered\">\n	<!-- end blog-image -->',1341934276,1341934276),(30,12,'blog-description','<!-- start blog-description -->\n	<p>Team Building blog category description here.</p>\n	<!-- end blog-description -->',1341934276,1341934276),(31,24,'main','<!-- start main -->\n	<h4><a href=\"/blog/leadership-development/leaf\" target=\"_top\">How can I resolve a conflict?</a>&nbsp;– 07-01-2012</h4><p>When you’re in a conflict or confrontation it can be hard to think straight, and that can make it hard to resolve the situation appropriately.&nbsp; Here’s a quick easy acronym to help: LEAF.&nbsp; LEAF stands for: <em>Listen, Empathize, Action plan, Follow through</em>.</p>\n<!-- end main -->',1341937424,1341937616),(32,24,'blog-image','<!-- start blog-image -->\n		<img src=\"http://placehold.it/210x160\" class=\"bordered\">\n	<!-- end blog-image -->',1341937424,1341937616),(33,24,'blog-description','<!-- start blog-description -->\n	<h2>Description</h2>\n	<p>This is simply a short description of this blog pages\' content, and what to expect in this category.</p>\n	<!-- end blog-description -->',1341937424,1341937616),(34,25,'main','<!-- start main -->\n<img src=\"http://placehold.it/220x300\" class=\"right bordered\">\n	<p class=\"drop-cap first-paragraph\">When you’re in a conflict or confrontation it can be hard to think straight, and that can make it hard to resolve the situation appropriately.&nbsp; Here’s a quick easy acronym to help: LEAF.&nbsp; LEAF stands for: Listen, Empathize, Action plan, Follow through.</p><h3>Listen</h3><p>A simple and perhaps obvious, but often missed, first step. Why? We either jump to a conclusion about what the other person is saying or we too quickly move to problem-solving mode.&nbsp; In both cases, we stop listening prematurely.&nbsp; Taking the time to listen to the other person allows us to get all of the facts, and to fully understand their position and their needs.</p><h3>Empathize</h3><p><u></u><u></u>“I understand how upset this issue makes you feel.” Empathizing with the other person helps them know that you heard them.&nbsp; Not just the facts about the issue but how they feel about it. It helps you align with them so they can see you as a partner rather than an opponent.&nbsp; As Theodore Roosevelt said: \'No one cares how much you know, until they know how much you care\'.</p><h3>Action plan</h3><p><u></u><u></u>Ok, you’ve listened and empathized, now what are you going to do about the issue?&nbsp; Clearly outline the steps you’ll take to resolve the problem and get the other person’s agreement that those steps will, in fact, do just that. It also gives the other person a chance to offer a modification to your plan or suggest an alternative.</p><h3>Follow through</h3><p><u></u><u></u>Once you’ve agreed on an action plan – do it, and do it quickly.&nbsp; We have all been disappointed by someone who promised to do something for us and didn’t; and felt the harmful impact on trust that followed.&nbsp; Taking quick action not only addresses the issue at hand, it demonstrates to the other person your seriousness and commitment to making things right.<u></u><u></u><u></u>&nbsp;<u></u></p><p>–</p><p>Conflict doesn’t have to be a negative, destructive experience.&nbsp; Remembering a few key steps, like LEAF, can help you use conflict to build and strengthen relationships instead.</p><p><br></p><p><br></p>	\n<!-- end main -->',1341937807,1341938696),(35,0,'tb-navigation','<!-- start tb-navigation -->\n	<h3>Similar Programs</h3>\n	<ol>\n		<li class=\"active\"><a href=\"#\" target=\"_top\">First</a></li>\n		<li><a href=\"#\" target=\"_top\">Second</a></li>\n	</ol>\n	<!-- end tb-navigation -->',1341941101,1341941356),(36,26,'main','<!-- start main -->\n	<p class=\"drop-cap\">Imagine a team building event that is both exciting for your group and gives back to underprivileged kids. With the Wheels for the World team building program, your team can experience a fast-paced and engaging team event while making an immediate and meaningful impact on the lives of children in your area.</p>\n\n<blockquote>Box: Do you recall your first bicycle?  Remember the fun, the adventure, the freedom?  Wheels for the World offers your team the chance to pass those feelings on to a child by building and donating bikes for kids.</blockquote>\n\n<p>Anyone can assemble a bike (well, almost anyone) if they receive all of the parts, a few tools, and the instructions.  But, in Wheels for the World, teams must earn the parts by participating in fun team building challenges.  Each activity is funnier than the last in this energy-filled session.</p>\n\n<img src=\"http://placehold.it/140x140\" class=\"left bordered\">\n\n<p>As the teams work to earn the front tire, seat, handle bars, and pedals, they are simultaneously building teamwork, strengthening relationships and developing trust. (By the way, a cycling professional will be on hand to make sure the bikes are assembled properly.)</p>\n\n<p>The biggest surprise of the day is yet to come.  Once the bikes are assembled, you will have the opportunity to decorate them with a colorful, personalized card and lots of balloons, beads and stickers.  Teams perform a fun skit or commercial about their bike at the end and everyone thinks this is the grand finale.</p>\n  \n<h4>But wait…</h4>\n\n<p>We line up the bikes in the front of the room so that your team can admire their handiwork. Then, participants close their eyes and are told to imagine the looks on the children’s faces when they receive their new bikes.</p>\n\n<img src=\"http://placehold.it/140x140\" class=\"right bordered\">\n\n<h4>But what if they didn’t have to imagine?</h4>\n\n<p>Shhhhh, don’t tell say anything, but we will make arrangements to bring the children to your team building program where your staff will present the bikes directly to kids.</p>\n\n<p>Kids are jumping for joy… adults get a little misty-eyed (that’s right, even the big strong guys)!</p>\n\n<p>In Wheels for the World, your team will share a heart-felt bonding experience and know that they’ve done something truly impactful for the community.</p>\n\n<h3>Program highlights include:</h3>\n<ul>\n	<li>Participants complete team building activities to earn the parts of real children’s bicycles</li>\n	<li>Teams strengthen communication, cooperation, friendship, confidence and trust</li>\n	<li>Your organization makes a lasting contribution to a charity in your area</li>\n	<li>The tangible morale boost and feeling of goodwill will help bond your team and last long after the program</li>\n</ul>\n<!-- end main -->',1341941101,1341941594),(37,26,'tb-image','<!-- start tb-image -->\n		<img src=\"http://placehold.it/370x180\" class=\"bordered\">\n	<!-- end tb-image -->',1341941101,1341941594),(38,0,'tb-similar','<!-- start tb-similar -->\n	<h3>Similar Programs</h3>\n	<div span=\"span6\">\n	<ol>\n		<li class=\"active\"><a href=\"#\" target=\"_top\">First</a></li>\n		<li><a href=\"#\" target=\"_top\">Second</a></li>\n	</ol>\n	</div>\n	<!-- end tb-similar -->',1341941594,1341941594),(39,27,'main','<!-- start main -->\n	<h2>Main Headline</h2>\n	<p>Participants will discover the difference between a manager and leader, whereby a manager manages things, such as goals and priorities, and a leader leads people by motivating, coaching and creating a shared vision. They will discover the importance of being both a manager and a leader and will develop a mindset that drives results while creating a positive and supportive work environment. The session will also provide the skills to assess and manage employee engagement. Individuals will learn how to demonstrate support for their team by meeting the individual needs of each member and motivating them accordingly. Leaders will learn how to manage others by focusing on behavior, instead of employee attitudes.\n\n\n</p>\n<!-- end main -->',1341950150,1341950150);
/*!40000 ALTER TABLE `htmls` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migration`
--

DROP TABLE IF EXISTS `migration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migration` (
  `name` varchar(50) NOT NULL,
  `type` varchar(25) NOT NULL,
  `version` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration`
--

LOCK TABLES `migration` WRITE;
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` VALUES ('default','app',6),('sentry','package',2);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notes`
--

DROP TABLE IF EXISTS `notes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uri` varchar(255) NOT NULL,
  `content` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notes`
--

LOCK TABLES `notes` WRITE;
/*!40000 ALTER TABLE `notes` DISABLE KEYS */;
INSERT INTO `notes` VALUES (22,'test','This is simply an example page, showing what a full page layout will look like.',1327370588),(27,'/','test',1335898745),(35,'','Change marketing message on home page slider.',1335979607),(34,'cms/catch','We\'re going to need to spruce this page up a little bit before we release it to the public.',1335970208),(36,'','Typo',1335982687),(37,'','Change header monday',978317111);
/*!40000 ALTER TABLE `notes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pages` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `uri` char(255) NOT NULL,
  `title` char(120) NOT NULL,
  `description` text NOT NULL,
  `site_id` int(2) NOT NULL,
  `layout_id` char(120) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `subtitle` varchar(120) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` VALUES (19,'about/staff/jeff','Jeffrey Backal','add',1,'staff',1341926998,1341927654,'CEO','add'),(16,'about/press-releases','Press Releases','add',1,'about',1341894802,1341896339,'New & Newsworthy','add'),(17,'about/staff','Staff','add',1,'about',1341894824,1341897265,'Meet the members of our team','add'),(12,'blog/team-building','Blog - Team Building','This is a description',1,'blog-category',1341778532,1341934058,'Blog Posts Related to Team Building','team building, blog'),(13,'blog','Blog','Blog description',1,'about',1341778842,1341932828,'Team Builders Plus Blog','blog'),(18,'about/mission-vision-values','Mission, Vision, Values','add',1,'about',1341894875,1341895033,'Who we are','add'),(11,'blog/team-building/bicycle-building-is-team-building','Bicycle Building is Team Building','add',1,'blog',1341777873,1341933856,'','add'),(15,'about','About Us','add',1,'about',1341894760,1341895692,'Who we are','add'),(20,'about/staff/merrick','Merrick Rosenberg','add',1,'staff',1341927969,1341927969,'President & Chief Learning Officer','add'),(21,'about/staff/ken','Ken Blackwell','add',1,'staff',1341928233,1341928233,'SVP, Learning & Development ','add'),(22,'about/staff/andrea','Andrea Bardon','add',1,'staff',1341932584,1341932584,'Media & Marketing Director','add'),(23,'team-building','Team Building','add',1,'team-building',1341933680,1341933680,'Our programs and activities','add'),(24,'blog/leadership-development','Blog - Leadership Development','add',1,'blog-category',1341937329,1341937329,'','add'),(25,'blog/leadership-development/leaf','How can I resolve a conflict?','add',1,'blog',1341937493,1341937570,'LEAF','add'),(26,'team-building/wheels-for-the-world','Wheels for the World','add',1,'programs',1341940540,1341940540,'Our bike building charity program','add'),(27,'leadership-development','Leadership Development','add',1,'sidebar-right',1341950091,1341950091,'Brief description','add');
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sites`
--

DROP TABLE IF EXISTS `sites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sites` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `host` char(120) NOT NULL,
  `theme` char(36) NOT NULL DEFAULT 'default',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sites`
--

LOCK TABLES `sites` WRITE;
/*!40000 ALTER TABLE `sites` DISABLE KEYS */;
INSERT INTO `sites` VALUES (1,'198.101.226.196','default');
/*!40000 ALTER TABLE `sites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(81) NOT NULL,
  `password_reset_hash` varchar(81) NOT NULL,
  `temp_password` varchar(81) NOT NULL,
  `remember_me` varchar(81) NOT NULL,
  `activation_hash` varchar(81) NOT NULL,
  `last_login` int(11) NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `activated` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (11,'nerdsrescueme','nerd@nerdsrescue.me','KuWTU9UhdMl6BjTVb5dd24c7871864390bca18b01349b782a11adb84884a12c437ce2f2c4abe7e73','','','','',1341949870,'127.0.0.1',1341949870,1329932631,1,1),(12,'user','user@nerdsrescue.me','EqoT9Ci1zqksm6tf15f52cf4f2de9a682863cc4eda0bc70756e4f3421be781b78f80b0a88f4c06e3','','','','',1330021984,'127.0.0.1',1330021984,1329932631,1,1),(13,'frankbardon','frank@nerdsrescue.me','x0AYDvChBl45DoBb56bbfe87f172113ebfc09760ea9fc21ced0702ddb2a4b2984be5848aae462703','','','','',1335974063,'127.0.0.1',1335974063,1329968785,1,1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_groups`
--

DROP TABLE IF EXISTS `users_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_groups` (
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_groups`
--

LOCK TABLES `users_groups` WRITE;
/*!40000 ALTER TABLE `users_groups` DISABLE KEYS */;
INSERT INTO `users_groups` VALUES (11,27),(12,31);
/*!40000 ALTER TABLE `users_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_metadata`
--

DROP TABLE IF EXISTS `users_metadata`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_metadata` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_metadata`
--

LOCK TABLES `users_metadata` WRITE;
/*!40000 ALTER TABLE `users_metadata` DISABLE KEYS */;
INSERT INTO `users_metadata` VALUES (2,'',''),(3,'',''),(4,'',''),(5,'',''),(6,'',''),(9,'',''),(11,'',''),(12,'',''),(13,'','');
/*!40000 ALTER TABLE `users_metadata` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_suspended`
--

DROP TABLE IF EXISTS `users_suspended`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_suspended` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login_id` varchar(50) NOT NULL,
  `attempts` int(50) NOT NULL,
  `ip` varchar(25) NOT NULL,
  `last_attempt_at` int(11) NOT NULL,
  `suspended_at` int(11) NOT NULL,
  `unsuspend_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_suspended`
--

LOCK TABLES `users_suspended` WRITE;
/*!40000 ALTER TABLE `users_suspended` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_suspended` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-07-17 21:47:27
