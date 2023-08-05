<?php

namespace BrainGames\Gcd;

use function BrainGames\Engine\runGame;
use const BrainGames\Engine\ROUNDS;

const RULE = 'Find the greatest common divisor of given numbers.';

function runGcd(): void
{
    $answer = 0;
    $gameData = [];

    for ($i = 0; $i < ROUNDS; $i += 1) {
        $num1 = rand(1, 20);
        $num2 = rand(1, 20);
        $question = "{$num1} {$num2}";
        if ($num1 < $num2) {
            $answer = calcGcd($num1, $num2);
        } elseif ($num1 > $num2) {
            $answer = calcGcd($num2, $num1);
        } elseif ($num1 === $num2) {
            $answer = $num1;
        }
        $gameData[$question] = $answer;
    }

    runGame(RULE, $gameData);
}

function calcGcd(int $min, int $max): int
{
    if ($min === $max) {
        return $min;
    }
    
    for ($i = $min; $i >= 1; $i -= 1) {
        $gcd = $i;
        if ($max % $i === 0 && $min % $i === 0) {
            return $gcd;
        }
    }
}
