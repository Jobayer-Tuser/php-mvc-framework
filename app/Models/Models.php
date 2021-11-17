<?php

namespace App\Model;

use App\Libraries\DotEnv;

class Model {

    $env = new DotEnv();
    
    private $dbHost = getenv('DB_HOST');
    private $dbUser = getenv('DB_USER');
    private $dbPass = getenv('DB_PASS');
    private $dbName = getenv('DB_NAME');

    private $statement;
    private $handler;
    private $errror;


    public function __construct() {
        $conn = 'mysql:host='. $this->dbHost .';dbname='. $this->dbName;
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        );
    }
}