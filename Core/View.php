<?php
namespace Core;

defined('APP_PATH') || die('Access denied');

use \Core\App;
use \App\Models\User as modelUser;

class View
{

    /**
     * @var
     */
    protected static $data;

    /**
     * @var
     */
    const VIEWS_PATH = PROJECT_PATH . 'App/Views/';

    /**
     * @var
     */
    const EXTENSION_TEMPLATES = 'php';

    /**
     * [render Views with data]
     * @param  [String]  [template name]
     * @return [html]    [render html]
     */
    public static function render($template)
    {
        if (!file_exists(self::VIEWS_PATH . $template . '.' . self::EXTENSION_TEMPLATES)) {
            throw new \Exception('Error: El archivo ' . self::VIEWS_PATH . $template . '.' . self::EXTENSION_TEMPLATES . ' no existe', 1);
        }

        //ob_start();

        global $twig;

        self::$data['debug'] = DEBUG;
        if (isset($_SESSION['username'])) {
            self::$data['username'] = $_SESSION['username'];
        } else if (isset($_COOKIE)) {
            self::$data['username'] = 'PetSense';
        } 
        //$twig->addGlobal('user', '');
        //$twig->addGlobal('orderspending', modelOrders::getTotalPending());
        //$twig->addGlobal('ordersspecials', modelOrders::getTotalSpecials());
        if (isset($_SESSION['email'])) {
            $twig->addGlobal('user', $_SESSION['email']);
        } elseif (isset($_COOKIE["petsense_session_cookie"]) && !is_null(modelUser::getUserEmail($_COOKIE["petsense_session_cookie"]))) {
            $twig->addGlobal('user', modelUser::getUserEmail($_COOKIE["petsense_session_cookie"]));
        } else {
           $twig->addGlobal('user', ''); 
        }

        $config    = App::getConfig('');
        /*$mainmenu  = (array) $config->mainmenu;
        ksort($mainmenu);*/

        $maintitle = $config->maintitle;

        //self::$data['mainmenu']  = $mainmenu;
        self::$data['maintitle'] = $maintitle;

        extract(self::$data);
        include self::VIEWS_PATH . $template . '.' . self::EXTENSION_TEMPLATES;
        $str = ob_get_contents();
        ob_end_clean();
        echo $str;
    }

    /**
     * [return Views with data to variable]
     * @param  [String]  [template name]
     * @return [html]    [render html]
     */
    public static function renderVariable($template)
    {
        if (!file_exists(self::VIEWS_PATH . $template . '.' . self::EXTENSION_TEMPLATES)) {
            throw new \Exception('Error: El archivo ' . self::VIEWS_PATH . $template . '.' . self::EXTENSION_TEMPLATES . ' no existe', 1);
        }

        ob_start();

        global $twig;

        self::$data['debug'] = DEBUG;

        extract(self::$data);
        include self::VIEWS_PATH . $template . '.' . self::EXTENSION_TEMPLATES;
        $str = ob_get_contents();
        ob_end_clean();
        return $str;
    }

    /**
     * [set Set Data form Views]
     * @param [string] $name  [key]
     * @param [mixed] $value [value]
     */
    public static function set($name, $value)
    {
        self::$data[$name] = $value;
    }
}
