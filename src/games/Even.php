<?php

namespace BrainGames\Games\Even;

use function BrainGames\greetAndGetName;
use function BrainGames\playGameStep;
use function BrainGames\congratulate;

function runEven()
{
    $name = greetAndGetName('Answer "yes" if the number is even, otherwise answer "no".');
    $startRandomNumber = 0;
    $endRandomNumber = 100;
    $countQuestions = 3;

    for ($i = 0; $i < $countQuestions; $i++) {
        $number = rand($startRandomNumber, $endRandomNumber);
        $correctAnswer = isEven($number) ? 'yes' : 'no';
        $resultGameStep = playGameStep($correctAnswer, $number, $name);
        if (!$resultGameStep) {
            break;
        }
    }

    if ($resultGameStep) {
        congratulate($name);
    }
}

function isEven($number)
{
    return $number % 2 === 0;
}
