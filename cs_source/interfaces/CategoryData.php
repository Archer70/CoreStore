<?php
namespace CoreStore\interfaces;

interface CategoryData
{
	public function getAll();
	public function save($name);
	public function modify($id, $name);
	public function categoryExists($name);
	public function getLast();
	public function delete($id);
}
