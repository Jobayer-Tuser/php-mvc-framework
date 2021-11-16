<?php
namespace App\Http\controller;

class TestController extends Controller {

    public function index() {


        $this->view('home/index');
    }

    public function update() {

        $var = array(
            'name' => 'Jobayer Al Mahmud',
            'description' => 'This is description',
        );
        return $this->view('home/update', $var);
    }


}