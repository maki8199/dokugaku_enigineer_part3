<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../lib/poker/PokerGame.php';

final class PokerGameTest extends TestCase
{
    public function testStart(): void
    {
        $game = new PokerGame(['CA', 'DA'], ['C10', 'H10']);
        $this->assertSame([['CA', 'DA'], ['C10', 'H10']], $game->start());
    }
}
