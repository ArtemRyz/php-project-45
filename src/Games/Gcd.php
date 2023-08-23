<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\ROUNDS_COUNT;

const RULE = 'Find the greatest common divisor of given numbers.';

function runGcd(): void
{
    $answer = 0;
    $gameData = [];

    for ($i = 0; $i < ROUNDS_COUNT; $i += 1) {
        $num1 = rand(1, 20);
        $num2 = rand(1, 20);
        $maxNumber = max($num1, $num2);
        $minNumber = min($num1, $num2);
        $question = "{$num1} {$num2}";
        $answer = (string)calcGcd($maxNumber, $minNumber);

        $gameData[] = [$question, $answer];
    }

    runGame(RULE, $gameData);
}

function calcGcd(int $min, int $max): int
{
    $gcd = 1;

    if ($min === $max) {
        $gcd = $min;
    }

    for ($i = $min; $i >= 1; $i -= 1) {
        if ($max % $i === 0 && $min % $i === 0) {
            $gcd = $i;
            break;
        }
    }
    return $gcd;
}
