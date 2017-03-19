<?php

spl_autoload_register(function($class) {
	$path = str_replace(['CoreStore\\', '\\'], ['', '/'], $class);
	$path = sprintf('%s/%s.php', __DIR__, $path);
	if (file_exists($path)) {
		require_once($path);
	}
});
