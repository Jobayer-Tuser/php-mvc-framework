<?php

namespace App\Controllers;

class View
{
    public static function page(string $pageName, array $params = []) : void
    {
        $viewPage = VIEW_PATH . '/' . $pageName . '.php';

        if (!file_exists($viewPage)){
            echo "View page not found";
        } else {
            foreach ($params as $key => $value){
                $$key = $value;
            }
            include($viewPage);
//            ob_start();
//            return (string) ob_get_clean();
        }
    }
}