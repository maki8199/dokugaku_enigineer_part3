<?php

class Item
{
    private const PRICES = [
        'cider' => 100,
        'cola' => 150,
    ];

    public function __construct(private string $name)
    {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): int
    {
        return self::PRICES[$this->name];
    }
}
