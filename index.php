<?php
ini_set('display_errors', 1);
define('SECURE', true);
define('ROOT', dirname(__FILE__));
define('SRC', ROOT.'/src');
define('CORE', SRC.'/core');
define('MOD', SRC.'/modulos');
define('STAT', SRC .'/static');
define('UP', '/src/uploads/');
require_once CORE.'/core.php';
