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
        $randNum = rand(0, 100);
        $stepOfPrgression = rand(1, 5);
        $progression = giveLineOfNumbers($randNum, $stepOfPrgression);

        $randKey = array_rand($progression, 1);
        $answer = (string)$progression[$randKey];

        $progressionSpace = $progression;
        $progressionSpace[$randKey] = '..';

        $impl = implode(" ", $progressionSpace);
        $gameData[$impl] = $answer;
    }

    runGame(RULE, $gameData);
}

function giveLineOfNumbers(int $number, string $step): array
{
    $lenght = 10;
    $arr = [$number];

    for ($i = 0; $i <= $lenght; $i++) {
        $arr[] = $arr[$i]  + $step;
    }

    return $arr;
}
