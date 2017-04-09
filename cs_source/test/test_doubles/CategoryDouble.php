<?php
namespace CoreStore\test\test_doubles;
use CoreStore\interfaces\CategoryData;

class CategoryDouble implements CategoryData
{
	public static $saved = false;

	public function getAll()
	{
		return ['cat', 'cat2'];
	}

	public function save($name)
	{
		self::$saved = true;
	}

	public function categoryExists($name)
	{
		return $name == 'Existing';
	}

	// Reset the mock. This is not a normal part of CategoryData
	public static function reset()
	{
		self::$saved = false;
	}
}
