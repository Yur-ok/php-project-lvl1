<?php

namespace Brain\Games\Games\Gcd;

use function Brain\Games\Engine\runGame;

function run()
{
    $fileName = strtolower(pathinfo(__FILE__)['filename']);
    $gameData = 'Find the greatest common divisor of given numbers.';
    runGame($gameData, $fileName);
}

function getGcdData()
{
    $a = rand(1, 20);
    $b = rand(1, 20);
    $aDividers = divisionFinder($a);
    $bDividers = divisionFinder($b);
    $gcd = array_intersect($aDividers, $bDividers);
    sort($gcd);
    $result = [];
    $question = "$a $b";
    $result[] = $question;
    $answer = $gcd[count($gcd) - 1];
    $result[] = $answer;

    return $result;
}

function divisionFinder(int $a)
{
    $divisions = [];
    foreach (range(1, $a) as $divider) {
        if ($a % $divider === 0) {
            $divisions[] = $divider;
        }
    }

    return $divisions;
}
