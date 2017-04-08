<?php
namespace CoreStore\test\test_doubles;

class CategoryDouble
{
	public static $saved = false;
	
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
