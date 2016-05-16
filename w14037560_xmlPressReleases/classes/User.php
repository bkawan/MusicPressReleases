<?php
/**
 * Created by PhpStorm.
 * File: User.php
 * User: Bikesh Kawan
 * Student ID : W14037560
 * Date: 01/05/15
 * Time: 13:38
 * Module Title:Object Oriented and Web Programming
 * Module Number:CM0667
 * Module Tutor Name(s):Kay Rogage
 * Academic Year: 2014-2015
 *
 */

/**
 * Class User
 */
class User
{

	private $_db;
	private $_session_subscriberID = null;
	private $_session_email = null;
	private $_session_name = null;

	private $_cookie_name = null;
	private $_data = array();
	private $_isLoggedIn = false;

	/**
	 * @param null $user is set to null as we can use if want to find particular user
	 * @throws Exception
	 */
	public function __construct($user = null)
	{
		$this->_db = DatabaseObject::getInstance();

		$this->_session_subscriberID = Config::get('session/session_subscriberID');
		$this->_session_name = Config::get('session/session_name');
		$this->_session_email = Config::get('session/session_email');



		if (Session::exists($this->_session_subscriberID) && !$user) {

			$user = Session::get($this->_session_subscriberID);

			if ($this->find($user)) {

				$this->_isLoggedIn = true;// now current user is logged in

				$this->update(array('lastlogin'    => date('Y-m-d H:i:s', time() - 3600),
				));


			} else {
				$this->logout();

			}
		} else {

			$this->find($user);
		}

	}
	/**
	 * @return bool if user exists and no empty data of array return true other wise return false
	 */
	public function exists()
	{
		return (!empty($this->_data)) ? true : false;
	}

	/**
	 * @param null $user is username passed that comes from login() method when user supplied username in login form
	 * @return bool if user does exist return return true other wise false
	 */
	public function find($user = null)
	{

		if ($user) {
			$field = (is_numeric($user)) ? 'subscriberID' : 'email';

			$data = $this->_db->get('subscriber', array($field, '=', $user));


			if ($data->count()) {

				$this->_data = $data->first();

				return true;
			}
		}

		return false;
	}

	/**
	 * @param array $fields field want to insert the data from the registration form
	 * @throws Exception if due to some reason we cannot insert we will throw some  message
	 */
	public function create($fields = array())
	{
		if (!$this->_db->insert('subscriber', $fields)) {
			throw new Exception('There was a problem creating an account.');
		}
	}
	/**
	 * @param array $fields field we want to update
	 * @param null $id id of user is used in where clause to update
	 * @throws Exception if some reason we cannot update we will out put message
	 */
	public function update($fields = array(), $id = null)
	{
		if (!$id && $this->isLoggedIn()) {
			$id = $this->data()->subscriberID;
		}

		if (!$this->_db->update('subscriber', $id, $fields)) {
			throw new Exception('There was a problem updating User  account.');
		}
	}

	public function login($email = null, $password = null)
	{
		/**
		 * Check first if username and password are not supplied by login form to this method
		 * then user are automatically sign user in by using id stored in session
		 */

		if (!$email && !$password && $this->exists()) {

			/**
			 * storing user id, username, role and status in session variable
			 */
			Session::put($this->_session_subscriberID, $this->data()->subscriberID);
			Session::put($this->_session_email, $this->data()->email);
			Session::put($this->_session_name, $this->data()->name);

		} else {

			$user = $this->find($email);
			if ($user) {
				if ($this->data()->password === Hash::make($password)) {


					Session::put($this->_session_subscriberID, $this->data()->subscriberID);
					Session::put($this->_session_email, $this->data()->email);
					Session::put($this->_session_name, $this->data()->name);



					return true;
				}
			}
		}

		return false;
	}

	/**
	 * @return bool return either user is logged in or not ie true or false
	 */
	public function isLoggedIn()
	{
		return $this->_isLoggedIn;
	}

	/**
	 * @return array store all the data of currently working object  in array
	 */
	public function data()
	{
		return $this->_data;
	}

	/**
	 *  logout from the system and delete
	 * the row form the users_session and delete all the cookie and data store in sesion
	 */
	public function logout()
	{



		Session::delete($this->_session_subscriberID);
		Session::delete($this->_session_name);
		Session::delete($this->_session_email);


	}

}