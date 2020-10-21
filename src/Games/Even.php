<?php

namespace Brain\Games\Games\Even;

use function Brain\Games\Engine\runGame;

function run()
{
    $fileName = strtolower(pathinfo(__FILE__)['filename']);
    $gameData = 'Answer "yes" if the number is even, otherwise answer "no".';
    runGame($gameData, $fileName);
}

function getEvenData()
{
    $question = rand(1, 100);
    $answer = $question % 2 === 0 ? 'yes' : 'no';

    return [$question, $answer];
}
