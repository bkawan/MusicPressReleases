</div>
<div id="sidebar">
	<?php if (Session::exists('subscriberID')) { ?>
		<div class="sidebar_box">
			<h3>My Accounts</h3>

			<div class="sb_content" id="my_search_box">

				<form action="searchMyFeeds.php" id="mysearch" name="search" method="post">
					<ul class="sidebar_menu">
						<li>
							<input type="text" id="user" name="search" class="feed_search" value=""
							       onfocus="clearText(this)" onblur="clearText(this)"/>
							<input style="font-weight: bold;" type="submit" name="submit" id="myFeedSearch" value=""/>
						</li>
						<li><a href='myFeeds.php' style=font-size:12px>My Saved Feeds</a></li>
						<li><a href='manageFeeds.php' style=font-size:12px>Manage Feeds</a></li>
						<li><a href='profile.php?id=<?php if (Session::exists('subscriberID')) {
								$id = Session::get('subscriberID');
								echo escape($id);
							}?>'>Profile</a></li>
					</ul>
			</div>
			<form id="mysearch" name="mysearch">
		</div>
	<?php } ?>
	<div class="sidebar_box">
		<h3>Tag Cloud</h3>

		<div class="sb_content">
			<?php echo "<a href='#' style=font-size:12px>Metallica</a>"; ?>
		</div>
	</div>

	<div class="sidebar_box">
		<h3>Categories</h3>

		<div class="sb_content">
			<ul class="sidebar_menu">
				<li><a href="commingsoon.php">Rock</a></li>
				<li><a href="commingsoon.php">Metal</a></li>
<!--				<li><a href="commingsoon.php">Hip-Hop</a></li>-->
<!--				<li><a href="commingsoon.php">Pop</a></li>-->
<!--				<li><a href="commingsoon.php">Metal</a></li>-->
<!--				<li><a href="commingsoon.php">Alternatives</a></li>-->
			</ul>
		</div>
	</div>

	<?php if (Session::exists('subscriberID')) { ?>
		<div class="sidebar_box">
			<h3>My Archives</h3>

			<div class="sb_content">
				<ul class="sidebar_menu">
					<li><a href="commingsoon.php">January 2015</a></li>
					<li><a href="commingsoon.php">February 2015</a></li>
<!--					<li><a href="commingsoon.php">March 2015</a></li>-->
<!--					<li><a href="commingsoon.php">April 2015</a></li>-->

				</ul>
			</div>
		</div>
	<?php } ?>
	<div class="sidebar_box">
		<h3>Archives</h3>

		<div class="sb_content">
			<ul class="sidebar_menu">
				<li><a href="commingsoon.php">January 2015</a></li>
				<li><a href="commingsoon.php">February 2015</a></li>
<!--				<li><a href="commingsoon.php">March 2015</a></li>-->
<!--				<li><a href="commingsoon.php">April 2015</a></li>-->

			</ul>
		</div>
	</div>

	<div class="sidebar_box">
		<h3>Our Partner Sites</h3>

		<div class="sb_content">
			<ul class="sidebar_menu">
				<li><a href="http://www.music-news.com" target="_parent">MusicNews</a></li>
			</ul>
		</div>
	</div>
</div>

<div class="cleaner"></div>
</div>
<!-- end of main -->

<div id="bottom">
	<div class="bottom_box">
		<h5><span>New Album</span> Releases </h5>

		<p>Metallica</p>

		<p>AC/DC</p>

		<p>The Script</p>
		<a href="#" class="continue">More albums</a>
	</div>

	<div class="bottom_box">
		<h5><span>Upcoming </span> Concerts</h5>

		<p> Metallica </p>

		<p> The Script </p>

		<p> Iron Maiden </p>
		<a href="http://www.metallica.com" class="continue">more info</a>
	</div>

	<div class="bottom_box">
		<h5><span>Recent</span> Head Lines</h5>
		<ul class="bottom_box_list">
			<?php echo "<li><a href='#'>Metallica </a></li>"; ?>

		</ul>
	</div>

</div>
<!-- end of bottom -->

<div id="footer">

	<ul class="footer_menu">
		<li class="first"><a href="#">Home</a></li>
		<li><a href="aboutus.php">About us</a></li>
		<li><a href="contactus.php">Contact us</a></li>
		<li><a href="https://www.youtube.com/user/northumbriauni">Youtube</a></li>
		<li><a href="https://www.facebook.com/NorthumbriaUni">Follow us</a></li>
		<li><a href="contactus.php">Feedback</a></li>
	</ul>


	Copyright © 2015 <a href="aboutus.php">Bikesh Kawan</a> |
	<a href="index.php" target="_parent">Music News Reader</a> by <a
		href="aboutus.php">24/7 Music News</a></div>

</body>
</html>