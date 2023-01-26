<?php

namespace App\Http\Controllers;

use App\Attributes\Router;
use App\Exception\RouteNotFoundException;

class RouteOld
{
    private static bool $noRouteMatches = true;

    public static function get(string $routePattern, callable|array|string $callback) : void
    {
        if ($_SERVER["REQUEST_METHOD"] !== "GET") return;
        self::processRouteUrl($routePattern, $callback);
    }

    public static function post(string $routePattern, callable|array|string $callback) : void
    {
        if ($_SERVER["REQUEST_METHOD"] !== "POST") return;
        self::processRouteUrl($routePattern, $callback);
    }

    public static function put(string $routePattern, callable|array|string $callback) : void
    {
        if ($_SERVER["REQUEST_METHOD"] !== "PUT") return;
        self::processRouteUrl($routePattern, $callback);
    }

    public static function patch(string $routePattern, callable|array|string $callback) : void
    {
        if ($_SERVER["REQUEST_METHOD"] !== "PATCH") return;
        self::processRouteUrl($routePattern, $callback);
    }

    public static function delete(string $routePattern, callable|array|string $callback) : void
    {
        if ($_SERVER["REQUEST_METHOD"] !== "DELETE") return;
        self::processRouteUrl($routePattern, $callback);
    }


    private static function processRouteUrl(string $routePattern, callable|array|string $callback): void
    {
        $matchRoutePattern = self::getMatchUrl($routePattern);

        if($matchRoutePattern){
            $functionArguments = array_slice($matchRoutePattern, 1);
            self::$noRouteMatches = false;

            #if route is direct callback function
            if(is_callable($callback)) {
                $callback(...$functionArguments);
            }

            #if route class and method comes as array
            if(is_array($callback)){
                [ $className, $methodName ] = $callback;
                if(class_exists($className)) {
//                    $classInstance = new ServiceContainer($className);
                    $classInstance = new $className();
                    $classInstance->$methodName(...$functionArguments);
                }
            }

            #if route method and class come as a string
            if(is_string($callback)){
                $parts = explode('@', $callback);
                $className = "App\Controller\\" . $parts[0];
                $methodName = $parts[1];
                $instance = new $className();
                $instance->$methodName(...$functionArguments);
            }
        }
//        throw new RouteNotFoundException();
    }

    private static function getMatchUrl($pattern)
    {
        $pattern = "~^{$pattern}/?$~";
        $url = $_SERVER['REQUEST_URI'];
        if(preg_match($pattern, $url, $matches)){
            return $matches;
        }
        return false;
    }

    /**
     * @throws \ReflectionException
     */
    public static function registerRouteFromControllerAttributes(array $controllers) : void
    {
        foreach ($controllers as $controller){
            $reflectionController = new \ReflectionClass($controller);

            foreach ($reflectionController->getMethods() as $method){
                $attributes = $method->getAttributes(Router::class, \ReflectionAttribute::IS_INSTANCEOF);
                foreach ($attributes as $attribute){
                    $route = $attribute->newInstance();
                    self::processRouteUrl($route->routePath, [$controller, $method->getName()]);
                }
            }
        }
    }
}