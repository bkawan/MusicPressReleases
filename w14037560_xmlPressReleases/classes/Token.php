<?php
/**
 * Created by PhpStorm.
 * File: Token.php
 * User: Bikesh Kawan
 * Student ID : W14037560
 * Date: 17/05/15
 * Time: 04:48
 * Module Title:Object Oriented and Web Programming
 * Module Number:CM0667
 * Module Tutor Name(s):Kay Rogage
 * Academic Year: 2014-2015
 *
 */

class Token {

	public static function generate() {
		return Session::put('token', md5(uniqid()));
	}

	public static function check($token) {
		$tokenName = Config::get('session/token_name');

		if(Session::exists($tokenName) && $token === Session::get($tokenName)) {
			Session::delete($tokenName);
			return true;
		}

		return false;
	}
}