<?php

namespace BrainGames\Gcd;

use function BrainGames\Engine\runGame;

const GAMEINFO = 'Find the greatest common divisor of given numbers.';

function runGcd()
{
    $round = 3;
    $i = 0;
    $answer = 0;
    $arrQuestion = [];
    $arrAnswer = [];
    while ($i < 3) {
        $num1 = rand(1, 20);
        $num2 = rand(1, 20);
        $question = "{$num1} {$num2}";
        if ($num1 < $num2) {
            $answer = checkGcd($num1, $num2);
        } elseif ($num1 > $num2) {
            $answer = checkGcd($num2, $num1);
        } elseif ($num1 === $num2) {
            return $answer = 1;
        }
        $arrQuestion[] = $question;
        $arrAnswer[] = $answer;
        $i++;
    }
    runGame(GAMEINFO, $arrQuestion, $arrAnswer);
}

function checkGcd(int $min, int $max)
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
