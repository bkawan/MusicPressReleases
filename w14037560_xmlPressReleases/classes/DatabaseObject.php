<?php

/**
 * Created by PhpStorm.
 * File: Config.php
 * User: Bikesh Kawan
 * Student ID : W14037560
 * Date: 01/05/15
 * Time: 13:30
 * Module Title:Object Oriented and Web Programming
 * Module Number:CM0667
 * Module Tutor Name(s):Kay Rogage
 * Academic Year: 2014-2015
 *
 */

/**
 * Class DatabaseObject this class that handle the database management
 */

//require_once'../includes/dbConfig.php';

class DatabaseObject
{
	/**
	 * $_instance-store instance of database if it is available if not we will instantiate db object and store it here
	 * $_pdo store  PDO object when instantiate pdo object and use it else where
	 * @var $_query ->last query exceuted
	 * @var $_error -> store the pdo error by default it is set to false
	 * @var $_results -> store all the possible results from query we have executed  like all users from the users table
	 * @var $_count -> to check if there is any results or not
	 *

	 */
	private static $instance = null;

	private $_pdo = null;
	private $_query = null;
	private $_error = false;
	private $_results = null;
	private $_count = 0;

	/**
	 * this is run when class is instantiate to connect database
	 * the constructor is set to private so
	 * so nobody can create a new instance using new
	 */

	private function __construct()
	{
		try {
			$this->_pdo  = new PDO('mysql:host=' .DB_SERVER. ';dbname=' . DB_NAME, DB_USER, DB_PASS);

			//$this->_pdo 	= new PDO('mysql:host=' . Config::get('mysql/host') . ';dbname=' . Config::get('mysql/db'), Config::get('mysql/username'), Config::get('mysql/password'));
		} catch (PDOExeption $e) {
			die($e->getMessage());
		}
	}

	/**
	 * Like the constructor, we make __clone private
	 * so nobody can clone the instance
	 */
	private function __clone()
	{

	}

	public static function getInstance()
	{
		// Already an instance of this? Return, if not, create.
		if (!isset(self::$instance)) {
			self::$instance = new DatabaseObject();
		}

		return self::$instance;
	}

	/**
	 * @param $sql sql query we want to execute
	 * @param array $params parameter or field we want to pass
	 * @return $this return the chain query we created
	 */
	public function query($sql, $params = array())
	{
		/** reset error to false not returning erroe for previous query */
		$this->_error = false;

		/** //assignmnet to variable and also checking within if statement***/

		if ($this->_query = $this->_pdo->prepare($sql)) {

			//echo "Prepare query Sucess<br />";
			/***
			 *  // if prepare sucess
			 *
			 * if PDO object is gone to plan, is sucess then we want to check if parameter exists
			 * checking paramater
			 * check if $param has added to query
			 */
			$x = 1;
			if (count($params)) {
				foreach ($params as $param) {
					/**
					 *  $x is position of paramater //404
					 *$this->_query->bindValue($parameter, $value)
					 * bind value at 1 and increment
					 * $this->_query->bindParam(pos, $param);
					 * assigning value param at first question mark x
					 */
					$this->_query->bindValue($x, $param);
					$x++;
				}
			}
			/**execute the query any way regardles of the parameter*/
			if ($this->_query->execute()) {

				//echo "Query Success<br />";
				/**
				 * // Query is successfully executed rather than prepared
				 * // if query has successfully executed we want to store the result set
				 * //$this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
				 */
				$this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
				$this->_count = $this->_query->rowCount();
			} else {
				$this->_error = true;
			}
		}

		/**
		 * //return object within the query method to allow the chain method
		 * // return object currently working
		 */

		return $this;
	}

	/**
	 * @param $table database table we want to select
	 * @param $where field from the table we want to select
	 * @return $this|bool|DatabaseObject return currently working object
	 */
	public function get($table, $where)
	{
		return $this->action('SELECT *', $table, $where);
	}

	/**
	 * @param $table database table we want to perform delete query
	 * @param $where field from the table we want to delete
	 * @return $this|bool|DatabaseObject will return currently working object
	 */
	public function delete($table, $where)
	{
		return $this->action('DELETE', $table, $where);
	}

