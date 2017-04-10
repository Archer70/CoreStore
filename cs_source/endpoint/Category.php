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
	global $txt;
	header('Content-Type: text/html');

	$name = !empty($_REQUEST['name']) ? $_REQUEST['name'] : '';
	$category = new CategoryInteractor(
		new CategoryStorage());
	$category->saveCategory($name);

	$latest = $category->getLatestCategory();

	if (!empty($category->errors())) {
		exit('failed');
	}

	$mustache = MustacheFactory::getMustacheEngine();
	echo $mustache->render('partials/category_listing', [
		'id' => $latest['id'],
		'name' => $latest['name'],
		'txt' => $txt
	]);
	exit;
}
