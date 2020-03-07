<?php
define('ROOT_DIR', __DIR__);

function config($key = '') {
	$config = parse_ini_file('config.ini');
	return $config[$key] ?? null;
}

require_once 'res/tools.php';
require_once 'classes/ClassLoader.php';
