<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\ROUNDS_COUNT;

const RULE = 'Find the greatest common divisor of given numbers.';

function runGcd(): void
{
    $gameData = [];

    for ($i = 0; $i < ROUNDS_COUNT; $i += 1) {
        $num1 = rand(1, 20);
        $num2 = rand(1, 20);
        $maxNumber = max($num1, $num2);
        $minNumber = min($num1, $num2);
        $question = "$num1 $num2";
        $answer = (string)calcGcd($maxNumber, $minNumber);

        $gameData[] = [$question, $answer];
    }

    runGame(RULE, $gameData);
}

function calcGcd(int $minNumber, int $maxNumber): int
{
    $gcd = 1;

    if ($minNumber === $maxNumber) {
        return $minNumber;
    }

    for ($i = $minNumber; $i >= 1; $i -= 1) {
        if ($maxNumber % $i === 0 && $minNumber % $i === 0) {
            return $i;
        }
    }
    return $gcd;
}
