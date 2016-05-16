<?php

/**
 * Created by PhpStorm.
 * File: Hash.php
 * User: Bikesh Kawan
 * Student ID : W14037560
 * Date: 01/05/15
 * Time: 13:32
 * Module Title:Object Oriented and Web Programming
 * Module Number:CM0667
 * Module Tutor Name(s):Kay Rogage
 * Academic Year: 2014-2015
 *
 */

/**
 * Class Hash This class will encrypt the password in sha1
 */
class Hash {
	/**
	 * @param $string -> string that is going to be encrypt in sha1
	 * @return string -> sha1 encrypted string
	 */
	public static function make($string) {
		return hash('sha1', $string);
	}


	/**
	 * @return string random unique id
	 */
	public static function unique() {
		return self::make(uniqid());
	}
}