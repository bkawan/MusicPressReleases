<?php
/**
 * Created by PhpStorm.
 * File: Press.php
 * User: Bikesh Kawan
 * Student ID : W14037560
 * Date: 09/05/15
 * Time: 18:53
 * Module Title:Object Oriented and Web Programming
 * Module Number:CM0667
 * Module Tutor Name(s):Kay Rogage
 * Academic Year: 2014-2015
 *
 */


include_once 'DatabaseObject.php';
include_once '../core/init.php';
include_once 'Session.php';
include_once'Config.php';

class Press
{


	private $_db;

	private $_session_subscriberID = null;


	private $_data = array();


	public function __construct()
	{


		$this->_db = DatabaseObject::getInstance($user = null);

		$this->_session_subscriberID = Config::get('session/session_subscriberID');


		/**
		 *  first if username  exist in session
		 * if it exist we grab the value from global configuration
		 */

		if (Session::exists('subscriberID')) {
			$this->_session_subscriberID = Config::get('session/session_subscriberID');
			/**
			 * then we pass the username in method called findAddressByUsername();
			 */
			$this->findMyPress($user);

		} else {

			/**
			 * if we don't have username value  from session we can find from specific username we want find
			 */
			// var_dump($this->_session_username . " username  ");
			$this->findMyPress($user);
		}


	}

	/**
	 * @return bool if user exists and no empty data of array return true other wise return false
	 */
	public function exists()
	{
		return (!empty($this->_data)) ? true : false;
	}

	public function findMyPress($id = null)
	{
		if (Session::exists('subscriberID')) {
			$id = $this->_session_subscriberID;
		}


		$data = $this->_db->get('saved_press_releases', array('subscriberID', '=', $id));


		if ($data->count()) {
			$this->_data = $data->first();

			return true; // it will store all the results in $_data

			// var_dump($this->_data);
		} else {
			// we can to perform certain action
			// echo " Sorry we coudnot find address";

		}

	}

	/**
	 * @param array $fields field want to insert the data from the registration form
	 * @throws Exception if due to some reason we cannot insert we will throw some  message
	 */
	public function savePress($fields = array())
	{
		if (!$this->_db->insert('saved_press_releases', $fields)) {
			throw new Exception('There was a problem saving  press.');
		}
	}

	public function data()
	{
		return $this->_data;
	}


}