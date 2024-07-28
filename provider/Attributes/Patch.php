<?php

namespace Provider\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_METHOD)]
class Patch extends Router
{
    public function __construct(string $routePath)
    {
        parent::__construct(routePath: $routePath, method: "PATCH");
    }

}