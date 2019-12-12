<?php

namespace BrainGames\games\Progression;

use function BrainGames\greetAndGetName;
use function BrainGames\playGameStep;

use const BrainGames\START_RANDOM_NUMBER;
use const BrainGames\END_RANDOM_NUMBER;
use const BrainGames\COUNT_QUESTIONS;

const SIZE_PROGRESSION = 10;

function runProgression()
{
    $name = greetAndGetName('What number is missing in the progression?');

    for ($i = 0; $i < COUNT_QUESTIONS; $i++) {
        $firstNumber = rand(START_RANDOM_NUMBER, END_RANDOM_NUMBER);
        $missIndex = rand(START_RANDOM_NUMBER, SIZE_PROGRESSION - 1);
        $delta = rand(START_RANDOM_NUMBER, END_RANDOM_NUMBER);
        $progression = fillProgression($firstNumber, $delta);
        $correctAnswer = $progression[$missIndex];
        $question = makeQuestion($progression, $missIndex);
        $resultGameStep = playGameStep($correctAnswer, $question, $name, $i);
        if (!$resultGameStep) {
            break;
        }
    }
}

function fillProgression($firstNumber, $delta)
{
    $progression = [];
    for ($i = 0; $i < SIZE_PROGRESSION; $i++) {
        $progression[] = $i === 0 ? $firstNumber : $progression[$i - 1] + $delta;
    }

    return $progression;
}

function makeQuestion($progression, $missIndex)
{
    $progression[$missIndex] = '..';
    return implode(' ', $progression);
}
