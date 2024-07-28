<?php

namespace Provider\Handlers;

class Server
{
    private function __contruct(): void {}

    /**
     * Get all server data
     * @return array
     */
    public static function all() : array
    {
        return $_SERVER;
    }

    /**
     * Check the server has the key
     * @param string $key
     * @return bool
     */
    public static function has(string $key) : bool
    {
        return isset($_SERVER[$key]);
    }

    /**
     * Get the value from server by given key
     * @param string $key
     * @return string|null
     */
    public static function get(string $key) : ?string
    {
        return static::has($key) ? $_SERVER[$key] : null;
    }

    /**
     * Get path info for path
     * @param $path
     * @return array|string
     */
    public static function path_info($path): array|string
    {
        return pathinfo($path);
    }
}