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
        $answer = $progression[$randKey];

        $progressionSpace = $progression;
        $progressionSpace[$randKey] = '..';

        $impl = implode(" ", $progressionSpace);
        $gameData[$impl] = $answer;
    }

    runGame(RULE, $gameData);
}

function giveLineOfNumbers(): array
{
    $lenght = 11;
    $randNum = rand(0, 100);
    $stepOfNumber = rand(1, 5);
    $arr = [];
    
    for ($i = 0; $i < $lenght; $i++) {
        $arr[] = $randNum;
        $randNum = $randNum  + $stepOfNumber;
    }

    return $arr;
}
