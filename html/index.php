<?php
// config.php o en el inicio de tu archivo index.php
define('PROJECT_PATH', '/var/www/');
define('CACHEPATH', dirname(__FILE__).'/cache');
define('APP_PATH', PROJECT_PATH . "App/");
define('ENVIRONMENT', 'live');
define('DEBUG', true);

require PROJECT_PATH . '/bootstrap.php';