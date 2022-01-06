<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require_once __DIR__ . "/../../lib/oop_poker/Card.php";

final class CardTest extends TestCase
{
    public function testGetNumber(): void
    {
        $card = new Card('C', 5);
        $this->assertSame(5, $card->getNumber());
    }
}
