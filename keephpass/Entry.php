<?php
namespace Keephpass;
/**
 * Class Entry
 *
 * @package Keephpass
 * @author wolxXx
 * @version 0.1
 */
class Entry {
	/**
	 * @var string
	 */
	protected $value;

	/**
	 * @param string $value
	 */
	public function __construct($value){
		$this->value = $value;
	}

	/**
	 * factory function
	 *
	 * @param string $value
	 * @return Entry
	 */
	public static function Factory($value){
		return new self($value);
	}

	/**
	 * setter function
	 *
	 * @param string $value
	 * @return string
	 */
	public function setValue($value){
		$this->value = $value;

		return $this->value;
	}

	/**
	 * getter function
	 *
	 * @return string
	 */
	public function getValue(){
		return $this->value;
	}
}
