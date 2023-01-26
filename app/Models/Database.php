<?php

namespace App\Models;

use App\File\File;
use PDO;
use PDOException;
use Exception;

class Database
{
    protected static $instance;
    protected static $connection;

    /**
     * @throws Exception
     */
    private function __construct()
    {
        if(!self::$connection){
            $db_data = require_once( ROOT . "/config/database.php");
            extract($db_data);

            $options = [
                PDO::ATTR_ERRMODE               => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE    => PDO::FETCH_OBJ,
                PDO::ATTR_PERSISTENT            => false,
                PDO::MYSQL_ATTR_INIT_COMMAND    => "set NAMES " . $charset . " COLLATE " . $collation,

            ];
            try {
                self::$connection = new PDO("mysql:host=$host;dbname=$database;charset=$charset", $username, $password, $options);
            } catch (PDOException $exception){
                throw new Exception($exception->getMessage());
            }
        }
    }

    /**
     * Making our class as singleton instance
     * @return object
     */
    public static function getInstance() : object
    {
        if( !isset(self::$instance) ) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

}