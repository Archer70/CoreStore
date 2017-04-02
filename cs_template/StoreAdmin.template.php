<?php

function template_main()
{
	global $context;
	
	$tpl = $context['mustache']->loadTemplate('admin');
	echo $tpl->render();
}
