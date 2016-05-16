<?php
/**
 * Created by PhpStorm.
 * File: search.php
 * User: Bikesh Kawan
 * Student ID : W14037560
 * Date: 29/04/15
 * Time: 14:01
 * Module Title:Object Oriented and Web Programming
 * Module Number:CM0667
 * Module Tutor Name(s):Kay Rogage
 * Academic Year: 2014-2015
 *
 *
 * This file is search page for all the user
 */

// import necessary classes and functions
require '../core/init.php';

require_once '../classes/Config.php';
require_once '../includes/dbConfig.php';

require_once '../classes/User.php';
require_once '../classes/DatabaseObject.php';

require_once '../classes/Database.php';
////require_once'classes/Hash.php';
////require_once'classes/Validate.php';
//require_once'../classes/Database.php';
require_once '../classes/Redirect.php';
require_once '../classes/Input.php';
require_once '../classes/Session.php';
require_once '../functions/general.php';
//$user = new User();

// title for the page
$title = "Music Feed Search";
// import layout header
include_once '../layouts/header.php';


// check if users exist
if (Session::exists('subscriberID')) {
// variable to store subscriber id
	$id = Session::get('subscriberID');
}

// get xml file from the file
$cache = '../xml/music_news_releases.xml';

// instantiate user class
$user = new User();

// if the cache file exists, suppress errors
// and load it as SimpleXML
if (file_exists($cache)) {
	libxml_use_internal_errors(true);
	$feed = simplexml_load_file($cache);
} else {
// if emtpy xml
	$feed = false;
}



?>


