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
	
	public function errors()
	{
		return $this->errors;
	}
}
