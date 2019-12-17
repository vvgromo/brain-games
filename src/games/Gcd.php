<?php

namespace BrainGames\games\Gcd;

use function BrainGames\playGame;

use const BrainGames\START_RANDOM;
use const BrainGames\END_RANDOM;

const TASK = 'Find the greatest common divisor of given numbers.';

function runGcd()
{
    playGame(function () {
        $a = rand(START_RANDOM, END_RANDOM);
        $b = rand(START_RANDOM, END_RANDOM);
        $correctAnswer = gcd($a, $b);
        $question = "{$a} {$b}";
        
        return [$correctAnswer, $question];
    }, TASK);
}

function gcd($a, $b)
{
    return ($a % $b) ? gcd($b, $a % $b) : $b;
}
