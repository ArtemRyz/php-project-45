<?php

namespace BrainGames\Calc;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\ROUNDS;

const RULE = 'What is the result of the expression?';

function runCalc(): void
{
    $gameData = [];
    $operators = ['+', '-', '*'];

    for ($i = 0; $i < ROUNDS; $i += 1) {
        $num1 = rand(1, 10);
        $num2 = rand(1, 10);

        $operator = $operators[array_rand($operators, 1)];
        $question = "$num1 $operator $num2";
        $correctAnswer = calcResult($num1, $operator, $num2);
        $gameData[$question] = $correctAnswer;
    }

    runGame(RULE, $gameData);
}

function calcResult(int $number1, string $operation, int $number2): string # Почему не работает если поставить тип int?
{
    switch ($operation) {
        case "+":
            return $number1 + $number2;
        case "-":
            return $number1 - $number2;
        case "*":
            return $number1 * $number2;
    }
}
