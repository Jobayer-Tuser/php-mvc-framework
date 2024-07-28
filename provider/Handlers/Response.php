<?php

namespace Provider\Handlers;

class Response
{
    private function __construct(){}

    /**
     * Return output in string or array
     *
     * @param string|array|null $data
     * @return void
     */
    public static function output(string|array|null $data): void
    {
        if(!$data) return;
        if(!is_string($data)){
            $data = self::json($data);
        }
        echo $data;
    }

    /**
     * Return JSON Value
     *
     * @param array $data
     * @return bool|string
     */
    public static function json( array $data): bool|string
    {
        return json_encode($data);
    }
}