<?php

namespace App\Controllers;

defined('APP_PATH') || die('Access denied');

use \App\Models\User;
use Core\Database;
use \Core\Controller;
use \Core\View;

class Home extends Controller
{

    public function index($email = null, $pass = null)
    {

        /*//+d($_SESSION);
        //+d($_COOKIE);*/
        $user = new User();
        $auth = $user->getAuth();
        $config = $user->getAuthConfig();

        /*$email = ((isset($_POST['email']) && $_POST['email'] != "") ? $_POST['email'] : NULL);
        $pass = ((isset($_POST['pass']) && $_POST['pass'] != "") ? $_POST['pass'] : NULL);*/

        if (isset($_POST['newUser'])) {
            header('Location: /user');
        } else {
            if (isset($_COOKIE[$config->cookie_name])) {
                //+d("Entra aqui - 1??");
                if ($auth->checkSession($_COOKIE[$config->cookie_name])) {
                    header('Location: /dashboard');
                    exit;
                } else {
                    //+d("Entra aqui - 2??");
                    setcookie($config->cookie_name, '', time() - 3600, $config->cookie_path, $config->cookie_domain);
                    //setcookie($config->cookie_name, '', time() - 3600, $config->cookie_path, $config->cookie_domain . "2");
                    setcookie($config->cookie_name, '', time() - 3600, $config->cookie_path, "localhost");
                    if (isset($_POST['email']) && isset($_POST['pass'])) {
                        ////+d("Entra aqui - 3??");
                        $user->login($_POST['email'], $_POST['pass']);
                        header('Location: /home');
                    } else {
                        //+d("Entra aqui - 4??");
                        $_GET['pass'] = str_replace("_", "#", $_GET['pass']);
                        $_GET['pass'] = str_replace(".", "&", $_GET['pass']);
                        $user->login($_GET['email'], $_GET['pass']);
                        header('Location: /home');
                    }
                }
            } else {
                if (isset($_POST['email']) && isset($_POST['pass'])) {
                    $user->login($_POST['email'], $_POST['pass']);
                    header('Location: /home');
                } elseif (isset($_REQUEST['email']) && isset($_REQUEST['pass'])) {
                    //+d("Entra aqui - 6");
                    $_REQUEST['pass'] = str_replace("_", "#", $_REQUEST['pass']);
                    $_REQUEST['pass'] = str_replace(".", "&", $_REQUEST['pass']);
                    $user->login($_REQUEST['email'], $_REQUEST['pass']);
                    header('Location: /home');
                } elseif (isset($_GET['email']) && isset($_GET['pass'])) {
                    //+d("Entra aqui - 7");
                    $_GET['pass'] = str_replace("_", "#", $_GET['pass']);
                    $_GET['pass'] = str_replace(".", "&", $_GET['pass']);
                    $user->login($_GET['email'], $_GET['pass']);
                    header('Location: /home');
                }
            }
            View::set('title', 'Inicio');
            View::render('home');
        }
    }
}
