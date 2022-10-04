<?php

namespace App\Controllers;

class View
{
    private array $blocks = [];
    private string $cache_path = CACHE_PATH;
    private bool $cached_enabled = false;

    public static function page(string $pageName, array $params = []) : void
    {
        $viewPage = VIEW_PATH . '/' . $pageName . '.php';

        if (!file_exists($viewPage)){
            echo "View page not found";
        } else {

            foreach ($params as $key => $value){
                $$key = $value;
            }
            self::cache($viewPage);
//            require($viewPage);
        }
    }

    private static function cache(string $file)
    {
        if(!file_exists($file)) {
            mkdir($file, 0744);
        }
        return $code = self::includeFiles($file);
    }

    private static function includeFiles(string $file)
    {
        $code = file_get_contents($file);
        preg_match_all('/{% ?(extends|include) ?\'?(.*?)\'? ?%}/i', $code, $matches, PREG_SET_ORDER);
        foreach ($matches as $value) {
            $code = str_replace($value[0], self::includeFiles($value[2]), $code);
        }
        $code = preg_replace('/{% ?(extends|include) ?\'?(.*?)\'? ?%}/i', '', $code);
        echo "<pre>";
        print_r($code);
        echo "</pre>";
        return $code;
    }
}