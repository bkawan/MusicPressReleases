<?php
/**
 * Created by PhpStorm.
 * File: myFeeds.php
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
 * this class manages the saved articles of the user
 */

//import necessary classes and functions
require_once '../core/init.php';
require_once '../classes/Session.php';
require_once '../functions/general.php';
require_once '../classes/Config.php';
require_once '../classes/DatabaseObject.php';
require_once '../classes/User.php';
require_once '../includes/dbConfig.php';
require_once '../classes/Database.php';
require_once '../classes/Redirect.php';

// give title to the page
$title = " My feeds";

// import header layout
include_once '../layouts/header.php';

// check if user are logged in to the system
if (Session::exists('subscriberID')) {
	// variable to store subscriber id of the user
	$id = Session::get('subscriberID');
}

// instantiate the singleton database class
$db = Database::getConnection();
// select sql statement
$feedSQL = "select link,title, description,dateSaved from saved_press_releases  WHERE subscriberID= '$id' ORDER BY dateSaved DESC ";
// run the querry
$stmt = $db->query($feedSQL);
// we well save user saved article in a xml file
$elementName = "user" . $id;    // create a variable for each element name
$fileName = "$elementName.xml"; // name of xml file

$filePointer = fopen($fileName, "w");
// write to the file
fwrite($filePointer, "<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?>\n");
fwrite($filePointer, "<{$elementName}s>\n");  // add an 's' for the root element
// fetch each record as an associative array
while ($book = $stmt->fetch(PDO::FETCH_ASSOC)) {
	fwrite($filePointer, "\t<$elementName>\n");  // element name as a tag
	// iterate through each field in the associative array,

	foreach ($book as $key => $value) {
		// write the key as a tag enclosing its value
		fwrite($filePointer, "\t\t<$key>$value</$key>\n");
	}
	fwrite($filePointer, "\t</$elementName>\n");
}
fwrite($filePointer, "</{$elementName}s>\n");
fclose($filePointer);

// load the xml file
$feed = simplexml_load_file($fileName);


// to display messaged after user have successfully saved the arcticles
if (Session::exists('saved')) {
	//echo '<p>' . Session::flash('home') . '<p>';
	echo '<div class="flash" style="margin-left: -10px">' . Session::flash('saved') . '</div>';

}
// to display the message if user have sucessfully delete the articles
if (Session::exists('delete')) {
	//echo '<p>' . Session::flash('home') . '<p>';
	echo '<div class="flash" style="margin-left: -10px">' . Session::flash('delete') . '</div>';

}
// to display the message if articles can't be delete
if (Session::exists('notdelete')) {
	//echo '<p>' . Session::flash('home') . '<p>';
	echo '<div class="flash" style="margin-left: -10px">' . Session::flash('notdelete') . '</div>';

}
// to display the message if articles cannot be saved
if (Session::exists('notsaved')) {
	//echo '<p>' . Session::flash('home') . '<p>';
	echo '<div class="flash" style="margin-left: -10px">' . Session::flash('notsaved') . '</div>';

}


