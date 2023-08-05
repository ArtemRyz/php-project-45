<?php

namespace BrainGames\Prime;

use function BrainGames\Engine\runGame;
use const BrainGames\Engine\ROUNDS;

const RULE = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function runPrime(): void
{
    $gameData = [];

    for ($i = 0; $i < ROUNDS; $i += 1) {
        $question = rand(1, 20);
        $answer = (isPrime($question)? 'yes' : 'no');
        $gameData[$question] = $answer;
    }

    runGame(RULE, $gameData);
}

function isPrime(int $num): string
{
    if ($num === 1) {
        return false;
    }

    for ($i = 2; $i < $num; $i += 1) {
        if ($num % $i === 0) {
            return false;
        }
    }
    return true;
}