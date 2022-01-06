<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

require_once __DIR__ . "/../lib/ViewingTimes.php";

final class ViewingTimes extends TestCase
{
    public function test(): void
    {
        $output = <<< EOD
        1.7
        1 45 2
        2 30 1
        5 25 1

        EOD;

        $this->expectOutputString($output);

        $inputs = getInput("1 30 5 25 2 30 1 15");
        $viewingTimePerChannel =  getViewingTimePerChannel($inputs);
        $totalViewingTime = calculateTotalTime($viewingTimePerChannel);
        display($viewingTimePerChannel, $totalViewingTime);
    }
}

// test
