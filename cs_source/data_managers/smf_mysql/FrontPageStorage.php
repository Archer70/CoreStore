<?php
namespace CoreStore\data_managers\smf_mysql;
use CoreStore\interfaces\FrontPageData;

class FrontPageStorage implements FrontPageData
{
	public function getAllItems()
	{
		global $smcFunc;
		
		$items = [];
		$query = $smcFunc['db_query']('', '
			SELECT id, title, description, image, price
			FROM {db_prefix}cs_items', // One of these days, we'll want to paginate this. That day is not today.
			[]
		);
		while ($row = $smcFunc['db_fetch_assoc']($query)) {
			$items[] = $row;
		}
		return $items;
	}
}
