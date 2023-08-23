<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\ROUNDS_COUNT;

const RULE = 'What number is missing in the progression?';

function runProgression(): void
{
    $answer = [];
    $gameData = [];

    for ($i = 0; $i < ROUNDS_COUNT; $i += 1) {
        $randNum = rand(0, 100);
        $step = rand(1, 5);
        $progression = makeProgression($randNum, $step);

        $randKey = array_rand($progression);
        $answer = (string)$progression[$randKey];

        $progressionSpace = $progression;
        $progressionSpace[$randKey] = '..';

        $impl = implode(" ", $progressionSpace);
        $gameData[] = [$impl, $answer];
    }

    runGame(RULE, $gameData);
}

function makeProgression(int $number, int $step): array
{
    $arr = [$number];

    for ($i = 0; $i < 9; $i += 1) {
        $arr[] = $arr[$i]  + $step;
    }

    return $arr;
}
