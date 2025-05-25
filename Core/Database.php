<?php

namespace Core;

defined('APP_PATH') || die('Access denied');

use \Core\App;
use PDO;

class Database
{
    /**
     * @desc Nombre del usuario de la base de datos
     * @var $_dbUser
     * @access private
     */
    private $_dbUser;
    /**
     * @desc Nombre del usuario de la base de datos
     * @var $_dbPassword
     * @access private
     */
    private $_dbPassword;
        /**
     * @desc Nombre del usuario de la base de datos
     * @var $_dbHost
     * @access private
     */
    private $_dbHost;

        /**
     * @desc Nombre del usuario de la base de datos
     * @var $_dbName
     * @access private
     */
    protected $_dbName;
        /**
     * @desc Nombre del usuario de la base de datos
     * @var $_connection
     * @access private
     */
    public $_connection;
    /**
     * @desc Nombre del usuario de la base de datos
     * @var $_instance
     * @access private
     */
    private static $_instance;

    /**
     * [__construct]
     */
    private function __construct()
    {
        try {
            $config = App::getConfig("database");
            $database = (array) $config->database;
            $database = $database[ENVIRONMENT];

            $this->_dbHost = $database->host;
            $this->_dbUser = $database->user;
            $this->_dbPassword = $database->password;
            $this->_dbName = $database->database;

            $this->_connection = new PDO('mysql:host=' . $this->_dbHost . '; dbname=' . $this->_dbName, $this->_dbUser, $this->_dbPassword);
            $this->_connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->_connection->exec('SET CHARACTER SET utf8');
        } catch (\PDOException $e) {
            print 'Error!: ' . $e->getMessage();
            die();
        }
    }

    public function query($sql)
    {
        return $this->_connection->query($sql)->fetchAll();
    }

    public function prepare($sql)
    {
        return $this->_connection->prepare($sql);
    }

    public function execute($sql)
    {
        return $this->_connection->exec($sql);
    }

    public static function instance()
    {
        if (!isset(self::$_instance)) {
            $class = __CLASS__;
            self::$_instance = new $class();
        }
        return self::$_instance;
    }

    public function __clone()
    {
        trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR);
    }
}
