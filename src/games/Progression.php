<?php

namespace BrainGames\games\Progression;

use function BrainGames\playGame;

use const BrainGames\START_RANDOM;
use const BrainGames\END_RANDOM;

const SIZE_PROGRESSION = 10;
const TASK = 'What number is missing in the progression?';

function runProgression()
{
    playGame(function () {
        $firstElement = rand(START_RANDOM, END_RANDOM);
        $delta = rand(START_RANDOM, END_RANDOM);
        $progression = fillProgression($firstElement, SIZE_PROGRESSION, $delta);
        $missingElementIndex = array_rand($progression);
        $correctAnswer = $progression[$missingElementIndex];
        $question = makeQuestion($progression, $missingElementIndex);

        return [$correctAnswer, $question];
    }, TASK);
}

function fillProgression($firstElement, $sizeProgression, $delta)
{
    $progression = [];
    for ($i = 0; $i < $sizeProgression; $i++) {
        $progression[] = $i === 0 ? $firstElement : $progression[$i - 1] + $delta;
    }

    return $progression;
}

function makeQuestion($progression, $missingElementIndex)
{
    $progression[$missingElementIndex] = '..';
    return implode(' ', $progression);
}
