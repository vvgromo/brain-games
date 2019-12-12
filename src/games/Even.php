<?php

namespace BrainGames\games\Even;

use function BrainGames\greetAndGetName;
use function BrainGames\playGameStep;

use const BrainGames\START_RANDOM_NUMBER;
use const BrainGames\END_RANDOM_NUMBER;
use const BrainGames\COUNT_QUESTIONS;

function runEven()
{
    $name = greetAndGetName('Answer "yes" if the number is even, otherwise answer "no".');

    for ($i = 0; $i < COUNT_QUESTIONS; $i++) {
        $number = rand(START_RANDOM_NUMBER, END_RANDOM_NUMBER);
        $correctAnswer = isEven($number) ? 'yes' : 'no';
        $resultGameStep = playGameStep($correctAnswer, $number, $name, $i);
        if (!$resultGameStep) {
            break;
        }
    }
}

function isEven($number)
{
    return $number % 2 === 0;
}
