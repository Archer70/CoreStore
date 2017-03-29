<?php
namespace CoreStore\test\interactors;
use CoreStore\interactors\ItemInteractor;
use CoreStore\test\test_doubles\ItemDouble;

class ItemInteractorTest extends \PHPUnit_Framework_TestCase
{
	private $interactor;
	
	public function setUp()
	{
		$this->interactor = new ItemInteractor(new ItemDouble());
	}
	
	public function testLoadsContextWithDbInfo()     
	{
		global $context;
		$this->interactor->loadItemContext(1);
		$this->assertArrayHasKey('cs_item', $context);
		$this->assertTrue(is_array($context['cs_item']));
	}
	
	/**
		* @expectedException Exception
		* @expectedExceptionMessage No item found with that id.
		*/
	public function testThrowsErrorIfNoInfo()     
	{
		$this->interactor->loadItemContext(1337);
	}
}
