<?php

namespace Brain\Games\Even;

use function cli\line;
use function cli\prompt;

function run()
{
    $name = '';
    $steps = 3;
    $rightCount = 0;

    line('Welcome to the Brain Game!');
    $name = prompt('May I have you name?');
    line("Hello, %s!", $name);
    line('Answer "yes" if the number is even, otherwise answer "no".');

    while ($steps > $rightCount) {
        $number = rand(1, 100);
        line("Question: %s", $number);
        $answer = prompt('Your answer');
        $correctAnswer = isEven($number);

        if ($answer == $correctAnswer) {
            line('Correct!');
            $rightCount++;
        } else {
            line("'{$answer}' is wrong answer ;(. Correct answer was '{$correctAnswer}'.");
            line("Let's try again %s!", $name);
            $rightCount = 0;
        }
    }

    line("Congratulations, %s!", $name);
}

function isEven(int $a)
{
    return $a % 2 === 0 ? 'yes' : 'no';
}
