<?php
use CoreStore\interactors\FrontPageInteractor;
use CoreStore\test\test_doubles\FrontPageDouble;

require __DIR__ . '/../TestBootstrap.php';

function csFrontPage()
{
    $interactor = new FrontPageInteractor(new FrontPageDouble());
    $interactor->loadItems();
    
    loadTemplate('cs_template/FrontPage', 'cs_styles/front_page');
	loadLanguage('cs_language/CoreShop');
}

