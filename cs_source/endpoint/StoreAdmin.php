<?php
use CoreStore\interactors\FrontPageInteractor;
use CoreStore\interactors\CategoryInteractor;
use CoreStore\data_managers\smf_mysql\CategoryStorage;
use CoreStore\data_managers\smf_mysql\FrontPageStorage;
use CoreStore\utilities\MustacheFactory;

require __DIR__ . '/../TestBootstrap.php';

function csStoreAdmin()
{
	global $context, $txt;
	loadLanguage('cs_language/CoreStore');
	$interactor = new FrontPageInteractor(new FrontPageStorage());
	$interactor->loadItems();
	$categoryInteractor = new CategoryInteractor(
		new CategoryStorage());
	$context['categories'] = $categoryInteractor->getAllCategories();
	$context['mustache'] = MustacheFactory::getMustacheEngine();
	$context['page_title'] = $txt['core_store'] . ' | ' . $txt['cs_admin_page'];
	loadTemplate('cs_template/StoreAdmin', 'cs_styles/admin');
}
