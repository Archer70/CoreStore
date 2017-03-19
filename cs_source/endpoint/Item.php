<?php
use CoreStore\interactors\ItemInteractor;
use CoreStore\test\test_doubles\ItemDouble;

require __DIR__ . '/../TestBootstrap.php';

function csItem()
{
    $itemInteractor = new ItemInteractor(new ItemDouble());
    $itemInteractor->loadItemContext(1);
    
    loadTemplate('cs_template/Item', 'cs_styles/item');
	loadLanguage('cs_language/CoreShop');
}
