<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function runGame($info, $gameQuestion, $gameResult)
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($info);

    $rounds = 3;
    for ($i = 0; $i < $rounds; $i++) {
        $Question = line("Question: %s", $gameQuestion[$i]);
        $userAnswer = prompt('Your answer');
        if ($userAnswer == $gameResult[$i]) {
            line('Correct!');
        } elseif ($userAnswer != $gameResult[$i]) {
            line("%s is wrong answer ;(. Correct answer was %s.", $userAnswer, $gameResult[$i]);
            line("Let's try again, %s!", $name);
            break;
        }
        if ($i === 2) {
            line("Congratulations, %s!", $name);
        }
    }
}
