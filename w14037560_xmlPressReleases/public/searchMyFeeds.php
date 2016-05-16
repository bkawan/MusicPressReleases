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
 * this is logged in user search page
 */


require '../core/init.php';

require_once '../classes/Config.php';
require_once '../includes/dbConfig.php';

require_once '../classes/User.php';
require_once '../classes/DatabaseObject.php';

////require_once'classes/Hash.php';
////require_once'classes/Validate.php';
//require_once'../classes/Database.php';
require_once'../classes/Redirect.php';
require_once '../classes/Input.php';
require_once '../classes/Session.php';
require_once '../functions/general.php';
//$user = new User();
$title = "Search My Feeds";
//import header layout
include_once '../layouts/header.php';

// check if users exist to the system
if (Session::exists('subscriberID')) {
	// variable to store id of subscriber
	$id = Session::get('subscriberID');
}else{
	// if user dosen't exist redirect to main home page
	Redirect::to('../index.php');
}




// concatenate string user and id of the user to match with xml file name of the user
$elementName = "user" . $id;
// variable  to store xml file  of the  logged in user user which is ready to load
$cache = "$elementName.xml";

// instantiate use class
$user = new User();

// if the cache file exists, suppress errors
// and load it as SimpleXML
if (file_exists($cache)) {
	libxml_use_internal_errors(true);
	$feed = simplexml_load_file($cache);
} else {
	// if the cacchedoesn't exist
	$feed = false;
}


?>

<?php
// condition statement
if ($feed === false) {
	// display message if the xml file is empty or dosen't exists
	echo '<h5 style="color: tomato">Sorry,we do not have any press release today  </h5>';
} else {
	// check if input text  exists in search boxt
	if (Input::exists()) {

		// variable to store text input for the search
		$search = Input::get('search');

		//$feeds = $feed->xpath("//item[contains(title, '$search') or contains(description, '$search')]");    // do the xpath query

		//$feeds = $feed->xpath("//item[contains(translate(title,'ABCDEFGHIJKLMNOPQRSTUVWXYZ','abcdefghijklmnopqrstuvwxyz'), '$search') or contains(translate(description,'ABCDEFGHIJKLMNOPQRSTUVWXYZ','abcdefghijklmnopqrstuvwxyz'), '$search')]");    // do the xpath query

		// call the  custom search function and pass the value
		$feeds = searchMyElements($feed, $search,$elementName);


		// check if user is logged in to the system
		if (!$user->isLoggedIn()) {
			// if not logged in redirect to main  home page
			Redirect::to('../index.php');
		} else {
			// if user is logged in to the system
			// check if feeds contain atleast one articles
			if(count($feeds)){
			?>
			<H4 style="color: tomato"> Search Results From Your Saved Music Feeds</H4>
			<form action="delete.php" method="POST" name="allfeeds">
				<div style="padding-bottom: 20px" align="right">
					<input type="checkbox" name="checkall" id="selectall"/> Check All
					<input id='delete' type="submit" class="save"  value='Delete Selection'/>
				</div>


				<?php
				// loop through all the nodes of the xml files of  user
				foreach ($feeds as $item) {

					// links of the articles
					$links = $item->link;
					// titles of the article
					$titles = $item->title;
					// author of the articles
					$authors = $item->author;

					// publication date of the articles
					$pubDates = new DateTime($item->pubDate);
					// format publication date to display in appropriate format
					$dates = $pubDates->format('D, g:i a T, F j, Y');
					$dateDM = $pubDates->format(' F j');
					$dateY = $pubDates->format(' Y');

					// description of the articles
					$descriptions = $item->description;

					// variable to store the description of the article in array
					$des = array($item->description);
					// get first element of the array
					$desValues = $des[0];
					//  convert the first stirng element of array in array to extract images and description
					$values = explode("/>", $desValues);

					// loop through all the elements
					for ($i = 0; $i < count($links); $i++) {

						// link of the articles
						$link = $links[$i];
						// titles of the  articles
						$title = $titles[$i];
						// descriptions of the articles
						$description = $descriptions[$i];
						//$author = $authors[$i];

					}// end of for loop

					?>
					<div class="post_box">
						<div class="header">

							<?php
							// display titles, links, dates and author in appropriate format
							echo "<h3><a href='$links'>$titles</a></h3>";
							echo '<p>' . "Published Date: " . $dates . '</p>';
							echo '<p>' . " author@ " . $authors . '</p>'; ?>

							<div class="tag"><strong>Tags:</strong> <a href="#">JAZZ</a>, <a href="#">HIP HOP</a>, <a
									href="#">Rock</a></div>
                <span class="posted_date">
                   <?php echo $dateDM; ?>
	                <strong><?php echo $dateY; ?></strong>
                </span>
						</div>

						<?php
						// exploge the  first element of description array  and extract the image
						$img = explode('"', $values[0]);
						//                   var_dump($img[1]);
						// display images
						echo "<a href='$img[1]'><p>$values[0]</p></a>"; ?>


						<div class="pb_right">
							<?php
							// extract the text desctiption of the articles
							echo "<p> $values[1] </p>";
							?>

							<div class="comment"><?php echo "<a href='$links'>Read More....</a>" ?></div>
						</div>

						<div class="cleaner"></div>
						<div align="right">
							<?php
//							$array = array($link, $title, $description);
//							$values = implode("||-||", $array);?>
<?php
							// variable to store the links and titles
							$array = array($links, $titles);
// convert the arry into string ready to pass the value into checkbox
							$values = implode(",", $array); ?>



							<input type="checkbox"  class="checkbox1" name="feed[]" value="<?php echo escape($values); ?>"/>

							<?php echo "<Input type='submit' value='Delete' id='delete' class='delete' />"; ?>

						</div>

					</div>

				<?php
				}//end of foreach loop
				?>
				<input id="delete" class="save" type="submit" value="Delete Selected Item"/>
				<input id="save" class="uncheck" type="reset" value="Uncheck All"/>
			</form>
			<a onclick="javascript:checkAll('allfeeds', true);" href="javascript:void();">
				<button id="save">check all</button>
			</a>
<?php }// end fo if statement
			else{
				// if searquery is not good display message
				echo '<H4 style="color: tomato">Sorry, we coudn\'t find what you are looking, Please perform search again!!</H4>';


			}?>
			<!-- javascript function to show delete confirmation message-->
			<script language="JavaScript" type="text/javascript">
				$(document).ready(function () {

					$("Input.save").click(function (e) {
						if (!confirm('Are you sure you want to Delete selected Items?')) {
							e.preventDefault();
							return false;
						}
						return true;
					});
				});
			</script>
		<?php
		}


	} else {
		echo '<h5 style="color: tomato">Sorry, We are not able to perform  search. Please click on Search Button at right side!! <h5>';

	}

} ?>


<?php



// import layout footer
include_once '../layouts/footer.php';




?>
