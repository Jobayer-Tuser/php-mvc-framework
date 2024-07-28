<?php

namespace Provider\Handlers;

use Jenssegers\Blade\Blade;

class View
{
    public static function render(string $page, array $data = []): string
    {
        return self::bladeRender($page, $data);
    }

    /**
     * Render view page via Jessegers Blade Library
     * @param string $page
     * @param array $data
     * @return string
     */
    private static function bladeRender(string $page, array $data = []): string
    {
        return (new Blade(viewPaths: VIEWS, cachePath: CACHE))
            ->make(view: $page, data: $data)
            ->render();
    }
}