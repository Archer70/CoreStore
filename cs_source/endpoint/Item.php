<?php
use CoreStore\interactors\ItemInteractor;
use CoreStore\data_managers\smf_mysql\ItemStorage;
use CoreStore\data_managers\smf_mysql\ItemCommentStorage;
use CoreStore\utilities\MustacheFactory;

require __DIR__ . '/../TestBootstrap.php';
require $sourcedir . '/Subs-Post.php';
require $sourcedir . '/Subs-Editor.php';

function csItem()
{
	global $context, $txt;
	
	loadLanguage('cs_language/CoreStore');
	csItemRoute();
}

function csItemRoute()
{
	global $txt;
	
	$route = isset($_GET['route']) ? $_GET['route'] : '';
	
	switch ($route) {
		case 'view':
			csItemDisplay();
			break;
		case 'create':
			csItemNew();
			break;
		default:
			fatal_error($txt['cs_unknown_action']);
	}
}

function csItemDisplay()
{
	global $context, $txt;
	if (!isset($_GET['item'])) {
		fatal_error($txt['cs_no_item_specified']);
	}
	
	$itemInteractor = new ItemInteractor(
		new ItemStorage(), new ItemCommentStorage());
	
	$itemInteractor->loadItemContext($_GET['item']);
	$context['mustache'] = MustacheFactory::getMustacheEngine();
	
	$context['page_title'] = $txt['core_store'] . ' | ' . $context['cs_item']['title'];
	
	cs_createCommentBox();
	
	loadTemplate('cs_template/Item', 'cs_styles/item');
}

function csItemNew()
{
	header('Content-Type: text/html');
	
	$item = [
		'title' => isset($_POST['title']) ? $_POST['title'] : '',
		'description' => isset($_POST['description']) ? $_POST['description'] : '',
		'image' => isset($_POST['image']) ? $_POST['image'] : '',
		'price' => isset($_POST['price']) ? round((float)$_POST['price'], 2) : 0.00,
		'featured' => isset($_POST['featured']) && $_POST['featured'] === 'on'
	];
	
	$itemInteractor = new ItemInteractor(
		new ItemStorage(), new ItemCommentStorage());
	$itemInteractor->saveItem($item);
	
	if (!empty($itemInteractor->errors())) {
		echo 'failed';
		exit;
	}
	
	$mustache = MustacheFactory::getMustacheEngine();
	echo $mustache->render('partials/item-listing', [
		'title' => $item['title'],
		'description' => $item['description'],
		'image' => $item['image'],
		'price' => $item['price'],
		'featured' => $item['featured']
	]);
	exit;
}

function cs_createCommentBox()
{
	global $context, $txt;
	$editorOptions = [
		'id' => 'cs_item_comments',
		'value' => '',
		'labels' => [
			'post_button' => $txt['save'],
		],
		'preview_type' => 0,
		'width' => '100%',
		'disable_smiley_box' => false,
	];
	create_control_richedit($editorOptions);
	$context['post_box_name'] = $editorOptions['id'];
}
