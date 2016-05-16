<?php
require_once '../core/init.php';
require_once '../classes/Session.php';
require_once '../functions/general.php';
require_once '../classes/Config.php';
require_once '../includes/dbConfig.php';
require_once '../classes/Database.php';
require_once '../classes/DatabaseObject.php';

require_once '../classes/Redirect.php';
require_once '../classes/User.php';



if (Session::exists('subscriberID')) {
	$id = Session::get('subscriberID');
}
$elementName = "user" . $id;    // create a variable for each element name
$fileName = "$elementName.xml";





?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Manage Music Feeds</title>
	<meta name="keywords" content="Manage Music Feeds"/>
	<meta name="description" content=""/>
	<link href="../css/main.css" rel="stylesheet" type="text/css"/>
	<link href="../css/styles_table.css" media="all" rel="stylesheet" type="text/css"/>
	<link href="../css/style-1.css" media="all" rel="stylesheet" type="text/css"/>

	<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js" ></script>
	<script language="javascript" type="text/javascript">
		function clearText(field) {
			if (field.defaultValue == field.value) field.value = '';
			else if (field.value == '') field.value = field.defaultValue;
		}
	</script>
	<Script type="text/javascript">
		$(document).ready(function() {
			$('#selectall').click(function(event) {  //on click
				if(this.checked) { // check select status
					$('.checkbox1').each(function() { //loop through each checkbox
						this.checked = true;  //select all checkboxes with class "checkbox1"
					});
				}else{
					$('.checkbox1').each(function() { //loop through each checkbox
						this.checked = false; //deselect all checkboxes with class "checkbox1"
					});
				}
			});

		});
	</Script>

	<script type="text/javascript" language="javascript">// <![CDATA[
		function checkAll(formname, checktoggle)
		{
			var checkboxes = new Array();
			checkboxes = document[formname].getElementsByTagName('input');

			for (var i=0; i<checkboxes.length; i++)  {
				if (checkboxes[i].type == 'checkbox')   {
					checkboxes[i].checked = checktoggle;
				}
			}
		}
	</Script>
	<script type="text/javascript">
		$(document).ready(function () {

			$("button.logout").click(function (e) {
				if (!confirm('Are you sure you want to Logout?')) {
					e.preventDefault();
					return false;
				}
				return true;
			});
		});
	</script>



</head>
<body>
<div id="header">

	<div id="site_title">

		<p><a  href="index.php"style="color:crimson; padding-left: 250px; padding-bottom: 30px "> 24/7 Music News </a></p>


	</div>
	<!-- end of site_title -->


	<div id="header_right">
		<div align="right">
		<a href="https://twitter.com/Northumbriauni"><img src="../images/twitter.png" alt="twitter"/></a><a href="#"><img
				src="../images/rss.png" alt="rss"/></a>
		<?php if (Session::exists('subscriberID')) {
			$id = Session::get('subscriberID');
			$user = new User();
			$name = $user->data()->name;
			?><div style="margin-bottom: -20px; margin-top:-20px;">
			<a href="profile?id=<?php echo $id; ?>">Welcome !! <?php echo $name ?></a> <a href="logout.php"><button class="logout" id="logout">Logout</button></a></div>


		<?php }else{
			echo '<a href="login.php"><button id="lr">Login</button></a>|';
			echo '<a href="register.php"><button id="lr">Register</button></a>';
		}?>
	</div>
		<!--		<a href="#"><img src="images/twitter.png" alt="twitter"/></a><a href="#"><img-->
		<!--				src="images/rss.png" alt="rss"/></a>-->

		<div id="search_box">
			<form action="search.php" method="post">
				<input type="text" id="user" name="search" class="feed_search" value=""
				       onfocus="clearText(this)" onblur="clearText(this)"/>
				<input style="font-weight: bold;" type="submit" name="submit" id="submit" value=""/>
			</form>
		</div>

	</div>

	<div class="cleaner"></div>

</div>

<div id="menu_wrapper">

	<div id="menu">
		<ul>
			<li><a href="index.php" class=""><span></span>Home</a></li>
			<?php if (Session::exists('subscriberID')) {
				?>

				<li><a href="myFeeds.php"><span></span>My Feeds</a></li> <?php }?>
			<li><a href="index.php"><span></span>Latest Music News</a></li>
			<li><a href="gallery.php"><span></span>Gallery</a></li>
			<li><a href="commingsoon.php"><span></span>Reviews</a></li>
			<li><a href="aboutus.php" ><span></span>About us</a></li>
			<li><a href="contactus.php" ><span></span>Contact us</a></li>
		</ul>
	</div>
