<?php
use CoreStore\interactors\ItemInteractor;
use CoreStore\test\test_doubles\ItemDouble;

require __DIR__ . '/../TestBootstrap.php';
require $sourcedir . '/Subs-Post.php';
require $sourcedir . '/Subs-Editor.php';

function csItem()
{
	global $context, $txt;
	
	loadLanguage('cs_language/CoreStore');
	
	$itemInteractor = new ItemInteractor(new ItemDouble());
	$itemInteractor->loadItemContext(1);
	
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
