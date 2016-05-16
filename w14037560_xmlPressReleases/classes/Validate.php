<?php
/**
 * Created by PhpStorm.
 * File: Validate.php
 * User: Bikesh Kawan
 * Student ID : W14037560
 * Date: 01/05/15
 * Time: 13:43
 * Module Title:Object Oriented and Web Programming
 * Module Number:CM0667
 * Module Tutor Name(s):Kay Rogage
 * Academic Year: 2014-2015
 *
 */

class Validate {
	private $_passed = false,
			$_errors = array(),
			$_db = null;

	public function __construct() {
		$this->_db = DatabaseObject::getInstance();
	}

	public function check($source, $items = array()) {
		foreach($items as $item => $rules) {
			foreach($rules as $rule => $rule_value) {
				
				$value = trim($source[$item]);

				if($rule === 'required' && $rule_value === true && empty($value)) {
					$this->addError("{$item} is required.");
				} else if (!empty($value)) {

					switch($rule) {
						case 'min':
							if(strlen($value) < $rule_value) {
								$this->addError("{$item} must be a minimum of {$rule_value} characters.");
							}
						break;
						case 'max':
							if(strlen($value) > $rule_value) {
								$this->addError("{$item} must be a maximum of {$rule_value} characters.");
							}
						break;
						case 'matches':
							if($value != $source[$rule_value]) {
								$this->addError("{$rule_value} must match {$item}.");
							}
						break;
						case 'unique_subscriber':
							$check = $this->_db->get('subscriber', array($item, '=', $value));
							if($check->count()) {
								$this->addError("{$item} is already taken.");
							}

						break;
						case 'unique_press':
							$check = $this->_db->get('saved_press_releases', array($item, '=', $value));
							if($check->count()) {
								$this->addError("{$item} is already saved.");
							}

							break;
					}

				}

			}
		}

		if(empty($this->_errors)) {
			$this->_passed = true;
		}

		return $this;
	}

	protected function addError($error) {
		$this->_errors[] = $error;
	}

	public function passed() {
		return $this->_passed;
	}

	public function errors() {
		return $this->_errors;
	}
}