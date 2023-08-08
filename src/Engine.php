<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const ROUNDS = 3;

function runGame(string $gameRule, array $gameData): void
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($gameRule);

    foreach ($gameData as $gameQuestion => $gameResult) {
        line("Question: %s", $gameQuestion);
        $userAnswer = prompt('Your answer');

        if ($userAnswer !== $gameResult) { 
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $userAnswer, $gameResult);
            line("Let's try again, %s!", $name);
            return;
        } else line('Correct!');
    }
    line("Congratulations, %s!", $name);
}
