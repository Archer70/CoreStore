<?php
use CoreStore\interactors\CategoryInteractor;
use CoreStore\data_managers\smf_mysql\CategoryStorage;
use CoreStore\utilities\MustacheFactory;

require __DIR__ . '/../TestBootstrap.php';

function csCategory()
{
	if (isset($_GET['route']) && $_GET['route'] == 'save') {
		saveCategory();
	} else if (isset($_GET['route']) && $_GET['route'] == 'delete') {
		deleteCategory();
	}
}

function saveCategory()
{
	$name = !empty($_REQUEST['name']) ? $_REQUEST['name'] : '';
	$category = newInteractor();
	$category->saveCategory($name);
	$latest = $category->getLatestCategory();

	if (!empty($category->errors())) {
		exit('failed');
	}

	sendNewCategoryHtml($latest);
}

function deleteCategory()
{
	$id = isset($_REQUEST['id']) ? (int) $_REQUEST['id'] : 0;
	$category = newInteractor();
	$category->deleteCategory($id);
	
	header('Content-Type: text/html');
	if (!empty($category->errors())) {
		print_r($category->errors());
		exit;
	} else {
		exit('success');
	}	
}

function sendNewCategoryHtml($category)
{
	global $txt;
	header('Content-Type: text/html');
	$mustache = MustacheFactory::getMustacheEngine();
	echo $mustache->render('partials/category_listing', [
		'id' => $category['id'],
		'name' => $category['name'],
		'txt' => $txt
	]);
	exit;
}

function newInteractor()
{
    return new CategoryInteractor(
        new CategoryStorage());
}