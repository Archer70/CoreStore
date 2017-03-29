<?php
namespace CoreStore\utilities;

class MustacheFactory
{
	public static function getMustacheEngine()
	{
		global $sourcedir, $settings;
		if (!class_exists('Mustache_Engine')) {
			require_once $sourcedir . '/cs_source/lib/mustache.php';
		}
		return new \Mustache_Engine([
			'escape' => function($value) {
				return $value;

			},
			'cache' => $settings['theme_dir'] . '/cs_template/mustache/cache',
			'loader' => new \Mustache_Loader_FilesystemLoader($settings['theme_dir'] . '/cs_template/mustache'),
			'partials_loader' => new \Mustache_Loader_FilesystemLoader($settings['theme_dir'] . '/cs_template/mustache/partials'),
		]);
	}
}
