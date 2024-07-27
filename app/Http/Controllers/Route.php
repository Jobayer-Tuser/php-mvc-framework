<?php

namespace App\Http\Controllers;

use BadFunctionCallException;
use InvalidArgumentException;
use ReflectionException;

class Route
{
    private static array $routes = [];
    private static $middleware;
    private static $prefix;

    /**
     * Add route
     *
     * @param string $methods
     * @param string $uri
     * @param callback|array $callback
     * @return void
     */
    private static function add(string $methods, string $uri, callable|array $callback) : void
    {
        $uri = trim($uri, "/");
        $uri = rtrim(self::$prefix . "/" . $uri, "/");
        $uri = $uri?:"/";
        foreach (explode("|", $methods) as $method){
            self::$routes[] = [
                "uri"         => $uri,
                "callback"    => $callback,
                "method"      => $method,
                "middleware"  => self::$middleware,
            ];
        }
    }

    /**
     * Add new get method route
     *
     * @param string $uri
     * @param callable|array $callback
     * @return void
     */
    public static function get(string $uri, callable|array $callback) : void
    {
        if ($_SERVER["REQUEST_METHOD"] !== "GET")
            throw new BadFunctionCallException("Not supported " . $_SERVER["REQUEST_METHOD"] . " Method");

        self::add("GET", $uri, $callback);
    }

    /**
     * Add new post method route
     *
     * @param string $uri
     * @param callable|array|string $callback
     * @return void
     */
    public static function post(string $uri, callable|array|string $callback) : void
    {
        if ($_SERVER["REQUEST_METHOD"] !== "POST")
            throw new BadFunctionCallException("Not supported " . $_SERVER["REQUEST_METHOD"] . " Method");

        self::add("POST", $uri, $callback);
    }

    /**
     * Add new put method route
     *
     * @param string $uri
     * @param callable|array|string $callback
     * @return void
     */
    public static function put(string $uri, callable|array|string $callback) : void
    {
        if ($_SERVER["REQUEST_METHOD"] !== "PUT")
            throw new BadFunctionCallException("Not supported " . $_SERVER["REQUEST_METHOD"] . " Method");

        self::add("POST", $uri, $callback);
    }

    /**
     * Add new patch method route
     *
     * @param string $uri
     * @param callable|array|string $callback
     * @return void
     */
    public static function patch(string $uri, callable|array|string $callback) : void
    {
        if ($_SERVER["REQUEST_METHOD"] !== "PATCH")
            throw new BadFunctionCallException("Not supported " . $_SERVER["REQUEST_METHOD"] . " Method");

        self::add("POST", $uri, $callback);
    }

    /**
     * Add new delete method route
     *
     * @param string $uri
     * @param callable|array|string $callback
     * @return void
     */
    public static function delete(string $uri, callable|array|string $callback) : void
    {
        if ($_SERVER["REQUEST_METHOD"] !== "DELETE")
            throw new BadFunctionCallException("Not supported " . $_SERVER["REQUEST_METHOD"] . " Method");

        self::add("POST", $uri, $callback);
    }

    /**
     * Add route prefix
     *
     * @param string $prefix
     * @param callable|array $callback
     * @return void
     */
    public static function prefix(string $prefix, callable|array $callback) : void
    {
        $parent_prefix = self::$prefix;
        self::$prefix .= '/' . trim($prefix, '/');

        if(is_callable($callback)){
            call_user_func($callback);
        } else {
            throw new BadFunctionCallException("Please provide valid callback");
        }
        self::$prefix = $parent_prefix;
    }

    /**
     * Add route middleware
     *
     * @param string $middleware
     * @param callable|array $callback
     * @return void
     */
    public static function middleware(string $middleware, callable|array $callback) : void
    {
        $parent_middleware = self::$middleware;
        self::$middleware .= '|' . trim($middleware, '|');

        if(is_callable($callback))
        {
            call_user_func($callback);
        } else {
            throw new BadFunctionCallException("Please provide valid callback");
        }
        self::$middleware = $parent_middleware;
    }

    /**
     * Call to process route url
     *
     * @return mixed|void
     * @throws ReflectionException
     */
    public static function handleRequest()
    {
        $url = $_SERVER['REQUEST_URI'];
        foreach (self::$routes as $route){

            $matched = true;
            $route["uri"] = preg_replace("~/{(.*?)}~", "/(.*?)", $route["uri"]);
            $route["uri"] = "#^" . $route["uri"] . "$#";

            if(preg_match($route["uri"], $url, $matches)){

                array_shift($matches);
                $params = array_values($matches);

                foreach ($params as $param){
                    if(strpos($param, "/")){
                        $matched = false;
                    }
                }

                if($matched){
                    return self::processRouteUrl($route, $params);
                }
            }
        }
    }

    private static function registeredRoutes() : array
    {
        return self::$routes;
    }

    /**
     * Process route url and callback
     *
     * @param array $route
     * @param array|callable $params
     * @return mixed
     * @throws ReflectionException
     */
    private static function processRouteUrl(array $route, array|callable $params = []) : mixed
    {
        if ( isset($route["middleware"]) ) self::executeMiddleware($route);
        $callback = $route["callback"];

        if(is_callable($callback))
        {
            return call_user_func_array($callback, $params);
        }
        elseif (is_array($callback))
        {
            [$controller, $method ] = $callback;

            if(class_exists($controller))
            {
                $classInstance = new $controller();

                if(method_exists($classInstance, $method))
                {
                    return call_user_func_array([$classInstance, $method], $params);
                } else {
                    throw new BadFunctionCallException("The method" . $method . "is not exists at" . $controller );
                }

            } else {
                throw new ReflectionException("Class" . $controller . "is not found");
            }
        } else{
            throw new InvalidArgumentException("Please provide valid callback function");
        }
    }

    /**
     * Implement Middleware in route
     *
     * @param array $route
     * @return void
     * @throws ReflectionException
     */
    private static function executeMiddleware(array $route) : void
    {
        $middlewares = explode("|", $route["middleware"]);

        foreach ( $middlewares as $middleware ){
            if($middleware != ''){
                $middleware = '\App\Http\Middleware\\' . $middleware;
                if(class_exists($middleware)){
                    $object = new $middleware();
                    call_user_func_array([$object, "handle"], []);
                } else {
                    throw new ReflectionException("Middleware Class " . $middleware . " is not exists");
                }
            }
        }
    }

    /**
     * Using reflection api to make route more dynamic.
     *
     * @param array $controllers
     * @return void
     * @throws ReflectionException
     */
    public static function registerRouteFromControllerAttributes(array $controllers): void
    {
        foreach ($controllers as $controller){
            $reflectionController = new \ReflectionClass($controller);

            foreach ($reflectionController->getMethods() as $method){
                $attributes = $method->getAttributes(\App\Attributes\Router::class, \ReflectionAttribute::IS_INSTANCEOF);
                foreach ($attributes as $attribute){
                    $route = $attribute->newInstance();
                    self::processRouteUrl($route->routePath, [$controller, $method->getName()]);
                }
            }
        }
    }

}