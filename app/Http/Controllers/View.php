<?php

namespace App\Http\Controllers;

use Exception;
use Jenssegers\Blade\Blade;

class View
{
    private function __construct(){}

    public static function render(string $page, array $data = [])
    {
        return self::bladeRender($page, $data);
    }

    /**
     * Render view page
     *
     * @param string $pageName
     * @param array $params
     * @return string|bool
     * @throws Exception
     */
    private static function renderCustomView(string $pageName, array $params = []) : string|bool
    {
        $page = str_replace('.', '/', $pageName);
        $viewPage = VIEWS . DIRECTORY_SEPARATOR . $page . '.php';

        if (!file_exists($viewPage))
        {
            throw new Exception("The view file " . $viewPage . " not exists");
        }
        else
        {
            ob_start();
            foreach ($params as $key => $value){
                $$key = $value;
            }
            include($viewPage);
            $content = ob_get_contents();
            ob_end_clean();
            return $content;
        }
    }

    /**
     * Render view page via Jessegers Blade Library
     * @param string $page
     * @param array $data
     * @return string
     */
    private static function bladeRender(string $page, array $data = []): string
    {
        $blade = new Blade(VIEWS, CACHE);
        return $blade->make($page, $data)->render();
    }
}