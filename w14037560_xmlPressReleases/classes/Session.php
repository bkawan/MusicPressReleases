
<?php
/**
 * Created by PhpStorm.
 * File: Session.php
 * User: Bikesh Kawan
 * Student ID : W14037560
 * Date: 01/05/15
 * Time: 13:36
 * Module Title:Object Oriented and Web Programming
 * Module Number:CM0667
 * Module Tutor Name(s):Kay Rogage
 * Academic Year: 2014-2015
 *
 */
class Session {
	public static function exists($name) {
		return (isset($_SESSION[$name])) ? true : false;
	}

	public static function get($name) {
		return $_SESSION[$name];
	}
	
	public static function put($name, $value) {
		return $_SESSION[$name] = $value;
	}

	public static function delete($name) {
		if(self::exists($name)) {
			unset($_SESSION[$name]);
		}
	}

	public static function flash($name, $string = null) {
		if(self::exists($name)) {
			$session = self::get($name);
			self::delete($name);
			return $session;
		} else if ($string) {
			self::put($name, $string);
		}
	}
}