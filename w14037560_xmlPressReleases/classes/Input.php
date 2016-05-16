<?php
/**
 * Created by PhpStorm.
 * File: Input.php
 * User: Bikesh Kawan
 * Student ID : W14037560
 * Date: 01/05/15
 * Time: 13:33
 * Module Title:Object Oriented and Web Programming
 * Module Number:CM0667
 * Module Tutor Name(s):Kay Rogage
 * Academic Year: 2014-2015
 *
 */
class Input {
	public static function exists($type = 'post') {
		switch($type) {
			case 'post':
				return (!empty($_POST)) ? true : false;
			break;
			case 'get':
				return (!empty($_GET)) ? true: false;
			break;
			default:
				return false;
			break;
		}
	}

	public static function get($item) {
		if(isset($_POST[$item])) {
			return $_POST[$item];
		} else if (isset($_GET[$item])) {
			return $_GET[$item];
		}
		
		return '';
	}
}