<?php
use CoreStore\interactors\ItemInteractor;
use CoreStore\test\test_doubles\ItemDouble;

require __DIR__ . '/../TestBootstrap.php';
require $settings['theme_dir'] . '/GenericControls.template.php';

function csItem()
{
	global $context;
	
	$itemInteractor = new ItemInteractor(new ItemDouble());
	$itemInteractor->loadItemContext(1);
	
	$context['show_bbc'] = true;
	$context['controls']['richedit']['cs_item_comments'] = [
		'id' => 'cs_item_comments',
		'rich_active' => true,
		'value' => '',
		'disable_smiley_box' => true,
		'colums' => 60,
		'rows' => 18,
		'width' => '100%',
		'height' => '250px',
		'form' => '',
		'bbc_level' => 'full',
		'preview_type' => 1,
		'labels' => [
			'post_button' => 'Post' //TODO replace with $txt
		],
		'locale' => '',
		'required' => true
	];
	
	loadTemplate('cs_template/Item', 'cs_styles/item');
	loadLanguage('cs_language/CoreStore');
}
