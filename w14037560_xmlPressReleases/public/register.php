<?php
/**
 * Created by PhpStorm.
 * File: register.php
 * User: Bikesh Kawan
 * Student ID : W14037560
 * Date: 07/05/15
 * Time: 22:36
 * Module Title:Object Oriented and Web Programming
 * Module Number:CM0667
 * Module Tutor Name(s):Kay Rogage
 * Academic Year: 2014-2015
 *
 */



require '../core/init.php';
require_once'../classes/Config.php';
require_once '../includes/dbConfig.php';
require_once '../classes/Database.php';
require_once '../classes/Session.php';
require_once '../functions/general.php';

require_once '../classes/User.php';
require_once'../classes/Hash.php';
require_once'../classes/Validate.php';
require_once'../classes/DatabaseObject.php';
require_once '../classes/Redirect.php';
require_once '../classes/Press.php';
require_once '../classes/Input.php';
require_once '../classes/Token.php';
?>


<?php
$title = "Registration";
require_once'../layouts/header.php';





if(Input::exists()) {

	if(Token::check(Input::get('token'))) {
		$validate = new Validate();
		$validation = $validate->check($_POST, array(
			'email' => array(
				'required' => true,
				'unique_subscriber' => 'subscriber'),
			'password' => array(
				'required' => true,
				'min' => 6),
			'password-again' => array(
				'required' => true,
				'matches' => 'password'),
			'name' => array(
				'required' => false,
				'min' => 2,
				'max' => 50)
		));

		if($validation->passed()) {
			$user = new User();


			try {
				$user->create(array(
					'email' 	=> Input::get('email'),
					'name' 	=> Input::get('name'),
					'password' 	=> Hash::make(Input::get('password')),
					'lastlogin' 	=>'0000-00-00 00:00:00'



				));

				Session::flash('registered', 'You have been registered successfully and can now log in!');
				Redirect::to('login.php');

			} catch(Exception $e) {
				die($e->getMessage());
			}

		} else {
			foreach($validate->errors() as $error) {
				echo '<div style="color: tomato; padding-left: 60px; font-size: 12pt">'.$error. '</div>';
			}
		}
	}
}
?>




	<div id="login">
		<div id="triangle"></div>
		<h1>Registration Form</h1>
		<form action="" method="post" id="form">
			<input type="text"  name="name" placeholder="Full Name :" />
			<input type="email"  name="email" placeholder="Email : " />
			<input type="password" name="password" placeholder="Password :" />
			<input type="password" name="password-again" placeholder="Password Again :" />
			<input class="sub" type="submit" value="Register Now" />
			<input type="hidden" name="token" value="<?php echo Token::generate(); ?>">
			<div align="right" style="font-size: 15px; padding-top: 3px; color: #ff0000">Already Register <a href="login.php">Login Here</a></div>

		</form>
	</div>
	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>


	<script src="../js/index.js"></script>






<?php
require_once'../layouts/footer.php';

?>