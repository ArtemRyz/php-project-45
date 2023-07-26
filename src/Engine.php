<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;
use function BrainGames\Cli\greeting;

function runGame(string $info, array $gameQuestion, array $gameResult)
{
    $name = greeting();
    line($info);

    $rounds = 3;

    for ($i = 0; $i < $rounds; $i++) {
        line("Question: %s", $gameQuestion[$i]);
        $userAnswer = prompt('Your answer');
        if ($userAnswer == $gameResult[$i]) {
            line('Correct!');
        } elseif ($userAnswer != $gameResult[$i]) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $userAnswer, $gameResult[$i]);
            line("Let's try again, %s!", $name);
            return;
        }
    }
    line("Congratulations, %s!", $name);
}
