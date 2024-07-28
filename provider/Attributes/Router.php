<?php

namespace Provider\Attributes;

use Attribute;

#[Attribute]
class Router
{
    public function __construct(public string $routePath, public string $method)
    {
    }
}