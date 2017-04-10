<?php
namespace CoreStore\test\interactors;
use CoreStore\interactors\CategoryInteractor;
use CoreStore\test\test_doubles\CategoryDouble;

class CategoryInteractorTest extends \PHPUnit\Framework\TestCase
{
	public function setUp()
	{
		$this->interactor = new CategoryInteractor(
			new CategoryDouble());
		CategoryDouble::reset();
	}

	public function testChecksNameNotEmpty()
	{
		$this->interactor->saveCategory('');
		$this->assertEquals('no_category_name', $this->firstError());
	}

	public function testSavesIfNameIsValid()
	{
		$this->interactor->saveCategory('New Category');
		$this->assertTrue(CategoryDouble::$saved);
	}

	public function testChecksForExistingCatsWithSameName()
	{
		$this->interactor->saveCategory('Existing');
		$this->assertEquals('category_exists', $this->firstError());
	}

	public function testGetsCategoriesFromDB()
	{
		$cats = $this->interactor->getAllCategories();
		$this->assertEquals([
			[
				'id' => 0,
				'name' => 'cat'

			],
			[
				'id' => 1,
				'name' => 'cat2'
			]
		], $cats);
	}

	public function testGetsLastCategoryInserted()
	{
		$this->interactor->saveCategory('Latest');
		$last = $this->interactor->getLatestCategory();
		$this->assertEquals('Latest', $last['name']);
	}
	
	public function testDeletesCategory()
	{
		$this->interactor->deleteCategory(1);
		$this->assertEquals([
			['id'=>0,'name'=>'cat']
		], $this->interactor->getAllCategories());
	}
	
	public function testErrorIfDeleteIdNotInt()
	{
		$this->interactor->deleteCategory('asdf');
		$this->assertContains('id_not_int', $this->firstError());
	}
	
	public function testCantDeleteIdZero()
	{
		$this->interactor->deleteCategory(0);
		$this->assertContains('zero_id', $this->firstError());
	}
	
	public function testDoesntDeleteIfInvalidId()
	{
		$this->interactor->deleteCategory('fail');
		$this->assertFalse(CategoryDouble::$deleted);
		
		CategoryDouble::reset();
		
		$this->interactor->deleteCategory(0);
		$this->assertFalse(CategoryDouble::$deleted);
	}
	
	private function firstError()
	{
		$errors = $this->interactor->errors();
		return isset($errors[0]) ? $errors[0] : null;
	}
}
