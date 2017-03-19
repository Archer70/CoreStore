<?php
use CoreStore\interactors\ItemInteractor;
use CoreStore\test\test_doubles\ItemDouble;

require __DIR__ . '/../TestBootstrap.php';
require $sourcedir . '/Subs-Post.php';
require $sourcedir . '/Subs-Editor.php';

function csItem()
{
	global $context, $txt;
	
	$itemInteractor = new ItemInteractor(new ItemDouble());
	$itemInteractor->loadItemContext(1);
	
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
	
	loadTemplate('cs_template/Item', 'cs_styles/item');
	loadLanguage('cs_language/CoreStore');
}
