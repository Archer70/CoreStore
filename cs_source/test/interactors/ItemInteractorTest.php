<?php
namespace CoreStore\test\interactors;
use CoreStore\interactors\ItemInteractor;
use CoreStore\test\test_doubles\ItemDouble;
use CoreStore\test\test_doubles\CommentDouble;

class ItemInteractorTest extends \PHPUnit_Framework_TestCase
{
	private $interactor;
	
	public function setUp()
	{
		$this->interactor = new ItemInteractor(new ItemDouble(), new CommentDouble());
	}
	
	public function testLoadsContextWithDbInfo()     
	{
		global $context;
		$this->interactor->loadItemContext(1);
		$this->assertArrayHasKey('cs_item', $context);
		$this->assertTrue(is_array($context['cs_item']));
	}
	
	public function testHasErrorIfNoInfo()     
	{
		$this->interactor->loadItemContext(1337);
		$this->assertContains('no_item_found', $this->interactor->errors());
	}
}
