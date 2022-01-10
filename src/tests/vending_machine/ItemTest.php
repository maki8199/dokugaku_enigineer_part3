<?php

use PHPUnit\Framework\TestCase;

require_once(__DIR__ . '/../../lib/vending_machine/Item.php');

final class ItemTest extends TestCase
{
    public function testGetName()
    {
        $item = new Item('cider');
        $this->assertSame('cider', $item->getName());
    }

    public function testGetPrice()
    {
        $item = new Item('cider');
        $this->assertSame(100, $item->getPrice());
    }
}
