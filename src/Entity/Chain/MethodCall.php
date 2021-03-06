<?php

namespace Entity\Chain;

use Entity\Chain;

class MethodCall extends Chain
{
    public function __construct(Chain $child = null, $name = "", array $args = [])
    {
        parent::__construct($child, $name, 'method');
        $this->args = $args;
    }

    public function getArgs()
    {
        return $this->args;
    }

    private $args;
}
