<?php

// 2枚の手札でポーカーを行います。ルールは次の通りです。

// ・プレイヤーは2人です
// ・各プレイヤーはトランプ2枚を与えられます
// ・ジョーカーはありません
// ・与えられたカードから、役を判定します。役は番号が大きくなるほど強くなります

// ハイカード：以下の役が一つも成立していない
// ペア：2枚のカードが同じ数字
// ストレート：2枚のカードが連続している。A は 2 と K の両方と連続しているとみなし、A を含むストレート は、A-2 と K-A の2つです
// ・2つの手札について、強さは以下に従います
// 2つの手札の役が異なる場合、より上位の役を持つ手札が強いものとする
// 2つの手札の役が同じ場合、各カードの数値によって強さを比較する
// 　 ・（弱）2, 3, 4, 5, 6, 7, 8, 9, 10, J, Q, K, A (強)
// 　 ・ハイカード：一番強い数字同士を比較する。左記が同じ数字の場合、もう一枚のカード同士を比較する
// 　 ・ペア：ペアの数字を比較する
// 　 ・ストレート：一番強い数字を比較する (ただし、A-2 の組み合わせの場合、2 を一番強い数字とする。K-A が最強、A-2 が最弱)
// 　 ・数値が同じ場合：引き分け
// 　
// それぞれの役と勝敗を判定するプログラムを作成ください。
// showDownメソッドは引数として、プレイヤー1のカード、プレイヤー1のカード、プレイヤー2のカード、プレイヤー2のカードを取ります。
// カードはH1〜H13（ハート）、S1〜S13（スペード）、D1〜D13（ダイヤ）、C1〜C13（クラブ）、となります。ただし、Jは11、Qは12、Kは13、Aは1とします。
// showDownメソッドは返り値として、プレイヤー1の役、プレイヤー2の役、勝利したプレイヤーの番号、を返します。引き分けの場合、プレイヤーの番号は0とします。

const HIGH = "high card";
const PAIR = "pair";
const STRAIGHT = "straight";

const NUMBERS = [
    "2" => 1,
    "3" => 2,
    "4" => 3,
    "5" => 4,
    "6" => 5,
    "7" => 6,
    "8" => 7,
    "9" => 8,
    "10" => 9,
    "J" => 10,
    "Q" => 11,
    "K" => 12,
    "A" => 13,
];

const RANK = [
    HIGH => 1,
    PAIR => 2,
    STRAIGHT => 3,
];

// high card : card1 != card2
// pair : card1 = card2
// straight : abs(card1 -card2) = 1  or abs(card1 - card2) = abs(12)

function checkStraight(array $numbers): bool
{
    if (abs(NUMBERS[$numbers[0]] - NUMBERS[$numbers[1]]) === 1) {
        return True;
    } elseif (abs(NUMBERS[$numbers[0]] - NUMBERS[$numbers[1]]) === 12) {
        return True;
    } else {
        return False;
    }
}

function convertToNumber(array $cards): array
{
    return  array_map(fn ($card) => substr($card, 1, strlen($card) - 1), $cards);
}

function judgeRole(array $numbers): array
{

    $maxNumber = max($numbers);
    $minNumber = min($numbers);

    if (checkStraight($numbers)) {
        $rank = STRAIGHT;
        if (abs(NUMBERS[$numbers[0]] - NUMBERS[$numbers[1]]) === 12) {
            $maxNumber = "A";
        }
    } elseif ($numbers[0] === $numbers[1]) {
        $rank = PAIR;
    } else {
        $rank = HIGH;
    }

    return ([$rank, $maxNumber, $minNumber]);
}

function DecideTheWinner(array $role1, array $role2): int
{
    if (RANK[$role1[0]] > RANK[$role2[0]]) {
        return 1;
    } else if (RANK[$role1[0]] < RANK[$role2[0]]) {
        return 2;
    } else {
        if (NUMBERS[$role1[1]] > NUMBERS[$role2[1]]) {
            return 1;
        } else if (NUMBERS[$role1[1]] < NUMBERS[$role2[1]]) {
            return 2;
        } else {
            if ($role1[0] === HIGH) {
                if (NUMBERS[$role1[2]] > NUMBERS[$role2[2]]) {
                    return 1;
                } else if (NUMBERS[$role1[2]] < NUMBERS[$role2[2]]) {
                    return 2;
                }
            }
            return 0;
        }
    }
}

function showDown(string ...$cards): array
{
    $numbers = convertToNumber($cards);

    $role1 = judgeRole(array_chunk($numbers, 2)[0]); //[役、強数字,弱数字]
    $role2 = judgeRole(array_chunk($numbers, 2)[1]);

    $winner = DecideTheWinner($role1, $role2);

    return [$role1[0], $role2[0], $winner];
}

showDown('HJ', 'SK', 'DQ', 'D10');
