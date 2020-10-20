<?php

namespace Brain\Games\Games\Prime;

use function Brain\Games\Engine\runGame;

function run()
{
    $fileName = strtolower(pathinfo(__FILE__)['filename']);
    $gameData = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    runGame($gameData, $fileName);
}

function getPrimeData()
{
    $a = rand(1, 100);
    $question = $a;
    $answer = '';
    $count = 0;

    foreach (range(1, $a) as $number) {
        if ($a % $number === 0) {
            $count++;
        }
    }

    $answer = $count > 2 ? 'no' : 'yes';

    return [$question, $answer];
}
