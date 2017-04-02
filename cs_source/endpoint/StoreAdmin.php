<?php
use CoreStore\utilities\MustacheFactory;

require __DIR__ . '/../TestBootstrap.php';

function csStoreAdmin()
{
	global $context;
	loadLanguage('cs_language/CoreStore');
	$context['mustache'] = MustacheFactory::getMustacheEngine();
	$context['page_title'] = $txt['core_store'] . ' | ' . $txt['cs_admin_page'];
	loadTemplate('cs_template/StoreAdmin');
}
