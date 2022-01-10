<?php

use PHPUnit\Framework\MockObject\Stub\ReturnReference;

class HandEvaluator
{

    public function __construct(private $rule)
    {
    }

    public function getHand($cards): string
    {
        return $this->rule->getHand($cards);
    }
}
