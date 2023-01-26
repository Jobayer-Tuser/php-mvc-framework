<?php

namespace App\Http;

class Request
{
    /**
     * @var $script_name
     */
    private static $script_name;
    /**
     * @var $base_url
     */
    private static $base_url;

    /**
     * @var $url
     */
    private static $url;

    /**
     * @var $full_url
     */
    private static $full_url;

    /**
     * @var $query_string
     */
    private static $query_string;

    public static function handle()
    {
        static::$script_name = Server::get("SCRIPT_NAME");
        static::setBaseUrl();
        static::setUrl();
    }

    private static function setBaseUrl(): void
    {
    }

    private static function setUrl(): void
    {
    }
}