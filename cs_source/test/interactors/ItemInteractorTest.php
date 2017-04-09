<?php
namespace CoreStore\test\interactors;
use CoreStore\interactors\ItemInteractor;
use CoreStore\test\test_doubles\ItemDouble;
use CoreStore\test\test_doubles\CommentDouble;

class ItemInteractorTest extends \PHPUnit\Framework\TestCase
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
	
	public function testNoTitleError()
    {
		$this->interactor->saveItem($this->itemDetails(['title']));
		$this->assertEquals('no_item_title', $this->interactor->errors()[0]);
	}
	
	public function testNoDescriptionError()
    {
		$this->interactor->saveItem($this->itemDetails(['description']));
		$this->assertEquals('no_item_description', $this->interactor->errors()[0]);
	}
	
	public function testNoPriceError()
    {
		$this->interactor->saveItem($this->itemDetails(['price']));
		$this->assertEquals('no_item_price', $this->interactor->errors()[0]);
	}
	
	public function testNoImage()
	{
		$this->interactor->saveItem($this->itemDetails(['image']));
		$this->assertEquals('no_item_image', $this->interactor->errors()[0]);
	}
	
	public function testNoFeatured()
	{
		$this->interactor->saveItem($this->itemDetails(['featured']));
		$this->assertEquals('no_item_featured', $this->interactor->errors()[0]);
	}
	
	public function testPriceIsNotFloat()
	{
		$details = $this->itemDetails();
		$details['price'] = 'string';
		$this->interactor->saveItem($details);
		$this->assertEquals('price_is_not_float', $this->interactor->errors()[0]);
	}
	
	public function testInvalidImageUrl()
	{
		$details = $this->itemDetails();
		$this->interactor->saveItem($details);
		$this->assertEmpty($this->interactor->errors());
		
		$details['image'] = 'not a url';
		$this->interactor->saveItem($details);
		$this->assertEquals('invalid_image_url', $this->interactor->errors()[0]);
	}
	
	private function itemDetails(array $leaveOut=[])
	{
		$details = [
			'title' => 'Title',
			'description' => 'Description',
			'image' => 'http://fake.com/images/fail.jpeg',
			'price' => 1.23,
			'featured' => true
		];
		if (!empty($leaveOut)) {
			foreach($leaveOut as $index) {
				unset($details[$index]);
			}
		}
		return $details;
	}
}
