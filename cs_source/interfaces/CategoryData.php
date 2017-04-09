<?php
namespace CoreStore\interfaces;

interface CategoryData
{
	public function getAll();
	public function save($name);
}
