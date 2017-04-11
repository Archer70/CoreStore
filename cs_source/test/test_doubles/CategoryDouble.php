<?php
namespace CoreStore\test\test_doubles;
use CoreStore\interfaces\CategoryData;

class CategoryDouble implements CategoryData
{
	public static $saved = false;
	public static $deleted = false;
	public static $categories = [
		[
			'id' => 0,
			'name' => 'cat'
		],
		[
			'id' => 1,
			'name' => 'cat2'
		]
	];

	public function getAll()
	{
		return self::$categories;
	}

	public function save($name)
	{
		self::$saved = true;
		self::$categories[] = [
			'id' => count(self::$categories),
			'name' => $name
		];
	}

	public function categoryExists($name)
	{
		return $name == 'Existing';
	}

	public function getLast()
	{
		return end(self::$categories);
	}
	
	public function delete($id)
	{
		foreach (self::$categories as $index => $category) {
			if ($category['id'] == $id) {
				unset(self::$categories[$index]);
				self::$deleted = true;
			}
		}
	}

	// Reset the mock. This is not a normal part of CategoryData
	public static function reset()
	{
		self::$saved = false;
		self::$deleted = false;
		self::$categories = [
			[
				'id' => 0,
				'name' => 'cat'
			],
			[
				'id' => 1,
				'name' => 'cat2'
			]
		];
	}
}
