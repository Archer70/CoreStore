<?php

function csIntegrateMenu(&$menu)
{
	global $scripturl, $txt;

	loadLanguage('cs_language/CoreStore');
	$menu['cs_store'] = [
		'title' => $txt['cs_shop'],
		'href' => $scripturl . '?action=store',
		'show' => true,
		'icon' => 'cs_store.png',
		'sub_buttons' => [
			'admin' => [
				'title' => $txt['cs_admin_page'],
				'href' => $scripturl . '?action=store_admin',
				'show' => true
			]
		]
	];
}
