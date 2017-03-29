<?php

function template_main()
{
    global $scripturl, $context, $txt, $settings, $sourcedir;
		
	// I can't think of a good reason making text bbc presentable shouldn't be a template operation.
	$context['cs_item']['description'] = parse_bbc($context['cs_item']['description']);
	$comments = $context['cs_item_comments'];
	foreach ($comments as $id => $comment) {
		$comments[$id]['body'] = parse_bbc($comment['body']);
	}
	
	require_once($sourcedir . '/cs_source/lib/mustache.php');
	$mustache = new Mustache_Engine([
		'escape' => function($value) {
			return $value;
			
		},
		'cache' => $settings['theme_dir'] . '/cs_template/mustache/cache',
		'loader' => new Mustache_Loader_FilesystemLoader($settings['theme_dir'] . '/cs_template/mustache'),
		'partials_loader' => new Mustache_Loader_FilesystemLoader($settings['theme_dir'] . '/cs_template/mustache/partials'),
	]);

	$tpl = $mustache->loadTemplate('item');
	echo $tpl->render([
		'settings' => $settings,
		'context' => $context,
		'txt' => $txt,
		'comments' => $comments,
	]);
}
