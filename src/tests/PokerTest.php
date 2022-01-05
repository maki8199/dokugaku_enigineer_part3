<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class PokerTest extends TestCase
{
    public function testShow(): void
    {
        require_once __DIR__ . "/../lib/Poker.php";
        $this->assertSame(['high card', 'pair', 2], showDown('CK', 'DJ', 'C10', 'H10'));
        $this->assertSame(['high card', 'straight', 2], showDown('CK', 'DJ', 'C3', 'H4'));
        $this->assertSame(['straight', 'pair', 1], showDown('C3', 'H4', 'DK', 'SK'));
        $this->assertSame(['high card', 'high card', 1], showDown('HJ', 'SK', 'DQ', 'D10'));
        $this->assertSame(['high card', 'high card', 2], showDown('H9', 'SK', 'DK', 'D10'));
        $this->assertSame(['high card', 'high card', 0], showDown('H3', 'S5', 'D5', 'D3'));
        $this->assertSame(['pair', 'pair', 1], showDown('CA', 'DA', 'C2', 'D2'));
        $this->assertSame(['pair', 'pair', 2], showDown('CK', 'DK', 'CA', 'DA'));
        $this->assertSame(['pair', 'pair', 0], showDown('C4', 'D4', 'H4', 'S4'));
        $this->assertSame(['straight', 'straight', 1], showDown('SA', 'DK', 'C2', 'CA'));
        $this->assertSame(['straight', 'straight', 2], showDown('C2', 'CA', 'S2', 'D3'));
        $this->assertSame(['straight', 'straight', 0], showDown('S2', 'D3', 'C2', 'H3'));
    }
}
