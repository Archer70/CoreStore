<?php
use CoreStore\interactors\CategoryInteractor;
use CoreStore\data_managers\smf_mysql\CategoryStorage;
use CoreStore\utilities\MustacheFactory;

require __DIR__ . '/../TestBootstrap.php';

function csCategory()
{
	if (isset($_GET['route']) && $_GET['route'] == 'save') {
		saveCategory();
	}
}

function saveCategory()
{
	header('Content-Type: text/html');

	$name = !empty($_REQUEST['name']) ? $_REQUEST['name'] : '';
	$categoryInteractor = new CategoryInteractor(
		new CategoryStorage());
	$categoryInteractor->saveCategory($name);

	if (!empty($categoryInteractor->errors())) {
		exit('failed');
	}

	$mustache = MustacheFactory::getMustacheEngine();
	echo $mustache->render('partials/category_listing', ['name' => $name]);
	exit;
}
