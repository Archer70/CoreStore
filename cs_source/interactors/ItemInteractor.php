<?php
namespace CoreStore\interactors;
use CoreStore\interfaces\ItemData;

class ItemInteractor
{
    private $data;
    
    public function __construct(ItemData $data)
    {
        $this->data = $data;
    }
    
    public function loadItemContext($itemId)
    {
        global $context;
        $itemData = $this->data->getItemInformation($itemId);
        if (empty($itemData)) {
            throw new \Exception('No item found with that id.');
        }
        $context['cs_item'] = $itemData;
    }
}
