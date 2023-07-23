<?php

namespace BrainGames\Even;

use function cli\line;
use function cli\prompt;
use function BrainGames\Cli\greeting;

function isEven(int $num)
{
    if ($num % 2 === 0) {
        return true;
    } else {
        return false;
    }
}

function runEven()
{
    $name = greeting();
    line("Answer 'yes' if the number is even, otherwise answer 'no'.");
    for ($i = 0; $i < 3; $i++) {
        $question = rand(1, 100);
        $checkEven = isEven($question);
        line('Question: %s', $question);
        $answer = prompt('Your answer');
        if (($answer !== 'yes') && ($answer !== 'no')) {
            line("%s is wrong answer ;(. Correct answer was 'yes' or 'no'.", $answer);
            line("Let's try again, %s!", $name);
            break;
        }
        if ($checkEven === true && $answer === 'yes') {
            line('Correct!');
        } elseif ($checkEven === false && $answer === 'no') {
            line('Correct!');
        } elseif ($checkEven === true && $answer === 'no') {
            line("'no' is wrong answer ;(. Correct answer was 'yes'.");
            line("Let's try again, %s!", $name);
            break;
        } elseif ($checkEven === false && $answer === 'yes') {
            line("'yes' is wrong answer ;(. Correct answer was 'no'.");
            line("Let's try again, %s!", $name);
            break;
        }
        if ($i === 2) {
            line("Congratulations, %s!", $name);
        }
    }
}
