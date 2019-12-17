<?php

namespace BrainGames\games\Even;

use function BrainGames\playGame;

use const BrainGames\START_RANDOM;
use const BrainGames\END_RANDOM;

const TASK = 'Answer "yes" if the number is even, otherwise answer "no".';

function runEven()
{
    playGame(function () {
        $question = rand(START_RANDOM, END_RANDOM);
        $correctAnswer = isEven($question) ? 'yes' : 'no';

        return [$correctAnswer, $question];
    }, TASK);
}

function isEven($number)
{
    return $number % 2 === 0;
}
