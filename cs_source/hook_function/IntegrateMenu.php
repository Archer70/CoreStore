<?php

function csIntegrateMenu(&$menu)
{
	global $scripturl, $txt;

	loadLanguage('cs_language/CoreShop');
	$menu['cs_store'] = [
		'title' => $txt['cs_shop'],
		'href' => $scripturl . '?action=store',
		'show' => true,
		'icon' => 'cs_store.png'
	];
}
