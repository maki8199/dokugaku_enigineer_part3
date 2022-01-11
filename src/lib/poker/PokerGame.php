<?php

require_once('PokerPlayer.php');
require_once('PokerCard.php');

class PokerGame
{
    public function __construct(private array $cards1, private array $cards2)
    {
    }

    public function start(): array
    {
        $playerCardRanks = [];
        foreach ([$this->cards1, $this->cards2] as $cards) {
            $pokerCards = array_map(fn ($card) => new PokerCard($card), $cards);
            $player = new PokerPlayer($pokerCards);
            $playerCardRanks[] = $player->GetCardRanks();
        }

        return $playerCardRanks;
    }
}

$game = new PokerGame(['CA', 'DA'], ['C10', 'H10']);
$game->start();
