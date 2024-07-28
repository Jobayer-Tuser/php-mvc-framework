<?php

namespace Provider\Attributes;
use Attribute;

#[Attribute(Attribute::TARGET_METHOD)]
class Post extends Router
{
    public function __construct(string $routePath)
    {
        parent::__construct(routePath : $routePath, method: "POST");
    }

}