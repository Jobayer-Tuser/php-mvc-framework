<?php

namespace App\Http\Controller;

class Controller {

    /*private static $instance;
    static function getInstance() {
        if ( ! isset(self::$instance) ){
            self::$instance = new self();
        }
        return self::$instance;
    }*/

    #load the model and view
    public function model($model) {

        #require the model file path
        require_once '/../app/Models/'. $model . '.php';

        #instance of model class
        return new $model();
    }

    public function view($view, $data = []) {

        if ( file_exists('../resource/views/'. $view . '.php') ) {

            require_once '../resource/views/'. $view . '.php';
        } else {
            
            die("View Does Not Exist");
        }
    }

}