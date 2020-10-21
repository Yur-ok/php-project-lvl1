<?php

namespace Brain\Games\Games\Progression;

use function Brain\Games\Engine\runGame;

function run()
{
    $fileName = strtolower(pathinfo(__FILE__)['filename']);
    $gameData = 'What number is missing in the progression?';
    runGame($gameData, $fileName);
}

function getProgressionData()
{
    $length = rand(5, 10);
    $hiddenNumber = rand(1, $length);
    $startFrom = rand(1, 90);
    $progDiff = rand(1, 7);
    $question = [$startFrom + $progDiff];

    for ($i = 0; $i < $length; $i++) {
        $question[] = $question[$i] + $progDiff;
    }
    $answer = $question[$hiddenNumber];
    $question[$hiddenNumber] = '..';
    $question = implode(' ', $question);

    return [$question, $answer];
}
