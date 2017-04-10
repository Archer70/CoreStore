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

	private function firstError()
	{
		$errors = $this->interactor->errors();
		return isset($errors[0]) ? $errors[0] : null;
	}
}
