<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<!-- title of the company-->
	<title>24/7 Music News</title>
	<link href="css/main.css" rel="stylesheet" type="text/css"/>

</head>
<body>
<?php
/**
 * Created by PhpStorm.
 * File: index.php
 * User: Bikesh Kawan
 * Student ID : W14037560
 * Date: 29/04/15
 * Time: 14:01
 * Module Title:Object Oriented and Web Programming
 * Module Number:CM0667
 * Module Tutor Name(s):Kay Rogage
 * Academic Year: 2014-2015
 *
 *  this is the index.php /main home page for the website for all type of user
 */

//import necessary classes and functions
require 'core/init.php';
require_once 'classes/DatabaseObject.php';
require_once 'includes/dbConfig.php';
require_once 'classes/Config.php';
require_once 'classes/Database.php';
require_once 'classes/Session.php';
require_once 'classes/Redirect.php';
//$user = new User();

// check if subscriber  exist and redirect to users homepage
if (Session::exists('subscriberID')) {
	Redirect::to('public/index.php');
}

// varibales to store the xml files from website
$url = "http://www.music-news.com/rss/news.asp";

// variable to store xml file  in our local file system
$cache = 'xml/music_news_releases.xml';

//find out when the cache was last updated
if (file_exists($cache)) {
	$modified = filemtime($cache);
}
//create or update the cache if necessary
if (!isset($modified) || $modified) {
	if ($xml = @ file_get_contents($url)) {
		file_put_contents($cache, $xml);
	}
}

// if the cache file exists, suppress errors
// and load it as SimpleXML
if (file_exists($cache)) {
	libxml_use_internal_errors(true);
	$feed = simplexml_load_file($cache);
} else {
	// if xml file is empty
	$feed = false;
}?>

<div id="header">

	<div id="site_title">
        <!-- Title for the main website-->
		<p><a href="index.php" style="color:crimson; padding-left: 250px; padding-bottom: 30px;"> 24/7 Music News </a>
		</p>

	</div>

	<!-- end of site_title -->

	<div id="header_right">
		<div id="right">
			<a href="https://twitter.com/Northumbriauni"><img src="images/twitter.png" alt="twitter"/></a><a
				href="#"><img
					src="images/rss.png" alt="rss"/></a>
			<a href="public/login.php">
				<button style="background: #272727; color: yellowgreen;">Login</button>
			</a>

			<a href="public/register.php">
				<button id="lr">Register</button>
			</a>
		</div>


		<div id="search_box">
			<form action="public/search.php" method="post">
			<p>
				<input type="text" id="user" name="search" class="feed_search" value=""
				      />
				      				      
				<input style="font-weight: bold;" type="submit" name="submit" id="submit" value=""/>
				  </p>
			</form>
		</div>

	</div>

	<div class="cleaner"></div>

</div>
<!-- end of header -->

<!-- menu wrapper start main navigation bar-->
<div id="menu_wrapper">

	<div id="menu">
		<ul>
			<li><a href="index.php" tabindex="10">Home</a></li>
			<li><a href="index.php" tabindex="11">Latest Music News</a></li>
			<li><a href="public/commingsoon.php" tabindex="12">Category</a></li>
			<li><a href="public/gallery.php" tabindex="13">Gallery</a></li>
			<li><a href="public/commingsoon.php" tabindex="14">Reviews</a></li>
			<li><a href="public/aboutus.php" tabindex="15">Abouts us</a></li>
			<li><a href="public/contactus.php" tabindex="16">Contact us</a></li>
		</ul>
	</div>
</div>
<!-- end of menu -->

