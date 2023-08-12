<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\ROUNDS;

const RULE = 'Answer "yes" if the number is even, otherwise answer "no".';

function runEven(): void
{
    $gameData = [];

    for ($i = 0; $i < ROUNDS; $i += 1) {
        $question = rand(1, 100);
        $answer = isEven($question) ? 'yes' : 'no';
        $gameData[] = [$question, $answer];
    }

    runGame(RULE, $gameData);
}

function isEven(int $number): bool
{
    if ($number % 2 === 0) {
        return true;
    }

    return false;
}
