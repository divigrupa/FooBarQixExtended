<?php
class Template
{
	private static $dir = __DIR__ . '/../templates/';

	public static function printByName(string $name) {
		$filename = self::$dir . "/{$name}.phtml";

		if (file_exists($filename)) {
			echo file_get_contents($filename);
		}
	}
}

