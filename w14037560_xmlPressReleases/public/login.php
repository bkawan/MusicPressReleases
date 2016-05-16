<?php
/**
 * Created by PhpStorm.
 * File: login.php
 * User: Bikesh Kawan
 * Student ID : W14037560
 * Date: 07/05/15
 * Time: 22:36
 * Module Title:Object Oriented and Web Programming
 * Module Number:CM0667
 * Module Tutor Name(s):Kay Rogage
 * Academic Year: 2014-2015
 *
 * This file is for login page  and also process the login form
 */

/**
 * Import necessary classes and functions
 */
require '../core/init.php';
require_once '../classes/Config.php';
require_once '../includes/dbConfig.php';
require_once '../classes/Database.php';
require_once '../classes/Session.php';
require_once '../functions/general.php';
require_once '../classes/User.php';
require_once '../classes/Hash.php';
//require_once'classes/Validate.php';
require_once '../classes/Redirect.php';
require_once '../classes/Token.php';
require_once '../classes/Press.php';
require_once '../classes/Input.php';
?>


<?php

// title of the page
$title = "Login ";
// import the header layout
require_once '../layouts/header.php';

/**
 * login form process in  in if statement
 */
// to check input exist in the form
if (Input::exists()) {
	// to prevent cross site request forgery
	if (Token::check(Input::get('token'))) {
		/*
		 * if input exists in the form that emailand passoword
		 * instantiate user class
		 */
		$user = new User();

		// call the login method of user class to check if the email and password of the user match with database
		$login = $user->login(Input::get('email'), Input::get('password'));

		// if email and password is correct redirect to user homepage
		if ($login) {

			Redirect::to('index.php');
		} else {
			// display message if email and password combination is incorrect
			echo '<h4 style="color: tomato; padding-left: 50px;">Sorry, that username and password wasn\'t recognised.</h4>';
		}
	}
}


// display message after user has successfully register to the system
if (Session::exists('registered')) {

	echo '<h4 style="color: tomato; padding-left: 60px">' . Session::flash('registered') . '</h4>';
}
?>


	<div id="login">
		<div id="triangle"></div>

		<h1>Log in</h1>
		<!-- Login for starts -->
		<form action="" method="post" id="form">

			<!-- label for emaill address -->
			<label style="color: lightyellow ; font-size: large">Email Address:</label>

			<p style="color:#757575 ">someone@example.com</p>
			<!-- input box for email address-->
			<input type="text" name="email"/>
			<!-- label  for password-->
			<label style="color: lightyellow ; font-size: large">Password</label>

			<p style="color:#757575 ">Password must be minum 6 character</p>
			<!-- input box for password-->
			<input type="password" name="password"/>
			<!-- generate hidden token  to prevent cross site request forgery-->
			<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
			<!-- submit button to login to the system-->
			<input class="sub" type="submit" value="Log in"/>


			<!-- to display message if user is not logged in --->
			<div align="right" style="font-size: 15px; padding-top: 3px; color: #ff0000"> Not Register?? <a
					href="register.php">Register Here</a></div>

		</form>
	</div>
	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
	<!--	<script src="../js/index.js"></script>-->

<?php

// import layout footer
require_once '../layouts/footer.php';

?>