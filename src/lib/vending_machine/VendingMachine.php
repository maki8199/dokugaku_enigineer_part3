<?php

// ◯お題

// 自動販売機のプログラムにプロパティと定数、メソッドにアクセス権を付けましょう。下記の仕様を追加します。

// 100円コインを入れてボタンを押すとサイダーが出るようにしましょう。サイダーが出ると入れた金額から100円が減ります。100円以外のコインは入れられません

// 仕様変更
// 押したボタンに応じて、サイダーかコーラが出るようにしましょう。サイダーは100円、コーラは150円とします。100円以外のコインは入れられない仕様はそのままです
// 他の飲み物も追加しましょう

use PHP_CodeSniffer\Reports\Code;


class VendingMachine
{

    public int $depositedCoin = 0;

    public function depositCoin($coinAmount): int
    {
        if ($coinAmount === 100) {
            $this->depositedCoin += $coinAmount;
        }

        return $this->depositedCoin;
    }

    public function pressButton(Item $item): string
    {
        $price = $item->getPrice();
        if ($this->depositedCoin >= $price) {
            $this->depositedCoin -= $price;
            return $item->getName();
        }

        return '';
    }
}
