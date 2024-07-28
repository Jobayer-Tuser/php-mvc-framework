<?php
namespace Provider\Attributes;

use Attribute;

#[Attribute(Attribute::TARGET_METHOD)]
class Put extends Router
{
    public function __construct(string $routePath)
    {
        parent::__construct(routePath: $routePath, method: "PUT");
    }

}
