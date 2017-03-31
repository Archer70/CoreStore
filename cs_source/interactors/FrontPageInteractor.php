<?php
namespace CoreStore\interactors;
use CoreStore\interfaces\FrontPageData;

class FrontPageInteractor
{
	private $data;
	private $errors = [];
	
	public function __construct(FrontPageData $data)
	{
		$this->data = $data;
	}
	
	public function loadItems()
	{
		global $context;
		$items = $this->data->getAllItems();
		if (count($items) === 0) {
			$this->errors[] = 'no_items_found';
		}
		$context['cs_items'] = $items;
	}
	
	public function errors()
	{
		return $this->errors;
	}
}
