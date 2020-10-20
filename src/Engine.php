<?php

namespace Brain\Games\Engine;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Games\Calc\getCalcData;
use function Brain\Games\Games\Even\getEvenData;
use function Brain\Games\Games\Gcd\getGcdData;
use function Brain\Games\Games\Progression\getProgressionData;

function runGame(string $gameData, string $gameName)
{
    $steps = 3;
    $rightCount = 0;

    line('Welcome to the Brain Game!');
    $name = prompt('May I have you name?');
    line("Hello, %s!", $name);
    line($gameData);

    while ($steps > $rightCount) {
        switch ($gameName) {
            case 'even':
                $gameTurn = getEvenData();
                break;
            case 'calc':
                $gameTurn = getCalcData();
                break;
            case 'gcd':
                $gameTurn = getGcdData();
                break;
            case 'progression':
                $gameTurn = getProgressionData();
                break;
        }
        line("Question: %s", $gameTurn[0]);
        $userAnswer = prompt("Your answer");
        if ($userAnswer == $gameTurn[1]) {
            line('Correct!');
            $rightCount++;
        } else {
            line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$gameTurn[1]}'.");
            line("Let's try again %s!", $name);
            $rightCount = 0;
        }
    }

    line("Congratulations, %s!", $name);
}
