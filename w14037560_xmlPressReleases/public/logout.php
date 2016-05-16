<?php

/**
 * Created by PhpStorm.
 * File: logout.php
 * User: Bikesh Kawan
 * Student ID : W14037560
 * Date: 07/05/15
 * Time: 22:36
 * Module Title:Object Oriented and Web Programming
 * Module Number:CM0667
 * Module Tutor Name(s):Kay Rogage
 * Academic Year: 2014-2015
 *
 * This is for logut page when user logout from the syestem
 */

/**
 * Import necessary classes and functions
 */
require '../core/init.php';
require_once'../classes/Config.php';
require_once '../includes/dbConfig.php';
require_once '../classes/Database.php';
require_once '../classes/Session.php';
require_once '../functions/general.php';
require_once '../classes/User.php';
//require_once'classes/Hash.php';
//require_once'classes/Validate.php';
//require_once'classes/Database.php';
require_once '../classes/Redirect.php';
require_once '../classes/Press.php';
require_once '../classes/Input.php';


// instantiate user class
$user = new User();
// call the logout method of the user class
$user->logout();
// store confirmation message and redirect to main home page of the website
Session::flash('logout','You have successfully logged Out');
Redirect::to('../index.php');