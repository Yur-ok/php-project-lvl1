<?php

namespace Brain\Games\Games\Engine;

use function cli\line;
use function cli\prompt;
use function Brain\Games\Games\Calc\getCalcData;
use function Brain\Games\Games\Even\getEvenData;

function runGame(string $gameData, string $gameName)
{
    $steps = 3;
    $rightCount = 0;
    $correctAnswer = '';

    line('Welcome to the Brain Game!');
    $name = prompt('May I have you name?');
    line("Hello, %s!", $name);
    line($gameData);

    while ($steps > $rightCount) {
        $gameTurn = $gameName === 'calc' ? getCalcData() : getEvenData();
        line("Question: %s", $gameTurn);
        $userAnswer = prompt("Your answer");
        switch ($gameName) {
            case 'calc':
                eval("\$correctAnswer = $gameTurn;");
                break;
            case 'even':
                $correctAnswer = $gameTurn % 2 === 0 ? 'yes' : 'no';
                break;
        }
        if ($userAnswer == $correctAnswer) {
            line('Correct!');
            $rightCount++;
        } else {
            line("'{$userAnswer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
            line("Let's try again %s!", $name);
            $rightCount = 0;
        }
    }

    line("Congratulations, %s!", $name);
}
