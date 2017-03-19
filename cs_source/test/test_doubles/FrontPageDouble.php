<?php
namespace CoreStore\test\test_doubles;
use CoreStore\interfaces\FrontPageData;

class FrontPageDouble implements FrontPageData
{
	public static $returnNoItems = false;
	public function getAllItems()
	{
		if (self::$returnNoItems) {
			return [];
		}
		
		return [
			[
				'id' => 1,
				'title' => '1lb Bacon',
				'image' => 'http://img1.cookinglight.timeinc.net/sites/default/files/image/2013/05/1305-bacon-x.jpg',
				'price' => 4.74,
				'description' => 'Everybody wants some. I want some too.<br>Everybody wants some. How \'bout you?'
			],
			[
				'id' => 1,
				'title' => '1lb Bacon',
				'image' => 'http://img1.cookinglight.timeinc.net/sites/default/files/image/2013/05/1305-bacon-x.jpg',
				'price' => 4.74,
				'description' => 'Everybody wants some. I want some too.<br>Everybody wants some. How \'bout you?'
			],
			[
				'id' => 1,
				'title' => '1lb Bacon',
				'image' => 'http://img1.cookinglight.timeinc.net/sites/default/files/image/2013/05/1305-bacon-x.jpg',
				'price' => 4.74,
				'description' => 'Everybody wants some. I want some too.<br>Everybody wants some. How \'bout you?'
			]
		];
	}
}
