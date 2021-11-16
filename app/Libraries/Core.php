<?php

class Core {

    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = array();

    public function __construct() {
        $url = $this->getUrl();
    }

    public function getUrl() {
        if ( isset($_GET['url']) ) {

            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);

            return $url;
        }
    }
}