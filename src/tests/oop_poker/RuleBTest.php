<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require_once __DIR__ . "/../../lib/oop_poker/RuleB.php";

final class RuleBTest extends TestCase
{
    public function testGetHand(): void
    {
        $rule = new RuleB();
        $cards = [new Card('H', 9), new Card('C', 10)];
        $this->assertSame('high card', $rule->getHand($cards));
    }
}
