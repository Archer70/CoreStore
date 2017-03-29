<?php
use CoreStore\interactors\FrontPageInteractor;
use CoreStore\test\test_doubles\FrontPageDouble;
use CoreStore\utilities\MustacheFactory;

require __DIR__ . '/../TestBootstrap.php';

function csFrontPage()
{
	global $context, $txt;
	
	loadLanguage('cs_language/CoreStore');
	
	$interactor = new FrontPageInteractor(new FrontPageDouble());
	$interactor->loadItems();
	
	$context['page_title'] = $txt['core_store'];
	
	$context['mustache'] = MustacheFactory::getMustacheEngine();
	
	loadTemplate('cs_template/FrontPage', 'cs_styles/front_page');
}

