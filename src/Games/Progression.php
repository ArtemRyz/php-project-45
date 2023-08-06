<?php

namespace BrainGames\Progression;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\ROUNDS;

const RULE = 'What number is missing in the progression?';

function runProgression(): void
{
    $answer = [];
    $gameData = [];

    for ($i = 0; $i < ROUNDS; $i += 1) {
        $progression = giveLineOfNumbers();

        $randKey = array_rand($progression, 1);
        $answer = (string)$progression[$randKey];
        print_r($answer);

        $progressionSpace = $progression;
        $progressionSpace[$randKey] = '..';

        $impl = implode(" ", $progressionSpace);
        $gameData[$impl] = $answer;
    }

    runGame(RULE, $gameData);
}

function giveLineOfNumbers(): array
{
    $lenght = 10;
    $randNum = rand(0, 100);
    $stepOfNumber = rand(1, 5);
    $arr = [$randNum];

    for ($i = 0; $i <= $lenght; $i++) {
        $arr[] = $arr[$i]  + $stepOfNumber;
    }

    return $arr;
}
