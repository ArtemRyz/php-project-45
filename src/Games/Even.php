<?php

namespace BrainGames\Even;

use function BrainGames\Engine\runGame;

const GAMEINFO = "Answer 'yes' if the number is even, otherwise answer 'no'.";


function isEven(int $num)
{
    if ($num % 2 === 0) {
        return 'yes';
    } else {
        return 'no';
    }
}

function runEven()
{
    $answer = [];
    $question = [];
    $round = 3;
    $i = 0;
    while ($i < $round) {
        $randomNum = rand(1, 100);
        $question[] = $randomNum;
        $answer[] = isEven($randomNum);
        $i++;
    }
    runGame(GAMEINFO, $question, $answer);
}
