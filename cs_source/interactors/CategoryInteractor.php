<?php
namespace CoreStore\interactors;
use CoreStore\interfaces\CategoryData;

class CategoryInteractor
{
	private const ERR_ASSERTION = 0;
	private const ERR_NAME = 1;
	private const ERR_FATAL = 2;
	private $errors;
	private $data;

	public function __construct(CategoryData $data)
	{
		$this->data = $data;
	}

	public function getAllCategories()
	{
		return $this->data->getAll();
	}

	public function saveCategory($name)
	{
		$this->testForErrors([
			[empty($name), 'no_category_name'],
			[$this->data->categoryExists($name), 'category_exists']
		]);
		if (empty($this->errors)) {
			$this->data->save($name);
		}
	}

	public function getLatestCategory()
	{
		return $this->data->getLast();
	}

	public function deleteCategory($id)
	{
		$this->testForErrors([
			[!is_int($id), 'id_not_int'],
			[$id <= 0, 'zero_id']
		]);
		if (empty($this->errors)) {
			$this->data->delete($id);
		}
	}

	public function modifyCategory($id, $name)
	{
		$this->testForErrors([
			[!is_int($id), 'modify_id_not_int'],
			[$id == 0, 'zero_category_id'],
			[empty($name), 'empty_modify_name']
		]);
		if (empty($this->errors)) {
			$this->data->modify($id, $name);
		}
	}

	private function testForErrors(array $errors)
	{
		foreach ($errors as $error) {
			if ($error[self::ERR_ASSERTION]) {
				$this->errors[] = $error[self::ERR_NAME];
				if (isset($error[self::ERR_FATAL])) {
					break;
				}
			}
		}
	}

	public function errors()
	{
		return $this->errors;
	}
}
