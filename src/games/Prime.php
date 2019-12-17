<?php

namespace BrainGames\games\Prime;

use function BrainGames\playGame;

use const BrainGames\START_RANDOM;
use const BrainGames\END_RANDOM;

const TASK = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function runPrime()
{
    playGame(function () {
        $question = rand(START_RANDOM, END_RANDOM);
        $correctAnswer = isPrime($question) ? 'yes' : 'no';

        return [$correctAnswer, $question];
    }, TASK);
}

function isPrime($number)
{
    if ($number == 2) {
        return true;
    }
    if ($number < 2) {
        return false;
    }
    for ($i = 2, $end = sqrt($number); $i <= $end; $i++) {
        if (!($number % $i)) {
            return false;
        }
    }
    
    return true;
}
