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
 * This file  represents about us page just
 */
// import necessary classes and functions
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

$title = "about us";

// import header layout
require_once'../layouts/header.php';
?>

<div>
	<H3 style="color: tomato"> About 24/7  Music News</H3>
     <p style="color: wheat"> Founder : <a href="www.northumbria.ac.uk"> Northumbria University</a></p>
	<p style="color: wheat; padding-bottom: 5px;"> Co-Founder : Bikesh Kawan, a Final year Student of Applied Computing </p>

	<p> We are Music News, a web  application  company which provides for
		clients to be able to read and  save and retrieve information from press releases relating to news and features about music.
		Currently, We are retrieving  only from the <a href=" http://www.music-news.com">music-news</a> . In future we will be working with many music websites.
	</p>
</div>



<?php
// import footer layout
require_once'../layouts/footer.php';

?>