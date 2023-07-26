<?php

namespace BrainGames\Progression;

use function BrainGames\Engine\runGame;

const GAMEINFO = 'What number is missing in the progression?';

function lineNumber()
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



function runProgression()
{
    $round = 3;
    $i = 0;
    $answer = [];
    $question = [];

    while ($i < $round) {
        $progression = lineNumber();

        $randKey = array_rand($progression, 1);
        $answer[] = $progression[$randKey];

        $progressionSpace = $progression;
        $progressionSpace[$randKey] = '..';

        $impl = implode(" ", $progressionSpace);
        $question[] = $impl;
        $i++;
    }

    runGame(GAMEINFO, $question, $answer);
}