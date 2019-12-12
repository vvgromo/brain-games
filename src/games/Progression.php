<?php

namespace BrainGames\games\Progression;

use function BrainGames\greetAndGetName;
use function BrainGames\playGameStep;
use function BrainGames\congratulate;

use const BrainGames\START_RANDOM_NUMBER;
use const BrainGames\END_RANDOM_NUMBER;
use const BrainGames\COUNT_QUESTIONS;

function runProgression()
{
    $name = greetAndGetName('What number is missing in the progression?');
    $sizeProgression = 10;

    for ($i = 0; $i < COUNT_QUESTIONS; $i++) {
        $firstNumber = rand(START_RANDOM_NUMBER, END_RANDOM_NUMBER);
        $missIndex = rand(START_RANDOM_NUMBER, $sizeProgression - 1);
        $delta = rand(START_RANDOM_NUMBER, END_RANDOM_NUMBER);
        $progression = fillProgression($firstNumber, $sizeProgression, $delta);
        $correctAnswer = $progression[$missIndex];
        $question = makeQuestion($progression, $missIndex);
        playGameStep($correctAnswer, $question, $name, $i);
    }
}

function fillProgression($firstNumber, $sizeProgression, $delta)
{
    $progression = [$firstNumber];
    for ($i = 0, $size = $sizeProgression - 1; $i < $size; $i++) {
        $progression[] = $progression[$i] + $delta;
    }

    return $progression;
}

function makeQuestion($progression, $missIndex)
{
    $progression[$missIndex] = '..';
    return implode(' ', $progression);
}
