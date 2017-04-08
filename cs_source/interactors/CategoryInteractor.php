<?php
namespace CoreStore\interactors;

class CategoryInteractor
{
	private $errors;
	private $data;
	
	public function __construct($data)
	{
		$this->data = $data;
	}
	
	public function saveCategory($name)
	{
		if (empty($name)) {
			$this->errors[] = 'no_category_name';
		} else if ($this->data->categoryExists($name)) {
			$this->errors[] = 'category_exists';
		} else {
			$this->data->save($name);
		}
	}
	
	public function errors()
	{
		return $this->errors;
	}
}
