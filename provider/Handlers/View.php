<?php

namespace Provider\Handlers;

use Jenssegers\Blade\Blade;

class View
{
    public static function render(string $page, array $data = []): string
    {
        return (new Blade(viewPaths: VIEWS, cachePath: CACHE))
            ->make(view: $page, data: $data)
            ->render();
    }
}