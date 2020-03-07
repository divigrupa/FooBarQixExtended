<?php
define('ROOT_DIR', __DIR__);

require_once 'classes/ClassLoader.php';
require_once 'res/tools.php';

Pager::getInstance();
Template::printByName('introduction');

error_reporting(config('error_reporting_level'));
