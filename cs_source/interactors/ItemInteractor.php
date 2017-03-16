<?php
namespace CoreStore\interactors;
use CoreStore\interfaces\ItemData;

class ItemInteractor
{
    public function __construct(ItemData $data)
    {
        $this->data = $data;
    }
    
    public function loadItemContext()
    {
        global $context;
        $context['cs_item'] = ['test'];
    }
}
