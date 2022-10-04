<?php

namespace App\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_METHOD)]
class Delete extends Router
{
    public function __construct(string $routePath)
    {
        parent::__construct(routePath: $routePath, method: "DELETE");
    }

}