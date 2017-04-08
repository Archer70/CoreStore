<?php
namespace CoreStore\interfaces;

interface ItemData
{
	public function getItemInformation($id);
	public function saveItem(array $item);
}
