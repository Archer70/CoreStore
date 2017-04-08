<?php
namespace CoreStore\data_managers\smf_mysql;
use CoreStore\interfaces\ItemData;

class ItemStorage implements ItemData
{
	public function getItemInformation($itemId)
	{
		global $smcFunc;
		
		$item = [];
		$query = $smcFunc['db_query']('', '
			SELECT id, title, description, image, price
			FROM {db_prefix}cs_items
			WHERE id = {int:id}',
			[
				'id' => $itemId
			]
		);
		while($row = $smcFunc['db_fetch_row']($query)) {
			$item = [
				'id' => $row[0],
				'title' => $row[1],
				'description' => $row[2],
				'image' => $row[3],
				'price' => $row[4]
			];
		}
		return $item;
	}
	
	public function saveItem(array $item)
	{
		global $smcFunc;
		
		$smcFunc['db_insert']('insert', '{db_prefix}cs_items',
			[
				'title' => 'string',
				'description' => 'string',
				'image' => 'string',
				'price' => 'float'
			],
			[
				$item['title'],
				$item['description'],
				$item['image'],
				$item['price']
			],
			[
				'id'
			]
		);
	}
}
