<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title><?php echo $title; ?></title>
	<meta name="keywords" content="Lates Music News RSS Reader Musicnews .com"/>
	<meta name="description" content=""/>
	<link href="../css/main.css" rel="stylesheet" type="text/css"/>
	<link href="../css/style.css" rel="stylesheet" type="text/css"/>
	<link href="../css/styles_table.css" media="all" rel="stylesheet" type="text/css"/>
	<link href="../css/style-1.css" media="all" rel="stylesheet" type="text/css"/>

	<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js" ></script>
	<script  type="text/javascript"> // <![CDATA[
		function clearText(field) {
			if (field.defaultValue == field.value) field.value = '';
			else if (field.value == '') field.value = field.defaultValue;
		}//]]>
	</script>
	<Script type="text/javascript">//<![CDATA[
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

		});//]]>
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
		}//]]>
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

	<div id="site_title" >

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
				<a href="profile.php?id=<?php echo escape($id); ?>">Welcome !! <?php echo $name ?></a> <a href="logout.php"><button class="logout" id="logout">Logout</button></a></div>


			<?php }else{
				echo '<a href="login.php"><button id="lr">Login</button></a>|';
				echo '<a href="register.php"><button id="lr">Register</button></a>';
			}?>
		</div>

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

				<li><a href="myFeeds.php" tabindex="10">My Feeds</a></li> <?php }?>
			<li><a href="index.php" tabindex="11">Latest Music News</a></li>
			<li><a href="gallery.php" tabindex="12">Gallery</a></li>
			<li><a href="commingsoon.php" tabindex="13">Reviews</a></li>
			<li><a href="aboutus.php" tabindex="14">About us</a></li>
			<li><a href="contactus.php" tabindex="15">Contact us</a></li>
		</ul>
	</div>
</div>
<div id="main"><span class="tm_bottom"></span>

	<div id="content">

		<div class="content_box">
			<h1> 24/7 Music News <span>Your Music News RSS Reader</span></h1>

			<p> A complete Music News Reader from various Music site.</p>

		</div>
