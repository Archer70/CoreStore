<?php
namespace CoreStore\test\test_doubles;
use CoreStore\interfaces\ItemData;

class ItemDouble implements ItemData
{
    public function getItemInformation($itemId)
    {
        return $itemId === 1 ? ['name' => 'test'] : [];
    }
}
