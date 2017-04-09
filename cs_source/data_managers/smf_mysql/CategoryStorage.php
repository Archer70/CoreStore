<?php
namespace CoreStore\data_managers\smf_mysql;
use CoreStore\interfaces\CategoryData;

class CategoryStorage implements CategoryData
{
	public function getAll()
	{
		global $smcFunc;
		$query = $smcFunc['db_query']('', '
			SELECT id, name
			FROM {db_prefix}cs_categories',
			[]
		);
		$categories = [];
		while ($row = $smcFunc['db_fetch_assoc']($query)) {
			$categories[] = $row;
		}
		return $categories;
	}

	public function save($name)
	{

	}
}
