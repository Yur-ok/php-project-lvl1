<?php

namespace Brain\Games\Games\Calc;

use function Brain\Games\Engine\runGame;

define('OPERATIONS', ['+', '-', '*']);

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
    $operation = OPERATIONS[rand(0, count(OPERATIONS) - 1)];
    $result = [];
    $question = "$a $operation $b";
    $answer = 0;
    eval("\$answer = $question;");
    $result[] = $question;
    $result[] = $answer;

    return $result;
}
