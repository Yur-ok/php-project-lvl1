<?php

namespace Brain\Games\Games\Calc;

use function Brain\Games\Engine\runGame;

function run()
{
    $fileName = strtolower(pathinfo(__FILE__)['filename']);
    $gameData = 'What is the result of the expression?';
    runGame($gameData, $fileName);
}

function getCalcData()
{
    $a = rand(1, 10);
    $b = rand(1, 10);
    $operations = ['+', '-', '*'];
    $operation = $operations[rand(0, count($operations) - 1)];
    $question = "$a $operation $b";
    $answer = 0;
    eval("\$answer = $question;");

    return [$question, $answer];
}
