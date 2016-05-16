<?php
/**
 * Created by PhpStorm.
 * File: contactus.php
 * User: Bikesh Kawan
 * Student ID : W14037560
 * Date: 12/05/15
 * Time: 04:59
 * Module Title:Object Oriented and Web Programming
 * Module Number:CM0667
 * Module Tutor Name(s):Kay Rogage
 * Academic Year: 2014-2015
 *
 *
 */

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
require_once '../layouts/header.php';
?>

	<div>
		<H3 style="color: tomato"> Contact Us</H3>

		<div style="color: wheat">

			<p>Company : <b>24/7</b> Music News</p>

			<p>Address : Ellison Place 2
				Newcastle-upon-Tyne
				NE1 8ST </p>

			<p>Phone: +44 (191) 232 6002</p>


			<p>Fax :+44 (191) 227 3903 </p>
			<p>Email : sv.employers@northumbria.ac.uk ; bikeshkawang@gmail.com
			            </p>


		</div>
	</div>


<?php
require_once '../layouts/footer.php';
?>