</div>
<div id="main"><span class="tm_bottom"></span>

	<div id="content">

		<div class="content_box">
			<h1>Music News <span>Your Music News RSS Reader</span></h1>

			<p> A complete Music News Reader from various Music site.</p>

		</div>

		<?php $feed = simplexml_load_file($fileName);
		if (count($feed)){
		?>
<div class="post_box" style="margin-top: 20px">

	<!--	<div id=class="content7">-->
	<form name="allfeeds" action="delete.php" method="POST">
		<div class="content7_m" style="color: tomato; font-size: 15pt">Displayed below is the list of your Saved Music Feeds</div>
		<div style="padding-left: 3px; padding-bottom: 5px; width: 955px" align="right">
			<input type="checkbox" name="checkall" id="selectall"/> Check All
			<input id='delete' type="submit" class="delete" value='Delete Selection'/>
		</div>
		<table class="demo">
			<thead>
			<tr>
				<th>Feed ID</th>
				<th>Title</th>
				<th>Details</th>
				<th>More Details</th>
				<th>Date Saved</th>
				<th>Select Item</th>
				<th>Action</th>
			</tr>
			</thead>

			<tbody>

			<?php

			foreach ($feed as $feeds) {
				$title = $feeds->title;
				$link = $feeds->link;
				$desc = explode("/>", $feeds->description);

				$img = explode('"', $desc[0]);
				//$desc = $feeds->description;
				//$img = $feeds->description->img['src'];
				$dateSaved = $feeds->dateSaved;

				$id = explode("=", $link);
//				$sn = $count+1;


				for ($i = 0; $i < count($link); $i++) {
					$links = $link[$i];
					$titles = $title[$i];
					//var_dump($links);
					//exit;
				}
				?>
				<tr>


					<td><?php echo $id[1] ?></td>
					<td><?php echo $title; ?></td>
					<td><?php echo "<a href='$img[1]'><img src='$img[1]' width='100' height='100'/></a>" . $desc[1]; ?></td>
					<td><?php echo "<a href='$link'>" . "Click Here"; ?></a></td>
					<td><?php echo $dateSaved; ?></td>

					<?php $array = array($links, $titles);
					$values = implode(",", $array);

					?>
					<td><input type="checkbox" class="checkbox1" name="feed[]"
					           value="<?php echo escape($values); ?>"></td>
					<td>
						<Input type="submit" id='delete' value="Delete" class="delete">
					</td>
				</tr>
			<?php } ?>
			</tbody>
		</table>
		<div  style="width: 955px" align="right">
			<input id="delete" class="delete" type="submit" value="Delete Selection"/>
			<input id="save" type="reset" value="Uncheck All"/>


		</div>
	</form>
	<div  style="width: 955px" align="right">
	<a onclick="javascript:checkAll('allfeeds', true);" href="javascript:void();">


		<button id="save">Check All</button>

	</a>
	</div>

	<!--	</div>-->

</div>
		<?php }else{
			echo '<H3 style="color: tomato"> You don\'t have Music feeds Saved.  </H3>';
		}?>

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

</div>
<div id="sidebar">
	<div class="sidebar_box">
		<h3>My Accounts</h3>
				<ul class="sidebar_menu">
					<li><a href='myFeeds.php' style=font-size:12px>My Saved Feeds</a></li>
					<li><a href='myFeeds.php' style=font-size:12px>Profile</a></li>
				</ul>

	</div>


</div>

<div class="cleaner"></div>
</div>
<!-- end of main -->

<div id="bottom">
	<div class="bottom_box">
		<h5><span>New Album</span> Releases </h5>

		<p>Metallica</p>

		<p>AC/DC</p>

		<p>The Script</p>
		<a href="#" class="continue">More albums</a>
	</div>

	<div class="bottom_box">
		<h5><span>Upcoming </span> Concerts</h5>

		<p> Metallica </p>

		<p> The Script </p>

		<p> Iron Maiden </p>
		<a href="http://www.metallica.com" class="continue">more info</a>
	</div>

	<div class="bottom_box">
		<h5><span>Recent</span> Head Lines</h5>
		<ul class="bottom_box_list">
			<?php echo "<li><a href='#'>Metallica</a></li>"; ?>

		</ul>
	</div>

</div>
<!-- end of bottom -->

<div id="footer">

	<ul class="footer_menu">
		<li class="first"><a href="index.php">Home</a></li>
		<li><a href="aboutus.php">About us</a></li>
		<li><a href="contactus.php">Contact us</a></li>
		<li><a href="http://www.youtube.com">Youtube</a></li>
		<li><a href="https://www.facebook.com/NorthumbriaUni">Follow us</a></li>
		<li><a href="contactus.php">Feedback</a></li>
	</ul>

	Copyright © 2015 <a href="#">Bikesh Kawan</a> |
	<a href="#" target="_parent">Music News Reader</a> by <a
		href="#" target="_parent">24/7 Music News</a></div>

</body>
</html>