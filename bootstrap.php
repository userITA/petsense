<?php

defined('PROJECT_PATH') || die('Access denied');
defined('APP_PATH') || die('Access denied');
define('TEMPLATESPATH', APP_PATH . 'Templates');


if (!isset($_SESSION)) {
    session_start();
}

if (DEBUG) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
}

//Composer
require PROJECT_PATH . '/vendor/autoload.php';

//Languages
$language = 'en_US.UTF-8';
putenv('LANGUAGE=' . $language);
setlocale(LC_ALL, $language);

//Twig tempate engine
$loader = new Twig_Loader_Filesystem(TEMPLATESPATH);

$twig = new Twig_Environment(
    $loader,
    array(
        'cache' => CACHEPATH,
        'debug' => true,
        'auto_reload' => DEBUG,
    )
);
if (DEBUG) {
    $twig->addExtension(new Twig_Extension_Debug());
    $ext = new Kint_TwigExtension();
    $ext->setFunctions(['d' => Kint::MODE_RICH,]);
    $twig->addExtension($ext);
}
$twig->addExtension(new Twig_Extensions_Extension_I18n());

$twig->addFilter(
    new Twig_SimpleFilter(
        'cast_to_array',
        function ($stdClassObject) {
            $response = array();
            foreach ($stdClassObject as $key => $value) {
                //$response[] = array($key, $value);
                $response[$key] = (array)$value;
            }
            return $response;
        }
    )
);

$twig->addGlobal('user', 0);

foreach (new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator(TEMPLATESPATH),
    RecursiveIteratorIterator::LEAVES_ONLY
) as $file) {
    if ($file->isFile()) {
        if ($file->getExtension() === 'twig') {
            $twig->loadTemplate(str_replace(TEMPLATESPATH . '/', '', $file));
        }
    }
}

/**
 * [Autoload_classes]
 * @param $class_name classes
 */
function Autoload_classes($class_name)
{
    $filename = PROJECT_PATH . '/' . str_replace('\\', '/', $class_name) . '.php';

    if (is_file($filename)) {
        echo $filename;
        include_once $filename;
    }
}

spl_autoload_register('Autoload_classes');

if (DEBUG) {
    Kint::$enabled_mode = true;
    //Kint
    //d('pepe');
    //s($GLOBALS);
    //~d($GLOBALS);

    //Kint JS
    //j('pepe');

    //Kint TWIG
    //{{ d(data, richMode, moreData, evenMoreData) }}
    //{{ s(data, plainMode) }}
}

//Instancia de la app
$app = new Core\App();

//Lanzamos la app
//if (!isset(CRON)) {
    $app->render();
//}