// check if xml file is not empty
if ($feed === false) {
	// if empty display message
	echo '<p>Sorry,you do not have any press release saved  </p>';
} else {

	// if xml file is not empty count the all element in feed
	if(count($feed)) {
	?>
		<!-- Title for the list of saved feeds of user--->
	<H2 style="color: tomato">My Feeds </H2>

		<!-- form starts --->
	<form action="delete.php" method="POST" name="allfeeds">
		<div style="padding-bottom: 20px" align="right">
			<!-- checkbox to check all articles--->
			<input type="checkbox" name="checkall" id="selectall"/> Check All
			<!-- submit button to delete the selected articles--->
			<input id='delete' class="delete" type="submit" value='Delete Selection'/>
		</div>


		<?php

		/**
		 * To display user's feed in appropriate format
		 */
               // loop through all the element of the xml file
				foreach ($feed as $item) {

					// variable to store links of articles
					$links = $item->link;
					// variable to store title of the article
					$titles = $item->title;
					// variable to store author of the article
					$authors = "Music-News.com Newsdesk ";

					// variable to store date when user saved the articles
					$dateSaved = new DateTime($item->dateSaved);
					// format date like  Wed, 8:45 am GMT, May 27, 2015
					$dates = $dateSaved->format('D, g:i a , F j, Y');
					// format date in day and month
					$dateDM = $dateSaved->format(' F j');
					// format date to store only year
					$dateY = $dateSaved->format(' Y');

					// variable to store description of the articles by converting descriptions into array
					// as we need to extract image and description
					$descriptions = explode("/>", $item->description);




					// convert the links in array and store in variable
					$id = explode("=", $links);


					// loop through total number of saved articles

					for ($i = 0; $i < count($links); $i++) {
						// variable to store link
						$link = $links[$i];
						// variable to store title
						$title = $titles[$i];
						//variable to store description
						$description = $descriptions[$i];
						//var_dump($links);
						//exit;
					}// end of for loop
					?>

					<div class="post_box">
						<div class="header">

							<?php
							// display titles, dates and authors in appropriate format
							echo '<article>';
							echo "<h3 style='text-decoration: underline'><a href='$links'>$titles</a></h3>";
							echo '<p>' . "Date Saved: " . $dates . '</p>';
							echo '<p>' . " author@ " . $authors . '</p>'; ?>

							<div class="tag"><strong>Tags:</strong> <a href="commingsoon.php">JAZZ</a>, <a href="commingsoon.php">HIP HOP</a>, <a
									href="commingsoon.php">Rock</a></div>
                <span class="posted_date">
                   <?php
                   // display dates in small beautiful icon
                   echo $dateDM; ?>
	                <strong><?php echo $dateY; ?></strong>
                </span>
						</div>


						<?php
						// explode or convert the first element of descriptions of the articles which is images
						$img = explode('"', $descriptions[0]);

						// display the image of the articles in appropriate format
						echo "<a href='$img[1]'><img src='$img[1]' alt='$titles' title='$titles'></a>"; ?>



						<div class="pb_right">

							<?php
							// display the description of the articles in appropriate format
							echo "<p>$descriptions[1] </p>";
							echo '</article>' ?>

							<div class="comment"><?php
								// link to open full description
								echo "<a href='$links'>Read More....</a>" ?></div>
						</div>

						<div class="cleaner"></div>
						<div align="right">
							<?php

							// store the links and titles of the artices in array
							$array = array($links, $titles);
							// convert the array into string
							$values = implode(",", $array); ?>


                           <!-- hidden label for checkbox-->
							<label for="feed" style="visibility: hidden">Checkbox</label>
							<!--a checkbox next to articles and sign the value to check box-->
							<input  id="feed" type="checkbox" class="checkbox1" name="feed[]"
							       value="<?php echo escape($values); ?>"/>


							<!-- submit button next to articles-->
							<?php echo "<Input type='submit' class='delete' id='delete' value='Delete'>"; ?>

						</div>

					</div>

				<?php
				}


				?>

				<div align="right">
					<!-- Check all button to check all the articles-->
					<input id="delete" class="delete" type="submit" value="Delete Selection" onclick="return val();"/>
					<!-- button  to uncheck all the checked checkboxes-->
					<input id="save" type="reset" value="Uncheck All"/>
				</div>
				</form>
				<div align="right" style="padding-top: 3px;">
					<a onclick="javascript:checkAll('allfeeds', true);" href="javascript:void();">
						<!-- Check all button to check all the articles-->
						<button id="save">Check All</button>
					</a>
				</div>

			<?php
			}else{
		// if user doesn't have any saved feeds
				echo '<H3 style="color: tomato"> You don\'t have Music feeds Saved.  </H3>';

			}
}
	?>
<!-- java script function for alert box to display message for confirmation for delete-->
	<script language="JavaScript" type="text/javascript">
		$(document).ready(function () {

			$("Input.delete").click(function (e) {
				if (!confirm('Are you sure you want to delete Selected Item?')) {
					e.preventDefault();
					return false;
				}
				return true;
			});
		});
	</script>



	<?php
// import footer layout
	include_once '../layouts/footer.php'

	?>