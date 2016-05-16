<?php

/**
 * Created by PhpStorm.
 * File: Database.php
 * User: Bikesh Kawan
 * Student ID : W14037560
 * Date: 03/05/15
 * Time: 20:19
 * Module Title:Object Oriented and Web Programming
 * Module Number:CM0667
 * Module Tutor Name(s):Kay Rogage
 * Academic Year: 2014-2015
 *
 */
//require_once'../includes/dbConfig.php';
class Database
{


// database connection using Singletorn pattern
// creational pattern that will restrict an application to creating only a single instance of a particular class type
	// private static to thold the connection
	// static  variable $dbConnection variable is tied to  class pdoDB itself but not an istance of pdoDB
	// private mean we can access $dbConnection variable only insde this class ie class pdoDB
	// static  variable refer to class attribute not an instance variable
	//static attribute to guarantee that only one instance of a particular class exists.
	// Store a single instance of this class:
	private static $dbConnection = null;

	// make the next 2 functions private to prevent normal class instantiation and to notify error if created
	// as private method cannot be call outside the class
	private function __construct()
	{
	}

	private function  __clone()
	{
	}

	/*Method for returning the instance of this class but return PDO
	 * Return DatabaseObject connection or create initial connection
	 * @return object ( PDO)
	 * @access public
	 */

	public static function getConnection()
	{
		/* if there is not  is not a connection already then create one
		 * self mean this this class (pdoDB)
		 * :: mean ternary operator to access static property
		 * self::$dbConnection mean (pdoDB class is accessing its static property $dbConnection
		 * PDO::SetAttribute - Set  an Attribute
		 * Configure PDO to use esceptions
		 * PDO::ATTR_ERRMODE = ERROR Reproting
		 * PDO::ERMODE_EXCEPTION = THROW
		 * connect to mysql but inside try ---catch structure
		 */
		if (!self::$dbConnection) {
			try {


				//self::$dbConnection = new PDO("mysql:host=newnumyspace.co.uk ;dbname=unn_w14037560", 'unn_w14037560', 'myspace');
				self::$dbConnection = new PDO('mysql:host=' .DB_SERVER. ';dbname=' . DB_NAME, DB_USER, DB_PASS);

				self::$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} catch (PDOException $e) {
				// in a production system you would log the error not display it
				echo "DATABASE CONNECTION ERROR" . $e->getMessage();
			};
		}

		return self::$dbConnection;
	}


}




