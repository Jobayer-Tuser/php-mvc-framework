<?php

namespace App\Libraries;

class Route {

    private static $noRouteMatch = true;
    private static $routeName = null;

    static function get($path, $callback) {

        if ( $_SERVER['REQUEST_METHOD'] !== 'GET' ) return ;

        self::process($path, $callback);
    }

    static function post($path, $callback){
        if ( $_SERVER['REQUEST_METHOD'] !== 'POST' ) return ;

        self::process($path, $callback);
    }

    static function delete($path, $callback){
        if ( $_SERVER['REQUEST_METHOD'] !== 'DELETE' ) return ;

        self::process($path, $callback);
    }

    static function put($path, $callback = null){
        if ( $_SERVER['REQUEST_METHOD'] !== 'PUT' ) return ;

        self::process($path, $callback);
    }

    private static function process( $path, $callback ) {

        
        $pattern = "~^{$path}/?$~";
        $params = self::getUrlMatch( $pattern );
        
        if ( $params) {
            self::$noRouteMatch = false;
            $functionArgs = array_slice( $params, 1 );
        
            if ( is_callable( $callback ) ) {
               
                if ( is_array( $callback ) ) {
                    $className  = $callback[0];
                    $methodName = $callback[1];
                    // $instance = $className::getInstance();
                    $instance = new $className();
                    
                    try {
                        $ins = $instance->$methodName(...$functionArgs);

                    } catch (\InvalidArgumentException $error) {
                        print_r($error->getMessage());
                    }

                } else {  
                    $callback(...$functionArgs);
                }
            } else {
                $parts = explode('@', $callback);
                $className = $parts[0];
                $methodName = $parts[1];
                $instance = new $className();
                $instance->$methodName(...$functionArgs);
            }
        }
    }

    private static function getUrl() {

        return $_SERVER['REQUEST_URI'];
    }

    private static function getUrlMatch( $path ) {
        $url = self::getUrl();
        
        if ( preg_match( $path, $url, $matches ) ) {
            return $matches;
        }
        return false;
    }

    public static function name( $name ) {
        static::$routeName = $name;
        return new static;
    }

    static function cleanUrl(){
        if ( self::$noRouteMatch ) {
            echo "No Route matches";
        }
    }

}