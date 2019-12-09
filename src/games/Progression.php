<?php

namespace BrainGames\Games\Progression;

use function BrainGames\greetAndGetName;
use function BrainGames\playGameStep;
use function BrainGames\congratulate;

function runProgression()
{
    $name = greetAndGetName('What number is missing in the progression?');
    $startRandomNumber = 0;
    $endRandomNumber = 100;
    $sizeProgression = 10;
    $countQuestions = 3;

    for ($i = 0; $i < $countQuestions; $i++) {
        $firstNumber = rand($startRandomNumber, $endRandomNumber);
        $missIndex = rand($startRandomNumber, $sizeProgression - 1);
        $delta = rand($startRandomNumber, $endRandomNumber);
        $progression = fillProgression($firstNumber, $sizeProgression, $delta);
        $correctAnswer = $progression[$missIndex];
        $question = makeQuestion($progression, $missIndex);
        $resultGameStep = playGameStep($correctAnswer, $question, $name);
        if (!$resultGameStep) {
            break;
        }
    }

    if ($resultGameStep) {
        congratulate($name);
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
