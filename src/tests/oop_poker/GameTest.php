<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require_once __DIR__ . "/../../lib/oop_poker/Game.php";

final class GameTest extends TestCase
{
    public function testStart(): void
    {
        $game = new Game('田中', 2);
        $result = $game->start();
        $this->assertSame(2, count($result));
    }
}
