<?php

namespace BrainGames\games\Gcd;

use function BrainGames\greetAndGetName;
use function BrainGames\playGameStep;

use const BrainGames\START_RANDOM_NUMBER;
use const BrainGames\END_RANDOM_NUMBER;
use const BrainGames\COUNT_QUESTIONS;

function runGcd()
{
    $name = greetAndGetName('Find the greatest common divisor of given numbers.');

    for ($i = 0; $i < COUNT_QUESTIONS; $i++) {
        $a = rand(START_RANDOM_NUMBER, END_RANDOM_NUMBER);
        $b = rand(START_RANDOM_NUMBER, END_RANDOM_NUMBER);
        $correctAnswer = gcd($a, $b);
        $question = "{$a} {$b}";
        $resultGameStep = playGameStep($correctAnswer, $question, $name, $i);
        if (!$resultGameStep) {
            break;
        }
    }
}

function gcd($a, $b)
{
    return ($a % $b) ? gcd($b, $a % $b) : $b;
}
