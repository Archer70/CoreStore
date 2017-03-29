<?php

function template_main()
{
    global $context, $txt, $settings;
		
	formatComments();	

	$tpl = $context['mustache']->loadTemplate('item');
	echo $tpl->render([
		'settings' => $settings,
		'context' => $context,
		'txt' => $txt,
		'comments' => $comments,
	]);
}

function formatComments()
{
	global $context;
	// I can't think of a good reason making text bbc presentable shouldn't be a template operation.
	$context['cs_item']['description'] = parse_bbc($context['cs_item']['description']);
	$comments = $context['cs_item_comments'];
	foreach ($comments as $id => $comment) {
		$comments[$id]['body'] = parse_bbc($comment['body']);
	}
}
