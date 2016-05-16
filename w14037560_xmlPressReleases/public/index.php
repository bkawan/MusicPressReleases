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
 * this file is only for user who are logged in to the system
 * It display the articles in appropriate format  and also process the form as well
 */
//import necessary classes and functions
require_once '../core/init.php';
require_once '../classes/Session.php';
require_once '../functions/general.php';
require_once '../classes/Config.php';
require_once '../classes/User.php';
require_once '../includes/dbConfig.php';
require_once '../classes/Database.php';
require_once '../classes/DatabaseObject.php';
require_once '../classes/Input.php';
require_once '../classes/Redirect.php';

// to give title of the page
$title = " 24/7 Music News -RSS Reader";

// import header layout for the page
include_once '../layouts/header.php';


//check if session exists with subscriber id
if (Session::exists('subscriberID')) {
	// if exists assign variable with subscriber
	$id = Session::get('subscriberID');
} else {
	// if subscriber not exist redirect to main home page
	Redirect::to('../index.php');
}
// this is another way to display message to user
// check if session exists when user delete the articles
if (Session::exists('!delete')) {
	// if session exist when user delete the articles, a message will be displayed
	echo '<div class="flash" style="margin-left: -10px">' . Session::flash('!delete') . '</div>';

}
// single page form process to save articles in the database
// process the form in try catch block
try {
	//check if form input is supplied by the user,in this case we have only checkboxes
	if (Input::exists()) {
// if user has checked the checkbox, assign the variable with checkbox values
		$checkboxes = $_POST['feed'];
		//$titles = $_POST['link'];

		// run for loop for all checked checkboxes
		for ($i = 0; $i < count($checkboxes); $i++) {
			// assign variable with checked values
			$checkbox = $checkboxes[$i];
			// explode the checkbox values to that we can separate title,description, images of the article
			$values = explode("||-||", $checkbox);
			// link of the articles
			//  Using CDATA,  the data in between these tags includes data that could be interpreted as XML markup
			$link = '<![CDATA[' . $values[0] . ']]>';
			// title of the articles
			$title = '<![CDATA[' . $values[1] . ']]>';
			// description of the articles
			// description of the articles containt text and images
			//so again we need to explode the description values to get images and text description
			$desc = explode("/>", $values[2]);

			// get image of the articles
			$img = '<![CDATA[' . $desc[0] . ']]>';
			// get text description of the articles
			$descriptions = '<![CDATA[' . $desc[0] . '/>' . ']]>' . '<![CDATA[' . $desc[1] . ']]>';

			// date user save the articles
			$dateSaved = date('Y-m-d H:i:s', time() - 3600);

			// instantiate Database class fora database connection
			$db = Database::getConnection();

			//insert sql statement with bind parameter
			$sql = 'INSERT INTO saved_press_releases(pressReleaseID,subscriberID, link,title,description,dateSaved) VALUES (:pressReleaseID, :subscriberID,:link,:title,:description,:dateSaved)';
			$stmt = $db->prepare($sql);
			$stmt->bindParam(':pressReleaseID', $link);
			$stmt->bindParam(':subscriberID', $id);
			$stmt->bindParam(':link', $link);
			$stmt->bindParam(':title', $title);
			$stmt->bindParam(':description', $descriptions);
			$stmt->bindParam(':dateSaved', $dateSaved);

			//execute the statement will save the articles in the database
			$stmt->execute();


		}
		// After successfully saved, store a session flash  message and redirect to myfeeds page
		Session::flash('saved', "You have successfully saved the selected Music Feeds. Below are your Feeds  ");
		Redirect::to('myFeeds.php');


	}
	// if any reason articles can't be saved in database
	// catch the error message in catch block and display appropriate message to user
} catch (Exception $e) {
	// get values of the checked boxes
	$checkboxes = $_POST['feed'];
	// display message if articles is already saved in database
	echo '<H3 style="color: tomato ;">Please UnCheck the following  feeds and save again </H3>';

	// run for loop for all the checked checkboxes and check the values with database
	for ($i = 0; $i < count($checkboxes); $i++) {

		//assign variables with checkbox values
		$checkbox = $checkboxes[$i];
		// explode the  $checkbox values to get link of the articles as link is the primary key in database
		$values = explode("||-||", $checkbox);

		// link of the articles to be check with database
		$link = '<![CDATA[' . $values[0] . ']]>';

		//instantiate database database singletion class
		$db = Database::getConnection();
		// select sql statement
		$sql = "SELECT pressReleaseID from saved_press_releases WHERE  subscriberID='$id'";

		// run the sql statemetn
		$stmt = $db->query($sql);

		// fetch all row as object
		while ($row = $stmt->fetchObject()) {

			// get all pressReleaseID  from the database and assign it to varibale
			$checked = $row->pressReleaseID;
			// store all the pressReleaseId in array
			$array = array($checked);

			//check if values of checkboxes is in array of saved press releases articles
			if (in_array($link, $array)) {
				// if checkbox values is in arrary display message to user
				echo '<p style=" font-size:12pt;color:saddlebrown">' . $values[1] . ": <b>Already Exists</b>" . '<p>';

			}//end of if statement

		}//end of while loop
	}// end of for loop
}//end of catch block


