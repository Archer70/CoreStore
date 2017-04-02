<?php

function template_main()
{
	global $context, $txt;
	
	$tpl = $context['mustache']->loadTemplate('admin');
	echo $tpl->render([
		'context' => $context,
		'txt' => $txt
	]);
}
