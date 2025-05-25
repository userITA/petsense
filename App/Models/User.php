<?php

namespace App\Models;

defined('APP_PATH') || die('Access denied');

use PHPAuth\Config as PHPAuthConfig;
use PHPAuth\Auth as PHPAuth;
use \Core\Database;
use \App\Interfaces\Crud;
use phpseclib3\Math\BinaryField\Integer;

class User
{

    /**
     * @desc Objecto Auth
     * @var $_dbUser
     * @access private
     */
    private $_auth;

    /**
     * @desc Objecto Auth config
     * @var $_dbUser
     * @access private
     */
    private $_auth_config;

    /**
     * [__construct description]
     */
    public function __construct()
    {

        $ddbb = Database::instance();

        $config = new PHPAuthConfig($ddbb->_connection);
        $auth = new PHPAuth($ddbb->_connection, $config, 'en_GB');

        $this->_auth_config = $config;
        $this->_auth = $auth;

        unset($ddbb);
    }

    public function login($email, $password)
    {

        $login = $this->_auth->login($email, $password);
        //+d($login);

        if (!$login['error']) {
            setcookie($this->_auth_config->cookie_name, $login['hash'], $login['expire']);
            $_SESSION['username'] = $this->getUser($login['hash']);
            $_SESSION['email'] = $this->getUserEmail($login['hash']);
            return true;
        }
        return false;
    }

    public static function superUserLogin($email, $password)
    {
        $conditionUser = null;
        $json = file_get_contents(APP_PATH . '/config/users.json');
        $decodeJSON = json_decode($json, true);
        if (isset($decodeJSON['users'])) {
            foreach ($decodeJSON['users'] as $keyArray => $arrayUser) {
                if (isset($arrayUser['name']) && isset($arrayUser['pass'])) {
                    if (($arrayUser['name'] == $email) && ($arrayUser['pass'] == $password)) {
                        $conditionUser = true;
                        break;
                    } else {
                        $conditionUser = false;
                    }
                }
            }
        }
        return ((!is_null($conditionUser) && $conditionUser != false) ? true : false);
    }

    public static function seeConditionUser($email)
    {
        $ddbb = Database::instance();

        $sql = "SELECT * FROM pets WHERE `emailUser` = '" . $email . "'";
        $result = $ddbb->query($sql);

        if (!is_null($result)) {
            return $result;
        } else {
            return null;
        }
    }

    public static function updateNameUser($username, $email)
    {
        $database = Database::instance();
        $sql = 'UPDATE users SET `username` = ? WHERE `email` = ?';

        $stmt = $database->prepare($sql);
        $stmt->bindParam(1, $username);
        $stmt->bindParam(2, $email);
        $result = $stmt->execute();

        unset($database);
    }

    public static function addUserBd($arrayUser)
    {
        $database = Database::instance();
        $sql = 'INSERT INTO `pets` (`emailUser`, `nameUser`, `lastNameUser`, `address`, `phone`, `name`, `race`, `years`, `device`) VALUES (?,?,?,?,?,?,?,?,?)';

        $nameUser = $arrayUser['firstName'];
        $lastNameUser = $arrayUser['lastName'];
        $emailUser = $arrayUser['emailUser'];
        $passUser = $arrayUser['passUser'];
        $address = $arrayUser['direction'];
        $phone = $arrayUser['phone'];
        $device = $arrayUser['device'];
        $namePet = $arrayUser['namePet'];
        $yearsPet = intval($arrayUser['yearsPet']);
        $race = $arrayUser['razas'];

        $stmt = $database->prepare($sql);
        $stmt->bindParam(1, $emailUser);
        $stmt->bindParam(2, $nameUser);
        $stmt->bindParam(3, $lastNameUser);
        $stmt->bindParam(4, $address);
        $stmt->bindParam(5, $phone);
        $stmt->bindParam(6, $namePet);
        $stmt->bindParam(7, $race);
        $stmt->bindParam(8, $yearsPet);
        $stmt->bindParam(9, $device);
        $result = $stmt->execute();

        $user = new User();
        $user->registerUser($emailUser, $passUser);
        $user->updateNameUser($nameUser, $emailUser);
        unset($database);
    }

    public function logout()
    {

        $logout = $this->_auth->logout($_COOKIE[$this->_auth_config->config["cookie_name"]]);

        if ($logout == true) {
            setcookie($this->_auth_config->config["cookie_name"], '', time() - 3600, $this->_auth_config->config["cookie_path"], $this->_auth_config->config["cookie_domain"]);
            setcookie($this->_auth_config->config["cookie_name"], '', time() - 3600, $this->_auth_config->config["cookie_path"], $this->_auth_config->config["cookie_domain"] . "2");
            setcookie($this->_auth_config->config["cookie_name"], '', time() - 3600, $this->_auth_config->config["cookie_path"], "172.28.204.217");
            unset($_SESSION['username']);
            unset($_SESSION['email']);
        }
    }

    public function getAuth()
    {

        return $this->_auth;
    }

    public function getAuthConfig()
    {

        return $this->_auth_config;
    }


    public static function getUser($hash)
    {
        $ddbb = Database::instance();

        $sql = "SELECT u.username FROM sessions s INNER JOIN users u ON s.uid = u.id WHERE s.hash = '" . $hash . "'";
        $user = $ddbb->query($sql);
        return $user[0]['username'];
    }

    public static function getUserEmail($hash)
    {
        $ddbb = Database::instance();

        $sql = "SELECT u.email FROM sessions s INNER JOIN users u ON s.uid = u.id WHERE s.hash = '" . $hash . "'";
        $user = $ddbb->query($sql);
        if (!empty($user)) {
            return $user[0]['email'];
        } else {
            return null;
        }
    }

    public function registerUser($email, $password)
    {

        // var_dump($this->_auth->register('carlosmarugan@gmail.com', 'HXR2zVO4Ximp', 'HXR2zVO4Ximp'));
        // var_dump($this->_auth->register('abravo@bostonnetmanagement.com', 'vO56e7kM4C', 'vO56e7kM4C'));
        // var_dump($this->_auth->register('mjdiaz@bostonnetmanagement.com', 'zZ6H7E4aI8', 'zZ6H7E4aI8'));
        // var_dump($this->_auth->register('jgarcia@bestpresentsmg.com', 'Xe006EqFOT', 'Xe006EqFOT'));
        // var_dump($this->_auth->register('produccion@bestpresentsmg.com', 'Z95NwtP86', 'Z95NwtP86'));

        $register = $this->_auth->register($email, $password, $password);

        return $register;
    }
}
