<?php
namespace CoreStore\test\interactors;
use CoreStore\interactors\FrontPageInteractor;
use CoreStore\test\test_doubles\FrontPageDouble;

class FrontPageInteractorTest extends \PHPUnit\Framework\TestCase
{
	public function setUp()
	{
		$this->interactor = new FrontPageInteractor(new FrontPageDouble());
	}
	
	public function testHasMethodLoadItems()     
	{
		$this->assertTrue(method_exists($this->interactor, 'loadItems'));
	}
	
	public function testLoadsItemsIntoContext()     
	{
		global $context;
		$this->interactor->loadItems();
		$this->assertArrayHasKey('cs_items', $context);
		$this->assertNotEmpty($context['cs_items']);
	}
	
	public function testHasErrorIfNoItems()     
	{
		FrontPageDouble::$returnNoItems = true;
		$this->interactor->loadItems();
		$this->assertContains('no_items_found', $this->interactor->errors());
	}
}
