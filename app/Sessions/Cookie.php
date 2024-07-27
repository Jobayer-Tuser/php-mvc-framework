<?php

namespace App\Sessions;

class Cookiee
{
    private function __construct(){}
    /**
     * Start new Cookie
     *
     * @param string $key
     * @param string $value
     *
     * @return string $value
     */
    public static function set(string $key, string $value): string
    {
        $expired = time() + (1 * 365 * 24 * 60 * 60);
        setcookie($key, $value, $expired, "/", "", false, true);
        return $value;
    }

    /**
     * Check cookie is set or not
     * @param string $key
     * @return bool
     */
    public static function has(string $key) : bool
    {
        return isset($_COOKIE[$key]);
    }

    /**
     * Get Cookie by given key
     * @param string $key
     * @return string|null
     */
    public static function get(string $key) : ?string
    {
        return static::has($key) ? $_COOKIE[$key] : null;
    }

    /**
     * Remove Cookie by given key
     * @param string $key
     * @return void
     */
    public static function remove(string $key) : void
    {
        unset($_COOKIE[$key]);
        setcookie($key, null, "-1", "/");
    }

    /**
     * Return all Cookies
     * @return array
     */
    public static function all() : array
    {
        return $_COOKIE;
    }

    /**
     * Destroy all Cookies at once
     * @return void
     */
    public static function destroy() : void
    {
        foreach (static::all() as $key => $value){
            static::remove($key);
        }
    }
}