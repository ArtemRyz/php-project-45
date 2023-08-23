<?php

namespace BrainGames\Games\Calc;

use Exception;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\ROUNDS_COUNT;

const RULE = 'What is the result of the expression?';

function runCalc(): void
{
    $gameData = [];
    $operators = ['+', '-', '*'];

    for ($i = 0; $i < ROUNDS_COUNT; $i += 1) {
        $num1 = rand(1, 10);
        $num2 = rand(1, 10);

        $operator = $operators[array_rand($operators)];
        $question = "$num1 $operator $num2";
        $correctAnswer = (string)calcResult($num1, $operator, $num2);
        $gameData[] = [$question, $correctAnswer];
    }

    runGame(RULE, $gameData);
}

function calcResult(int $number1, string $operation, int $number2): int
{
    switch ($operation) {
        case "+":
            return $number1 + $number2;
        case "-":
            return $number1 - $number2;
        case "*":
            return $number1 * $number2;
        default:
            throw new Exception("Incorrectly operation '$operation'");
    }
}
