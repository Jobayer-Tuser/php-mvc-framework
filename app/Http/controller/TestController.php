<?php

namespace App\Http\controller;

use Jenssegers\Blade\Blade;

class TestController extends Controller {

    private $blade;
    public function __construct() {

        $this->blade = new Blade( VIEW_PATH . 'home', CACHE_PATH );
    }

    public function index() {

        $fields = array(
            array(
                'label' => 'Name',
                'id'    => 'name',
                'name'  => 'name',
                'type'  => 'text',
                'value' => 'value',
                'placeholder' => 'Enter your name',    
            ),
            array(
                'label' => 'Phone',
                'id'    => 'phone',
                'name'  => 'phone',
                'type'  => 'text',
                'value' => 'value',
                'placeholder' => 'Enter your phone number',    
            ),
            array(
                'label' => 'Email',
                'id'    => 'email',
                'name'  => 'email',
                'type'  => 'email',
                'value' => 'value',
                'placeholder' => 'Enter your email',    
            ),
            array(
                'label' => 'Address',
                'id'    => 'address',
                'name'  => 'address',
                'type'  => 'textarea',
                'value' => 'value',
                'placeholder' => 'Enter your address',    
            ),
        );

        echo $this->blade->render('index', $fields);
    }

    public function update() {

        
        return $this->view('home/update');
    }


}