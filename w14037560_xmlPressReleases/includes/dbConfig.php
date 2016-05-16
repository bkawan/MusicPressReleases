<?php
/**
 * Created by PhpStorm.
 * File: dbconfig.php
 * User: Bikesh Kawan
 * Student ID : W14037560
 * Date: 01/05/15
 * Time: 14:02
 * Module Title:Object Oriented and Web Programming
 * Module Number:CM0667
 * Module Tutor Name(s):Kay Rogage
 * Academic Year: 2014-2015
 *
 */

// Database Constants
defined('DB_SERVER') ? null : define("DB_SERVER", "127.0.0.1");//server address
defined('DB_USER')   ? null : define("DB_USER", "username");//database user's username
defined('DB_PASS')   ? null : define("DB_PASS", "password");//database  user's password
defined('DB_NAME')   ? null : define("DB_NAME", "dbname");//database name

?>