<?php
use CoreStore\Interactors\ItemInteractor;

function csItem()
{
    $itemInteractor = new ItemInteractor();
    
    loadTemplate('/cs_template/Item');
}
