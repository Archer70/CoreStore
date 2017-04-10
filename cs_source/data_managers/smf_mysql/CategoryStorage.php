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
			FROM {db_prefix}cs_categories
			ORDER BY id DESC',
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
		global $smcFunc;
		$smcFunc['db_insert']('insert', '{db_prefix}cs_categories',
			['name' => 'string'],
			['name' => $name],
			['id']
		);
	}

	public function categoryExists($name)
	{
		global $smcFunc;
		$query = $smcFunc['db_query']('', '
			SELECT id
			FROM {db_prefix}cs_categories
			WHERE name = {string:name}',
			['name' => $name]
		);
		$result = null;
		while ($row = $smcFunc['db_fetch_row']($query)) {
			$result = $row;
		}
		return !is_null($result);
	}

	public function getLast()
	{
		global $smcFunc;
		$query = $smcFunc['db_query']('', '
			SELECT id, name
			FROM {db_prefix}cs_categories
			ORDER BY id DESC
				LIMIT 1',
			[]
		);
		$category = [];
		while ($row = $smcFunc['db_fetch_assoc']($query)) {
			$category = $row;
		}
		return $category;
	}
	
	public function delete($id)
	{
		global $smcFunc;
		$smcFunc['db_query']('', '
			DELETE FROM {db_prefix}cs_categories
			WHERE id = {int:id}',
			['id' => $id]
		);
	}
}
