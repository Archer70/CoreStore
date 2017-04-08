<?php
namespace CoreStore\interactors;
use CoreStore\interfaces\ItemData;
use CoreStore\interactors\CommentInteractor;
use CoreStore\data_managers\smf_mysql\ItemCommentStorage;

class ItemInteractor
{
	private $data;
	private $errors = [];
	
	public function __construct(ItemData $data, $commentStorage)
	{
		$this->data = $data;
		$this->comments = new CommentInteractor($commentStorage);
	}
	
	public function loadItemContext($itemId)
	{
		global $context;
		$itemData = $this->data->getItemInformation($itemId);
		$context['cs_item'] = $itemData;
		if (empty($itemData)) {
			$this->errors[] = 'no_item_found';
			return;
		}
		$this->comments->loadCommentsForItem($itemId);
	}
	
	public function saveItem(array $itemDetails)
	{
		if (empty($itemDetails['title'])) {
			$this->errors[] = 'no_item_title';
		}
		if (empty($itemDetails['description'])) {
			$this->errors[] = 'no_item_description';
		}
		if (!isset($itemDetails['price'])) {
			$this->errors[] = 'no_item_price';
		}
		if (!isset($itemDetails['image'])) {
			$this->errors[] = 'no_item_image';
		}
		if (!isset($itemDetails['featured'])) {
			$this->errors[] = 'no_item_featured';
		}
		
		if (!empty($this->errors)) {
			return; // Stop now, so we can use these variables without fear.
		}
		
		if (!is_float($itemDetails['price'])) {
			$this->errors[] = 'price_is_not_float';
		}
		if (false === filter_var($itemDetails['image'], FILTER_VALIDATE_URL)) {
			$this->errors[] = 'invalid_image_url';
		}
		
		if (!empty($this->errors)) {
			return;
		}
		// All set, let's do this.
		
		$this->data->saveItem($itemDetails);
	}
	
	public function errors()
	{
		return $this->errors;
	}
}
