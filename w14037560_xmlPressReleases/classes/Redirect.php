<?php
/**
 * Created by PhpStorm.
 * File: Redirect.php
 * User: Bikesh Kawan
 * Student ID : W14037560
 * Date: 01/05/15
 * Time: 13:34
 * Module Title:Object Oriented and Web Programming
 * Module Number:CM0667
 * Module Tutor Name(s):Kay Rogage
 * Academic Year: 2014-2015
 *
 */
class Redirect {
	public static function to($location = null) {

		if($location) {
			if(is_numeric($location)) {
				switch($location) {
					case 404:
						header('HTTP/1.0 404 Not Found');
						include '../includes/errors/404.php';
						exit();
					break;
				}
			} else {
				header('Location: ' . $location);
				exit();
			}
		}
	}
}