<?php

namespace Brain\Games\Games\Even;

use function Brain\Games\Games\Engine\runGame;

function run()
{
    $fileName = strtolower(pathinfo(__FILE__)['filename']);
    $gameData = 'Answer "yes" if the number is even, otherwise answer "no".';
    runGame($gameData, $fileName);
}

function getEvenData()
{
    return rand(1, 100);
}