	/**
	 * @param $action query we want to perform like select, delete update
	 * @param $table table we want to perform out action
	 * @param array $where array of field from column we want to run query
	 * @return $this|bool return currently working object
	 * **field, operator, value
	 * $where = array('username',
	 *               '=',
	 *              'bikesh')
	 */
	public function action($action, $table, $where = array())
	{
		if (count($where) === 3) {
			/**array('username', '=', 'bikesh')*/
			$operators = array('=', '>', '<', '>=', '<=');

			$field = $where[0];
			/** username, password etc*/
			$operator = $where[1];
			/**< , > ,<= **/
			$value = $where[2];
			/** bikesh, abc-123***/

			/**
			 * check if operator is inside the array
			 * // if operator[] is inside operators[]
			 */
			if (in_array($operator, $operators)) {
				/**('SELECT username FROM user WHERE username=?', array('bikesh'));**/

				$sql = "{$action} FROM {$table} WHERE {$field} {$operator} ?"; // ? is replaced by value to prevent from sql injection

				if (!$this->query($sql, array($value))->error()) {
					return $this;
				}

			}

			return false;
		}
	}

	/**
	 * @param $table database table we want to select
	 *
	 * @param array $fields  coulmn field we want to insert values
	 * @return bool if there is no error in query return true otherwise false
	 */
	public function insert($table, $fields = array())
	{
		/**
		 *  if field has data it counts
		//if (count($fields))
		 */
		$keys = array_keys($fields);
		$values = null;
		$x = 1;

		/***to check if we are at the end of field we defined if not we want to add , at the field****/
		foreach ($fields as $value) {
			$values .= "?";
			if ($x < count($fields)) {
				$values .= ', ';
			}
			$x++;
		}
		/**
		 * die($values);//?, ?, ?, ?, ?, ?
		 *$sql = "INSERT INTO users (username, password, salt, firstName, lastName)";
		 * implode -> INSERT INTO users (`username`, `password`, `salt`, `firstName`, `lastName`, `middleName`) VALUES (?, ?, ?, ?, ?, ?)
		 */

		$sql = "INSERT INTO {$table} (`" . implode('`, `', $keys) . "`) VALUES ({$values})";

		if (!$this->query($sql, $fields)->error()) {
			return true;
		}

		return false;
	}

	/**
	 * @param $table database table we want to update
	 * @param $field field we want to refer for updating  from the table we have selected
	 * @param $id is the value of of field to reffered
	 * @param array $fields array of field we want to update
	 * @return bool return ture if there is no error on query else it will return false
	 */
	public function update($table, $id, $fields = array())
	{
		$set = null;
		$x = 1;

		foreach ($fields as $name => $value) {
			$set .= "{$name} = ?";
			if ($x < count($fields)) {
				$set .= ', ';
			}
			$x++;
		}

		/**die($set); //username = ?, password = ?
		 **$sql = "UPDATE users SET password = 'newpassword' WHERE id = 3";
		 * */
		$sql = "UPDATE {$table} SET {$set} WHERE subscriberID = {$id}";
		///echo $sql; ->UPDATE users SET username = ?, password = ? WHERE id =15
		if (!$this->query($sql, $fields)->error()) {
			return true;
		}

		return false;
	}

	public function results()
	{
		// Return result object
		return $this->_results;
	}

	/**
	 * @return mixed will return the first row from the table
	 */

	public function first()
	{

		return $this->_results[0];
	}

	/**
	 * @return int return the number of results
	 */
	public function count()
	{
		// Return count
		return $this->_count;
	}

	/**
	 * @return bool return true and will return function if there is error
	 */
	public function error()
	{
		return $this->_error;
	}




//    public function beginTransaction(){
//
//        return $this->_pdo->beginTransaction();
//
//    }
//
//
//    public function rollBack(){
//        return $this->_pdo->rollBack();
//    }
//
//    public function commit(){
//        return $this->commit();
//    }
//
//public function lastInsertId(){
//
//
//
//    return $this->_lastid;
//    var_dump($this->_lastid);
//}
}