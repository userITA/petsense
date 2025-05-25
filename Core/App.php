<?php
namespace Core;

defined('APP_PATH') || die('Access denied');

/*use PHPAuth\Config as PHPAuthConfig;
use PHPAuth\Auth as PHPAuth;*/

//use \Core\Database;
use \Core\View;

class App
{
    /**
     * @var
     */
    private $_controller;

    /**
     * @var
     */
    private $_method = 'index';

    /**
     * @var
     */
    private $_params = [];

    /**
     * @var
     */
    private $_search = [];

    /**
     * [$Config description]
     * @var [type]
     */
    public $config = [];

    /**
     * @var
     */
    const NAMESPACE_CONTROLLERS = '\App\Controllers\\';

    /**
     * @var
     */
    const CONTROLLERS_PATH = PROJECT_PATH .'/App/Controllers/';

    /**
     * [__construct description]
     */
    public function __construct()
    {
        //obtenemos la url parseada
        $full_url = $this->parseUrl();

        /*$ddbb = Database::instance();

        $config = new PHPAuthConfig($ddbb->_connection);
        $auth = new PHPAuth($ddbb->_connection, $config, 'en_GB');

        $this->_auth_config = $config;
        $this->_auth = $auth;*/


        $url = isset($full_url['url'])?$full_url['url']:['home'];
        $this->_search = isset($full_url['get_params']) ? $full_url['get_params'] : [];

        //comprobamos que exista el archivo en el directorio Controllers
        if (file_exists(self::CONTROLLERS_PATH . ucfirst($url[0]) . '.php')) {
            //nombre del archivo a llamar
            $this->_controller = ucfirst($url[0]);
            //eliminamos el controlador de url, así sólo nos quedaran los parámetros del método
            unset($url[0]);
        } else {
            if ($url[0] != null) {
                self::getConfig('');
                View::render('errors/404');
                //include APPPATH . '/Views/errors/404.php';
                exit;
            } else {
                //nombre del archivo a llamar
                $this->_controller = ucfirst('home');
                //eliminamos el controlador de url, así sólo nos quedaran los parámetros del método
                unset($url[0]);
            }
        }

        $autorized = true;

        // Autorizamos si son webhooks
        /*if ($this->_controller == 'Webhooks' || $this->_controller == 'Token') {
            $autorized = true;
        } else {
            // comprobamos si tenemos sesion.
            if (isset($_COOKIE[ $config->cookie_name ])) {
                if (! $auth->checkSession($_COOKIE[ $config->cookie_name ])) {
                    $this->_controller = ucfirst('home');
                    unset($url[0]);
                    $autorized = false;
                }
            } else {
                $this->_controller = ucfirst('home');
                unset($url[0]);
                $autorized = false;
            }
        }*/

        //obtenemos la clase con su espacio de nombres
        $fullClass = self::NAMESPACE_CONTROLLERS . $this->_controller;

        //asociamos la instancia a $this->_controller
        $this->_controller = new $fullClass();

        if ($autorized) {
            //si existe el segundo segmento comprobamos que el método exista en esa clase
            if (isset($url[1])) {
                //aquí tenemos el método
                $this->_method = $url[1];
                if (method_exists($this->_controller, $url[1])) {
                    //eliminamos el método de url, así sólo nos quedaran los parámetros del método
                    unset($url[1]);
                } else {
                    include APP_PATH . '/Views/errors/404.php';
                    exit;
                    //throw new \Exception("Error Processing Method {$this->_method}", 1);
                }
            }
            //asociamos el resto de segmentos a $this->_params para pasarlos al método llamado, por defecto será un array vacío
            $this->_params = $url ? array_values($url) : [];
            if ($this->_search) {
                $this->_params[] = $this->_search;
            }
        }
    }

    /**
     * [parseUrl Parseamos la url en trozos]
     * @return [type] [description]
     */
    public function parseUrl()
    {
        $result = [];
        if (isset($_GET['url'])) {
            $gets = $_GET;
            $result['url'] = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
            array_shift($gets);
            $result['get_params'] = $gets;
        }
        return $result;
    }

    /**
     * [render  lanzamos el controlador/método que se ha llamado con los parámetros]
     */
    public function render()
    {
        call_user_func_array([ $this->_controller, $this->_method ], $this->_params);
    }

    /**
     * [getConfig Obtenemos la configuración de la app]
     * @return [Array] [Array con la Config]
     */
    public static function getConfig($filename)
    {
        $app = json_decode(file_get_contents(APP_PATH . '/config/app.json'));

        if ($filename != '') {
            $file = json_decode(file_get_contents(APP_PATH . '/config/'.$filename.'.json'));
            $app = (object) array_merge((array) $app, (array) $file);
        }

        return $app;
    }

    /**
     * [getController Devolvemos el controlador actual]
     * @return [type] [String]
     */
    public function getController()
    {
        return $this->_controller;
    }

    /**
     * [getMethod Devolvemos el método actual]
     * @return [type] [String]
     */
    public function getMethod()
    {
        return $this->_method;
    }

    /**
     * [getParams description]
     * @return [type] [Array]
     */
    public function getParams()
    {
        return $this->_params;
    }

    /**
     * [redirect Redigimos a otra pagina]
     * @return nothing
     */
    public static function redirect($url, $statusCode = 303)
    {
        header('Location: ' . $url, true, $statusCode);
        die();
    }

    // public function registerBundles()
    // {
    //     $bundles = array(
    //         new smachara\html2pdfbundle\smacharaHtml2pdfBundle(),
    //     );
    // }
}
