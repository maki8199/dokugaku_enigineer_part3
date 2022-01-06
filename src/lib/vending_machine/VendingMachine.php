<?php

// ◯お題

// 自動販売機のプログラムにプロパティと定数、メソッドにアクセス権を付けましょう。下記の仕様を追加します。

// 100円コインを入れてボタンを押すとサイダーが出るようにしましょう。サイダーが出ると入れた金額から100円が減ります。100円以外のコインは入れられません

use PHP_CodeSniffer\Reports\Code;


class VendingMachine
{
    private const PRICE_OF_DRINK = 100;

    public int $depositedCoin = 0;

    public function depositCoin($coinAmount): int
    {
        if ($coinAmount === 100) {
            $this->depositedCoin += $coinAmount;
        }

        return $this->depositedCoin;
    }

    public function pressButton(): string
    {
        if ($this->depositedCoin >= self::PRICE_OF_DRINK) {
            $this->depositedCoin -= self::PRICE_OF_DRINK;
            return 'cider';
        }

        return '';
    }
}
