<?php

namespace App\Controllers;

defined('APP_PATH') || die('Access denied');

use PHPAuth\Config as PHPAuthConfig;
use \App\Models\User as modelUser;
use \Core\Controller;
use \Core\View;
use \Core\Database;

class User extends Controller
{
    public function index()
    {
        //+d($_SESSION);
        $conditionForm = null;
        if (isset($_POST['buttonSaveData'])) {
            foreach ($_POST as $key => $value) {
                if (is_null($value) || $value == "") {
                    $conditionForm = false;
                } else {
                    continue;
                }
            }
            if (is_null($conditionForm)) {
                modelUser::addUserBd($_POST);
                header('Location: /home');
            }
        }
        View::set('title', 'Ficha del Usuario');
        View::render('inputDataNewUser');
    }

    public function profile()
    {
        View::set('username', $_SESSION['username']);
    }

    public function logout()
    {
        $user = new modelUser(); //Clase User de Models
        $user->logout();
        session_destroy();
        unset($_COOKIE);
        header('Location: /home');
    }
}
