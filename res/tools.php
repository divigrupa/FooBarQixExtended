<?php

function d($data) {
    echo '<pre>' . print_r($data, 1) . '</pre>';
}

function config($key = '') {
	$config = parse_ini_file('config.ini');
	return $config[$key] ?? null;
}