// variable to store RSS of the websites
$url = "http://www.music-news.com/rss/news.asp";
// get the xml file we already saved in our file
$cache = '../xml/music_news_releases.xml';

// if the cache file exists, suppress errors
// and load it as SimpleXML
if (file_exists($cache)) {
	// to show any errors
	libxml_use_internal_errors(true);
	// load music_news_releases.xml file
	$feed = simplexml_load_file($cache);
} else {
	// if there error
	$feed = false;
}


// if xml file has error or is empty
if ($feed === false) {
	// display aappropriate message
	echo '<p>Sorry,we do not have any press release today  </p>';

	// if xml file contain no errors and it has xml document
} else {

	?>
	<!--Title of for the list of articles-->
	<H2 style="color: tomato">Latest Music News </H2>

	<!--will list all the articles inside the form -->
	<form action="" method="POST" name="allfeeds">

	<div style="padding-bottom: 20px" align="right">

		<!--check box to check all-->
		<input type="checkbox" name="checkall" id="selectall"/> Check All
		<!--submit button to save check box value-->
		<input id='save' type="submit" value='Save Selection' onclick="return val();"/>
	</div>


	<?php
	// channel element is described by RSS
	// item is one of the three required child element of channel elements
	// now looping through all the required child element of item element
	foreach ($feed->channel->item as $item) {

		//getting value of child elements using object notation

		//variable to store link of  articles
		$links = $item->link;
		//variable to store titles of articles
		$titles = $item->title;

		//variable to store authors of  articles
		$authors = $item->author;


		// variable to store publication date of the articles
		$pubDates = new DateTime($item->pubDate);
		//formatting the publication date like Wed, 8:45 am GMT, May 27, 2015
		$dates = $pubDates->format('D, g:i a T, F j, Y');

		// extracting only day and month of the publication date
		$dateDM = $pubDates->format(' F j');
		//extracting only year of the publication date
		$dateY = $pubDates->format(' Y');

		//variable to store desciptions of the articles which contain text and images
		$descriptions = $item->description;

		//variable to store description of article into array so that we can explode it
		//and extract the images and descriptions to display in appropriate formate
		$des = array($item->description);
		// variable to store store the first elements of the array in string
		$desValues = $des[0];
		// explode or break  the the first  string element in the array into array
		$values = explode("/>", $desValues);


		// for loop  to get all the values of variable we have assigned above
		for ($i = 0; $i < count($links); $i++) {

			// variable to store link of particular articles
			$link = $links[$i];
			//variable to store titles of particular articles
			$title = $titles[$i];
			//variable to store descriptions of particular articles
			$description = $descriptions[$i];
			//$author = $authors[$i];

		}// for loop ends

		?>
		<!---Main container to display to Press release articles start---->
		<div class="post_box">
			<div class="header">

				<?php
				// display the title as link of articles
				echo "<p style='text-decoration: underline;font-size: large;padding-bottom: 4px;'><a href='$links'>$titles</a></p>";
				//display date of articles
				echo '<p>' . "Published Date: " . $dates . '</p>';
				//display aurthors of articles
				echo '<p>' . " Author@ " . $authors . '</p>'; ?>

				<!-- display the tags for the articles-->
				<div class="tag"><strong>Tags:</strong> <a href="commingsoon.php">JAZZ</a>, <a href="commingsoon.php">HIP
						HOP</a>, <a
						href="commingsoon.php">Rock</a></div>
                <span class="posted_date">

                   <?php
                   // display day and month in small image icon
                   echo $dateDM; ?>
	                <strong><?php
		                //display year in small image icon
		                echo $dateY; ?></strong>
                </span>
			</div>

			<?php
			// we need to extract image from the descriptions
			// explode or break the first string element into array to get images
			$img = explode('"', $values[0]);
			// var_dump($img[1]);
			//var_dump($img[0]);
			//var_dump($img[3]);

			//exit;
			// displaying images with alt and image link
			echo "<a href='$img[1]'><p><img src='$img[1]' alt='$titles' title='$titles'/></p></a>"; ?>


			<div class="pb_right">

				<?php
				// display text description of the articles
				echo '<p>' . decode($values[1]) . '</p>'; ?>


				<div class="comment"><?php echo "<a href='$links'>Read More....</a>" ?></div>
			</div>

			<div class="cleaner"></div>
			<div align="right">
				<?php
				/**
				 *  process to assign value for check box in the form of array
				 *  process to display small icon which denotes article already saved
				 */
				// Array variable  to store all the link, title, and description of the articles
				$array = array($link, $title, $description);

				// implode or convert the array variable into string with ||-|| separator
				//as it will be easy to separate link, title and description
				$values = implode("||-||", $array);?>
				<?php


				/**
				 * process to check the articles if already saved in database
				 * if it is already saved in database we will show small icon which represents already saved
				 */

				// converting link variable into CDATA
				$link = '<![CDATA[' . $link . ']]>';

				//instantiate the singleton database class
				$db = Database::getConnection();
				// select sQL statement
				$sql = "SELECT pressReleaseID from saved_press_releases WHERE  subscriberID='$id'";

				// run the sql query
				$stmt = $db->query($sql);

				// fetch each record as an object
				while ($row = $stmt->fetchObject()) {


					// variable to store the saved articles  and store them in array
					$saved = $row->pressReleaseID;
					$savedArray = array($saved);
					// echo $checked;
					//$title = 'http://www.music-news.com/ShowNews.asp?nItemID=89466';


					// condition statement to check if press release articles is in the array of saved articles
					if (in_array($link, $savedArray)) {
						// if the articles is in array that mean it is already saved
						// and then we display small icon which which refer already saved

						echo "<img  src='../images/ok-icon.png' style='margin-left:460px;width: 23px; height: 23px;'>";


					}//end of if statement
					else {

						// else nothing

					}
				}//end of while loop
				?>

				<!-- to display check box next to the articles  and supply the values checkboxes-->
				<input type="checkbox" class="checkbox1" name="feed[]" value="<?php echo escape($values); ?>"/>

				<!-- submit button next  to articles-->
				<?php echo "<Input type='submit' id='save' value='Save' onclick='return val();'>"; ?>

			</div>

		</div>

	<?php
	} // end of foreach loop
}// end of else statement

?>
	<div align="right">
		<!--- submit button to save selected check box-->
		<input id="save" type="submit" id="" value='Save Selection' onclick="return val();"/>
		<!--- submit button to uncheck  selected check box-->
		<input id='save' class="uncheck" type="reset" value="Uncheck All"/>
	</div>
	<!--- end of form -->
</form>

	<div align="right" style="padding-top: 3px;">

		<a onclick="javascript:checkAll('allfeeds', true);" href="javascript:void();">
			<!--- chell all  button to check all the  check box-->
			<button id="save">check all</button>
		</a>
	</div>



	<!--- Java script to display if user doesn't checked the check box and try to save -->

	<script type="text/javascript">
		function val() {
			var feeds = document.getElementsByName('feed[]');
			var hasChecked = false;
			for (var i = 0; i < feeds.length; i++) {
				if (feeds[i].checked) {
					hasChecked = true;
					break;
				}
			}
			if (hasChecked == false) {
				alert("Please select at least one feed to save");
				return false;
			}
			return true;
		}
	</script>
<?php


//import footer layout
include_once '../layouts/footer.php'

?>