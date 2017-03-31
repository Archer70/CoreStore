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