<?php 
// condition statement to check if xml is empty
if ($feed === false) {
// if xmlf file is empty display message
	echo '<p>Sorry,we do not have any press release today  </p>';
} else {
// if xml file is not empty

// check if search input text exists
	if (Input::exists()) {
	// variable to store search input
		$search = Input::get('search');

       // call the custom function and pass the xml file and search text 
       // all the search query will be done by this function
		$feeds = searchElements($feed, $search);

        // count  the elments
		$count = count($feeds);

// if article exists  
		if(count($feeds)) {

         // title for the search page content
			echo '<H2 style="color: tomato"> Search Results Below......</H2>';

// check if user is loggined
			if (!$user->isLoggedIn()) {
			// if user is not logged 
			// loop all the child element of the xml file
				foreach ($feeds as $item) {

               // variable to store all the link elment
					$links = $item->link;
					// variable to store all title element
					$titles = $item->title;
					// variable to store all the author element
					$authors = $item->author;

// variable to store the publish date of the articles
					$pubDates = new DateTime($item->pubDate);
					// format the date of publish
					$dates = $pubDates->format('D, g:i a T, F j, Y');
					$dateDM = $pubDates->format(' F j');
					$dateY = $pubDates->format(' Y');
					// variable to store the desription element
					$descriptions = $item->description;

// variable to store the img attribute of description element
					$img = $item->description->img['src'];

// convert all description in array
					$des = array($item->description);
					//get 1st desctiption from the desctiption element
					$desValues = $des[0];
					// explode the desctiption values into array to extract images and text description
					$values = explode("/>", $desValues);

					?>
					<div class="post_box">
						<div class="header">

							<?php  echo '<article>';
							// display title as link of the article,
							echo "<h3><a href='$links'>$titles</a></h3>";
							// display published date
							echo '<p>' . "Published Date: " . $dates . '</p>';
							// display author
							echo '<p>' . " author@ " . $authors . '</p>'; ?>

							<div class="commingsoon.php"><strong>Tags:</strong> <a href="commingsoon.php">JAZZ</a>, <a href="commingsoon.php">HIP HOP</a>, <a
									href="#">Rock</a></div>
                <span class="posted_date">
                   <?php 
                   // display the date of articles published in nice icon
                   echo $dateDM; ?>
	                <strong><?php echo $dateY; ?></strong>
                </span>
						</div>

						<?php 
						// explode the 1st elemnt of the description into array to get images
						$img = explode('"', $values[0]);
						//                    var_dump($img[1]);
						?>


						<?php 
						// display images
						echo "<a href='$img[1]'><p>$values[0]</p></a>"; ?>


						<div class="pb_right">
							<?php 
							// display description of articles
							echo "<p> $values[1] </p>";
							echo '</article>' ?>
              
							<div class="comment"><?php echo "<a href='$links'>Read More....</a>" ?></div>
						</div>
						<div class="cleaner"></div>
					</div>
				<?php
				}// end of if statement for not logged in user

			} // if user is loggind in give extra functionalities to save the articles
			else {
				?>
				<form action="index.php" method="POST" name="allfeeds">
					<div style="padding-bottom: 20px" align="right">
						<input type="checkbox" name="checkall" id="selectall"/> Check All
						<input id='save' type="submit" class="save" value='Save Selection'/>
					</div>
					<?php foreach ($feeds as $item) {

						$links = $item->link;
						$titles = $item->title;
						$authors = $item->author;

						$pubDates = new DateTime($item->pubDate);
						$dates = $pubDates->format('D, g:i a T, F j, Y');
						$dateDM = $pubDates->format(' F j');
						$dateY = $pubDates->format(' Y');
						$descriptions = $item->description;

						$des = array($item->description);
						$desValues = $des[0];
						$values = explode("/>", $desValues);

						for ($i = 0; $i < count($links); $i++) {
							$link = $links[$i];
							$title = $titles[$i];
							$description = $descriptions[$i];
							//$author = $authors[$i];

						}

						?>
						<div class="post_box">
							<div class="header">

								<?php
								echo "<h3><a href='$links'>$titles</a></h3>";
								echo '<p>' . "Published Date: " . $dates . '</p>';
								echo '<p>' . " author@ " . $authors . '</p>'; ?>

								<div class="tag"><strong>Tags:</strong> <a href="#">JAZZ</a>, <a href="#">HIP HOP</a>,
									<a
										href="#">Rock</a></div>
                <span class="posted_date">
                   <?php echo $dateDM; ?>
	                <strong><?php echo $dateY; ?></strong>
                </span>
							</div>

							<?php $img = explode('"', $values[0]);
							//                   var_dump($img[1]);
							echo "<a href='$img[1]'><p>$values[0]</p></a>"; ?>


							<div class="pb_right">
								<?php echo "<p> $values[1] </p>";
								?>

								<div class="comment"><?php echo "<a href='$links'>Read More....</a>" ?></div>
							</div>

							<div class="cleaner"></div>
							<div align="right">
								<?php
								$array = array($link, $title, $description);
								$values = implode("||-||", $array);

								$link = '<![CDATA[' . $link . ']]>';

								//$db = Database::getConnection();

								//	$sql = "select title from saved_press_releases where subscriberID='$id'";


								//echo   $values[1] . '<br>';

								$db = Database::getConnection();
								$sql = "SELECT pressReleaseID from saved_press_releases WHERE  subscriberID='$id'";

								$stmt = $db->query($sql);

								while ($row = $stmt->fetchObject()) {

									$saved = $row->pressReleaseID;

									$savedArray = array($saved);
									// echo $checked;
									//$title = 'http://www.music-news.com/ShowNews.asp?nItemID=89466';


									if (in_array($link, $savedArray)) {

										echo "<img  src='../images/ok-icon.png' style='margin-left:460px;width: 23px; height: 23px;'>";


									} else {


									}
								}
								?>


								<input type="checkbox" class="checkbox1" name="feed[]"
								       value="<?php echo escape($values); ?>"/>

								<?php echo "<Input type='submit' value='Save' id='save' class='save' />"; ?>

							</div>

						</div>

					<?php
					}
					?>
					<input id="save" class="save" type="submit" value="Save Selected Item"/>
					<input id="save" class="uncheck" type="reset" value="Uncheck All"/>
				</form>
				<a onclick="javascript:checkAll('allfeeds', true);" href="javascript:void();">
					<button id="save">check all</button>
				</a>

				<script language="JavaScript" type="text/javascript">
					$(document).ready(function () {

						$("Input.save").click(function (e) {
							if (!confirm('Are you sure you want to Save selected Items?')) {
								e.preventDefault();
								return false;
							}
							return true;
						});
					});
				</script>
			<?php
			}
		}else{

			echo '<h5 style="color: tomato">Sorry, We couldn\'t find what you are looking, Please try again!!<h5>';
		}

	} else {

		echo '<h5 style="color: tomato">Sorry, We are not able to  search. Please click on Search Button at right side!! <h5>';
	}

} ?>



<?php



include_once '../layouts/footer.php';




?>
