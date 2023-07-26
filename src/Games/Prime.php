<?php

namespace BrainGames\Prime;

use function BrainGames\Engine\runGame;

const GAMEINFO = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function checkPrime(int $num)
{
    if ($num === 1) {
        return 'no';
    }

    for ($i = 2; $i < $num; $i++) {
        if ($num % $i === 0) {
            return 'no';
        }
    }
    return 'yes';
}



function runPrime()
{
    $round = 3;
    $i = 0;
    $arrQuestion = [];
    $arrAnswer = [];

    while ($i < $round) {
        $question = rand(1, 20);
        $answer = checkPrime($question);
        $arrQuestion[] = $question;
        $arrAnswer[] = $answer;
        $i++;
    }

    runGame(GAMEINFO, $arrQuestion, $arrAnswer);
}
