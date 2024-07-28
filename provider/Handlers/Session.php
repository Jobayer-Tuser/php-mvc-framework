<?php

namespace Provider\Handlers;

class Session
{
    private function __construct(){}

    /**
     * Session start
     * @return void
     */
    public static function start(): void
    {
        if(!session_id()){
            ini_set("session.use_only_cookies", 1);
            session_start();
        }
    }

    /**
     * Start new session
     *
     * @param string $key
     * @param string $value
     *
     * @return string $value
     */
    public static function set(string $key, string $value): string
    {
        $_SESSION[$key] = $value;
        return $value;
    }

    /**
     * Check session is set or not
     * @param string $key
     * @return bool
     */
    public static function has(string $key) : bool
    {
        return isset($_SESSION[$key]);
    }

    /**
     * Get session by given key
     * @param string $key
     * @return string|null
     */
    public static function get(string $key) : ?string
    {
        return static::has($key) ? $_SESSION[$key] : null;
    }

    /**
     * Destroy all session at once
     * @return void
     */
    public static function destroy() : void
    {
        session_start();
        session_unset();
        session_destroy();
    }

    /**
     * Remove session by given key
     * @param string $key
     * @return void
     */
    public static function remove(string $key) : void
    {
        unset($_SESSION[$key]);
    }

    /**
     * Return all sessions
     * @return array
     */
    public static function all() : array
    {
        return $_SESSION;
    }
}