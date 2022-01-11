<?php

require_once('PokerCard.php');

class PokerPlayer
{
    public function __construct(private array $pokerCards)
    {
    }

    public function GetCardRanks()
    {
        return array_map(fn ($pokerCard) => $pokerCard->getRank(), $this->pokerCards);
    }
}
