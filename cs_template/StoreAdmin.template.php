<?php

function template_main()
{
	global $scripturl, $context, $txt, $settings;
	
	$tpl = $context['mustache']->loadTemplate('admin');
	echo $tpl->render([
		'scripturl' => $scripturl,
		'settings' => $settings,
		'context' => $context,
		'txt' => $txt
	]);
}
