<?php
namespace CoreStore\interactors;
use CoreStore\interfaces\ItemData;
use CoreStore\interactors\CommentInteractor;
use CoreStore\test\test_doubles\CommentDouble;

class ItemInteractor
{
	private $data;
	
	public function __construct(ItemData $data)
	{
		$this->data = $data;
		$this->comments = new CommentInteractor(new CommentDouble());
	}
	
	public function loadItemContext($itemId)
	{
		global $context;
		$itemData = $this->data->getItemInformation($itemId);
		if (empty($itemData)) {
			throw new \Exception('No item found with that id.');
		}
		$context['cs_item'] = $itemData;
		$this->comments->loadCommentsForItem($itemId);
	}
}
