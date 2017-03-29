<?php

function template_main()
{
    global $scripturl, $context, $txt, $settings;
	
	$context['cs_item']['description'] = parse_bbc($context['cs_item']['description']);

	$tpl = $context['mustache']->loadTemplate('item');
	echo $tpl->render([
		'scripturl' => $scripturl,
		'settings' => $settings,
		'context' => $context,
		'txt' => $txt,
		'comments' => formatComments($context['cs_item_comments']),
	]);
}

function formatComments(array $rawComments)
{
	$comments = [];
	foreach ($rawComments as $id => $comment) {
		$comments[$id]['body'] = parse_bbc($comment['body']);
	}
	return $comments;
}
