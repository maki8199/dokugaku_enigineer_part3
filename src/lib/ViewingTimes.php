<?php

// 【クイズ】テレビの視聴時間

// ◯お題
// あなたはテレビが好きすぎて、プログラミングの学習が捗らないことに悩んでいました。
// テレビをやめれば学習時間が増えることは分かっているのですけど、テレビをすぐに辞めることができないでいます。
// そこで、一日のテレビの視聴分数を記録することから始めようと思い、プログラムを書くことにしました。
// テレビを見るたびにチャンネルごとの視聴分数をメモしておき、一日の終わりに記録します。テレビの合計視聴時間と、チャンネルごとの視聴分数と視聴回数を出力してください。

// ◯インプット
// 入力は以下の形式で与えられます。

// テレビのチャンネル 視聴分数 テレビのチャンネル 視聴分数 ...

// ただし、同じチャンネルを複数回見た時は、それぞれ分けて記録すること。

// チャンネル：数値を指定すること。1〜12の範囲とする（1ch〜12ch）
// 視聴分数：分数を指定すること。1〜1440の範囲とする

// ◯アウトプット
// テレビの合計視聴時間
// テレビのチャンネル 視聴分数 視聴回数
// テレビのチャンネル 視聴分数 視聴回数
// ...

// ただし、閲覧したチャンネルだけ出力するものとする。

// 視聴時間：時間数を出力すること。小数点一桁までで、端数は四捨五入すること

// ◯インプット例

// 1 30 5 25 2 30 1 15

// ◯アウトプット例

// 1.7
// 1 45 2
// 2 30 1
// 5 25 1

// ◯実行コマンド例
// php quiz.php 1 30 5 25 2 30 1 15

const SPLIT_LENGTH = 2;

function getInput(string $stdin): array
{
    $inputs = array_chunk(explode(" ", $stdin), SPLIT_LENGTH);
    return $inputs;
}

function getViewingTimePerChannel(array $inputs): array
{
    $viewingTimePerChannel = [];
    foreach ($inputs as $input) {
        $channel = $input[0];
        $min = (int)$input[1];
        $mins = [$min];
        if (array_key_exists($channel, $viewingTimePerChannel)) {
            $mins = array_merge($viewingTimePerChannel[$channel], $mins);
        }
        $viewingTimePerChannel[$channel] = $mins;
    }
    ksort($viewingTimePerChannel);
    return $viewingTimePerChannel;
}

function calculateTotalTime(array $viewingTimePerChannel): float
{
    $viewingTimes = [];
    foreach ($viewingTimePerChannel as $times) {
        $viewingTimes = array_merge($viewingTimes, $times);
    }
    $totalViewingTime = array_sum($viewingTimes);

    // 配列の展開 上記の処理の短縮記法
    // $totalMins = array_sum(...$viewingTimePerChannel);

    return round($totalViewingTime / 60, 1);
}

function display(array $viewingTimePerChannel, float $totalViewingTime): void
{
    echo $totalViewingTime . PHP_EOL;
    foreach ($viewingTimePerChannel as $channel => $mins) {
        echo $channel . " " . array_sum($mins) . " " . count($mins) . PHP_EOL;
    }
}

$inputs = getInput(trim(fgets(STDIN)));
$viewingTimePerChannel =  getViewingTimePerChannel($inputs);
$totalViewingTime = calculateTotalTime($viewingTimePerChannel);
display($viewingTimePerChannel, $totalViewingTime);
