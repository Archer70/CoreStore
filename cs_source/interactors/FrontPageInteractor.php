<?php
namespace CoreStore\interactors;
use CoreStore\interfaces\FrontPageData;

class FrontPageInteractor
{
	private $data;
	
	public function __construct(FrontPageData $data)
	{
		$this->data = $data;
	}
	
	public function loadItems()
	{
		global $context;
		$items = $this->data->getAllItems();
		if (empty($items)) {
			throw new \Exception('No items found.');
		}
		$context['cs_items'] = $items;
	}
}
