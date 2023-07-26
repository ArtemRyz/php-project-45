<?php

namespace BrainGames\Calc;

use function BrainGames\Engine\runGame;

const GAMEINFO = 'What is the result of the expression?';

function runCalc()
{
    $round = 3;
    $i = 0;
    $arrQuestion = [];
    $arrAnswer = [];
    while ($i < $round) {
        $num1 = rand(1, 10);
        $num2 = rand(1, 10);
        $operator = randomOperator();
        $question = "{$num1} {$operator} {$num2}";
        $correctAnswer = result($num1, $operator, $num2);
        $arrQuestion[] = $question;
        $arrAnswer[] = $correctAnswer;
        $i++;
    }
    runGame(GAMEINFO, $arrQuestion, $arrAnswer);
}


function randomOperator()
{
    $randomNum = rand(1, 3);
    if ($randomNum === 1) {
        $randomOperator = "+";
    } elseif ($randomNum === 2) {
        $randomOperator = "-";
    } elseif ($randomNum === 3) {
        $randomOperator = "*";
    }
    return $randomOperator;
}

function result(int $number1, string $operation, int $number2)
{
    $correctResult = 0;
    switch ($operation) {
        case "+":
            $correctResult = $number1 + $number2;
            break;
        case "-":
            $correctResult = $number1 - $number2;
            break;
        case "*":
            $correctResult = $number1 * $number2;
            break;
    }
    return $correctResult;
}