<!-- div block for the main content--->
<div id="main"><span class="tm_bottom"></span>

	<div id="content">

		<div class="content_box">
			<!-- heading for the page-->
			<h1>Music News <span>Your Music News RSS Reader</span></h1>

			<p> A complete Music News Reader from various Music site.</p>
		</div>


		<?php
		// display message when user logout from the system
		if (Session::exists('logout')) {

			echo '<p style="color: tomato; padding-left: 60px">' . Session::flash('logout') . '</p>';
		} ?>

		<?php if
		// check if xml is not empty
		($feed === false) {
			// display message if xml file is empty or not exists
			echo '<p>Sorry,we do not have any press release today  </p>';
		} else {
			// if exists
			// title for list of news articles
			echo '<p style="color:tomato; font-size:24px; padding-bottom:30px;">Latest Music News  </p>';

			// channel element is described by RSS
			// item is one of the three required child element of channel elements
			// now looping through all the required child element of item element
			foreach ($feed->channel->item as $item) {

				// variable to store all link elements of xml file
				$links = $item->link;
				// variable to store all title elements of the xmlf file
				$titles = $item->title;
				// variable to store all author elements of the xml file
				$authors = $item->author;

				// variable to store all pudbdates elements of the xmlfile
				$pubDates = new DateTime($item->pubDate);
				// format the pub date  to display properly
				$dates = $pubDates->format('D, g:i a T, F j, Y');
				// format with day and month
				$dateDM = $pubDates->format(' F j');
				// format date with year only
				$dateY = $pubDates->format(' Y');
				//variable to store the all description element of the xml file
				$descriptions = $item->description;

				// variable to store the image attributes of the description element
				$img = $item->description->img['src'];


				// convert alle the descritions elements and store in an array
				$des = array($item->description);
				// get the first description  of the description  array  which
				$desValues = $des[0];
				// convert or explode the description string into array to separate images and text
				$values = explode("/>", $desValues);

				?>
				<!-- div block for displaying all the articles-->
				<div class="post_box">
					<div class="header">

						<?php
						// display title as hyperlink for the articles
						echo "<p style='padding-bottom:10px; font-size:18px; text-decoration: underline'><a href='$links'>$titles</a></p>";
						// display dates  of the article published
						echo '<p>' . "Published Date: " . $dates . '</p>';
						// display author name
						echo '<p>' . " author@ " . $authors . '</p>'; ?>

						<!-- Category tag for the articles-->
						<div class="tag"><strong>Tags:</strong> <a href="/public/commingsoon.php">JAZZ</a>, <a href="/public/commingsoon.php">HIP HOP</a>, <a
								href="/public/commingsoon.php"">Rock</a></div>
                <span class="posted_date">
                   <?php
                   // display date in nice image icon
                   echo $dateDM; ?>
	                <strong><?php echo $dateY; ?></strong>
                </span>
					</div>


					<?php
					// again explode or convert descriptions link into array to extract image
					$img = explode('"', $values[0]);
					//                    var_dump($img[1]);
					?>


					<?php
					// display image in appropriate format
					echo "<a href='$img[1]'><img src='$img[1]' title='$titles' alt='$titles'/></a>"; ?>


					<div class="pb_right">

						<?php
						// display the text desription
						echo "<p>  $values[1] </p>";
						 ?>

						<!-- link to open full details of the articles-->
						<div class="comment"><?php echo "<a href='$links'>Read More....</a>" ?></div>
					</div>
					<div class="cleaner"></div>
				</div>
			<?php
			}// end of fore each loop
		} // end of else lock
		?>
		<div class="post_box pb_last">

			<div class="cleaner"></div>
		</div>

	</div>

	<!-- side navigation bar-->
	<div id="sidebar">
		<div class="sidebar_box">
			<h3>Tag Cloud</h3>

			<div class="sb_content">
				<?php echo "<a href='$links' style='font-size:12px'>$titles</a>"; ?>
			</div>
		</div>

		<div class="sidebar_box">
			<h3>Categories</h3>

			<div class="sb_content">
				<ul class="sidebar_menu">
					<li><a href="public/commingsoon.php">Rock</a></li>
					<li><a href="public/commingsoon.php">JAZZ</a></li>
					<li><a href="public/commingsoon.php">Hip-Hop</a></li>
					<li><a href="public/commingsoon.php">Pop</a></li>
					<li><a href="public/commingsoon.php">Metal</a></li>
					<li><a href="public/commingsoon.php">Alternatives</a></li>
				</ul>
			</div>
		</div>

		<div class="sidebar_box">
			<h3>Archives</h3>

			<div class="sb_content">
				<ul class="sidebar_menu">
					<li><a href="public/commingsoon.php">January 2015</a></li>
					<li><a href="public/commingsoon.php">February 2015</a></li>
					<li><a href="public/commingsoon.php">March 2015</a></li>
					<li><a href="public/commingsoon.php">April 2015</a></li>

				</ul>
			</div>
		</div>

		<div class="sidebar_box">
			<h3>Our Partner Sites</h3>

			<div class="sb_content">
				<ul class="sidebar_menu">
					<li><a href="http://www.music-news.com">MusicNews</a></li>
				</ul>
			</div>
		</div>
	</div>

	<div class="cleaner"></div>
</div>
<!-- end of main -->

<!-- bottom nagivation bar-->
<div id="bottom">
	<div class="bottom_box">
		<h5><span>New Album</span> Releases </h5>

		<p>Metallica</p>

		<p>AC/DC</p>

		<p>The Script</p>
		<a href="public/commingsoon.php" class="continue">More albums</a>
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
			<?php echo "<li><a href='$links'>$titles</a></li>"; ?>

		</ul>
	</div>

</div>
<!-- end of bottom -->

<!-- footer-->
<div id="footer">

	<ul class="footer_menu">
		<li class="first"><a href="index.php">Home</a></li>
		<li><a href="public/aboutus.php">About us</a></li>
		<li><a href="public/contactus.php">Contact us</a></li>
		<li><a href="https://www.youtube.com/user/northumbriauni">Youtube</a></li>
		<li><a href="https://www.facebook.com/NorthumbriaUni">Follow us</a></li>
		<li><a href="public/contactus.php">Feedback</a></li>
	</ul>

	Copyright © <?php echo date("Y", time()); ?> <a href="#">Bikesh Kawan</a> |
	<a href="index.php">Music News Reader</a> by <a
		href="public/aboutus.php"> 24/7 Music News</a></div>

</body>
</html>