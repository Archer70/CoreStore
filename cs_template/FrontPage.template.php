<?php

function template_main()
{
    global $context, $scripturl, $txt;
	
	$template = $context['mustache']->loadTemplate('front_page');
	echo $template->render([
		'scripturl' => $scripturl,
		'context' => $context,
		'txt' => $txt
	]);
}
