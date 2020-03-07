<?php

/**
 * Class Pager, simple and experimental way to open/close page and fill content
 */
class Pager
{
	private static $instance;

	public function __construct() {
		Template::printByName('header');
	}

	public function __destruct() {
		Template::printByName('footer');
	}

	public static function getInstance(): Pager {
		if (empty(static::$instance)) {
			static::$instance = new Pager();
		}
		return static::$instance;
	}
}
