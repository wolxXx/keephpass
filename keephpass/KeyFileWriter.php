<?php
namespace Keephpass;

/**
 * Class KeyFileWriter
 *
 * @package Keephpass
 * @author wolxXx
 * @version 0.1
 */
class KeyFileWriter {
	/**
	 * @var string
	 */
	protected $target;

	/**
	 * @var string
	 */
	protected $value;

	/**
	 * @param string $target
	 * @param string $value
	 */
	public function __construct($target, $value){
		$this->target = $target;
		$this->value = $value;
	}

	/**
	 * factory class
	 *
	 * @param string $target
	 * @param string $value
	 * @return KeyFileWriter
	 */
	public static function Factory($target, $value){
		return new self($target, $value);
	}

	/**
	 * setter for the target
	 *
	 * @param string $target
	 * @return $this
	 */
	public function setTarget($target){
		$this->target = $target;

		return $this;
	}

	/**
	 * getter for the target
	 *
	 * @return string
	 */
	public function getTarget(){
		return $this->target;
	}

	/***
	 * setter for the value
	 *
	 * @param $value
	 * @return $this
	 */
	public function setValue($value){
		$this->value = $value;

		return $this;
	}

	/**
	 * getter for the value
	 *
	 * @return string
	 */
	public function getValue(){
		return $this->value;
	}

	/**
	 * write the value to the target
	 *
	 * @return boolean
	 */
	public function write(){
		$fileHandler = fopen($this->target, 'w');
		fputs($fileHandler, $this->value);
		fclose($fileHandler);

		return file_exists($this->target) && file_get_contents($this->target) === $this->value;
	}
}
