<?php
/*
* OMS Cron
*
* @package OMS
*/
 
/**
 * Variables de entorno.
 *
 * @var bool
 */
 
define('PROJECTPATH', dirname(__FILE__));
define('ENVIRONMENT', 'live');
 
//Composer
require PROJECTPATH . '/vendor/autoload.php';
 
/**
 * [Autoload_classes]
 * @param $class_name classes
 */
function Autoload_classes($class_name)
{
    $filename = PROJECTPATH . '/' . str_replace('\\', '/', $class_name) . '.php';
 
    if (is_file($filename)) {
        echo $filename;
        include_once $filename;
    }
}
spl_autoload_register('Autoload_classes');
 
Kint::$enabled_mode = false;
 
/* Arrancamos un Cron */
use \Core\Cron;
 
Cron::runCronInfluxDb();
 
die();