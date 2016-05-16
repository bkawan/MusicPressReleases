<?php
/**
 * Created by PhpStorm.
 * File: aboutus.php
 * User: Bikesh Kawan
 * Student ID : W14037560
 * Date: 17/05/15
 * Time: 20:38
 * Module Title:Object Oriented and Web Programming
 * Module Number:CM0667
 * Module Tutor Name(s):Kay Rogage
 * Academic Year: 2014-2015
 *
 * this file ie meant to be for any page that is coming soon
 */
// import necessary classes and function
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

// title for the page
$title = " Comming soon";
// import header layout
require_once'../layouts/header.php';
?>

<div>
	<H3 style="color: tomato"> Comming Soon ......</H3>

</div>



<?php
// import footer layout
require_once'../layouts/footer.php';

?>