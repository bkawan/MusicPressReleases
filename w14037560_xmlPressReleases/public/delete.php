<?php
/**
 * Created by PhpStorm.
 * File: delete.php
 * User: Bikesh Kawan
 * Student ID : W14037560
 * Date: 03/05/15
 * Time: 23:32
 * Module Title:Object Oriented and Web Programming
 * Module Number:CM0667
 * Module Tutor Name(s):Kay Rogage
 * Academic Year: 2014-2015
 *
 * this file process  the form when user delete the articles
 */
// import necessary classes and functions
require '../core/init.php';
require_once '../classes/Config.php';
require_once '../includes/dbConfig.php';
require_once '../classes/Database.php';
require_once '../classes/Session.php';
require_once '../functions/general.php';
require_once '../classes/User.php';
require_once '../classes/Redirect.php';
require_once '../classes/Press.php';
require_once '../classes/Input.php';

// get the id of subscriber using session and store in a variable
$id = Session::get('subscriberID');
// get the pressID of the articles  from the form
$pressID = escape(Input::get('pressID'));


// instantiate the singleton database class
$db = Database::getConnection();


// to check if user has checked the check boxes
if (Input::exists()) {

	// variable to store the values of checkboxes  if user has checked the check box
	$checkboxes = Input::get('feed');


	// loop through all the check boxes and delete them from database
	for ($i = 0; $i < count($checkboxes); $i++) {
		// variable to store all checkboxes values
		$checkbox = $checkboxes[$i];
		// variable to store checkboxes values in array
		$values = explode(",", $checkbox);

		// first element of array is link
		$values[0];
		// convert the link into CDATA as we haved store links with CDATA in database
		$link = '<![CDATA[' . $values[0] . ']]>';


		//sql statement for delete
		$sql = "Delete from saved_press_releases WHERE pressReleaseID = '$link' AND subscriberID = '$id'";

		// run the sql query

		$db->query($sql);

	}// end of for loop
	// if successfully delete all the checked articles store store confirmation message and redirect to myFeeds page
	Session::flash('delete', "You have successfully delete the selected Music Feeds. Below are your  Feeds  ");
	Redirect::to('myFeeds.php');


}
// if user din't seletc or checked the check boxes and clicked the delete button  store message to display
Session::flash('notdelete', "No feeds have been deleted as no feeds was selected, please try again ");

Redirect::to('myFeeds.php');

