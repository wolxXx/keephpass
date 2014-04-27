<?php
require_once '../KeyFileWriter.php';
class KeyFileWriterTest extends  PHPUnit_Framework_TestCase{
	/**
	 * @var \Keephpass\KeyFileWriter
	 */
	protected $keyFileWriter;

	/**
	 * @var string
	 */
	protected $target;

	/**
	 * @var string
	 */
	protected $value;

	public function setUp(){
		$this->target = __DIR__.DIRECTORY_SEPARATOR.'fixtures'.DIRECTORY_SEPARATOR.'keyfile';
		$this->value = uniqid('keephpaas', true);
		$this->keyFileWriter = \Keephpass\KeyFileWriter::Factory($this->target, $this->value);
	}
	public function testGetValue(){
		$this->assertSame($this->value, $this->keyFileWriter->getValue());
	}

	public function testSetGetValue(){
		$newValue = 'ffoobbaarr';
		$this->keyFileWriter->setValue($newValue);
		$this->assertSame($newValue, $this->keyFileWriter->getValue());
	}

	public function testGetTarget(){
		$this->assertSame($this->target, $this->keyFileWriter->getTarget());
	}

	public function testSetGetTarget(){
		$newTarget = 'asdf';
		$this->keyFileWriter->setTarget($newTarget);
		$this->assertSame($newTarget, $this->keyFileWriter->getTarget());
	}

	public function testWriteFile(){
		$result = $this->keyFileWriter
			->setTarget($this->target)
			->setValue($this->value)
			->write();
		$this->assertTrue(file_exists($this->target));
		$this->assertTrue($result);
		$this->assertSame($this->value, file_get_contents($this->target));
	}
}
